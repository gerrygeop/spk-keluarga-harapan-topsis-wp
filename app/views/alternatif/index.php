<div class="container-fluid">
    <div class="shadow px-2 py-3 rounded border">

        <div class="row">
            <div class="col-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <div class="px-3">
            <h3 class="text-secondary">#<?= $data['judul']; ?></h3>
            <a href="<?= BASEURL; ?>/alternatif/create" class="btn btn-primary my-3">
                <i class="bi bi-plus-square"></i>
                Tambah Alternatif
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
                    <?php foreach ($data['alt'] as $alt) : ?>
                        <tr>
                            <th scope="row">
                                <?= $alt['id_alt']; ?>
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
                                <a href="<?= BASEURL; ?>/alternatif/edit/<?= $alt['id_alt']; ?>" class="btn btn-primary btn-sm pt-0">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="<?= BASEURL; ?>/alternatif/delete/<?= $alt['id_alt']; ?>" method="POST" class="d-inline">
                                    <button class="btn btn-danger btn-sm pt-0" onclick="return confirm('Yakin?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>