<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logo_kemenag.png"/>

        <!-- Custom CSS-->
        <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/font_style.css" rel="stylesheet">

    <title>Rekap Kinerja</title>
  </head>
  <body>


<div class="container"> 
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <p style="font-size:11px">
            LAMPIRAN I <br>
            PERATURAN MENTERI AGAMA REPUBLIK INDONESIA NOMOR 45 TAHUN 2015 TENTANG PERUBAHAN ATAS </br> 
            PERATURAN MENTERI AGAMA NOMOR 28 TAHUN 2013 TENTANG DISIPLIN KEHADIRAN </br>
            PEGAWAI NEGERI SIPIL DI LINGKUNGAN KEMENTERIAN AGAMA <br>
            </p>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <h6 class="text-center">DAFTAR HADIR MANUAL</h6>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <table class="table table-borderless table-sm">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td><?php echo ": " .  $pegawai['nama_pegawai']?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td><?= ": " .  $pegawai['nip']?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td><?= ": " .  $pegawai['jabatan']?></td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td><?= ": " .  $satker['nama_satker']?></td>
                </tr>
                <tr>
                    <td>Bulan</td>
                    <td><?= ": " .  $bulan . "-" . date('Y')?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered" id="mytable">
            <thead class="thead-light">
              <tr align="center" vertical-align="center">
                <th rowspan="2" scope="col" width="5%">No</th>
                <th rowspan="2" scope="col" width="15%">Hari / Tanggal</th>
                <th colspan="2" scope="col" width="40%">Kedatangan</th>
                <th colspan="2" scope="col" width="40%">Kepulangan</th>
              </tr>
              <tr align="center" vertical-align="center">
                <th scope="col" width="20%">Absen Masuk</th>
                <th scope="col" width="20%">Tanda Tangan</th>
                <th scope="col" width="20%">Absen Pulang</th>
                <th scope="col" width="20%">Tanda Tangan</th>
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

                    $sql_day = "SELECT DAYNAME('".$tgl_now."') as nama_hari";
                    $day_name = $this->db->query($sql_day)->row_array();
                    $day_name = $day_name['nama_hari'];

                    switch ($day_name) {
                        case 'Monday':
                            $hari= 'Senin';
                            break;
                        case 'Tuesday':
                            $hari= 'Selasa';
                            break;
                        case 'Wednesday':
                            $hari= 'Rabu';
                            break;
                        case 'Thursday':
                            $hari= 'Kamis';
                            break;
                        case 'Friday':
                            $hari= 'Jumat';
                            break;
                        case 'Saturday':
                            $hari= 'Sabtu';
                            break;
                        case 'Sunday':
                            $hari= 'Ahad';
                            break;
                        
                        default:
                            # code...
                            break;
                    }

                    if ($day_name == 'Saturday' || $day_name == 'Sunday'){
                        continue;
                    }
                ?>
              
              <tr align="center">
                <th scope="row"><?= $no."."?></th>
                <td>
                    <?= $hari . ", </br>" .$tgl_select ."-".$bulan."-". date('Y')?>   
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
                            echo '<td>';
                            echo '</td>';
                            
                            if ($result['waktu_keluar'] == '00:00:00'){
                                //absen pulang
                                echo '<td>';
                                echo '-';
                                echo '</td>';
                                echo '<td>';
                                echo '</td>';
                                
                                //keterangan
                                // echo '<td>';
                                // if (substr($result['waktu_masuk'], 0, 5) <= '08:00'){
                                //     echo 'Anda belum absen pulang';
                                // }else {
                                //     echo 'Anda Terlambat, dan belum absen pulang';
                                // }
                                // echo '</td>';

                                //aksi
                                // echo '<td>';

                                // if ($tgl_now == date('Y-m-d')){
                                //     echo '-';
                                // } else {
                                //     echo "<button class='btn btn-warning btn-block' data-toggle='modal' data-target='#edit".$no."'>Absen Pulang</button>";
                                // }

                                ?>
                                    

                                     
                                <?php
                                //echo '</td>';
                            }else{
                                //absen pulang
                                echo '<td>';
                                echo substr($result['waktu_keluar'], 0, 5);
                                echo '</td>';
                                echo '<td>';
                                //echo substr($result['waktu_keluar'], 0, 5);
                                echo '</td>';

                                //keterangan
                                // echo '<td>';
                                // if (substr($result['waktu_masuk'], 0, 5) <= '08:00'){
                                //     echo 'Good';
                                // }else {
                                //     echo 'Anda Terlambat';
                                // }
                                // echo '</td>';

                                //aksi
                                // echo '<td>';
                                // echo '-';
                                // echo '</td>';
                            }
                        }else {
                            //absen masuk
                            echo '<td>';
                            echo '-';
                            echo '</td>';
                            echo '<td>';
                            echo '-';
                            echo '</td>';
                            //absen pulang
                            echo '<td>';
                            echo '-';
                            echo '</td>';
                            echo '<td>';
                            echo '-';
                            echo '</td>';
                            // keterangan
                            // echo '<td>';
                            // echo 'Anda tidak Absen';
                            // echo '</td>';

                            //aksi
                            //echo '<td>';
                            ?>
                            <?php
                            //echo '</td>';    

                        }
                ?>
              </tr>
              <?php $no++; endfor; ?>
            </tbody>
          </table>
        </div>
        </div>
    </div>

    <div class="row mt-3" >
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <table class="table table-borderless table-sm">
                <thead>
                    <tr>
                        <th scope="col" width="60%"></th>
                        <th scope="col" width="40%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>Kupang, <?= date('d-m-Y')?></td>
                    </tr>
                    <tr>
                        <td>Mengetahui</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $pimpinan['jabatan'] ?></td>
                        <td>Pegawai Bersangkutan</td>
                    </tr>
                    <tr>
                        <td height="60px"></td>
                        <td height="60px"></td>
                    </tr>
                    <tr>
                        <td>
                            <?= $pimpinan['nama_pegawai']; ?></br>
                            NIP. <?= $pimpinan['nip']; ?>
                        </td>
                        <td>
                            <?= $pegawai['nama_pegawai']; ?></br>
                            NIP. <?= $pegawai['nip']; ?> 
                        </td>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>

</div>


<script>
    window.print();
</script>
