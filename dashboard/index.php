<?php
include '../admin/fungsi.php';
$data = query ("SELECT * FROM daftarmovie");

if (isset($_POST["cari"])){
    $data = cari($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>37.5%</title>
    <!-- link css -->
    <link rel="stylesheet" href="../Dashboard/css/style.css">
    <!-- OWl Carosel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>

  </style>
  <body>
   <!-- Navbar -->
   <?php include 'navbar.php';?>
   <!-- Navbar -->

    <!-- Dashboard  -->
        <section id="beranda" >
            <div id="carouselExample" class="carousel slide" >
            <div class="carousel-inner" style="height: 650px;">
                <div class="carousel-item active">
                <img src="../Dashboard/img/banner.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="../Dashboard/img/banner2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="../Dashboard/img/banner3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </section>


        <!-- Top 10 Movies -->
        <section id="top10">
            <div class="container">
                <div class="row">
                    <div class="col ">
                        <h3>Movies & Animated</h3>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-4">
                    <div class="owl-carousel owl-theme32">
                    <?php foreach($data as $row): ?>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                        <img src="../admin/img/<?= $row["poster"]; ?>" class="card-img-top "style="height: 420px;" alt="...">
                        <div class="card-body" >
                        <h5 class="card-title d-flex justify-content-center"><?= $row["judul"]; ?></h5>

                            <a href="details.php?id=<?= $row["id"]; ?>" class="btn btn-success d-flex justify-content-center">Tonton Sekarang</a>
                           
                        </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section>

        </section>
       
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Owl Carosel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="ajax/script.js" ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript">
$('.owl-carousel').owlCarousel({
    loop:false,
    margin:200,
    nav:true,
  
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
</body>
</html>