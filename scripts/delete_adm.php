<?php

session_start();
include("../connect.php");

$id=$_SESSION['id'];

$delete_id=$_GET['id'];
if($id==$delete_id){
    header("Location: ../area_adm/index.php?a=e4da3b7fbbce2345d7772b0674a318d5");
    exit();

}

$sql = "DELETE FROM administrador WHERE idadministrador ='$delete_id'";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: ../area_adm/index.php?a=c81e728d9d4c2f636f067f89cc14862c");
    exit();
}else{
    echo "Erro ao deletar";
}






?>