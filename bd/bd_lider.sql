-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/12/2023 às 15:43
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
-- Estrutura para tabela `tbl_fifth_installment`
--

CREATE TABLE `tbl_fifth_installment` (
  `idPaymentInInstallments` int NOT NULL,
  `installment_value` int DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_mode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `installment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idclient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_fifth_installment`
--

INSERT INTO `tbl_fifth_installment` (`idPaymentInInstallments`, `installment_value`, `installment_date`, `installment_mode`, `installment_status`, `idclient`) VALUES
(26, 345, '2023-12-13', 'Parcelado no cartão', 'Em aberto', 26),
(27, 23, '2023-12-14', 'Parcelado no carnê', 'Em aberto', 27);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_first_installment`
--

CREATE TABLE `tbl_first_installment` (
  `idPaymentInInstallments` int NOT NULL,
  `installment_value` int DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_mode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `installment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idclient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_first_installment`
--

INSERT INTO `tbl_first_installment` (`idPaymentInInstallments`, `installment_value`, `installment_date`, `installment_mode`, `installment_status`, `idclient`) VALUES
(41, 300, '2023-12-15', 'Parcelado no cartão', 'Pagamento realizado', 26),
(42, 23, '2023-12-13', 'Parcelado no cartão', 'Em aberto', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_fourth_installment`
--

CREATE TABLE `tbl_fourth_installment` (
  `idPaymentInInstallments` int NOT NULL,
  `installment_value` int DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_mode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `installment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idclient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_fourth_installment`
--

INSERT INTO `tbl_fourth_installment` (`idPaymentInInstallments`, `installment_value`, `installment_date`, `installment_mode`, `installment_status`, `idclient`) VALUES
(27, 4355, '2023-12-21', 'Parcelado no carnê', 'Pagamento realizado', 26),
(28, 23, '2023-12-15', 'Parcelado no cartão', 'Pagamento realizado', 27);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_second_installment`
--

CREATE TABLE `tbl_second_installment` (
  `idPaymentInInstallments` int NOT NULL,
  `installment_value` int DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_mode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `installment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idclient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_second_installment`
--

INSERT INTO `tbl_second_installment` (`idPaymentInInstallments`, `installment_value`, `installment_date`, `installment_mode`, `installment_status`, `idclient`) VALUES
(28, 1212, '2023-12-14', 'Parcelado no cartão', 'Pagamento realizado', 26),
(29, 23, '2023-12-07', 'Parcelado no cartão', 'Pagamento realizado', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_sixth_installment`
--

CREATE TABLE `tbl_sixth_installment` (
  `idPaymentInInstallments` int NOT NULL,
  `installment_value` int DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_mode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `installment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idclient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_sixth_installment`
--

INSERT INTO `tbl_sixth_installment` (`idPaymentInInstallments`, `installment_value`, `installment_date`, `installment_mode`, `installment_status`, `idclient`) VALUES
(27, 456, '2023-12-15', 'Parcelado no carnê', 'Pagamento realizado', 26),
(28, 23, '2023-12-13', 'Parcelado no cartão', 'Pagamento realizado', 27);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_third_installment`
--

CREATE TABLE `tbl_third_installment` (
  `idPaymentInInstallments` int NOT NULL,
  `installment_value` int DEFAULT NULL,
  `installment_date` date DEFAULT NULL,
  `installment_mode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `installment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idclient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_third_installment`
--

INSERT INTO `tbl_third_installment` (`idPaymentInInstallments`, `installment_value`, `installment_date`, `installment_mode`, `installment_status`, `idclient`) VALUES
(27, 234344, '2023-12-20', 'Parcelado no cartão', 'Pagamento realizado', 26),
(28, 23, '2023-12-16', 'Parcelado no cartão', 'Pagamento realizado', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `idAdministrator` int NOT NULL,
  `name_administrator` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(60) NOT NULL,
  `password_administrator` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `register_date` date DEFAULT NULL,
  `recover_password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_administrator`
--

INSERT INTO `tb_administrator` (`idAdministrator`, `name_administrator`, `email`, `password_administrator`, `register_date`, `recover_password`) VALUES
(13, 'admin', 'admin@gmail.com', '$2y$10$W7eLFGh1ylvFlCSTXm7mSuXLHBBIKxPAs.9SvyXr6QhMHifBDNKHy', '2023-12-06', '');

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
(9, 5656, '2023-12-13', 24);

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
  `renach` varchar(45) DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_client`
--

INSERT INTO `tb_client` (`idclient`, `name_client`, `father`, `mother`, `rg`, `rg_expedition`, `cpf`, `birth_date`, `email`, `celphone`, `telephone`, `naturalness`, `address_client`, `number_client`, `neighborhood`, `uf`, `activity_location`, `renach`, `registration_date`) VALUES
(24, 'Edson Silva', 'Maria José', 'Roberto', '1343434343', '12', '23456787654', '2023-12-08', 'edson@gmail.com', '1212121212', '19887367881', 'Brasil', 'Rua Dez', '123', 'Vila Barro', 'SP', 'casa', '12', '2023-12-13'),
(25, 'testes', '34', '343', '34', '34', '23434343434343', '2023-12-06', 'testes@gmail.com', '34', '34', '34', '34', '3', '34', '34', '34', '34', '2023-12-13'),
(26, 'Mateus ', 'yasmim', 'Carlos', '34343434', '34', '333333333', '2023-12-15', 'Mateus@gmail.com', '2222', '2232222', 'Brasil', 'Vila Martin', '123', 'Vila Barro', 'SP', 'casa', '12', '2023-12-13'),
(27, 'cbjdsbc@gmail.com', 'cbjdsbc@gmail.com', 'cbjdsbc@gmail.com', '2323', '23', '23', '2023-12-16', 'cbjdsbc@gmail.com', '23', '23', '23', '23', '23', '23', '23', '12313', '23', '2023-12-14');

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
(28, 'A', '1 Habilitação', '2023-12-07', 1111, '2023-12-06', 24),
(30, 'B', '1 Habilitação', '2023-12-15', 33434, '2023-12-06', 25),
(31, 'AB', 'Reabilitação', '2023-12-05', 6666, '2023-12-14', 26),
(32, 'B', 'Reabilitação', '2023-12-15', 23, '2023-12-11', 27);

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
(6, 333, '2023-12-16', 25);

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
(9, '2023-12-14', '2023-12-14', '2023-12-15', '2023-12-15', '2023-12-15', '2023-12-07', '2023-12-28', '2023-12-22', 24),
(11, '2023-12-15', '2023-12-14', '2023-12-08', '2023-12-15', '2023-12-16', '2023-12-06', '2023-12-14', '2023-12-19', 25),
(12, '2023-12-07', '2023-12-11', '2023-12-08', '2023-12-12', '2023-12-09', '2023-12-21', '2023-12-10', '2023-12-22', 26),
(13, '2023-12-15', '2023-12-06', '2023-12-16', '2023-12-06', '2023-12-08', '2023-12-13', '2023-12-29', '2023-12-18', 27);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_fifth_installment`
--
ALTER TABLE `tbl_fifth_installment`
  ADD PRIMARY KEY (`idPaymentInInstallments`),
  ADD KEY `PK008` (`idclient`);

--
-- Índices de tabela `tbl_first_installment`
--
ALTER TABLE `tbl_first_installment`
  ADD PRIMARY KEY (`idPaymentInInstallments`),
  ADD KEY `PK008` (`idclient`);

--
-- Índices de tabela `tbl_fourth_installment`
--
ALTER TABLE `tbl_fourth_installment`
  ADD PRIMARY KEY (`idPaymentInInstallments`),
  ADD KEY `PK008` (`idclient`);

--
-- Índices de tabela `tbl_second_installment`
--
ALTER TABLE `tbl_second_installment`
  ADD PRIMARY KEY (`idPaymentInInstallments`),
  ADD KEY `PK008` (`idclient`);

--
-- Índices de tabela `tbl_sixth_installment`
--
ALTER TABLE `tbl_sixth_installment`
  ADD PRIMARY KEY (`idPaymentInInstallments`),
  ADD KEY `PK008` (`idclient`);

--
-- Índices de tabela `tbl_third_installment`
--
ALTER TABLE `tbl_third_installment`
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
-- AUTO_INCREMENT de tabela `tbl_fifth_installment`
--
ALTER TABLE `tbl_fifth_installment`
  MODIFY `idPaymentInInstallments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbl_first_installment`
--
ALTER TABLE `tbl_first_installment`
  MODIFY `idPaymentInInstallments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `tbl_fourth_installment`
--
ALTER TABLE `tbl_fourth_installment`
  MODIFY `idPaymentInInstallments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tbl_second_installment`
--
ALTER TABLE `tbl_second_installment`
  MODIFY `idPaymentInInstallments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tbl_sixth_installment`
--
ALTER TABLE `tbl_sixth_installment`
  MODIFY `idPaymentInInstallments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tbl_third_installment`
--
ALTER TABLE `tbl_third_installment`
  MODIFY `idPaymentInInstallments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_administrator`
--
ALTER TABLE `tb_administrator`
  MODIFY `idAdministrator` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_cash_payment`
--
ALTER TABLE `tb_cash_payment`
  MODIFY `idCashPayment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `idclient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tb_cnh`
--
ALTER TABLE `tb_cnh`
  MODIFY `idcnh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tb_course_on_sight`
--
ALTER TABLE `tb_course_on_sight`
  MODIFY `idCourseOnSight` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_rates`
--
ALTER TABLE `tb_rates`
  MODIFY `idrates` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_fifth_installment`
--
ALTER TABLE `tbl_fifth_installment`
  ADD CONSTRAINT `tbl_fifth_installment_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_first_installment`
--
ALTER TABLE `tbl_first_installment`
  ADD CONSTRAINT `PK008` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_fourth_installment`
--
ALTER TABLE `tbl_fourth_installment`
  ADD CONSTRAINT `tbl_fourth_installment_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_second_installment`
--
ALTER TABLE `tbl_second_installment`
  ADD CONSTRAINT `tbl_second_installment_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_sixth_installment`
--
ALTER TABLE `tbl_sixth_installment`
  ADD CONSTRAINT `tbl_sixth_installment_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_third_installment`
--
ALTER TABLE `tbl_third_installment`
  ADD CONSTRAINT `tbl_third_installment_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tb_client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

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
