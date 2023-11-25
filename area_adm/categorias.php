<?php
include("../connect.php");

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} else {

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM administrador WHERE idadministrador = '$id '";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $nome = $row['nome'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Área Administrativa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SECSB</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">


                    <i class="bi bi-person-circle"></i>
                    <span href="index.php">Administradores</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="instituicoes.php">
                    <i class="bi bi-building-gear"></i>
                    <span>Instituições</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="cursos.php">
                    <i class="bi bi-book-half"></i>
                    <span>Cursos</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="categorias.php">
                    <i class="bi bi-tag"></i>
                    <span>Categorias</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Pesquisar por..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <h6 class='mt-4 me-2 text-capitalize'>Olá, <?php echo $nome; ?> </h6>



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">


                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>

                        </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <section class="main_content dashboard_part">
                    <div class="col-lg-12 col-xl-12">
                        <div class="white_box mb_30 w-25">
                            <h2 class="text-center mb-4">Lista de Categorias</h2>
                            <button style="text-decoration: none; border-radius:25px;" class='text-dark border border-dark bg-dark-subtle px-2 py-1' data-bs-toggle="modal" data-bs-target="#modal_raca">Adicionar +</button>
                            <?php
                            if (isset($_GET['search']) && !empty($_GET['search'])) {
                                $search = $_GET['search'];

                                $sql_pesquisa = "SELECT * FROM categorias WHERE LOWER(nome) LIKE LOWER('%$search%')";
                                $resultado_pesquisa = $conn->query($sql_pesquisa);


                                $count = $resultado_pesquisa->num_rows;

                                if ($resultado_pesquisa->num_rows > 0) {

                                    echo "<h4 class='text-dark mt-3 text-start'>Resultados encontrados: $count </h4>";
                                    echo "<table class='table border border-2 mt-3 border-dark'>
                                            <thead class='table-dark'>
                                                <tr>
                                                    <th scope='col'>ID</th>
                                                    <th scope='col'>Nome</th>
                                                    <th scope='col'> </th>
                                                </tr>
                                            </thead>
                                            <tbody>";

                                    while ($lista = $resultado_pesquisa->fetch_assoc()) { ?>

                                        <tr class=''>
                                            <td class=''><?php echo $lista["idcategorias"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["nome"]; ?></td>

                                            <td class='text-center'>
                                                <button class='btn border border-dark border-opacity-25 ' data-bs-toggle="modal" data-bs-target="#modal<?php echo $lista["idcategorias"]; ?>"><i class="bi bi-pencil-fill"></i></button>
                                                <button onclick="AlertCat(<?php echo $lista['idcategorias']; ?>)" href='../scripts/delete_adm.php?id=<?php echo $lista["idcategorias"]; ?>' class='btn border border-dark border-opacity-25 '><i class="bi bi-trash-fill"></i></button>
                                            </td>
                                        </tr>


                                        <!-- Modal editar -->
                                        <div class="modal fade" id="modal<?php echo $lista["idcategorias"]; ?>" tabindex="-1" aria-labelledby="modal<?php echo $lista["idcategorias"]; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header border border-dark bg-primary text-light">
                                                        <h5 class="modal-title" id="modal_adicionar">Editando Categoria</h5>
                                                    </div>
                                                    <div class="modal-body border ">
                                                        <form action="../scripts/edit_cat.php" method="POST">
                                                            <label for="" class="text-dark ms-2"><strong>Nome</strong></label>
                                                            <input type="text" name="nome" id="nome" class="form-control border border-dark mb-3" value="<?php echo $lista["nome"]; ?>" required placeholder="Insira o nome">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $lista["idcategorias"]; ?>">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-dark text-light border border-dark" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn bg-primary text-light border border-dark">Editar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <?php  }
                                    echo "</tbody>
      </table>";
                                } else {
                                    echo "<h4 class='text-danger mt-5 ms-5'>Não foram encontrados resultados</h4>";
                                }
                            } else {

                                $sql = "SELECT * FROM categorias";
                                $result = mysqli_query($conn, $sql);

                                $count2 = $result->num_rows;


                                ?>

                                <h4 class="text-dark mt-3 text-start">Resultados encontrados: <?php echo $count2; ?></h4>
                                <table class="table border border-2 mt-3 border-dark">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($lista = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr class=''>
                                                    <td class=''><?php echo $lista["idcategorias"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["nome"]; ?></td>

                                                    <td class='text-center'>
                                                        <button class='btn border border-dark border-opacity-25 ' data-bs-toggle="modal" data-bs-target="#modal<?php echo $lista["idcategorias"]; ?>"><i class="bi bi-pencil-fill"></i></button>
                                                        <button onclick="AlertCat(<?php echo $lista['idcategorias']; ?>)" href='../scripts/delete_adm.php?id=<?php echo $lista["idcategorias"]; ?>' class='btn border border-dark border-opacity-25 '><i class="bi bi-trash-fill"></i></button>
                                                    </td>
                                                </tr>


                                                <!-- Modal editar -->
                                                <div class="modal fade" id="modal<?php echo $lista["idcategorias"]; ?>" tabindex="-1" aria-labelledby="modal<?php echo $lista["idcategorias"]; ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header border border-dark bg-primary text-light">
                                                                <h5 class="modal-title" id="modal_adicionar">Editando Categoria</h5>
                                                            </div>
                                                            <div class="modal-body border ">
                                                                <form action="../scripts/edit_cat.php" method="POST">
                                                                    <label for="" class="text-dark ms-2"><strong>Nome</strong></label>
                                                                    <input type="text" name="nome" id="nome" class="form-control border border-dark mb-3" value="<?php echo $lista["nome"]; ?>" required placeholder="Insira o nome">
                                                                    <input type="hidden" name="id" id="id" value="<?php echo $lista["idcategorias"]; ?>">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-dark text-light border border-dark" data-bs-dismiss="modal">Fechar</button>
                                                                <button type="submit" class="btn bg-primary text-light border border-dark">Editar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                    <?php   }
                                        }
                                    } ?>

                                    </tbody>
                                </table>

                                <!-- Modal adicionar -->
                                <div class="modal fade" id="modal_raca" tabindex="-1" aria-labelledby="modal_raca" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content border border-dark border-2">
                                            <div class="modal-header border-bottom border-dark bg-primary text-light">
                                                <h1 class="modal-title fs-5" id="modal_raca">Cadastro de Categorias </h1>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../scripts/cad_cat.php" method="POST">
                                                    <label for="" class="text-dark ms-2"><strong>Nome</strong></label>
                                                    <input type="text" name="nome" id="nome" class="form-control border-dark border" id="floatingInput" required placeholder="Insira o nome">

                                            </div>
                                            <div class="modal-footer">
                                                <div>
                                                    <a type="button" class="btn bg-secondary text-light border border-dark" data-bs-dismiss="modal">Fechar</a>
                                                    <button type="submit" class="btn border border-dark bg-primary text-light">Adicionar</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                        </div>

                    </div>

                </section>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" para sair da Área Administrativa.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>



</body>
<?php if (!isset($_GET['a'])) {
} else if ($_GET['a'] == md5(1)) {

?>
    <script>
        Swal.fire({
            title: "Sucesso!",
            text: "Categoria cadastrada com sucesso!",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {

            window.location.href = "categorias.php";

        });
    </script>
<?php } else if ($_GET['a'] == md5(2)) {

?>
    <script>
        Swal.fire({
            title: "Sucesso!",
            text: "Categoria deletada com sucesso!",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {

            window.location.href = "categorias.php";

        });
    </script>
<?php } else if ($_GET['a'] == md5(3)) {

?>
    <script>
        Swal.fire({
            title: "Sucesso!",
            text: "Categoria editada com sucesso!",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {

            window.location.href = "categorias.php";

        });
    </script>
<?php } else if ($_GET['a'] == md5(4)) {

?>
    <script>
        Swal.fire({
            title: "Atenção!",
            text: "Essa categoria, está vinculada a um curso !",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {

            window.location.href = "categorias.php";

        });
    </script>
<?php } ?>

<script>
    function AlertCat(id) {
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Você não será capaz de reverter isso!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `../scripts/delete_cat.php?id=${id}`;
            }
        });
    }
</script>

</html>