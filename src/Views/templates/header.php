<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul'] ?? 'SPK PKH' ?></title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2563eb', // blue-600
                        secondary: '#475569', // slate-600
                    }
                }
            }
        }
    </script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap Icons (Optional, keeping if needed for specific icons, or can switch to Heroicons/similar later) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
    </style>
</head>

<body class="text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?= BASEURL; ?>/home" class="flex items-center gap-3">
                        <div class="bg-primary text-white p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="font-bold text-xl text-slate-900 tracking-tight">SPK PKH</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= BASEURL; ?>/home" class="text-slate-500 hover:text-primary font-medium transition-colors <?= (isset($data['judul']) && $data['judul'] == 'Home') ? 'text-primary' : '' ?>">Home</a>
                    <a href="<?= BASEURL; ?>/kriteria" class="text-slate-500 hover:text-primary font-medium transition-colors <?= (isset($data['judul']) && $data['judul'] == 'Kriteria') ? 'text-primary' : '' ?>">Kriteria</a>

                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a href="<?= BASEURL; ?>/alternatif" class="text-slate-500 hover:text-primary font-medium transition-colors <?= (isset($data['judul']) && $data['judul'] == 'Daftar Alternatif') ? 'text-primary' : '' ?>">Penerima</a>
                        <a href="<?= BASEURL; ?>/perhitungan" class="text-slate-500 hover:text-primary font-medium transition-colors <?= (isset($data['judul']) && in_array($data['judul'], ['Perhitungan', 'Detail TOPSIS', 'Detail WP'])) ? 'text-primary' : '' ?>">Perhitungan</a>
                    <?php endif; ?>

                    <a href="<?= BASEURL; ?>/home/help" class="text-slate-500 hover:text-primary font-medium transition-colors <?= (isset($data['judul']) && $data['judul'] == 'Help') ? 'text-primary' : '' ?>">Bantuan</a>
                </div>

                <!-- Auth Button -->
                <div class="hidden md:flex items-center">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a href="<?= BASEURL; ?>/auth/logout" class="bg-red-50 text-red-600 hover:bg-red-100 px-5 py-2.5 rounded-lg font-semibold transition-colors">
                            Logout
                        </a>
                    <?php else : ?>
                        <a href="<?= BASEURL; ?>/auth" class="bg-primary hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg font-semibold transition-colors shadow-sm shadow-blue-200">
                            Login
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-slate-500 hover:text-slate-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="<?= BASEURL; ?>/home" class="block py-2 text-slate-600 hover:text-primary font-medium">Home</a>
                <a href="<?= BASEURL; ?>/kriteria" class="block py-2 text-slate-600 hover:text-primary font-medium">Kriteria</a>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="<?= BASEURL; ?>/alternatif" class="block py-2 text-slate-600 hover:text-primary font-medium">Penerima</a>
                    <a href="<?= BASEURL; ?>/perhitungan" class="block py-2 text-slate-600 hover:text-primary font-medium">Perhitungan</a>
                <?php endif; ?>
                <a href="<?= BASEURL; ?>/home/help" class="block py-2 text-slate-600 hover:text-primary font-medium">Bantuan</a>
                <div class="pt-2">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a href="<?= BASEURL; ?>/auth/logout" class="block w-full text-center bg-red-50 text-red-600 py-2 rounded-lg font-medium">Logout</a>
                    <?php else : ?>
                        <a href="<?= BASEURL; ?>/auth" class="block w-full text-center bg-primary text-white py-2 rounded-lg font-medium">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">

        <script>
            document.getElementById('mobile-menu-btn').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        </script>
