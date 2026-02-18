<div class="container">

    <div class="row">
        <div class="col-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="card shadow-lg my-5 border-0">
        <div class="card-body p-5">
            <h1 class="text-center mb-4 font-weight-bold text-primary">Sistem Penentu Keluarga Harapan</h1>
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <img src="<?=BASEURL;?>/img/logo-pkh.jpg" alt="Logo PKH" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                </div>
                <div class="col-md-7">
                    <p class="lead text-justify" style="line-height: 1.8;">
                        <strong>Program Keluarga Harapan (PKH)</strong> adalah program pemberian bantuan sosial bersyarat kepada Keluarga Miskin (KM) yang ditetapkan sebagai keluarga penerima manfaat PKH. 
                    </p>
                    <p class="text-muted text-justify">
                        PKH dilaksanakan dengan basis keluarga, bertujuan sebagai investasi jangka panjang untuk menciptakan sumber daya manusia (SDM) yang tangguh dan berkualitas di bidang kesehatan dan pendidikan. 
                        Program ini diharapkan dapat mengurangi angka kemiskinan secara langsung dan signifikan.
                    </p>
                    <div class="mt-4">
                        <?php if (!isset($_SESSION['user_id'])) : ?>
                            <a href="<?=BASEURL;?>/auth" class="btn btn-primary btn-lg shadow-sm px-4 me-2">Login Sekarang</a>
                        <?php else: ?>
                            <a href="<?=BASEURL;?>/alternatif" class="btn btn-primary btn-lg shadow-sm px-4 me-2">Lihat Data Penerima</a>
                        <?php endif; ?>
                        <a href="<?=BASEURL;?>/home/help" class="btn btn-outline-secondary btn-lg px-4">Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
