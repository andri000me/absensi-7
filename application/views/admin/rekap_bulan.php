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
        <form class="" action="<?= site_url('admin/rekap_bulan/')?>" method="post">
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
                <option value="12" <?php echo ($bulan == '12') ? 'selected' : '' ?>>Desember</option>
            </select>
            <select name = "tahun" class="custom-select" id="inputGroupSelect04" aria-label="Tahun">
                <option value="<?= date('m') ?>">Pilih Tahun</option>
                <option value="2020" <?php echo ($tahun == '2020') ? 'selected' : ''; ?>>2020</option>
                <option value="2021" <?php echo ($tahun == '2021') ? 'selected' : '' ?> >2021</option>
            </select>
            <div class="input-group-append">
                <button name="submit" class="btn btn-outline-secondary" type="submit">Submit</button>
            </div>
        </div>
        </form>
        </div>

        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h4 class="text-center">Rekap Absen Bulan (<?php echo $bulan ."-". $tahun; ?>)</h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover table-sm table-striped" id="mytable">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="20%">Nama Pegawai</th>
                <?php
                    switch($bulan){
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
                            $tgl = date('m');
                    break;
                    }

                    //$tgl = date('d');
                    for ($i = 1; $i <= $tgl; $i++){
                        echo "<th scope='col'>". $i ."</th>";
                    }
                ?>
              </tr>
            </thead>
            <tbody>
            <?php 
              $no = 1;
            foreach($pegawai as $peg):?>
              
              <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $peg['nama_pegawai'] ?></td>
                <?php
                    //$tgl = date('d');
                    $thn_bln = $tahun."-".$bulan;
                    for ($i = 1; $i <= $tgl; $i++){
                        echo '<td>';
                        if ($i<=9){
                            $tgl_select = '0'.$i;
                        }else {
                            $tgl_select = $i;
                        }
                      
                        $sql = "SELECT  `waktu_masuk`, `waktu_keluar`  FROM `tbl_absensi` WHERE `nip` = '". $peg['nip'] ."' && tgl_absen = '". $thn_bln."-".$tgl_select ."'";
                        $result = $this->db->query($sql)->row_array();
                        if ($result){
                            echo substr($result['waktu_masuk'], 0, 5);
                            echo " </br> ";
                            if ($result['waktu_keluar'] == '00:00:00'){
                            echo '-';
                            }else{
                            echo substr($result['waktu_keluar'], 0, 5);
                            }

                        }else {
                            echo '-';
                        }
                        echo '</td>';
                    }
                ?>
              </tr>

            <?php $no++; endforeach; ?>
            </tbody>
          </table>
        </div>
        </div>
    </div>

</div>
