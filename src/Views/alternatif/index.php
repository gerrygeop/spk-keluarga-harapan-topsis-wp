<?php if (!isset($_SESSION['user_id'])) {
    header('Location: '. BASEURL .'/middleware');
} ?>

<div class="container-fluid">
    <div class="shadow px-2 py-3 rounded border">

        <div class="row">
            <div class="col-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <div class="px-3">
            <div class="mb-3">
                <h3 class="text-secondary m-0"><?= $data['judul']; ?></h3>
                <small class="text-sm text-secondary">*Tabel ini menampilkan data calon penerima PKH.</small>
            </div>
            
            <a href="<?= BASEURL; ?>/alternatif/create" class="btn btn-primary my-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-1" viewBox="0 0 16 16">
                    <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                </svg>
                <span>Data<span>
            </a>
        </div>

        <div class="p-2 border border-1 rounded table-responsive">
            <table class="table table-hover table-sm align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <?php for ($i=1; $i <= 11; $i++) : ?>
                            <th scope="col">
                                <?= 'C' . $i; ?>
                            </th>
                        <?php endfor; ?>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($data['alt'] as $alt) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i; ?>
                            </th>
                            <td scope="row" class="col-1">
                                <?= $alt['nama']; ?>
                            </td>
                            <td scope="row" class="">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c1'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c2'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="col-1">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c3'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c4'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c5'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c6'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="col-1">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c7'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c8'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="col-1">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c9'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="col-1">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c10'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>
                            <td scope="row" class="col-1">
                                <?php foreach ($data['sub'] as $sub) {
                                    $alt['c11'] == $sub['id_sub'] ?  print_r($sub['nama_sub']) : 'null';
                                } ?>
                            </td>

                            <td scope="row" class="col-1 text-center">
                                <a href="<?= BASEURL; ?>/alternatif/edit/<?= $alt['id_alt']; ?>" class="btn btn-primary btn-sm pt-0" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- <form action="<?= BASEURL; ?>/alternatif/delete/<?= $alt['id_alt']; ?>" method="POST" class="d-inline">
                                    <button class="btn btn-danger btn-sm pt-0" onclick="return confirm('Yakin?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form> -->
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>