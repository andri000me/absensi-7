
<div class="container">

<div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Ubah Data Pegawai</h1>
        </div>
    </div>

<hr>


<div class="row mt-3">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                Form Ubah Data Pegawai
            </div>
            <div class="card-body">
                <?php
                    echo form_open_multipart();
                ?>   
                    <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
                    <div class="form-group">
                        <label for="no_akta">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" value="<?= $pegawai['nip']; ?>" placeholder="NIP">
                        <small class="form-text text-danger"><?= form_error('nip'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" id="tgl_putusan" value="<?= $pegawai['nama_pegawai']; ?>" placeholder="nama pegawai">
                        <small class="form-text text-danger"><?= form_error('nama_pegawai'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="status_pegawai">Status Pegawai</label>
                        <select name="status_pegawai" class="custom-select" id="status_pegawai">
                            <option value="PNS" <?php if($pegawai['status_pegawai'] == 'PNS') echo 'selected'; ?>>PNS</option>
                            <option value="PPNPN" <?php if($pegawai['status_pegawai'] == 'PPNPN') echo 'selected'; ?>>PPNPN</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('status_pegawai'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $pegawai['jabatan']; ?>" placeholder="jabatan">
                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="id_satker">Unit Kerja</label>
                            <?php
                                $id_satker = substr($pegawai['id_satker'],0,5);

                                 $sql2 = "SELECT * FROM `tbl_satker` WHERE id_satker LIKE '" .$id_satker."%'";
                                 echo cmb_dinamis('id_satker', $sql2 , 'nama_satker' , 'id_satker', $pegawai['id_satker']);
                            ?>
                        <small class="form-text text-danger"><?= form_error('id_satker'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="golongan">Golongan</label>
                        <select name="golongan" class="custom-select" id="status_pegawai">
                            <option value="-">-</option>
                            <option value="III" <?php if($pegawai['golongan'] == 'III') echo 'selected'; ?>>Golongan III</option>
                            <option value="IV" <?php if($pegawai['golongan'] == 'IV') echo 'selected'; ?>>Golongan IV</option>
                            <option value="II" <?php if($pegawai['golongan'] == 'II') echo 'selected'; ?>>Golongan II</option>
                            <option value="II" <?php if($pegawai['golongan'] == 'I') echo 'selected'; ?>>Golongan I</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="grade_tukin">Grade Tukin</label>
                        <select name="grade_tukin" class="custom-select" id="status_pegawai">
                            <option value="-">-</option>
                            <option value="6" <?php if($pegawai['grade_tukin'] == 5) echo 'selected'; ?>>Grade 5</option>
                            <option value="6" <?php if($pegawai['grade_tukin'] == 6) echo 'selected'; ?>>Grade 6</option>
                            <option value="7" <?php if($pegawai['grade_tukin'] == 7) echo 'selected'; ?>>Grade 7</option>
                            <option value="8" <?php if($pegawai['grade_tukin'] == 8) echo 'selected'; ?>>Grade 8</option>
                            <option value="9" <?php if($pegawai['grade_tukin'] == 9) echo 'selected'; ?>>Grade 9</option>
                            <option value="10" <?php if($pegawai['grade_tukin'] == 10) echo 'selected'; ?>>Grade 10</option>
                            <option value="11" <?php if($pegawai['grade_tukin'] == 11) echo 'selected'; ?>>Grade 11</option>
                            <option value="12" <?php if($pegawai['grade_tukin'] == 12) echo 'selected'; ?>>Grade 12</option>
                            <option value="13" <?php if($pegawai['grade_tukin'] == 13) echo 'selected'; ?>>Grade 13</option>
                            <option value="14"<?php if($pegawai['grade_tukin'] == 14) echo 'selected'; ?>>Grade 14</option>
                            <option value="15"<?php if($pegawai['grade_tukin'] == 15) echo 'selected'; ?>>Grade 15</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="<?= $pegawai['password']; ?>"  placeholder="test">
                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="status_covid">Status Covid-19</label>
                        <select name="status_covid" class="custom-select" id="status_covid">
                            <option value="negatif" <?php if($pegawai['status_covid'] == 'negatif') echo 'selected'; ?>>Negatif(-)</option>
                            <option value="gejala" <?php if($pegawai['status_covid'] == 'gejala') echo 'selected'; ?>>Merasakan Gejala Covid-19</option>
                            <option value="odp" <?php if($pegawai['status_covid'] == 'odp') echo 'selected'; ?>>ODP (Orang dalam Pemantauan)</option>
                            <option value="pdp" <?php if($pegawai['status_covid'] == 'pdp') echo 'selected'; ?>>PDP (Pasien dalam Pemantauan)</option>
                            <option value="positif" <?php if($pegawai['status_covid'] == 'positif') echo 'selected'; ?>>Positif (+)</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('status_covid'); ?></small>
                    </div>            
                    <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                </form>
            </div>
        </div>


    </div>
</div>

</div>