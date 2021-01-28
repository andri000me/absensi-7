<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Detail Data Satuan Kerja</h1>
        </div>
    </div>

    <hr>

    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Detail Data Satuan Kerja
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= "ID Satuan Kerja (username) : " . $unit['id_satker']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= "Nama Satuan Kerja : " . $unit['nama_satker']; ?></h6>
                    <p class="card-text"><?= "Level Satuan Kerja : Eselon " . $unit['level_satker']; ?></p>
                    <p class="card-text"><?= "Password : " .$unit['password']; ?></p>
                    <a href="<?= base_url(); ?>admin/unit" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>