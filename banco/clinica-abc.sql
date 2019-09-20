-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2019 às 19:20
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica-abc`
--
CREATE DATABASE IF NOT EXISTS `clinica-abc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `clinica-abc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `profissional_id` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `paciente_id`, `profissional_id`, `dia`, `hora`) VALUES
(9, 10, 25, '2019-09-12', '08:00:00'),
(16, 6, 25, '2019-10-20', '14:30:00'),
(17, 6, 25, '2019-10-20', '18:00:00'),
(18, 6, 25, '2019-10-20', '08:00:00'),
(19, 6, 25, '2019-10-20', '09:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `especialidade` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `especialidade`) VALUES
(13, 'AdministraÃ§Ã£o'),
(14, 'ClÃ­nico Geral'),
(15, 'Dentista'),
(16, 'Oftalmologista'),
(17, 'Neurologista'),
(18, 'Pediatra'),
(19, 'Cardiologista'),
(21, 'FisioterapÃªutico'),
(22, 'Ortopedia'),
(23, 'aaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `intervalo`
--

CREATE TABLE `intervalo` (
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `intervalo`
--

INSERT INTO `intervalo` (`hora`) VALUES
('08:00:00'),
('08:30:00'),
('09:00:00'),
('09:30:00'),
('10:00:00'),
('10:30:00'),
('11:00:00'),
('11:30:00'),
('12:00:00'),
('12:30:00'),
('13:00:00'),
('13:30:00'),
('14:00:00'),
('14:30:00'),
('15:00:00'),
('15:30:00'),
('16:00:00'),
('16:30:00'),
('17:00:00'),
('17:30:00'),
('18:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `prontuario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `usuario_id`, `nome`, `cpf`, `sexo`, `nascimento`, `telefone`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `prontuario`) VALUES
(6, 29, 'Arthur Machado Ducati carro', '555.555.555-55', 'M', '2001-12-12', '(31) 8375-0474', '(31) 98948-8479', 'Rua Waldemar SimÃµes', '222', 'Vila Boa Vista', 'SÃ£o Carlos', 'SP', '13574-012', NULL),
(8, 31, 'Matheus Ducati Gomes', '338.492.838-52', 'M', '1983-05-22', '(92) 3436-3456', '(92) 99292-9322', 'Rua Anita Garibald', '34', 'Santo AntÃ´nio', 'Manaus', 'AM', '69029-285', NULL),
(9, 32, 'Bernardo Ducati Machado', '738.849.420-00', 'M', '1985-05-06', '(19) 4884-6253', '(19) 93406-1810', 'PraÃ§a Anita Garibaldi', '244', 'Centro', 'Campinas', 'SP', '13015-180', NULL),
(10, 33, 'Alice Amaral Ducati', '111.111.111-11', 'F', '2000-05-22', '(92) 3921-5271', '(92) 93493-3545', 'Rua Anita Garibald', '234', 'Santo AntÃ´nio', 'Manaus', 'AM', '69029-285', 'ffffffffffffffffff'),
(11, 34, 'Ana Paula Amaral Machado', '927.173.754-73', 'F', '1999-05-06', '(31) 5428-7752', '(31) 92914-7220', 'Rua AnfibÃ³lios', '234', 'Bonfim', 'Belo Horizonte', 'MG', '31210-440', NULL),
(12, 35, 'Laura Amaral Ducati', '525.785.769-39', 'F', '1977-03-05', '(51) 1155-5344', '(51) 91503-0716', 'Rua Condado', '234', 'Ipanema', 'Porto Alegre', 'RS', '91751-110', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `registro` varchar(20) NOT NULL,
  `arquivo` varchar(40) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id`, `usuario_id`, `nome`, `especialidade`, `celular`, `registro`, `arquivo`, `data`) VALUES
(12, 37, 'Isabela Ducati Amaral', 17, '(11) 92770-6668', '911225341', 'ea6d6e67f98016a8d3d0a5a2ae26dadb.png', '2019-09-08 00:16:35'),
(13, 38, 'Isabela Gomes Amaral', 16, '(19) 92606-4936', '403289440', 'c5b4c36af2e558ee08736ae815d1b000.png', '2019-09-08 00:17:40'),
(14, 39, 'Isabela Gomes Amaral', 14, '(12) 31231-2312', '123123123', 'ec8dd0e4be3ccd599305834076f8bd00.png', '2019-09-08 00:20:09'),
(15, 40, 'Isabela Ducati Teixeira', 18, '(12) 31231-2312', '30291382916', 'd50f87426f554d7a6635c1892890580d.png', '2019-09-08 00:22:20'),
(16, 41, 'Guilherme Gomes Teixeira', 21, '(19) 97189-7647', '11785919806', '34e84dfc587f0e543fc7b73932934233.png', '2019-09-08 00:23:39'),
(17, 42, 'Gabriel Ducati Machado', 22, '(71) 93741-0972', '98346215312', '4c604740f07027f587a5177c9d3122ed.png', '2019-09-08 00:24:40'),
(18, 43, 'Carlos Teixeira Amaral', 15, '(11) 97117-4245', '21406019984', 'bebdc82478264147b0d2e0c6cde6bafc.png', '2019-09-08 00:25:48'),
(19, 44, 'Lara Gomes Ducati', 18, '(19) 99234-1469', '85901735269', 'af5c689b182e03f921d08e82130aa0ff.png', '2019-09-08 00:26:45'),
(20, 45, 'Mariana Machado Teixeira', 21, '777777', '05712638959', '54be48037d9ff10dcb7150cc85f19676.png', '2019-09-08 00:28:17'),
(21, 46, 'Gabriela Ducati Amaral', 15, '(92) 99579-1620', '59693965329', '5921df8ebbb1fae7eceb63743c5ecac6.png', '2019-09-08 00:29:17'),
(22, 47, 'Maria Amaral Machado', 22, '(92) 98714-4168', '65702301315', 'c2f931243ed6465ca46955a31eba12fa.png', '2019-09-08 00:30:34'),
(23, 48, 'administrador teste', 13, '(77) 77777-7777', '12312312312', 'f2705bdbb34b3d302c0a12fb1067beb6.png', '2019-09-08 00:35:57'),
(24, 49, 'Ã‡ucas do Amaral', 14, '(23) 12312-3123', '4556675667', '9f387cd43b8515d071cc4a0a14fae45a.png', '2019-09-09 08:36:44'),
(25, 50, 'Ã‡Ã£osebastiÃ£o MÃ£o de Tesoura', 19, '(12) 31232-3123', '34432234', 'c5744799853eb76bbe61ccf5d2191b49.png', '2019-09-09 08:55:05'),
(26, 51, 'criptografo pitacio', 22, '(22) 22222-2222', '444333222111', '19af49c9fff43f4c565bc194eb37936f.png', '2019-09-18 15:18:52'),
(27, 52, 'leandro trepador', 13, '(11) 11111-1111', '11', 'ad41001c18e703b5d0802b462e99a861.png', '2019-09-18 16:28:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `tipo`) VALUES
(29, 'p@paciente', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 3),
(31, 'matheus.gomes@uol.com.br', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 3),
(32, 'bernardo.machado@yahoo.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 3),
(33, 'alice.ducati@yahoo.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 3),
(34, 'anapaula.machado@gmail.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 3),
(35, 'laura.ducati@globo.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 3),
(37, 'isabela.amaral@hotmail.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(38, 'isabela.amaral@icloud.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(39, 'isabela.amaral@globo.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(40, 'isabela.teixeira@hotmail.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(41, 'guilherme.teixeira@yahoo.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(42, 'gabriel.machado@yahoo.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(43, 'carlos.amaral@icloud.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(44, 'lara.ducati@uol.com.br', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(45, 'mariana@uol.com.br', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(46, 'gabriela.amaral@uol.com.br', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(47, 'maria.machado@globo.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(48, 'admin@admin', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 1),
(49, 'lucas@lucas', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(50, 'wert@wert', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(51, 'sha@sha', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(52, 'a@a', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_agenda` (`paciente_id`),
  ADD KEY `profissional_agenda` (`profissional_id`);

--
-- Índices para tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_paciente` (`usuario_id`);

--
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_profissional` (`usuario_id`),
  ADD KEY `especialidade_profissional` (`especialidade`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `paciente_agenda` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `profissional_agenda` FOREIGN KEY (`profissional_id`) REFERENCES `profissional` (`id`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `usuario_paciente` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `especialidade_profissional` FOREIGN KEY (`especialidade`) REFERENCES `especialidades` (`id`),
  ADD CONSTRAINT `usuario_profissional` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
