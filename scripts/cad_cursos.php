<?php
session_start();
include "../connect.php";

if (isset($_SESSION['id'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nome"]) && isset($_POST["duracao"]) && isset($_POST["descricao"])) {
            $nome = $_POST["nome"];
            $endereco = $_POST["duracao"];
            $descricao = $_POST["descricao"];
            $idcat = $_POST["categoria"];
            $periodo = $_POST["periodo"];
            $instituicoes = $_POST["instituicoes"];
            $imagem = $_FILES['imagem'];
            $pdf = $_FILES['pdf'];
            $carga = $_POST["carga"];
            $modalidade = $_POST["modalidade"];

            $diretorioDestinoImagem = "../area_adm/img/";
            $diretorioDestinoPDF = "../area_adm/pdf/";

            if (isset($imagem['name'])) {
                $nomeimagem = uniqid() . ".jpeg";
                $caminhoDestinoImagem = $diretorioDestinoImagem . $nomeimagem;

                if (move_uploaded_file($imagem['tmp_name'], $caminhoDestinoImagem)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }
            }

            if (isset($pdf['name'])) {
                $nomepdf = uniqid() . ".pdf";
                $caminhoDestinoPDF = $diretorioDestinoPDF . $nomepdf;

                if (move_uploaded_file($pdf['tmp_name'], $caminhoDestinoPDF)) {
                    echo "PDF enviado com sucesso!";
                } else {
                    echo "Erro ao enviar o PDF.";
                }
            }

            $sql = "INSERT INTO cursos (nome, duracao, descricao, categorias_idcategorias, periodo, fotos, idinstituicoes, carga, modalidade, pdf) VALUES ('$nome', '$endereco', '$descricao', '$idcat', '$periodo', '$nomeimagem', '$instituicoes', '$carga', '$modalidade', '$nomepdf')";

            if ($conn->query($sql)) {
                header("Location: ../area_adm/cursos.php?a=c4ca4238a0b923820dcc509a6f75849b");
                exit();
            }
        }
    }
}
?>
