<?php

class PerhitunganModel extends Controller{


    public function hitungTP($dataTp)
    {
        $alternatif = count($dataTp['alt']);
        $bobotKtr = [0.5, 0.3, 0.5, 0.3, 0.3, 0.3, 0.5, 0.3, 0.4, 0.3, 0.2];
        
        $k = 1;
        foreach ($dataTp['alt'] as $alt) {
            foreach ($dataTp['sub'] as $sub) {
                $alt['c1'] == $sub['id_sub'] ? $X['C1-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c2'] == $sub['id_sub'] ? $X['C2-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c3'] == $sub['id_sub'] ? $X['C3-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c4'] == $sub['id_sub'] ? $X['C4-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c5'] == $sub['id_sub'] ? $X['C5-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c6'] == $sub['id_sub'] ? $X['C6-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c7'] == $sub['id_sub'] ? $X['C7-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c8'] == $sub['id_sub'] ? $X['C8-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c9'] == $sub['id_sub'] ? $X['C9-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c10'] == $sub['id_sub'] ? $X['C10-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c11'] == $sub['id_sub'] ? $X['C11-'.$k] = $sub['bobot_sub'] : 0;
            }
            $k++;
        }

        // Normalisasi
        for ($j=1; $j <= 11; $j++) { 
            for ($i=1; $i <= $alternatif; $i++) { 
                $pow[] = pow($X['C'.$j.'-'.$i], 2);
            }
            $X['X'.$j] = array_sum($pow);
            $X['X'.$j] = sqrt($X['X'.$j]);
            unset($pow);
        }


        // Ternormalisasi terbobot
        for ($j=1; $j <= 11; $j++) { 
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R'.$j.'-'.$i] = $X['C'.$j.'-'.$i] / $X['X'.$j];
                $ideal[] = $V['V'.$j.'-'.$i] = $bobotKtr[$j-1] * $R['R'.$j.'-'.$i];
            }

            $Amax[] = max($ideal);
            $Amin[] = min($ideal);
            unset($ideal);

            for ($d=1; $d <= $alternatif; $d++) {
                $dmax['P'.$j.'-'.$d] = pow($Amax[$j-1] - $V['V'.$j.'-'.$d], 2);
                $dmin['P'.$j.'-'.$d] = pow($V['V'.$j.'-'.$d] - $Amin[$j-1], 2);
            }
        }


        /*==================== A1 [D+] ====================*/
        for ($i=1; $i <= $alternatif; $i++) { 
            for ($j=1; $j <= 11; $j++) {
                $dp[] = $dmax['P'.$j.'-'.$i]; 
                $dm[] = $dmin['P'.$j.'-'.$i]; 
            }
            $data['DP'.$i] = array_sum($dp);
            $data['DP'.$i] = sqrt($data['DP'.$i]);
            unset($dp);

            $data['DM'.$i] = array_sum($dm);
            $data['DM'.$i] = sqrt($data['DM'.$i]);
            unset($dm);
        }
        
        for ($i=1; $i <= $alternatif; $i++) { 
            $rank[$i] = $data['DM'.$i] / ($data['DM'.$i] + $data['DP'.$i]);
        }

        $data['X'] = $R;
        $data['V'] = $V;
        arsort($rank);
        $data['rankTp'] = $rank;

        return $data;
    }


    public function hitungWP($dataWp)
    {
        $alternatif = count($dataWp['alt']);

        $k = 1;
        foreach ($dataWp['alt'] as $alt) {
            foreach ($dataWp['sub'] as $sub) {
                $alt['c1'] == $sub['id_sub'] ? $key['C1-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c2'] == $sub['id_sub'] ? $key['C2-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c3'] == $sub['id_sub'] ? $key['C3-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c4'] == $sub['id_sub'] ? $key['C4-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c5'] == $sub['id_sub'] ? $key['C5-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c6'] == $sub['id_sub'] ? $key['C6-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c7'] == $sub['id_sub'] ? $key['C7-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c8'] == $sub['id_sub'] ? $key['C8-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c9'] == $sub['id_sub'] ? $key['C9-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c10'] == $sub['id_sub'] ? $key['C10-'.$k] = $sub['bobot_sub'] : 0;
                $alt['c11'] == $sub['id_sub'] ? $key['C11-'.$k] = $sub['bobot_sub'] : 0;
            }
            $k++;
        }
        
        // Nilai dari table kriteria simpan ke variabel nilai
        foreach ($dataWp['nilai'] as $n) {
            $nilai[] = $n['nilai_bk'];
        }

        // Normalisasi Bobot
        for ($i=1; $i <= 11; $i++) { 
            $w['w'.$i] = $nilai[$i-1] / array_sum($nilai);
        }

        // Pangkat C1 => C11 ^ W1 => W11
        for ($i=1; $i <= $alternatif; $i++) { 
            for ($j=1; $j <= 11; $j++) { 
                $p['p'.$j.'-'.$i] = pow($key['C'.$j.'-'.$i], $w['w'.$j]);
            }
        }


        // Mencari Nilai S
        for ($i=1; $i <= $alternatif; $i++) { 
            $S['S'.$i] = $p['p1-'.$i]*$p['p2-'.$i]*$p['p3-'.$i]*$p['p4-'.$i]*$p['p5-'.$i]*$p['p6-'.$i]*$p['p7-'.$i]*$p['p8-'.$i]*$p['p9-'.$i]*$p['p10-'.$i]*$p['p11-'.$i];
        }

        // Mencari Nilai V
        for ($i=1; $i <= $alternatif; $i++) { 
            $rank[$i] = $V['V'.$i] = $S['S'.$i] / array_sum($S);
        }

        $data['W'] = $w;
        $data['S'] = $S;
        $data['V'] = $V;

        arsort($rank);
        $data['rankWp'] = $rank;

        return $data;
    }
}