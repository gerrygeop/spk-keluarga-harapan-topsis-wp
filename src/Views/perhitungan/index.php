
<div class="container">
    <div class="px-2 py-3 mb-5">
        <h3 class="text-secondary mb-4">
            #Hasil Rekomendasi
        </h3>

        <div class="d-flex flex-column">

            <div class="mb-5">

                <div class="mb-4">
                    <div class="row justify-content-center px-2">
                        <div class="col py-4 px-4 my-3 shadow border border-1 rounded table-responsive" id="chartAkurasi" style="height: 450px;">
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-secondary mb-0">#Uji Sensitivitas</h4>
                    <div class="row justify-content-center px-2">
                        <div class="col py-2 px-4 my-3 shadow border border-1 rounded table-responsive" id="chartSensitivitas" style="height: 450px;">
                            <table class="table">
                                <caption>
                                    Berdasarkan pengujian menggunakan <b>Tingkat Akurasi</b> dan <b>Uji Sensitivitas</b> maka metode terbaik adalah metode FMADM TOPSIS karena memiliki nilai pengujian yang lebih besar
                                </caption>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


            <div class="mb-5">
                <h4 class="text-secondary">Ranking metode TOPSIS </h4>

                <div class="row px-2">

                    <div class="col-sm col-lg-8 py-2 px-4 my-3 shadow border rounded">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Alt</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $jumlahAlt = count($data['tp']['rankTp']);
                                    $lolos = 50 * $jumlahAlt / 100;
                                    
                                    $i=1;
                                    foreach($data['tp']['rankTp'] as $key => $value) { 
                                ?>
                                    <tr>
                                        <th>
                                            <?= 'A'.$key; ?>
                                        </th>
                                        <td>
                                            <?php foreach ($data['tp']['users'] as $n => $alt) {
                                                if ($n == $key) {
                                                    echo $alt;
                                                }
                                            } ?>
                                        </td>
                                        <td>
                                            <?php
                                                $tp[] = $value;
                                                echo substr($value, 0, 6);
                                            ?>
                                        </td>
                                        <td class="text-center">
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

                </div>
            </div>
            
        </div>

        <div>
            <a href="<?=BASEURL;?>/perhitungan/topsis" class="btn btn-warning">Detail TOPSIS</a>
            <a href="<?=BASEURL;?>/perhitungan/wp" class="btn btn-warning">Detail WP</a>
        </div>

    </div>
</div>

<?php
    $dataAkurasi = array(
        array("y" => 94, "indexLabel"=> "94%", "label" => "TOPSIS"),
        array("y" => 90, "indexLabel"=> "90%", "label" => "WP"),
    );

    $dataSensitivitas = array(
        array("y" => 4.0537, "indexLabel"=> "4,0537%", "label" => "TOPSIS"),
        array("y" => 3.9049, "indexLabel"=> "3.9049%", "label" => "WP"),
    );
?>

<script type="text/javascript">

    window.onload = function () {
        var chartAkurasi = new CanvasJS.Chart("chartAkurasi", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Hasil Pengujian Tingkat Akurasi"
            },
            axisY:{
                includeZero: true
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",   
                dataPoints: <?php echo json_encode($dataAkurasi, JSON_NUMERIC_CHECK); ?>
            }]
        });

        var chartSensitivitas = new CanvasJS.Chart("chartSensitivitas", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Hasil Uji Sensitivitas"
            },
            axisY:{
                includeZero: true
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",   
                dataPoints: <?php echo json_encode($dataSensitivitas, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chartAkurasi.render();
        chartSensitivitas.render();
    }
</script>