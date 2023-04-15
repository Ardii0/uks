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

/*Table structure for table `kembalikan` */

DROP TABLE IF EXISTS `kembalikan`;

CREATE TABLE `kembalikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kembalikan` */

insert  into `kembalikan`(`id`,`id_buku`) values 
(2,1),
(3,3),
(4,3),
(5,4),
(6,1);

/*Table structure for table `pinjam` */

DROP TABLE IF EXISTS `pinjam`;

CREATE TABLE `pinjam` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pinjam` */

insert  into `pinjam`(`id`,`id_buku`) values 
(3,6),
(4,1),
(5,6),
(6,3),
(7,3),
(8,4),
(9,1);

/*Table structure for table `setting_perpustakaan` */

DROP TABLE IF EXISTS `setting_perpustakaan`;

CREATE TABLE `setting_perpustakaan` (
  `id_setting_perpus` int NOT NULL AUTO_INCREMENT,
  `maksimal_pengembalian_hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `denda` double DEFAULT NULL,
  PRIMARY KEY (`id_setting_perpus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setting_perpustakaan` */

insert  into `setting_perpustakaan`(`id_setting_perpus`,`maksimal_pengembalian_hari`,`denda`) values 
(1,'7',5000);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_akun` */

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_alokasiguru` */

insert  into `tabel_alokasiguru`(`id_alokasiguru`,`kode_guru`,`id_mapel`) values 
(8,'KG-VNKIWZ',8),
(9,'KG-VNKIWZ',9),
(10,'KG-VNKIWZ',10),
(11,'KG-VNKIWZ',11),
(12,'KG-VNKIWZ',12),
(13,'KG-VNKIWZ',13),
(14,'KG-VNKIWZ',14);

/*Table structure for table `tabel_alokasimapel` */

DROP TABLE IF EXISTS `tabel_alokasimapel`;

CREATE TABLE `tabel_alokasimapel` (
  `id_alokasimapel` int NOT NULL AUTO_INCREMENT,
  `id_mapel` int NOT NULL,
  `id_kelas` int NOT NULL,
  PRIMARY KEY (`id_alokasimapel`,`id_mapel`,`id_kelas`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `tabel_alokasimapel_to_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  CONSTRAINT `tabel_alokasimapel_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_alokasimapel` */

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_daftar` */

insert  into `tabel_daftar`(`id_daftar`,`no_reg`,`id_angkatan`,`id_jenjang`,`tgl_daftar`,`nisn`,`nama`,`jekel`,`tempat_lahir`,`anak_ke`,`saudara_kandung`,`saudara_angkat`,`tgl_lahir`,`agama`,`alamat`,`telepon`,`foto`,`warga_negara`,`diterima`) values 
(24,'REG-BEIJXD',4,1,'2021-06-21','856936','Irvanda Ibrahim','L','Tambak Haji ',2,'4','0','2005-05-03','Islam','Jl. Puncak Sari RT02/RW13','089646344200','1681267504461.jpg','WNI','A'),
(25,'REG-CZ173Q',4,1,'2021-06-30','768592','Helmi Abdillah','L','Semarang',2,'2','0','2005-10-19','Islam','Jl.Tamai Raya','08747475757','1681267415133.jpg','WNI','S'),
(27,'REG-DQRHL3',4,1,'2021-06-30','768592','Azizi Khoiri','L','Semarang',2,'2','0','2005-10-19','Islam','Jl.Tamai Raya','08747475757','1681267388095.jpg','WNI','A'),
(28,'REG-AZ41WL',4,1,'2021-06-30','768592','Secondta Ardiansyah Wicaksono','L','Semarang',2,'2','0','2005-10-19','Islam','Jl.Tamai Raya','08747475757','1681267457650.jpg','WNI','P'),
(29,'REG-QNXVCR',4,1,'2021-06-30','768592','Muhammad Ardi Setiawan','L','Semarang',2,'2','0','2005-10-19','Islam','Jl.Tamai Raya','08747475757','1681267487051.jpg','WNI','P');

/*Table structure for table `tabel_event` */

DROP TABLE IF EXISTS `tabel_event`;

CREATE TABLE `tabel_event` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_slug` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_event` date NOT NULL,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gambar` varchar(200) NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('KG-Z4XFYE','324123','Raga Suci Al-Ghali','L','085875258684','Jl. Pudakpayung 07 RT03/RW01','AKTIF'),
('KG-K5AIDV','312312','Arga Dian Setyo Wicaksono','L','085801565981','Jl. Tanahmas RT02/RW06','AKTIF'),
('KG-72IIMM','441234','Ida Fahru Roziyah','P','082584778212','Jl. Kumambang Raya 01 RT12/RW02','AKTIF'),
('KG-VNKIWZ','312312','Soimatun','P','084312762267','Jl. Kembang Raya 09 RT04/RW03','AKTIF'),
('KG-RP3X25','884564','Riyan Suryo Andono','L','084312762233','Jl. Kalibanteng Kidul 08 RT01/RW02','AKTIF'),
('KG-V6Y488','782514','Tito Dwi Yulianto','L','08238475223','Jl. Palangkaraya 12 RT08/RW12                                                                                                                                                                ','AKTIF'),
('KG-AH9TQ4','345632','Ade Sucipto','L','089453725173','Jl. Mangkang Raya 09 RT07/RW02','AKTIF');

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
  `date` date DEFAULT NULL,
  `id_level` int NOT NULL,
  `id_ta` int DEFAULT NULL,
  `cek_p` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_invoice` */

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
(1,'SPP','SPP',1,'Pembayaran SPP',1),
(2,'UKT','UKT',2,'Pembayaran UKT',1);

/*Table structure for table `tabel_jenismapel` */

DROP TABLE IF EXISTS `tabel_jenismapel`;

CREATE TABLE `tabel_jenismapel` (
  `id_jenismapel` int NOT NULL AUTO_INCREMENT,
  `nama_jenismapel` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_jenismapel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenismapel` */

insert  into `tabel_jenismapel`(`id_jenismapel`,`nama_jenismapel`,`keterangan`,`status`) values 
(3,'Wajib','Jenis Mata Pelajaran Wajib','AKTIF'),
(4,'Kejurusan','Jenis Mata Pelajaran Kejurusan','AKTIF');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_jenjang` */

insert  into `tabel_jenjang`(`id_jenjang`,`kd_jenjang`,`nama_jenjang`,`keterangan`,`id_paket`,`alamat`,`aktif`) values 
(1,'J001','SMK Bina Nusantara','SMK Bina Nusantara JL.Kemantren Raya no 4',1,'Jl. Kemantren Raya no 4',1);

/*Table structure for table `tabel_kelas` */

DROP TABLE IF EXISTS `tabel_kelas`;

CREATE TABLE `tabel_kelas` (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `id_tingkat` int NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `keterangan` text,
  `status` enum('AKTIF','NONAKTIF','','') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_kelas`,`id_tingkat`),
  KEY `id_tingkat` (`id_tingkat`),
  CONSTRAINT `tabel_kelas_to_tingkat` FOREIGN KEY (`id_tingkat`) REFERENCES `tabel_tingkat` (`id_tingkat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_kelas` */

insert  into `tabel_kelas`(`id_kelas`,`id_tingkat`,`nama_kelas`,`keterangan`,`status`) values 
(1,1,'TKJ I','Teknik Komputer dan Jaringan','AKTIF'),
(2,2,'AKL','Akuntansi dan  Lembaga','AKTIF'),
(3,3,'TBSM','Teknik Bisnis dan Sepeda Motor','AKTIF');

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
  `foto` text,
  PRIMARY KEY (`id_level`),
  KEY `tabel_level_to_guru` (`kode_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_level` */

insert  into `tabel_level`(`id_level`,`username`,`email`,`password`,`level`,`kode_guru`,`id_hak_akses`,`foto`) values 
(1,'Admin','adminis@tra.tor','202cb962ac59075b964b07152d234b70','Admin',NULL,2,NULL),
(2,'Akademik','akademik@gmail.com','202cb962ac59075b964b07152d234b70','Kesiswaan',NULL,3,NULL),
(3,'Perpus','perpus@gmail.com','202cb962ac59075b964b07152d234b70','PetugasPerpus',NULL,4,NULL),
(4,'Guru','guru@gmail.com','202cb962ac59075b964b07152d234b70','Guru','449',5,NULL),
(5,'TU','tu@gmail.com','202cb962ac59075b964b07152d234b70','TU',NULL,6,NULL),
(6,'Alumni','alumnmi@gmail.com','202cb962ac59075b964b07152d234b70','Alumni',NULL,NULL,NULL),
(27,'Raga Suci Al-Ghali','RagaSuciAl-Ghali@gmail.com','217cb94a01679e396c2287e2b67fa3ec','Guru','KG-Z4XFYE',5,NULL),
(28,'Vegas Media Arga','VegasMediaArga@gmail.com','fa61f827f0f5373133b11cc20d835a79','Guru','KG-K5AIDV',5,NULL),
(29,'Ida Fahru Roziyah,S.Pd','IdaFahruRoziyah,S.Pd@gmail.com','738754a8dc187735701c05a35e80aff9','Guru','KG-72IIMM',5,NULL),
(30,'Soimatun','Soimatuh,S.Pd@gmail.com','fa61f827f0f5373133b11cc20d835a79','Guru','KG-VNKIWZ',5,NULL),
(31,'Riyan Suryo Andono','RiyanSuryoAndono@gmail.com','33c2cbd53687980928c13725dde63ba1','Guru','KG-RP3X25',5,NULL),
(32,'Tito Dwi Yulianto','TitoDwiYulianto@gmail.com','d3b653b71dcfd8d90320d6c69090403b','Guru','KG-V6Y488',5,NULL),
(33,'Ade Sucipto','AdeSucipto@gmail.com','7427dfd74090b72827f684cd2fdab748','Guru','KG-AH9TQ4',5,NULL);

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
  `is_tampil` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_lowongan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_lowongan` */

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
(8,3,'Matematika','Mata Pelajaran Matematika','AKTIF'),
(9,3,'Bahasa Indonesia','Mata Pelajaran Bahasa Indonesia','AKTIF'),
(10,4,'ASJ','Mata Pelajaran Adminstarsi Sistem Jaringan','AKTIF'),
(11,4,'Simdig','Mata Pelajaran Simulasi Digital','AKTIF'),
(12,4,'Pemrograman Dasar','Mata Pelajaran Pemrograman Dasar','AKTIF'),
(13,3,'Bahasa Inggris','Mata Pelajaran Bahasa Inggris','AKTIF'),
(14,3,'PAI','Mata Pelajaran Pendidikan Agama Islam','AKTIF');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_nilai` */

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
(1,'J001','SMK');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_pembayaran` */

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

/*Table structure for table `tabel_pinjaman` */

DROP TABLE IF EXISTS `tabel_pinjaman`;

CREATE TABLE `tabel_pinjaman` (
  `id_pinjaman` int NOT NULL AUTO_INCREMENT,
  `no_pinjaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_anggota` int NOT NULL,
  `id_index_buku` int NOT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'DIPINJAM',
  `denda` double DEFAULT NULL,
  PRIMARY KEY (`id_pinjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_pinjaman` */

insert  into `tabel_pinjaman`(`id_pinjaman`,`no_pinjaman`,`id_anggota`,`id_index_buku`,`tgl_pinjaman`,`tgl_kembali`,`status`,`denda`) values 
(3,'PMJ-ITGZX7',95774,8,'2023-04-12','2023-04-12','DIKEMBALIKAN',0),
(4,'PMJ-X45Z81',9980,10,'2023-04-12','2023-04-12','DIKEMBALIKAN',0),
(6,'PMJ-HYKUBY',95774,11,'2023-04-02','2023-04-12','DIKEMBALIKAN',0),
(7,'PMJ-674OLF',9980,8,'2023-03-31','2023-04-12','DIKEMBALIKAN',25000);

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
  `id_kelas` int DEFAULT NULL,
  `saldo_tabungan` int NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `id_daftar` (`id_daftar`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `tabel_siswa_to_daftar_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tabel_daftar` (`id_daftar`),
  CONSTRAINT `tabel_siswa_to_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_siswa` */

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

/*Table structure for table `tabel_tingkat` */

DROP TABLE IF EXISTS `tabel_tingkat`;

CREATE TABLE `tabel_tingkat` (
  `id_tingkat` int NOT NULL AUTO_INCREMENT,
  `nama_tingkat` varchar(255) NOT NULL,
  `id_jenjang` int NOT NULL,
  `keterangan` text,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_tingkat`,`id_jenjang`),
  KEY `id_jenjang` (`id_jenjang`),
  CONSTRAINT `tabel_tingkat_to_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tabel_jenjang` (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_tingkat` */

insert  into `tabel_tingkat`(`id_tingkat`,`nama_tingkat`,`id_jenjang`,`keterangan`,`status`) values 
(1,'X',1,'Tingkat X','AKTIF'),
(2,'XI',1,'Tingkat XI','AKTIF'),
(3,'XII',1,'Tingkat XII','AKTIF');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_buku` */

insert  into `table_buku`(`id_buku`,`judul_buku`,`penerbit_buku`,`penulis_buku`,`tahun_terbit`,`keterangan`,`sumber`,`stok`,`del_flag`,`kategori_id`,`rak_buku_id`,`created_at`,`foto`) values 
(1,'Sri Asih','MBC Group','Joko Puspito',2018,'Alana tidak mengerti mengapa dia selalu dikuasai oleh kemarahan. Tapi dia selalu berusaha untuk melawannya. Dia lahir saat letusan gunung berapi yang memisahkan dia dan orang tuanya. Dia kemudian diadopsi oleh seorang wanita kaya yang berusaha membantunya',NULL,2,1,'12','002','2023-03-28 07:13:11','1679987591723.jpg'),
(2,'Tiga Sandra Terakhir','Noura Publishing','Brahmanto Anindito',2015,'Tiga Sandera Terakhir adalah sebuah novel thriller-militer karya Brahmanto Anindito yang diterbitkan pertama pada 2015 oleh Noura Publishing, Jakarta. Novel bersubjudul Terinspirasi dari Konflik Berdarah di Timur Indonesia ini menceritakan sebuah drama pe',NULL,0,1,'12','002','2023-03-28 07:16:37','1679987797810.jpg'),
(3,'Atlas','MBC Group','Ariestotoles',2017,'Atlas adalah kumpulan peta yang disatukan dalam bentuk buku, tetapi juga ditemukan dalam bentuk multimedia. Atlas dapat memuat informasi geografi, batas negara, statisik geopolitik, sosial, agama dan ekonomi.',NULL,1,1,'12','001','2023-03-28 07:17:57','1679987877012.jpg'),
(4,'Kebebasan Ilmu Pengetahuan & Teknolgi','MBC Group','Joko Puspito',2018,'Sebuah Esai Etika',NULL,1,1,'13','001','2023-03-28 07:21:40','1679988100523.jpg'),
(5,'Kita Pergi Hari ini','MBC Group','Ziggy Z.',2020,'Mi dan Ma dan Mo tidak pernah melihat kucing seperti Nona Gigi. Tentu saja, mereka sudah pernah melihat kucing biasa. Tapi Nona Gigi adalah Kucing Luar Biasa. Kucing Luar Biasa berarti kucing yang di luar kebiasaan. Nona Gigi adalah Cara Lain yang dinanti',NULL,0,1,'13','002','2023-03-28 07:23:45','1679988225192.jpg'),
(6,'Luka Cita','Gramedia',' Valerie Patkar',2019,'Untuk mereka yang berhasil menggapai cita-cita, tetapi masih terluka karenanya. Lukacita bercerita tentang para pemimpi yang dikhianati cita-cita mereka sendiri. Ada seorang pendiri perusahaan startup idealis bernama Javier dan seorang mantan atlet catur ',NULL,0,1,'14','002','2023-03-28 07:29:04','1679988544943.jpg');

/*Table structure for table `table_detail_index_buku` */

DROP TABLE IF EXISTS `table_detail_index_buku`;

CREATE TABLE `table_detail_index_buku` (
  `id_stok` int NOT NULL AUTO_INCREMENT,
  `id_detail_index_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_buku` int NOT NULL,
  PRIMARY KEY (`id_stok`),
  KEY `id_buku` (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_detail_index_buku` */

insert  into `table_detail_index_buku`(`id_stok`,`id_detail_index_buku`,`status`,`id_buku`) values 
(8,'A01','Di Rak Buku',1),
(9,'A02','Di Rak Buku',1),
(10,'0A1','Di Rak Buku',3),
(11,'0A1','Di Rak Buku',4);

/*Table structure for table `table_kategori_buku` */

DROP TABLE IF EXISTS `table_kategori_buku`;

CREATE TABLE `table_kategori_buku` (
  `id_kategori_buku` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_kategori_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_kategori_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_kategori_buku` */

insert  into `table_kategori_buku`(`id_kategori_buku`,`nama_kategori_buku`,`keterangan_kategori_buku`,`del_flag`) values 
(12,'Novel','Kategori Buku Novel',1),
(13,'Dongeng','Kategori Buku Dongeng',1),
(14,'Komik','Kategori Buku Komik',1),
(15,'Ilmu Pengetahuan','Kategori Buku Ilmu Pengetahuan',1);

/*Table structure for table `table_rak_buku` */

DROP TABLE IF EXISTS `table_rak_buku`;

CREATE TABLE `table_rak_buku` (
  `id_rak_buku` int NOT NULL AUTO_INCREMENT,
  `nama_rak_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_rak_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rak_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `table_rak_buku` */

insert  into `table_rak_buku`(`id_rak_buku`,`nama_rak_buku`,`keterangan_rak_buku`,`del_flag`) values 
(10,'001','Rak No 001',1),
(11,'002','Rak No 002',1),
(12,'003','Rak No 003',1),
(13,'004','Rak No 004',1),
(14,'005','Rak No 005',1);

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
