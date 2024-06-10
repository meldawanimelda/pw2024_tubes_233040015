<?php 
// session_start();
// if(!isset($_SESSION['login'])){
  ?>
    <!-- <script>alert('Silahkan Login Terlebih dahulu!') 
      setTimeout("location.href = '../isi/login.php';",0);
    </script> -->
  <?php
// }

require 'fungsi.php'; 
    $data = query ("SELECT * FROM user ");
foreach($data as $row): 
endforeach;


?>
<!doctype html>
<html lang="en">
    <head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5e92ea2594.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css?v=<?=time();?>">    
</head>
    <body>
        <!-- Navbar -->
        <?php require 'navbar.php'; ?>
        <!-- Navbar -->
    <section id="profile">
        <div class="container-fluid">
        <div class="row">
            <!-- Menu Kiri -->
            <div class="col-lg-2 bg-body-tertiary shadow   " style="height: 730px;">
            <ul class="list-unstyled  ">
                <li> <a href="profile.php"><button type="button" name="profile" class="btn rounded-3 mt-3 w-100 text-start"><i class="bi bi-person-circle  me-3"></i> Akun</button> </li></a>
                <li> <a href="rekap.php"><button class="btn rounded-3 mt-3 w-100 text-start"><i class="bi bi-person-circle  me-3"></i> Daftar Penjualan</button></li></a> 
            </ul>
            </div>
            <!-- Profile -->
    <div class="col-md-6 offset-md-1 " style="padding-top: 4rem;">
                <div class="card"   >
                <div class="card-header">
                    <i class="fa fa-edit"></i> Ubah Profil
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Nama </label>
                                    <input type="text" 
                                        value="<?= $row["nama"]; ?>" 
                                        required class="form-control" 
                                        name="nama_pengguna">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Telepon</label>
                                    <input type="number" 
                                        value="<?= $row["nomor"]; ?>" 
                                        required class="form-control" 
                                        name="telepon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Email </label>
                                    <input type="text" 
                                        value="<?= $row["email"]; ?>" 
                                        required class="form-control" 
                                        name="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input type="text" 
                                        value="<?= $row["username"]; ?>" 
                                        required class="form-control" 
                                        name="username">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <textarea 
                                name="alamat" 
                                class="form-control" 
                                required rows="3"><?= $row["alamat"]; ?></textarea>  
                        </div>                           
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <input type="hidden" value="<?= $row["id"]; ?>" 
                                        class="form-control" 
                                        name="id_login">
                                </div>
                            </div>
                        
                        <button type="submit" name="btnSave" class="btn btn-success btn-md mt-3 mb-3">Simpan</button>
                    <?php 
                    if(isset($_POST['btnSave'])){
                        if (ubahProfile($_POST)>0){
                            ?>
                            <div class="alert alert-success" role="alert">
                            Data Berhasil Di Update !
                            </div>
                            <script>
                                setTimeout("location.href = 'profile.php';",1000);
                            </script>
                            <?php
                        }
                    }
                    if(isset($_POST['btnSavePassword'])){
                    $password = $_POST['password'];
                    $passwordNew = $_POST['passwordNew'];
                    $id = $_POST['id_login'];
            
                    
            
                    // cek
                    $result = mysqli_query($conn,"SELECT * FROM user WHERE id = '$id'");
                        
                    if (mysqli_num_rows($result) > 0 ){
                        $row = mysqli_fetch_assoc($result);
                        if (password_verify($password,$row['password'])){
                        // Enkripsi passbaru
                        $passwordNew = password_hash($passwordNew,PASSWORD_DEFAULT);
                        $query = mysqli_query ($conn,"UPDATE user SET password = '$passwordNew' WHERE id = '$row[id]'");
                            if($query){
                                if($query){
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                    Password Anda Telah Berhasil Di Ganti !!
                                    </div>
                                <script>
                                    setTimeout("location.href = 'logout.php';",2000);
                                </script>
                                <?php
                                }
                            }
                    }else{
                        ?>
                        <div class="alert alert-danger" role="alert">
                        Password Lama Anda Salah !
                        </div>
                        <script>
                            setTimeout("location.href = 'profile.php';",3000);
                        </script>
                        <?php
                    }
                    }
                }         
                    ?>
                    </form> 
                </div>
            </div>
        </div>
            <!-- Profile Kecil -->
        <div class="col-md-2" style="padding-top: 4rem;">
            <div class="card">
            <div class="card-header">
                <i class="fa fa-user"></i> Profil Anda
            </div>
            <div class="card-body text-center">
                <i class="fa-solid fa-user fa-4x"></i>
                <hr>
                <h4><?= $row["nama"]; ?></h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ubah Password
                </button>
            </div>
        </div>
        </div>
            </div>
            </div>
        </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                <div class="form-group mb-3">
                        <label>Password Lama</label>
                        <input type="password" 
                        required class="form-control" 
                        name="password">
                </div>
                <div class="form-group mb-3">
                        <label>Password baru</label>
                        <input type="password" 
                        required class="form-control" 
                        name="passwordNew"
                        id="Password">
                        
                </div>
                <div class="form-group mb-3">
                        <label>Confirm Password </label>
                        <input type="password" 
                        required class="form-control"
                        id="ConfirmPassword" >
                    </div>
                        <input type="hidden" value="<?= $row["id"]; ?>" 
                        class="form-control" 
                        name="id_login">
                    <p  id="CheckPasswordMatch"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btnSavePassword" class="btn btn-primary">Save Password</button>
                </div>
            </div>
        </form>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
    $(document).ready(function () {
   $("#ConfirmPassword").on('keyup', function(){
    var password = $("#Password").val();
    var confirmPassword = $("#ConfirmPassword").val();
    if (password != confirmPassword)
        $("#CheckPasswordMatch").html("Password does not match !").css("color","red");
    else
        $("#CheckPasswordMatch").html("Password match !").css("color","green");
   });
});
  </script>
    </body>
</html>