<?php
session_start();
include("../connect.php");


if(isset($_POST["nome"]) && isset($_POST["endereco"]) && isset($_POST["descricao"])){
    $nome = htmlspecialchars($_POST['nome']); 
    $endereco = htmlspecialchars($_POST["endereco"]);
    $descricao = htmlspecialchars($_POST["descricao"]);
    $imagem = $_FILES['imagem'];
    $link = $_POST["link"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $nomeimagem = uniqid($imagem["name"]).".jpeg";
    $nome_imagem = $imagem["name"];
    $id_edit = $_GET['id'];
    $error = "";
    

    $sql1 = "SELECT * FROM instituicoes WHERE idinstituicoes = '$id_edit'";
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
    
    if(!empty($nome_imagem)){
         $diretorioDestino = "../area_adm/img/";
         $tipo = $imagem["type"];
         $tamanho = $imagem["size"];
         $tmp_name = $imagem["tmp_name"];
         
         $caminhoDestino = $diretorioDestino .$nomeimagem;
            if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }

        $sql2 = "UPDATE instituicoes SET 
                        nome ='$nome', 
                        descricao = '$descricao',
                        endereco = '$endereco',
                        link = '$link',
                        email = '$email',
                        telefone = '$telefone',
                        fotos = '$nomeimagem' 
                        WHERE  idinstituicoes = '$id_edit' ";
        $result2 = mysqli_query($conn, $sql2); 
                               
    
    }else if(empty($nome_imagem)){
        
        $sql2 = "UPDATE instituicoes SET 
                        nome ='$nome', 
                        endereco = '$endereco',
                        descricao = '$descricao',
                        link = '$link',
                        email = '$email',
                        telefone = '$telefone',
                        fotos = '$caminho_imagem' 
                        WHERE  idinstituicoes = '$id_edit' ";
        $result2 = mysqli_query($conn, $sql2); 
    }


        header("Location: ../area_adm/instituicoes.php?a=eccbc87e4b5ce2fe28308fd9f2a7baf3"); 
        exit();
    
}else{
    header("Location: ../area_adm/instituicoes.php"); 
    exit();
 
}      



?>