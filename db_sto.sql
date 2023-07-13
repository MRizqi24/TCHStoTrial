-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_sto
CREATE DATABASE IF NOT EXISTS `db_sto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_sto`;

-- Dumping structure for table db_sto.item
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL,
  `ITEMCODE` varchar(16) NOT NULL,
  `DESCRIPT` varchar(50) NOT NULL,
  `PART_NO` varchar(25) DEFAULT NULL,
  `DESCRIPT1` varchar(30) NOT NULL,
  `NO_TAG` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_sto.item-master
CREATE TABLE IF NOT EXISTS `item-master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ITEMCODE` varchar(16) NOT NULL DEFAULT '0',
  `OLDCODE` varchar(16) DEFAULT '0',
  `DESCRIPT` varchar(50) DEFAULT '0',
  `DESCRIPT1` varchar(30) DEFAULT '0',
  `INVENTORY` int DEFAULT '0',
  `FORMULA` int DEFAULT '0',
  `FPCODE` varchar(16) DEFAULT '0',
  `CUSTCODE` varchar(4) DEFAULT '0',
  `VENDCODE` varchar(4) DEFAULT '0',
  `BRAND` varchar(2) DEFAULT '0',
  `GROUPS` varchar(2) DEFAULT '0',
  `TYPES` varchar(2) DEFAULT '0',
  `STATE` varchar(2) DEFAULT '0',
  `BIN` varchar(6) DEFAULT '0',
  `WAREHOUSE` varchar(2) DEFAULT '0',
  `UNIT` varchar(4) DEFAULT '0',
  `FAC_UNIT` varchar(4) DEFAULT '0',
  `FACTOR` double(14,4) DEFAULT '0.0000',
  `ONHAND` double(14,4) DEFAULT '0.0000',
  `LOT_QTY` double(14,4) DEFAULT '0.0000',
  `MIN_QTY` double(14,4) DEFAULT '0.0000',
  `MAX_QTY` double(14,4) DEFAULT '0.0000',
  `AVE_QTY` double(14,4) DEFAULT '0.0000',
  `MAX_DAY` int DEFAULT '0',
  `MIN_DAY` int DEFAULT '0',
  `PRO_DAY` int DEFAULT '0',
  `COST` double(14,4) DEFAULT '0.0000',
  `FIRST_COST` double(14,4) DEFAULT '0.0000',
  `LAST_COST` double(14,4) DEFAULT '0.0000',
  `MON_COST` double(14,4) DEFAULT '0.0000',
  `PRICE` double(14,4) DEFAULT '0.0000',
  `AGE` int DEFAULT '0',
  `LASTBUY` date DEFAULT NULL,
  `LASTSOLD` date DEFAULT NULL,
  `LASTPROD` date DEFAULT NULL,
  `ENTERED` date DEFAULT NULL,
  `GLINV` varchar(10) DEFAULT '0',
  `GLREV` varchar(10) DEFAULT '0',
  `GLCOGS` varchar(10) DEFAULT '0',
  `BARCODE` varchar(16) DEFAULT '0',
  `PART_NO` varchar(30) DEFAULT '0',
  `OPNAME_DAT` date DEFAULT NULL,
  `OPNAME_QTY` double DEFAULT '0',
  `OPNAME_COS` double DEFAULT '0',
  `QTY_CHECK` double DEFAULT '0',
  `TEMP_QTY` double DEFAULT '0',
  `FIX_COST` double DEFAULT '0',
  `VAR_COST` double DEFAULT '0',
  `FORM_QTY` double DEFAULT '0',
  `BOM_COST` double DEFAULT '0',
  `PROC_COST` double DEFAULT '0',
  `SC_COST` double DEFAULT '0',
  `NO_TAG` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ITEMCODE` (`ITEMCODE`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `idx_item` (`DESCRIPT`) USING BTREE,
  KEY `CUSTCODE` (`CUSTCODE`) USING BTREE,
  KEY `STATE` (`STATE`) USING BTREE,
  KEY `DESCRIPT1` (`DESCRIPT1`,`CUSTCODE`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=148863 DEFAULT CHARSET=latin1 COMMENT='Data Master Items';

-- Data exporting was unselected.

-- Dumping structure for table db_sto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_sto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_sto.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_sto.stock_opname
CREATE TABLE IF NOT EXISTS `stock_opname` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) DEFAULT NULL,
  `part_name` varchar(50) DEFAULT NULL,
  `part_number` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `gudang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(50) DEFAULT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') DEFAULT NULL,
  `no_tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_sto.tablename
CREATE TABLE IF NOT EXISTS `tablename` (
  `ITEMCODE` varchar(50) DEFAULT NULL,
  `DESCRIPT` varchar(50) DEFAULT NULL,
  `PART_NO` varchar(50) DEFAULT NULL,
  `DESCRIPT1` varchar(50) DEFAULT NULL,
  `NO_TAG` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_sto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_key` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nip_unique` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
