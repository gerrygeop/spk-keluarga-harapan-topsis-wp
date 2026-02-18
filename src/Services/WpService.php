<?php

namespace App\Services;

class WpService {

    public function calculate($alternatives, $criteriaWeights, $subCriteria) {
        $data = [];
        
        // 1. Normalisasi Bobot (W)
        // View expects: $data['wp']['W']['w'.$i]
        $totalBobot = 0;
        foreach ($criteriaWeights as $c) {
            $totalBobot += $c['nilai_bk'];
        }
        
        $W = [];
        $normWeights = []; // [id_ktr] => val
        foreach ($criteriaWeights as $c) {
            $j = $c['id_ktr'];
            $val = $c['nilai_bk'] / $totalBobot;
            $W['w'.$j] = $val;
            $normWeights[$j] = $val;
        }
        $data['W'] = $W;

        // 2. Menghitung Pangkat (S) u/ Vektor S logic
        // View expects $data['wp']['S'][id?]
        
        $S = [];
        $users = [];
        
        foreach ($alternatives as $alt) {
            $i = $alt['id_alt'];
            $users[$i] = $alt['nama'];
            
            $product = 1;
            
            foreach ($criteriaWeights as $c) {
                $j = $c['id_ktr'];
                $w = $normWeights[$j];
                
                $id_sub = $alt['nilai_kriteria'][$j] ?? null;
                $bobot_sub = $this->getSubCriteriaWeight($id_sub, $subCriteria);
                
                // Benefit logic assumed
                 // Prevent zero value issue in product
                $base = ($bobot_sub == 0) ? 0.001 : $bobot_sub; 
                
                $val = pow($base, $w);
                $product *= $val;
            }
            // Key format for S? View uses foreach($data['wp']['S'] as $s)
            // It doesn't seem to use key in loop body, except "A".$i where $i is loop index.
            // But results must match rows.
            // If we key by ID, and foreach iterates, order matters?
            // View loop: $i=1; foreach... A.$i
            // If we use ID keys, we must ensure order matches "Alt" display?
            // Since ID are used for Rank map, it uses ID key.
            // For S, using ID key is safer.
            $S[$i] = $product;
        }
        $data['S'] = $S;

        // 3. Menghitung V (Preferensi)
        $totalS = array_sum($S);
        $V = [];
        $rankWp = [];
        
        foreach ($S as $i => $s_val) {
            $v_val = ($totalS > 0) ? $s_val / $totalS : 0;
            $V['V'.$i] = $v_val; // View uses ['V'] array iterator
            // Actually view iterates $data['wp']['V'] as $v.
            
            $rankWp[$i] = $v_val;
        }
        $data['V'] = $V; // Keys V1, V2 etc? Or just values?
        // View: foreach($data['wp']['V'] as $v) ... A.$i
        // It iterates naturally. So order should match S.
        
        arsort($rankWp);
        $data['rankWp'] = $rankWp;
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
        return 0; 
    }
}
