<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 pt-8 pb-6">
            <p class="text-sm font-medium text-emerald-600">Registrasi Pengguna</p>
            <h1 class="text-2xl font-bold text-slate-900 mt-1">Buat akun baru</h1>
            <p class="text-sm text-slate-500 mt-2">Isi data berikut untuk membuat akun aplikasi.</p>
        </div>

        <div class="px-6 pb-3">
            <?php Flasher::flash(); ?>
        </div>

        <form action="<?= BASEURL; ?>/auth/registerStore" method="POST" class="px-6 pb-8 space-y-5">
            <div>
                <label for="username" class="block text-sm font-semibold text-slate-700 mb-2">Username</label>
                <input type="text" id="username" name="username" placeholder="Buat username baru" required autofocus class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500">
                <p class="text-xs text-slate-500 mt-2">Gunakan kombinasi huruf dan angka.</p>
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Buat password kuat" required class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500">
            </div>
            <div>
                <label for="ulangi_password" class="block text-sm font-semibold text-slate-700 mb-2">Konfirmasi Password</label>
                <input type="password" id="ulangi_password" name="ulangi_password" placeholder="Ulangi password" required class="w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500">
            </div>
            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition-colors shadow-sm shadow-emerald-200">
                Daftar
            </button>
        </form>

        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50 text-center">
            <p class="text-sm text-slate-600">
                Sudah punya akun?
                <a href="<?= BASEURL; ?>/auth" class="text-emerald-700 font-semibold hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
