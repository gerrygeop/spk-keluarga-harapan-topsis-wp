<?php
$jumlahAlt = count($data['tp']['rankTp']);
$jumlahKriteria = count($data['tp']['V']) > 0 ? count(array_unique(array_map(function ($key) {
    return (int) preg_replace('/^V(\d+)-\d+$/', '$1', $key);
}, array_keys($data['tp']['V'])))) : 0;

$nilaiTopTopsis = $jumlahAlt > 0 ? (float) reset($data['tp']['rankTp']) : 0;
$nilaiTopWp = $jumlahAlt > 0 ? (float) reset($data['wp']['rankWp']) : 0;
$metodeTerbaik = $nilaiTopTopsis >= $nilaiTopWp ? 'TOPSIS' : 'WP';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Dashboard Hasil Perhitungan</h2>
            <p class="text-slate-500 mt-1">Ringkasan hasil TOPSIS dan WP untuk pengambilan keputusan.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <a href="<?= BASEURL; ?>/perhitungan/topsis" class="inline-flex items-center px-4 py-2.5 bg-white text-slate-700 border border-slate-200 rounded-lg hover:border-blue-600 font-medium transition-colors shadow-sm">
                Detail TOPSIS
            </a>
            <a href="<?= BASEURL; ?>/perhitungan/wp" class="inline-flex items-center px-4 py-2.5 bg-white text-slate-700 border border-slate-200 rounded-lg hover:border-blue-600 font-medium transition-colors shadow-sm">
                Detail WP
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <p class="text-sm font-medium text-slate-500">Metode Teratas</p>
            <h3 class="text-2xl font-bold text-slate-900 mt-1"><?= $metodeTerbaik; ?></h3>
            <p class="text-xs text-slate-500 mt-2">Berdasarkan skor preferensi tertinggi saat ini.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <p class="text-sm font-medium text-slate-500">Jumlah Alternatif</p>
            <h3 class="text-2xl font-bold text-slate-900 mt-1"><?= $jumlahAlt; ?></h3>
            <p class="text-xs text-slate-500 mt-2">Data calon penerima yang ikut dihitung.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <p class="text-sm font-medium text-slate-500">Jumlah Kriteria</p>
            <h3 class="text-2xl font-bold text-slate-900 mt-1"><?= $jumlahKriteria; ?></h3>
            <p class="text-xs text-slate-500 mt-2">Total indikator yang digunakan dalam proses.</p>
        </div>
    </div>

    <?php if ($jumlahAlt === 0) : ?>
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 text-center">
            <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-blue-50 text-primary flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900">Belum ada data alternatif</h3>
            <p class="text-slate-500 mt-2">Tambahkan data calon penerima terlebih dahulu agar hasil TOPSIS dan WP dapat dihitung.</p>
            <a href="<?= BASEURL; ?>/alternatif/create" class="inline-flex items-center px-5 py-2.5 mt-5 bg-primary hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors shadow-sm shadow-blue-200">
                Tambah Data Alternatif
            </a>
        </div>
    <?php else : ?>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <h3 class="text-lg font-bold text-slate-900 mb-4">Perbandingan Skor Teratas</h3>
            <div class="h-[300px]">
                <canvas id="chartSkorTop"></canvas>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <h3 class="text-lg font-bold text-slate-900 mb-4">Insight Cepat</h3>
            <div class="space-y-4">
                <div class="rounded-lg border border-slate-200 bg-slate-50 px-4 py-3">
                    <p class="text-sm text-slate-700">
                        Nilai tertinggi TOPSIS: <span class="font-semibold text-slate-900"><?= number_format($nilaiTopTopsis, 4); ?></span>
                    </p>
                </div>
                <div class="rounded-lg border border-slate-200 bg-slate-50 px-4 py-3">
                    <p class="text-sm text-slate-700">
                        Nilai tertinggi WP: <span class="font-semibold text-slate-900"><?= number_format($nilaiTopWp, 4); ?></span>
                    </p>
                </div>
                <div class="rounded-lg border border-blue-100 bg-blue-50 px-4 py-3">
                    <p class="text-sm text-blue-800">
                        Metode yang saat ini paling menonjol adalah <span class="font-semibold"><?= $metodeTerbaik; ?></span>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartTarget = document.getElementById('chartSkorTop');
        if (!chartTarget) return;

        const ctxSkorTop = chartTarget.getContext('2d');
        new Chart(ctxSkorTop, {
            type: 'bar',
            data: {
                labels: ['TOPSIS', 'WP'],
                datasets: [{
                    label: 'Skor Tertinggi',
                    data: [<?= json_encode($nilaiTopTopsis); ?>, <?= json_encode($nilaiTopWp); ?>],
                    backgroundColor: ['rgba(37, 99, 235, 0.85)', 'rgba(16, 185, 129, 0.85)'],
                    borderColor: ['rgb(37, 99, 235)', 'rgb(16, 185, 129)'],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e2e8f0'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
