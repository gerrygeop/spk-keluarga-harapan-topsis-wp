<?php

class PerhitunganModel extends Controller{


    public function hitungTP($dataTp)
    {
        $alternatif = count($dataTp['alt']);
        
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

        $Amax = []; $Amin = [];

        for ($i=1; $i <= $alternatif; $i++) { 
            $pow1[] = pow($X['C1'.$i], 2);
            $pow2[] = pow($X['C2'.$i], 2);
            $pow3[] = pow($X['C3'.$i], 2);
            $pow4[] = pow($X['C4'.$i], 2);
            $pow5[] = pow($X['C5'.$i], 2);
            $pow6[] = pow($X['C6'.$i], 2);
            $pow7[] = pow($X['C7'.$i], 2);
            $pow8[] = pow($X['C8'.$i], 2);
            $pow9[] = pow($X['C9'.$i], 2);
            $pow10[] = pow($X['C10'.$i], 2);
            $pow11[] = pow($X['C11'.$i], 2);
        }

        /*==================== START C1 ====================*/
            $X1 = array_sum($pow1);
            $X1 = sqrt($X1);
            
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R1'.$i] = $X['C1'.$i] / $X1;
                $max[] = $V['V1'.$i] = 0.5 * $R['R1'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P1'.$i] = pow($Amax[0] - $V['V1'.$i], 2);
                $bow['P1'.$i] = pow($V['V1'.$i] - $Amin[0], 2);
            }
        /*==================== END C1 ===================*/

        /*==================== START C2 ====================*/
            $X2 = array_sum($pow2);
            $X2 = sqrt($X2);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R2'.$i] = $X['C2'.$i] / $X2;
                $max[] = $V['V2'.$i] = 0.3 * $R['R2'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P2'.$i] = pow($Amax[1] - $V['V2'.$i], 2);
                $bow['P2'.$i] = pow($V['V2'.$i] - $Amin[1], 2);
            }
        /*==================== END C2 ====================*/

        /*==================== START C3 ====================*/
            $X3 = array_sum($pow3);
            $X3 = sqrt($X3);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R3'.$i] = $X['C3'.$i] / $X3;
                $max[] = $V['V3'.$i] = 0.5 * $R['R3'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P3'.$i] = pow($Amax[2] - $V['V3'.$i], 2);
                $bow['P3'.$i] = pow($V['V3'.$i] - $Amin[2], 2);
            }
        /*==================== END C3 ====================*/

        /*==================== START C4 ====================*/
            $X4 = array_sum($pow4);
            $X4 = sqrt($X4);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R4'.$i] = $X['C4'.$i] / $X4;
                $max[] = $V['V4'.$i] = 0.3 * $R['R4'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P4'.$i] = pow($Amax[3] - $V['V4'.$i], 2);
                $bow['P4'.$i] = pow($V['V4'.$i] - $Amin[3], 2);
            }
        /*==================== END C4 ====================*/

        /*==================== START C5 ====================*/
            $X5 = array_sum($pow5);
            $X5 = sqrt($X5);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R5'.$i] = $X['C5'.$i] / $X5;
                $max[] = $V['V5'.$i] = 0.3 * $R['R5'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P5'.$i] = pow($Amax[4] - $V['V5'.$i], 2);
                $bow['P5'.$i] = pow($V['V5'.$i] - $Amin[4], 2);
            }
        /*==================== END C5 ====================*/

        /*==================== START C6 ====================*/
            $X6 = array_sum($pow6);
            $X6 = sqrt($X6);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R6'.$i] = $X['C6'.$i] / $X6;
                $max[] = $V['V6'.$i] = 0.3 * $R['R6'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P6'.$i] = pow($Amax[5] - $V['V6'.$i], 2);
                $bow['P6'.$i] = pow($V['V6'.$i] - $Amin[5], 2);
            }
        /*==================== END C6 ====================*/

        /*==================== START C7 ====================*/
            $X7 = array_sum($pow7);
            $X7 = sqrt($X7);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R7'.$i] = $X['C7'.$i] / $X7;
                $max[] = $V['V7'.$i] = 0.5 * $R['R7'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P7'.$i] = pow($Amax[6] - $V['V7'.$i], 2);
                $bow['P7'.$i] = pow($V['V7'.$i] - $Amin[6], 2);
            }
        /*==================== END C7 ====================*/

        /*==================== START C8 ====================*/
            $X8 = array_sum($pow8);
            $X8 = sqrt($X8);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R8'.$i] = $X['C8'.$i] / $X8;
                $max[] = $V['V8'.$i] = 0.3 * $R['R8'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P8'.$i] = pow($Amax[7] - $V['V8'.$i], 2);
                $bow['P8'.$i] = pow($V['V8'.$i] - $Amin[7], 2);
            }
        /*==================== END C8 ====================*/

        /*==================== START C9 ====================*/
            $X9 = array_sum($pow9);
            $X9 = sqrt($X9);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R9'.$i] = $X['C9'.$i] / $X9;
                $max[] = $V['V9'.$i] = 0.4 * $R['R9'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P9'.$i] = pow($Amax[8] - $V['V9'.$i], 2);
                $bow['P9'.$i] = pow($V['V9'.$i] - $Amin[8], 2);
            }
        /*==================== END C9 ====================*/

        /*==================== START C10 ====================*/
            $X10 = array_sum($pow10);
            $X10 = sqrt($X10);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R10'.$i] = $X['C10'.$i] / $X10;
                $max[] = $V['V10'.$i] = 0.3 * $R['R10'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P10'.$i] = pow($Amax[9] - $V['V10'.$i], 2);
                $bow['P10'.$i] = pow($V['V10'.$i] - $Amin[9], 2);
            }
        /*==================== END C10 ====================*/

        /*==================== START C11 ====================*/
            $X11 = array_sum($pow11);
            $X11 = sqrt($X11);
            for ($i=1; $i <= $alternatif; $i++) { 
                $R['R11'.$i] = $X['C11'.$i] / $X11;
                $max[] = $V['V11'.$i] = 0.2 * $R['R11'.$i];
            }
            $Amax[] = max($max);
            $Amin[] = min($max);
            // var_dump($Amin);
            unset($max);
            for ($i=1; $i <= $alternatif; $i++) {
                $pow['P11'.$i] = pow($Amax[10] - $V['V11'.$i], 2);
                $bow['P11'.$i] = pow($V['V11'.$i] - $Amin[10], 2);
            }
        /*==================== END C11 ====================*/



        /*==================== START A1 [D+] ====================*/
        for ($i=1; $i <= $alternatif; $i++) { 
            for ($j=1; $j <= 11; $j++) {
                $dp[] = $pow['P'.$j.$i]; 
                $dm[] = $bow['P'.$j.$i]; 
            }
            $data['DP'.$i] = array_sum($dp);
            $data['DP'.$i] = sqrt($data['DP'.$i]);
            unset($dp);

            $data['DM'.$i] = array_sum($dm);
            $data['DM'.$i] = sqrt($data['DM'.$i]);
            unset($dm);
        }

        /* ===Kode Lama yang berfaedah=== */
            // var_dump($dp);

            // $k
            // for ($i=1; $i <= $alternatif; $i++) { 
            //     $data['DP'.$i] = array_sum($max);
            //     $data['DP'.$i] = sqrt($data['DP'.$i]);
            //     unset($max);

            //     $data['DM'.$i] = array_sum($min);
            //     $data['DM'.$i] = sqrt($data['DM'.$i]);
            //     unset($min);
            // }
            
            // /*==================== START A2 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'2']; 
            //     //     $dm[] = $bow['P'.$j.'2']; 
            //     // }
            //     $data['DP2'] = array_sum($dp);
            //     $data['DP2'] = sqrt($data['DP2']);
            //     unset($dp);
            //     $data['DM2'] = array_sum($dm);
            //     $data['DM2'] = sqrt($data['DM2']);
            //     unset($dm);
            
            // /*==================== START A3 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'3']; 
            //     //     $dm[] = $bow['P'.$j.'3']; 
            //     // }
            //     $data['DP3'] = array_sum($dp);
            //     $data['DP3'] = sqrt($data['DP3']);
            //     unset($dp);
            //     $data['DM3'] = array_sum($dm);
            //     $data['DM3'] = sqrt($data['DM3']);
            //     unset($dm);
            
            // /*==================== START A4 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'4']; 
            //     //     $dm[] = $bow['P'.$j.'4']; 
            //     // }
            //     $data['DP4'] = array_sum($dp);
            //     $data['DP4'] = sqrt($data['DP4']);
            //     unset($dp);
            //     $data['DM4'] = array_sum($dm);
            //     $data['DM4'] = sqrt($data['DM4']);
            //     unset($dm);

            // /*==================== START A5 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'5']; 
            //     //     $dm[] = $bow['P'.$j.'5']; 
            //     // }
            //     $data['DP5'] = array_sum($dp);
            //     $data['DP5'] = sqrt($data['DP5']);
            //     unset($dp);
            //     $data['DM5'] = array_sum($dm);
            //     $data['DM5'] = sqrt($data['DM5']);
            //     unset($dm);
            
            // /*==================== START A6 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'6']; 
            //     //     $dm[] = $bow['P'.$j.'6']; 
            //     // }
            //     $data['DP6'] = array_sum($dp);
            //     $data['DP6'] = sqrt($data['DP6']);
            //     unset($dp);
            //     $data['DM6'] = array_sum($dm);
            //     $data['DM6'] = sqrt($data['DM6']);
            //     unset($dm);
            
            // /*==================== START A7 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'7']; 
            //     //     $dm[] = $bow['P'.$j.'7']; 
            //     // }
            //     $data['DP7'] = array_sum($dp);
            //     $data['DP7'] = sqrt($data['DP7']);
            //     unset($dp);
            //     $data['DM7'] = array_sum($dm);
            //     $data['DM7'] = sqrt($data['DM7']);
            //     unset($dm);
            
            // /*==================== START A8 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'8']; 
            //     //     $dm[] = $bow['P'.$j.'8']; 
            //     // }
            //     $data['DP8'] = array_sum($dp);
            //     $data['DP8'] = sqrt($data['DP8']);
            //     unset($dp);
            //     $data['DM8'] = array_sum($dm);
            //     $data['DM8'] = sqrt($data['DM8']);
            //     unset($dm);
            

            // /*==================== START A9 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'9']; 
            //     //     $dm[] = $bow['P'.$j.'9']; 
            //     // }
            //     $data['DP9'] = array_sum($dp);
            //     $data['DP9'] = sqrt($data['DP9']);
            //     unset($dp);
            //     $data['DM9'] = array_sum($dm);
            //     $data['DM9'] = sqrt($data['DM9']);
            //     unset($dm);
            
            // /*==================== START A10 [D+] ====================*/
            //     // for ($j=1; $j <= 11; $j++) { 
            //     //     $dp[] = $pow['P'.$j.'10']; 
            //     //     $dm[] = $bow['P'.$j.'10']; 
            //     // }
            //     $data['DP10'] = array_sum($dp);
            //     $data['DP10'] = sqrt($data['DP10']);
            //     unset($dp);
            //     $data['DM10'] = array_sum($dm);
            //     $data['DM10'] = sqrt($data['DM10']);
            //     unset($dm);
        /* ============================== */
        
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