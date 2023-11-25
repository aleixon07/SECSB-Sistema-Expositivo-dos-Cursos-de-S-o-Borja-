<?php

session_start();
include("../connect.php");

$id=$_SESSION['id'];

$delete_id=$_GET['id'];

$sql1 = "SELECT * FROM cursos WHERE idcursos = '$delete_id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$caminho_imagem = $row1["fotos"];


if(isset($caminho_imagem) && !empty($nome_imagem)){

    $caminhoArquivo = "../area_adm/img/$caminho_imagem";
    
    if (file_exists($caminhoArquivo)) {
        if (unlink($caminhoArquivo)) {
            echo 'Arquivo de foto excluído com sucesso.';
        } else {
            echo 'Erro ao excluir o arquivo de foto.';
        }
    } else {
        echo 'O arquivo de foto não existe.';
    }
}   

$sql = "DELETE FROM cursos WHERE idcursos ='$delete_id'";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: ../area_adm/cursos.php?a=c81e728d9d4c2f636f067f89cc14862c");
    exit();
}else{
    echo "Erro ao deletar";
}






?>