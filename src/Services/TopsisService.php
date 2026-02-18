<?php

namespace App\Services;

class TopsisService {

    public function calculate($alternatives, $criteriaWeights, $subCriteria) {
        $data = [];
        
        $pembagi = []; 
        
        // Initialize pembagi
        foreach ($criteriaWeights as $c) {
             $id_ktr = $c['id_ktr']; // 1..N
             $pembagi[$id_ktr] = 0;
        }

        // 1. Hitung Pembagi (Akar dari Sum(x^2))
        // Store raw values X for debugging? View expects Ternormalized (R)
        
        foreach ($alternatives as $alt) {
            foreach ($criteriaWeights as $c) {
                $id_ktr = $c['id_ktr'];
                $id_sub = $alt['nilai_kriteria'][$id_ktr] ?? null;
                $nilai = $this->getSubCriteriaWeight($id_sub, $subCriteria);
                $pembagi[$id_ktr] += pow($nilai, 2);
            }
        }

        foreach ($pembagi as $key => $val) {
            $pembagi[$key] = sqrt($val);
        }

        // 2. Matriks Ternormalisasi (R)
        // View expects data['tp']['X']['R1-1'] => value
        $R = [];
        
        foreach ($alternatives as $alt) {
            $i = $alt['id_alt'];
            foreach ($criteriaWeights as $c) {
                $j = $c['id_ktr']; // c1..c11 -> 1..11
                
                $id_sub = $alt['nilai_kriteria'][$j] ?? null;
                $nilaiRaw = $this->getSubCriteriaWeight($id_sub, $subCriteria);
                
                $val = ($pembagi[$j] > 0) ? $nilaiRaw / $pembagi[$j] : 0;
                
                // Construct legacy key 'Rj-i'
                $R['R'.$j.'-'.$i] = $val;
            }
        }
        $data['X'] = $R;

        // 3. Matriks Ternormalisasi Terbobot (Y or V in legacy)
        // View expects data['tp']['V']['V1-1']
        $V = [];
        $weightsMap = []; 
        foreach ($criteriaWeights as $c) {
             $weightsMap[$c['id_ktr']] = $c['nilai_bk']; 
        }

        // Temporary structure for finding Ideal Solutions
        $weightedMatrix = []; // [id_alt][id_ktr] => val

        foreach ($alternatives as $alt) {
            $i = $alt['id_alt'];
            foreach ($criteriaWeights as $c) {
                $j = $c['id_ktr'];
                $r_val = $R['R'.$j.'-'.$i];
                $v_val = $r_val * $weightsMap[$j];
                
                $V['V'.$j.'-'.$i] = $v_val;
                $weightedMatrix[$i][$j] = $v_val;
            }
        }
        $data['V'] = $V;

        // 4. Solusi Ideal Positif (A+) & Negatif (A-)
        $aplus = []; 
        $amin = [];
        
        foreach ($weightsMap as $j => $w) {
             $colValues = array_column($weightedMatrix, $j);
             $aplus[$j] = empty($colValues) ? 0 : max($colValues);
             $amin[$j] = empty($colValues) ? 0 : min($colValues);
        }

        // 5. Jarak Solusi Ideal (D+ & D-)
        // View expects 'DP1', 'DM1' ... where 1 is Alt ID? No, loop says $i <= count($alternatives).
        // View assumes Alt IDs are sequential 1..N ? 
        // View: foreach($data['tp']['rankTp'] as $key => $value) { 'A'.$key ... }
        // If IDs are not sequential (e.g. deleted rows), 'A'.$key might display 'A5' for 3rd row.
        // Legacy code used $i from loop 1..count. 
        // Let's stick to using ID_ALT as key, assuming view handles partial keys or we map.
        // Actually, logic in PerhitunganModel used standard for loop $i=1..count.
        // BUT it mapped $i to alternatives. 
        // New logic: Use actual ID_ALT as key.
        
        $DP = [];
        $DM = [];
        $rankTp = [];
        $users = [];

        foreach ($alternatives as $alt) {
            $i = $alt['id_alt'];
            $users[$i] = $alt['nama'];
            
            $sumP = 0; 
            $sumM = 0;
            
            foreach ($criteriaWeights as $c) {
                $j = $c['id_ktr'];
                $val = $weightedMatrix[$i][$j];
                $sumP += pow($aplus[$j] - $val, 2);
                $sumM += pow($val - $amin[$j], 2);
            }
            
            $dp_val = sqrt($sumP);
            $dm_val = sqrt($sumM);
            
            $DP['DP'.$i] = $dp_val; // Using actual ID
            $DM['DM'.$i] = $dm_val;
            
            // 6. Preferensi (V)
            $score = ($dm_val + $dp_val) > 0 ? $dm_val / ($dm_val + $dp_val) : 0;
            $rankTp[$i] = $score;
        }

        arsort($rankTp);
        
        $data['DP'] = $DP; // Note: View accesses $data['tp']['DP'.$i] directly from $data['tp']
        // So we must merge this into main array return.
        
        // Merge DP/DM keys into $data root
        foreach ($DP as $k => $v) $data[$k] = $v;
        foreach ($DM as $k => $v) $data[$k] = $v;

        $data['rankTp'] = $rankTp;
        $data['users'] = $users;
        
        return $data;
    }

    private function getSubCriteriaWeight($id_sub, $subCriteria) {
        if (!$id_sub) return 0;
        foreach ($subCriteria as $sub) {
            if ($sub['id_sub'] == $id_sub) {
                return $sub['bobot_sub'];
            }
        }
        // Fallback for missing data
        return 0;
    }
}
