<?php

session_start();
include("../connect.php");

$id=$_SESSION['id'];

$delete_id = $_GET['id'];

$sql_b = "SELECT * FROM cursos WHERE categorias_idcategorias = '$delete_id'";
$result_b = mysqli_query($conn,$sql_b);

if(mysqli_num_rows($result_b) > 0){

    $sql_delet = "DELETE FROM cursos WHERE categorias_idcategorias = '$delete_id'";
    $result_delet = mysqli_query($conn,$sql_delet);

    if($result_delet){
        echo "cursos deletados";
    }else{
        echo "falha ao deletar os cursos";
    }

}else{
    echo "sem para deletar cursos";
}

$sql = "DELETE FROM categorias WHERE idcategorias ='$delete_id'";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: ../area_adm/categorias.php?a=c81e728d9d4c2f636f067f89cc14862c");
    exit();
}else{
    echo "Erro ao deletar";
}
?>