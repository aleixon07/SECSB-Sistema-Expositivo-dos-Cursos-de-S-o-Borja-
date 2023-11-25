<?php
require_once "connect.php";
session_start();


if (isset($_GET['cursos']) && !empty($_GET['cursos'])) {

  $cursos = $_GET['cursos'];

  $sql = "SELECT * FROM cursos WHERE idcursos = '$cursos'";
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


                <img style="border-radius: 25px; height: 400px; width: 100%; margin-top: 45px;" src="area_adm/img/<?php echo $row['fotos'] ?>" alt="">

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="portfolio-info">
              <h3><?php echo $row['nome']; ?></h3>
              <ul>
                <li style="color: #0362ab;"><strong><?php $inst = $row['idinstituicoes'];
                                                    $sql_inst = "SELECT * FROM instituicoes WHERE idinstituicoes = '$inst'";
                                                    $result_inst = mysqli_query($conn, $sql_inst);
                                                    $row_inst = mysqli_fetch_assoc($result_inst);
                                                    $nome_inst = $row_inst["nome"];
                                                    echo $nome_inst;
                                                    ?></strong> </li>

                <li><strong>Duração</strong>: <?php echo $row['duracao']; ?></li>
                <li><strong>Turno</strong>: <?php echo $row['periodo']; ?></li>
                <li><strong>Carga horária total</strong>: <?php echo $row['carga']; ?></li>
                <li><strong>Modalidade</strong>: <?php echo $row['modalidade']; ?></li>
                <li><strong>Grau</strong>: <?php $cat = $row['categorias_idcategorias'];
                                            $sql_cat = "SELECT * FROM categorias WHERE idcategorias = '$cat'";
                                            $result_cat = mysqli_query($conn, $sql_cat);
                                            $row_cat = mysqli_fetch_assoc($result_cat);
                                            $nome_cat =  $row_cat["nome"];
                                            echo $nome_cat;
                                            ?></li>
                <li class="mt-3" style="text-align: justify;"><?php echo $row['descricao']; ?></li>

                <?php
                if (!empty($row['pdf'])) {
                  $pdf = $row['pdf'];
                  $nome = $row['nome'];
                  echo "<li><a href='area_adm/pdf/$pdf' download='ppc-$nome.pdf'>
                
                <svg xmlns='http://www.w3.org/2000/svg' width='28' height='18' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
                <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
              </svg>                Projeto Pedagógico do Curso</i></a></li>";
                }
                ?>



              </ul>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

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