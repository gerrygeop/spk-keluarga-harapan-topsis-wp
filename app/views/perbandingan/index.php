<div class="container">
    <div class="px-2 py-3 mb-5">
        <h3 class="text-secondary">
            Hasil Rekomendasi
        </h3>

        <!-- Start Perbandingan -->
        <div class="d-flex flex-column-reverse">

            <div class="mb-3">
                <h4 class="text-secondary">Ranking metode TOPSIS </h4>
                <div class="row justify-content-between px-3">

                    <div class="col-sm col-lg-5 py-2 px-4 my-3 shadow border rounded">
                        <table class="table">
                            <!-- <caption>Ranking Metode TOPSIS</caption> -->
                            <thead>
                                <tr>
                                    <th scope="col">Alt</th>
                                    <th scope="col">Nama</th>
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
                                            <?php foreach ($data['alt'] as $alt) {
                                                if ($alt['id_alt'] == $key) {
                                                    echo $alt['nama'];
                                                }
                                            } ?>
                                        </td>
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
                    
                    <!-- Metode WP -->
                    <div class="col-sm col-lg-5 py-2 px-4 my-3 shadow border rounded visually-hidden">
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

            <div class="mb-5">
                <h4 class="text-secondary">Tingkat kesesuaisan nilai standard error</h4>
                <div class="row justify-content-center px-3">
                    <div class="col py-2 px-4 my-3 shadow border border-1 rounded table-responsive">
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

        <div>
            <a href="<?=BASEURL;?>/perbandingan/topsis" class="btn btn-warning">Detail TOPSIS</a>
            <a href="<?=BASEURL;?>/perbandingan/wp" class="btn btn-warning">Detail WP</a>
        </div>

    </div>
</div>