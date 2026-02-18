<div class="container-fluid">
    <div class="shadow p-4 rounded border mb-5">

        <div class="row justify-content-between mb-4">
            <div class="col">
                <h3 class="text-secondary "><?= $data['judul'] ?></h3>
                <small class="text-sm text-secondary">*Tabel ini menampilkan nilai kriteria pada setiap data calon penerima PKH.</small>
            </div>
            <div class="col text-end">
                <a href="<?=BASEURL;?>/perhitungan" class="btn btn-warning px-3 py-2">Hasil Perhitungan</a>
            </div>
        </div>
        
        <div class="p-2 border border-1 rounded table-responsive mb-3">

            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <?php $i=1; foreach ($data['ktr'] as $ktr) : ?>
                            <th scope="col">
                                <button type="button" class="btn btn-light btn-sm fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $ktr['nama_ktr']; ?>">
                                    <?= 'C' . $i; ?>
                                </button>
                            </th>
                        <?php $i++; endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $i=1; foreach ($data['alt'] as $alt) : ?>
                        <tr>
                            <th scope="row">
                            <!--FOR LOOP NOMOR ALT DARI 1 ... SETERUSNYA 
                                GAK HARUS PAKE ID, BISA PAKE ANGKA BIASA KARNA GAK ADA PAGINATION-->
                               <?= 'A' . $i; ?>
                            </th>
                            <td scope="row">
                                <?= $alt['nama']; ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {  // For Loop data yang diambil dari tabel SubKriteria
                                    if ($alt['c1'] == $sub['id_sub']) { // Cek apakah ID SubKriteria sama dgn ID kolom C1 di table ALTERNATIF
                                        echo $sub['bobot_sub'];         // Tampilkan nilai bobot nya! Semua yang dibawah juga sama !
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c2'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c3'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c4'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c5'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c6'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c7'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c8'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c9'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c10'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                            <td scope="row">
                                <?php foreach ($data['sub'] as $sub) {
                                    if ($alt['c11'] == $sub['id_sub']) {
                                        echo $sub['bobot_sub'];
                                    }
                                } ?>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>