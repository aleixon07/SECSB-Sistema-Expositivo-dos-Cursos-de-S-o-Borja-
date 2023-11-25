<?php
session_start();
include("../connect.php");


if(isset($_POST['nome']) ){


$nome=$_POST['nome'];
$id=$_POST['id'];

$sql="UPDATE categorias SET `nome`='$nome' WHERE idcategorias ='$id'";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location: ../area_adm/categorias.php?a=eccbc87e4b5ce2fe28308fd9f2a7baf3");
    exit();
}

}




?>