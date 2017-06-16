-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17-Jun-2017 às 00:48
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfse_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `Endereco` varchar(50) DEFAULT NULL,
  `Complemento` varchar(50) DEFAULT NULL,
  `Numero` varchar(50) DEFAULT NULL,
  `Bairro` varchar(50) DEFAULT NULL,
  `CodigoMunicipio` varchar(50) DEFAULT NULL,
  `Uf` varchar(50) DEFAULT NULL,
  `Cep` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Nfse`
--

CREATE TABLE `Nfse` (
  `id_nfse` int(11) NOT NULL,
  `Numero` varchar(50) DEFAULT NULL,
  `CodigoVerificacao` varchar(50) DEFAULT NULL,
  `DataEmissao` varchar(50) DEFAULT NULL,
  `NaturezaOperacao` varchar(50) DEFAULT NULL,
  `RegimeEspecialTributacao` varchar(50) DEFAULT NULL,
  `OptanteSimplesNacional` varchar(50) DEFAULT NULL,
  `IncentivadorCultural` varchar(50) DEFAULT NULL,
  `Competencia` varchar(50) DEFAULT NULL,
  `NfseSubstituida` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Nfse_OrgaoGerador`
--

CREATE TABLE `Nfse_OrgaoGerador` (
  `id_nfse` int(11) DEFAULT NULL,
  `CodigoMunicipio` varchar(50) DEFAULT NULL,
  `Uf` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Nfse_PrestadorServico`
--

CREATE TABLE `Nfse_PrestadorServico` (
  `id_nfse` int(11) DEFAULT NULL,
  `id_prestador` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `RazaoSocial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Nfse_Servico`
--

CREATE TABLE `Nfse_Servico` (
  `id_nfse` int(11) DEFAULT NULL,
  `id_servico` int(11) NOT NULL,
  `ItemListaServico` varchar(50) DEFAULT NULL,
  `CodigoTributacaoMunicipio` varchar(50) DEFAULT NULL,
  `Discriminacao` varchar(50) DEFAULT NULL,
  `CodigoMunicipio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Nfse_TomadorServico`
--

CREATE TABLE `Nfse_TomadorServico` (
  `id_nfse` int(11) DEFAULT NULL,
  `id_tomador_servico` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `RazaoSocial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `PrestadorServico_IdentificacaoPrestador`
--

CREATE TABLE `PrestadorServico_IdentificacaoPrestador` (
  `id_prestador` int(11) DEFAULT NULL,
  `Cnpj` varchar(50) DEFAULT NULL,
  `InscricaoMunicipal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Servico_Valores`
--

CREATE TABLE `Servico_Valores` (
  `id_servico` int(11) DEFAULT NULL,
  `ValorServicos` varchar(50) DEFAULT NULL,
  `IssRetido` varchar(50) DEFAULT NULL,
  `BaseCalculo` varchar(50) DEFAULT NULL,
  `ValorLiquidoNfse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TomadorServico_Contato`
--

CREATE TABLE `TomadorServico_Contato` (
  `id_tomador_servico` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TomadorServico_IdentificacaoTomador`
--

CREATE TABLE `TomadorServico_IdentificacaoTomador` (
  `id_tomador_servico` int(11) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `Nfse`
--
ALTER TABLE `Nfse`
  ADD PRIMARY KEY (`id_nfse`);

--
-- Indexes for table `Nfse_OrgaoGerador`
--
ALTER TABLE `Nfse_OrgaoGerador`
  ADD KEY `id_nfse` (`id_nfse`);

--
-- Indexes for table `Nfse_PrestadorServico`
--
ALTER TABLE `Nfse_PrestadorServico`
  ADD PRIMARY KEY (`id_prestador`),
  ADD KEY `nfse` (`id_nfse`),
  ADD KEY `endereco` (`id_endereco`);

--
-- Indexes for table `Nfse_Servico`
--
ALTER TABLE `Nfse_Servico`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `nfse_servico` (`id_nfse`);

--
-- Indexes for table `Nfse_TomadorServico`
--
ALTER TABLE `Nfse_TomadorServico`
  ADD PRIMARY KEY (`id_tomador_servico`),
  ADD KEY `nfse_tomador` (`id_nfse`),
  ADD KEY `endereco_tomador` (`id_endereco`);

--
-- Indexes for table `PrestadorServico_IdentificacaoPrestador`
--
ALTER TABLE `PrestadorServico_IdentificacaoPrestador`
  ADD KEY `identificacao_prestador` (`id_prestador`);

--
-- Indexes for table `Servico_Valores`
--
ALTER TABLE `Servico_Valores`
  ADD KEY `servico` (`id_servico`);

--
-- Indexes for table `TomadorServico_Contato`
--
ALTER TABLE `TomadorServico_Contato`
  ADD KEY `tomador_contato` (`id_tomador_servico`);

--
-- Indexes for table `TomadorServico_IdentificacaoTomador`
--
ALTER TABLE `TomadorServico_IdentificacaoTomador`
  ADD KEY `tomador_identificacao` (`id_tomador_servico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Nfse`
--
ALTER TABLE `Nfse`
  MODIFY `id_nfse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Nfse_PrestadorServico`
--
ALTER TABLE `Nfse_PrestadorServico`
  MODIFY `id_prestador` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Nfse_Servico`
--
ALTER TABLE `Nfse_Servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Nfse_TomadorServico`
--
ALTER TABLE `Nfse_TomadorServico`
  MODIFY `id_tomador_servico` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Nfse_OrgaoGerador`
--
ALTER TABLE `Nfse_OrgaoGerador`
  ADD CONSTRAINT `id_nfse` FOREIGN KEY (`id_nfse`) REFERENCES `Nfse` (`id_nfse`);

--
-- Limitadores para a tabela `Nfse_PrestadorServico`
--
ALTER TABLE `Nfse_PrestadorServico`
  ADD CONSTRAINT `endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`),
  ADD CONSTRAINT `nfse` FOREIGN KEY (`id_nfse`) REFERENCES `Nfse` (`id_nfse`);

--
-- Limitadores para a tabela `Nfse_Servico`
--
ALTER TABLE `Nfse_Servico`
  ADD CONSTRAINT `nfse_servico` FOREIGN KEY (`id_nfse`) REFERENCES `Nfse` (`id_nfse`);

--
-- Limitadores para a tabela `Nfse_TomadorServico`
--
ALTER TABLE `Nfse_TomadorServico`
  ADD CONSTRAINT `endereco_tomador` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`),
  ADD CONSTRAINT `nfse_tomador` FOREIGN KEY (`id_nfse`) REFERENCES `Nfse` (`id_nfse`);

--
-- Limitadores para a tabela `PrestadorServico_IdentificacaoPrestador`
--
ALTER TABLE `PrestadorServico_IdentificacaoPrestador`
  ADD CONSTRAINT `identificacao_prestador` FOREIGN KEY (`id_prestador`) REFERENCES `Nfse_PrestadorServico` (`id_prestador`);

--
-- Limitadores para a tabela `Servico_Valores`
--
ALTER TABLE `Servico_Valores`
  ADD CONSTRAINT `servico` FOREIGN KEY (`id_servico`) REFERENCES `Nfse_Servico` (`id_servico`);

--
-- Limitadores para a tabela `TomadorServico_Contato`
--
ALTER TABLE `TomadorServico_Contato`
  ADD CONSTRAINT `tomador_contato` FOREIGN KEY (`id_tomador_servico`) REFERENCES `Nfse_TomadorServico` (`id_tomador_servico`);

--
-- Limitadores para a tabela `TomadorServico_IdentificacaoTomador`
--
ALTER TABLE `TomadorServico_IdentificacaoTomador`
  ADD CONSTRAINT `tomador_identificacao` FOREIGN KEY (`id_tomador_servico`) REFERENCES `Nfse_TomadorServico` (`id_tomador_servico`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
