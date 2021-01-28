<?php
ob_start();
// include('../config/database.php');
// include('../content/sm.php');
// $koneksi = new Database();
// include('../fungsi/fungsi_akun.php');
// $fungsi_ak = new Akun($koneksi);
$fileName = "Absensi.xls";

header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/vnd.ms-excel");
?>
<table border='1'>
  <tr>
    <th>NIP</th>
    <th>Nama</th>
    <th>Tanggal</th>
    <th>Jam Masuk</th>
    <th>Jam Pulang</th>
  </tr>
  <?php
  $sqlnya = "SELECT * FROM vabsen order by tgl_absen asc";
  $query = $this->db->query($sql);
  // $data = mysqli_fetch_object($query);

  $tampil_ak = $fungsi_ak->tampil("Select * from vakun order by IDAkun");
  while($data = mysqli_fetch_object($query)){        
    echo "<tr style='text-align: center;'>";
    echo "<td>".$data->nip."</td>";
    echo "<td>".$data->nama_pegawai."</td>";
    echo "<td>".$data->tgl_absen."</td>";
    echo "<td>".$data->waktu_masuk."</td>";
    echo "<td>".$data->waktu_keluar."</td>";
    echo "</tr>";
  }
  ?>
</table>