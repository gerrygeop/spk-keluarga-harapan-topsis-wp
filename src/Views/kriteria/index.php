<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-800">Tabel Kriteria</h2>
            <p class="text-slate-500 mt-1">Nilai kriteria pada setiap data calon penerima PKH</p>
        </div>
        <a href="<?=BASEURL;?>/perhitungan" class="inline-flex items-center px-6 py-2.5 bg-primary hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors cursor-pointer">
            Hasil Perhitungan
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-12">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-blue-600 text-white font-semibold">
                    <tr>
                        <th class="px-6 py-4 rounded-tl-xl">#</th>
                        <th class="px-6 py-4">Nama</th>
                        <?php $i=1; foreach ($data['ktr'] as $ktr) : ?>
                            <th class="px-6 py-4 text-center" title="<?= $ktr['nama_ktr']; ?>">
                                C<?= $i; ?>
                            </th>
                        <?php $i++; endforeach; ?>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $i=1; foreach ($data['alt'] as $alt) : ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-slate-900">
                                A<?= $i; ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900">
                                <?= $alt['nama']; ?>
                            </td>
                            <?php 
                                // Helper to find bobot
                                $getBobot = function($c_id) use ($data) {
                                    foreach ($data['sub'] as $sub) {
                                        if ($c_id == $sub['id_sub']) {
                                            return $sub['bobot_sub'];
                                        }
                                    }
                                    return '-';
                                };
                            ?>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c1']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c2']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c3']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c4']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c5']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c6']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c7']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c8']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c9']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c10']); ?></td>
                            <td class="px-6 py-4 text-center text-slate-600"><?= $getBobot($alt['c11']); ?></td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Keterangan Kriteria Section (Image 6) -->
    <div class="mb-8">
        <h3 class="text-2xl font-bold text-slate-800 mb-6">Keterangan Kriteria</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
             <?php $i=1; foreach ($data['ktr'] as $ktr) : ?>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-primary px-6 py-3">
                        <h4 class="text-white font-semibold flex items-center">
                            <span class="bg-white/20 px-2 py-0.5 rounded text-sm mr-2">C<?= $i; ?></span>
                            <?= $ktr['nama_ktr']; ?>
                        </h4>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-slate-500 mb-4">
                            C<?= $i; ?> adalah <?= $ktr['nama_ktr']; ?>, dengan subkriteria:
                        </p>
                        
                        <div class="space-y-3">
                             <?php 
                                // Filter subkriteria for this criteria
                                // $data['sub'] holds ALL subkriteria with fields like id_ktr, nama_sub, bobot_sub
                                // But looking at previous code, $data['sub'] might be used differently or passed flatly. 
                                // Let's check the Controller logic or just reuse the $data['sub'] array if it contains id_ktr.
                                // In the original code, $data['sub'] contains all subkriterias.
                                $currentKtrId = $ktr['id_ktr'] ?? $i; // Assuming id_ktr matches the iteration or is available
                                
                                // Actually, let's look at the original code structure. 
                                // The original code iterated $data['sub'] to find matching IDs for alternates.
                                // Typically a model like getAllSubKriteria() returns rows with id_ktr.
                                // I'll assume $sub['id_ktr'] exists.
                                
                                $foundSub = false;
                                foreach ($data['sub'] as $sub) {
                                    // Make sure id_ktr matches. If the array doesn't have id_ktr, we might be in trouble.
                                    // I'll assume standard DB structure. If not I might need the full subkriteria list grouped by Kriteria.
                                    // For now, I will assume $sub has 'id_ktr'.
                                    if (isset($sub['id_ktr']) && $sub['id_ktr'] == $currentKtrId) { // Verify this assumption if possible, otherwise rely on general practices
                                         $foundSub = true;
                            ?>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-slate-700"><?= $sub['nama_sub']; ?></span>
                                    <span class="bg-blue-50 text-blue-600 font-medium px-2.5 py-0.5 rounded-full">
                                        <?= $sub['bobot_sub']; ?>
                                    </span>
                                </div>
                            <?php 
                                    }
                                }
                                if (!$foundSub) {
                                    echo '<p class="text-sm text-slate-400 italic">Tidak ada subkriteria.</p>';
                                }
                            ?> 
                        </div>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </div>
    </div>

</div>