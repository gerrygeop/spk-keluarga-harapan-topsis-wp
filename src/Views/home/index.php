<div class="bg-slate-50">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-8">
                <div>
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-sm font-medium mb-6">
                        <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                        Sistem Pendukung Keputusan
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold text-slate-900 leading-tight tracking-tight mb-4">
                        Penentu Keluarga <br>
                        <span class="text-primary">Harapan</span>
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed max-w-2xl">
                        Program Keluarga Harapan (PKH) adalah program pemberian bantuan sosial bersyarat kepada Keluarga Miskin (KM) yang ditetapkan sebagai keluarga penerima manfaat PKH.
                    </p>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <a href="<?=BASEURL;?>/kriteria" class="inline-flex items-center justify-center px-8 py-3.5 text-base font-semibold text-white bg-primary rounded-xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-200">
                        Lihat Kriteria
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="<?=BASEURL;?>/home/help" class="inline-flex items-center justify-center px-8 py-3.5 text-base font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all">
                        Bantuan
                    </a>
                </div>
            </div>
            
            <div class="lg:col-span-1"></div> <!-- Spacer -->
            
             <!-- Right Image/Illustration if needed, keeping empty for now or could add the logo again subtly -->
             <!-- Based on Image 2, there isn't a giant hero image, just text. But maybe there is, it's cut off? 
                  The prompt says "perbarui tampilan... berdasarkan gambar". 
                  Image 2 shows text on left. The background is light. 
                  There is a "Tentang Program PKH" section below cards. 
             -->
        </div>
    </div>

    <!-- Feature Cards Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Data Penerima -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Data Penerima</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Kelola data calon penerima PKH secara efisien
                </p>
            </div>

            <!-- Card 2: Metode TOPSIS & WP -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Metode TOPSIS & WP</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Perhitungan akurat dengan dua metode FMADM
                </p>
            </div>

            <!-- Card 3: Kriteria Lengkap -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Kriteria Lengkap</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    11 kriteria penilaian untuk seleksi yang adil
                </p>
            </div>

            <!-- Card 4: Hasil Transparan -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Hasil Transparan</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Laporan detail dan ranking penerima bantuan
                </p>
            </div>
        </div>
    </div>
    
    <!-- Tentang Section (Bottom of Image 2) -->
    <div class="bg-white py-20 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Tentang Program PKH</h2>
            <div class="prose prose-slate max-w-none text-slate-600">
                <p>
                    Program Keluarga Harapan (PKH) adalah program pemberian bantuan sosial bersyarat kepada Keluarga Miskin (KM) yang ditetapkan sebagai keluarga penerima manfaat PKH. 
                    Sebagai sebuah program bantuan sosial bersyarat, PKH membuka akses keluarga muskin terutama ibu hamil dan anak untuk memanfaatkan berbagai fasilitas layanan kesehatan (faskes) dan fasilitas layanan pendidikan (fasdik) yang tersedia di sekitar mereka.
                </p>
            </div>
        </div>
    </div>
</div>
