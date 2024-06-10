<?php 
session_start();
include 'fungsi.php';
// if(!isset($_SESSION['login'])){
    ?>
      <!-- <script>alert('Silahkan Login Terlebih dahulu!') 
        setTimeout("location.href = '../isi/login.php';",0);
      </script> -->
    <?php
//   }
// ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Daftar Movie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'navbar.php' ;?>
        <section id="profile">
        <div class="container-fluid">
        <div class="row">
            <!-- Menu Kiri -->
            <div class="col-lg-2 bg-body-tertiary shadow   " style="height: 730px;">
            <ul class="list-unstyled  ">
                <li> <a href="profile.php"><button type="button" name="profile" class="btn rounded-3 mt-3 w-100 text-start"><i class="bi bi-person-circle  me-3"></i> Akun</button> </li></a>
                <li> <a href="rekap.php"><button class="btn rounded-3 mt-3 w-100 text-start"><i class="bi bi-person-circle  me-3"></i> Movie & Animation</button></li></a> 
            </ul>
            </div>
            <!-- Profile -->
            <div class="col-md-6 offset-md-1 " style="padding-top: 4rem;">
                <div class="card"   >
                <div class="card-header">
                    <i class="fa fa-edit"></i> Menambahkan Daftar Movie
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                        <input type="hidden" 
                                        value="" 
                                        required class="form-control" 
                                        name="id">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Judul Movie </label>
                                    <input type="text" 
                                        value="" 
                                        required class="form-control" 
                                        name="judul">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>sutradara</label>
                                    <input type="text" 
                                        value="" 
                                        required class="form-control" 
                                        name="sutradara">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Tanggal Tayang </label>
                                    <input type="date" 
                                        value="" 
                                        required class="form-control" 
                                        name="tanggal_tayang">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Kategori</label>
                                    <input type="text" 
                                        value="" 
                                        required class="form-control" 
                                        name="kategori">
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea 
                                name="deskripsi" 
                                class="form-control" 
                                required></textarea>
                        </div>
                        <div class="form-group mb-3">
                                    <label>Poster</label>
                                    <input type="file" 
                                        value="" 
                                        required class="form-control" 
                                        name="poster">
                                </div>
                        <div class="form-group mb-3">
                                    <label>Link Youtube</label>
                                    <input type="text" 
                                        value="" 
                                        required class="form-control" 
                                        name="link">
                                </div>
                        <button type="submit" name="btn" id="btn" class="btn btn-success btn-md mt-3 mb-3" >Save</button>
                    </form>
                        <!--php ambil data -->
                    <?php  
                        if(isset($_POST['btn'])){
                            if (tambah($_POST)>0){
                                ?>
                                <div class="alert alert-success" role="alert">
                                Data Berhasil Di Tambahkann !
                                </div>
                                
                                <script>
                                    setTimeout("location.href = 'index.php';",2000);
                                </script>
                                <?php
                            }
                            else{
                                ?>
                                <div class="alert alert-warning" role="alert">
                                Data Gagal di Tambahkann !
                                </div>
                                <script>
                                    setTimeout("location.href = 'tambah.php';",2000);
                                </script>
                                <?php
                            }
                            
                        }
                    ?>
                        <!--  -->
                </div>
            </div>
        </div>
            </div>
            </div>
        </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>