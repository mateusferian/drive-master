-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/10/2023 às 07:26
-- Versão do servidor: 8.0.34-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_lider`
--
DROP DATABASE IF EXISTS `db_lider`;
CREATE DATABASE IF NOT EXISTS `db_lider` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_lider`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `idAdministrator` int NOT NULL,
  `name_administrator` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(60) NOT NULL,
  `password_administrator` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `register_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_administrator`
--

INSERT INTO `tb_administrator` (`idAdministrator`, `name_administrator`, `email`, `password_administrator`, `register_date`) VALUES
(1, 'qw', 'carlosantoniocleiton@gmail.com', 'casa', '2023-10-08'),
(2, 'as', 'carlosantoniocleiton@gmail.com', 'casa', '2023-10-08'),
(3, 'as', 'carlosantoniocleiton@gmail.com', 'casa', '2023-10-08'),
(4, 'testando', 'm@gmail.com', '123', '2023-10-08'),
(5, 'asasasaaa', 'carlosantoniocleiton@gmail.com', 'casa', '2023-10-09'),
(6, '123', 'mane@gmail.com', '23', '2023-10-09'),
(7, 'casa', 'controller@gmail.com', '12345', '2023-10-09'),
(8, 'controllerssss', 'controllerssss@gmail.com', 'controllerssss', '2023-10-09'),
(9, 'senhas', 'senha@gmail.com', '$2y$10$Kb1bRkJRofr69yozqt0kaeG8BiRd/BLmsgBzUObl.N9y08SaHUGky', '2023-10-09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_client`
--

CREATE TABLE `tb_client` (
  `idclient` int NOT NULL,
  `name_client` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `father` varchar(100) DEFAULT NULL,
  `mother` varchar(100) DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `rg_expedition` varchar(45) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `celphone` varchar(15) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `naturalness` varchar(45) DEFAULT NULL,
  `address_client` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `number_client` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `activity_location` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `renach` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cnh`
--

CREATE TABLE `tb_cnh` (
  `idcnh` int NOT NULL,
  `categoru` char(3) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `registration` date DEFAULT NULL,
  `medical_exam` date DEFAULT NULL,
  `registration_number` int DEFAULT NULL,
  `biometric_update` varchar(45) DEFAULT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_payment`
--

CREATE TABLE `tb_payment` (
  `idpayment` int NOT NULL,
  `amount` double DEFAULT NULL,
  `payment_form` varchar(45) DEFAULT NULL,
  `theoretic_course` varchar(45) DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_value` double DEFAULT NULL,
  `situation` varchar(45) DEFAULT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_rates`
--

CREATE TABLE `tb_rates` (
  `idrates` int NOT NULL,
  `theoretic` date DEFAULT NULL,
  `practice1` date DEFAULT NULL,
  `practice2` date DEFAULT NULL,
  `emission_cnh` date DEFAULT NULL,
  `disapprove` date DEFAULT NULL,
  `exam_a` date DEFAULT NULL,
  `exam_b` date DEFAULT NULL,
  `exam_d` date DEFAULT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`idAdministrator`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_administrator`
--
ALTER TABLE `tb_administrator`
  MODIFY `idAdministrator` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
