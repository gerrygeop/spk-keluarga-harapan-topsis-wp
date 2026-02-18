<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-success text-white text-center py-3">
                    <h4 class="m-0 font-weight-bold">Registrasi</h4>
                </div>
                <div class="card-body p-4">
                    
                    <?php Flasher::flash(); ?>

                    <form action="<?= BASEURL; ?>/auth/registerStore" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label text-secondary fw-bold">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Buat username baru" required autofocus>
                            <div class="form-text">Gunakan kombinasi huruf dan angka.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-secondary fw-bold">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Buat password kuat" required>
                        </div>
                        <div class="mb-4">
                            <label for="ulangi_password" class="form-label text-secondary fw-bold">Konfirmasi Password</label>
                            <input type="password" class="form-control form-control-lg" id="ulangi_password" name="ulangi_password" placeholder="Ulangi password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-light border-0 rounded-bottom">
                    <small class="text-muted">Sudah punya akun? <a href="<?= BASEURL; ?>/auth" class="text-success fw-bold">Login disini</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
