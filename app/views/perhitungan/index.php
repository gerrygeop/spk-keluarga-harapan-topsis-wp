<div class="container">
    <div class="px-2 py-3 mb-5">
        <h3 class="text-secondary">
            Hasil Rekomendasi
        </h3>

        <!-- Start perhitungan -->
        <div class="d-flex flex-column-reverse">

            <div class="mb-5">
                <h4 class="text-secondary">Ranking metode TOPSIS </h4>

                <div class="row px-2">

                    <div class="col-sm col-lg-5 py-2 px-4 my-3 shadow border rounded">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Alt</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">TOPSIS</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $jumlah = count($data['tp']['rankTp']);
                                    $lolos = 50 * $jumlah / 100;
                                    
                                    $i=1;
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
                                        <td>
                                            <?php if($i <= $lolos) {
                                                echo '<span class="badge bg-success">Diterima</span>';
                                                $i++;
                                            } else {
                                                echo '<span class="badge bg-danger">Tidak diterima</span>';
                                            } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Metode WP -->
                    <div class="col-4 visually-hidden">
                        <ul>
                            <?php foreach($data['wp']['rankWp'] as $value) { ?>
                                <li>
                                    <?php $wp[] = substr($value, 0, 6); ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="mb-5">
                <h4 class="text-secondary">Tingkat kesesuaisan nilai standard error</h4>
                <div class="row justify-content-center px-2">

                    <div class="col py-2 px-4 my-3 shadow border border-1 rounded table-responsive">
                        <?php
                            // TOPSIS
                            $Tps = array_sum($tp);
                            for ($i=0; $i <= $jumlah-1; $i++) { $Tpp[$i] = pow($tp[$i], 2); }
                            $Tpp['aksen'] = array_sum($Tpp);
                            $S = pow($Tps, 2) / $jumlah;
                            $S = ($Tpp['aksen'] - $S) / 9;
                            $S = sqrt($S);
                            $SE = ($S * $S) / $jumlah;
                            $TP = sqrt($SE);
                            $TP = 100 - ($TP / 100);

                            // WP
                            $Wps = array_sum($wp);
                            for ($i=0; $i <= $jumlah-1; $i++) { $Wpp[$i] = pow($wp[$i], 2); }
                            $Wpp['aksen'] = array_sum($Wpp);
                            $S = ($Wps * $Wps) / $jumlah;
                            $S = ($Wpp['aksen'] - $S) / 9;
                            $S = sqrt($S);
                            $SE = ($S * $S) / $jumlah;
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
            
        </div>

        <div>
            <a href="<?=BASEURL;?>/perhitungan/topsis" class="btn btn-warning">Detail TOPSIS</a>
            <a href="<?=BASEURL;?>/perhitungan/wp" class="btn btn-warning">Detail WP</a>
        </div>

    </div>
</div>