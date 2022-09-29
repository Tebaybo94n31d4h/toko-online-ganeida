-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: ganeida-toko
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `aktif` int DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `role_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (4,'Admin','admin@gmail.com','$2y$10$faA0ZjkUY8Dov9VhLEeBx./yfETXNPcwrmw9RtRUyS4yX7cSCPObK',1,'default.png',2,'2022-03-20 05:12:12','2022-03-20 05:12:12'),(5,'Super Admin','superadmin@gmail.com','$2y$10$sL1nj6J5oPvdb0NOQxUmh.LKyGcOnSBBiV3JsuvxG2FV3laAsjUHO',1,'bc132-pakan-sapi-potong-600x600.jpg',1,'2022-03-20 05:12:12','2022-06-05 19:59:08');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desa`
--

DROP TABLE IF EXISTS `desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desa` (
  `id_desa` int NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(128) NOT NULL,
  `id_kecamatan` int NOT NULL,
  PRIMARY KEY (`id_desa`),
  KEY `desa_FK` (`id_kecamatan`),
  CONSTRAINT `desa_FK` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desa`
--

LOCK TABLES `desa` WRITE;
/*!40000 ALTER TABLE `desa` DISABLE KEYS */;
INSERT INTO `desa` VALUES (1,'Oyehe',1),(2,'Kalisusu',1),(3,'Karang Mulia',1),(4,'Kaliharapan',1),(5,'Karang Tumaritis',1),(6,'Girimulyo',1),(7,'Bumi Wonorejo',1),(8,'Kalibobo',1),(9,'Kota Lama',1),(10,'Nabarua',1),(11,'Sriwini',1),(12,'Bumi Raya',2),(13,'Gerbang Sadu',2),(14,'Kalisemen',2),(15,'Wadio',2),(16,'Waroki',2),(17,'Enarotali',3),(18,'Madii',3);
/*!40000 ALTER TABLE `desa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_pilihan`
--

DROP TABLE IF EXISTS `kategori_pilihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_pilihan` (
  `id_kategori_pilihan` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_pilihan` varchar(255) NOT NULL,
  `aktif_kategori_pilihan` int NOT NULL,
  PRIMARY KEY (`id_kategori_pilihan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_pilihan`
--

LOCK TABLES `kategori_pilihan` WRITE;
/*!40000 ALTER TABLE `kategori_pilihan` DISABLE KEYS */;
INSERT INTO `kategori_pilihan` VALUES (1,'Produk Terbaru',1),(2,'Produk Pilihan',1);
/*!40000 ALTER TABLE `kategori_pilihan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_produk`
--

DROP TABLE IF EXISTS `kategori_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_produk` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(128) NOT NULL,
  `aktif_kategori` int NOT NULL,
  `image_kategori` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_produk`
--

LOCK TABLES `kategori_produk` WRITE;
/*!40000 ALTER TABLE `kategori_produk` DISABLE KEYS */;
INSERT INTO `kategori_produk` VALUES (1,'Kemeja',1,'adb52532bc2332de1d2ade2c22611863.jpg'),(2,'Baju',1,'9b64256d4f3fe824ffd012fd0e86d182.png'),(3,'Sepatu',1,'produk8.png'),(4,'Noken',1,'noken4.jpg'),(5,'Topi',1,'topi2.jpg'),(7,'Perabot Rumah Tangga',1,'MsxRpV6MIC.jpg');
/*!40000 ALTER TABLE `kategori_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kecamatan` (
  `id_kecamatan` int NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(128) NOT NULL,
  `id_kota` int NOT NULL,
  PRIMARY KEY (`id_kecamatan`),
  KEY `kecamatan_FK_1` (`id_kota`),
  CONSTRAINT `kecamatan_FK_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` VALUES (1,'Nabire',1),(2,'Nabire Barat',1),(3,'Paniai',2);
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kota`
--

DROP TABLE IF EXISTS `kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kota` (
  `id_kota` int NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(128) NOT NULL,
  `id_provinsi` int NOT NULL,
  PRIMARY KEY (`id_kota`),
  KEY `kota_FK` (`id_provinsi`),
  CONSTRAINT `kota_FK` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kota`
--

LOCK TABLES `kota` WRITE;
/*!40000 ALTER TABLE `kota` DISABLE KEYS */;
INSERT INTO `kota` VALUES (1,'Nabire',1),(2,'Paniai',1);
/*!40000 ALTER TABLE `kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ongkir`
--

DROP TABLE IF EXISTS `ongkir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ongkir` (
  `id_ongkir` int NOT NULL AUTO_INCREMENT,
  `nama_kabupaten` varchar(128) NOT NULL,
  `biaya_ongkir` int NOT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ongkir`
--

LOCK TABLES `ongkir` WRITE;
/*!40000 ALTER TABLE `ongkir` DISABLE KEYS */;
INSERT INTO `ongkir` VALUES (1,'Nabire',50000),(2,'Dogiyai',100000),(3,'Deyai',150000),(4,'Paniai',200000);
/*!40000 ALTER TABLE `ongkir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(128) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `aktif_pelanggan` int NOT NULL,
  `image_pelanggan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `telepon_pelanggan` varchar(15) NOT NULL,
  `role_id` int NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (3,'Pelanggan 3','pelanggan3@gmail.com','$2y$10$HvgfW3WkPdECD6gD.FxR5uN4Fvx32KowTUaHBmhgW6J3kcbLvmWWm',1,'default.png','2022-02-02 20:23:22','2022-02-02 20:23:22','081212341234',3,'Jl. Ilaga'),(4,'Pelanggan 4','pelanggan4@gmail.com','$2y$10$TsABXIr4oLZ3yYHIxCQneeOEDXmI4vshOB53sIHhN9DgXad9JHPVq',1,'default.png','2022-02-02 20:25:28','2022-02-02 20:25:28','081243214321',3,'Jl. Pipit');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_pembelian` int NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `pembayaran_FK` (`id_pembelian`),
  CONSTRAINT `pembayaran_FK` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (13,73,'Gahenson Akap Tebay','Bank BRI',1000000,'2022-03-18','258499865_179088234438572_4557813340394526074_n.jpg','2022-03-18 09:38:17','2022-03-18 09:38:17'),(14,72,'Gahenson Akap Tebay','Bank BRI',1150000,'2022-03-18','250157621_166227442391318_8065957938940698116_n.jpg','2022-03-18 09:50:47','2022-03-18 09:50:47'),(15,68,'Gahenson Akap Tebay','Bank BRI',4800000,'2022-03-18','270966265_206374621709933_1970169638014812147_n.jpg','2022-03-18 09:52:38','2022-03-18 09:52:38'),(16,90,'Gahenson Akap Tebay','Bank Papua',1900000,'2022-04-30','278052649_508195037435260_5278877464513764600_n.jpg','2022-04-30 10:37:45','2022-04-30 10:37:45'),(17,91,'Gahenson Akap Tebay','Bank Mandiri',1900000,'2022-05-01','saya1.jpg','2022-05-01 03:07:00','2022-05-01 03:07:00'),(18,69,'Pelanggan 4','Mandiri',2200000,'2022-06-04','9b64256d4f3fe824ffd012fd0e86d182.png','2022-06-04 02:40:26','2022-06-04 02:40:26');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembelian` (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `total_pembelian` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_ongkir` int NOT NULL,
  `nama_kabupaten` varchar(128) NOT NULL,
  `tarif` int NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(100) DEFAULT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `pembelian_FK` (`id_pelanggan`),
  KEY `pembelian_FK_1` (`id_ongkir`),
  CONSTRAINT `pembelian_FK` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  CONSTRAINT `pembelian_FK_1` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` VALUES (67,3,'2022-02-08 00:00:00',600000,'2022-02-08 20:26:30','2022-02-08 20:26:30',1,'Nabire',50000,'Jl. Ilaga, Kel. Girimulyo','Pending',NULL,'Transfer Bank'),(68,3,'2022-02-08 00:00:00',4800000,'2022-02-08 20:28:09','2022-02-08 20:28:09',1,'Nabire',50000,'Jl. Ilaga, Kel. Girimulyo','Sudah kirim pembayaran',NULL,'Transfer Bank'),(69,4,'2022-02-08 00:00:00',2200000,'2022-02-08 20:29:58','2022-02-08 20:29:58',2,'Dogiyai',100000,'Jl. madii, Kel. Madii','Sudah kirim pembayaran',NULL,'Transfer Bank'),(70,3,'2022-02-09 00:00:00',4750000,'2022-02-09 08:26:56','2022-02-09 08:26:56',1,'Nabire',50000,'Jl. Ilaga, Kel. Girimulyo','Pending',NULL,'Transfer Bank'),(71,3,'2022-03-04 00:00:00',1450000,'2022-03-04 01:17:14','2022-03-04 01:17:14',1,'Nabire',50000,'Jl. kotabaru, belakang kantor bupati','Pending',NULL,'Transfer Bank'),(72,3,'2022-03-06 00:00:00',1150000,'2022-03-06 08:46:22','2022-03-06 08:46:22',1,'Nabire',50000,'Jl. Nabire','Barang Diterima','Resi123','Transfer Bank'),(73,3,'2022-03-14 00:00:00',1000000,'2022-03-14 20:01:34','2022-03-14 20:01:34',2,'Dogiyai',100000,'Jl. Dogiyai','Sudah kirim pembayaran',NULL,'Transfer Bank'),(90,3,'2022-04-30 00:00:00',1900000,'2022-04-30 08:38:00','2022-04-30 08:38:00',4,'Paniai',200000,'Paniai','Sudah kirim pembayaran',NULL,'Transfer Bank'),(91,3,'2022-05-01 00:00:00',1900000,'2022-05-01 03:04:44','2022-05-01 03:04:44',3,'Deyai',150000,'deyai','Barang Dikirim','Resi2345','Transfer Bank'),(92,3,'2022-06-02 00:00:00',9550000,'2022-06-02 12:42:23','2022-06-02 12:42:23',1,'Nabire',50000,'Kota Baru','Pending',NULL,'Transfer Bank'),(93,3,'2022-06-02 00:00:00',1550000,'2022-06-02 21:54:30','2022-06-02 21:54:30',1,'Nabire',50000,'Nabire','Pending',NULL,'COD');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian_produk`
--

DROP TABLE IF EXISTS `pembelian_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int NOT NULL AUTO_INCREMENT,
  `id_pembelian` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah_produk` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `berat` int NOT NULL,
  `subberat` int NOT NULL,
  `subharga` int NOT NULL,
  PRIMARY KEY (`id_pembelian_produk`),
  KEY `pembelian_produk_FK` (`id_pembelian`),
  KEY `pembelian_produk_FK_1` (`id_produk`),
  CONSTRAINT `pembelian_produk_FK` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
  CONSTRAINT `pembelian_produk_FK_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian_produk`
--

LOCK TABLES `pembelian_produk` WRITE;
/*!40000 ALTER TABLE `pembelian_produk` DISABLE KEYS */;
INSERT INTO `pembelian_produk` VALUES (37,67,1,2,'Jaket Keluarga',200000,2,4,400000),(38,67,5,1,'Kemeja Lp',150000,2,2,150000),(39,68,12,3,'Kaos Bintang',1500000,4,12,4500000),(40,68,9,1,'Kaos Cdr',250000,3,3,250000),(41,69,11,1,'Kaos Rasta',300000,3,3,300000),(42,69,13,3,'Kaos Bintang 2',600000,3,9,1800000),(43,70,1,1,'Jaket Keluarga',200000,2,2,200000),(44,70,12,3,'Kaos Bintang',1500000,4,12,4500000),(45,71,1,1,'Jaket Keluarga',200000,2,2,200000),(46,71,2,3,'Kemeja Cdr',300000,1,3,900000),(47,71,5,2,'Kemeja Lp',150000,2,4,300000),(48,72,1,1,'Jaket Keluarga',200000,2,2,200000),(49,72,2,3,'Kemeja Cdr',300000,1,3,900000),(50,73,1,3,'Jaket Keluarga',200000,2,6,600000),(51,73,2,1,'Kemeja Cdr',300000,1,1,300000),(76,90,13,2,'Nike Four',600000,3,6,1200000),(77,90,9,2,'Kaos Cdr',250000,3,6,500000),(78,91,9,5,'Kaos Cdr',250000,3,15,1250000),(79,91,10,1,'Nike One',500000,3,3,500000),(80,92,1,31,'Jaket Keluarga',200000,2,62,6200000),(81,92,5,22,'Kemeja Lp',150000,2,44,3300000),(82,93,12,1,'Nike Three',1500000,4,4,1500000);
/*!40000 ALTER TABLE `pembelian_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(128) NOT NULL,
  `harga_produk` int NOT NULL,
  `berat_produk` int NOT NULL,
  `image_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `aktif_produk` int NOT NULL,
  `stok_produk` int NOT NULL,
  `id_satuan` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `id_sub_kategori` int DEFAULT NULL,
  `id_kategori_pilihan` int DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `produk_FK` (`id_satuan`),
  KEY `produk_FK_1` (`id_kategori`),
  KEY `produk_FK_2` (`id_sub_kategori`),
  KEY `produk_FK_3` (`id_kategori_pilihan`),
  CONSTRAINT `produk_FK` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`),
  CONSTRAINT `produk_FK_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori`),
  CONSTRAINT `produk_FK_2` FOREIGN KEY (`id_sub_kategori`) REFERENCES `sub_kategori` (`id_sub_kategori`),
  CONSTRAINT `produk_FK_3` FOREIGN KEY (`id_kategori_pilihan`) REFERENCES `kategori_pilihan` (`id_kategori_pilihan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` VALUES (1,'Jaket Keluarga',200000,2,'produk2.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-01-26 20:36:13','2022-03-20 06:44:37',1,469,1,1,2,2),(2,'Kemeja Cdr',300000,1,'produk1.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-01-26 20:36:13','2022-03-20 06:44:53',1,1000,1,1,1,2),(5,'Kemeja Lp',150000,2,'produk3.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-01-26 22:48:40','2022-03-20 06:45:09',1,178,1,1,2,2),(9,'Kaos Cdr',250000,3,'produk5.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-02-02 01:58:27','2022-03-20 06:45:22',1,293,1,2,3,NULL),(10,'Nike One',500000,3,'produk7.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-02-02 06:59:27','2022-02-08 19:41:03',1,4,2,3,6,1),(11,'Nike Two',300000,3,'produk4.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-02-02 07:00:27','2022-02-08 19:42:13',1,4,2,3,6,1),(12,'Nike Three',1500000,4,'produk6.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-02-02 07:01:28','2022-02-08 19:42:47',1,1,2,3,6,1),(13,'Nike Four',600000,3,'produk8.png','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quos quod repellat saepe sunt fugit dolor itaque deserunt. Doloremque porro voluptate quo voluptatem necessitatibus asperiores laudantium nihil beatae alias debitis!','2022-02-03 09:23:36','2022-02-08 19:43:38',1,3,2,3,6,NULL),(17,'Kaos Terbaik',80000,500,'9b64256d4f3fe824ffd012fd0e86d182.png','Good','2022-06-03 02:11:58','2022-06-03 05:41:40',1,100,3,2,4,1);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinsi`
--

DROP TABLE IF EXISTS `provinsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provinsi` (
  `id_provinsi` int NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinsi`
--

LOCK TABLES `provinsi` WRITE;
/*!40000 ALTER TABLE `provinsi` DISABLE KEYS */;
INSERT INTO `provinsi` VALUES (1,'Papua'),(2,'Papua Barat');
/*!40000 ALTER TABLE `provinsi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `satuan` (
  `id_satuan` int NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan`
--

LOCK TABLES `satuan` WRITE;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` VALUES (1,'pcs'),(2,'lembar'),(3,'buah');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_kategori`
--

DROP TABLE IF EXISTS `sub_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_sub_kategori` varchar(100) NOT NULL,
  `id_kategori` int DEFAULT NULL,
  `aktif_sub_kategori` int NOT NULL,
  PRIMARY KEY (`id_sub_kategori`),
  KEY `sub_kategori_FK` (`id_kategori`),
  CONSTRAINT `sub_kategori_FK` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_kategori`
--

LOCK TABLES `sub_kategori` WRITE;
/*!40000 ALTER TABLE `sub_kategori` DISABLE KEYS */;
INSERT INTO `sub_kategori` VALUES (1,'Lengan pendek',1,1),(2,'Lengan panjang',1,1),(3,'Kaos oblong',2,1),(4,'Kaos polos',2,1),(5,'Kaos segitga',2,1),(6,'Nike',3,1),(7,'Kulit pohon',4,1),(8,'Cendrawasih',1,1),(9,'Batik',1,1),(10,'Coupple',2,1),(11,'Adat',2,1);
/*!40000 ALTER TABLE `sub_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'Administrator'),(2,'Admin'),(3,'Pelanggan');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ganeida-toko'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-07 17:30:32
