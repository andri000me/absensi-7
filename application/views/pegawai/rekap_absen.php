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
            <h4 class="text-center"></h4>
        </div>
    </div>
    <hr>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-3">
            <form class="" action="<?= site_url('absen/rekap_absen/')?>" method="post">
                <div class="input-group">
                <select name = "bulan" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option value="<?= date('m') ?>">Pilih Bulan</option>
                    <option value="01" <?php echo ($bulan == '01') ? 'selected' : ''; ?>>Januari</option>
                    <option value="02" <?php echo ($bulan == '02') ? 'selected' : '' ?> >februari</option>
                    <option value="03" <?php echo ($bulan == '03') ? 'selected' : '' ?>>Maret</option>
                    <option value="04" <?php echo ($bulan == '04') ? 'selected' : '' ?>>April</option>
                    <option value="05" <?php echo ($bulan == '05') ? 'selected' : '' ?>>Mei</option>
                    <option value="06" <?php echo ($bulan == '06') ? 'selected' : '' ?>>Juni</option>
                    <option value="07" <?php echo ($bulan == '07') ? 'selected' : '' ?>>Juli</option>
                    <option value="08" <?php echo ($bulan == '08') ? 'selected' : '' ?>>Agustus</option>
                    <option value="09" <?php echo ($bulan == '09') ? 'selected' : '' ?>>September</option>
                    <option value="10" <?php echo ($bulan == '10') ? 'selected' : '' ?>>Oktober</option>
                    <option value="11" <?php echo ($bulan == '11') ? 'selected' : '' ?>>November</option>
                    <option value="12" <?php echo ($bulan == '02') ? 'selected' : '' ?>>Desember</option>
                </select>
                <div class="input-group-append">
                    <button name="submit" class="btn btn-outline-secondary" type="submit">Submit</button>
                </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h4 class="text-center">Rekap Absen Bulan (<?= date('m-Y')?>)</h4>
            <h3 class="text-center">(<?= $pegawai['nama_pegawai']?>)</h3>
        </div>
        <div class="col-md-3">
        <a href="<?= base_url('absen/cetak_rekap_absen/').$pegawai['nip']. "/" .$bulan ?>" target="blank">
            <button type="button" class="btn btn-dark btn-block">Cetak</button>
        </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover table-sm table-striped" id="mytable">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="15%">Tgl</th>
                <th scope="col" width="20%">Absen Masuk</th>
                <th scope="col" width="20%">Absen Pulang</th>
                <th scope="col" width="25%">Keterangan</th>
                <th scope="col" width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
                switch($bulan){
                    case date('m'):
                        $tgl = date('d');
                    break;
                    case '01':
                        $tgl = 31;
                    break;
                    case '02':
                        $tgl = 29;
                    break;
                    case '03':
                        $tgl = 31;
                    break;
                    case '04':
                        $tgl = 30;
                    break;
                    case '05':
                        $tgl = 31;
                    break;
                    case '06':
                        $tgl = 30;
                    break;
                    case '07':
                        $tgl = 31;
                    break;
                    case '08':
                        $tgl = 31;
                    break;
                    case '09':
                        $tgl = 30;
                    break;
                    case '10':
                        $tgl = 31;
                    break;
                    case '11':
                        $tgl = 30;
                    break;
                    case '12':
                        $tgl = 31;
                    break;
                    default:
                        $tgl = date('d');
                break;
                }  

                $no = 1;
                $thn_bln = date('Y') ."-". $bulan;
                for ($i = 1; $i <= $tgl; $i++):
                   
                    if ($i<=9){
                        $tgl_select = '0'.$i;
                    }else {
                        $tgl_select = $i;
                    }

                    $tgl_now = date('Y') ."-". $bulan . "-". $tgl_select;
                ?>
              
              <tr>
                <th scope="row"><?= $no."."?></th>
                <td>
                    <?= $tgl_select ."-".$bulan."-". date('Y')?>   
                </td>
                <?php
                    //$tgl = date('d');
                    //$thn_bln = date('Y-m');
                        $sql = "SELECT  `waktu_masuk`, `waktu_keluar`  FROM `tbl_absensi` WHERE `nip` = '". $pegawai['nip'] ."' && tgl_absen = '".$tgl_now."'";
                        $result = $this->db->query($sql)->row_array();
                        if ($result){
                            //absen masuk
                            echo '<td>';
                            echo substr($result['waktu_masuk'], 0, 5);
                            echo '</td>';
                            
                            if ($result['waktu_keluar'] == '00:00:00'){
                                //absen pulang
                                echo '<td>';
                                echo '-';
                                echo '</td>';
                                
                                //keterangan
                                echo '<td>';
                                if (substr($result['waktu_masuk'], 0, 5) <= '08:00'){
                                    echo 'Anda belum absen pulang';
                                }else {
                                    echo 'Anda Terlambat, dan belum absen pulang';
                                }
                                echo '</td>';

                                //aksi
                                echo '<td>';

                                if ($tgl_now == date('Y-m-d')){
                                    echo '-';
                                } else {
                                    echo "<button class='btn btn-warning btn-block' data-toggle='modal' data-target='#edit".$no."'>Absen Pulang</button>";
                                }

                                ?>
                                    

                                     <!-- Modal -->
                                        <div class="modal fade" id="edit<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pekerjaan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="" action="<?php echo site_url('absen/add_absen_pulang/').$tgl_now. '/' . $bulan ; ?>" method="post" id="formedit<?= $no; ?>">
                                                        <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="jam_keluar">Jam Pulang</label>
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="jam_keluar">
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="menit_keluar">
                                                                <option value="00">00</option>
                                                                <option value="05">05</option>
                                                                <option value="10">10</option>
                                                                <option value="15">15</option>
                                                                <option value="20">20</option>
                                                                <option value="25">25</option>
                                                                <option value="30">30</option>
                                                                <option value="35">35</option>
                                                                <option value="40">40</option>
                                                                <option value="45">45</option>
                                                                <option value="50">50</option>
                                                                <option value="55">55</option>
                                                                </select>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </form>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-primary" onclick="$('#formedit<?= $no; ?>').submit()">Simpan</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    <!-- End modal -->
                                <?php
                                echo '</td>';
                            }else{
                                //absen pulang
                                echo '<td>';
                                echo substr($result['waktu_keluar'], 0, 5);
                                echo '</td>';

                                //keterangan
                                echo '<td>';
                                if (substr($result['waktu_masuk'], 0, 5) <= '08:00'){
                                    echo 'Good';
                                }else {
                                    echo 'Anda Terlambat';
                                }
                                echo '</td>';

                                //aksi
                                echo '<td>';
                                echo '-';
                                echo '</td>';
                            }
                        }else {
                            //absen masuk
                            echo '<td>';
                            echo '-';
                            echo '</td>';
                            //absen pulang
                            echo '<td>';
                            echo '-';
                            echo '</td>';
                            // keterangan
                            echo '<td>';
                            echo 'Anda tidak Absen';
                            echo '</td>';

                            //aksi
                            echo '<td>';
                            ?>
                            <button class="btn btn-danger btn-block" data-toggle='modal' data-target='#tambah<?=$no?>'>Absen</button>

                                 <!-- Modal -->
                    <div class="modal fade" id="tambah<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pekerjaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form class="" action="<?php echo site_url('absen/add_new_absen/').$tgl_now. '/' . $bulan ; ?>" method="post" id="formadd<?= $no; ?>">
                                    <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="start_h">Jam Masuk</label>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="jam_masuk">
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="menit_masuk">
                                            <option value="00">00</option>
                                            <option value="05">05</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="end_h">Jam Pulang</label>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="jam_keluar">
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="menit_keluar">
                                            <option value="00">00</option>
                                            <option value="05">05</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="$('#formadd<?= $no; ?>').submit()">Simpan</button>
                        </div>
                        </div>
                    </div>
                    </div>
                                    <!-- End modal -->

                            <?php
                            echo '</td>';    

                        }
                ?>
              </tr>
              <?php $no++; endfor; ?>
            </tbody>
          </table>
        </div>
        </div>
    </div>

</div>
