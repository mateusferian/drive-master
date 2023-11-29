-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29/11/2023 às 19:58
-- Versão do servidor: 8.0.35-0ubuntu0.22.04.1
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
-- Estrutura para tabela `tbl_payment_in_installments`
--

CREATE TABLE `tbl_payment_in_installments` (
  `idPaymentInInstallments` int NOT NULL,
  `installment_value` int DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_mode` varchar(30) DEFAULT NULL,
  `installment_status` varchar(30) NOT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `idAdministrator` int NOT NULL,
  `name_administrator` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(60) NOT NULL,
  `password_administrator` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
(9, 'senhas', 'senha@gmail.com', '$2y$10$Kb1bRkJRofr69yozqt0kaeG8BiRd/BLmsgBzUObl.N9y08SaHUGky', '2023-10-09'),
(10, 'ascv', 'admin@gmail.com', '$2y$10$C1WtgEK4hbLrCOh/uBlAhuOLIf25NusiFQKUa7TfWsadHO0F3y1fu', '2023-11-29'),
(11, 's', 's@mail.com', '$2y$10$ryMQbn0jx2k3euMsNB6IPuwwlZl/VU3U2n8cnnawUEhGAU7FlHZd.', '2023-11-29'),
(12, 'a', 'sd@gmail.com', '$2y$10$awwhY4EsS6mnny4rwPqbO.2b8SnWF62BuajgA3lt99aE.DTXPNoV6', '2023-11-29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cash_payment`
--

CREATE TABLE `tb_cash_payment` (
  `idCashPayment` int NOT NULL,
  `value_cash_payment` int NOT NULL,
  `date_cash_payment` date NOT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_cash_payment`
--

INSERT INTO `tb_cash_payment` (`idCashPayment`, `value_cash_payment`, `date_cash_payment`, `idclient`) VALUES
(1, 1221, '2023-11-17', 3);

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

--
-- Despejando dados para a tabela `tb_client`
--

INSERT INTO `tb_client` (`idclient`, `name_client`, `father`, `mother`, `rg`, `rg_expedition`, `cpf`, `birth_date`, `email`, `celphone`, `telephone`, `naturalness`, `address_client`, `number_client`, `neighborhood`, `uf`, `activity_location`, `photo`, `renach`) VALUES
(1, 'jose', 'jose', 'jose', '123', '123', '13', '2023-10-27', 'jose@gmail.com', '12', '12', '123', '123', '12', '12', '13', '12', '', '123'),
(2, 'jose', 'jose', 'jose', '1111', '123', '1111', '2023-10-27', 'jose@gmail.com', '12', '12', '123', '123', '12', '12', '13', '12', '', '123'),
(3, 'CASA', '34', '34', '34', '34', '34', '2023-11-30', '334@gmail.com', '34', '34', '34', '34', '34', '34', '34', '34', '', '34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cnh`
--

CREATE TABLE `tb_cnh` (
  `idcnh` int NOT NULL,
  `category` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type_cnh` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `medical_exam` date DEFAULT NULL,
  `registration_number` int DEFAULT NULL,
  `biometric_update` varchar(45) DEFAULT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_cnh`
--

INSERT INTO `tb_cnh` (`idcnh`, `category`, `type_cnh`, `medical_exam`, `registration_number`, `biometric_update`, `idclient`) VALUES
(1, 'A', 'firstLicense', '2023-10-06', NULL, '2023-10-05', 1),
(2, 'AB', 'firstLicense', '2023-10-05', 123455, '2023-10-26', 1),
(3, 'AB', 'firstLicense', '2023-10-05', 123455, '2023-10-26', 1),
(4, 'AB', 'categoryAddition', '2023-10-05', 123455, '2023-10-26', 1),
(5, 'AB', 'rehabilitation', '2023-10-05', 123455, '2023-10-26', 1),
(6, 'AB', 'rehabilitation', '2023-10-05', 123455, '2023-10-26', 1),
(7, 'AB', 'rehabilitation', '2023-10-05', 123, '2023-10-26', 1),
(8, 'AB', 'reabilitacao', '2023-10-05', 123, '2023-10-26', 1),
(9, 'AB', '1 Habilitação', '2023-10-05', 123, '2023-10-26', 1),
(10, 'AB', 'adição de categoria', '2023-10-05', 123, '2023-10-26', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_course_on_sight`
--

CREATE TABLE `tb_course_on_sight` (
  `idCourseOnSight` int NOT NULL,
  `value_course_on_sight` int NOT NULL,
  `date_course_on_sight` date NOT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_course_on_sight`
--

INSERT INTO `tb_course_on_sight` (`idCourseOnSight`, `value_course_on_sight`, `date_course_on_sight`, `idclient`) VALUES
(3, 1, '2023-11-29', 3);

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
-- Despejando dados para a tabela `tb_rates`
--

INSERT INTO `tb_rates` (`idrates`, `theoretic`, `practice1`, `practice2`, `emission_cnh`, `disapprove`, `exam_a`, `exam_b`, `exam_d`, `idclient`) VALUES
(1, '2023-10-07', '2023-09-28', '2023-10-05', '2023-10-06', '2023-10-20', '2023-10-27', '2023-10-20', '2023-10-09', 1),
(2, '2023-11-10', '2023-11-10', '2023-11-10', '2023-11-15', '2023-11-10', '2023-11-24', NULL, '2023-11-22', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_payment_in_installments`
--
ALTER TABLE `tbl_payment_in_installments`
  ADD PRIMARY KEY (`idPaymentInInstallments`),
  ADD KEY `PK008` (`idclient`);

--
-- Índices de tabela `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`idAdministrator`);

--
-- Índices de tabela `tb_cash_payment`
--
ALTER TABLE `tb_cash_payment`
  ADD PRIMARY KEY (`idCashPayment`),
  ADD KEY `PK005` (`idclient`);

--
-- Índices de tabela `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`idclient`);

--
-- Índices de tabela `tb_cnh`
--
ALTER TABLE `tb_cnh`
  ADD PRIMARY KEY (`idcnh`),
  ADD KEY `PK006` (`idclient`);

--
-- Índices de tabela `tb_course_on_sight`
--
ALTER TABLE `tb_course_on_sight`
  ADD PRIMARY KEY (`idCourseOnSight`),
  ADD KEY `PK004` (`idclient`);

--
-- Índices de tabela `tb_rates`
--
ALTER TABLE `tb_rates`
  ADD PRIMARY KEY (`idrates`),
  ADD KEY `PK007` (`idclient`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_payment_in_installments`
--
ALTER TABLE `tbl_payment_in_installments`
  MODIFY `idPaymentInInstallments` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_administrator`
--
ALTER TABLE `tb_administrator`
  MODIFY `idAdministrator` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_cash_payment`
--
ALTER TABLE `tb_cash_payment`
  MODIFY `idCashPayment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `idclient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_cnh`
--
ALTER TABLE `tb_cnh`
  MODIFY `idcnh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_course_on_sight`
--
ALTER TABLE `tb_course_on_sight`
  MODIFY `idCourseOnSight` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_rates`
--
ALTER TABLE `tb_rates`
  MODIFY `idrates` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_payment_in_installments`
--
ALTER TABLE `tbl_payment_in_installments`
  ADD CONSTRAINT `PK008` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_cash_payment`
--
ALTER TABLE `tb_cash_payment`
  ADD CONSTRAINT `PK005` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_cnh`
--
ALTER TABLE `tb_cnh`
  ADD CONSTRAINT `PK006` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_course_on_sight`
--
ALTER TABLE `tb_course_on_sight`
  ADD CONSTRAINT `PK004` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_rates`
--
ALTER TABLE `tb_rates`
  ADD CONSTRAINT `PK007` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
