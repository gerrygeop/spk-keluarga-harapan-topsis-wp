<div class="container">
    <div class="px-2 py-3 mb-5">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-topsis-tab" data-bs-toggle="tab" data-bs-target="#nav-topsis" type="button" role="tab" aria-controls="nav-topsis" aria-selected="false">TOPSIS</button>
                <button class="nav-link" id="nav-wp-tab" data-bs-toggle="tab" data-bs-target="#nav-wp" type="button" role="tab" aria-controls="nav-wp" aria-selected="false">WP</button>
                <button class="nav-link active" id="nav-perbandingan-tab" data-bs-toggle="tab" data-bs-target="#nav-perbandingan" type="button" role="tab" aria-controls="nav-perbandingan" aria-selected="true">Perbandingan</button>
            </div>
        </nav>
    
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade py-4" id="nav-topsis" role="tabpanel" aria-labelledby="nav-topsis-tab">

                <div class="mb-5">
                    <h4 class="text-secondary">
                        #Menentukan matriks keputusan ternormalisasi
                    </h4>
                    <div class="py-2 px-3 my-3 shadow border border-1 rounded table-responsive">
                        <table class="table table-sm align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Alt</th>
                                    <?php for ($i=1; $i <= 11; $i++) { ?>
                                        <th scope="col">
                                            <?= 'C' . $i; ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i = 1; $i <= 10; $i++) { ?>
                                    <tr class="text-center">
                                        <th scope="row">
                                            <?= 'A' . $i; ?>
                                        </th>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R1'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R2'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R3'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R4'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R5'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R6'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R7'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R8'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R9'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R10'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['X']['R11'.$i], 0, 6); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#matrix-bobot">
                        Matriks keputusan ternormalisasi terbobot
                    </a>
                </div>

                <div class="collapse mb-5" id="matrix-bobot">
                    <h4 class="text-secondary">
                        #Matriks keputusan ternormalisasi terbobot
                    </h4>
                    <div class="py-2 px-3 my-3 shadow border border-1 rounded table-responsive">
                        <table class="table table-sm align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Alt</th>
                                    <?php for ($i=1; $i <= 11; $i++) { ?>
                                        <th scope="col">
                                            <?= 'C' . $i; ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i = 1; $i <= 10; $i++) { ?>
                                    <tr class="text-center">
                                        <th scope="row">
                                            <?= 'A' . $i; ?>
                                        </th>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V1'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V2'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V3'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V4'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V5'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V6'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V7'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V8'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V9'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V10'.$i], 0, 6); ?>
                                        </td>
                                        <td class="py-2 px-3">
                                            <?= substr($data['tp']['V']['V11'.$i], 0, 6); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#solusi-ideal">
                        Solusi ideal positif dan negatif
                    </a>
                </div>

                <div class="collapse mb-5" id="solusi-ideal">
                    <h4 class="text-secondary">
                        #Solusi ideal positif dan negatif
                    </h4>
                     <div class="col-sm col-lg-6 py-2 px-4 my-3 shadow border border-1 rounded table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th class="col-2">Alt</th>
                                    <th class="col-4">D+</th>
                                    <th class="col-4">D-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i=1; $i <=10; $i++) { ?>
                                    <tr class="text-center">
                                        <th>
                                            <?= 'A' . $i; ?>
                                        </th>
                                        <td>
                                            <?= substr($data['tp']['DP'.$i], 0, 6); ?>
                                        </td>
                                        <td>
                                            <?= substr($data['tp']['DM'.$i], 0, 6); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#ranking-topsis">
                        Ranking Topsis
                    </a>
                </div>

                <div class="collapse mb-5" id="ranking-topsis">
                    <h4 class="text-secondary">
                        #Ranking Topsis
                    </h4>
                     <div class="col-sm col-lg-6 py-2 px-4 my-3 shadow border border-1 rounded table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th>Alt</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    arsort($data['tp']['rankTp']);
                                    foreach($data['tp']['rankTp'] as $key => $value) { 
                                ?>
                                    <tr class="text-center">
                                        <th>
                                            <?= 'A'.$key;?>
                                        </th>
                                        <td>
                                            <?= substr($value, 0, 6); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div> 
            <!-- End Topsis -->

            <div class="tab-pane fade py-4" id="nav-wp" role="tabpanel" aria-labelledby="nav-wp-tab">

                <div class="mb-5">
                    <h4 class="text-secondary">
                        #Normalisasi Bobot
                    </h4>
                    <div class="py-2 px-3 my-3 shadow border border-1 rounded table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <?php for ($i=1; $i <= 11; $i++) { ?>
                                        <th scope="col">
                                            <?= 'C' . $i; ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php for ($i=1; $i <= 11; $i++) { ?>
                                        <td>
                                            <?= substr($data['wp']['W']['w'.$i], 0, 6); ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#vektor-s">
                        Nilai Vektor S
                    </a>
                </div>

                <div class="collapse mb-5" id="vektor-s">
                    <h4 class="text-secondary">
                        #Nilai Vektor S
                    </h4>
                    <div class="col-sm col-lg-6 py-2 px-4 my-3 shadow border border-1 rounded table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th>Alt</th>
                                    <th>Nilai S</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($data['wp']['S'] as $s) { ?>
                                    <tr class="text-center">
                                        <th><?= 'A' . $i; ?></th>
                                        <td><?=  substr($s, 0, 6); ?></td>
                                    </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#vektor-v">
                        Nilai Vektor V
                    </a>
                </div>

                <div class="collapse mb-5" id="vektor-v">
                    <h4 class="text-secondary">
                        #Nilai Vektor V
                    </h4>
                    <div class="col-sm col-lg-6 py-2 px-4 my-3 shadow border border-1 rounded table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th>Alt</th>
                                    <th>Nilai V</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($data['wp']['V'] as $v) { ?>
                                    <tr class="text-center">
                                        <th><?= 'A' . $i; ?></th>
                                        <td><?=  substr($v, 0, 6); ?></td>
                                    </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#ranking-wp">
                        Lihat Ranking
                    </a>
                </div>

                <div class="collapse mb-5" id="ranking-wp">
                    <h4 class="text-secondary">
                        #Ranking WP
                    </h4>
                    <div class="col-sm col-lg-6 py-2 px-4 my-3 shadow border border-1 rounded">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th>Alt</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    arsort($data['wp']['rankWp']);
                                    foreach($data['wp']['rankWp'] as $key => $value) { 
                                ?>
                                    <tr class="text-center">
                                        <th>
                                            <?= 'A'.$key; ?>
                                        </th>
                                        <td>
                                            <?= substr($value, 0, 6); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- End WP -->


            <!-- Start Perbandinga -->
            <div class="tab-pane fade py-4 show active" id="nav-perbandingan" role="tabpanel" aria-labelledby="nav-perbandingan-tab">
                <div class="mb-5">
                    <h4 class="text-secondary ms-2">#Perbandingan metode FMADM TOPSIS & FMADM WP</h4>
                    <div class="row justify-content-between px-3">

                        <div class="col-sm col-lg-5 py-2 px-4 my-3 shadow border rounded">
                            <table class="table">
                                <caption>Ranking Metode TOPSIS</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">Alt</th>
                                        <th scope="col">TOPSIS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        arsort($data['tp']['rankTp']);
                                        foreach($data['tp']['rankTp'] as $key => $value) { 
                                    ?>
                                        <tr>
                                            <th>
                                                <?= 'A'.$key; ?>
                                            </th>
                                            <td>
                                                <?php
                                                    $tp[] = substr($value, 0, 6);
                                                    echo substr($value, 0, 6);
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="col-sm col-lg-5 py-2 px-4 my-3 shadow border rounded">
                            <table class="table">
                                <caption>Ranking Metode WP</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">Alt</th>
                                        <th scope="col">WP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        arsort($data['wp']['rankWp']);
                                        foreach($data['wp']['rankWp'] as $key => $value) { 
                                    ?>
                                        <tr>
                                            <th>
                                                <?= 'A'.$key; ?>
                                            </th>
                                            <td>
                                                <?php
                                                    $wp[] = substr($value, 0, 6);
                                                    echo substr($value, 0, 6);
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="my-5">
                    <h4 class="text-secondary text-center">#Tingkat kesesuaisan nilai standard error</h4>
                    <div class="row justify-content-center px-3">
                        <div class="col-sm col-lg-6 py-2 px-4 my-3 shadow border border-1 rounded table-responsive">
                            <?php
                                // TOPSIS
                                $Tps = array_sum($tp);
                                for ($i=0; $i <= 9; $i++) { $Tpp[$i] = pow($tp[$i], 2); }
                                $Tpp = array_sum($Tpp);
                                $S = ($Tps * $Tps) / 10;
                                $S = ($Tpp - $S) / 9;
                                $S = sqrt($S);
                                $SE = ($S * $S) / 10;
                                $TP = sqrt($SE);
                                $TP = 100 - ($TP / 100);

                                // WP
                                $Wps = array_sum($wp);
                                for ($i=0; $i <= 9; $i++) { $Wpp[$i] = pow($wp[$i], 2); }
                                $Wpp = array_sum($Wpp);
                                $S = ($Wps * $Wps) / 10;
                                $S = ($Wpp - $S) / 9;
                                $S = sqrt($S);
                                $SE = ($S * $S) / 10;
                                $WP = sqrt($SE);
                                $WP = 100 - ($WP / 100);
                            ?>
                            <table class="table">
                                <caption>
                                    Berdasarkan tingkat kesesuaian standard error maka metode terbaik adalah metode TOPSIS karena memiliki nilai terkecil yaitu seebesar <?= substr($TP, 0, 8) . '%'; ?>
                                </caption>
                                <thead>
                                    <tr>
                                        <th>TOPSIS</th>
                                        <th>WP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= substr($TP, 0, 8) . '%'; ?></td>
                                        <td><?= substr($WP, 0, 8) . '%'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- End Perbandingan -->

        </div>

    </div>
</div>