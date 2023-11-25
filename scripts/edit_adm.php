<?php
session_start();
include("../connect.php");


if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['id'])) {


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $senha_con = $_POST['senha_atual'];
    $senha_conf = md5($senha_con);


    $sql_sg = "SELECT * FROM administrador WHERE idadministrador = '$id'";
    $result_sg = mysqli_query($conn, $sql_sg);

    // Verifica se foi encontrado um administrador com o ID fornecido
    if (mysqli_num_rows($result_sg) > 0) {
        while ($row_sg = mysqli_fetch_assoc($result_sg)) {
            $senha_bd = $row_sg['senha'];
        }
    } else {
        // Redireciona para uma página de erro se o administrador não for encontrado
        header("Location: ../area_adm/index.php?a=Erro ao encontrar administrador");
        exit();
    }

    if ($senha_conf == $senha_bd) {

        $sql_email = "SELECT * FROM administrador WHERE email = '$email' AND idadministrador != '$id'";
        $result_email = mysqli_query($conn, $sql_email);

        if (mysqli_num_rows($result_email) > 0) {

            header("Location: ../area_adm/index.php?a=a87ff679a2f3e71d9181a67b7542122c");
            exit();
        }


        if (!empty($_POST['senha_new']) && isset($_POST['senha_new'])) {

            $senha_new = $_POST['senha_new'];
            $senha_new2 = md5($senha_new);
            
            $sql = "UPDATE administrador SET nome = '$nome', email = '$email', senha = '$senha_new2' WHERE idadministrador = '$id'";
        } else {
            $sql = "UPDATE administrador SET nome = '$nome', email = '$email' WHERE idadministrador = '$id'";
        }

        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../area_adm/index.php?a=eccbc87e4b5ce2fe28308fd9f2a7baf3");
            exit();
        }
    } else {
        // Redireciona para uma página de erro se a senha fornecida estiver incorreta
        header("Location:  ../area_adm/index.php?a=8f14e45fceea167a5a36dedd4bea2543");
        exit();
    }
}
