<?php
include 'fungsi.php';
$data = query ("SELECT * FROM daftarmovie");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>37.5%</title>
    <link rel="stylesheet" href="../Portofolio/style_protofolop.css">
      <!-- DataTable -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
      <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
      <!-- Font Awesome -->
      <script src="https://kit.fontawesome.com/5e92ea2594.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/main.css?v=<?=time();?>">
      <!--Bootstrap Icon  -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->
    <?php require 'navbar.php'; ?>
    <!-- Navbar -->

    <section id="Daftar">
      <div class="container-fluid">
        <div class="row ">
          <!-- Box Menu kiri -->
              <div class="col-lg-2 bg-body-tertiary shadow   " style="height: 730px;">
                <ul class="list-unstyled  ">
                <li> <a href="profile.php"><button type="button" name="profile" class="btn mt-3 w-100 text-start"><i class="bi bi-person-circle  me-3"></i> Akun</button> </li></a>
                <li> <a href="rekap.php"><button class="btn mt-3 w-100 text-start"><i class="bi bi-person-circle  me-3"></i> Daftar Movie & Animation</button></li></a> 
                </ul>
              </div>
          <!--  -->

          <div class="col-md-8 offset-md-1 ">
          <div class="text-center " style="padding-top: 3rem;">
            <h3><i class="fa-solid fa-cart-shopping me-3 mb-2"></i>List Movie & Animation</h3>
          </div>
          
        <!-- Awal Card -->
          <div class="card ">
            <div class="card-header bg-primary text-light">
            <i class="fa-solid fa-user"></i>  Movie
            </div>
            <div class="card-body">
              <a href="tambah.php?"> <button class="btn btn-success mb-3" ><i class="fa-solid fa-user-plus me-2"></i>Tambah List</button></a>
      <table id="tabelData" class="table table-striped table-bordered text-center" >
          <thead>    
          <tr >
                <th >No</th>
                <th>Judul</th>
                <th>Sutradara</th>
                <th>Tanggal Tayang</th>
                <th>Ketegori</th>
                <th>Aksi</th>
          </tr>
          </thead>
      <tbody> 
                <!--open tag php  -->
                <?php $i = 1; ?>
              <?php foreach($data as $row): ?>
                
        
          <tr>
                <td><?= $i; ?></td>
                <td><?= $row["judul"]; ?></td>
                <td><?= $row["sutradara"]; ?></td>
                <td><?= $row["tanggal_tayang"]; ?></td>
                <td><?= $row["kategori"]; ?></td>
                <td>
                    <div class="input-groub">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $row["id"]; ?>">
                          <i class="fa-solid fa-pen-to-square"></i> Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus">
                          <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </div>
                </td>
          </tr>
                <!-- Modal -->
              <div class="modal fade" id="modaledit<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content text-dark">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Movie & Animation</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?= $row["id"]; ?>" >
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Judul Movie/Animation </label>
                                    <input type="text" 
                                        value="<?= $row["judul"]; ?>" 
                                        required class="form-control" 
                                        name="judul">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Sutradara</label>
                                    <input type="text" 
                                        value="<?= $row["sutradara"]; ?>" 
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
                                        value="<?= $row["tanggal_tayang"]; ?>" 
                                        required class="form-control" 
                                        name="tanggal_tayang">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Kategori</label>
                                    <input type="text" 
                                        value="<?= $row["kategori"]; ?>" 
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
                                rows="3"><?= $row["deskripsi"]; ?></textarea>  
                        </div>
                        <div class="form-group mb-3">
                                    <label>Poster</label>
                                    <input type="file" 
                                        class="form-control" 
                                        name="poster">
                        </div>
                        <div class="form-group mb-3">
                                    <label>Link Youtube</label>
                                    <input type="text" 
                                        class="form-control" 
                                        value="<?= $row["deskripsi"]; ?>"
                                        name="link">
                        </div>
                        <div class="form-group mb-3 d-flex justify-content-center">
                                <img  src="../admin/img/<?= $row["poster"]; ?>"  style="height: 200px;  width: 150px;">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                        <button type="button" class="btn btn-sec" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" name="btnUpdate" class="btn btn-success">Ubah </button> 
                      </div>
                    </form>
                  </div>
                </div>
              </div>
                    <!-- open tag php -->
                      <?php $i++; ?>
                      <?php endforeach; ?>
                    <!-- close tag php -->
          </tbody>  
        </table>

              <?php 
                    if(isset($_POST['btnUpdate'])){
                      if (ubah($_POST)>0){
                          ?>
                          <div class="alert alert-success" role="alert">
                          Data Berhasil Di Update !
                          </div>
                          <script>
                              setTimeout("location.href = 'index.php';",2000);
                          </script>
                          <?php
                      }else
                      {
                        ?>
                          <div class="alert alert-danger" role="alert">
                          Pastikan menginput data dengan benar !
                          </div>
                          <script>
                              setTimeout("location.href = 'index.php';",2000);
                          </script>
                          <?php
                      }
                      
                  }
                    ?>

              <!-- akhir table -->

              <!-- Modal hapus-->
              <div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content text-dark">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Anda Yakin Ingin Menghapus Data Ini ?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                      <a href="hapus.php?id=<?= $row["id"]; ?>"> <button type="button" name="btnHapus" class="btn btn-danger">Ya ,Hapus ! </button> </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Hapus -->
            </div>
          </div>

          <!-- Akhir Card  -->
          </div>
        </div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script>new DataTable('#tabelData');</script>
    </body>
    </html>