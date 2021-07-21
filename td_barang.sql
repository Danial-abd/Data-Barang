-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for utsweb
CREATE DATABASE IF NOT EXISTS `utsweb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `utsweb`;

-- Dumping structure for table utsweb.tb_barang
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` char(5) NOT NULL,
  `nama_barang` char(100) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `stok` int(5) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `jenis` char(50) NOT NULL,
  `diskon` float NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table utsweb.tb_barang: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;
INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga_beli`, `stok`, `images`, `jenis`, `diskon`) VALUES
	('A008', 'Mod', 300000, 30, '1184327835_website-color-palettes-3.jpg', 'Jaringan', 50),
	('A009', 'Gun', 1000, 30, '898095671_website-color-palettes-3.jpg', 'Mainan Kanakan', 90),
	('A011', 'Kelereng', 1000, 20, '1302419054_ehe.png', 'Mainan Kanakan', 100),
	('A055', 'Entahlah', 100000, 9, '405431921_Rick-Astley-Music-Video-Remastered-in-4K-Featured-image-1568x882.jpg', 'Baru', 90),
	('A789', 'Key', 100000, 90, '1454999483_e6b75034306d6d07b4d648a16af2284a.png', 'ui', 90),
	('A890', 'Key', 100000, 90, '1575773102_ehe.png', 'Baru', 90);
/*!40000 ALTER TABLE `tb_barang` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
