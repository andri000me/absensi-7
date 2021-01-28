<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-salah" data-flashdata="<?= $this->session->flashdata('salah'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>
    <?php if ($this->session->flashdata('salah')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('salah'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

<div class="container"> 
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center">Absensi Online</h2>
            <h4 class="text-center"><?= $satker['nama_satker']?></h4>
        </div>
    </div>
    <hr>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-3">
            <a href="<?= base_url(); ?>admin/tambah_pegawai/">
                <button class="btn btn-outline-secondary" type="button">Tambah Pegawai</button>
            </a>
        </div>
        <div class="col-md-6">
            <h4 class="text-center">Data Pegawai(<?= date('m-Y')?>)</h4>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <h3>Data Pegawai </h3>
            <?php if (empty($pegawai)) : ?>
                <div class="alert alert-danger" role="alert">
                data pegawai tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($pegawai as $peg) : ?>
                <li class="list-group-item">
                    <?= $peg['nama_pegawai'] . " | NIP." . $peg['nip']; ?>
                    <a href="<?= base_url(); ?>admin/hapus_pegawai/<?= $peg['id_pegawai']; ?>"
                        class="badge badge-danger float-right tombol-hapus">hapus </a>
                    <a href="<?= base_url(); ?>admin/ubah_pegawai/<?= $peg['nip']; ?>"
                        class="badge badge-success float-right">ubah </a>
                    <a href="<?= base_url(); ?>admin/detail_pegawai/<?= $peg['nip']; ?>"
                        class="badge badge-primary float-right">detail </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
