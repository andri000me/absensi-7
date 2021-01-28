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
            <h2 class="text-center">Tambah Unit</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                Tambah Data Unit
            </div>
            <div class="card-body">
                    <?php
                    echo form_open_multipart('admin/tambah_unit');
                    ?>   
                    <div class="form-group">
                        <label for="no_akta">ID Satker</label>
                        <input type="text" name="id_satker" class="form-control" id="nip" placeholder="ID Satuan Kerja">
                        <small class="form-text text-danger"><?= form_error('id_satker'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_unit">Nama satuan kerja / nama unit</label>
                        <input type="text" name="nama_satker" class="form-control" id="tgl_putusan" placeholder="Nama Unit">
                        <small class="form-text text-danger"><?= form_error('nama_pegawai'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="level_satker">Level Satker</label>
                        <select name="level_satker" class="custom-select" id="status_induk">
                            <option value="2">Eselon 2</option>
                            <option value="3">Eselon 3</option>
                            <option value="4">Eselon 4</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('level_satker'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="satker_induk">Satker Induk</label>
                        <?php
                                $id_satker = $_SESSION['admin'];

                                $sql2 = "SELECT * FROM `tbl_satker` WHERE id_satker LIKE '" .$id_satker."%'";
                                echo cmb_dinamis('id_satker_induk', $sql2 , 'nama_satker' , 'id_satker',  $_SESSION['admin']);
                        ?>
                        <small class="form-text text-danger"><?= form_error('satker_induk'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="password">
                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Unit</button>
                </form>
            </div>
        </div>
    </div>
</div>
