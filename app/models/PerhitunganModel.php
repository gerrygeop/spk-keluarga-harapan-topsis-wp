<?php

class PerhitunganModel extends Controller{


    public function hitungTP($dataTp)
    {
        $alternatif = count($dataTp['alt']);
        $bobot = [0.5, 0.3, 0.5, 0.3, 0.3, 0.3, 0.5, 0.3, 0.4, 0.3, 0.2];
        
        $k = 1;
        foreach ($dataTp['alt'] as $alt) {
            foreach ($dataTp['sub'] as $sub) {
                $alt['c1'] == $sub['id_sub'] ? $X['C1'.$k] = $sub['bobot_sub'] : 0;
                $alt['c2'] == $sub['id_sub'] ? $X['C2'.$k] = $sub['bobot_sub'] : 0;
                $alt['c3'] == $sub['id_sub'] ? $X['C3'.$k] = $sub['bobot_sub'] : 0;
                $alt['c4'] == $sub['id_sub'] ? $X['C4'.$k] = $sub['bobot_sub'] : 0;
                $alt['c5'] == $sub['id_sub'] ? $X['C5'.$k] = $sub['bobot_sub'] : 0;
                $alt['c6'] == $sub['id_sub'] ? $X['C6'.$k] = $sub['bobot_sub'] : 0;
                $alt['c7'] == $sub['id_sub'] ? $X['C7'.$k] = $sub['bobot_sub'] : 0;
                $alt['c8'] == $sub['id_sub'] ? $X['C8'.$k] = $sub['bobot_sub'] : 0;
                $alt['c9'] == $sub['id_sub'] ? $X['C9'.$k] = $sub['bobot_sub'] : 0;
                $alt['c10'] == $sub['id_sub'] ? $X['C10'.$k] = $sub['bobot_sub'] : 0;
                $alt['c11'] == $sub['id_sub'] ? $X['C11'.$k] = $sub['bobot_sub'] : 0;
            }
            $k++;
        }

        for ($j=1; $j <= 11; $j++) { 
            for ($i=1; $i <= $alternatif; $i++) { 
                $pow[] = pow($X['C'.$j.$i], 2);
            }
            $X['X'.$j] = array_sum($pow);
            $X['X'.$j] = sqrt($X['X'.$j]);
            unset($pow);
        }

        for ($j=1; $j <= 11; $j++) { 
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R'.$j.$i] = $X['C'.$j.$i] / $X['X'.$j];
                $ideal[] = $V['V'.$j.$i] = $bobot[$j-1] * $R['R'.$j.$i];
            }

            $Amax[] = max($ideal);
            $Amin[] = min($ideal);
            unset($ideal);

            for ($d=1; $d <= $alternatif; $d++) {
                $dmax['P'.$j.$d] = pow($Amax[$j-1] - $V['V'.$j.$d], 2);
                $dmin['P'.$j.$d] = pow($V['V'.$j.$d] - $Amin[$j-1], 2);
            }
        }


        /*==================== START C1 ====================*/
            
            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R1'.$i] = $X['C1'.$i] / $X['X'.$i];
            //         $max[] = $V['V1'.$i] = 0.5 * $R['R1'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P1'.$i] = pow($Amax[0] - $V['V1'.$i], 2);
            //         $dmin['P1'.$i] = pow($V['V1'.$i] - $Amin[0], 2);
            //     }
            // /*==================== END C1 ===================*/

            // /*==================== START C2 ====================*/
            //     // $X2 = array_sum($pow2);
            //     // $X2 = sqrt($X2);
                
            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R2'.$i] = $X['C2'.$i] / $X2;
            //         $max[] = $V['V2'.$i] = 0.3 * $R['R2'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P2'.$i] = pow($Amax[1] - $V['V2'.$i], 2);
            //         $dmin['P2'.$i] = pow($V['V2'.$i] - $Amin[1], 2);
            //     }
            // /*==================== END C2 ====================*/

            // /*==================== START C3 ====================*/
            //     // $X3 = array_sum($pow3);
            //     // $X3 = sqrt($X3);

            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R3'.$i] = $X['C3'.$i] / $X3;
            //         $max[] = $V['V3'.$i] = 0.5 * $R['R3'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P3'.$i] = pow($Amax[2] - $V['V3'.$i], 2);
            //         $dmin['P3'.$i] = pow($V['V3'.$i] - $Amin[2], 2);
            //     }
            // /*==================== END C3 ====================*/

