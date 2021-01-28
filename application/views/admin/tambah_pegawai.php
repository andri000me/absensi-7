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
            <h2 class="text-center">Tambah Pegawai</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                Tambah Data Pegawai
            </div>
            <div class="card-body">
                    <?php
                    echo form_open_multipart('admin/tambah_pegawai');
                    ?>   
                    <div class="form-group">
                        <label for="no_akta">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP">
                        <small class="form-text text-danger"><?= form_error('nip'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" id="tgl_putusan" placeholder="Nama Pegawai">
                        <small class="form-text text-danger"><?= form_error('nama_pegawai'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="status_pegawai">Status Pegawai</label>
                        <select name="status_pegawai" class="custom-select" id="status_pegawai">
                            <option value="pns">PNS</option>
                            <option value="ppnpn">PPNPN</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('status_pegawai'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="id_satker">Unit Kerja</label>
                        <?php
                            $id_satker = $_SESSION['admin'];

                            $sql2 = "SELECT * FROM `tbl_satker` WHERE id_satker LIKE '" .$id_satker."%'";
                            echo cmb_dinamis('id_satker', $sql2 , 'nama_satker' , 'id_satker',  $_SESSION['admin']);
                        ?>
                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="golongan">Golongan</label>
                        <select name="golongan" class="custom-select" id="status_pegawai">
                            <option value="-">-</option>
                            <option value="III">Golongan III</option>
                            <option value="IV">Golongan IV</option>
                            <option value="II">Golongan II</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="grade_tukin">Grade Tukin</label>
                        <select name="grade_tukin" class="custom-select" id="status_pegawai">
                            <option value="-">-</option>
                            <option value="6">Grade 6</option>
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                            <option value="13">Grade 13</option>
                            <option value="14">Grade 14</option>
                            <option value="15">Grade 15</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="test">
                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="status_covid">Status Covid-19</label>
                        <select name="status_covid" class="custom-select" id="status_covid">
                            <option value="negatif">Negatif(-)</option>
                            <option value="gejala">Merasakan Gejala Covid-19</option>
                            <option value="odp">ODP (Orang dalam Pemantauan)</option>
                            <option value="pdp">PDP (Pasien dalam Pemantauan)</option>
                            <option value="positif">Positif (+)</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('status_covid'); ?></small>
                    </div>            
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Pegawai</button>
                </form>
            </div>
        </div>
    </div>
</div>
