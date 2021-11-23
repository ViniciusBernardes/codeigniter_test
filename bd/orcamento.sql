-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/04/2021 às 22:54
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerencial`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id` int(10) NOT NULL,
  `id_chamado` int(10) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `categoria` varchar(400) NOT NULL,
  `valor_material` decimal(10,2) NOT NULL,
  `valor_mobra` decimal(10,2) NOT NULL,
  `data_envio` date NOT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `status` varchar(400) NOT NULL,
  `lote` int(10) NOT NULL,
  `rota` varchar(500) NOT NULL,
  `finalizado` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `id_chamado`, `descricao`, `categoria`, `valor_material`, `valor_mobra`, `data_envio`, `data_aprovacao`, `status`, `lote`, `rota`, `finalizado`) VALUES
(1, 6386, 'Regulagem da porta do Aquário', 'Civil', '44.10', '220.00', '2021-04-13', '0000-00-00', 'Aguardando', 0, 'BH', 'NAO');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