            // /*==================== START C4 ====================*/
            //     // $X4 = array_sum($pow4);
            //     // $X4 = sqrt($X4);

            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R4'.$i] = $X['C4'.$i] / $X4;
            //         $max[] = $V['V4'.$i] = 0.3 * $R['R4'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P4'.$i] = pow($Amax[3] - $V['V4'.$i], 2);
            //         $dmin['P4'.$i] = pow($V['V4'.$i] - $Amin[3], 2);
            //     }
            // /*==================== END C4 ====================*/

            // /*==================== START C5 ====================*/
            //     // $X5 = array_sum($pow5);
            //     // $X5 = sqrt($X5);

            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R5'.$i] = $X['C5'.$i] / $X5;
            //         $max[] = $V['V5'.$i] = 0.3 * $R['R5'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P5'.$i] = pow($Amax[4] - $V['V5'.$i], 2);
            //         $dmin['P5'.$i] = pow($V['V5'.$i] - $Amin[4], 2);
            //     }
            // /*==================== END C5 ====================*/

            // /*==================== START C6 ====================*/
            //     // $X6 = array_sum($pow6);
            //     // $X6 = sqrt($X6);

            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R6'.$i] = $X['C6'.$i] / $X6;
            //         $max[] = $V['V6'.$i] = 0.3 * $R['R6'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P6'.$i] = pow($Amax[5] - $V['V6'.$i], 2);
            //         $dmin['P6'.$i] = pow($V['V6'.$i] - $Amin[5], 2);
            //     }
            // /*==================== END C6 ====================*/

            // /*==================== START C7 ====================*/
            //     // $X7 = array_sum($pow7);
            //     // $X7 = sqrt($X7);

            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R7'.$i] = $X['C7'.$i] / $X7;
            //         $max[] = $V['V7'.$i] = 0.5 * $R['R7'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P7'.$i] = pow($Amax[6] - $V['V7'.$i], 2);
            //         $dmin['P7'.$i] = pow($V['V7'.$i] - $Amin[6], 2);
            //     }
            // /*==================== END C7 ====================*/

            // /*==================== START C8 ====================*/
            //     // $X8 = array_sum($pow8);
            //     // $X8 = sqrt($X8);

            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R8'.$i] = $X['C8'.$i] / $X8;
            //         $max[] = $V['V8'.$i] = 0.3 * $R['R8'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P8'.$i] = pow($Amax[7] - $V['V8'.$i], 2);
            //         $dmin['P8'.$i] = pow($V['V8'.$i] - $Amin[7], 2);
            //     }
            // /*==================== END C8 ====================*/

            // /*==================== START C9 ====================*/
            //     // $X9 = array_sum($pow9);
            //     // $X9 = sqrt($X9);
                
            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R9'.$i] = $X['C9'.$i] / $X9;
            //         $max[] = $V['V9'.$i] = 0.4 * $R['R9'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P9'.$i] = pow($Amax[8] - $V['V9'.$i], 2);
            //         $dmin['P9'.$i] = pow($V['V9'.$i] - $Amin[8], 2);
            //     }
            // /*==================== END C9 ====================*/

            // /*==================== START C10 ====================*/
            //     // $X10 = array_sum($pow10);
            //     // $X10 = sqrt($X10);
                
            //     for ($i=1; $i <= $alternatif; $i++) { 
            //         $R['R10'.$i] = $X['C10'.$i] / $X10;
            //         $max[] = $V['V10'.$i] = 0.3 * $R['R10'.$i];
            //     }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P10'.$i] = pow($Amax[9] - $V['V10'.$i], 2);
            //         $dmin['P10'.$i] = pow($V['V10'.$i] - $Amin[9], 2);
            //     }
            // /*==================== END C10 ====================*/

            // /*==================== START C11 ====================*/
            //     // $X11 = array_sum($pow11);
            //     // $X11 = sqrt($X11);

            //     for ($j=1; $j <= 11; $j++) { 
            //         for ($i=1; $i <= $alternatif; $i++) { 
            //             $R['R'.$j.$i] = $X['C'.$j.$i] / $X['X'.$j.$i];
            //             $max[] = $V['V'.$j.$i] = 0.2 * $R['R'.$j.$i];
            //         }
            //         $Amax[] = max($max);
            //         $Amin[] = min($max);
            //         unset($max);

            //         for ($d=1; $d <= $alternatif; $d++) {
            //             $dmax['P'.$j.$d] = pow($Amax[10] - $V['V'.$j.$d], 2);
            //             $dmin['P'.$j.$d] = pow($V['V'.$j.$d] - $Amin[10], 2);
            //         }
            //     }

