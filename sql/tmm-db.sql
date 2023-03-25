-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.31 - MySQL Community Server - GPL
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para tmm
CREATE DATABASE IF NOT EXISTS `tmm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tmm`;

-- Copiando estrutura para tabela tmm.address
CREATE TABLE IF NOT EXISTS `address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `postal_code` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `number` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25211451 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.address: ~2 rows (aproximadamente)
INSERT INTO `address` (`id`, `postal_code`, `country`, `UF`, `city`, `street`, `number`) VALUES
	(1, '25211340', 'brasil', 'rj', 'duque de caxias', 'rua coronel', 7),
	(2, '25310210', 'brasil', 'rj', 'duque de caxias', 'rua manuel', 7);

-- Copiando estrutura para tabela tmm.collaborator
CREATE TABLE IF NOT EXISTS `collaborator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `cpf` char(11) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `address` int DEFAULT NULL,
  `role` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `address` (`address`),
  KEY `role` (`role`),
  CONSTRAINT `address_collaborator_FK` FOREIGN KEY (`address`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_collaborator_FK` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `status_collaborator_FK` FOREIGN KEY (`status`) REFERENCES `status_collaborator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.collaborator: ~3 rows (aproximadamente)
INSERT INTO `collaborator` (`id`, `name`, `last_name`, `cpf`, `date_birth`, `phone`, `email`, `password`, `status`, `address`, `role`) VALUES
	(1, 'admin', 'tmm', '72145862072', '1997-03-25', '21977777777', 'admin@admin.com', 'KvmTest132', 1, 1, 1),
	(2, 'provider', 'tmm', '29083464008', '1997-03-25', '21977777778', 'provider@provider.com', 'KvmTest123', 1, 2, 2),
	(3, 'user', 'tmm', '06994336069', '1997-03-25', '21977777779', 'user@user.com', 'KvmTest321', 1, 1, 3);

-- Copiando estrutura para tabela tmm.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `description` text,
  `brand` varchar(50) DEFAULT NULL,
  `collaborator` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `collaborator` (`collaborator`),
  KEY `status` (`status`),
  CONSTRAINT `collaborator_product_FK` FOREIGN KEY (`collaborator`) REFERENCES `collaborator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `status_product_FK` FOREIGN KEY (`status`) REFERENCES `status_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.product: ~1 rows (aproximadamente)
INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `description`, `brand`, `collaborator`, `status`) VALUES
	(1, 'a10s', 1, 900, 'smartphone samsung a10s 32gb', 'samsung', 2, 1);

-- Copiando estrutura para tabela tmm.purchase
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comments` text,
  `quantity` int DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` int DEFAULT NULL,
  `collaborator` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `collaborator` (`collaborator`),
  KEY `status` (`status`),
  CONSTRAINT `collaborator_purchase_FK` FOREIGN KEY (`collaborator`) REFERENCES `collaborator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `status_purchase_FK` FOREIGN KEY (`status`) REFERENCES `status_purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.purchase: ~1 rows (aproximadamente)
INSERT INTO `purchase` (`id`, `product`, `comments`, `quantity`, `price`, `status`, `collaborator`) VALUES
	(1, 'smartphone moto x2', 'apenas modelos pretos', 10, 1000, 1, 2);

-- Copiando estrutura para tabela tmm.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.role: ~3 rows (aproximadamente)
INSERT INTO `role` (`id`, `role`) VALUES
	(1, 'administrator'),
	(2, 'provider'),
	(3, 'user');

-- Copiando estrutura para tabela tmm.status_collaborator
CREATE TABLE IF NOT EXISTS `status_collaborator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.status_collaborator: ~2 rows (aproximadamente)
INSERT INTO `status_collaborator` (`id`, `status`) VALUES
	(1, 'active'),
	(2, 'inactive');

-- Copiando estrutura para tabela tmm.status_product
CREATE TABLE IF NOT EXISTS `status_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.status_product: ~2 rows (aproximadamente)
INSERT INTO `status_product` (`id`, `status`) VALUES
	(1, 'active'),
	(2, 'inactive');

-- Copiando estrutura para tabela tmm.status_purchase
CREATE TABLE IF NOT EXISTS `status_purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tmm.status_purchase: ~2 rows (aproximadamente)
INSERT INTO `status_purchase` (`id`, `status`) VALUES
	(1, 'active'),
	(2, 'inactive');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
