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
    <title>Absensi Online Kemenag NTT</title>

    <!-- Custom CSS-->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img src="<?= base_url(); ?>assets/img/logo_kemenag.png" width="65" height="60" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= site_url('admin'); ?>">Home </a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= site_url('admin/rekap_bulan'); ?>">Rekap Absen </a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= site_url('admin/rekap_kinerja'); ?>">Rekap Kinerja</a>
            </div>
            <div class="navbar-nav dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profil Satker
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= site_url('admin/pegawai'); ?>">Data Pegawai</a>
                    <a class="dropdown-item" href="<?= site_url('admin/unit'); ?>">Data Unit</a>
                    <?php 
                        if ($_SESSION['admin'] == 'kw.19'){
                            echo "<a class='dropdown-item' href='".site_url('admin/unit_kabkota')."'>Data Kab/Kota</a>";
                            echo "<a class='dropdown-item' href='".site_url('admin/unit_kua')."'>Data kua</a>";
                        }
                    ?>
                </div>
                <!--<a class="nav-item nav-link" href="<?= site_url('admin/pegawai'); ?>">Profil Satker </a>-->
            </div>
        </div>
        <span class="navbar-nav navbar-text">
                <a class="nav-item nav-link" href="<?= site_url('login/logout'); ?>">Log Out</a>
        </span>
    </div>
</nav>