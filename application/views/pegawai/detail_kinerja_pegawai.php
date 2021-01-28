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
            <form class="" action="<?= site_url('absen/detail_kinerja_pegawai/' . $pegawai['nip'])?>" method="post">
                <div class="input-group">
                <select name = "bulan" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option value="<?= date('m') ?>">Pilih Bulan</option>
                    <option value="01" <?php echo ($bulan == '01') ? 'selected' : ''; ?>>Januari</option>
                    <option value="02" <?php echo ($bulan == '02') ? 'selected' : '' ?> >februari</option>
                    <option value="03" <?php echo ($bulan == '03') ? 'selected' : '' ?>>Maret</option>
                    <option value="04" <?php echo ($bulan == '04') ? 'selected' : '' ?>>April</option>
                    <option value="05" <?php echo ($bulan == '05') ? 'selected' : '' ?>>Mei</option>
                </select>
                <div class="input-group-append">
                    <button name="submit" class="btn btn-outline-secondary" type="submit">Submit</button>
                </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h5 class="text-center">Rekap Kinerja Bulan (<?= $bulan. "-" .date('Y')?>)</h5>
            <h4 class="text-center"><?= $pegawai['nama_pegawai']?></h4>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover table-sm table-striped table-bordered" id="mytable">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="20%">Tanggal</th>
                <th scope="col" width="75%">Kinerja Harian</th>
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
              //$tgl = date('d');
              $thn_bln = date('Y') ."-". $bulan;
              for ($i = 1; $i <= $tgl; $i++):
                //echo '<td>';
                if ($i<=9){
                    $tgl_select = '0'.$i;
                }else {
                    $tgl_select = $i;
                }
            ?>
              <tr>
                <th scope="row"><?= $no."."?></th>
                <td>
                    <?= $tgl_select ."-".$bulan."-". date('Y')?>   
                </td>
                <?php
                    //echo '<td> aktivitas </td>';
                    
                      
                        // //$sql = "SELECT  `waktu_masuk`, `waktu_keluar`  FROM `tbl_absensi` WHERE `nip` = '". $peg['nip'] ."' && tgl_absen = '2020-04-". $tgl_select ."'";
                        $sql = "SELECT  * FROM `tbl_aktivitas` WHERE `nip` = '". $pegawai['nip'] ."' && tgl_aktivitas = '". $thn_bln."-".$tgl_select ."'";
                        $result = $this->db->query($sql)->result_array();
                        if ($result){
                            echo '<td>';
                            $urutan = 1;
                            foreach($result as $res){
                                echo substr($res['jam_mulai'],0,5)."-". substr($res['jam_selesai'],0,5). " ";
                                echo "<i>". $res['isi_aktivitas'] . "</i></br>";
                                
                                $urutan++;
                            }

                            echo '</td>';
                            
                        }else {
                          echo "<td class='table-danger'>-</td>";
                        }
                        // //echo '</td>';
                ?>
              </tr>

            <?php $no++; endfor; ?>
            </tbody>
          </table>
        </div>
        </div>
    </div>

</div>
