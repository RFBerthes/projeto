-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Jun-2019 às 07:34
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_pep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebidas`
--

CREATE TABLE `bebidas` (
  `idbebida` int(11) NOT NULL,
  `nome_bebida` varchar(45) NOT NULL,
  `valorbeb` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bebidas`
--

INSERT INTO `bebidas` (`idbebida`, `nome_bebida`, `valorbeb`, `estoque`) VALUES
(1, 'Coca-Cola (Lata)', '4.00', 40),
(2, 'Pepsi (Lata)', '4.00', 40),
(3, 'Suco Natural (400 ml)', '5.00', 30),
(4, 'AguÃ¡ (600 ml)', '4.00', 25),
(8, 'GuaranÃ¡ (600 ml)', '5.00', 45),
(9, 'Coca-Cola (1 Litro)', '7.00', 90),
(10, 'Pepsi (1 Litro)', '7.50', 70),
(12, 'HEINEKEN', '14.00', 60),
(13, 'EISENBAHN', '13.00', 40),
(14, 'Skol (LatÃ£o)', '6.00', 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nome`) VALUES
(1, 'Rafael'),
(4, 'Jessica'),
(8, 'Josefina'),
(13, 'Kratos'),
(14, 'Steve');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comandas`
--

CREATE TABLE `comandas` (
  `idcomanda` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) DEFAULT NULL,
  `status_comanda` varchar(30) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `mesa_idmesa` int(11) NOT NULL,
  `usuarios_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanches`
--

CREATE TABLE `lanches` (
  `idlanche` int(11) NOT NULL,
  `nome_lanche` varchar(45) NOT NULL,
  `valorlan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lanches`
--

INSERT INTO `lanches` (`idlanche`, `nome_lanche`, `valorlan`) VALUES
(6, 'X SALADA', '18.00'),
(8, 'X CORAÃ‡ÃƒO', '18.00'),
(9, 'X BACON', '18.00'),
(10, 'PASTEL CARNE', '6.00'),
(11, 'X CALABRESA', '19.00'),
(12, 'X TUDO', '25.00'),
(14, 'X CALABRESA', '19.00'),
(15, 'ISCA DE PEIXE', '40.00'),
(16, 'FRITAS (P)', '15.00'),
(17, 'FRITAS (M)', '20.00'),
(18, 'FRITAS (G)', '25.00'),
(19, 'POLENTA', '18.00'),
(20, 'PORÃ‡ÃƒO MISTA', '45.00'),
(21, 'CAMARÃƒO Ã€ MILANESA', '50.00'),
(22, 'PASTEL FRANGO', '12.00'),
(23, 'PASTEL QUEIJO', '10.00'),
(24, 'PASTEL 4 QUEIJOS', '6.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `idmesa` int(11) NOT NULL,
  `lugares` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`idmesa`, `lugares`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `comanda_idcomanda` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `lanches_idlanche` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `obs` varchar(30) DEFAULT NULL,
  `bebidas_idbebida` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `data`, `status`, `tipo`, `comanda_idcomanda`, `usuario_idusuario`, `lanches_idlanche`, `quantidade`, `obs`, `bebidas_idbebida`) VALUES
(9, '2019-06-15 00:21:16', 'Servido', 'Lanche', 5, 9, 6, 1, 'Sem tomate', NULL),
(10, '2019-06-15 00:21:26', 'Servido', 'Bebida', 5, 9, NULL, 1, 'Laranja', 3),
(11, '2019-06-16 17:56:38', 'Servido', 'Lanche', 6, 9, 6, 1, '', NULL),
(12, '2019-06-16 17:56:45', 'Servido', 'Bebida', 6, 9, NULL, 2, '', 1),
(13, '2019-06-16 19:46:54', 'Servido', 'Bebida', 6, 9, NULL, 1, '', 8),
(15, '2019-06-16 19:56:47', 'Servido', 'Lanche', 6, 9, 10, 1, '', NULL),
(16, '2019-06-16 19:57:00', 'Servido', 'Bebida', 6, 9, NULL, 1, '', 4),
(17, '2019-06-16 20:04:11', 'Servido', 'Lanche', 7, 9, 6, 1, '', NULL),
(18, '2019-06-16 20:04:18', 'Servido', 'Bebida', 7, 9, NULL, 2, '', 1),
(19, '2019-06-16 20:10:19', 'Servido', 'Bebida', 7, 9, NULL, 1, '', 1),
(20, '2019-06-16 20:10:35', 'Servido', 'Bebida', 7, 9, NULL, 1, '', 1),
(21, '2019-06-17 03:01:49', 'Servido', 'Lanche', 14, 9, 16, 1, '', NULL),
(22, '2019-06-17 03:09:41', 'Servido', 'Bebida', 14, 9, NULL, 1, 'Com gelo', 4),
(23, '2019-06-17 04:29:38', 'Servido', 'Lanche', 14, 11, 23, 1, '', NULL),
(24, '2019-06-17 04:30:29', 'Servido', 'Lanche', 14, 11, 23, 1, '', NULL),
(25, '2019-06-17 04:30:34', 'Servido', 'Lanche', 14, 11, 23, 1, '', NULL),
(26, '2019-06-17 04:30:46', 'Servido', 'Lanche', 14, 11, 18, 1, '', NULL),
(27, '2019-06-17 04:31:19', 'Servido', 'Bebida', 14, 11, NULL, 1, '', 1),
(28, '2019-06-17 04:32:22', 'Servido', 'Bebida', 14, 11, NULL, 1, '', 1),
(29, '2019-06-17 04:32:30', 'Servido', 'Bebida', 14, 11, NULL, 1, '', 1),
(30, '2019-06-17 04:33:58', 'Servido', 'Bebida', 14, 11, NULL, 1, '', 1),
(31, '2019-06-17 04:34:59', 'Servido', 'Bebida', 14, 11, NULL, 1, '', 1),
(32, '2019-06-17 04:35:27', 'Servido', 'Bebida', 14, 11, NULL, 5, '', 1),
(33, '2019-06-17 04:35:34', 'Servido', 'Lanche', 14, 11, 6, 1, '', NULL),
(35, '2019-06-17 05:01:28', 'Servido', 'Bebida', 16, 9, NULL, 1, '', 1),
(36, '2019-06-17 05:09:41', 'Servido', 'Bebida', 16, 9, NULL, 3, '', 4),
(37, '2019-06-17 05:17:48', 'Servido', 'Bebida', 16, 9, NULL, 2, '', 4),
(38, '2019-06-17 05:18:27', 'Servido', 'Bebida', 16, 9, NULL, 5, '', 3),
(39, '2019-06-17 05:20:00', 'Servido', 'Lanche', 16, 9, 21, 1, '', NULL),
(40, '2019-06-17 05:22:44', 'Aguardando', 'Bebida', 17, 9, NULL, 2, '', 4),
(41, '2019-06-17 05:22:49', 'Preparo', 'Lanche', 17, 9, 21, 1, '', NULL),
(42, '2019-06-17 05:22:57', 'Preparo', 'Lanche', 17, 9, 16, 1, '', NULL),
(43, '2019-06-17 05:23:01', 'Aguardando', 'Bebida', 17, 9, NULL, 1, '', 4),
(44, '2019-06-17 05:23:21', 'Servido', 'Bebida', 16, 11, NULL, 1, '', 1),
(45, '2019-06-17 05:23:53', 'Servido', 'Lanche', 16, 11, 9, 0, '', NULL),
(46, '2019-06-17 05:24:17', 'Servido', 'Bebida', 16, 11, NULL, 2, '', 1),
(47, '2019-06-17 05:24:30', 'Servido', 'Lanche', 16, 11, 6, 1, '', NULL),
(48, '2019-06-17 05:24:55', 'Servido', 'Lanche', 16, 11, 6, 0, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `perfil` varchar(15) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `perfil`, `nome`, `usuario`, `senha`) VALUES
(8, 'Administrador', 'Rafael Berthes', 'admin', 'admin'),
(9, 'Atendente', 'GarÃ§om Fulano da Silva', 'atendente', 'atendente'),
(10, 'Cozinheiro', 'Cozinheiro Pereira', 'cozinheiro', 'cozinheiro'),
(11, 'Caixa', 'Caixa da Silva', 'caixa', 'caixa'),
(12, 'Administrador', 'Pedro Berthes', 'pedro', 'pedro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`idbebida`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `comandas`
--
ALTER TABLE `comandas`
  ADD PRIMARY KEY (`idcomanda`),
  ADD KEY `fk_comanda_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_comanda_mesa1_idx` (`mesa_idmesa`),
  ADD KEY `fk_comanda_usuarios1_idx` (`usuarios_idusuario`);

--
-- Indexes for table `lanches`
--
ALTER TABLE `lanches`
  ADD PRIMARY KEY (`idlanche`);

--
-- Indexes for table `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`idmesa`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_pedido_comanda1_idx` (`comanda_idcomanda`),
  ADD KEY `fk_pedido_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_pedidos_lanches1_idx` (`lanches_idlanche`),
  ADD KEY `fk_pedidos_bebidas1_idx` (`bebidas_idbebida`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `idbebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comandas`
--
ALTER TABLE `comandas`
  MODIFY `idcomanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lanches`
--
ALTER TABLE `lanches`
  MODIFY `idlanche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mesas`
--
ALTER TABLE `mesas`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comandas`
--
ALTER TABLE `comandas`
  ADD CONSTRAINT `fk_comanda_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_mesa1` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesas` (`idmesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_usuarios1` FOREIGN KEY (`usuarios_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_comanda1` FOREIGN KEY (`comanda_idcomanda`) REFERENCES `comandas` (`idcomanda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_bebidas1` FOREIGN KEY (`bebidas_idbebida`) REFERENCES `bebidas` (`idbebida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_lanches1` FOREIGN KEY (`lanches_idlanche`) REFERENCES `lanches` (`idlanche`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
