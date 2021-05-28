<?php if (isset($_SESSION['user_id'])) {
    header('Location: '. BASEURL .'/middleware/checkout');
} ?>

<div class="container">

    <div class="row">
        <div class="col-sm col-lg-5 mx-auto">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm col-lg-5 mx-auto shadow border rounded mt-5 p-5">
            <form action="<?= BASEURL; ?>/auth/registerStore" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</div>
