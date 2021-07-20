-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Jul-2021 às 18:32
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro_devedores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devedores`
--

DROP TABLE IF EXISTS `devedores`;
CREATE TABLE IF NOT EXISTS `devedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `devedores`
--

INSERT INTO `devedores` (`id`, `nome`, `cpf_cnpj`, `data_nascimento`, `cep`, `logradouro`, `numero`, `cidade`, `estado`, `telefone`, `hash`, `data_cadastro`, `updated`) VALUES
(1, 'Felipe Ribeiro Magueta', '39385889850', '1993-04-10', '05340-000', 'Avenida Corifeu de Azevedo Marques', '123', 'São Paulo', 'SP', '(15) 99611-9505', '60f713486539a', '2021-07-20', '2021-07-20 18:17:55'),
(2, 'Alan de Souza', '15651859189981', '2021-07-18', '05340-000', 'Avenida Corifeu de Azevedo Marques', '152', 'São Paulo', 'SP', '(15) 99487-9818', '60f71450e16ef', '2021-07-20', NULL),
(3, 'Maria Joaquina', '18231247797', '2000-01-01', '18530-000', 'Rua Santa Cruz', '123', 'Tietê', 'SP', '(15) 98888-9849', '60f714746ce25', '2021-07-20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dividas`
--

DROP TABLE IF EXISTS `dividas`;
CREATE TABLE IF NOT EXISTS `dividas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devedores_id` int(11) NOT NULL,
  `descricao_titulo` text NOT NULL,
  `valor` float NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dividas`
--

INSERT INTO `dividas` (`id`, `devedores_id`, `descricao_titulo`, `valor`, `data_vencimento`, `data_cadastro`, `hash`) VALUES
(1, 1, '<p>Roupas compradas na loja X</p><ol><li>Jaqueta</li><li>Cal&ccedil;a</li><li>Camiseta</li></ol>', 55.9, '2021-07-21', '2021-07-20', '60f713b7ef87c'),
(2, 2, '<p>Pe&ccedil;as e m&atilde;o de obra na concession&aacute;ria X</p><ol><li>R$ 1000 em pe&ccedil;as<ol><li>2x pneus</li><li>1x Roda</li><li>10x Parafusos</li></ol></li><li>R$ 250 em m&atilde;o de obra</li></ol>', 1250, '2020-07-17', '2021-07-20', '60f714d22fefb'),
(3, 2, '<p>M&atilde;o de obra em manuten&ccedil;&otilde;es residenciais</p>', 540, '2021-07-15', '2021-07-20', '60f714f4aebb8'),
(4, 3, '<p>Roupas</p>', 1000, '2021-07-28', '2021-07-20', '60f7158b43484'),
(5, 3, '<p>Joias</p>', 1000, '2021-07-28', '2021-07-20', '60f7158b43484');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dividas_historico`
--

DROP TABLE IF EXISTS `dividas_historico`;
CREATE TABLE IF NOT EXISTS `dividas_historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dividas_id` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `descricao_historico` text NOT NULL,
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dividas_historico`
--

INSERT INTO `dividas_historico` (`id`, `dividas_id`, `data_cadastro`, `descricao_historico`, `hash`) VALUES
(1, 1, '2021-07-20 18:19:53', '<p>Ligamos para o cliente, n&atilde;o atendeu</p>', '60f713c95354a'),
(2, 1, '2021-07-20 18:20:40', '<p>Cliente solicitou parcelamento da d&iacute;vida. Enviado para departamento financeiro.</p><ol><li>2x R$ 30,00</li></ol>', '60f713f85a54c'),
(3, 1, '2021-07-20 18:21:05', '<p>Boletos enviados por e-mail para cliente, aguardando pagamento.</p>', '60f714118cb89');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
