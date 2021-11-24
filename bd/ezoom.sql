-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2021 at 04:34 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`, `data`, `foto`) VALUES
(11, 'Perfumaria', 'Perfumes masculino e feminino', '2021-11-23', '11.jpg'),
(12, 'Camisaria', 'Camisas adulto e infantil', '2021-11-23', '12.jpg'),
(13, 'Sapataria', 'Sapatos masculinos', '2021-11-23', '13.jpg'),
(15, 'teste', 'teste', '2021-11-23', '1115.png');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_produto`
--

CREATE TABLE `categoria_produto` (
  `colecao` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria_produto`
--

INSERT INTO `categoria_produto` (`colecao`, `categoria`, `produto`) VALUES
(1, 11, 1),
(1, 11, 3),
(2, 13, 3),
(3, 13, 1),
(3, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('6acnpq351n08nsifbhb2f59m01s52vs0', '::1', 1637694108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633373639343130383b6d6573736167655f6f6b7c733a33333a2243617465676f726961206361646173747261646120636f6d207375636573736f21223b5f5f63695f766172737c613a313a7b733a31303a226d6573736167655f6f6b223b733a333a226f6c64223b7d),
('uo8ghqkiqjnnmg2t7ps1skknos134gn6', '::1', 1637694272, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633373639343130383b6d6573736167655f6f6b7c733a33333a2243617465676f726961206361646173747261646120636f6d207375636573736f21223b5f5f63695f766172737c613a313a7b733a31303a226d6573736167655f6f6b223b733a333a226f6c64223b7d),
('gcvo55eocdj0dcpalke330f5eg3l9lt8', '::1', 1637694941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633373639343934313b6d6573736167655f6f6b7c733a33333a2243617465676f726961206361646173747261646120636f6d207375636573736f21223b5f5f63695f766172737c613a313a7b733a31303a226d6573736167655f6f6b223b733a333a226f6c64223b7d),
('oddjbmn2m9sa3flio2ukiie8458s29g5', '::1', 1637695330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633373639353333303b6d6573736167655f6f6b7c733a33333a2243617465676f726961206361646173747261646120636f6d207375636573736f21223b5f5f63695f766172737c613a313a7b733a31303a226d6573736167655f6f6b223b733a333a226e6577223b7d),
('q45ukcisgv5te8mu1vl645ist7tc4sfa', '::1', 1637695481, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633373639353333303b6d6573736167655f6f6b7c733a33333a2243617465676f726961206361646173747261646120636f6d207375636573736f21223b5f5f63695f766172737c613a313a7b733a31303a226d6573736167655f6f6b223b733a333a226e6577223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `colecao`
--

CREATE TABLE `colecao` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `descricao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colecao`
--

INSERT INTO `colecao` (`id`, `nome`, `data`, `descricao`) VALUES
(1, 'Outono inverno', '2021-11-23', 'Coleção outono inverno'),
(2, 'Teste colecao', '2021-11-24', 'teste'),
(3, 'teste 5', '2021-11-24', 'teste 6');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `valor`, `foto`) VALUES
(1, 'Perfume Sauvage', 'Perfume masculino Sauvage - Dior', '270.90', '1.jpg'),
(3, 'Perfume La Rive 2', 'Perfume feminino La Rive 2', '480.65', '13.png'),
(5, 'teste produto', 'teste produto', '569.00', '5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD KEY `colecao` (`colecao`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `produto` (`produto`);

--
-- Indexes for table `colecao`
--
ALTER TABLE `colecao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `colecao`
--
ALTER TABLE `colecao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD CONSTRAINT `categoria_produto_ibfk_1` FOREIGN KEY (`colecao`) REFERENCES `colecao` (`id`),
  ADD CONSTRAINT `categoria_produto_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `categoria_produto_ibfk_3` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
