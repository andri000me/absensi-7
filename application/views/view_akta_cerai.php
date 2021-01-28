<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logo-pa-ltk.png"/>
    <title>PA Larantuka - Cari Akta Cerai</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> 
        <a class="navbar-brand" href="#">
          <img src="<?= base_url(); ?>assets/img/logo-pa-ltk.png" width="24" height="30" class="d-inline-block align-top" alt="">
          PA Larantuka
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Aplikasi Pencarian Akta Cerai</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link float-right" href="<?= site_url('admin/login'); ?>">Login</a>
            </div>
        </div>
    </div>
</nav>

<div class="container"> 
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Cari Akta Cerai</h1>
                
            <form action="" method="post"> 
                <div class="row">
                <div class="col-md-4">
                    <label for="tgl_putusan"> Tanggal Putusan</label>
                    <input name="tgl_putusan" type="date" class="form-control" placeholder="Tanggal Putusan">
                </div>
                <div class="col-md-5">
                    <label for="no_putusan"> Nomor Penetapan</label>
                    <input name="no_penetapan" type="text" class="form-control" placeholder="Nomor Putusan">
                </div>
                <div class="col-md-3">
                    <br>
                    <input type="submit" name="cari" class="form-control btn btn-dark" value="Cari">
                </div>
                </div>
            </form> 
        </div>
    </div>

    <hr>

    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <h3>Data Akta Cerai</h3>
            <?php if (empty($akta_cerai)) : ?>
                <div class="alert alert-danger" role="alert">
                data akta cerai tidak ditemukan. Silahkan isi tanggal putusan dan nomor penetapan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php
                if($akta_cerai != null): 
                foreach ($akta_cerai as $akta) : ?>
                <li class="list-group-item">
                    <?= $akta['no_akta'] . " | " . $akta['nama_suami'] . " & " . $akta['nama_istri'] ; ?>
                    <a href="<?= base_url(); ?>uploads/<?= $akta['nama_file'];?>" target="blank"
                        class="badge badge-primary float-right">download</a>
                </li>
                <?php 
                endforeach;
              endif; ?>
            </ul>
        </div>
    </div>

</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>  
  </body>
</html>