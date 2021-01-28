<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Detail Data Pegawai</h1>
        </div>
    </div>

    <hr>

    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Detail Data Pegawai
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= "NIP : " . $pegawai['nip']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= "Nama Pegawai : " . $pegawai['nama_pegawai']; ?></h6>
                    <p class="card-text"><?= "Status Pegawai : " . $pegawai['status_pegawai']; ?></p>
                    <p class="card-text"><?= "Jabatan : " . $pegawai['jabatan']; ?></p>
                    <p class="card-text"><?= "Golongan : " . $pegawai['golongan']; ?></p>
                    <p class="card-text"><?= "Grade Tukin : " . $pegawai['grade_tukin']; ?></p>
                    <p class="card-text"><?= "Password : " . $pegawai['password']; ?></p>
                    <p class="card-text"><?= "Status Covid-19 : " .$pegawai['status_covid']; ?></p>
                    <a href="<?= base_url(); ?>admin/pegawai" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>