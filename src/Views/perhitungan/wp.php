<?php
    $weightKeys = array_keys($data['wp']['W'] ?? []);
    sort($weightKeys, SORT_NATURAL);
    $lolos = (int) ceil(count($data['wp']['rankWp']) * 0.5);
    $hasData = !empty($data['wp']['rankWp']);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-6">
        <a href="<?= BASEURL; ?>/perhitungan" class="inline-flex items-center text-sm text-slate-500 hover:text-primary transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Ringkasan Perhitungan
        </a>
        <h2 class="text-3xl font-bold text-slate-900 mt-2">Detail Proses Weighted Product (WP)</h2>
        <p class="text-slate-500 mt-1">Langkah perhitungan dari normalisasi bobot hingga ranking akhir.</p>
    </div>

    <?php if ($hasData) : ?>
    <div class="sticky top-24 z-30 mb-4">
        <div class="bg-white/95 backdrop-blur rounded-xl border border-slate-200 shadow-sm p-3 flex flex-wrap items-center gap-2">
            <button type="button" data-step-target="wp-step-1" class="step-jump px-3 py-1.5 text-xs font-semibold rounded-md border border-slate-200 text-slate-600 hover:text-primary hover:border-blue-200">Langkah 1</button>
            <button type="button" data-step-target="wp-step-2" class="step-jump px-3 py-1.5 text-xs font-semibold rounded-md border border-slate-200 text-slate-600 hover:text-primary hover:border-blue-200">Langkah 2</button>
            <button type="button" data-step-target="wp-step-3" class="step-jump px-3 py-1.5 text-xs font-semibold rounded-md border border-slate-200 text-slate-600 hover:text-primary hover:border-blue-200">Langkah 3</button>
            <button type="button" data-step-target="wp-step-4" class="step-jump px-3 py-1.5 text-xs font-semibold rounded-md border border-slate-200 text-slate-600 hover:text-primary hover:border-blue-200">Ranking</button>
            <span class="hidden sm:inline h-6 w-px bg-slate-200 mx-1"></span>
            <button type="button" data-step-action="expand" class="step-action px-3 py-1.5 text-xs font-semibold rounded-md border border-slate-200 text-slate-600 hover:text-primary hover:border-blue-200">Expand all</button>
            <button type="button" data-step-action="collapse" class="step-action px-3 py-1.5 text-xs font-semibold rounded-md border border-slate-200 text-slate-600 hover:text-primary hover:border-blue-200">Collapse all</button>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!$hasData) : ?>
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 text-center">
            <h3 class="text-xl font-bold text-slate-900">Data perhitungan belum tersedia</h3>
            <p class="text-slate-500 mt-2">Silakan tambah data alternatif terlebih dahulu untuk melihat detail WP.</p>
            <a href="<?= BASEURL; ?>/alternatif/create" class="inline-flex items-center px-5 py-2.5 mt-5 bg-primary hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors shadow-sm shadow-blue-200">
                Tambah Data Alternatif
            </a>
        </div>
    <?php else : ?>
    <div class="space-y-4">
        <details id="wp-step-1" open class="group bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <summary class="list-none cursor-pointer px-6 py-4 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900">1. Normalisasi Bobot</h3>
                    <p class="text-sm text-slate-500">Nilai bobot akhir tiap kriteria (W).</p>
                </div>
                <span class="text-slate-400 group-open:rotate-180 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </summary>
            <div class="px-6 pb-6">
                <div class="overflow-x-auto border border-slate-200 rounded-lg">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 text-slate-700">
                            <tr>
                                <?php foreach ($weightKeys as $key) : ?>
                                    <th class="px-4 py-3 font-semibold text-center"><?= strtoupper($key); ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr>
                                <?php foreach ($weightKeys as $key) : ?>
                                    <td class="px-4 py-3 text-center text-slate-700"><?= number_format((float) $data['wp']['W'][$key], 4); ?></td>
                                <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </details>

        <details id="wp-step-2" class="group bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <summary class="list-none cursor-pointer px-6 py-4 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900">2. Nilai Vektor S</h3>
                    <p class="text-sm text-slate-500">Hasil perkalian perpangkatan setiap alternatif.</p>
                </div>
                <span class="text-slate-400 group-open:rotate-180 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </summary>
            <div class="px-6 pb-6">
                <div class="max-w-xl overflow-x-auto border border-slate-200 rounded-lg">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 text-slate-700">
                            <tr>
                                <th class="px-4 py-3 font-semibold">Alt</th>
                                <th class="px-4 py-3 font-semibold text-center">Nilai S</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <?php foreach ($data['wp']['S'] as $altId => $s) : ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-3 font-medium text-slate-900"><?= 'A' . $altId; ?></td>
                                    <td class="px-4 py-3 text-center text-slate-700"><?= number_format((float) $s, 4); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </details>

        <details id="wp-step-3" class="group bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <summary class="list-none cursor-pointer px-6 py-4 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900">3. Nilai Vektor V</h3>
                    <p class="text-sm text-slate-500">Preferensi akhir yang sudah dinormalisasi.</p>
                </div>
                <span class="text-slate-400 group-open:rotate-180 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </summary>
            <div class="px-6 pb-6">
                <div class="max-w-xl overflow-x-auto border border-slate-200 rounded-lg">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 text-slate-700">
                            <tr>
                                <th class="px-4 py-3 font-semibold">Alt</th>
                                <th class="px-4 py-3 font-semibold text-center">Nilai V</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <?php foreach ($data['wp']['rankWp'] as $altId => $v) : ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-3 font-medium text-slate-900"><?= 'A' . $altId; ?></td>
                                    <td class="px-4 py-3 text-center text-slate-700"><?= number_format((float) $v, 4); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </details>

        <details id="wp-step-4" class="group bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <summary class="list-none cursor-pointer px-6 py-4 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900">4. Ranking Metode WP</h3>
                    <p class="text-sm text-slate-500">Status rekomendasi berdasarkan 50% nilai teratas.</p>
                </div>
                <span class="text-slate-400 group-open:rotate-180 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </summary>
            <div class="px-6 pb-6">
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-xs text-slate-500">Filter tampilan ranking</p>
                    <div class="inline-flex items-center gap-2">
                        <label for="wp-top-filter" class="text-xs font-medium text-slate-600">Top</label>
                        <select id="wp-top-filter" class="px-2.5 py-1.5 rounded-md border border-slate-200 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500">
                            <option value="0">Semua</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div class="max-w-4xl overflow-x-auto border border-slate-200 rounded-lg">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 text-slate-700">
                            <tr>
                                <th class="px-4 py-3 font-semibold text-center">Rank</th>
                                <th class="px-4 py-3 font-semibold">Alt</th>
                                <th class="px-4 py-3 font-semibold">Nama</th>
                                <th class="px-4 py-3 font-semibold text-center">Nilai</th>
                                <th class="px-4 py-3 font-semibold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <?php $index = 1; foreach ($data['wp']['rankWp'] as $key => $value) : ?>
                                <tr class="hover:bg-slate-50 ranking-row" data-rank="<?= $index; ?>">
                                    <td class="px-4 py-3 text-center">
                                        <?php if ($index === 1) : ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">Top 1</span>
                                        <?php elseif ($index === 2) : ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-200 text-slate-700">Top 2</span>
                                        <?php elseif ($index === 3) : ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-700">Top 3</span>
                                        <?php else : ?>
                                            <span class="text-xs font-semibold text-slate-500"><?= $index; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-slate-900"><?= 'A' . $key; ?></td>
                                    <td class="px-4 py-3 text-slate-700"><?= $data['wp']['users'][$key] ?? '-'; ?></td>
                                    <td class="px-4 py-3 text-center font-medium text-slate-900"><?= number_format((float) $value, 4); ?></td>
                                    <td class="px-4 py-3 text-center">
                                        <?php if ($index <= $lolos) : ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">Diterima</span>
                                        <?php else : ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-700">Tidak Diterima</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php $index++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </details>
    </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumpButtons = document.querySelectorAll('.step-jump');
        const actionButtons = document.querySelectorAll('.step-action');
        const allSteps = Array.from(document.querySelectorAll('details[id^="wp-step-"]'));
        const wpTopFilter = document.getElementById('wp-top-filter');
        const rankingRows = document.querySelectorAll('.ranking-row');

        function setActiveButton(targetId) {
            jumpButtons.forEach(function (btn) {
                const isActive = btn.getAttribute('data-step-target') === targetId;
                btn.classList.toggle('text-primary', isActive);
                btn.classList.toggle('border-blue-300', isActive);
                btn.classList.toggle('bg-blue-50', isActive);
            });
        }

        jumpButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const targetId = this.getAttribute('data-step-target');
                const target = document.getElementById(targetId);
                if (!target) return;
                target.open = true;
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                setActiveButton(targetId);
            });
        });

        actionButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const action = this.getAttribute('data-step-action');
                if (action === 'expand') {
                    allSteps.forEach(function (step) { step.open = true; });
                }
                if (action === 'collapse') {
                    allSteps.forEach(function (step, index) { step.open = index === 0; });
                }
            });
        });

        if (wpTopFilter && rankingRows.length > 0) {
            wpTopFilter.addEventListener('change', function () {
                const topN = parseInt(this.value, 10);
                rankingRows.forEach(function (row) {
                    const rank = parseInt(row.getAttribute('data-rank'), 10);
                    row.classList.toggle('hidden', topN > 0 && rank > topN);
                });
            });
        }

        function updateActiveByScroll() {
            if (allSteps.length === 0) return;
            let activeStep = allSteps[0];
            const threshold = 180;

            allSteps.forEach(function (step) {
                const top = step.getBoundingClientRect().top;
                if (top - threshold <= 0) {
                    activeStep = step;
                }
            });

            setActiveButton(activeStep.id);
        }

        updateActiveByScroll();
        window.addEventListener('scroll', updateActiveByScroll, { passive: true });
    });
</script>
