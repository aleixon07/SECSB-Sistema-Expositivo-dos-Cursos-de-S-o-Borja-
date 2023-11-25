<?php
session_start();
include("../connect.php");

if(isset($_POST["nome"]) && isset($_POST["duracao"]) && isset($_POST["descricao"])) {
    $nome = htmlspecialchars($_POST['nome']);
    $duracao = htmlspecialchars($_POST["duracao"]);
    $descricao = htmlspecialchars($_POST["descricao"]);
    $imagem = $_FILES['imagem'];
    $pdf = $_FILES['pdf'];
    $id_c = $_POST["categoria"];
    $id_inst = $_POST["instituicao"];
    $id_edit = $_GET['id'];
    $error = "";
    $carga = $_POST["carga"];
    $modalidade = $_POST["modalidade"];
    
    $sql1 = "SELECT * FROM cursos WHERE idcursos = '$id_edit'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $caminho_imagem = $row1["fotos"];
    $caminho_pdf = $row1["pdf"];

    if (!empty($imagem['name'])) {
        // Verifique se há uma imagem nova e a atualize
        $nomeimagem = uniqid($imagem["name"]) . ".jpeg";
        $caminho_imagem_nova = "../area_adm/img/" . $nomeimagem;

        if (move_uploaded_file($imagem['tmp_name'], $caminho_imagem_nova)) {
            // Exclua a imagem antiga se existir
            if (!empty($caminho_imagem) && file_exists($caminho_imagem)) {
                unlink($caminho_imagem);
            }
        } else {
            echo "Erro ao enviar a nova imagem.";
            exit();
        }
    } else {
        $nomeimagem = $caminho_imagem;
    }

    if (!empty($pdf['name'])) {
        $nomepdf = uniqid($pdf["name"]) . ".pdf";
        $caminho_pdf_novo = "../area_adm/pdf/" . $nomepdf;

        if (move_uploaded_file($pdf['tmp_name'], $caminho_pdf_novo)) {
            if (!empty($caminho_pdf) && file_exists($caminho_pdf)) {
                unlink($caminho_pdf);
            }
        } else {
            echo "Erro ao enviar o novo PDF.";
            exit();
        }
    } else {
        $nomepdf = $caminho_pdf;
    }

    $sql2 = "UPDATE cursos SET 
                nome = '$nome', 
                descricao = '$descricao',
                duracao = '$duracao',
                categorias_idcategorias = '$id_c',
                idinstituicoes = '$id_inst',
                fotos = '$nomeimagem',
                pdf = '$nomepdf',
                carga = '$carga',
                modalidade = '$modalidade'
                WHERE idcursos = '$id_edit'";

    if (mysqli_query($conn, $sql2)) {
        header("Location: ../area_adm/cursos.php?a=eccbc87e4b5ce2fe28308fd9f2a7baf3"); 
        exit();
    } else {
        echo "Erro na atualização do curso.";
    }
} else {
    header("Location: ../area_adm/cursos.php"); 
    exit();
}
?>
