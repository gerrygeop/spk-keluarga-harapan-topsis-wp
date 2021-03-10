<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="<?=BASEURL;?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Font Kaushan -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        .font-poppins{
            font-family: 'Poppins', sans-serif;
        }
        .navbar-brand{
            font-family: 'Kaushan Script', cursive;
        }
    </style>

    <title><?= $data['judul'] ?> </title>
</head>
<body class="font-poppins">

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary mb-3 py-3 shadow">
        <div class="container">
            <a class="navbar-brand fs-4 text-light" href="<?= BASEURL; ?>/home">WendyKurn.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100">
                    <a class="nav-link" href="<?= BASEURL; ?>/home">Home</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/kriteria">Kriteria</a>

                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a class="nav-link" href="<?= BASEURL; ?>/alternatif">Alternatif</a>
                    <?php endif; ?>

                    <a class="nav-link" href="<?= BASEURL; ?>/home/about">About</a>
                    
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a class="nav-link btn btn-outline-info btn-sm text-uppercase px-3 ms-auto" href="<?= BASEURL; ?>/auth/logout">Logout</a>
                    <?php else : ?>
                        <a class="nav-link btn btn-outline-info btn-sm text-uppercase px-3 ms-auto" href="<?= BASEURL; ?>/auth">Login</a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </nav>