<?php
require_once "connect.php";
session_start();


if(isset($_GET['inst']) && !empty($_GET['inst'])){

$inst = $_GET['inst'];

$sql = "SELECT * FROM instituicoes WHERE idinstituicoes = '$inst'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-7">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                
                  <img style="border-radius: 25px; margin-top: 20px;" src="area_adm/img/<?php echo $row['fotos']; ?>" alt="">

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="portfolio-info">
              <h3><?php echo $row['nome']; ?></h3>
              <ul>
                <li><strong>Endereço</strong>: <?php echo $row['endereco']; ?></li>
                <li><strong>Telefone</strong>: <?php echo $row['telefone']; ?></li>
                <li><strong>E-mail</strong>: <?php echo $row['email']; ?></li>
                <li class="mt-3" style="text-align: justify;"><?php echo $row['descricao'] ?><a href="<?php echo $row['link'] ?>"> <u>Acesse Aqui.</u></a></li>
              </ul>
            </div>
          </div>
      

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

     <!-- ======= Portfolio Section ======= -->
     <section id="portfolio" class="portfolio section-bg">

        <div class="section-title mb-5">
          <h2>Cursos</h2>

          
          
        </div>



        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


          <?php 
          $instituicao = "SELECT * FROM cursos WHERE idinstituicoes='$inst'";
          $result_instituicao = mysqli_query($conn, $instituicao);

          if (mysqli_num_rows($result_instituicao) > 0) {
            while ($row_instituicao = mysqli_fetch_assoc($result_instituicao)) {
          ?>
              <div class="col-lg-4 col-md-4 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="area_adm/img/<?php echo $row_instituicao['fotos']; ?>" style="width: 500px; height: 300px;" class="img-fluid" alt="">
                  <div class="overlay" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 70px; background: rgba(0, 0, 0, 0.7); color: white; text-align: center; line-height: 70px;">
                    <h6 class="text-center p-3"><strong><?php echo $row_instituicao['nome']; ?></strong></h6>
                  </div>
                  <div class="portfolio-info">

                    <div class="portfolio-links">
                      <a href="area_adm/img/<?php echo $row_instituicao['fotos']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $row_instituicao['nome']; ?>"><i class="bx bx-plus"></i></a>
                      <a href="cursos-details.php?cursos=<?php echo $row_instituicao['idcursos']; ?>" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>

        
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>