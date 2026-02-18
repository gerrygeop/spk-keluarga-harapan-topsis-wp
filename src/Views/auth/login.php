<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="m-0 font-weight-bold">Login</h4>
                </div>
                <div class="card-body p-4">
                    
                    <?php Flasher::flash(); ?>

                    <form action="<?= BASEURL; ?>/auth/login" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label text-secondary fw-bold">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Masukkan username" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-secondary fw-bold">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">Masuk</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-light border-0 rounded-bottom">
                    <small class="text-muted">Belum punya akun? <a href="<?= BASEURL; ?>/auth/register" class="text-primary fw-bold">Daftar disini</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
