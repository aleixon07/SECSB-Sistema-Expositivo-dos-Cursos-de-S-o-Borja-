<?php
require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="shortcut icon" href="area_adm/img/favicon.png" type="image/x-icon" />

  <title>SecSB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .tudo {
      margin-left: 345px;
    }

    
  </style>
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bi bi-house"></i> <span>Início</span></a></li>
        <li><a href="#about" class="nav-link scrollto"> <i class="bi bi-question-circle"></i><span>Sobre o site</span></a></li>
        <li><a href="#instituicao" class="nav-link scrollto"><i class="bi bi-mortarboard"></i> <span>Instituições</span></a></li>
        <li><a href="#cursos" class="nav-link scrollto"><i class="bi bi-book-half"></i><span>Cursos</span></a></li>
        <li><a href="login.php" class="nav-link scrollto"><i class="bi bi-person-gear"></i><span>Área Restrita</span></a></li>


        </span>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>SECSB</h1>
      <p>Um site para as instituições de <span class="typed" data-typed-items="São Borja"></span></p>
     
    </div>
  </section><!-- End Hero -->

  <main id="main">

   <!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Sobre o site</h2>
     <div class="row pt-5">
      <div class="col-2"></div>
    
      <div class="col" style="font-size: 18px;">     
      <p >O sistema SECSB tem como objetivo dar visibilidade aos cursos e às instituições localizadas na cidade de São Borja, no RS. A partir desse sistema, espera-se oferecer apoio às pessoas que gostariam de se graduar em alguma faculdade e ainda não sabem que área seguir. Além disso, através da divulgação, busca-se atrair mais público para essas instituições, prezando pela valorização local e incentivando a educação dentro do município.</p>
</div>
      <div class="col-2"></div>
     </div>
    </div>
  </div>
</section><!-- End About Section -->



    <!-- ======= Portfolio Section ======= -->
    <section id="instituicao" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title mb-5">
          <h2>Instituições</h2>
          <p>Instituições e universidades de São Borja, RS.</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php
          $instituicao = "SELECT * FROM instituicoes";
          $result_instituicao = mysqli_query($conn, $instituicao);

          if (mysqli_num_rows($result_instituicao) > 0) {
            while ($row_instituicao = mysqli_fetch_assoc($result_instituicao)) {
          ?>


              <div class="col-lg-4 col-md-4 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="area_adm/img/<?php echo $row_instituicao['fotos'] ?>" style="width: 500px; height: 300px;" class="img-fluid" alt="">
                  <div class="overlay" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 70px; background: rgba(0, 0, 0, 0.7); color: white; text-align: center; line-height: 70px;">
                    <h6 class="text-center p-3"><strong><?php echo $row_instituicao['nome'] ?></strong></h6>
                  </div>
                  <div class="portfolio-info">

                    <div class="portfolio-links">
                      <a href="area_adm/img/<?php echo $row_instituicao['fotos']?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $row_instituicao['nome'] ?>"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.php?inst=<?php echo $row_instituicao['idinstituicoes'] ?>" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>


          <?php
            }
          }
          ?>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="cursos" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cursos</h2>
          <p>Cursos de São Borja, RS.</p>
        </div>

        <div class="row">
  <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <ul id="cursos-flters">
      <li data-filter="*" class="filter-active">Todos</li>
      <?php
      $categoria = "SELECT * FROM categorias";
      $result_categoria = mysqli_query($conn, $categoria);

      if (mysqli_num_rows($result_categoria) > 0) {
        while ($row_categoria = mysqli_fetch_assoc($result_categoria)) {
      ?>

        <li data-filter=".filter-<?php echo $row_categoria["idcategorias"]; ?>" class="filter-<?php echo $row_categoria["idcategorias"]; ?>"><?php echo $row_categoria["nome"]; ?></li>

      <?php
        }
      }
      ?>
    </ul>
  </div>
</div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php
          $cursos = "SELECT * FROM cursos";
          $result_cursos = mysqli_query($conn, $cursos);

          if (mysqli_num_rows($result_cursos) > 0) {
            while ($row_cursos = mysqli_fetch_assoc($result_cursos)) {
              $id_c = $row_cursos['categorias_idcategorias'];
              $busc_cat = "SELECT * FROM categorias WHERE idcategorias = '$id_c'";
              $resutl_cat = mysqli_query($conn, $busc_cat);
              $row_cat = mysqli_fetch_assoc($resutl_cat);
          ?>


                <div class="col-lg-4 col-md-4 portfolio-item filter-<?php echo $row_cat['idcategorias'];?>">
                <div class="portfolio-wrap">
                  <img src="area_adm/img/<?php echo $row_cursos['fotos']; ?>" style="width: 500px; height: 300px;" class="img-fluid" alt="">
                  <div class="overlay" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 70px; background: rgba(0, 0, 0, 0.7); color: white; text-align: center; line-height: 70px;">
                    <h6 class="text-center p-3"><strong><?php echo $row_cursos['nome']; ?></strong></h6>
                  </div>
                  <div class="portfolio-info">

                    <div class="portfolio-links">
                      <a href="area_adm/img/<?php echo $row_cursos['fotos']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $row_cursos['nome']; ?>"><i class="bx bx-plus"></i></a>
                      <a href="cursos-details.php?cursos=<?php echo $row_cursos['idcursos']; ?>" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              


          <?php
            }
          }1
          ?>

        </div>
    </section><!-- End Portfolio Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <h3>SECSB
      </h3>
      <p>Sistema Expositivo dos Cursos Fornecidos pelas Instituições de São Borja</p>
      


    </div>
  </footer><!-- End Footer -->

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