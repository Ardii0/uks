/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.29 : Database - db_sis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sis` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_sis`;

/*Table structure for table `kembalikan` */

DROP TABLE IF EXISTS `kembalikan`;

CREATE TABLE `kembalikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kembalikan` */

insert  into `kembalikan`(`id`,`id_buku`) values 
(1,4),
(2,4);

/*Table structure for table `pinjam` */

DROP TABLE IF EXISTS `pinjam`;

CREATE TABLE `pinjam` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pinjam` */

insert  into `pinjam`(`id`,`id_buku`) values 
(1,4),
(2,4),
(3,5);

/*Table structure for table `setting_perpustakaan` */

DROP TABLE IF EXISTS `setting_perpustakaan`;

CREATE TABLE `setting_perpustakaan` (
  `id_setting_perpus` int NOT NULL AUTO_INCREMENT,
  `maksimal_pengembalian_hari` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `denda` double DEFAULT NULL,
  PRIMARY KEY (`id_setting_perpus`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setting_perpustakaan` */

insert  into `setting_perpustakaan`(`id_setting_perpus`,`maksimal_pengembalian_hari`,`denda`) values 
(1,'10',1000000);

/*Table structure for table `tabel_akun` */

DROP TABLE IF EXISTS `tabel_akun`;

CREATE TABLE `tabel_akun` (
  `id_akun` int NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_akun` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_akun` */

insert  into `tabel_akun`(`id_akun`,`nama_akun`,`jenis_akun`,`status`) values 
(5,'Kas','Kas',1),
(6,'Ada','2',1);

/*Table structure for table `tabel_alokasiguru` */

DROP TABLE IF EXISTS `tabel_alokasiguru`;

CREATE TABLE `tabel_alokasiguru` (
  `id_alokasiguru` int NOT NULL AUTO_INCREMENT,
  `kode_guru` varchar(255) NOT NULL,
  `id_mapel` int NOT NULL,
  PRIMARY KEY (`id_alokasiguru`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_guru` (`kode_guru`),
  CONSTRAINT `tabel_alokasiguru_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_alokasiguru` */

insert  into `tabel_alokasiguru`(`id_alokasiguru`,`kode_guru`,`id_mapel`) values 
(63,'KG-330OSN',9),
(66,'449',9),
(67,'449',10),
(68,'450',9);

/*Table structure for table `tabel_alokasimapel` */

DROP TABLE IF EXISTS `tabel_alokasimapel`;

CREATE TABLE `tabel_alokasimapel` (
  `id_alokasimapel` int NOT NULL AUTO_INCREMENT,
  `id_mapel` int NOT NULL,
  `id_rombel` int NOT NULL,
  PRIMARY KEY (`id_alokasimapel`),
  KEY `id_rombel` (`id_rombel`),
  KEY `id_mapel` (`id_mapel`),
  CONSTRAINT `tabel_alokasimapel_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`),
  CONSTRAINT `tabel_alokasimapel_to_rombel` FOREIGN KEY (`id_rombel`) REFERENCES `tabel_rombel` (`id_rombel`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_alokasimapel` */

insert  into `tabel_alokasimapel`(`id_alokasimapel`,`id_mapel`,`id_rombel`) values 
(12,9,2),
(13,9,1),
(24,10,1);

/*Table structure for table `tabel_anggota` */

DROP TABLE IF EXISTS `tabel_anggota`;

CREATE TABLE `tabel_anggota` (
  `id_anggota` int NOT NULL,
  `id_siswa` int NOT NULL,
  `date` date DEFAULT (curdate()),
  `status` int NOT NULL,
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `tabel_anggota_to_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tabel_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_anggota` */

insert  into `tabel_anggota`(`id_anggota`,`id_siswa`,`date`,`status`) values 
(9923,8,'2023-03-24',1),
(199,1,'2023-03-24',1),
(875,7,'2023-03-24',1),
(863,9,'2023-03-24',1),
(31271,6,'2023-03-24',1),
(96912,8,'2023-03-28',1);

/*Table structure for table `tabel_daftar` */

DROP TABLE IF EXISTS `tabel_daftar`;

CREATE TABLE `tabel_daftar` (
  `id_daftar` int NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(100) NOT NULL,
  `id_angkatan` int DEFAULT NULL,
  `id_jenjang` int NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jekel` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `anak_ke` int DEFAULT NULL,
  `saudara_kandung` varchar(255) DEFAULT NULL,
  `saudara_angkat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `warga_negara` varchar(255) DEFAULT NULL,
  `diterima` varchar(1) NOT NULL DEFAULT 'P',
  PRIMARY KEY (`id_daftar`),
  KEY `id_angkatan` (`id_angkatan`),
  KEY `id_jenjang` (`id_jenjang`),
  CONSTRAINT `tabel_daftar_to_angkatan` FOREIGN KEY (`id_angkatan`) REFERENCES `tabel_tahunajaran` (`id_angkatan`),
  CONSTRAINT `tabel_daftar_to_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tabel_jenjang` (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_daftar` */

insert  into `tabel_daftar`(`id_daftar`,`no_reg`,`id_angkatan`,`id_jenjang`,`tgl_daftar`,`nisn`,`nama`,`jekel`,`tempat_lahir`,`anak_ke`,`saudara_kandung`,`saudara_angkat`,`tgl_lahir`,`agama`,`alamat`,`telepon`,`foto`,`warga_negara`,`diterima`) values 
(2,'12',1,3,'2023-02-18','213','Ahmad Jay','L','Los Angel',1,'1','1','2023-03-11','Islam','Jl.Roti Burger Ayam','123','1677472666712.png','WNI','Y'),
(3,'313',1,3,'2023-02-28','3123','Irvanda','L','Taman',1,'4','0','2023-03-03','Islam','Taman','08989898',NULL,'WNI','A'),
(6,'2334233',1,5,'2023-03-01','34534545','Rizqi','L','Semarang',2,'ada','ada','2003-11-11','Islam','Mangkang','089765543321','1677650453679.png','WNI','M'),
(7,'2334233',1,5,'2023-03-01','34534545','Rizqi','L','Semarang',2,'ada','ada','2003-11-11','Islam','Mangkang','089765543321','1677650453679.png','WNI','L'),
(10,'1213221',1,5,'2023-03-01','31312','Ahmad Subardjo','L','Los Angel',1,'1','1','2023-03-11','Islam','Jl.Tamai Raya','09282734851','1678519397023.jpg','WNI','A'),
(11,'123',1,1,'2023-03-16','2','ShoeFantasy','L','sSfd',1,'1','1','2023-03-30','Kristen','Jl.Tamai Raya','09282734851','1678850687584.jpg','WNI','S'),
(12,'12313',1,9,'2023-03-01','9878','Arya','L','Los Angel',1,'2','1','2023-03-02','Islam','JL. Jakarta','09282734851','1678870842225.jpg','WNI','T'),
(13,'REG-3NBD40',1,1,'2023-03-16','45345','ada','L','Los Angel',2,'2','2','2023-03-24','Islam','p','09282734851','1679367084036.jpg','WNI','A'),
(15,'REG-R4TMYY',6,5,'0000-00-00','12312','Kevin Sanjaya','L','Los Angel',1,'2','3','2023-03-21','Islam','Jl.pekan sari','09282734851',NULL,'WNI','A');

/*Table structure for table `tabel_guru` */

DROP TABLE IF EXISTS `tabel_guru`;

CREATE TABLE `tabel_guru` (
  `kode_guru` varchar(255) DEFAULT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jekel` enum('L','P') DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` text,
  `status` enum('AKTIF','NONAKTIF') DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_guru` */

insert  into `tabel_guru`(`kode_guru`,`nip`,`nama_guru`,`jekel`,`no_hp`,`alamat`,`status`) values 
('450','3242134','Eko','L','08932422342','Ungaran','AKTIF'),
('451','32333','Ahmad','L','087884635','Jl.Tamai Raya','AKTIF'),
('453','222','Ahmad','L','0893847522','','AKTIF'),
('455','1212','Test','L','1212','Jl.Tamai Raya','AKTIF'),
('KG-69U9HX','1414','Test','L','0893847522','Jl.Roti Burger Ayam','AKTIF'),
('KG-330OSN','21312','Shelby','L','1212','Jl.Tamai Raya','AKTIF'),
('KG-3MKQ3P','111','Test23','L','222','Jl.Tamai Raya','AKTIF'),
('KG-QQRODS','123','Test','L','0893847522','Jl.Tamai Raya','AKTIF'),
('KG-LVUMAY','1212','Arga','L','0893847522','','AKTIF');

/*Table structure for table `tabel_hak_akses` */

DROP TABLE IF EXISTS `tabel_hak_akses`;

CREATE TABLE `tabel_hak_akses` (
  `id_hak_akses` int DEFAULT NULL,
  `akses` varchar(765) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_hak_akses` */

insert  into `tabel_hak_akses`(`id_hak_akses`,`akses`) values 
(1,'-'),
(2,'Admin'),
(3,'Kesiswaan'),
(4,'PetugasPerpus'),
(5,'Guru'),
(6,'TU');

/*Table structure for table `tabel_invoice` */

DROP TABLE IF EXISTS `tabel_invoice`;

CREATE TABLE `tabel_invoice` (
  `id_invoice` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_siswa` int NOT NULL,
  `date` date DEFAULT (curdate()),
  `id_level` int NOT NULL,
  `id_ta` int DEFAULT NULL,
  `cek_p` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_invoice` */

insert  into `tabel_invoice`(`id_invoice`,`id_siswa`,`date`,`id_level`,`id_ta`,`cek_p`) values 
('INV0318KGO2144',1,'2023-03-19',5,1,1),
('INV0318RST2235',1,'2023-03-19',5,1,1),
('INV031892F2244',1,'2023-03-19',5,1,1),
('INV0319P4I3006',1,'2023-03-19',5,1,1),
('INV0319XSY3546',1,'2023-03-19',5,1,1),
('INV031988B3717',1,'2023-03-19',5,1,1),
('INV0319V9Q0017',2,'2023-03-19',5,0,1),
('INV0319H8Y0133',2,'2023-03-19',5,0,1),
('INV0319L3I0249',6,'2023-03-19',5,1,1),
('INV031903H4605',5,'2023-03-19',5,0,1),
('INV0319T4W4609',5,'2023-03-19',5,0,1),
('INV0320H213525',5,'2023-03-20',5,0,1),
('INV03236WP0544',8,'2023-03-24',1,0,1),
('INV0323MSV1842',8,'2023-03-22',1,0,1),
('INV0328ELT3029',9,'2023-03-28',5,0,1);

/*Table structure for table `tabel_jenis_transaksi` */

DROP TABLE IF EXISTS `tabel_jenis_transaksi`;

CREATE TABLE `tabel_jenis_transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_transaksi` varchar(200) NOT NULL,
  `rencana_anggaran` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `jenis_transaksi` enum('m','k') NOT NULL,
  `nominal` bigint NOT NULL,
  `debit` int NOT NULL,
  `kredit` int NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenis_transaksi` */

insert  into `tabel_jenis_transaksi`(`id`,`nama_jenis_transaksi`,`rencana_anggaran`,`status`,`jenis_transaksi`,`nominal`,`debit`,`kredit`,`keterangan`) values 
(1,'Dana Hibah',1,1,'m',500000,600000,230000,'Deskripsi Rancana Anggaran\r\n'),
(2,'Gaji Staff',1,1,'k',500000,760000,210000,'Deskripsi Rancana Anggaran\r\n'),
(3,'Gaji Guru',3,1,'k',500000,180000,900000,'Deskripsi Rancana Anggaran\r\n'),
(4,'Dana Pokok',3,1,'m',1231313,1300000,870000,'MAIDAKWDI'),
(5,'Gaji Tukang Bangunan',3,1,'k',90909090,450000,400000,'jdjdjdjd'),
(6,'Dana Bos',3,1,'m',909090,1010000,840000,'Tes');

/*Table structure for table `tabel_jenisbayar` */

DROP TABLE IF EXISTS `tabel_jenisbayar`;

CREATE TABLE `tabel_jenisbayar` (
  `id_jenis` int NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(3) DEFAULT NULL,
  `nama_jenis` varchar(25) DEFAULT NULL,
  `tipe_jenis` int DEFAULT NULL,
  `keterangan` text,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenisbayar` */

insert  into `tabel_jenisbayar`(`id_jenis`,`kode_jenis`,`nama_jenis`,`tipe_jenis`,`keterangan`,`status`) values 
(1,'ada','Pembayaran SPP',1,NULL,1),
(2,'okk','Pembayaran UKT',2,NULL,1);

/*Table structure for table `tabel_jenismapel` */

DROP TABLE IF EXISTS `tabel_jenismapel`;

CREATE TABLE `tabel_jenismapel` (
  `id_jenismapel` int NOT NULL AUTO_INCREMENT,
  `nama_jenismapel` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_jenismapel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenismapel` */

insert  into `tabel_jenismapel`(`id_jenismapel`,`nama_jenismapel`,`keterangan`,`status`) values 
(1,'Wajib','Semangat Brother','AKTIF'),
(2,'Bebas','Silahkan Kalau Mau hehe','AKTIF');

/*Table structure for table `tabel_jenjang` */

DROP TABLE IF EXISTS `tabel_jenjang`;

CREATE TABLE `tabel_jenjang` (
  `id_jenjang` int NOT NULL AUTO_INCREMENT,
  `kd_jenjang` varchar(50) NOT NULL,
  `nama_jenjang` varchar(50) NOT NULL,
  `keterangan` text,
  `id_paket` int NOT NULL,
  `alamat` text,
  `aktif` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_jenjang`),
  KEY `id_jenjang` (`id_jenjang`),
  KEY `tabel_jenjang_to_paketjenjang` (`id_paket`),
  CONSTRAINT `tabel_jenjang_to_paketjenjang` FOREIGN KEY (`id_paket`) REFERENCES `tabel_paketjenjang` (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenjang` */

insert  into `tabel_jenjang`(`id_jenjang`,`kd_jenjang`,`nama_jenjang`,`keterangan`,`id_paket`,`alamat`,`aktif`) values 
(1,'J001','SD Mekar Sari','Sekolah Dasar',2,'Jl. Sd kemantren',1),
(3,'J002','SMP Sehat Mekar Percaya','Sekolah Menengah Pertama',1,'Jl. Smp kemantren',1),
(4,'J003','SMA Public','Sekolah Menengah Atas',2,'Jl. Sma kemantren Raya',1),
(5,'J004','SMK Bina Nusantara','Sekolah Menengah Kejuruan',4,'Jl. Kemantren Raya no.4',1),
(9,'J006','SMP','',9,NULL,1),
(13,'J007','SD Muhammadiyah 1 Surakarta','',8,'Jl. Kartini No.1, RT.01/RW.09, Ketelan, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57132',1);

/*Table structure for table `tabel_kelas` */

DROP TABLE IF EXISTS `tabel_kelas`;

CREATE TABLE `tabel_kelas` (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `id_jenjang` int NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `keterangan` text,
  `status` enum('AKTIF','NONAKTIF','','') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_kelas`),
  KEY `id_jenjang` (`id_jenjang`),
  CONSTRAINT `tabel_kelas_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `tabel_jenjang` (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_kelas` */

insert  into `tabel_kelas`(`id_kelas`,`id_jenjang`,`nama_kelas`,`keterangan`,`status`) values 
(1,1,'VI','Ok','AKTIF'),
(2,4,'XII','Test','AKTIF'),
(3,3,'XI','Ok','AKTIF'),
(5,5,'XII TKJ','','AKTIF'),
(7,9,'VIII','','AKTIF');

/*Table structure for table `tabel_level` */

DROP TABLE IF EXISTS `tabel_level`;

CREATE TABLE `tabel_level` (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `kode_guru` varchar(255) DEFAULT NULL,
  `id_hak_akses` int DEFAULT NULL,
  PRIMARY KEY (`id_level`),
  KEY `tabel_level_to_guru` (`kode_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_level` */

insert  into `tabel_level`(`id_level`,`username`,`email`,`password`,`level`,`kode_guru`,`id_hak_akses`) values 
(1,'Admin','adminis@tra.tor','202cb962ac59075b964b07152d234b70','Admin',NULL,2),
(2,'Akademik','akademik@gmail.com','202cb962ac59075b964b07152d234b70','Kesiswaan',NULL,3),
(3,'Perpus','perpus@gmail.com','202cb962ac59075b964b07152d234b70','PetugasPerpus',NULL,4),
(4,'Guru','guru@gmail.com','202cb962ac59075b964b07152d234b70','Guru','449',5),
(5,'TU','tu@gmail.com','202cb962ac59075b964b07152d234b70','TU',NULL,6),
(7,'Shelby','Shelby@gmail.com','698d51a19d8a121ce581499d7b701668','Guru','KG-330OSN',5),
(8,'Ahmad','Ahmad@gmail.com','bcbe3365e6ac95ea2c0343a2395834dd','Guru',NULL,5),
(19,'Arga','Arga@gmail.com','a01610228fe998f515a72dd730294d87','Guru','KG-LVUMAY',5),
(20,'ar','ar@gmail.com','c20ad4d76fe97759aa27a0c99bff6710','Guru','KG-TEFKZU',5),
(21,'Test23','Test23@gmail.com','ec43638b66e16a5bbede9b710b12b0c7','Guru','KG-8GVW0P',5);

/*Table structure for table `tabel_lulus` */

DROP TABLE IF EXISTS `tabel_lulus`;

CREATE TABLE `tabel_lulus` (
  `id_lulus` int NOT NULL AUTO_INCREMENT,
  `id_daftar` int DEFAULT NULL,
  `id_rombel` int DEFAULT NULL,
  `tanggal_lulus` date DEFAULT NULL,
  PRIMARY KEY (`id_lulus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_lulus` */

insert  into `tabel_lulus`(`id_lulus`,`id_daftar`,`id_rombel`,`tanggal_lulus`) values 
(1,3,0,'2023-03-03'),
(2,2,0,'2023-03-03');

/*Table structure for table `tabel_mapel` */

DROP TABLE IF EXISTS `tabel_mapel`;

CREATE TABLE `tabel_mapel` (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `id_jenismapel` int NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `keterangan` text,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_mapel`),
  KEY `id_jenismapel` (`id_jenismapel`),
  CONSTRAINT `tabel_mapel_ibfk_1` FOREIGN KEY (`id_jenismapel`) REFERENCES `tabel_jenismapel` (`id_jenismapel`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_mapel` */

insert  into `tabel_mapel`(`id_mapel`,`id_jenismapel`,`nama_mapel`,`keterangan`,`status`) values 
(9,1,'Matematika','Pelajaran Matematika','AKTIF'),
(10,1,'Bahasa Inggris','Semangat','AKTIF');

/*Table structure for table `tabel_nilai` */

DROP TABLE IF EXISTS `tabel_nilai`;

CREATE TABLE `tabel_nilai` (
  `id_nilai` int NOT NULL AUTO_INCREMENT,
  `id_rombel` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_mapel` int NOT NULL,
  `id_semester` int NOT NULL,
  `nuh1` int NOT NULL,
  `nuh2` int NOT NULL,
  `nuh3` int NOT NULL,
  `nt1` int NOT NULL,
  `nt2` int NOT NULL,
  `nt3` int NOT NULL,
  `mid` int NOT NULL,
  `smt` int NOT NULL,
  `rnuh` text,
  `rnt` text,
  `nh` text,
  `nar` text,
  PRIMARY KEY (`id_nilai`),
  KEY `id_siswa` (`id_siswa`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_semester` (`id_semester`),
  CONSTRAINT `tabel_nilai_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`),
  CONSTRAINT `tabel_nilai_to_semester` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`),
  CONSTRAINT `tabel_nilai_to_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tabel_siswa` (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_nilai` */

insert  into `tabel_nilai`(`id_nilai`,`id_rombel`,`id_siswa`,`id_mapel`,`id_semester`,`nuh1`,`nuh2`,`nuh3`,`nt1`,`nt2`,`nt3`,`mid`,`smt`,`rnuh`,`rnt`,`nh`,`nar`) values 
(1,12,5,9,1,1,1,1,1,1,1,1,1,'1','1','1','99'),
(9,1,1,9,1,25,32,35,25,32,35,12,35,'31','31','31','26');

/*Table structure for table `tabel_paketjenjang` */

DROP TABLE IF EXISTS `tabel_paketjenjang`;

CREATE TABLE `tabel_paketjenjang` (
  `id_paket` int NOT NULL AUTO_INCREMENT,
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_paketjenjang` */

insert  into `tabel_paketjenjang`(`id_paket`,`kode_paket`,`nama_paket`) values 
(1,'SD','Sekolah Dasar'),
(2,'SMP','Sekolah Menengah Pertama'),
(3,'SMA','Sekolah Menengah Atas'),
(4,'SMK','Sekolah Menengah Kejuruan'),
(5,'J223','Esdeh'),
(7,'J223','Esdeh'),
(8,'J223','SD'),
(9,'J224','Smp'),
(10,'J009','SMA');

/*Table structure for table `tabel_pembayaran` */

DROP TABLE IF EXISTS `tabel_pembayaran`;

CREATE TABLE `tabel_pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `id_jenis` int DEFAULT NULL,
  `nominal` int NOT NULL,
  `keterangan` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_ta` int DEFAULT NULL,
  `id_tf` varchar(20) DEFAULT NULL,
  `id_invoice` varchar(255) NOT NULL,
  `id_level` int NOT NULL,
  `cek_p` int DEFAULT '0',
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_jenisbayar` (`id_jenis`),
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `tabel_pembayaran_to_jenisbayar` FOREIGN KEY (`id_jenis`) REFERENCES `tabel_jenisbayar` (`id_jenis`),
  CONSTRAINT `tabel_pembayaran_to_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tabel_siswa` (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_pembayaran` */

insert  into `tabel_pembayaran`(`id_pembayaran`,`id_siswa`,`id_jenis`,`nominal`,`keterangan`,`date`,`id_ta`,`id_tf`,`id_invoice`,`id_level`,`cek_p`) values 
(1,5,1,223322,'1','2023-03-11 16:38:54',1,'INV0311PLW3854','INV0318KGO2144',5,0),
(2,1,2,200000,'ok','2023-03-13 09:35:36',1,'INV0313WOF3536','INV0318KGO2144',5,0),
(7,5,2,21312,'1231','2023-03-16 11:28:52',1,'INV0316IYJ2852','INV0318KGO2144',5,0),
(22,1,2,20000,'ada','2023-03-19 01:17:49',1,'INV03183371749','INV0318KGO2144',5,0),
(25,1,1,12000,'Ada','2023-03-19 01:24:07',1,'TSK0318H5G2407','INV031892F2244',5,1),
(26,1,1,50000,'Ok','2023-03-19 17:30:18',1,'TSK0319ARN3018','INV0319P4I3006',5,1),
(27,1,1,75000,'Ok Jay 2','2023-03-19 17:45:29',1,'INV0319JHG4529','INV0319P4I3006',5,1),
(28,1,2,100000,'Ok Jay 3','2023-03-19 17:46:15',1,'INV03192RQ4615','INV0319P4I3006',5,1),
(29,1,2,25000,'Ok Jay 4','2023-03-19 17:54:37',1,'INV0319HHO5437','INV0319P4I3006',5,1),
(30,1,1,15000,'Ok Jay 5','2023-03-19 17:57:20',1,'TSK03190FD5720','INV0319P4I3006',5,1),
(32,1,1,0,'','2023-03-19 18:37:26',1,'TSK0319I0Z3726','INV031988B3717',5,1),
(33,1,2,10000,'Ok Jay 6','2023-03-19 19:58:14',1,'TSK0319HYD5814','INV0319P4I3006',5,1),
(34,2,2,12,'2','2023-03-19 20:00:22',0,'TSK03199VJ0022','INV0319V9Q0017',5,1),
(35,2,2,1,'1','2023-03-19 20:00:27',1,'TSK0319RKG0027','INV0319V9Q0017',5,1),
(36,2,1,2,'2','2023-03-19 20:00:38',1,'TSK0319PD90038','INV0319V9Q0017',5,1),
(37,2,2,12,'2','2023-03-19 20:01:35',0,'TSK0319E0O0135','INV0319H8Y0133',5,1),
(38,2,1,2,'2','2023-03-19 20:01:40',1,'TSK03191Y90140','INV0319H8Y0133',5,1),
(39,2,1,2,'2','2023-03-19 20:02:02',1,'TSK0319B7G0202','INV0319H8Y0133',5,1),
(40,2,2,3,'3','2023-03-19 20:02:41',1,'TSK0319F000241','INV0319H8Y0133',5,1),
(41,6,2,2,'2','2023-03-19 20:02:53',1,'TSK0319K7X0253','INV0319L3I0249',5,1),
(42,6,1,2,'3','2023-03-19 20:02:59',1,'TSK0319F8K0259','INV0319L3I0249',5,1),
(44,5,2,1,'1','2023-03-19 20:46:11',0,'TSK0319ES34611','INV0319T4W4609',5,1),
(45,5,1,20000,'Tes','2023-03-20 13:35:36',0,'TSK032046O3536','INV0320H213525',5,1),
(46,5,2,15000,'Tes 2','2023-03-20 13:35:53',1,'TSK03205PS3553','INV0320H213525',5,1),
(47,8,2,1000,'ada','2023-03-24 00:13:10',0,'TSK0323L160554','INV03236WP0544',1,1),
(48,8,2,15000,'Ok','2023-03-22 17:18:57',0,'TSK0323T281857','INV0323MSV1842',1,1),
(49,9,1,10000,'','2023-03-28 10:30:53',0,'TSK03285ZQ3053','INV0328ELT3029',5,1),
(50,9,2,25000,'','2023-03-28 10:31:12',6,'TSK03280D43112','INV0328ELT3029',5,1);

/*Table structure for table `tabel_pindah` */

DROP TABLE IF EXISTS `tabel_pindah`;

CREATE TABLE `tabel_pindah` (
  `id_pindah` int NOT NULL AUTO_INCREMENT,
  `id_daftar` int DEFAULT NULL,
  `id_rombel` int DEFAULT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_pindah`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_pindah` */

insert  into `tabel_pindah`(`id_pindah`,`id_daftar`,`id_rombel`,`nama_sekolah`) values 
(1,3,6,''),
(2,3,6,''),
(3,3,5,''),
(4,NULL,6,''),
(5,2,3,'SMK Texmaco'),
(6,2,3,'SMP 1'),
(7,2,0,'sssss'),
(8,1,0,'asdasaqsd'),
(9,2,0,'asdasaqsd'),
(10,2,0,'SMK Texmaco'),
(11,3,0,'ssss'),
(12,3,0,'adawdaw'),
(13,3,0,'adawd');

/*Table structure for table `tabel_pinjaman` */

DROP TABLE IF EXISTS `tabel_pinjaman`;

CREATE TABLE `tabel_pinjaman` (
  `id_pinjaman` int NOT NULL AUTO_INCREMENT,
  `no_pinjaman` int DEFAULT NULL,
  `id_anggota` int NOT NULL,
  `id_index_buku` int NOT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'DIPINJAM',
  `denda` double DEFAULT NULL,
  PRIMARY KEY (`id_pinjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_pinjaman` */

/*Table structure for table `tabel_rencana_anggaran` */

DROP TABLE IF EXISTS `tabel_rencana_anggaran`;

CREATE TABLE `tabel_rencana_anggaran` (
  `id_rencana_anggaran` int NOT NULL AUTO_INCREMENT,
  `nama_anggaran` varchar(150) NOT NULL,
  `awal_periode` date NOT NULL,
  `akhir_periode` date NOT NULL,
  `pencatat` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `tetapkan` int NOT NULL,
  PRIMARY KEY (`id_rencana_anggaran`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_rencana_anggaran` */

insert  into `tabel_rencana_anggaran`(`id_rencana_anggaran`,`nama_anggaran`,`awal_periode`,`akhir_periode`,`pencatat`,`status`,`tetapkan`) values 
(1,'RAB 2018/2019','2023-03-06','2023-03-07','Admin',1,0),
(2,'RAB 2019/2020','2023-03-06','2023-03-08','Admin',1,0),
(3,'RAB 2020/2021','2023-03-09','2023-03-31','Admin',1,0),
(5,'Ada','2023-03-10','2023-03-11','5',1,0);

/*Table structure for table `tabel_rombel` */

DROP TABLE IF EXISTS `tabel_rombel`;

CREATE TABLE `tabel_rombel` (
  `id_rombel` int NOT NULL AUTO_INCREMENT,
  `id_kelas` int NOT NULL,
  `nama_rombel` varchar(100) NOT NULL,
  `kode_guru` varchar(255) NOT NULL,
  `kuota` int NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_rombel`),
  KEY `id_kelas` (`id_kelas`),
  KEY `kode_guru` (`kode_guru`),
  CONSTRAINT `tabel_kelas_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_rombel` */

insert  into `tabel_rombel`(`id_rombel`,`id_kelas`,`nama_rombel`,`kode_guru`,`kuota`,`status`) values 
(1,1,'VI A','449',35,'AKTIF'),
(2,3,'TKJ 2','444',123,'AKTIF'),
(5,2,'TKJ 3','444',291,'AKTIF'),
(6,3,'TB','444',221,'AKTIF'),
(10,2,'AKL','444',21,'AKTIF'),
(12,5,'VII A','KG-330OSN',50,'AKTIF'),
(14,7,'VIII D','450',35,'AKTIF'),
(15,7,'VIII B','KG-330OSN',35,'AKTIF');

/*Table structure for table `tabel_sekolah` */

DROP TABLE IF EXISTS `tabel_sekolah`;

CREATE TABLE `tabel_sekolah` (
  `id_sekolah` int NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_regristasi` date DEFAULT NULL,
  `nomor_telepon` double DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_sekolah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_sekolah` */

insert  into `tabel_sekolah`(`id_sekolah`,`nama_sekolah`,`tanggal_regristasi`,`nomor_telepon`,`alamat`,`email_sekolah`,`foto`) values 
(1,'SMK Binusa','2010-05-18',248662971,'Jl. Kemantren Raya No.5, RT.02/RW.04, Wonosari, Kec. Ngaliyan, Kota Semarang, Jawa Tengah','smkbinusasmg@yahoo.com','1678414030885.jpg');

/*Table structure for table `tabel_semester` */

DROP TABLE IF EXISTS `tabel_semester`;

CREATE TABLE `tabel_semester` (
  `id_semester` int NOT NULL AUTO_INCREMENT,
  `semester` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_semester` */

insert  into `tabel_semester`(`id_semester`,`semester`) values 
(1,'1'),
(2,'2');

/*Table structure for table `tabel_siswa` */

DROP TABLE IF EXISTS `tabel_siswa`;

CREATE TABLE `tabel_siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `id_daftar` int NOT NULL,
  `id_rombel` int DEFAULT NULL,
  `saldo_tabungan` int NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `id_daftar` (`id_daftar`),
  KEY `id_rombel` (`id_rombel`),
  CONSTRAINT `tabel_siswa_to_daftar_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tabel_daftar` (`id_daftar`),
  CONSTRAINT `tabel_siswa_to_rombel_ibfk_1` FOREIGN KEY (`id_rombel`) REFERENCES `tabel_rombel` (`id_rombel`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_siswa` */

insert  into `tabel_siswa`(`id_siswa`,`id_daftar`,`id_rombel`,`saldo_tabungan`,`nama`) values 
(1,2,1,123123123,'Ahmad Jay'),
(2,3,5,123123123,'Irvanda'),
(5,10,12,0,'Ahmad Subardjo'),
(6,6,15,0,NULL),
(7,3,15,0,NULL),
(8,13,1,0,'ada'),
(9,15,15,0,'Kevin Sanjaya');

/*Table structure for table `tabel_tahunajaran` */

DROP TABLE IF EXISTS `tabel_tahunajaran`;

CREATE TABLE `tabel_tahunajaran` (
  `id_angkatan` int NOT NULL AUTO_INCREMENT,
  `kd_angkatan` varchar(15) NOT NULL,
  `nama_angkatan` varchar(20) NOT NULL,
  `keterangan` text,
  `tgl_a` date NOT NULL,
  `tgl_b` date NOT NULL,
  `aktif` int NOT NULL,
  `status` enum('NONAKTIF','AKTIF') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_angkatan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_tahunajaran` */

insert  into `tabel_tahunajaran`(`id_angkatan`,`kd_angkatan`,`nama_angkatan`,`keterangan`,`tgl_a`,`tgl_b`,`aktif`,`status`) values 
(1,'TA 2020/2021','TA2020/2021','OK','2023-02-01','2023-02-28',1,'AKTIF'),
(3,'TA 2022/2023','TA2022/2023','','2023-03-23','2023-05-17',1,'AKTIF'),
(5,'TA 2023/2024','TA2023/2024','','2023-03-01','2023-03-30',0,'NONAKTIF'),
(6,'TA 2024/2025','TA2024/2025','','2023-03-01','2023-03-09',0,'AKTIF');

/*Table structure for table `tabel_transaksi` */

DROP TABLE IF EXISTS `tabel_transaksi`;

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_anggaran` int DEFAULT NULL,
  `debet` int NOT NULL DEFAULT '0',
  `kredit` int NOT NULL DEFAULT '0',
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uraian` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pencatat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_akun` int NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_transaksi` */

insert  into `tabel_transaksi`(`id_transaksi`,`id_anggaran`,`debet`,`kredit`,`waktu`,`uraian`,`pencatat`,`id_akun`) values 
(1,1,0,123000,'2023-03-15 09:03:19','Dana Hibah','tu@gmail.com',0),
(2,1,123000,0,'2023-03-15 09:03:19','Dana Hibah','tu@gmail.com',1),
(3,4,0,143000,'2023-03-15 09:04:14','Dana Pokok','tu@gmail.com',0),
(4,4,143000,0,'2023-03-15 09:04:14','Dana Pokok','tu@gmail.com',2),
(5,1,0,78000,'2023-03-15 09:13:24','Dana Hibah','tu@gmail.com',1),
(6,1,78000,0,'2023-03-15 09:13:24','Dana Hibah','tu@gmail.com',0),
(7,6,0,20000,'2023-03-15 09:14:35','Dana Boss','tu@gmail.com',5),
(8,6,20000,0,'2023-03-15 09:14:35','Dana Boss','tu@gmail.com',0),
(9,4,0,19000,'2023-03-15 09:19:12','Dana Pokok','tu@gmail.com',0),
(10,4,19000,0,'2023-03-15 09:19:12','Dana Pokok','tu@gmail.com',1),
(11,1,0,12300,'2023-03-15 09:48:17','Dana Hibah hibah','tu@gmail.com',1),
(12,1,12300,0,'2023-03-15 09:48:17','Dana Hibah hibah','tu@gmail.com',0),
(13,6,0,21000,'2023-03-15 09:58:00','Dana Bos','tu@gmail.com',0),
(14,6,21000,0,'2023-03-15 09:58:00','Dana Bos','tu@gmail.com',1),
(15,1,0,12000,'2023-03-16 02:41:17','Dana Hibah','tu@gmail.com',0),
(16,1,12000,0,'2023-03-16 02:41:17','Dana Hibah','tu@gmail.com',4),
(17,6,0,2000,'2023-03-16 02:47:29','Dana Bos','tu@gmail.com',0),
(18,6,2000,0,'2023-03-16 02:47:29','Dana Bos','tu@gmail.com',2),
(19,4,0,500,'2023-03-16 02:48:10','Dana Pokok','tu@gmail.com',2),
(20,4,500,0,'2023-03-16 02:48:10','Dana Pokok','tu@gmail.com',1);

/*Table structure for table `table_buku` */

DROP TABLE IF EXISTS `table_buku`;

CREATE TABLE `table_buku` (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penerbit_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penulis_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_terbit` int DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sumber` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok` int DEFAULT '0',
  `del_flag` int NOT NULL DEFAULT '1',
  `kategori_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rak_buku_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_buku` */

insert  into `table_buku`(`id_buku`,`judul_buku`,`penerbit_buku`,`penulis_buku`,`tahun_terbit`,`keterangan`,`sumber`,`stok`,`del_flag`,`kategori_id`,`rak_buku_id`,`created_at`,`foto`) values 
(4,'Naruto','Genji','Makise',2000,'GENJEHHH RASENGANNNN',NULL,1,1,'Acara','003','2023-03-15 09:33:02','1678847582689.jpg'),
(5,'Upin & Ipin','Tok Dalang','Opah',2000,'Bocil',NULL,0,1,'Acara','003','2023-03-15 10:41:13','1678851673188.png'),
(6,'ada','ada','da',1221,'ada',NULL,NULL,1,'Cerpen','003','2023-03-21 10:17:14','1679368634339.jpg'),
(7,'Test','ada','da',2000,'Ada',NULL,NULL,1,'Cerpen','003','2023-03-21 10:28:18','1679369298700.jpg');

/*Table structure for table `table_detail_index_buku` */

DROP TABLE IF EXISTS `table_detail_index_buku`;

CREATE TABLE `table_detail_index_buku` (
  `id_stok` int NOT NULL AUTO_INCREMENT,
  `id_detail_index_buku` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id_stok`),
  KEY `id_buku` (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_detail_index_buku` */

insert  into `table_detail_index_buku`(`id_stok`,`id_detail_index_buku`,`status`,`id_buku`) values 
(1,'A01','Di Pinjam',4),
(3,'A02','Di Rak Buku',4),
(4,'1','Di Pinjam',5),
(6,'A01','Di Rak Buku',7),
(7,'A02','Di Rak Buku',7);

/*Table structure for table `table_kategori_buku` */

DROP TABLE IF EXISTS `table_kategori_buku`;

CREATE TABLE `table_kategori_buku` (
  `id_kategori_buku` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_kategori_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_kategori_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_kategori_buku` */

insert  into `table_kategori_buku`(`id_kategori_buku`,`nama_kategori_buku`,`keterangan_kategori_buku`,`del_flag`) values 
(1,'Anime','Wibu',1),
(3,'Cerpen','Cerpen',1);

/*Table structure for table `table_rak_buku` */

DROP TABLE IF EXISTS `table_rak_buku`;

CREATE TABLE `table_rak_buku` (
  `id_rak_buku` int NOT NULL AUTO_INCREMENT,
  `nama_rak_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_rak_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rak_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_rak_buku` */

insert  into `table_rak_buku`(`id_rak_buku`,`nama_rak_buku`,`keterangan_rak_buku`,`del_flag`) values 
(1,'001','Awokwok',1),
(5,'003','Cerpennn',1);

/* Trigger structure for table `kembalikan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `kembalikan_stok` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `kembalikan_stok` AFTER INSERT ON `kembalikan` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok + 1
   WHERE id_buku = NEW.id_buku;
END */$$


DELIMITER ;

/* Trigger structure for table `pinjam` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `kurang_stok` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `kurang_stok` AFTER INSERT ON `pinjam` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok - 1
   WHERE id_buku = NEW.id_buku;
END */$$


DELIMITER ;

/* Trigger structure for table `table_detail_index_buku` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tambah_stok` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tambah_stok` AFTER INSERT ON `table_detail_index_buku` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok + 1
   WHERE id_buku = NEW.id_buku;
END */$$


DELIMITER ;

/* Trigger structure for table `table_detail_index_buku` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus` AFTER DELETE ON `table_detail_index_buku` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok - 1
   WHERE id_buku = OLD.id_buku;
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;