
<div class="container">

<div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Ubah Data Unit</h1>
        </div>
    </div>

<hr>


<div class="row mt-3">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                Form Ubah Data Unit
            </div>
            <div class="card-body">
                    <?php
                    echo form_open_multipart('');
                    ?>
                    <input type="hidden" name="id_satker_awal" value="<?= $satker['id_satker']; ?>">   
                    <div class="form-group">
                        <label for="id_satker">ID Satker</label>
                        <input type="text" name="id_satker" class="form-control" id="nip" value="<?= $satker['id_satker']; ?>" placeholder="id satuan kerja" disabled>
                        <small class="form-text text-danger"><?= form_error('id_satker'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_unit">Nama Satuan Kerja</label>
                        <input type="text" name="nama_satker" class="form-control" id="tgl_putusan" value="<?= $satker['nama_satker']; ?>" placeholder="nama satuan kerja">
                        <small class="form-text text-danger"><?= form_error('nama_pegawai'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="level_satker">Level Satker</label>
                        <select name="level_satker" class="custom-select" id="status_induk">
                            <option value="2" <?php if($satker['level_satker'] == 2) echo 'selected'; ?>>Eselon 2</option>
                            <option value="3" <?php if($satker['level_satker'] == 3) echo 'selected'; ?>>Eselon 3</option>
                            <option value="4" <?php if($satker['level_satker'] == 4) echo 'selected'; ?>>Eselon 4</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('level_satker'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="satker_induk">Satker Induk</label>
                            <?php
                                $id_satker = substr($satker['id_satker_induk'],0,5);

                                $sql2 = "SELECT * FROM `tbl_satker` WHERE id_satker LIKE '" .$id_satker."%'";
                                echo cmb_dinamis('satker_induk', $sql2 , 'nama_satker' , 'id_satker', $satker['id_satker_induk']);
                            ?>
                        <small class="form-text text-danger"><?= form_error('satker_induk'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="satker_induk">Pimpinan Unit</label>
                            <?php
                                //$id_satker = substr($satker['id_satker_induk'],0,5);

                                $sql2 = "SELECT * FROM `tbl_pegawai` WHERE id_satker = '" .$satker['id_satker']."'";
                                echo cmb_dinamis('pimpinan_satker', $sql2 , 'nama_pegawai' , 'id_pegawai', $satker['pimpinan_satker']);
                            ?>
                        <small class="form-text text-danger"><?= form_error('satker_induk'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="<?= $satker['password']; ?>" placeholder="password">
                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>
                </form>
            </div>
        </div>


    </div>
</div>

</div>