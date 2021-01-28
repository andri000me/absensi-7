<main>
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
            <h4 class="text-center">Kantor Wilayah Kementerian Agama Provinsi NTT</h4>
        </div>
    </div>
    <hr>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-2 text-center">
            <img src="<?= base_url(); ?>assets/img/logo_kemenag.png" class="img-fluid rounded" alt="">
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote text-center">
                <p class="mb-0"><u><?= $pegawai['nama_pegawai']?></u></p>
                <p class="mb-0">NIP. <?= $pegawai['nip']?> </p>
                <p><?= $pegawai['jabatan']?> </p>
                <footer class="blockquote-footer">Status Covid-19 :  <cite title="Source Title"><?= $pegawai['status_covid']?></cite></footer>
            </blockquote>
        </div>
        <div class="col-md-6 text-center" >
            <a href="<?php echo site_url('absen/add_absen');?>">
                <button  id="checkout-button" type="button" class="btn btn-success btn-block">Absen</button>
            </a>
            <div class="row mt-2">
                <div class="col-md-6 text-center">
                        <h6>Absen Masuk :</h6>    
                </div>
                <hr>
                <div class="col-md-6">
                        <h6>
                          <?php 
                              if(!isset($absen['waktu_masuk']))
                              {
                                echo '-';
                              } else {
                                echo $absen['waktu_masuk'];
                              }
                            ?>
                        </h6>  
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                        <h6>Absen Pulang :</h6>  
                </div>
                <div class="col-md-6">
                        <h6><?php
                            if (!isset($absen)){
                                echo '-';
                            } else {
                              if($absen['waktu_keluar'] == '00:00:00')
                              {
                                echo '-';
                              } else {
                                echo $absen['waktu_keluar'];
                              }
                            }
                           ?>
                        </h6>  
                </div>
            </div>

            <hr>
            <div class="badge badge-info text-wrap">
                Jam Absen Masuk: 07.00 s.d 09.00<br>
                Jam Absen Pulang: 16.00 s.d 18.00
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <h4 class="text-center">Ubah Pekerjaan</h4>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <form class="" action="<?= site_url('absen/edit_kerja/').$pekerjaan['id_aktivitas'];?>" method="post">
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="start_h">Mulai</label>
                    <div class="row">
                      <div class="col-md-6">

                      <?php
                      
                        $jam_mulai = substr($pekerjaan['jam_mulai'], 0, 2);
                        $menit_mulai = substr($pekerjaan['jam_mulai'], 3, 2);

                        //echo $jam_mulai . ":" .$menit_mulai;

                      ?>
                        <select class="form-control" name="start_h">
                          <option value="01" <?php if($jam_mulai == '01') echo 'selected'; ?>>01</option>
                          <option value="02" <?php if($jam_mulai == '02') echo 'selected'; ?>>02</option>
                          <option value="03" <?php if($jam_mulai == '03') echo 'selected'; ?>>03</option>
                          <option value="04" <?php if($jam_mulai == '04') echo 'selected'; ?>>04</option>
                          <option value="05" <?php if($jam_mulai == '05') echo 'selected'; ?>>05</option>
                          <option value="06" <?php if($jam_mulai == '06') echo 'selected'; ?>>06</option>
                          <option value="07" <?php if($jam_mulai == '07') echo 'selected'; ?>>07</option>
                          <option value="08" <?php if($jam_mulai == '08') echo 'selected'; ?>>08</option>
                          <option value="09" <?php if($jam_mulai == '09') echo 'selected'; ?>>09</option>
                          <option value="10" <?php if($jam_mulai == '10') echo 'selected'; ?>>10</option>
                          <option value="11" <?php if($jam_mulai == '11') echo 'selected'; ?>>11</option>
                          <option value="12" <?php if($jam_mulai == '12') echo 'selected'; ?>>12</option>
                          <option value="13" <?php if($jam_mulai == '13') echo 'selected'; ?>>13</option>
                          <option value="14" <?php if($jam_mulai == '14') echo 'selected'; ?>>14</option>
                          <option value="15" <?php if($jam_mulai == '15') echo 'selected'; ?>>15</option>
                          <option value="16" <?php if($jam_mulai == '16') echo 'selected'; ?>>16</option>
                          <option value="17" <?php if($jam_mulai == '17') echo 'selected'; ?>>17</option>
                          <option value="18" <?php if($jam_mulai == '18') echo 'selected'; ?>>18</option>
                          <option value="19" <?php if($jam_mulai == '19') echo 'selected'; ?>>19</option>
                          <option value="20" <?php if($jam_mulai == '20') echo 'selected'; ?>>20</option>
                          <option value="21" <?php if($jam_mulai == '21') echo 'selected'; ?>>21</option>
                          <option value="22" <?php if($jam_mulai == '22') echo 'selected'; ?>>22</option>
                          <option value="23" <?php if($jam_mulai == '23') echo 'selected'; ?>>23</option>
                          <option value="24" <?php if($jam_mulai == '24') echo 'selected'; ?>>24</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="start_m">
                          <option value="00" <?php if($menit_mulai == '00') echo 'selected'; ?>>00</option>
                          <option value="05" <?php if($menit_mulai == '05') echo 'selected'; ?>>05</option>
                          <option value="10" <?php if($menit_mulai == '10') echo 'selected'; ?>>10</option>
                          <option value="15" <?php if($menit_mulai == '15') echo 'selected'; ?>>15</option>
                          <option value="20" <?php if($menit_mulai == '20') echo 'selected'; ?>>20</option>
                          <option value="25" <?php if($menit_mulai == '25') echo 'selected'; ?>>25</option>
                          <option value="30" <?php if($menit_mulai == '30') echo 'selected'; ?>>30</option>
                          <option value="35" <?php if($menit_mulai == '35') echo 'selected'; ?>>35</option>
                          <option value="40" <?php if($menit_mulai == '40') echo 'selected'; ?>>40</option>
                          <option value="45" <?php if($menit_mulai == '45') echo 'selected'; ?>>45</option>
                          <option value="50" <?php if($menit_mulai == '50') echo 'selected'; ?>>50</option>
                          <option value="55" <?php if($menit_mulai == '55') echo 'selected'; ?>>55</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="end_h">s.d Jam</label>
                    <div class="row">
                      <div class="col-md-6">

                      <?php
                      
                      $jam_selesai = substr($pekerjaan['jam_selesai'], 0, 2);
                      $menit_selesai = substr($pekerjaan['jam_selesai'], 3, 2);

                      //echo $jam_mulai . ":" .$menit_mulai;

                      ?>
                        <select class="form-control" name="end_h">
                          <option value="01" <?php if($jam_selesai == '01') echo 'selected'; ?>>01</option>
                          <option value="02" <?php if($jam_selesai == '02') echo 'selected'; ?>>02</option>
                          <option value="03" <?php if($jam_selesai == '03') echo 'selected'; ?>>03</option>
                          <option value="04" <?php if($jam_selesai == '04') echo 'selected'; ?>>04</option>
                          <option value="05" <?php if($jam_selesai == '05') echo 'selected'; ?>>05</option>
                          <option value="06" <?php if($jam_selesai == '06') echo 'selected'; ?>>06</option>
                          <option value="07" <?php if($jam_selesai == '07') echo 'selected'; ?>>07</option>
                          <option value="08" <?php if($jam_selesai == '08') echo 'selected'; ?>>08</option>
                          <option value="09" <?php if($jam_selesai == '09') echo 'selected'; ?>>09</option>
                          <option value="10" <?php if($jam_selesai == '10') echo 'selected'; ?>>10</option>
                          <option value="11" <?php if($jam_selesai == '11') echo 'selected'; ?>>11</option>
                          <option value="12" <?php if($jam_selesai == '12') echo 'selected'; ?>>12</option>
                          <option value="13" <?php if($jam_selesai == '13') echo 'selected'; ?>>13</option>
                          <option value="14" <?php if($jam_selesai == '14') echo 'selected'; ?>>14</option>
                          <option value="15" <?php if($jam_selesai == '15') echo 'selected'; ?>>15</option>
                          <option value="16" <?php if($jam_selesai == '16') echo 'selected'; ?>>16</option>
                          <option value="17" <?php if($jam_selesai == '17') echo 'selected'; ?>>17</option>
                          <option value="18" <?php if($jam_selesai == '18') echo 'selected'; ?>>18</option>
                          <option value="19" <?php if($jam_selesai == '19') echo 'selected'; ?>>19</option>
                          <option value="20" <?php if($jam_selesai == '20') echo 'selected'; ?>>20</option>
                          <option value="21" <?php if($jam_selesai == '21') echo 'selected'; ?>>21</option>
                          <option value="22" <?php if($jam_selesai == '22') echo 'selected'; ?>>22</option>
                          <option value="23" <?php if($jam_selesai == '23') echo 'selected'; ?>>23</option>
                          <option value="24" <?php if($jam_selesai == '24') echo 'selected'; ?>>24</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="end_m">
                          <option value="00" <?php if($menit_selesai == '00') echo 'selected'; ?>>00</option>
                          <option value="05" <?php if($menit_selesai == '05') echo 'selected'; ?>>05</option>
                          <option value="10" <?php if($menit_selesai == '10') echo 'selected'; ?>>10</option>
                          <option value="15" <?php if($menit_selesai == '15') echo 'selected'; ?>>15</option>
                          <option value="20" <?php if($menit_selesai == '20') echo 'selected'; ?>>20</option>
                          <option value="25" <?php if($menit_selesai == '25') echo 'selected'; ?>>25</option>
                          <option value="30" <?php if($menit_selesai == '30') echo 'selected'; ?>>30</option>
                          <option value="35" <?php if($menit_selesai == '35') echo 'selected'; ?>>35</option>
                          <option value="40" <?php if($menit_selesai == '40') echo 'selected'; ?>>40</option>
                          <option value="45" <?php if($menit_selesai == '45') echo 'selected'; ?>>45</option>
                          <option value="50" <?php if($menit_selesai == '50') echo 'selected'; ?>>50</option>
                          <option value="55" <?php if($menit_selesai == '55') echo 'selected'; ?>>55</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pekerjaan" class="d-block">Pekerjaan</label>
                  <textarea name="pekerjaan" class="form-control" rows="3"> <?php echo $pekerjaan['isi_aktivitas']; ?> </textarea>
                </div>
                <input type="hidden" name="lat" id="lat" value="">
                <input type="hidden" name="long" id="long" value="">
                <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>                
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="addkerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pekerjaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" onclick="$('#formadd').submit()">Simpan</button>
      </div>
    </div>
  </div>
</div>


</main>
 