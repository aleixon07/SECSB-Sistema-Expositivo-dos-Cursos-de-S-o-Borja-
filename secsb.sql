-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2023 às 20:41
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `secsb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nome`, `email`, `senha`) VALUES
(9, 'Nathalia', 'n@gmail.com', '202cb962ac59075b964b07152d234b70'),
(10, 'Ane', 'ane@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `nome`) VALUES
(1, 'Bacharelado'),
(2, 'Tecnólogo'),
(3, 'Licenciatura'),
(4, 'Técnico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `idcursos` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `duracao` varchar(50) NOT NULL,
  `periodo` varchar(40) NOT NULL,
  `categorias_idcategorias` int(11) NOT NULL,
  `idinstituicoes` int(11) NOT NULL,
  `fotos` text NOT NULL,
  `carga` varchar(50) NOT NULL,
  `modalidade` varchar(50) NOT NULL,
  `grau` varchar(11) NOT NULL,
  `pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idcursos`, `nome`, `descricao`, `duracao`, `periodo`, `categorias_idcategorias`, `idinstituicoes`, `fotos`, `carga`, `modalidade`, `grau`, `pdf`) VALUES
(10, 'Gastronomia', 'O curso de Gastronomia é uma formação especializada voltada para indivíduos que desejam explorar o vasto mundo da culinária e adquirir habilidades culinárias profissionais. Oferecido por diversas instituições de ensino, o programa busca capacitar os alunos em várias áreas da gastronomia, proporcionando uma educação completa e prática.\r\n', '5 semestres ', 'Diurno', 2, 1, 'gastro.jpg652d6fe0abb26.jpeg', '300 horas', 'Presencial', '', 'ppc-matriz-curricular-de-2022-1.pdf653129710153b.pdf'),
(13, 'Direito ', 'A Universidade Federal do Pampa (UNIPAMPA) oferece um curso de Direito em São Borja, que tem como objetivo formar profissionais aptos a compreender, aplicar e promover a justiça. O curso abrange disciplinas que vão desde os fundamentos legais até áreas específicas do Direito, como Civil, Penal, Trabalho, Administrativo, Tributário, entre outras. Os estudantes também têm a oportunidade de participar de estágios práticos em escritórios de advocacia e órgãos judiciários, onde aplicam o conhecimento em casos reais. ', '10 semestres', 'Noturno', 1, 3, 'direito.jpg652d891457da3.jpeg', '3.855 horas', 'Presencial', '', 'ppc-matriz-curricular-de-2022-1.pdf6530965a4902a.pdf'),
(15, 'Sistemas de Informação', 'O curso de Bacharelado em Sistemas de Informação visa a formação de profissionais da área de Computação e Informática para atuação em pesquisa, gestão, desenvolvimento, uso e avaliação de tecnologias de informação aplicadas nas organizações.', '9 semestres ', 'Noturno', 1, 1, 'si.jpg652e8f747329f.jpeg', '300 horas', 'Presencial', '', ''),
(16, 'Gestão Ambiental', 'O bacharel em Gestão Ambiental formado pela Uergs poderá atuar em instituições públicas e privadas e no terceiro setor, tendo capacidades técnicas e princípios éticos para elaborar, executar, e coordenar projetos e ações na área ambiental, visando o desenvolvimento sustentável com o mínimo possível de impacto ambiental e social. O profissional será capacitado a monitorar a qualidade do ambiente, evitando e remediando danos à flora, à fauna e à sociedade pelas ações antrópicas. Também deverá ser capaz de atuar na educação ambiental, conscientizando a sociedade sobre a importância da preservação e da conservação do meio ambiente.', '9 semestres ', 'Noturno', 1, 6, 'gestaoambiental.jpg652ec3810b69e.jpeg', '2.790 horas', 'Presencial', '', ''),
(17, 'Física', 'A Licenciatura em Física no Instituto Federal Farroupilha (IFFar) em São Borja é um programa de graduação que prepara os estudantes para se tornarem professores de Física no ensino médio. Durante o curso, os alunos estudam os princípios fundamentais da Física, participam de laboratórios práticos para ganhar experiência em experimentação e coleta de dados, aprimoram suas habilidades matemáticas e aprendem a planejar e ministrar aulas eficazes. À medida que avançam no programa, os estudantes exploram tópicos avançados em Física, como física quântica e astrofísica. Além disso, os alunos têm a oportunidade de realizar estágios em escolas para ganhar experiência prática em sala de aula.', '8 semestres', 'Noturno', 3, 1, 'fisica.jpg652fd50407788.jpeg', '1000 horas', 'Presencial', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes`
--

CREATE TABLE `instituicoes` (
  `idinstituicoes` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `descricao` longtext NOT NULL,
  `link` text DEFAULT NULL,
  `fotos` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `instituicoes`
--

INSERT INTO `instituicoes` (`idinstituicoes`, `nome`, `endereco`, `descricao`, `link`, `fotos`, `email`, `telefone`) VALUES
(1, 'IFFar | Instituto Federal de Educação, Ciência e Tecnologia Farroupilha ', 'Rua Otaviano Castilho Mendes, 355 - Betim, São Borja - RS, 97670-000', 'O IF Farroupilha é uma instituição de educação superior, básica e profissional, pluricurricular e multicampi, especializada na oferta de educação profissional e tecnológica nas diferentes modalidades de ensino.', 'https://www.iffarroupilha.edu.br/', 'PXL_20221111_150854719.jpg651a31ff16523.jpeg', ' gabinete.sb@iffarroupilha.edu.br ', '(55) 3431-0500'),
(3, 'Unipampa | Universidade Federal do Pampa ', 'Alberto Benevenuto, 3200 - Bairro Passo - São Borja, RS - 97670-000', 'A Unipampa é uma instituição de ensino superior pública federal brasileira, fundada em 2008 e estabelecida no estado do Rio Grande do Sul. Em 2017 foi considerada a quinta melhor instituição de ensino superior gaúcha segundo avaliação do MEC medida pelo Índice Geral de Cursos.', 'https://unipampa.edu.br/saoborja/', 'uni.jpg652ebff66b4a0.jpeg', 'saoborja@unipampa.edu.br ', '(55) 3430 9850  ou  (55) 3430 9853'),
(6, 'UERGS | Universidade Estadual do Rio Grande do Sul', 'Avenida Presidente Tancredo Neves, 210 - Piraí São Borja - RS - Brasil 97670-000', 'A Universidade Estadual do Rio Grande do Sul é uma instituição de ensino superior pública e multicampi, com vinte e quatro unidades distribuídas pelo estado brasileiro do Rio Grande do Sul. ', 'https://www.uergs.edu.br/sao-borja', 'uergs.jpg652ec243ad6cb.jpeg', ' unidade-borja@uergs.edu.br', '(55) 3430-4125');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategorias`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcursos`) USING BTREE,
  ADD KEY `fk_Cursos_categorias1_idx` (`categorias_idcategorias`),
  ADD KEY `fk_Cursos_instituicao` (`idinstituicoes`);

--
-- Índices para tabela `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`idinstituicoes`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `idinstituicoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_Cursos_categorias1` FOREIGN KEY (`categorias_idcategorias`) REFERENCES `categorias` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cursos_instituicao` FOREIGN KEY (`idinstituicoes`) REFERENCES `instituicoes` (`idinstituicoes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