            //     // for ($i=1; $i <= $alternatif; $i++) { 
            //     //     $R['R11'.$i] = $X['C11'.$i] / $X11;
            //     //     $max[] = $V['V11'.$i] = 0.2 * $R['R11'.$i];
            //     // }
            //     $Amax[] = max($max);
            //     $Amin[] = min($max);
            //     unset($max);
            //     for ($i=1; $i <= $alternatif; $i++) {
            //         $dmax['P11'.$i] = pow($Amax[10] - $V['V11'.$i], 2);
            //         $dmin['P11'.$i] = pow($V['V11'.$i] - $Amin[10], 2);
            //     }
        /*==================== END C11 ====================*/



        /*==================== START A1 [D+] ====================*/
        for ($i=1; $i <= $alternatif; $i++) { 
            for ($j=1; $j <= 11; $j++) {
                $dp[] = $dmax['P'.$j.$i]; 
                $dm[] = $dmin['P'.$j.$i]; 
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
        // $c[] = $this->model('KriteriaModel')->temp($dataWp);
        $k = 1;
        foreach ($dataWp['alt'] as $alt) {
            foreach ($dataWp['sub'] as $sub) {
                $alt['c1'] == $sub['id_sub'] ? $key['C1'.$k] = $sub['bobot_sub'] : 0;
                $alt['c2'] == $sub['id_sub'] ? $key['C2'.$k] = $sub['bobot_sub'] : 0;
                $alt['c3'] == $sub['id_sub'] ? $key['C3'.$k] = $sub['bobot_sub'] : 0;
                $alt['c4'] == $sub['id_sub'] ? $key['C4'.$k] = $sub['bobot_sub'] : 0;
                $alt['c5'] == $sub['id_sub'] ? $key['C5'.$k] = $sub['bobot_sub'] : 0;
                $alt['c6'] == $sub['id_sub'] ? $key['C6'.$k] = $sub['bobot_sub'] : 0;
                $alt['c7'] == $sub['id_sub'] ? $key['C7'.$k] = $sub['bobot_sub'] : 0;
                $alt['c8'] == $sub['id_sub'] ? $key['C8'.$k] = $sub['bobot_sub'] : 0;
                $alt['c9'] == $sub['id_sub'] ? $key['C9'.$k] = $sub['bobot_sub'] : 0;
                $alt['c10'] == $sub['id_sub'] ? $key['C10'.$k] = $sub['bobot_sub'] : 0;
                $alt['c11'] == $sub['id_sub'] ? $key['C11'.$k] = $sub['bobot_sub'] : 0;
            }
            $k++;
        }
        
        // Nilai dari table kriteria ke array nilai
        foreach ($dataWp['nilai'] as $n) {
            $nilai[] = $n['nilai_bk'];
        }

        // Normalisasi Bobot
        for ($i=1; $i <= 11; $i++) { 
            $w['w'.$i] = $nilai[$i-1] / array_sum($nilai);
        }

        // Pangkat C1 => C11 ^ W1 => W11
        for ($i=1; $i <= 10; $i++) { 
            $p['p1'.$i] = pow($key['C1'.$i], $w['w1']);
            $p['p2'.$i] = pow($key['C2'.$i], $w['w2']);
            $p['p3'.$i] = pow($key['C3'.$i], $w['w3']);
            $p['p4'.$i] = pow($key['C4'.$i], $w['w4']);
            $p['p5'.$i] = pow($key['C5'.$i], $w['w5']);
            $p['p6'.$i] = pow($key['C6'.$i], $w['w6']);
            $p['p7'.$i] = pow($key['C7'.$i], $w['w7']);
            $p['p8'.$i] = pow($key['C8'.$i], $w['w8']);
            $p['p9'.$i] = pow($key['C9'.$i], $w['w9']);
            $p['p10'.$i] = pow($key['C10'.$i], $w['w10']);
            $p['p11'.$i] = pow($key['C11'.$i], $w['w11']);
        }

        // Mencari Nilai S
        for ($i=1; $i <= 10; $i++) { 
            $S['S'.$i] = $p['p1'.$i]*$p['p2'.$i]*$p['p3'.$i]*$p['p4'.$i]*$p['p5'.$i]*$p['p6'.$i]*$p['p7'.$i]*$p['p8'.$i]*$p['p9'.$i]*$p['p10'.$i]*$p['p11'.$i];
        }

        // Mencari Nilai V
        for ($i=1; $i <= 10; $i++) { 
            $rank[$i] = $V['V'.$i] = $S['S'.$i] / array_sum($S);
        }

        $data['W'] = $w;
        $data['S'] = $S;
        $data['V'] = $V;
        $data['rankWp'] = $rank;

        return $data;
    }
}