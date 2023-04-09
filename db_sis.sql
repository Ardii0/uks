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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sis` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_sis`;

/*Table structure for table `data_diri` */

DROP TABLE IF EXISTS `data_diri`;

CREATE TABLE `data_diri` (
  `id_data_diri` int NOT NULL AUTO_INCREMENT,
  `id_level` int NOT NULL,
  `id_daftar` int NOT NULL,
  `jurusan_sekolah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_lulus` year NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_instansi` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_kerja` date DEFAULT NULL,
  `bidang_instansi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi_instansi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_instansi2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `jabatan2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_kerja2` date DEFAULT NULL,
  `nama_usaha` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `jenis_usaha` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tahun_usaha` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `nama_perguruan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tahun_perguruan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_data_diri`),
  KEY `id_user` (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `data_diri` */

insert  into `data_diri`(`id_data_diri`,`id_level`,`id_daftar`,`jurusan_sekolah`,`nik`,`alamat`,`no_telp`,`tahun_lulus`,`status`,`nama_instansi`,`jabatan`,`tanggal_kerja`,`bidang_instansi`,`lokasi_instansi`,`nama_instansi2`,`jabatan2`,`tanggal_kerja2`,`nama_usaha`,`jenis_usaha`,`tahun_usaha`,`nama_perguruan`,`jurusan`,`tahun_perguruan`,`timestamp`) values 
(1,6,2,'TKJ','1111111111','Jl. Pemirsa','0839479422',2021,'Lainnya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-04-06 11:52:42');

/*Table structure for table `kembalikan` */

DROP TABLE IF EXISTS `kembalikan`;

CREATE TABLE `kembalikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kembalikan` */

insert  into `kembalikan`(`id`,`id_buku`) values 
(1,17);

/*Table structure for table `pinjam` */

DROP TABLE IF EXISTS `pinjam`;

CREATE TABLE `pinjam` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pinjam` */

insert  into `pinjam`(`id`,`id_buku`) values 
(1,12),
(2,17);

/*Table structure for table `setting_perpustakaan` */

DROP TABLE IF EXISTS `setting_perpustakaan`;

CREATE TABLE `setting_perpustakaan` (
  `id_setting_perpus` int NOT NULL AUTO_INCREMENT,
  `maksimal_pengembalian_hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `denda` double DEFAULT NULL,
  PRIMARY KEY (`id_setting_perpus`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setting_perpustakaan` */

insert  into `setting_perpustakaan`(`id_setting_perpus`,`maksimal_pengembalian_hari`,`denda`) values 
(1,'1',1000);

/*Table structure for table `stok_buku_keluar` */

DROP TABLE IF EXISTS `stok_buku_keluar`;

CREATE TABLE `stok_buku_keluar` (
  `id_stok_keluar` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `stok_buku_keluar` */

/*Table structure for table `stok_buku_masuk` */

DROP TABLE IF EXISTS `stok_buku_masuk`;

CREATE TABLE `stok_buku_masuk` (
  `id_stok_masuk` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `stok_buku_masuk` */

/*Table structure for table `tabel_akun` */

DROP TABLE IF EXISTS `tabel_akun`;

CREATE TABLE `tabel_akun` (
  `id_akun` int NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_akun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_akun` */

insert  into `tabel_akun`(`id_akun`,`nama_akun`,`jenis_akun`,`status`) values 
(1,'Kas','Kas',1),
(2,'Modal','Modal',1),
(3,'Pendapatan','Pendapatan',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_alokasiguru` */

insert  into `tabel_alokasiguru`(`id_alokasiguru`,`kode_guru`,`id_mapel`) values 
(1,'KG-QUC568',1),
(2,'KG-QUC568',2);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_alokasimapel` */

insert  into `tabel_alokasimapel`(`id_alokasimapel`,`id_mapel`,`id_rombel`) values 
(1,1,1),
(2,1,2);

/*Table structure for table `tabel_anggota` */

DROP TABLE IF EXISTS `tabel_anggota`;

CREATE TABLE `tabel_anggota` (
  `id_anggota` int NOT NULL,
  `id_siswa` int NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `tabel_anggota_to_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tabel_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_anggota` */

insert  into `tabel_anggota`(`id_anggota`,`id_siswa`,`date`,`status`) values 
(74282,4,'2023-03-28 12:23:34',1),
(20470,8,'2023-04-05 10:19:47',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_daftar` */

insert  into `tabel_daftar`(`id_daftar`,`no_reg`,`id_angkatan`,`id_jenjang`,`tgl_daftar`,`nisn`,`nama`,`jekel`,`tempat_lahir`,`anak_ke`,`saudara_kandung`,`saudara_angkat`,`tgl_lahir`,`agama`,`alamat`,`telepon`,`foto`,`warga_negara`,`diterima`) values 
(1,'REG-A724E5',1,1,'2023-03-28','234','1','L','t',2,'2','31','0000-00-00','Islam','t','975',NULL,'WNI','M'),
(2,'REG-8IL92S',1,1,'2023-03-28','234','2','L','Jawa Tengah',2,'2','31','1970-01-01','Islam','t','975',NULL,'WNI','G'),
(3,'REG-6SBG5K',1,1,'2023-03-28','234','3','L','t',2,'2','31','0000-00-00','Islam','t','975',NULL,'WNI','A'),
(4,'REG-DQRHL3',1,1,'2023-03-28','12345789 0','Ahmad A. Bahar','L','Semarang',1,'2','0','0000-00-00','Islam','Jl. Melati 1','0812346789 0',NULL,'WNI','A'),
(5,'REG-AZ41WL',1,1,'2023-03-28','12345789 1','Ahmad B. Bahar','L','Semarang',1,'3','0','0000-00-00','Islam','Jl. Melati 2','0812346789 1',NULL,'WNI','A'),
(6,'REG-QNXVCR',1,1,'2023-03-28','12345789 2','Ahmad C. Bahar','L','Semarang',1,'2','0','0000-00-00','Islam','Jl. Melati 3','0812346789 2',NULL,'WNI','A'),
(7,'REG-TRI2KM',1,1,'2023-03-28','12345789 3','Ahmad D. Bahar','L','Semarang',1,'2','0','0000-00-00','Islam','Jl. Melati 4','0812346789 3',NULL,'WNI','A'),
(8,'REG-KUJDCX',1,1,'2023-03-28','12345789 4','Ahmad E. Bahar','L','Semarang',1,'2','0','0000-00-00','Islam','Jl. Melati 5','0812346789 4',NULL,'WNI','A'),
(9,'REG-F9T1CP',1,1,'2023-03-28','12345789 5','Ahmad F. Bahar','L','Semarang',1,'2','0','1987-07-03','Islam','Jl. Melati 6','0812346789 5',NULL,'WNI','G'),
(10,'REG-DV2WRJ',1,1,'2023-03-28','12345789 6','Ahmad G. Bahar','L','Jakarta',1,'2','0','1988-07-02','Islam','Jl. Melati 7','0812346789 6',NULL,'WNI','G'),
(11,'REG-TPKNI7',1,1,'2023-03-28','12345789 7','Ahmad H. Bahar','L','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 8','0812346789 7',NULL,'WNI','P'),
(12,'REG-DS0KXV',1,1,'2023-03-28','12345789 8','Ahmad I. Bahar','L','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 9','0812346789 8',NULL,'WNI','P'),
(13,'REG-CVHZ1P',1,1,'2023-03-28','12345789 9','Ahmad J. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 10','0812346789 9',NULL,'WNI','P'),
(14,'REG-BR15AO',1,1,'2023-03-28','12345789 1','Ahmad K. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 11','0812346789 10',NULL,'WNI','P'),
(15,'REG-KJWIEL',1,1,'2023-03-28','12345789 1','Ahmad L. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 12','0812346789 11',NULL,'WNI','P'),
(16,'REG-A791QU',1,1,'2023-03-28','12345789 1','Ahmad M. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 13','0812346789 12',NULL,'WNI','P'),
(17,'REG-MJ5YA7',1,1,'2023-03-28','12345789 1','Ahmad N. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 14','0812346789 13',NULL,'WNI','P'),
(18,'REG-M1NFVB',1,1,'2023-03-28','12345789 1','Ahmad O. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 15','0812346789 14',NULL,'WNI','P'),
(19,'REG-WRU9F1',1,1,'2023-03-28','12345789 1','Ahmad P. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 16','0812346789 15',NULL,'WNI','P'),
(20,'REG-1CYNVN',1,1,'2023-03-28','12345789 1','Ahmad Q. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 17','0812346789 16',NULL,'WNI','P'),
(21,'REG-P4EK2W',1,1,'2023-03-28','12345789 1','Ahmad R. Bahar','P','Jakarta',1,'2','0','0000-00-00','Islam','Jl. Melati 18','0812346789 17',NULL,'WNI','P'),
(22,'REG-IHHY87',1,1,'2023-03-28','12345789 1','Ahmad S. Bahar','P','Ngawi',1,'2','0','0000-00-00','Islam','Jl. Melati 19','0812346789 18',NULL,'WNI','P'),
(23,'REG-KW5KWH',1,1,'2023-03-28','12345789 1','Ahmad S. Bahar','P','Ngawi',1,'2','0','0000-00-00','Islam','Jl. Melati 20','0812346789 19',NULL,'WNI','P');

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
('KG-QUC568','903123456','Ahmad','L','08561234567','Jl. Melati','AKTIF'),
('KG-IPN4QC','9031234509','Ahmad D. Marcel','L','08561234909','Jl. Melati 89','AKTIF'),
('KG-2MPLF7','9031234899','Ahmad U. Marcel','L','08561234787','Jl. Mawar 45','AKTIF'),
('KG-IVWC3I','9031234999','Ahmad T. Marcel','L','08561234980','Jl. Kembang 78','AKTIF'),
('KG-SGMGVA','9031234898','Siti Nur','P','08561287888','Jl. Merpati 09','AKTIF');

/*Table structure for table `tabel_hak_akses` */

DROP TABLE IF EXISTS `tabel_hak_akses`;

CREATE TABLE `tabel_hak_akses` (
  `id_hak_akses` int DEFAULT NULL,
  `akses` varchar(765) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
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
  `id_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_siswa` int NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_level` int NOT NULL,
  `id_ta` int DEFAULT NULL,
  `cek_p` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_invoice` */

insert  into `tabel_invoice`(`id_invoice`,`id_siswa`,`date`,`id_level`,`id_ta`,`cek_p`) values 
('INV0330Y9G3650',4,'2023-03-30 12:34:44',5,1,1),
('INV0330R9V3731',5,'2023-03-30 00:00:00',5,1,1),
('INV0330EZB3807',6,'2023-03-30 00:00:00',5,1,1),
('INV0403M2Y2748',8,'2023-04-03 00:00:00',5,1,1),
('INV0405RDX1145',8,'2023-04-05 10:12:16',5,1,1);

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
(4,'Dana Pokok',3,1,'m',1231313,1300000,870000,'Dana Pokok'),
(5,'Gaji Tukang Bangunan',3,1,'k',90909090,450000,400000,'Gaji Tukang Bangunan'),
(6,'Dana Bos',3,1,'m',909090,1010000,840000,'Dana Bos');

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
(1,'spp','Pembayaran SPP',1,'Pembayaran SPP',1),
(2,'ukt','Pembayaran UKT',2,'Pembayaran UKT',1);

/*Table structure for table `tabel_jenismapel` */

DROP TABLE IF EXISTS `tabel_jenismapel`;

CREATE TABLE `tabel_jenismapel` (
  `id_jenismapel` int NOT NULL AUTO_INCREMENT,
  `nama_jenismapel` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_jenismapel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenismapel` */

insert  into `tabel_jenismapel`(`id_jenismapel`,`nama_jenismapel`,`keterangan`,`status`) values 
(1,'WAJIB','Mata Pelajaran Wajib','AKTIF'),
(2,'KEJURUSAN','Mata Pelajaran Kejurusan','AKTIF');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenjang` */

insert  into `tabel_jenjang`(`id_jenjang`,`kd_jenjang`,`nama_jenjang`,`keterangan`,`id_paket`,`alamat`,`aktif`) values 
(1,'J001','SMK Bina Nusantara','SMK Bina Nusantara JL.Kemantren Raya no 4',4,'Jl. Kemantren Raya no 4',1),
(2,'J002','SD','',1,'Jl. Puyuh 08',1),
(3,'J003','SMP','',2,'Jl. Balaraja 90',1),
(4,'J004','SMA','',3,'Jl. Raya',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_kelas` */

insert  into `tabel_kelas`(`id_kelas`,`id_jenjang`,`nama_kelas`,`keterangan`,`status`) values 
(1,1,'X TKJ','Teknik Komputer Jaringan','AKTIF'),
(3,1,'XI TKJ ','','AKTIF'),
(4,1,'XII TKJ ','','AKTIF');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_level` */

insert  into `tabel_level`(`id_level`,`username`,`email`,`password`,`level`,`kode_guru`,`id_hak_akses`) values 
(1,'Admin','adminis@tra.tor','202cb962ac59075b964b07152d234b70','Admin',NULL,2),
(2,'Akademik','akademik@gmail.com','202cb962ac59075b964b07152d234b70','Kesiswaan',NULL,3),
(3,'Perpus','perpus@gmail.com','202cb962ac59075b964b07152d234b70','PetugasPerpus',NULL,4),
(4,'Guru','guru@gmail.com','202cb962ac59075b964b07152d234b70','Guru','449',5),
(5,'TU','tu@gmail.com','202cb962ac59075b964b07152d234b70','TU',NULL,6),
(6,'Alumni','alumnmi@gmail.com','202cb962ac59075b964b07152d234b70','Alumni',NULL,NULL),
(7,'Shelby','Shelby@gmail.com','698d51a19d8a121ce581499d7b701668','Guru','KG-330OSN',5),
(8,'Ahmad','Ahmad@gmail.com','bcbe3365e6ac95ea2c0343a2395834dd','Guru',NULL,5),
(9,'PetugasAlumni','adminalumnmi@gmail.com','202cb962ac59075b964b07152d234b70','PetugasAlumni',NULL,NULL),
(19,'Arga','Arga@gmail.com','a01610228fe998f515a72dd730294d87','Guru','KG-LVUMAY',5),
(20,'ar','ar@gmail.com','c20ad4d76fe97759aa27a0c99bff6710','Guru','KG-TEFKZU',5),
(21,'Test23','Test23@gmail.com','ec43638b66e16a5bbede9b710b12b0c7','Guru','KG-8GVW0P',5),
(22,'Ahmad','Ahmad@gmail.com','3afa240240487a03628ad77c37a34446','Guru','KG-QUC568',5),
(23,'Ahmad D. Marcel','Ahmad D. Marcel@gmail.com','2a86f85a1e6d9c927af8304d4bda705a','Guru','KG-IPN4QC',5),
(24,'Ahmad U. Marcel','Ahmad U. Marcel@gmail.com','a20ddc99f6ac873194f18ac4c860e1bb','Guru','KG-2MPLF7',5),
(25,'Ahmad T. Marcel','Ahmad T. Marcel@gmail.com','cf431efa0b9f27f436d284cb59cb2f83','Guru','KG-IVWC3I',5),
(26,'Siti Nur','Siti Nur@gmail.com','b9f9ea70f5102a12d83c163ae6e5552d','Guru','KG-SGMGVA',5),
(32,'Alumni2','alumnmi2@gmail.com','202cb962ac59075b964b07152d234b70','Alumni',NULL,NULL);

/*Table structure for table `tabel_lowongan` */

DROP TABLE IF EXISTS `tabel_lowongan`;

CREATE TABLE `tabel_lowongan` (
  `id_lowongan` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `nama_perusahaan` varchar(150) DEFAULT NULL,
  `bidang_usaha` varchar(150) DEFAULT NULL,
  `job_title` varchar(150) DEFAULT NULL,
  `job_slug` varchar(180) DEFAULT NULL,
  `deskripsi` text,
  `akhir_waktu` date DEFAULT NULL,
  `tanggal_posting` timestamp NULL DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `is_tampil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_lowongan` */

insert  into `tabel_lowongan`(`id_lowongan`,`id_user`,`nama_perusahaan`,`bidang_usaha`,`job_title`,`job_slug`,`deskripsi`,`akhir_waktu`,`tanggal_posting`,`gambar`,`is_tampil`) values 
(1,1,'Excellent Komputer','Komputer','Loker Excellent','loker-excellent','<p>excellent computer adalah sebuah toko komputer semarang yang memberikan layanan dan produk yang terbaik untuk para pelanggan kami, kami menyediakan produk komputer/laptop/printer dengan kualitas terbaik, dan juga kami menjadi IT Consultant, App Developer, Service Hardware. Pengumuman loker ini dibutuhkan segera. Bagi pelamar yang memenuhi kualifikasi, dapat mengumpulkan berkas lamaran. PELAMAR TIDAK DIPUNGUT BIAYA (GRATIS). </p>','2023-04-06','2023-04-03 14:57:23','https://mir-s3-cdn-cf.behance.net/user/276/5437bc435409357.5db66a8ec2332.png','YA'),
(2,2,'G2 Academy','Coding','Loker G2Academy','loker-g2','<p>Pengumuman loker ini dibutuhkan segera. Bagi pelamar yang memenuhi kualifikasi, dapat mengumpulkan berkas lamaran. PELAMAR TIDAK DIPUNGUT BIAYA (GRATIS). </p>','2023-04-06','2023-04-04 15:13:37','https://i.ytimg.com/vi/zCLy-sh9T84/maxresdefault.jpg','YA'),
(3,3,'Win\'s Computer','Desain','Loker Win\'s','loker-win\'s','Pengumuman loker ini dibutuhkan segera. Bagi pelamar yang memenuhi kualifikasi, dapat mengumpulkan berkas lamaran. PELAMAR TIDAK DIPUNGUT BIAYA (GRATIS). ','2023-04-06','2023-04-05 10:56:41','https://www.logovector.org/wp-content/uploads/2016/12/wins.png','TIDAK'),
(4,4,'Dinar Tech Syar\'i','Komputer','Loker Dinar Tech','loker-dinar ','Pengumuman loker ini dibutuhkan segera. Bagi pelamar yang memenuhi kualifikasi, dapat mengumpulkan berkas lamaran. PELAMAR TIDAK DIPUNGUT BIAYA (GRATIS). ','2023-04-03','2023-04-05 13:25:30','https://i1.wp.com/semaker.id/wp-content/uploads/2018/02/PT.-Dinar-Tech.jpg?fit=438%2C277&ssl=1','TIDAK');

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
(1,2,0,'2023-03-28'),
(2,10,0,'2023-04-03');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_mapel` */

insert  into `tabel_mapel`(`id_mapel`,`id_jenismapel`,`nama_mapel`,`keterangan`,`status`) values 
(1,1,'Matematika','','AKTIF'),
(2,1,'Fisika','','AKTIF'),
(3,1,'Biologi','','AKTIF'),
(5,1,'Kimia','','AKTIF'),
(6,2,'Jaringan Komputer','','AKTIF'),
(7,2,'WAN','','AKTIF');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_nilai` */

insert  into `tabel_nilai`(`id_nilai`,`id_rombel`,`id_siswa`,`id_mapel`,`id_semester`,`nuh1`,`nuh2`,`nuh3`,`nt1`,`nt2`,`nt3`,`mid`,`smt`,`rnuh`,`rnt`,`nh`,`nar`) values 
(5,1,4,1,1,80,80,80,80,80,80,80,80,'80','80','80','80'),
(7,1,4,2,1,80,80,80,80,80,80,80,80,'80','80','80','80'),
(8,1,4,2,2,80,80,80,80,80,80,80,80,'80','80','80','80'),
(9,1,4,1,2,80,80,80,80,80,80,80,80,'80','80','80','80');

/*Table structure for table `tabel_paketjenjang` */

DROP TABLE IF EXISTS `tabel_paketjenjang`;

CREATE TABLE `tabel_paketjenjang` (
  `id_paket` int NOT NULL AUTO_INCREMENT,
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_paketjenjang` */

insert  into `tabel_paketjenjang`(`id_paket`,`kode_paket`,`nama_paket`) values 
(1,'J001','SD'),
(2,'J002','SMP'),
(3,'J003','SMA'),
(4,'J004','SMK');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_pembayaran` */

insert  into `tabel_pembayaran`(`id_pembayaran`,`id_siswa`,`id_jenis`,`nominal`,`keterangan`,`date`,`id_ta`,`id_tf`,`id_invoice`,`id_level`,`cek_p`) values 
(1,4,1,225000,'SPP Bulan Maret','2023-03-30 14:37:08',1,'TSK03303V43708','INV0330Y9G3650',5,1),
(2,4,2,175000,'UKT Bulan Maret','2023-03-30 14:37:23',1,'TSK0330H8A3723','INV0330Y9G3650',5,1),
(3,5,1,250000,'SPP Bulan Maret','2023-03-30 14:37:50',1,'TSK0330KPZ3750','INV0330R9V3731',5,1),
(4,5,2,125000,'UKT Bulan Maret','2023-03-30 14:38:00',1,'TSK0330O203800','INV0330R9V3731',5,1),
(5,6,2,75000,'UKT Bulan Maret','2023-03-30 14:38:13',1,'TSK0330O8U3813','INV0330EZB3807',5,1),
(6,8,1,45000,'Ok','2023-04-03 10:28:00',1,'TSK0403DPJ2800','INV0403M2Y2748',5,1),
(8,8,1,75000,'ada','2023-04-05 10:17:02',1,'TSK0405O251702','INV0405RDX1145',5,1);

/*Table structure for table `tabel_pindah` */

DROP TABLE IF EXISTS `tabel_pindah`;

CREATE TABLE `tabel_pindah` (
  `id_pindah` int NOT NULL AUTO_INCREMENT,
  `id_daftar` int DEFAULT NULL,
  `id_rombel` int DEFAULT NULL,
  `nama_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_pindah`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_pindah` */

insert  into `tabel_pindah`(`id_pindah`,`id_daftar`,`id_rombel`,`nama_sekolah`) values 
(1,1,0,'SMK 1 Ngawi');

/*Table structure for table `tabel_pinjaman` */

DROP TABLE IF EXISTS `tabel_pinjaman`;

CREATE TABLE `tabel_pinjaman` (
  `id_pinjaman` int NOT NULL AUTO_INCREMENT,
  `no_pinjaman` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_anggota` int NOT NULL,
  `id_index_buku` int NOT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'DIPINJAM',
  `denda` double DEFAULT NULL,
  PRIMARY KEY (`id_pinjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_pinjaman` */

insert  into `tabel_pinjaman`(`id_pinjaman`,`no_pinjaman`,`id_anggota`,`id_index_buku`,`tgl_pinjaman`,`tgl_kembali`,`status`,`denda`) values 
(1,'0',74282,1,'2023-03-28','0000-00-00','DIPINJAM',NULL),
(2,'0',0,2,'2023-03-28','2023-03-28','DIKEMBALIKAN',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_rencana_anggaran` */

insert  into `tabel_rencana_anggaran`(`id_rencana_anggaran`,`nama_anggaran`,`awal_periode`,`akhir_periode`,`pencatat`,`status`,`tetapkan`) values 
(1,'RAB 2018/2019','2023-03-06','2023-03-07','Admin',1,0),
(2,'RAB 2019/2020','2023-03-06','2023-03-08','Admin',1,0),
(3,'RAB 2020/2021','2023-03-09','2023-03-31','Admin',1,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_rombel` */

insert  into `tabel_rombel`(`id_rombel`,`id_kelas`,`nama_rombel`,`kode_guru`,`kuota`,`status`) values 
(1,1,'X TKJ 1','KG-IVWC3I',36,'AKTIF'),
(2,1,'X TKJ 2','KG-SGMGVA',12,'AKTIF'),
(3,3,'XI TKJ 1','KG-IPN4QC',30,'AKTIF'),
(5,3,'XI TKJ 2','KG-QUC568',20,'AKTIF'),
(6,4,'XII TKJ 1 ','KG-SGMGVA',20,'AKTIF'),
(7,4,'XII TKJ 2','KG-SGMGVA',20,'AKTIF');

/*Table structure for table `tabel_sekolah` */

DROP TABLE IF EXISTS `tabel_sekolah`;

CREATE TABLE `tabel_sekolah` (
  `id_sekolah` int NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_regristasi` date DEFAULT NULL,
  `nomor_telepon` double DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_sekolah` */

insert  into `tabel_sekolah`(`id_sekolah`,`nama_sekolah`,`tanggal_regristasi`,`nomor_telepon`,`alamat`,`email_sekolah`,`foto`) values 
(1,'SMK Binusa','2010-05-18',248662971,'Jl. Kemantren Raya No.5, RT.02/RW.04, Wonosari, Kec. Ngaliyan, Kota Semarang, Jawa Tengah','smkbinusasmg@yahoo.com','1678414030885.jpg');

/*Table structure for table `tabel_semester` */

DROP TABLE IF EXISTS `tabel_semester`;

CREATE TABLE `tabel_semester` (
  `id_semester` int NOT NULL AUTO_INCREMENT,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
(4,4,1,0,'Ahmad A. Bahar'),
(5,5,2,0,'Ahmad B. Bahar'),
(6,6,3,0,'Ahmad C. Bahar'),
(7,7,5,0,'Ahmad D. Bahar'),
(8,8,7,0,'Ahmad E. Bahar');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_tahunajaran` */

insert  into `tabel_tahunajaran`(`id_angkatan`,`kd_angkatan`,`nama_angkatan`,`keterangan`,`tgl_a`,`tgl_b`,`aktif`,`status`) values 
(1,'TA2018/2019','TA 2018/2019','','2018-07-01','2019-06-30',0,'AKTIF'),
(2,'TA2019/2020','TA 2019/2020','','2019-01-28','2020-01-28',0,'AKTIF'),
(3,'TA2020/2021','TA 2020/2021','','2020-01-28','2021-01-28',0,'AKTIF'),
(4,'TA2021/2022','TA 2021/2022','','2021-01-28','2022-01-28',1,'AKTIF'),
(5,'TA2022/2023','TA 2022/2023','','2022-01-28','2023-01-28',0,'NONAKTIF');

/*Table structure for table `tabel_testimoni` */

DROP TABLE IF EXISTS `tabel_testimoni`;

CREATE TABLE `tabel_testimoni` (
  `id_testimoni` int DEFAULT NULL,
  `id_alumni` int DEFAULT NULL,
  `pesan` varchar(765) DEFAULT NULL,
  `tampil` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_testimoni` */

/*Table structure for table `tabel_transaksi` */

DROP TABLE IF EXISTS `tabel_transaksi`;

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_anggaran` int DEFAULT NULL,
  `debet` int NOT NULL DEFAULT '0',
  `kredit` int NOT NULL DEFAULT '0',
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uraian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pencatat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_akun` int NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_transaksi` */

insert  into `tabel_transaksi`(`id_transaksi`,`id_anggaran`,`debet`,`kredit`,`waktu`,`uraian`,`pencatat`,`id_akun`) values 
(1,1,0,123000,'2023-03-15 09:03:19','Dana Hibah','tu@gmail.com',1),
(2,1,123000,0,'2023-03-15 09:03:19','Dana Hibah','tu@gmail.com',1),
(3,4,0,143000,'2023-03-15 09:04:14','Dana Pokok','tu@gmail.com',3),
(4,4,143000,0,'2023-03-15 09:04:14','Dana Pokok','tu@gmail.com',2),
(5,1,0,78000,'2023-03-15 09:13:24','Dana Hibah','tu@gmail.com',1);

/*Table structure for table `table_buku` */

DROP TABLE IF EXISTS `table_buku`;

CREATE TABLE `table_buku` (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penerbit_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penulis_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_terbit` int DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok` int DEFAULT '0',
  `del_flag` int NOT NULL DEFAULT '1',
  `kategori_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rak_buku_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_buku` */

insert  into `table_buku`(`id_buku`,`judul_buku`,`penerbit_buku`,`penulis_buku`,`tahun_terbit`,`keterangan`,`sumber`,`stok`,`del_flag`,`kategori_id`,`rak_buku_id`,`created_at`,`foto`) values 
(12,'Sri Asih','MBC Group','Joko Puspito',2018,'Alana tidak mengerti mengapa dia selalu dikuasai oleh kemarahan. Tapi dia selalu berusaha untuk melawannya. Dia lahir saat letusan gunung berapi yang memisahkan dia dan orang tuanya. Dia kemudian diadopsi oleh seorang wanita kaya yang berusaha membantunya',NULL,0,1,'Novel Action','002','2023-03-28 07:13:11','1679987591723.jpg'),
(13,'Tiga Sandra Terakhir','Noura Publishing','Brahmanto Anindito',2015,'Tiga Sandera Terakhir adalah sebuah novel thriller-militer karya Brahmanto Anindito yang diterbitkan pertama pada 2015 oleh Noura Publishing, Jakarta. Novel bersubjudul Terinspirasi dari Konflik Berdarah di Timur Indonesia ini menceritakan sebuah drama pe',NULL,0,1,'Novel Action','002','2023-03-28 07:16:37','1679987797810.jpg'),
(14,'Atlas','MBC Group','Ariestotoles',2017,'Atlas adalah kumpulan peta yang disatukan dalam bentuk buku, tetapi juga ditemukan dalam bentuk multimedia. Atlas dapat memuat informasi geografi, batas negara, statisik geopolitik, sosial, agama dan ekonomi.',NULL,0,1,'Ilmu Pengetahuan','001','2023-03-28 07:17:57','1679987877012.jpg'),
(15,'Kebebasan Ilmu Pengetahuan & Teknolgi','MBC Group','Joko Puspito',2018,'Sebuah Esai Etika',NULL,0,1,'Ilmu Pengetahuan','001','2023-03-28 07:21:40','1679988100523.jpg'),
(16,'Kita Pergi Hari ini','MBC Group','Ziggy Z.',2020,'Mi dan Ma dan Mo tidak pernah melihat kucing seperti Nona Gigi. Tentu saja, mereka sudah pernah melihat kucing biasa. Tapi Nona Gigi adalah Kucing Luar Biasa. Kucing Luar Biasa berarti kucing yang di luar kebiasaan. Nona Gigi adalah Cara Lain yang dinanti',NULL,0,1,'Novel Romance','002','2023-03-28 07:23:45','1679988225192.jpg'),
(17,'Luka Cita','Gramedia',' Valerie Patkar',2019,'Untuk mereka yang berhasil menggapai cita-cita, tetapi masih terluka karenanya. Lukacita bercerita tentang para pemimpi yang dikhianati cita-cita mereka sendiri. Ada seorang pendiri perusahaan startup idealis bernama Javier dan seorang mantan atlet catur ',NULL,1,1,'Novel Romance','002','2023-03-28 07:29:04','1679988544943.jpg');

/*Table structure for table `table_detail_index_buku` */

DROP TABLE IF EXISTS `table_detail_index_buku`;

CREATE TABLE `table_detail_index_buku` (
  `id_stok` int NOT NULL AUTO_INCREMENT,
  `id_detail_index_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id_stok`),
  KEY `id_buku` (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_detail_index_buku` */

insert  into `table_detail_index_buku`(`id_stok`,`id_detail_index_buku`,`status`,`id_buku`) values 
(1,'A01','Di Pinjam',12),
(2,'A03','Di Rak Buku',17);

/*Table structure for table `table_kategori_buku` */

DROP TABLE IF EXISTS `table_kategori_buku`;

CREATE TABLE `table_kategori_buku` (
  `id_kategori_buku` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_kategori_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_kategori_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_kategori_buku` */

insert  into `table_kategori_buku`(`id_kategori_buku`,`nama_kategori_buku`,`keterangan_kategori_buku`,`del_flag`) values 
(4,'Ilmu Pengetahuan',' Buku Ilmu Pengetahuan',1),
(5,'Novel Romance','Novel Romantis',1),
(6,'Dongeng Lokal','Dongeng Lokal',1),
(7,'Majalah Terbaru','Majalah Terbaru',1),
(8,'Komik Fiksi','Komik Fiksi',1),
(9,'Manga','Manga JPN',1),
(10,'Novel Action','Novel Berandrelain',1),
(11,'Sejarah','Sejarah',1);

/*Table structure for table `table_rak_buku` */

DROP TABLE IF EXISTS `table_rak_buku`;

CREATE TABLE `table_rak_buku` (
  `id_rak_buku` int NOT NULL AUTO_INCREMENT,
  `nama_rak_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_rak_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rak_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_rak_buku` */

insert  into `table_rak_buku`(`id_rak_buku`,`nama_rak_buku`,`keterangan_rak_buku`,`del_flag`) values 
(6,'001','Ilmu Pengetahuan',1),
(7,'002','Cerita',1),
(8,'003','Majalah',1),
(9,'004','Komik',1);

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

/* Trigger structure for table `stok_buku_keluar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `t_keluar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `t_keluar` AFTER INSERT ON `stok_buku_keluar` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok - 1
   WHERE id_buku = NEW.id_buku;
END */$$


DELIMITER ;

/* Trigger structure for table `stok_buku_masuk` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `t_masuk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `t_masuk` AFTER INSERT ON `stok_buku_masuk` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok + 1
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
