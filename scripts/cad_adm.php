<?php

session_start();
include("../connect.php");

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql_email = "SELECT * FROM administrador WHERE email = '$email'";
    $result_email = mysqli_query($conn, $sql_email);

    if (mysqli_num_rows($result_email) > 0) {

        header("Location: ../area_adm/index.php?a=a87ff679a2f3e71d9181a67b7542122c");
        exit();
    }

    if (empty($nome)) {
        header("Location: ../area_adm/index.php?falta nome");
        exit();
    } else if (empty($email)) {
        header("Location: ../area_adm/index.php?falta email");
        exit();
    } else if (empty($senha)) {
        header("Location: ../area_adm/index.php?falta senha");
        exit();
    } else {




        $sql = "INSERT INTO administrador (nome,email,senha) VALUES ('$nome', '$email', '$senha')";
        $result = mysqli_query($conn, $sql);



        if ($result) {
            header("Location: ../area_adm/index.php?a=c4ca4238a0b923820dcc509a6f75849b");
            exit();
        }
    }
}
