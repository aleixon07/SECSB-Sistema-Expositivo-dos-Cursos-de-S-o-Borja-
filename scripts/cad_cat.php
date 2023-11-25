<?php

session_start();
include("../connect.php");

if(isset($_POST['nome'])){

    $nome = $_POST['nome'];
   

    if(empty($nome)) {
        header("Location: ../area_adm/categorias.php?falta nome");
        exit();
    }  else {

       $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";
       $result=mysqli_query($conn, $sql);
       

       if($result){
        header("Location: ../area_adm/categorias.php?a=c4ca4238a0b923820dcc509a6f75849b");
        exit();
       }




    }
    

}





?>