<?php
include "koneksi.php";
session_start();
if (@$_SESSION['nmpegawai']) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Halaman Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="lib/css/bootstrap.min.css">
  <script src="lib/js/jquery.min.js"></script>
  <script src="lib/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F1F1F1">
    <br /><br /> <br />
    <div class="container-fluid">
        <ul class="nav nav-pills">
            <div class="row">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <div class="panel panel-info">
                    <div class="panel-heading" align="center" style="background-color: #57D8F2"><img src="logo/1.png" width="25px" height="25px"><h3>Login PCSupply</h3></img></div>
                    <div class="panel-body">
                        <form method="POST">
                            <?php 
                            $username = mysqli_real_escape_string($koneksi,@$_POST['nmpegawai']);
                            $password = mysqli_real_escape_string($koneksi,@$_POST['pass']);
                         // $password = md5($password);
// query untuk mendapatkan record dari username
                            $query = "SELECT * FROM pegawai WHERE nmpegawai = '$username'";
                            $hasil = mysqli_query(@$koneksi,@$query);
                            if (!$hasil) {
                                printf("Error: %s\n", mysqli_error($koneksi));
                                exit();
                            }
                            $row = mysqli_fetch_array(@$hasil);
                            if (isset ($_POST['login'])) {
                                if ($row['nmpegawai']==$username AND $row['pass']==$password AND $row['hakakses']=="Admin" AND $row['status']=="Aktif") {
          # code...

                                  $_SESSION['nmpegawai']=$username;
                                  header('location:data_barang.php?hlm=Data');
                              }elseif ($row['status']=="Tidak Aktif") {
          # code...
                                  echo "<div class='alert alert-danger' role='alert'>Username anda di non aktifkan!</div>";
                              }else{
                                  echo "<div class='alert alert-danger' role='alert'>Nama atau Password yang anda masukan salah!</div>";
                              }
                          }
                          ?>
                          <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="nmpegawai" placeholder="Masukan Username" required />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="pass" placeholder="Masukan Password" required />
                        </div>
                        <div class="checkbox">
                         <label ><input type="checkbox" value="" >Ingat Saya</label>
                         <p class="pull-right">Lupa <a href="#">Password?</a></p>
                     </div>
                     <div class="form-group">
                      <button type="submit" name="login" value="Login" class="btn btn-info btn-block"> Masuk</button>
                  </div>
                  <div class="form-group">
                   <p class="pull-left">Belum punya akun? <br><a href="register.html">Daftar Sekarang</a></p>
                   <p class="pull-right">User belum aktif <br><a href="#">Aktivasi Ulang</a></p>
               </div>
           </form>
       </div>
   </div>
</div>
</div>
</ul>
</div>
</body>
</html>