/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - uks
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uks` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `uks`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`password`,`username`) values 
(1,'$2a$10$BS8iSfdS.V8oruLqdRg3xeeIPlWJeWJqHgivIyrCMFEvAsBDAb6LG','smpn1_smg@gmail.com');

/*Table structure for table `daftar_obat` */

DROP TABLE IF EXISTS `daftar_obat`;

CREATE TABLE `daftar_obat` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `dosis` varchar(255) DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `daftar_obat` */

insert  into `daftar_obat`(`id`,`create_date`,`update_date`,`dosis`,`expired`,`nama_obat`) values 
(1,'2023-04-11 15:40:10','2023-04-11 15:40:10','100','2023-04-11 07:00:00','Panadol');

/*Table structure for table `diagnosa_penyakit` */

DROP TABLE IF EXISTS `diagnosa_penyakit`;

CREATE TABLE `diagnosa_penyakit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `diagnosa_penyakit` */

insert  into `diagnosa_penyakit`(`id`,`create_date`,`update_date`,`name`) values 
(1,'2023-04-11 15:39:27','2023-04-11 15:39:37','Pusing');

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_guru` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `guru` */

insert  into `guru`(`id`,`alamat`,`nama_guru`,`tanggal_lahir`,`tempat_lahir`,`total_periksa`) values 
(1,'Mangkang','Dwi Sasmita','1986-04-06 07:00:00','Semarang',1),
(3,'Mijen','Dwi Arianto','1987-02-02 09:57:00','Magelang',0);

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id`,`alamat`,`nama_karyawan`,`tanggal_lahir`,`tempat_lahir`,`total_periksa`) values 
(1,'Tugurejo','Ridho Roma','2023-04-11 07:00:00','Semarang',0),
(2,'Tegal','Surtiono','2023-02-02 07:00:00','Semarang',0);

/*Table structure for table `keteragan_pasien` */

DROP TABLE IF EXISTS `keteragan_pasien`;

CREATE TABLE `keteragan_pasien` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keteragan_pasien` */

insert  into `keteragan_pasien`(`id`,`create_date`,`update_date`,`name`) values 
(1,'2023-04-11 15:39:57','2023-04-11 15:39:57','Di Istirahatkan');

/*Table structure for table `pasien_status` */

DROP TABLE IF EXISTS `pasien_status`;

CREATE TABLE `pasien_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pasien_status` */

insert  into `pasien_status`(`id`,`create_date`,`update_date`,`name`) values 
(1,'2023-04-11 15:42:38','2023-04-11 15:42:38','Guru'),
(2,'2023-04-11 15:42:38','2023-04-11 15:42:38','Siswa'),
(3,'2023-04-11 15:42:38','2023-04-11 15:42:38','Karyawan');

/*Table structure for table `penanganan_periksa` */

DROP TABLE IF EXISTS `penanganan_periksa`;

CREATE TABLE `penanganan_periksa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catatan` varchar(255) DEFAULT NULL,
  `diagnosa_penyakit_id` bigint(20) DEFAULT NULL,
  `keterangan_pasien_id` bigint(20) DEFAULT NULL,
  `penanganan_pertama_id` bigint(20) DEFAULT NULL,
  `periksa_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK2k8dghilwkkc0j9pa2kwgbdxx` (`diagnosa_penyakit_id`),
  KEY `FK1t5wmmw5ljdxmr7me915pqr01` (`keterangan_pasien_id`),
  KEY `FK32mt44a65dkhlh6pxty5awrh2` (`penanganan_pertama_id`),
  KEY `FKhodf9h6bb8ltbkru05ot05kb0` (`periksa_id`),
  CONSTRAINT `FK1t5wmmw5ljdxmr7me915pqr01` FOREIGN KEY (`keterangan_pasien_id`) REFERENCES `keteragan_pasien` (`id`),
  CONSTRAINT `FK2k8dghilwkkc0j9pa2kwgbdxx` FOREIGN KEY (`diagnosa_penyakit_id`) REFERENCES `diagnosa_penyakit` (`id`),
  CONSTRAINT `FK32mt44a65dkhlh6pxty5awrh2` FOREIGN KEY (`penanganan_pertama_id`) REFERENCES `penanganan_pertama` (`id`),
  CONSTRAINT `FKhodf9h6bb8ltbkru05ot05kb0` FOREIGN KEY (`periksa_id`) REFERENCES `periksa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `penanganan_periksa` */

insert  into `penanganan_periksa`(`id`,`catatan`,`diagnosa_penyakit_id`,`keterangan_pasien_id`,`penanganan_pertama_id`,`periksa_id`) values 
(1,'Awokwok',1,1,1,1);

/*Table structure for table `penanganan_pertama` */

DROP TABLE IF EXISTS `penanganan_pertama`;

CREATE TABLE `penanganan_pertama` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `nama_penanganan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `penanganan_pertama` */

insert  into `penanganan_pertama`(`id`,`create_date`,`update_date`,`nama_penanganan`) values 
(1,'2023-04-11 15:39:46','2023-04-11 15:39:46','Di Perban');

/*Table structure for table `periksa` */

DROP TABLE IF EXISTS `periksa`;

CREATE TABLE `periksa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `daftar_penanganan` longtext DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `keluhan` longtext DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `guru_id` bigint(20) DEFAULT NULL,
  `karyawan_id` bigint(20) DEFAULT NULL,
  `keterangan_pasien_id` bigint(20) DEFAULT NULL,
  `pasien_status_id` int(11) DEFAULT NULL,
  `siswa_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK8hrcq33h7p66gri512oqd3wa2` (`guru_id`),
  KEY `FKg2i0oe51i65ahdj5n0oisaqn0` (`karyawan_id`),
  KEY `FK8draj8pinaijavtb6k4umjyoq` (`keterangan_pasien_id`),
  KEY `FKgr9hwaq6pbnt0taj7xmiay0sv` (`pasien_status_id`),
  KEY `FK47quael7ajgnjndxqajkdqsja` (`siswa_id`),
  CONSTRAINT `FK47quael7ajgnjndxqajkdqsja` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`),
  CONSTRAINT `FK8draj8pinaijavtb6k4umjyoq` FOREIGN KEY (`keterangan_pasien_id`) REFERENCES `keteragan_pasien` (`id`),
  CONSTRAINT `FK8hrcq33h7p66gri512oqd3wa2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  CONSTRAINT `FKg2i0oe51i65ahdj5n0oisaqn0` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`),
  CONSTRAINT `FKgr9hwaq6pbnt0taj7xmiay0sv` FOREIGN KEY (`pasien_status_id`) REFERENCES `pasien_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `periksa` */

insert  into `periksa`(`id`,`create_date`,`update_date`,`daftar_penanganan`,`status`,`keluhan`,`nama_pasien`,`guru_id`,`karyawan_id`,`keterangan_pasien_id`,`pasien_status_id`,`siswa_id`) values 
(1,'2023-04-11 15:42:58','2023-04-11 15:43:29',NULL,'','Pusing','Rizqi Ramandika',NULL,NULL,NULL,2,1),
(2,'2023-04-11 15:43:46','2023-04-11 15:43:46',NULL,'\0','Pusing','Dwi Sasmita',1,NULL,NULL,1,NULL);

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

insert  into `siswa`(`id`,`alamat`,`kelas`,`nama_siswa`,`tanggal_lahir`,`tempat_lahir`,`total_periksa`) values 
(1,'Mangkang','VII A','Rizqi Ramandika','2003-11-08 07:00:00','Semarang',1),
(3,'Bringin','VII A','Orlynz','2004-02-02 10:22:59','Semarang',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
