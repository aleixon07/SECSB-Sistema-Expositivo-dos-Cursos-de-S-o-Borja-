<?php
session_start(); 


include "connect.php"; 

if (isset($_POST['nome']) && isset($_POST['senha'])) {

    $nome = $_POST['nome'];

    $pass = md5($_POST['senha']);

    if (empty($nome)) {

        header("Location: form_login.php?error=O e-mail é obrigatório");

        exit();
    } else if (empty($pass)) {

        header("Location: form_login.php?error=A senha é obrigatória");

        exit();
    } else {


        $sql = "SELECT * FROM administrador WHERE email='$nome' limit 1";
        try {
            $result = mysqli_query($conn, $sql);
        } catch (Exception $e) {
            header("Location: form_login.php?error=Erro de acesso ao banco de dados");
            exit();
        }

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($pass == $row['senha']) {


                $_SESSION['id'] = $row['idadministrador'];

                header("Location: area_adm/index.php");

                exit();
            } else {

                header("Location: form_login.php?error=2");

                exit();
            }
        } else {

            header("Location: form_login.php?error=1");


            exit();
        }
    }
} else {

    header("Location: form_login.php");

    exit();
}
