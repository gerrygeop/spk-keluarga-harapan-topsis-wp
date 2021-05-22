<?php if (!isset($_SESSION['user_id'])) {
    header('Location: '. BASEURL .'/middleware');
} ?>

<div class="container shadow border rounded px-5 py-3 mb-5">

    <div class="row my-3">
        <div class="col-12">
            <h3 class="text-secondary"><?= '#' . $data['judul']; ?></h3>
        </div>
    </div>

    <div class="py-4 px-3 rounded">
        <form action="<?= BASEURL; ?>/alternatif/update"  method="POST">

            <input type="hidden" name="id_alt" value="<?= $data['alt']['id_alt'] ?>" >
        
            <div class="row g-4">

                <div class="col-12">
                    <label for="nama" class="form-label text-secondary">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['alt']['nama'] ?>" required>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c1" class="form-label text-secondary">Ibu Hamil [C1]</label>
                    <?php foreach ($data['c1'] as $key) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="c1"
                                    id="c1"
                                    value="<?= $key['id_sub']; ?>"
                                    <?= $key['id_sub'] == $data['alt']['c1'] ? 'checked' : '' ?>
                                    required
                                >
                                <?= $key['nama_sub']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c2" class="form-label text-secondary">Balita [C2]</label>
                    <?php foreach ($data['c2'] as $key) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="c2" 
                                    value="<?=$key['id_sub'];?>" 
                                    <?= $key['id_sub'] == $data['alt']['c2'] ? 'checked' : '' ?>
                                    required
                                >
                                <?= $key['nama_sub']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c3" class="form-label text-secondary">Lansia [C3]</label>
                    <select class="form-select" name="c3">
                        <?php foreach ($data['c3'] as $key) : ?>
                            <option 
                                value="<?= $key['id_sub'] ?>" 
                                <?= $key['id_sub'] == $data['alt']['c3'] ? 'selected' : '' ?> 
                            >
                                <?= $key['nama_sub']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c4" class="form-label text-secondary">Anak SD [C4]</label>
                    <?php foreach ($data['c4'] as $key) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input
                                    class="form-check-input"
                                    type="radio" 
                                    name="c4" 
                                    value="<?= $key['id_sub']; ?>" 
                                    <?= $key['id_sub'] == $data['alt']['c4'] ? 'checked' : '' ?>
                                    required
                                >
                                <?= $key['nama_sub']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <hr>
                
                <div class="col-12">
                    <label for="c5" class="form-label text-secondary">Anak SMP [C5]</label>
                    <?php foreach ($data['c5'] as $key) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="c5" 
                                    value="<?= $key['id_sub']; ?>" 
                                    <?= $key['id_sub'] == $data['alt']['c5'] ? 'checked' : '' ?>
                                    required
                                >
                                <?= $key['nama_sub']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c6" class="form-label text-secondary">Anak SMA [C6]</label>
                    <?php foreach ($data['c6'] as $key) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="c6" 
                                    value="<?= $key['id_sub'] ?>" 
                                    <?= $key['id_sub'] == $data['alt']['c6'] ? 'checked' : '' ?>
                                    required
                                >
                                <?= $key['nama_sub']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c7" class="form-label text-secondary">Penyandang Disabilitas [C7]</label>
                    <select class="form-select" name="c7">
                        <?php foreach ($data['c7'] as $key) : ?>
                            <option 
                                value="<?= $key['id_sub'] ?>" 
                                <?= $key['id_sub'] == $data['alt']['c7'] ? 'selected' : '' ?> 
                            >
                                <?= $key['nama_sub']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <hr>
                
                <div class="col-12">
                    <label for="c8" class="form-label text-secondary">Pekerjaan [C8]</label>
                    <select class="form-select" name="c8">
                        <?php foreach ($data['c8'] as $key) : ?>
                            <option 
                                value="<?= $key['id_sub'] ?>" 
                                <?= $key['id_sub'] == $data['alt']['c8'] ? 'selected' : '' ?> 
                            >
                                <?= $key['nama_sub'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c9" class="form-label text-secondary">Status Rumah [C9]</label>
                    <select class="form-select" name="c9">
                        <?php foreach ($data['c9'] as $key) : ?>
                            <option 
                                value="<?= $key['id_sub']; ?>" 
                                <?= $key['id_sub'] == $data['alt']['c9'] ? 'selected' : '' ?> 
                            >
                                <?= $key['nama_sub']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <hr>
                
                <div class="col-12">
                    <label for="c10" class="form-label text-secondary">Jumlah Anggota Keluarga [C10]</label>
                    <select class="form-select" name="c10">
                        <?php foreach ($data['c10'] as $key) : ?>
                            <option 
                                value="<?= $key['id_sub'] ?>"
                                <?= $key['id_sub'] == $data['alt']['c10'] ? 'selected' : '' ?>
                            >
                                <?= $key['nama_sub'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <hr>
    
                <div class="col-12">
                    <label for="c11" class="form-label text-secondary">Aset Kepemilikan [C11]</label>
                    <select class="form-select" name="c11">
                        <?php foreach ($data['c11'] as $key) : ?>
                            <option 
                                value="<?= $key['id_sub'] ?>"
                                <?= $key['id_sub'] == $data['alt']['c11'] ? 'selected' : '' ?>
                            >
                                <?= $key['nama_sub']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <hr>

            </div>
    
            <div class="row mt-5">
                <div class="col-12">
                    <a href="<?= BASEURL; ?>/alternatif" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>


</div>