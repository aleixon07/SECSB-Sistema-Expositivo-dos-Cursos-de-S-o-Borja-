<?php

session_start();
include "../connect.php";

if(isset($_SESSION['id'])){
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["nome"]) && isset($_POST["endereco"]) && isset($_POST["descricao"])){


$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$descricao = $_POST["descricao"];
$link = $_POST["link"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$imagem = $_FILES['imagem'];
$nome_imagem = $imagem["name"];

$diretorioDestino = "../area_adm/img/";

if(isset($nome_imagem)){
    $nomeimagem = uniqid($imagem["name"]).".jpeg";
    $tipo = $imagem["type"];
    $tamanho = $imagem["size"];
    $tmp_name = $imagem["tmp_name"];
    $caminhoDestino = $diretorioDestino .$nomeimagem;
    if (move_uploaded_file($tmp_name, $caminhoDestino)) {
        echo "Imagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a imagem.";
    }

}  

    $sql = "INSERT INTO instituicoes (nome, endereco, descricao, fotos, link, email, telefone) VALUES ('$nome', '$endereco', '$descricao', '$nomeimagem', '$link', '$email', '$telefone')"; 
    
    
    if($conn->query($sql)){
    
        header("Location: ../area_adm/instituicoes.php?e=c4ca4238a0b923820dcc509a6f75849b");
        exit();
    

}}}}
?>