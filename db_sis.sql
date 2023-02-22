/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_wo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_wo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_wo`;

/*Table structure for table `foto` */

DROP TABLE IF EXISTS `foto`;

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `foto` */

insert  into `foto`(`id_foto`,`foto1`,`foto2`,`foto3`,`foto4`,`date_created`) values 
(1,'1668140193197.jpg','1668150950359.jpg','1668150966234.jpg','kelasss 4','2022-11-10 07:58:40');

/*Table structure for table `menu_paket` */

DROP TABLE IF EXISTS `menu_paket`;

CREATE TABLE `menu_paket` (
  `id_menu_paket` int(10) NOT NULL AUTO_INCREMENT,
  `paket1` varchar(255) NOT NULL,
  `paket2` varchar(255) NOT NULL,
  `paket3` varchar(255) NOT NULL,
  `paket4` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_menu_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `menu_paket` */

insert  into `menu_paket`(`id_menu_paket`,`paket1`,`paket2`,`paket3`,`paket4`,`date_created`) values 
(2,'masa<br>sama<br>bin<br>usla','Klinik Sehat Setia Brebes Mempunyai Tiga Spesialis yang ditangani. 1. Dokter Umum 2. Dokter Gigi 3. Dokter Tulang (Fisioterapi).','Menjadi pusat pelayan kesehatan terkemuka di Brebes dengan pelayanan yang prima dan profesional.','1. Meningkatkan derajat kesehatan masyarkat di wilayah Brebes dan sekitar. <br>2. Melakukan Pelayanan Kesehatan sesuai dengan Standar. 3. Memiliki Sumber daya manusia yang profesional dengan mengembngkan kompetensi.','2018-07-15 09:43:41');

/*Table structure for table `tabel_admin` */

DROP TABLE IF EXISTS `tabel_admin`;

CREATE TABLE `tabel_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesanan` varchar(20) DEFAULT NULL,
  `id_pembayaran` varchar(20) DEFAULT NULL,
  `id_paket_wedding` varchar(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `no_telp_pemesan` varchar(20) DEFAULT NULL,
  `email_pemesan` varchar(100) DEFAULT NULL,
  `alamat_pemesan` varchar(255) DEFAULT NULL,
  `judul_pw` varchar(100) DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `tanggal_bayar_dp` date DEFAULT NULL,
  `harga_pw` varchar(50) DEFAULT NULL,
  `dp_pw` varchar(100) DEFAULT NULL,
  `pelunasan_pw` varchar(100) DEFAULT NULL,
  `bayar_dp` varchar(100) DEFAULT NULL,
  `bayar_pelunasan` varchar(100) DEFAULT NULL,
  `no_invoice_dp` varchar(255) DEFAULT NULL,
  `nama_bank_dp` varchar(50) DEFAULT NULL,
  `bukti_pembayaran_dp` varchar(250) DEFAULT NULL,
  `tanggal_bayar_pelunasan` date DEFAULT NULL,
  `nama_bank_pelunasan` varchar(100) DEFAULT NULL,
  `no_invoice_pelunasan` varchar(100) DEFAULT NULL,
  `bukti_pembayaran_pelunasan` varchar(100) DEFAULT NULL,
  `status_pembayaran_dp` int(11) DEFAULT 0,
  `status_pembayaran_pelunasan` int(11) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mdate` datetime NOT NULL,
  `ddate` datetime NOT NULL,
  `c_by` varchar(50) NOT NULL,
  `m_by` varchar(50) NOT NULL,
  `d_by` varchar(50) NOT NULL,
  `del_flag` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tabel_admin` */

insert  into `tabel_admin`(`id_admin`,`id_pesanan`,`id_pembayaran`,`id_paket_wedding`,`nama`,`username`,`password`,`no_telp`,`email`,`jenis_kelamin`,`alamat`,`nama_pemesan`,`no_telp_pemesan`,`email_pemesan`,`alamat_pemesan`,`judul_pw`,`tanggal_pesanan`,`tanggal_acara`,`tanggal_bayar_dp`,`harga_pw`,`dp_pw`,`pelunasan_pw`,`bayar_dp`,`bayar_pelunasan`,`no_invoice_dp`,`nama_bank_dp`,`bukti_pembayaran_dp`,`tanggal_bayar_pelunasan`,`nama_bank_pelunasan`,`no_invoice_pelunasan`,`bukti_pembayaran_pelunasan`,`status_pembayaran_dp`,`status_pembayaran_pelunasan`,`timestamp`,`mdate`,`ddate`,`c_by`,`m_by`,`d_by`,`del_flag`,`last_login`,`level`) values 
(1,NULL,NULL,NULL,'admin','admin','202cb962ac59075b964b07152d234b70','09889928823','admin@gmail.com','laki-laki','Semarang',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2023-02-21 11:13:57','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2023-02-21 11:13:57',1),
(2,NULL,NULL,NULL,'konsumen wom','konsumen','202cb962ac59075b964b07152d234b70','0988992883','rizki.rizaludin@gmail.com','laki-laki','semaranggg','hapid','0999999956','widi@gmail.com','pbg','Paket 1','2022-11-10','2022-11-18','2022-11-07','100000000','20000','5000','5000','15000','1112','mandiri','1667789225734.PNG','2022-11-07','BCA','090290019','1667793843911.jpg',2,2,'2023-02-20 18:14:08','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2023-02-20 18:14:08',2),
(3,NULL,NULL,NULL,'finance','finance','202cb962ac59075b964b07152d234b70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2022-11-20 18:24:54','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-20 18:24:54',3),
(6,NULL,NULL,NULL,' zaky ','fer','202cb962ac59075b964b07152d234b70','085786652577','geo@gmail.com','laki-laki','jl. Sekaran no 41 semarang','ada','123123123','ada@ada.ada','ada','Paket 1','2023-02-17','2023-02-24','2022-11-29','100000000','20000','5000','20000','15000','12568989','bca','1676617568793.png','2022-11-24','BCA','334566','1667914969690.jpg',1,2,'2023-02-17 14:06:22','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2023-02-17 14:06:22',2),
(7,NULL,NULL,NULL,'petugas','petugas','202cb962ac59075b964b07152d234b70','0300399403','petugas@gmail.com','laki-laku','semarang',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2022-11-09 15:33:53','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'0000-00-00 00:00:00',2),
(11,NULL,NULL,NULL,'fifi listiana','fifi','202cb962ac59075b964b07152d234b70','09889928823','fifi@gmail.com','perempuan','Semarang','Udin','089399308391','udin@gmail.com','tegal','Paket 1','2022-11-17','2022-11-24','2022-11-17','100000000','20000','5000','20000',NULL,'invdp568990','BTN','1668672060880.jpg',NULL,NULL,NULL,NULL,1,0,'2022-11-17 15:01:00','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-17 10:10:00',2),
(12,NULL,NULL,NULL,'ada','ada','202cb962ac59075b964b07152d234b70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2023-02-21 14:29:15','2023-02-20 11:26:01','2023-02-20 11:26:01','','','',1,'2023-02-21 14:29:15',5),
(13,NULL,NULL,NULL,'da','da','202cb962ac59075b964b07152d234b70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2023-02-21 11:01:28','2023-02-20 11:26:01','2023-02-20 11:26:01','','','',1,'2023-02-21 11:01:28',4),
(14,NULL,NULL,NULL,'ni','ni','202cb962ac59075b964b07152d234b70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2023-02-20 18:01:40','2023-02-20 11:26:01','2023-02-20 11:26:01','','','',1,'2023-02-20 18:01:40',6),
(16,NULL,NULL,NULL,'tu','tu','202cb962ac59075b964b07152d234b70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2023-02-20 18:01:50','2023-02-20 11:26:01','2023-02-20 11:26:01','','','',1,'2023-02-20 18:01:50',7);

/*Table structure for table `tabel_paket_wedding` */

DROP TABLE IF EXISTS `tabel_paket_wedding`;

CREATE TABLE `tabel_paket_wedding` (
  `id_paket_wedding` int(11) NOT NULL AUTO_INCREMENT,
  `judul_pw` varchar(100) DEFAULT NULL,
  `gambar_pw` varchar(255) DEFAULT NULL,
  `harga_pw` varchar(20) DEFAULT NULL,
  `dp_pw` varchar(50) DEFAULT NULL,
  `pelunasan_pw` varchar(50) DEFAULT NULL,
  `deskripsi_pw` varchar(255) DEFAULT NULL,
  `decoration_pw` varchar(100) DEFAULT NULL,
  `makeup_artist_pw` varchar(100) DEFAULT NULL,
  `documentation_pw` varchar(100) DEFAULT NULL,
  `catering_pw` varchar(100) DEFAULT NULL,
  `entertainment_pw` varchar(100) DEFAULT NULL,
  `efek_flashmob_pw` varchar(100) DEFAULT NULL,
  `exclusive_pw` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `del_flag` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_paket_wedding`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_paket_wedding` */

insert  into `tabel_paket_wedding`(`id_paket_wedding`,`judul_pw`,`gambar_pw`,`harga_pw`,`dp_pw`,`pelunasan_pw`,`deskripsi_pw`,`decoration_pw`,`makeup_artist_pw`,`documentation_pw`,`catering_pw`,`entertainment_pw`,`efek_flashmob_pw`,`exclusive_pw`,`timestamp`,`del_flag`) values 
(3,'Paket terbang',NULL,'20000','5000','15000','Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusifeeee','2023-02-20 09:46:13',1),
(8,'paketan','1667309643180.png','10000','2000','8000','deskripsi meras','dekor','makeuo','dokumentasi','cater','entertaint','fllas','givee','2022-11-02 21:03:07',1),
(9,'Paket 1','1667914522357.jpg','100000000','20000','5000','Deskripsi','dekorasi','2','dokumentasi','4','entertainment','efek','ekslusife','2022-11-08 20:35:22',1);

/*Table structure for table `tabel_pembayaran_dp` */

DROP TABLE IF EXISTS `tabel_pembayaran_dp`;

CREATE TABLE `tabel_pembayaran_dp` (
  `id_pembayaran_dp` int(10) NOT NULL AUTO_INCREMENT,
  `id_admin` varchar(20) DEFAULT NULL,
  `id_pesanan` varchar(20) DEFAULT NULL,
  `id_paket_wedding` varchar(20) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `no_telp_pemesan` varchar(20) DEFAULT NULL,
  `email_pemesan` varchar(100) DEFAULT NULL,
  `alamat_pemesan` varchar(255) DEFAULT NULL,
  `judul_pw` varchar(100) DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `tanggal_bayar_dp` date DEFAULT NULL,
  `harga_pw` varchar(50) DEFAULT NULL,
  `dp_pw` varchar(100) DEFAULT NULL,
  `pelunasan_pw` varchar(100) DEFAULT NULL,
  `bayar_dp` varchar(100) DEFAULT NULL,
  `bayar_pelunasan` varchar(100) DEFAULT NULL,
  `no_invoice_dp` varchar(255) DEFAULT NULL,
  `nama_bank_dp` varchar(50) DEFAULT NULL,
  `bukti_pembayaran_dp` varchar(250) DEFAULT NULL,
  `tanggal_bayar_pelunasan` date DEFAULT NULL,
  `nama_bank_pelunasan` varchar(100) DEFAULT NULL,
  `no_invoice_pelunasan` varchar(100) DEFAULT NULL,
  `bukti_pembayaran_pelunasan` varchar(100) DEFAULT NULL,
  `status_pembayaran_dp` int(1) DEFAULT 0,
  `status_pembayaran_pelunasan` int(1) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mdate` datetime NOT NULL,
  `ddate` datetime NOT NULL,
  `c_by` varchar(50) NOT NULL,
  `m_by` varchar(50) NOT NULL,
  `d_by` varchar(50) NOT NULL,
  `del_flag` int(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id_pembayaran_dp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tabel_pembayaran_dp` */

insert  into `tabel_pembayaran_dp`(`id_pembayaran_dp`,`id_admin`,`id_pesanan`,`id_paket_wedding`,`nama_pemesan`,`no_telp_pemesan`,`email_pemesan`,`alamat_pemesan`,`judul_pw`,`tanggal_pesanan`,`tanggal_acara`,`tanggal_bayar_dp`,`harga_pw`,`dp_pw`,`pelunasan_pw`,`bayar_dp`,`bayar_pelunasan`,`no_invoice_dp`,`nama_bank_dp`,`bukti_pembayaran_dp`,`tanggal_bayar_pelunasan`,`nama_bank_pelunasan`,`no_invoice_pelunasan`,`bukti_pembayaran_pelunasan`,`status_pembayaran_dp`,`status_pembayaran_pelunasan`,`timestamp`,`mdate`,`ddate`,`c_by`,`m_by`,`d_by`,`del_flag`,`last_login`,`level`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2022-11-09 16:07:49','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-09 15:32:45',1),
(2,NULL,NULL,NULL,'gudang garam','0999999956','ririri@gmail.com','pbg','Paket terbang','2022-11-06','2022-11-18','2022-11-07','20000','5000','15000','5000','15000','1112','mandiri','1667789225734.PNG','2022-11-07','BCA','090290019','1667793843911.jpg',2,2,'2022-11-08 11:38:57','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-08 11:38:57',2),
(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2022-11-09 16:06:56','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-09 16:06:56',3),
(6,NULL,NULL,NULL,'RIriri','0999999956','ririri@gmail.com','bangun galih tegal','Paket terbang','2022-11-08','2022-11-10','2022-11-29','20000','5000','15000','5000','15000','12568989','bca','1667914902883.jpg','2022-11-24','BCA','334566','1667914969690.jpg',2,2,'2022-11-08 20:46:24','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-08 20:38:24',2),
(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2022-11-09 15:33:53','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'0000-00-00 00:00:00',2),
(11,'2',NULL,NULL,'hapid','0999999956','widi@gmail.com','pbg','Paket 1','2022-11-10','2022-11-18',NULL,'100000000','20000','5000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2022-11-10 09:44:02','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',0,'0000-00-00 00:00:00',0),
(12,'11',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-17',NULL,NULL,NULL,'20000',NULL,'invdp568990','BTN','1668672060880.jpg',NULL,NULL,NULL,NULL,1,0,'2022-11-17 15:01:00','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',0,'0000-00-00 00:00:00',2);

/*Table structure for table `tabel_pembayaran_pelunasan` */

DROP TABLE IF EXISTS `tabel_pembayaran_pelunasan`;

CREATE TABLE `tabel_pembayaran_pelunasan` (
  `id_pembayaran_pelunasan` int(10) NOT NULL AUTO_INCREMENT,
  `id_admin` varchar(20) DEFAULT NULL,
  `id_pesanan` varchar(20) DEFAULT NULL,
  `id_paket_wedding` varchar(20) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `no_telp_pemesan` varchar(20) DEFAULT NULL,
  `email_pemesan` varchar(100) DEFAULT NULL,
  `alamat_pemesan` varchar(255) DEFAULT NULL,
  `judul_pw` varchar(100) DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `tanggal_bayar_dp` date DEFAULT NULL,
  `harga_pw` varchar(50) DEFAULT NULL,
  `dp_pw` varchar(100) DEFAULT NULL,
  `pelunasan_pw` varchar(100) DEFAULT NULL,
  `bayar_dp` varchar(100) DEFAULT NULL,
  `bayar_pelunasan` varchar(100) DEFAULT NULL,
  `no_invoice_dp` varchar(255) DEFAULT NULL,
  `nama_bank_dp` varchar(50) DEFAULT NULL,
  `bukti_pembayaran_dp` varchar(250) DEFAULT NULL,
  `tanggal_bayar_pelunasan` date DEFAULT NULL,
  `nama_bank_pelunasan` varchar(100) DEFAULT NULL,
  `no_invoice_pelunasan` varchar(100) DEFAULT NULL,
  `bukti_pembayaran_pelunasan` varchar(100) DEFAULT NULL,
  `status_pembayaran_dp` int(1) DEFAULT 0,
  `status_pembayaran_pelunasan` int(1) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mdate` datetime NOT NULL,
  `ddate` datetime NOT NULL,
  `c_by` varchar(50) NOT NULL,
  `m_by` varchar(50) NOT NULL,
  `d_by` varchar(50) NOT NULL,
  `del_flag` int(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id_pembayaran_pelunasan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tabel_pembayaran_pelunasan` */

insert  into `tabel_pembayaran_pelunasan`(`id_pembayaran_pelunasan`,`id_admin`,`id_pesanan`,`id_paket_wedding`,`nama_pemesan`,`no_telp_pemesan`,`email_pemesan`,`alamat_pemesan`,`judul_pw`,`tanggal_pesanan`,`tanggal_acara`,`tanggal_bayar_dp`,`harga_pw`,`dp_pw`,`pelunasan_pw`,`bayar_dp`,`bayar_pelunasan`,`no_invoice_dp`,`nama_bank_dp`,`bukti_pembayaran_dp`,`tanggal_bayar_pelunasan`,`nama_bank_pelunasan`,`no_invoice_pelunasan`,`bukti_pembayaran_pelunasan`,`status_pembayaran_dp`,`status_pembayaran_pelunasan`,`timestamp`,`mdate`,`ddate`,`c_by`,`m_by`,`d_by`,`del_flag`,`last_login`,`level`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2022-11-09 16:07:49','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-09 15:32:45',1),
(2,NULL,NULL,NULL,'gudang garam','0999999956','ririri@gmail.com','pbg','Paket terbang','2022-11-06','2022-11-18','2022-11-07','20000','5000','15000','5000','15000','1112','mandiri','1667789225734.PNG','2022-11-07','BCA','090290019','1667793843911.jpg',2,2,'2022-11-08 11:38:57','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-08 11:38:57',2),
(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2022-11-09 16:06:56','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-09 16:06:56',3),
(6,NULL,NULL,NULL,'RIriri','0999999956','ririri@gmail.com','bangun galih tegal','Paket terbang','2022-11-08','2022-11-10','2022-11-29','20000','5000','15000','5000','15000','12568989','bca','1667914902883.jpg','2022-11-24','BCA','334566','1667914969690.jpg',2,2,'2022-11-08 20:46:24','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'2022-11-08 20:38:24',2),
(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2022-11-09 15:33:53','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',1,'0000-00-00 00:00:00',2),
(11,'2',NULL,NULL,'hapid','0999999956','widi@gmail.com','pbg','Paket 1','2022-11-10','2022-11-18',NULL,'100000000','20000','5000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'2022-11-10 09:44:02','0000-00-00 00:00:00','0000-00-00 00:00:00','','','',0,'0000-00-00 00:00:00',0);

/*Table structure for table `tabel_pesanan` */

DROP TABLE IF EXISTS `tabel_pesanan`;

CREATE TABLE `tabel_pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(50) DEFAULT NULL,
  `id_pembayaran` varchar(20) DEFAULT NULL,
  `id_paket_wedding` varchar(50) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `no_telp_pemesan` varchar(20) DEFAULT NULL,
  `email_pemesan` varchar(100) DEFAULT NULL,
  `jenis_kelamin_pemesan` varchar(15) DEFAULT NULL,
  `alamat_pemesan` varchar(255) DEFAULT NULL,
  `judul_pw` varchar(100) DEFAULT NULL,
  `gambar_pw` varchar(255) DEFAULT NULL,
  `harga_pw` varchar(20) DEFAULT NULL,
  `dp_pw` varchar(50) DEFAULT NULL,
  `pelunasan_pw` varchar(50) DEFAULT NULL,
  `deskripsi_pw` varchar(255) DEFAULT NULL,
  `decoration_pw` varchar(100) DEFAULT NULL,
  `makeup_artist_pw` varchar(100) DEFAULT NULL,
  `documentation_pw` varchar(100) DEFAULT NULL,
  `catering_pw` varchar(100) DEFAULT NULL,
  `entertainment_pw` varchar(100) DEFAULT NULL,
  `efek_flashmob_pw` varchar(100) DEFAULT NULL,
  `exclusive_pw` varchar(100) DEFAULT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `tanggal_pesanan` datetime DEFAULT NULL,
  `status` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `del_flag` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_pesanan` */

insert  into `tabel_pesanan`(`id_pesanan`,`id_admin`,`id_pembayaran`,`id_paket_wedding`,`nama_pemesan`,`username`,`no_telp_pemesan`,`email_pemesan`,`jenis_kelamin_pemesan`,`alamat_pemesan`,`judul_pw`,`gambar_pw`,`harga_pw`,`dp_pw`,`pelunasan_pw`,`deskripsi_pw`,`decoration_pw`,`makeup_artist_pw`,`documentation_pw`,`catering_pw`,`entertainment_pw`,`efek_flashmob_pw`,`exclusive_pw`,`tanggal_acara`,`tanggal_pesanan`,`status`,`timestamp`,`del_flag`) values 
(9,2,NULL,'',' zaky ','konsumen','085786652577','geo@gmail.com','laki-laki','Ds. Bangun Galih','paketan','1667309643180.png','10000','2000','8000','deskripsi meras','dekor','makeuo','dokumentasi','cater','entertaint','fllas',NULL,'0000-00-00','2022-11-02 14:37:13',0,'2022-11-04 21:42:09',1),
(10,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'Paket terbang','','20000',NULL,NULL,'Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','0000-00-00','2022-11-06 09:12:34',0,'2022-11-06 15:12:34',1),
(11,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'Paket terbang','','20000',NULL,NULL,'Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','0000-00-00','2022-11-06 09:14:24',0,'2022-11-06 15:14:24',1),
(12,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'Paket terbang','','20000',NULL,NULL,'Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','0000-00-00','2022-11-06 09:21:14',0,'2022-11-06 15:21:14',1),
(13,NULL,NULL,'','gudang garam',NULL,'0999999956','jaasa@gmail.com',NULL,'pbg','paketan','1667309643180.png','10000',NULL,NULL,'deskripsi meras','dekor','makeuo','dokumentasi','cater','entertaint','fllas','givee','0000-00-00','2022-11-06 09:33:27',0,'2022-11-06 15:33:27',1),
(14,NULL,NULL,'','hunaa',NULL,'099999999999','ririri@gmail.com',NULL,'pbg','paketan','1667309643180.png','10000','2000','8000','deskripsi meras','dekor','makeuo','dokumentasi','cater','entertaint','fllas','givee','0000-00-00','2022-11-06 09:35:03',0,'2022-11-06 15:35:03',1),
(15,NULL,NULL,NULL,'fadewai',NULL,'0999999956','ririri@gmail.com',NULL,'pbg','Paket terbang','','20000','5000','15000','Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','0000-00-00','2022-11-06 09:49:06',0,'2022-11-06 15:49:06',1),
(16,2,NULL,'3','gudang garam','konsumen','0999999956','ririri@gmail.com',NULL,'pbg','Paket terbang','','20000','5000','15000','Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','0000-00-00','2022-11-06 10:10:28',0,'2022-11-06 16:10:28',1),
(17,2,NULL,'3','RIriri','konsumen','099999999999','ririri@gmail.com',NULL,'pbg','Paket terbang','','20000','5000','15000','Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','2022-11-24','2022-11-06 10:11:45',0,'2022-11-15 14:13:38',1),
(18,2,NULL,'3','gudang garam','konsumen','0999999956','ririri@gmail.com',NULL,'pbg','Paket terbang','','20000','5000','15000','Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','2022-11-18','2022-11-06 10:16:59',0,'2022-11-06 16:16:59',1),
(19,6,NULL,'3','RIriri','fer','0999999956','ririri@gmail.com',NULL,'bangun galih tegal','Paket terbang','','20000','5000','15000','Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusife','2022-11-10','2022-11-08 14:40:39',0,'2022-11-08 20:40:39',1),
(20,2,NULL,'9','hapid','konsumen','0999999956','widi@gmail.com',NULL,'pbg','Paket 1','1667914522357.jpg','100000000','20000','5000','Deskripsi','dekorasi','2','dokumentasi','4','entertainment','efek','ekslusife','2022-11-18','2022-11-10 03:44:02',0,'2022-11-10 09:44:02',1),
(21,11,NULL,'9','Udin','fifi','089399308391','udin@gmail.com',NULL,'tegal','Paket 1','1667914522357.jpg','100000000','20000','5000','Deskripsi','dekorasi','2','dokumentasi','4','entertainment','efek','ekslusife','2022-11-24','2022-11-17 04:30:23',0,'2022-11-17 10:30:23',1),
(22,2,NULL,'3','Rizqi','konsumen','089xxxxxxxxxx','s@s',NULL,'mangkang','Paket terbang','','20000','5000','15000','Deskripsi','dekorasi','makeup','dokumentasi','catering','entertainment','efek','ekslusifeeee','0000-00-00','2023-02-20 10:31:39',0,'2023-02-20 16:31:39',1);

/*Table structure for table `table_buku` */

DROP TABLE IF EXISTS `table_buku`;

CREATE TABLE `table_buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `penulis_buku` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `del_flag` int(1) NOT NULL DEFAULT 1,
  `kategori_id` varchar(255) NOT NULL,
  `rak_buku_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_buku` */

insert  into `table_buku`(`id_buku`,`judul_buku`,`penerbit_buku`,`penulis_buku`,`tahun_terbit`,`keterangan`,`sumber`,`del_flag`,`kategori_id`,`rak_buku_id`) values 
(1,'Tokyo Ravengers','Jepang','Jepang',2000,'Wibu',NULL,1,'Anime','001');

/*Table structure for table `table_kategori_buku` */

DROP TABLE IF EXISTS `table_kategori_buku`;

CREATE TABLE `table_kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_buku` varchar(255) DEFAULT NULL,
  `keterangan_kategori_buku` varchar(255) DEFAULT NULL,
  `del_flag` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_kategori_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_kategori_buku` */

insert  into `table_kategori_buku`(`id_kategori_buku`,`nama_kategori_buku`,`keterangan_kategori_buku`,`del_flag`) values 
(1,'Anime','Wibu',1),
(3,'Cerpen','Cerpen',1);

/*Table structure for table `table_rak_buku` */

DROP TABLE IF EXISTS `table_rak_buku`;

CREATE TABLE `table_rak_buku` (
  `id_rak_buku` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak_buku` varchar(255) DEFAULT NULL,
  `keterangan_rak_buku` varchar(255) DEFAULT NULL,
  `del_flag` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_rak_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_rak_buku` */

insert  into `table_rak_buku`(`id_rak_buku`,`nama_rak_buku`,`keterangan_rak_buku`,`del_flag`) values 
(1,'001','Awokwok',1),
(5,'003','Cerpennn',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
