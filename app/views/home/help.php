<div class="container">
    <div class="my-5 py-4 px-4 mb-5 rounded shadow">
        <h2 class="mb-4"><?= '#' . $data['judul']; ?></h2>
        <div class="mb-3">
            <p class="text-secondary text-sm">
                **Pengguna hanya dapat melihat halaman Home dan halaman kriteria
            </p>
            <hr>
            <p class="text-secondary text-sm">
                **Pada halaman Home, pengguna dapat melihat penjelasan ringkas mengenai Program Keluarga Harapan
            </p>
            <hr>
            <p class="text-secondary text-sm">
                **Pada halaman kriteria, pengguna dapat melihat tabel yang menampilkan nilai kriteria dari tiap data calon penerima PKH
            </p>
            <hr>
            <p class="text-secondary text-sm">
                **Pada halaman kriteria pengguna juga dapat melihat hasil perbandingan & proses perhitungan metode FMADM TOPSIS dan FMADM WP
            </p>
        </div>
    </div>

    <div class="my-5 py-4 px-3 rounded shadow">
        <h2 class="mb-3">Keterangan kriteria</h2>
        <hr>
        <div class="row row-cols-1 row-cols-md-3">

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C1</span> Ibu Hamil
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C1</b> adalah Ibu hamil, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c1'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C2</span> Balita
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C2</b> adalah Balita, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c2'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C3</span> Lansia
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C3</b> adalah Lansia, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c3'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C4</span> Anak SD
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C4</b> adalah Anak SD, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c4'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C5</span> Anaka SMP
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C5</b> adalah Anak SMP, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c5'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C6</span> Anak SMA
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C6</b> adalah Anak SMA, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c6'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C7</span> Penyandang Disabilitas
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C7</b> adalah Penyandang Disabilitas, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c7'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C8</span> Pekerjaan
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C8</b> adalah Pekerjaan, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c8'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C9</span> Status Rumah
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C9</b> adalah Status Rumah, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c9'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C10</span> Jumlah Anggota Keluarga
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C10</b> adalah Jumlah Anggota Keluarga, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c10'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-header w-full fw-bold fs-5 bg-primary text-white">
                        <span class="badge bg-warning">C11</span> Aset Kepemilikan
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <b>C11</b> adalah Aset Kepemilikan, dengan subkriteria:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <?php foreach ($data['c11'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nama_sub']; ?>
                                <span class="badge bg-primary rounded-pill fw-light">bobot: <?= $item['bobot_sub'] ;?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</div>
