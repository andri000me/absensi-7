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
        <div class="col-md-2">
          <a href="<?= site_url('admin/lihat_peta')?>">
              <button class="btn btn-success btn-block">Lihat Lokasi Absen</button>
            </a>
        </div>
        <div class="col-md-8">
            <h4 class="text-center">Absen Hari Ini (<?= date('d-m-Y')?>)</h4>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover table-striped" id="mytable">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="20%">Nama Pegawai</th>
                <th scope="col" width="35%">Unit</th>
                <th scope="col" width="20%">Absen Masuk</th>
                <th scope="col" width="20%">Absen Pulang</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $i = 1;
            foreach($pegawai as $peg):?>
              
              <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $peg['nama_pegawai'] ?></td>
                <td>
                    <?php
                      $sql = "SELECT `nama_satker` FROM `tbl_satker` WHERE `id_satker` = '". $peg['id_satker'] ."'";
                      $result = $this->db->query($sql)->row_array();
                      echo $result['nama_satker'];
                    ?>
                </td>
                <td>
                    <?php
                      $sql = "SELECT `waktu_masuk` FROM `tbl_absensi` WHERE `nip` = '". $peg['nip'] ."' && tgl_absen = '". date('Y-m-d') ."'";
                      $result = $this->db->query($sql)->row_array();
                      if ($result){
                        echo $result['waktu_masuk'] . ' WITA';
                      }else {
                        echo '-';
                      }
                      
                    ?>
                </td>
                <td>
                    <?php
                      $sql = "SELECT `waktu_keluar` FROM `tbl_absensi` WHERE `nip` = '". $peg['nip'] ."' && tgl_absen = '". date('Y-m-d') ."'";
                      $result = $this->db->query($sql)->row_array();
                      if ($result){
                        if ($result['waktu_keluar'] == '00:00:00'){
                          echo '-';
                        }else{
                          echo $result['waktu_keluar'];
                        }
                      }else {
                        echo '-';
                      }
                      
                    ?>  
                </td>
              </tr>

            <?php $i++; endforeach; ?>
            </tbody>
          </table>
        </div>
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
      <form class="" action="<?= site_url('absen/add_kerja');?>" method="post" id="formadd">
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="start_h">Mulai</label>
                    <div class="row">
                      <div class="col-md-6">
                        <select class="form-control" name="start_h">
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="start_m">
                          <option value="00">00</option>
                          <option value="30">30</option>
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
                        <select class="form-control" name="end_h">
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="end_m">
                          <option value="00">00</option>
                          <option value="30">30</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pekerjaan" class="d-block">Pekerjaan</label>
                  <textarea name="pekerjaan" class="form-control" rows="3"></textarea>
                </div>
                <input type="hidden" name="lat" id="lat" value="">
                <input type="hidden" name="long" id="long" value="">
              </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" onclick="$('#formadd').submit()">Simpan</button>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
    // var t;
    // $(document).ready(function () {

    //   Swal({
    //     title: 'Absen Online',
    //     text: flashData,
    //     type: 'success'
    //   });

    //   alert("Test");

    //     t = $('#mytable').DataTable({
    //         "processing": true, //Feature control the processing indicator.
    //         "serverSide": true, //Feature control DataTables' server-side processing mode.
    //         "order": [[1, 'desc']], //Initial no order.
    //         // Load data for the table's content from an Ajax source
    //         "ajax": {
    //            "url": '<?php echo site_url('absen/json'); ?>',
    //            "type": "POST"
    //          },
    //          //Set column definition initialisation properties.
    //          "columns": [
    //             {"data": "tgl_aktivitas","width":"20%"},
    //             {"data": "jam_mulai","width":"20%"},
    //             {"data": "isi_aktivitas","width":"60%"}
    //           ]
    //     });

    //     t.on('order.dt search.dt', function () {
    //         t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
    //             cell.innerHTML = i + 1;
    //         });
    //     }).draw();
    // });
</script>