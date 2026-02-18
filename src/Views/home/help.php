<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-10">
        <h2 class="text-3xl font-bold text-slate-900 mb-4"><?= '#' . $data['judul']; ?></h2>
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 space-y-4 text-slate-600">
            <p class="flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Pengguna hanya dapat melihat halaman Home dan halaman Kriteria.</span>
            </p>
            <hr class="border-slate-100">
            <p class="flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Pada halaman Home, pengguna dapat melihat penjelasan ringkas mengenai Program Keluarga Harapan (PKH).</span>
            </p>
            <hr class="border-slate-100">
            <p class="flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Pada halaman Kriteria, pengguna dapat melihat tabel yang menampilkan nilai kriteria dari tiap data calon penerima PKH.</span>
            </p>
            <hr class="border-slate-100">
            <p class="flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 3.659c0 3.074-1.813 5.702-4.404 6.883C7.994 18.258 7 19.508 7 21a1 1 0 01-1 1H4a1 1 0 00-1-1 3 3 0 013-3 3.999 3.999 0 012.396-3.659A1 1 0 0011 13.659 3.001 3.001 0 0012 11c0-1.657-1.343-3-3-3H6m2 10h.01M15 11h.01" />
                </svg>
                <span>Pada halaman Perhitungan, pengguna dapat melihat hasil perbandingan & proses perhitungan metode FMADM TOPSIS dan FMADM WP.</span>
            </p>
        </div>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Keterangan Kriteria</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php 
            $criteriaList = [
                ['id' => 'c1', 'code' => 'C1', 'name' => 'Ibu Hamil', 'color' => 'bg-blue-100 text-blue-700', 'icon_bg' => 'bg-blue-500'],
                ['id' => 'c2', 'code' => 'C2', 'name' => 'Balita', 'color' => 'bg-green-100 text-green-700', 'icon_bg' => 'bg-green-500'],
                ['id' => 'c3', 'code' => 'C3', 'name' => 'Lansia', 'color' => 'bg-purple-100 text-purple-700', 'icon_bg' => 'bg-purple-500'],
                ['id' => 'c4', 'code' => 'C4', 'name' => 'Anak SD', 'color' => 'bg-orange-100 text-orange-700', 'icon_bg' => 'bg-orange-500'],
                ['id' => 'c5', 'code' => 'C5', 'name' => 'Anak SMP', 'color' => 'bg-cyan-100 text-cyan-700', 'icon_bg' => 'bg-cyan-500'],
                ['id' => 'c6', 'code' => 'C6', 'name' => 'Anak SMA', 'color' => 'bg-indigo-100 text-indigo-700', 'icon_bg' => 'bg-indigo-500'],
                ['id' => 'c7', 'code' => 'C7', 'name' => 'Disabilitas', 'color' => 'bg-pink-100 text-pink-700', 'icon_bg' => 'bg-pink-500'],
                ['id' => 'c8', 'code' => 'C8', 'name' => 'Pekerjaan', 'color' => 'bg-teal-100 text-teal-700', 'icon_bg' => 'bg-teal-500'],
                ['id' => 'c9', 'code' => 'C9', 'name' => 'Status Rumah', 'color' => 'bg-emerald-100 text-emerald-700', 'icon_bg' => 'bg-emerald-500'],
                ['id' => 'c10', 'code' => 'C10', 'name' => 'Jml Anggota', 'color' => 'bg-rose-100 text-rose-700', 'icon_bg' => 'bg-rose-500'],
                ['id' => 'c11', 'code' => 'C11', 'name' => 'Aset', 'color' => 'bg-amber-100 text-amber-700', 'icon_bg' => 'bg-amber-500'],
            ];

            foreach ($criteriaList as $criteria) : 
                $cKey = $criteria['id'];
                if (isset($data[$cKey])) :
            ?>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full <?=$criteria['color']?> font-bold text-sm">
                                <?=$criteria['code']?>
                            </span>
                            <h3 class="font-bold text-slate-800"><?=$criteria['name']?></h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-slate-500 mb-4">Daftar sub-kriteria untuk <?=$criteria['name']?>:</p>
                        <ul class="space-y-3">
                            <?php foreach ($data[$cKey] as $item) : ?>
                                <li class="flex items-start justify-between text-sm group">
                                    <span class="text-slate-700 group-hover:text-primary transition-colors"><?= $item['nama_sub']; ?></span>
                                    <span class="flex-shrink-0 ml-2 px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold group-hover:bg-primary group-hover:text-white transition-colors">
                                        <?= $item['bobot_sub'] ;?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php 
                endif;
            endforeach; 
            ?>

        </div>
    </div>
</div>
