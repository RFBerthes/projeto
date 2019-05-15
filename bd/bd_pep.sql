-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Maio-2019 às 22:02
-- Versão do servidor: 10.1.39-MariaDB
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
  `nome` varchar(45) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bebidas`
--

INSERT INTO `bebidas` (`idbebida`, `nome`, `valor`, `estoque`) VALUES
(1, 'Coca-Cola (Lata 300 ml)', '4.00', 40),
(2, 'Pepsi (Lata 350ml)', '4.00', 40),
(3, 'Suco Natural (400 ml)', '5.00', 35),
(4, 'AguÃ¡ (600 ml)', '4.00', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comanda`
--

CREATE TABLE `comanda` (
  `idcomanda` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `mesa_idmesa` int(11) NOT NULL,
  `usuarios_idusuario` int(11) NOT NULL,
  `bebida_idbebida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL,
  `lugares` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `tempo` time DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `comanda_idcomanda` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `pizza_idpizza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizzas`
--

CREATE TABLE `pizzas` (
  `idpizza` int(11) NOT NULL,
  `tamanho` varchar(45) DEFAULT NULL,
  `nsabor` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pizzas`
--

INSERT INTO `pizzas` (`idpizza`, `tamanho`, `nsabor`, `valor`) VALUES
(3, 'Pequena', 1, '20.00'),
(4, 'MÃ©dia', 2, '30.00'),
(5, 'Grande', 3, '40.00'),
(6, 'FamÃ­lia', 4, '50.00'),
(8, 'FamÃ­lia', 2, '30.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabores`
--

CREATE TABLE `sabores` (
  `idsabor` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sabores`
--

INSERT INTO `sabores` (`idsabor`, `nome`) VALUES
(1, 'Portuguesa'),
(2, 'Calabresa'),
(5, 'Frango'),
(9, 'Quatro Queijos');

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
(8, 'admin', 'RAFAEL FLORES BERTHES DA SILVA', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`idbebida`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`idcomanda`),
  ADD KEY `fk_comanda_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_comanda_mesa1_idx` (`mesa_idmesa`),
  ADD KEY `fk_comanda_usuarios1_idx` (`usuarios_idusuario`),
  ADD KEY `fk_comanda_bebida1_idx` (`bebida_idbebida`);

--
-- Indexes for table `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idmesa`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_pedido_comanda1_idx` (`comanda_idcomanda`),
  ADD KEY `fk_pedido_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_pedido_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_pedido_pizza1_idx` (`pizza_idpizza`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`idpizza`);

--
-- Indexes for table `sabores`
--
ALTER TABLE `sabores`
  ADD PRIMARY KEY (`idsabor`);

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
  MODIFY `idbebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `idcomanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `idpizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sabores`
--
ALTER TABLE `sabores`
  MODIFY `idsabor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `fk_comanda_bebida1` FOREIGN KEY (`bebida_idbebida`) REFERENCES `bebidas` (`idbebida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_mesa1` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_usuarios1` FOREIGN KEY (`usuarios_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_comanda1` FOREIGN KEY (`comanda_idcomanda`) REFERENCES `comanda` (`idcomanda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_pizza1` FOREIGN KEY (`pizza_idpizza`) REFERENCES `pizzas` (`idpizza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
