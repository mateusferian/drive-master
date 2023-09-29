-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 29-Set-2023 às 09:09
-- Versão do servidor: 8.0.34-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_lider`
--
CREATE DATABASE IF NOT EXISTS `bd_lider` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bd_lider`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_administrador`
--

CREATE TABLE `tb_administrador` (
  `id` int NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` int NOT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `idaluno` int NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `pai` varchar(100) DEFAULT NULL,
  `mae` varchar(100) DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `rg_expedicao` varchar(45) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `naturalidade` varchar(45) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `local_atividade` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `renach` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cnh`
--

CREATE TABLE `tb_cnh` (
  `idcnh` int NOT NULL,
  `categoria` char(3) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `matricula` date DEFAULT NULL,
  `exame_medico` date DEFAULT NULL,
  `numero_registro` int DEFAULT NULL,
  `atualizacao_biometrica` varchar(45) DEFAULT NULL,
  `idaluno` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamento`
--

CREATE TABLE `tb_pagamento` (
  `idpagamento` int NOT NULL,
  `valor_total` double DEFAULT NULL,
  `forma_pagto` varchar(45) DEFAULT NULL,
  `curso_teorio` varchar(45) DEFAULT NULL,
  `data_parcela` date DEFAULT NULL,
  `valor_parcela` double DEFAULT NULL,
  `situacao` varchar(45) DEFAULT NULL,
  `idaluno` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_taxas`
--

CREATE TABLE `tb_taxas` (
  `idtaxas` int NOT NULL,
  `teorico` date DEFAULT NULL,
  `pratico1` date DEFAULT NULL,
  `pratico2` date DEFAULT NULL,
  `emissao_cnh` date DEFAULT NULL,
  `reprova` date DEFAULT NULL,
  `exame_a` date DEFAULT NULL,
  `exame_b` date DEFAULT NULL,
  `exame_d` date DEFAULT NULL,
  `idaluno` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
