

<div class="container"> 
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Tambah data akta cerai</h1>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center" >
    <div class="col-md-8">

<div class="card">
    <div class="card-header">
        Tambah Data Akta Cerai
    </div>
    <div class="card-body">
            <?php
            echo form_open_multipart('admin/tambah');
            ?>   
            <div class="form-group">
                <label for="no_akta">Nomor Akta Cerai</label>
                <input type="text" name="no_akta" class="form-control" id="no_akta">
                <small class="form-text text-danger"><?= form_error('no_akta'); ?></small>
            </div>
            <div class="form-group">
                <label for="tgl_putusan">Tanggal Putusan</label>
                <input type="date" name="tgl_putusan" class="form-control" id="tgl_putusan">
                <small class="form-text text-danger"><?= form_error('tgl_putusan'); ?></small>
            </div>
            <div class="form-group">
                <label for="no_penetapan">Nomor Penetapan</label>
                <input type="text" name="no_penetapan" class="form-control" id="no_penetapan">
                <small class="form-text text-danger"><?= form_error('no_penetapan'); ?></small>
            </div>
            <div class="form-group">
                <label for="nama_pria">Nama Pria</label>
                <input type="text" name="nama_suami" class="form-control" id="nama_istri">
                <small class="form-text text-danger"><?= form_error('nama_suami'); ?></small>
            </div>
            <div class="form-group">
                <label for="nama_wanita">Nama Wanita</label>
                <input type="text" name="nama_istri" class="form-control" id="nama_suami">
                <small class="form-text text-danger"><?= form_error('nama_istri'); ?></small>
            </div>            
            <div class="form-group">
                <label for="file_akta">File Scan Akta Cerai</label>
                <?php echo form_upload('file_akta', set_value('file_akta'), 'class="form-control"'); ?>
                <small class="form-text text-danger"></small>
            </div>

            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
        </form>
    </div>
</div>


</div>
    </div>
</div>
