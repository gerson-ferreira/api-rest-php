-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela api_rest.clientes: 2 rows
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nome`, `cpf`, `sexo`, `email`, `data_cadastro`, `data_alteracao`, `ip`) VALUES
	(2, 'José da silva', '77704595083', 'M', 'jose_da_silva@terra.com', '2021-11-28 19:20:54', '2021-11-29 12:07:04', '10.0.0.1'),
	(3, 'Maria de Fatima', '47611170015', 'F', 'maria_fatima@terra.com', '2021-11-28 19:21:05', '2021-11-29 12:07:04', '10.0.0.1');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando dados para a tabela api_rest.produtos: 2 rows
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `fabricacao`, `tamanho`, `valor`, `data_cadastro`, `data_alteracao`, `ip`) VALUES
	(1, 'Nome do meu produto', 'Descrição do meu produto', 'N', 'M', 100.20, '2021-11-28 13:54:45', '2021-11-28 13:54:47', '10.0.0.1'),
	(6, 'Caneta de cor bic', 'Caixa com 30 canetas', 'N', 'M', 100.20, '2021-11-28 13:54:45', '2021-11-28 13:54:47', '10.0.0.1');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
