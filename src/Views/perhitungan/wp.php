<?php
    $jumlahAlt = count($data['wp']['rankWp']);
?>

<div class="container-fluid">

    <nav aria-label="breadcrumb" class="ms-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=BASEURL;?>/perhitungan">Perhitungan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail WP</li>
        </ol>
    </nav>

    <div class="shadow px-4 py-3 rounded border mb-5">
        <h4 class="text-secondary">
            #Normalisasi Bobot
        </h4>
        
        <div class="py-2 px-3 my-3 border border-1 rounded table-responsive">
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


    <div class="collapse shadow px-4 py-3 rounded border mb-5" id="vektor-s">
        <h4 class="text-secondary">
            #Nilai Vektor S
        </h4>
        <div class="col-sm col-lg-6 py-2 px-4 my-3 border border-1 rounded table-responsive">
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


    <div class="collapse shadow px-4 py-3 rounded border mb-5" id="vektor-v">
        <h4 class="text-secondary">
            #Nilai Vektor V
        </h4>
        <div class="col-sm col-lg-6 py-2 px-4 my-3 border border-1 rounded table-responsive">
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
                            <td><?=  substr($v, 0, 7); ?></td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#ranking-wp">
            Lihat Ranking
        </a>
    </div>


    <div class="collapse shadow px-4 py-3 rounded border mb-5" id="ranking-wp">
        <h4 class="text-secondary">
            #Ranking Metode WP
        </h4>
        <div class="col-sm col-lg-6 py-2 px-4 my-3 border border-1 rounded">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Alt</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $jumlahAlt = count($data['wp']['rankWp']);
                        $lolos = 50 * $jumlahAlt / 100;
                        
                        $i=1;
                        foreach($data['wp']['rankWp'] as $key => $value) { 
                    ?>
                        <tr>
                            <th>
                                <?= 'A'.$key; ?>
                            </th>
                            <td>
                                <?php foreach ($data['wp']['users'] as $n => $alt) {
                                    if ($n == $key) {
                                        echo $alt;
                                    }
                                } ?>
                            </td>
                            <td>
                                <?= substr($value, 0, 6); ?>
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