/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.5-10.1.28-MariaDB : Database - inventaris
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventaris` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventaris`;

/*Table structure for table `tab_cabang` */

DROP TABLE IF EXISTS `tab_cabang`;

CREATE TABLE `tab_cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat_cabang` longtext NOT NULL,
  `phone_cabang` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tab_cabang` */

insert  into `tab_cabang`(`id_cabang`,`nama_cabang`,`alamat_cabang`,`phone_cabang`) values (1,'TANGERANG','TANGERANG BARAT 321','085896587412'),(2,'SUKABUMI','Jl A. YANI NO 26 SUKABUM','0266012332'),(5,'PUSAT','Jln Jalan','0210454545');

/*Table structure for table `tab_inventaris` */

DROP TABLE IF EXISTS `tab_inventaris`;

CREATE TABLE `tab_inventaris` (
  `id_inventaris` varchar(20) NOT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `user_pusat` varchar(20) DEFAULT NULL,
  `tgl_request` varchar(10) DEFAULT NULL,
  `tgl_request_acc` varchar(10) DEFAULT NULL,
  `tgl_beli` varchar(10) DEFAULT NULL,
  `tgl_terima` varchar(10) DEFAULT NULL,
  `tgl_pengembalian` varchar(10) DEFAULT NULL,
  `tgl_pengembalian_acc` varchar(10) DEFAULT NULL,
  `tgl_pengembalian_diterima` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `harga_penyusutan` varchar(10) DEFAULT NULL,
  `stts` enum('REQUEST','REQUEST ACC','REQUEST DITERIMA CABANG','REQUEST PENGEMBALIAN','PENGEMBALIAN ACC','PENGEMBALIAN DITERIMA PUSAT') DEFAULT NULL,
  `jumlah` varchar(20) DEFAULT NULL,
  `keterangan` longtext,
  PRIMARY KEY (`id_inventaris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tab_inventaris` */

insert  into `tab_inventaris`(`id_inventaris`,`id_cabang`,`nik`,`user_pusat`,`tgl_request`,`tgl_request_acc`,`tgl_beli`,`tgl_terima`,`tgl_pengembalian`,`tgl_pengembalian_acc`,`tgl_pengembalian_diterima`,`nama_barang`,`harga`,`harga_penyusutan`,`stts`,`jumlah`,`keterangan`) values ('INV20180930072448',5,'42','42','30-09-2018','30-09-2018','30-09-2018','30-09-2018','','','','CPU ','6100000','6000','REQUEST DITERIMA CABANG','1','Untuk Pemasangan di Office'),('INV20180930073429',2,'51','42','30-09-2018','30-09-2018','30-09-2018','30-09-2018','19-11-2018','','','MOTOR ','15000000','50000','REQUEST PENGEMBALIAN','1','Keterangan Request : Untuk Operasional Sales <br /> Keterangan Pengembalian : Rusak');

/*Table structure for table `tab_karyawan` */

DROP TABLE IF EXISTS `tab_karyawan`;

CREATE TABLE `tab_karyawan` (
  `nik` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  `alamat` longtext NOT NULL,
  `jk` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `cabang` varchar(50) DEFAULT NULL,
  `tem_lah` varchar(30) DEFAULT NULL,
  `tgl_lah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `tab_karyawan` */

insert  into `tab_karyawan`(`nik`,`nama`,`alamat`,`jk`,`phone`,`cabang`,`tem_lah`,`tgl_lah`) values (43,'Priyatna Prawiranegara ','Kosong','Laki-Laki','0909090909','5','fsdjhfj','06-12-2016'),(42,'cece','Sukabumi','LAKI-LAKI','057987987','5','Sukabumi','22-04-1989'),(44,'Hendri Eko Satrio ','ffgfhfgfhgfhgfhg','Laki-Laki','085218145242','2','ghgh','05-12-2016'),(45,'Fajar Nugraha ','jhkjhj','Laki-Laki','082125327175','2','jhkjhj','20-12-2016'),(46,'Charli Darulani M.Kom','kjhghgh','Laki-Laki','081563369956','2','ggggg','21-12-2016'),(47,'Ir Yuli Noviawan MT','kkjhkjhkj','Perempuan','08156308295','1','hkjhkj','28-12-2016'),(48,'ISKA AGUSTIN','jhjhjh','Perempuan','085861866612','1','hhhhh','28-12-2016'),(49,'Erwan Herdiyanto ST','hhhhhhhhhh','Laki-Laki','085798807161','1','bhbhbh','21-12-2016'),(50,'FARIDA TRISTIANTI','hhhhhh','Perempuan','08156309075','1','ggggg','13-12-2016'),(51,'DEDE NURHAYATI','hhhhh','Perempuan','087784400441','2','hhhhhh','19-12-2016'),(52,'GIlang Ramadan Fajri','jjhkjhkj','Laki-Laki','082233187093','1','ytyutytuy','06-12-2016'),(53,'Hj Nani Pujiastuti SE MM','jjhjhkjhjhkj','Perempuan','085624553822','1','jhkjhj','13-12-2016'),(54,'TEST','ghgjgjhg','LAKI-LAKI','234323','5','hggj','13-11-2018');

/*Table structure for table `tab_login` */

DROP TABLE IF EXISTS `tab_login`;

CREATE TABLE `tab_login` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_key` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `level` enum('MANAGER','SEKERTARIS','SEKERTARIS PUSAT') COLLATE latin1_general_ci DEFAULT NULL,
  `nik` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `photo` longtext COLLATE latin1_general_ci,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tab_login` */

insert  into `tab_login`(`user_id`,`user_name`,`user_key`,`level`,`nik`,`photo`) values (18,'admin','admin','SEKERTARIS PUSAT','42','edbebd22c9b0b137b7e9d2bb42442194.jpg'),(19,'sekertaris','sekertaris','SEKERTARIS','44','8374cc198b3ee6fd97902858c1e5ddc5.jpg'),(20,'manager','manager','MANAGER','43','9750241596f802989a9982a8334c061c.jpg'),(22,'dede','dede','SEKERTARIS','51','ab932b0996d28929ec969f755dbe5914.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
