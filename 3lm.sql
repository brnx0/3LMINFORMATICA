
--
-- Banco de dados: `3lm`
CREATE DATABASE IF NOT EXISTS 3lm;
USE 3lm;
-- -------------------------------------------------------
--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) PRIMARY KEY auto_increment,
  `grupo` varchar(25) NOT NULL UNIQUE KEY
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) PRIMARY KEY auto_increment,
  `descricao` varchar(50) NOT NULL UNIQUE KEY,
  `codBarra` int(11) NOT NULL UNIQUE KEY,
  `saldo` float NOT NULL,
  `undMedida` varchar(5) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_idGrupo` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id`);


