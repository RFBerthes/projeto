-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Maio-2019 às 08:58
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

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
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `idbebida` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `comanda_idcomanda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dtNasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comanda`
--

CREATE TABLE `comanda` (
  `idcomanda` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `mesa_idmesa` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `pizza_idpizza` int(11) NOT NULL
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
  `valorPedido` decimal(10,2) DEFAULT NULL,
  `comanda_idcomanda` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `funcao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idperfil`, `usuario_idusuario`, `funcao`) VALUES
(1, 1, 'admin'),
(2, 2, 'caixa'),
(3, 3, 'atendente'),
(4, 4, 'cozinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

CREATE TABLE `pizza` (
  `idpizza` int(11) NOT NULL,
  `tamanho` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `usuario`, `senha`) VALUES
(1, 'TESTE ADMIN', 'admin', '55782209'),
(2, 'TESTE CAIXA', 'caixa', 'caixa'),
(3, 'TESTE ATENDENTE', 'atendente', 'atendente'),
(4, 'TESTE COZINHEIRO', 'cozinheiro', 'cozinheiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`idbebida`),
  ADD KEY `fk_bebida_comanda1_idx` (`comanda_idcomanda`);

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
  ADD KEY `fk_comanda_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_comanda_pizza1_idx` (`pizza_idpizza`);

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
  ADD KEY `fk_pedido_usuario1_idx` (`usuario_idusuario`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`),
  ADD KEY `fk_Tipo_usuario_usuario1_idx` (`usuario_idusuario`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`idpizza`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bebida`
--
ALTER TABLE `bebida`
  MODIFY `idbebida` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `idpizza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bebida`
--
ALTER TABLE `bebida`
  ADD CONSTRAINT `fk_bebida_comanda1` FOREIGN KEY (`comanda_idcomanda`) REFERENCES `comanda` (`idcomanda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `fk_comanda_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_mesa1` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_pizza1` FOREIGN KEY (`pizza_idpizza`) REFERENCES `pizza` (`idpizza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_comanda1` FOREIGN KEY (`comanda_idcomanda`) REFERENCES `comanda` (`idcomanda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fk_Tipo_usuario_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
