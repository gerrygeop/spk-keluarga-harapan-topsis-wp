<?php if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASEURL . '/middleware');
} ?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="text-xl font-bold text-slate-900"><?= $data['judul']; ?></h3>
                <p class="text-sm text-slate-500 mt-1">Daftar calon penerima PKH dan nilai kriteria.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="<?= BASEURL; ?>/alternatif/create" class="inline-flex items-center px-4 py-2 bg-primary hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Data
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-600">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold text-center w-16">#</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Nama</th>
                        <?php for ($i = 1; $i <= 11; $i++) : ?>
                            <th scope="col" class="px-4 py-4 font-semibold text-center">
                                <?= 'C' . $i; ?>
                            </th>
                        <?php endfor; ?>
                        <th scope="col" class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $i = 1;
                    foreach ($data['alt'] as $alt) : ?>
                        <tr class="bg-white hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-slate-900">
                                <?= $i; ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                                <?= $alt['nama']; ?>
                            </td>

                            <?php
                            // Helper to display sub-criteria name safely
                            $displaySub = function ($val) use ($data) {
                                foreach ($data['sub'] as $sub) {
                                    if ($val == $sub['id_sub']) {
                                        return '<span class="px-2 py-1 rounded text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">' . $sub['nama_sub'] . '</span>';
                                    }
                                }
                                return '<span class="text-slate-300">-</span>';
                            };
                            ?>

                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c1']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c2']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c3']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c4']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c5']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c6']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c7']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c8']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c9']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c10']); ?></td>
                            <td class="px-4 py-4 text-center"><?= $displaySub($alt['c11']); ?></td>

                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="<?= BASEURL; ?>/alternatif/edit/<?= $alt['id_alt']; ?>" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors group" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <!-- Delete button commented out in original, keeping it that way or enabling if requested. 
                                         If enabling, would need simple form. 
                                    -->
                                </div>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if (empty($data['alt'])) : ?>
            <div class="p-10 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-slate-900">Belum ada data</h3>
                <p class="text-slate-500 mt-1">Silakan tambahkan data alternatif baru.</p>
            </div>
        <?php endif; ?>

    </div>
</div>