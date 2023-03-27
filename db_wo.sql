-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 02:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wo`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `foto1`, `foto2`, `foto3`, `foto4`, `date_created`) VALUES
(1, '1668140193197.jpg', '1668150950359.jpg', '1668150966234.jpg', 'kelasss 4', '2022-11-10 07:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `kembalikan`
--

CREATE TABLE `kembalikan` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kembalikan`
--

INSERT INTO `kembalikan` (`id`, `id_buku`) VALUES
(1, 4),
(2, 4);

--
-- Triggers `kembalikan`
--
DELIMITER $$
CREATE TRIGGER `kembalikan_stok` AFTER INSERT ON `kembalikan` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok + 1
   WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id`, `id_buku`) VALUES
(1, 4),
(2, 4),
(3, 5);

--
-- Triggers `pinjam`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `pinjam` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok - 1
   WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `setting_perpustakaan`
--

CREATE TABLE `setting_perpustakaan` (
  `id_setting_perpus` int(11) NOT NULL,
  `maksimal_pengembalian_hari` varchar(255) DEFAULT NULL,
  `denda` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_perpustakaan`
--

INSERT INTO `setting_perpustakaan` (`id_setting_perpus`, `maksimal_pengembalian_hari`, `denda`) VALUES
(1, '10', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akun`
--

CREATE TABLE `tabel_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(255) DEFAULT NULL,
  `jenis_akun` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_akun`
--

INSERT INTO `tabel_akun` (`id_akun`, `nama_akun`, `jenis_akun`, `status`) VALUES
(5, 'Kas', 'Kas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alokasiguru`
--

CREATE TABLE `tabel_alokasiguru` (
  `id_alokasiguru` int(11) NOT NULL,
  `kode_guru` varchar(255) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_alokasiguru`
--

INSERT INTO `tabel_alokasiguru` (`id_alokasiguru`, `kode_guru`, `id_mapel`) VALUES
(63, 'KG-330OSN', 9),
(66, '449', 9),
(67, '449', 10),
(68, '450', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alokasimapel`
--

CREATE TABLE `tabel_alokasimapel` (
  `id_alokasimapel` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_alokasimapel`
--

INSERT INTO `tabel_alokasimapel` (`id_alokasimapel`, `id_mapel`, `id_rombel`) VALUES
(12, 9, 2),
(13, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_anggota`
--

CREATE TABLE `tabel_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `date` date DEFAULT (curdate()),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_anggota`
--

INSERT INTO `tabel_anggota` (`id_anggota`, `id_siswa`, `date`, `status`) VALUES
(9923, 8, '2023-03-24', 1),
(199, 1, '2023-03-24', 1),
(875, 7, '2023-03-24', 1),
(863, 9, '2023-03-24', 1),
(31271, 6, '2023-03-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_daftar`
--

CREATE TABLE `tabel_daftar` (
  `id_daftar` int(11) NOT NULL,
  `no_reg` varchar(100) NOT NULL,
  `id_angkatan` int(11) DEFAULT NULL,
  `id_jenjang` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jekel` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `saudara_kandung` varchar(255) DEFAULT NULL,
  `saudara_angkat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `warga_negara` varchar(255) DEFAULT NULL,
  `diterima` varchar(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_daftar`
--

INSERT INTO `tabel_daftar` (`id_daftar`, `no_reg`, `id_angkatan`, `id_jenjang`, `tgl_daftar`, `nisn`, `nama`, `jekel`, `tempat_lahir`, `anak_ke`, `saudara_kandung`, `saudara_angkat`, `tgl_lahir`, `agama`, `alamat`, `telepon`, `foto`, `warga_negara`, `diterima`) VALUES
(2, '12', 1, 3, '2023-02-18', '213', 'Ahmad Jay', 'L', 'Los Angel', 1, '1', '1', '2023-03-11', 'Islam', 'Jl.Roti Burger Ayam', '123', '1677472666712.png', 'WNI', 'Y'),
(3, '313', 1, 3, '2023-02-28', '3123', 'Irvanda', 'L', 'Taman', 1, '4', '0', '2023-03-03', 'Islam', 'Taman', '08989898', NULL, 'WNI', 'A'),
(6, '2334233', 1, 5, '2023-03-01', '34534545', 'Rizqi', 'L', 'Semarang', 2, 'ada', 'ada', '2003-11-11', 'Islam', 'Mangkang', '089765543321', '1677650453679.png', 'WNI', 'M'),
(7, '2334233', 1, 5, '2023-03-01', '34534545', 'Rizqi', 'L', 'Semarang', 2, 'ada', 'ada', '2003-11-11', 'Islam', 'Mangkang', '089765543321', '1677650453679.png', 'WNI', 'L'),
(10, '1213221', 1, 5, '2023-03-01', '31312', 'Ahmad Subardjo', 'L', 'Los Angel', 1, '1', '1', '2023-03-11', 'Islam', 'Jl.Tamai Raya', '09282734851', '1678519397023.jpg', 'WNI', 'A'),
(11, '123', 1, 1, '2023-03-16', '2', 'ShoeFantasy', 'L', 'sSfd', 1, '1', '1', '2023-03-30', 'Kristen', 'Jl.Tamai Raya', '09282734851', '1678850687584.jpg', 'WNI', 'S'),
(12, '12313', 1, 9, '2023-03-01', '9878', 'Arya', 'L', 'Los Angel', 1, '2', '1', '2023-03-02', 'Islam', 'JL. Jakarta', '09282734851', '1678870842225.jpg', 'WNI', 'T'),
(13, 'REG-3NBD40', 1, 1, '2023-03-16', '45345', 'ada', 'L', 'Los Angel', 2, '2', '2', '2023-03-24', 'Islam', 'p', '09282734851', '1679367084036.jpg', 'WNI', 'A'),
(15, 'REG-R4TMYY', 6, 5, '0000-00-00', '12312', 'Kevin Sanjaya', 'L', 'Los Angel', 1, '2', '3', '2023-03-21', 'Islam', 'Jl.pekan sari', '09282734851', NULL, 'WNI', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_guru`
--

CREATE TABLE `tabel_guru` (
  `kode_guru` varchar(255) DEFAULT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jekel` enum('L','P') DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` enum('AKTIF','NONAKTIF') DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_guru`
--

INSERT INTO `tabel_guru` (`kode_guru`, `nip`, `nama_guru`, `jekel`, `no_hp`, `alamat`, `status`) VALUES
('450', '3242134', 'Eko', 'L', '08932422342', 'Ungaran', 'AKTIF'),
('451', '32333', 'Ahmad', 'L', '087884635', 'Jl.Tamai Raya', 'AKTIF'),
('453', '222', 'Ahmad', 'L', '0893847522', '', 'AKTIF'),
('455', '1212', 'Test', 'L', '1212', 'Jl.Tamai Raya', 'AKTIF'),
('KG-69U9HX', '1414', 'Test', 'L', '0893847522', 'Jl.Roti Burger Ayam', 'AKTIF'),
('KG-330OSN', '21312', 'Shelby', 'L', '1212', 'Jl.Tamai Raya', 'AKTIF'),
('KG-3MKQ3P', '111', 'Test23', 'L', '222', 'Jl.Tamai Raya', 'AKTIF'),
('KG-QQRODS', '123', 'Test', 'L', '0893847522', 'Jl.Tamai Raya', 'AKTIF'),
('KG-LVUMAY', '1212', 'Arga', 'L', '0893847522', '', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_hak_akses`
--

CREATE TABLE `tabel_hak_akses` (
  `id_hak_akses` int(11) DEFAULT NULL,
  `akses` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_hak_akses`
--

INSERT INTO `tabel_hak_akses` (`id_hak_akses`, `akses`) VALUES
(1, '-'),
(2, 'Admin'),
(3, 'Kesiswaan'),
(4, 'PetugasPerpus'),
(5, 'Guru'),
(6, 'TU');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_invoice`
--

CREATE TABLE `tabel_invoice` (
  `id_invoice` varchar(255) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `date` date DEFAULT (curdate()),
  `id_level` int(11) NOT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `cek_p` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_invoice`
--

INSERT INTO `tabel_invoice` (`id_invoice`, `id_siswa`, `date`, `id_level`, `id_ta`, `cek_p`) VALUES
('INV0318KGO2144', 1, '2023-03-19', 5, 1, 1),
('INV0318RST2235', 1, '2023-03-19', 5, 1, 1),
('INV031892F2244', 1, '2023-03-19', 5, 1, 1),
('INV0319P4I3006', 1, '2023-03-19', 5, 1, 1),
('INV0319XSY3546', 1, '2023-03-19', 5, 1, 1),
('INV031988B3717', 1, '2023-03-19', 5, 1, 1),
('INV0319V9Q0017', 2, '2023-03-19', 5, 0, 1),
('INV0319H8Y0133', 2, '2023-03-19', 5, 0, 1),
('INV0319L3I0249', 6, '2023-03-19', 5, 1, 1),
('INV031903H4605', 5, '2023-03-19', 5, 0, 1),
('INV0319T4W4609', 5, '2023-03-19', 5, 0, 1),
('INV0320H213525', 5, '2023-03-20', 5, 0, 1),
('INV03236WP0544', 8, '2023-03-24', 1, 0, 1),
('INV0323MSV1842', 8, '2023-03-22', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenisbayar`
--

CREATE TABLE `tabel_jenisbayar` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(3) DEFAULT NULL,
  `nama_jenis` varchar(25) DEFAULT NULL,
  `tipe_jenis` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_jenisbayar`
--

INSERT INTO `tabel_jenisbayar` (`id_jenis`, `kode_jenis`, `nama_jenis`, `tipe_jenis`, `keterangan`, `status`) VALUES
(1, 'ada', 'Pembayaran SPP', 1, NULL, 1),
(2, 'okk', 'Pembayaran UKT', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenismapel`
--

CREATE TABLE `tabel_jenismapel` (
  `id_jenismapel` int(11) NOT NULL,
  `nama_jenismapel` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_jenismapel`
--

INSERT INTO `tabel_jenismapel` (`id_jenismapel`, `nama_jenismapel`, `keterangan`, `status`) VALUES
(1, 'Wajib', 'Semangat Brother', 'AKTIF'),
(2, 'Bebas', 'Silahkan Kalau Mau hehe', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis_transaksi`
--

CREATE TABLE `tabel_jenis_transaksi` (
  `id` int(11) NOT NULL,
  `nama_jenis_transaksi` varchar(200) NOT NULL,
  `rencana_anggaran` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `jenis_transaksi` enum('m','k') NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_jenis_transaksi`
--

INSERT INTO `tabel_jenis_transaksi` (`id`, `nama_jenis_transaksi`, `rencana_anggaran`, `status`, `jenis_transaksi`, `nominal`, `debit`, `kredit`, `keterangan`) VALUES
(1, 'Dana Hibah', 1, 1, 'm', 500000, 600000, 230000, 'Deskripsi Rancana Anggaran\r\n'),
(2, 'Gaji Staff', 1, 1, 'k', 500000, 760000, 210000, 'Deskripsi Rancana Anggaran\r\n'),
(3, 'Gaji Guru', 3, 1, 'k', 500000, 180000, 900000, 'Deskripsi Rancana Anggaran\r\n'),
(4, 'Dana Pokok', 3, 1, 'm', 1231313, 1300000, 870000, 'MAIDAKWDI'),
(5, 'Gaji Tukang Bangunan', 3, 1, 'k', 90909090, 450000, 400000, 'jdjdjdjd'),
(6, 'Dana Bos', 3, 1, 'm', 909090, 1010000, 840000, 'Tes');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenjang`
--

CREATE TABLE `tabel_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `kd_jenjang` varchar(50) NOT NULL,
  `nama_jenjang` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_paket` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `aktif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_jenjang`
--

INSERT INTO `tabel_jenjang` (`id_jenjang`, `kd_jenjang`, `nama_jenjang`, `keterangan`, `id_paket`, `alamat`, `aktif`) VALUES
(1, 'J001', 'SD Mekar Sari', 'Sekolah Dasar', 2, 'Jl. Sd kemantren', 1),
(3, 'J002', 'SMP Sehat Mekar Percaya', 'Sekolah Menengah Pertama', 1, 'Jl. Smp kemantren', 1),
(4, 'J003', 'SMA Public', 'Sekolah Menengah Atas', 2, 'Jl. Sma kemantren Raya', 1),
(5, 'J004', 'SMK Bina Nusantara', 'Sekolah Menengah Kejuruan', 4, 'Jl. Kemantren Raya no.4', 1),
(9, 'J006', 'SMP', '', 9, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` enum('AKTIF','NONAKTIF','','') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `id_jenjang`, `nama_kelas`, `keterangan`, `status`) VALUES
(1, 1, 'VI', 'Ok', 'AKTIF'),
(2, 4, 'XII', 'Test', 'AKTIF'),
(3, 3, 'XI', 'Ok', 'AKTIF'),
(5, 5, 'XII TKJ', '', 'AKTIF'),
(7, 9, 'VIII', '', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_level`
--

CREATE TABLE `tabel_level` (
  `id_level` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `kode_guru` varchar(255) DEFAULT NULL,
  `id_hak_akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_level`
--

INSERT INTO `tabel_level` (`id_level`, `username`, `email`, `password`, `level`, `kode_guru`, `id_hak_akses`) VALUES
(1, 'Admin', 'adminis@tra.tor', '202cb962ac59075b964b07152d234b70', 'Admin', NULL, 2),
(2, 'Akademik', 'akademik@gmail.com', '202cb962ac59075b964b07152d234b70', 'Kesiswaan', NULL, 3),
(3, 'Perpus', 'perpus@gmail.com', '202cb962ac59075b964b07152d234b70', 'PetugasPerpus', NULL, 4),
(4, 'Guru', 'guru@gmail.com', '202cb962ac59075b964b07152d234b70', 'Guru', '449', 5),
(5, 'TU', 'tu@gmail.com', '202cb962ac59075b964b07152d234b70', 'TU', NULL, 6),
(7, 'Shelby', 'Shelby@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Guru', 'KG-330OSN', 5),
(8, 'Ahmad', 'Ahmad@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Guru', NULL, 5),
(19, 'Arga', 'Arga@gmail.com', 'a01610228fe998f515a72dd730294d87', 'Guru', 'KG-LVUMAY', 5),
(20, 'ar', 'ar@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Guru', 'KG-TEFKZU', 5),
(21, 'Test23', 'Test23@gmail.com', 'ec43638b66e16a5bbede9b710b12b0c7', 'Guru', 'KG-8GVW0P', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_lulus`
--

CREATE TABLE `tabel_lulus` (
  `id_lulus` int(11) NOT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  `id_rombel` int(11) DEFAULT NULL,
  `tanggal_lulus` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_lulus`
--

INSERT INTO `tabel_lulus` (`id_lulus`, `id_daftar`, `id_rombel`, `tanggal_lulus`) VALUES
(1, 3, 0, '2023-03-03'),
(2, 2, 0, '2023-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mapel`
--

CREATE TABLE `tabel_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_jenismapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_mapel`
--

INSERT INTO `tabel_mapel` (`id_mapel`, `id_jenismapel`, `nama_mapel`, `keterangan`, `status`) VALUES
(9, 1, 'Matematika', 'Pelajaran Matematika', 'AKTIF'),
(10, 1, 'Bahasa Inggris', 'Semangat', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nilai`
--

CREATE TABLE `tabel_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `nuh1` int(11) NOT NULL,
  `nuh2` int(11) NOT NULL,
  `nuh3` int(11) NOT NULL,
  `nt1` int(11) NOT NULL,
  `nt2` int(11) NOT NULL,
  `nt3` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `rnuh` text DEFAULT NULL,
  `rnt` text DEFAULT NULL,
  `nh` text DEFAULT NULL,
  `nar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_nilai`
--

INSERT INTO `tabel_nilai` (`id_nilai`, `id_rombel`, `id_siswa`, `id_mapel`, `id_semester`, `nuh1`, `nuh2`, `nuh3`, `nt1`, `nt2`, `nt3`, `mid`, `smt`, `rnuh`, `rnt`, `nh`, `nar`) VALUES
(1, 12, 5, 9, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', '1', '1', '99'),
(2, 1, 1, 9, 1, 1, 1, 2, 1, 1, 2, 2, 2, '1.3333333333333', '1.3333333333333', '1.3333333333333', '1.7777777777778'),
(3, 1, 8, 9, 1, 20, 20, 20, 30, 30, 30, 20, 30, '20', '30', '25', '25'),
(4, 1, 1, 9, 1, 75, 72, 73, 27, 27, 89, 45, 90, '73.333333333333', '47.666666666667', '60.5', '65.166666666667'),
(5, 1, 1, 9, 2, 97, 79, 97, 97, 79, 97, 79, 79, '91', '91', '91', '83'),
(6, 1, 1, 9, 1, 21, 32, 35, 11, 25, 57, 12, 35, '29.333333333333', '31', '30.166666666667', '25.722222222222'),
(7, 1, 1, 9, 1, 21, 32, 35, 11, 25, 57, 12, 35, '29.333333333333', '31', '30', '25.666666666667'),
(8, 1, 1, 9, 1, 21, 32, 35, 11, 25, 57, 12, 35, '29.333333333333', '31', '30', '25.666666666667'),
(9, 1, 1, 9, 1, 21, 32, 35, 11, 25, 57, 12, 35, '29', '31', '30', '25');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_paketjenjang`
--

CREATE TABLE `tabel_paketjenjang` (
  `id_paket` int(11) NOT NULL,
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_paketjenjang`
--

INSERT INTO `tabel_paketjenjang` (`id_paket`, `kode_paket`, `nama_paket`) VALUES
(1, 'SD', 'Sekolah Dasar'),
(2, 'SMP', 'Sekolah Menengah Pertama'),
(3, 'SMA', 'Sekolah Menengah Atas'),
(4, 'SMK', 'Sekolah Menengah Kejuruan'),
(5, 'J223', 'Esdeh'),
(7, 'J223', 'Esdeh'),
(8, 'J223', 'SD'),
(9, 'J224', 'Smp'),
(10, 'J009', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembayaran`
--

CREATE TABLE `tabel_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_ta` int(11) DEFAULT NULL,
  `id_tf` varchar(20) DEFAULT NULL,
  `id_invoice` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL,
  `cek_p` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_pembayaran`
--

INSERT INTO `tabel_pembayaran` (`id_pembayaran`, `id_siswa`, `id_jenis`, `nominal`, `keterangan`, `date`, `id_ta`, `id_tf`, `id_invoice`, `id_level`, `cek_p`) VALUES
(1, 5, 1, 223322, '1', '2023-03-11 09:38:54', 1, 'INV0311PLW3854', 'INV0318KGO2144', 5, 0),
(2, 1, 2, 200000, 'ok', '2023-03-13 02:35:36', 1, 'INV0313WOF3536', 'INV0318KGO2144', 5, 0),
(7, 5, 2, 21312, '1231', '2023-03-16 04:28:52', 1, 'INV0316IYJ2852', 'INV0318KGO2144', 5, 0),
(22, 1, 2, 20000, 'ada', '2023-03-18 18:17:49', 1, 'INV03183371749', 'INV0318KGO2144', 5, 0),
(25, 1, 1, 12000, 'Ada', '2023-03-18 18:24:07', 1, 'TSK0318H5G2407', 'INV031892F2244', 5, 1),
(26, 1, 1, 50000, 'Ok', '2023-03-19 10:30:18', 1, 'TSK0319ARN3018', 'INV0319P4I3006', 5, 1),
(27, 1, 1, 75000, 'Ok Jay 2', '2023-03-19 10:45:29', 1, 'INV0319JHG4529', 'INV0319P4I3006', 5, 1),
(28, 1, 2, 100000, 'Ok Jay 3', '2023-03-19 10:46:15', 1, 'INV03192RQ4615', 'INV0319P4I3006', 5, 1),
(29, 1, 2, 25000, 'Ok Jay 4', '2023-03-19 10:54:37', 1, 'INV0319HHO5437', 'INV0319P4I3006', 5, 1),
(30, 1, 1, 15000, 'Ok Jay 5', '2023-03-19 10:57:20', 1, 'TSK03190FD5720', 'INV0319P4I3006', 5, 1),
(32, 1, 1, 0, '', '2023-03-19 11:37:26', 1, 'TSK0319I0Z3726', 'INV031988B3717', 5, 1),
(33, 1, 2, 10000, 'Ok Jay 6', '2023-03-19 12:58:14', 1, 'TSK0319HYD5814', 'INV0319P4I3006', 5, 1),
(34, 2, 2, 12, '2', '2023-03-19 13:00:22', 0, 'TSK03199VJ0022', 'INV0319V9Q0017', 5, 1),
(35, 2, 2, 1, '1', '2023-03-19 13:00:27', 1, 'TSK0319RKG0027', 'INV0319V9Q0017', 5, 1),
(36, 2, 1, 2, '2', '2023-03-19 13:00:38', 1, 'TSK0319PD90038', 'INV0319V9Q0017', 5, 1),
(37, 2, 2, 12, '2', '2023-03-19 13:01:35', 0, 'TSK0319E0O0135', 'INV0319H8Y0133', 5, 1),
(38, 2, 1, 2, '2', '2023-03-19 13:01:40', 1, 'TSK03191Y90140', 'INV0319H8Y0133', 5, 1),
(39, 2, 1, 2, '2', '2023-03-19 13:02:02', 1, 'TSK0319B7G0202', 'INV0319H8Y0133', 5, 1),
(40, 2, 2, 3, '3', '2023-03-19 13:02:41', 1, 'TSK0319F000241', 'INV0319H8Y0133', 5, 1),
(41, 6, 2, 2, '2', '2023-03-19 13:02:53', 1, 'TSK0319K7X0253', 'INV0319L3I0249', 5, 1),
(42, 6, 1, 2, '3', '2023-03-19 13:02:59', 1, 'TSK0319F8K0259', 'INV0319L3I0249', 5, 1),
(44, 5, 2, 1, '1', '2023-03-19 13:46:11', 0, 'TSK0319ES34611', 'INV0319T4W4609', 5, 1),
(45, 5, 1, 20000, 'Tes', '2023-03-20 06:35:36', 0, 'TSK032046O3536', 'INV0320H213525', 5, 1),
(46, 5, 2, 15000, 'Tes 2', '2023-03-20 06:35:53', 1, 'TSK03205PS3553', 'INV0320H213525', 5, 1),
(47, 8, 2, 1000, 'ada', '2023-03-23 17:13:10', 0, 'TSK0323L160554', 'INV03236WP0544', 1, 1),
(48, 8, 2, 15000, 'Ok', '2023-03-22 10:18:57', 0, 'TSK0323T281857', 'INV0323MSV1842', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pindah`
--

CREATE TABLE `tabel_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  `id_rombel` int(11) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pindah`
--

INSERT INTO `tabel_pindah` (`id_pindah`, `id_daftar`, `id_rombel`, `nama_sekolah`) VALUES
(1, 3, 6, ''),
(2, 3, 6, ''),
(3, 3, 5, ''),
(4, NULL, 6, ''),
(5, 2, 3, 'SMK Texmaco'),
(6, 2, 3, 'SMP 1'),
(7, 2, 0, 'sssss'),
(8, 1, 0, 'asdasaqsd'),
(9, 2, 0, 'asdasaqsd'),
(10, 2, 0, 'SMK Texmaco'),
(11, 3, 0, 'ssss'),
(12, 3, 0, 'adawdaw'),
(13, 3, 0, 'adawd');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pinjaman`
--

CREATE TABLE `tabel_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `no_pinjaman` int(11) DEFAULT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_index_buku` int(11) NOT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'DIPINJAM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pinjaman`
--

INSERT INTO `tabel_pinjaman` (`id_pinjaman`, `no_pinjaman`, `id_anggota`, `id_index_buku`, `tgl_pinjaman`, `tgl_kembali`, `status`) VALUES
(1, 798, 3, 1, '2023-03-15', '0000-00-00', 'DIPINJAM'),
(2, 799, 8624, 4, '2023-03-21', '0000-00-00', 'DIPINJAM');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_rencana_anggaran`
--

CREATE TABLE `tabel_rencana_anggaran` (
  `id_rencana_anggaran` int(11) NOT NULL,
  `nama_anggaran` varchar(150) NOT NULL,
  `awal_periode` date NOT NULL,
  `akhir_periode` date NOT NULL,
  `pencatat` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `tetapkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_rencana_anggaran`
--

INSERT INTO `tabel_rencana_anggaran` (`id_rencana_anggaran`, `nama_anggaran`, `awal_periode`, `akhir_periode`, `pencatat`, `status`, `tetapkan`) VALUES
(1, 'RAB 2018/2019', '2023-03-06', '2023-03-07', 'Admin', 1, 0),
(2, 'RAB 2019/2020', '2023-03-06', '2023-03-08', 'Admin', 1, 0),
(3, 'RAB 2020/2021', '2023-03-09', '2023-03-31', 'Admin', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_rombel`
--

CREATE TABLE `tabel_rombel` (
  `id_rombel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_rombel` varchar(100) NOT NULL,
  `kode_guru` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_rombel`
--

INSERT INTO `tabel_rombel` (`id_rombel`, `id_kelas`, `nama_rombel`, `kode_guru`, `kuota`, `status`) VALUES
(1, 1, 'VI A', '449', 35, 'AKTIF'),
(2, 3, 'TKJ 2', '444', 123, 'AKTIF'),
(5, 2, 'TKJ 3', '444', 291, 'AKTIF'),
(6, 3, 'TB', '444', 221, 'AKTIF'),
(10, 2, 'AKL', '444', 21, 'AKTIF'),
(12, 5, 'VII A', 'KG-330OSN', 50, 'AKTIF'),
(14, 7, 'VIII D', '450', 35, 'AKTIF'),
(15, 7, 'VIII B', 'KG-330OSN', 35, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_sekolah`
--

CREATE TABLE `tabel_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `tanggal_regristasi` date DEFAULT NULL,
  `nomor_telepon` double DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email_sekolah` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_sekolah`
--

INSERT INTO `tabel_sekolah` (`id_sekolah`, `nama_sekolah`, `tanggal_regristasi`, `nomor_telepon`, `alamat`, `email_sekolah`, `foto`) VALUES
(1, 'SMK Binusa', '2010-05-18', 248662971, 'Jl. Kemantren Raya No.5, RT.02/RW.04, Wonosari, Kec. Ngaliyan, Kota Semarang, Jawa Tengah', 'smkbinusasmg@yahoo.com', '1678414030885.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_semester`
--

CREATE TABLE `tabel_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_semester`
--

INSERT INTO `tabel_semester` (`id_semester`, `semester`) VALUES
(1, '1'),
(2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `id_rombel` int(11) DEFAULT NULL,
  `saldo_tabungan` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`id_siswa`, `id_daftar`, `id_rombel`, `saldo_tabungan`, `nama`) VALUES
(1, 2, 1, 123123123, 'Ahmad Jay'),
(2, 3, 5, 123123123, 'Irvanda'),
(5, 10, 12, 0, 'Ahmad Subardjo'),
(6, 6, 15, 0, NULL),
(7, 3, 15, 0, NULL),
(8, 13, 1, 0, NULL),
(9, 15, 15, 0, 'Kevin Sanjaya');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tahunajaran`
--

CREATE TABLE `tabel_tahunajaran` (
  `id_angkatan` int(11) NOT NULL,
  `kd_angkatan` varchar(15) NOT NULL,
  `nama_angkatan` varchar(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl_a` date NOT NULL,
  `tgl_b` date NOT NULL,
  `aktif` int(11) NOT NULL,
  `status` enum('NONAKTIF','AKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_tahunajaran`
--

INSERT INTO `tabel_tahunajaran` (`id_angkatan`, `kd_angkatan`, `nama_angkatan`, `keterangan`, `tgl_a`, `tgl_b`, `aktif`, `status`) VALUES
(1, 'TA 2020/2021', 'TA2020/2021', 'OK', '2023-02-01', '2023-02-28', 1, 'AKTIF'),
(3, 'TA 2022/2023', 'TA2022/2023', '', '2023-03-23', '2023-05-17', 1, 'AKTIF'),
(5, 'TA 2023/2024', 'TA2023/2024', '', '2023-03-01', '2023-03-30', 0, 'NONAKTIF'),
(6, 'TA 2024/2025', 'TA2024/2025', '', '2023-03-01', '2023-03-09', 0, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggaran` int(11) DEFAULT NULL,
  `debet` int(11) NOT NULL DEFAULT 0,
  `kredit` int(11) NOT NULL DEFAULT 0,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `uraian` varchar(255) NOT NULL,
  `pencatat` varchar(255) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `id_anggaran`, `debet`, `kredit`, `waktu`, `uraian`, `pencatat`, `id_akun`) VALUES
(1, 1, 0, 123000, '2023-03-15 02:03:19', 'Dana Hibah', 'tu@gmail.com', 0),
(2, 1, 123000, 0, '2023-03-15 02:03:19', 'Dana Hibah', 'tu@gmail.com', 1),
(3, 4, 0, 143000, '2023-03-15 02:04:14', 'Dana Pokok', 'tu@gmail.com', 0),
(4, 4, 143000, 0, '2023-03-15 02:04:14', 'Dana Pokok', 'tu@gmail.com', 2),
(5, 1, 0, 78000, '2023-03-15 02:13:24', 'Dana Hibah', 'tu@gmail.com', 1),
(6, 1, 78000, 0, '2023-03-15 02:13:24', 'Dana Hibah', 'tu@gmail.com', 0),
(7, 6, 0, 20000, '2023-03-15 02:14:35', 'Dana Boss', 'tu@gmail.com', 5),
(8, 6, 20000, 0, '2023-03-15 02:14:35', 'Dana Boss', 'tu@gmail.com', 0),
(9, 4, 0, 19000, '2023-03-15 02:19:12', 'Dana Pokok', 'tu@gmail.com', 0),
(10, 4, 19000, 0, '2023-03-15 02:19:12', 'Dana Pokok', 'tu@gmail.com', 1),
(11, 1, 0, 12300, '2023-03-15 02:48:17', 'Dana Hibah hibah', 'tu@gmail.com', 1),
(12, 1, 12300, 0, '2023-03-15 02:48:17', 'Dana Hibah hibah', 'tu@gmail.com', 0),
(13, 6, 0, 21000, '2023-03-15 02:58:00', 'Dana Bos', 'tu@gmail.com', 0),
(14, 6, 21000, 0, '2023-03-15 02:58:00', 'Dana Bos', 'tu@gmail.com', 1),
(15, 1, 0, 12000, '2023-03-15 19:41:17', 'Dana Hibah', 'tu@gmail.com', 0),
(16, 1, 12000, 0, '2023-03-15 19:41:17', 'Dana Hibah', 'tu@gmail.com', 4),
(17, 6, 0, 2000, '2023-03-15 19:47:29', 'Dana Bos', 'tu@gmail.com', 0),
(18, 6, 2000, 0, '2023-03-15 19:47:29', 'Dana Bos', 'tu@gmail.com', 2),
(19, 4, 0, 500, '2023-03-15 19:48:10', 'Dana Pokok', 'tu@gmail.com', 2),
(20, 4, 500, 0, '2023-03-15 19:48:10', 'Dana Pokok', 'tu@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_buku`
--

CREATE TABLE `table_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `penulis_buku` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `del_flag` int(11) NOT NULL DEFAULT 1,
  `kategori_id` varchar(255) NOT NULL,
  `rak_buku_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_buku`
--

INSERT INTO `table_buku` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`, `keterangan`, `sumber`, `stok`, `del_flag`, `kategori_id`, `rak_buku_id`, `created_at`, `foto`) VALUES
(4, 'Naruto', 'Genji', 'Makise', 2000, 'GENJEHHH RASENGANNNN', NULL, 1, 1, 'Acara', '003', '2023-03-15 02:33:02', '1678847582689.jpg'),
(5, 'Upin & Ipin', 'Tok Dalang', 'Opah', 2000, 'Bocil', NULL, 0, 1, 'Acara', '003', '2023-03-15 03:41:13', '1678851673188.png'),
(6, 'ada', 'ada', 'da', 1221, 'ada', NULL, NULL, 1, 'Cerpen', '003', '2023-03-21 03:17:14', '1679368634339.jpg'),
(7, 'Test', 'ada', 'da', 2000, 'Ada', NULL, NULL, 1, 'Cerpen', '003', '2023-03-21 03:28:18', '1679369298700.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_detail_index_buku`
--

CREATE TABLE `table_detail_index_buku` (
  `id_stok` int(11) NOT NULL,
  `id_detail_index_buku` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_detail_index_buku`
--

INSERT INTO `table_detail_index_buku` (`id_stok`, `id_detail_index_buku`, `status`, `id_buku`) VALUES
(1, 'A01', 'Di Pinjam', 4),
(3, 'A02', 'Di Rak Buku', 4),
(4, '1', 'Di Pinjam', 5),
(6, 'A01', 'Di Rak Buku', 7),
(7, 'A02', 'Di Rak Buku', 7);

--
-- Triggers `table_detail_index_buku`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `table_detail_index_buku` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok - 1
   WHERE id_buku = OLD.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `table_detail_index_buku` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok + 1
   WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table_kategori_buku`
--

CREATE TABLE `table_kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL,
  `nama_kategori_buku` varchar(255) DEFAULT NULL,
  `keterangan_kategori_buku` varchar(255) DEFAULT NULL,
  `del_flag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_kategori_buku`
--

INSERT INTO `table_kategori_buku` (`id_kategori_buku`, `nama_kategori_buku`, `keterangan_kategori_buku`, `del_flag`) VALUES
(1, 'Anime', 'Wibu', 1),
(3, 'Cerpen', 'Cerpen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_rak_buku`
--

CREATE TABLE `table_rak_buku` (
  `id_rak_buku` int(11) NOT NULL,
  `nama_rak_buku` varchar(255) DEFAULT NULL,
  `keterangan_rak_buku` varchar(255) DEFAULT NULL,
  `del_flag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_rak_buku`
--

INSERT INTO `table_rak_buku` (`id_rak_buku`, `nama_rak_buku`, `keterangan_rak_buku`, `del_flag`) VALUES
(1, '001', 'Awokwok', 1),
(5, '003', 'Cerpennn', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `kembalikan`
--
ALTER TABLE `kembalikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_perpustakaan`
--
ALTER TABLE `setting_perpustakaan`
  ADD PRIMARY KEY (`id_setting_perpus`);

--
-- Indexes for table `tabel_akun`
--
ALTER TABLE `tabel_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tabel_alokasiguru`
--
ALTER TABLE `tabel_alokasiguru`
  ADD PRIMARY KEY (`id_alokasiguru`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`kode_guru`);

--
-- Indexes for table `tabel_alokasimapel`
--
ALTER TABLE `tabel_alokasimapel`
  ADD PRIMARY KEY (`id_alokasimapel`),
  ADD KEY `id_rombel` (`id_rombel`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_angkatan` (`id_angkatan`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tabel_jenisbayar`
--
ALTER TABLE `tabel_jenisbayar`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tabel_jenismapel`
--
ALTER TABLE `tabel_jenismapel`
  ADD PRIMARY KEY (`id_jenismapel`);

--
-- Indexes for table `tabel_jenis_transaksi`
--
ALTER TABLE `tabel_jenis_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  ADD PRIMARY KEY (`id_jenjang`),
  ADD KEY `id_jenjang` (`id_jenjang`),
  ADD KEY `tabel_jenjang_to_paketjenjang` (`id_paket`);

--
-- Indexes for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tabel_level`
--
ALTER TABLE `tabel_level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `tabel_level_to_guru` (`kode_guru`);

--
-- Indexes for table `tabel_lulus`
--
ALTER TABLE `tabel_lulus`
  ADD PRIMARY KEY (`id_lulus`);

--
-- Indexes for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_jenismapel` (`id_jenismapel`);

--
-- Indexes for table `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `tabel_paketjenjang`
--
ALTER TABLE `tabel_paketjenjang`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_jenisbayar` (`id_jenis`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tabel_pindah`
--
ALTER TABLE `tabel_pindah`
  ADD PRIMARY KEY (`id_pindah`);

--
-- Indexes for table `tabel_pinjaman`
--
ALTER TABLE `tabel_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `tabel_rencana_anggaran`
--
ALTER TABLE `tabel_rencana_anggaran`
  ADD PRIMARY KEY (`id_rencana_anggaran`);

--
-- Indexes for table `tabel_rombel`
--
ALTER TABLE `tabel_rombel`
  ADD PRIMARY KEY (`id_rombel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indexes for table `tabel_sekolah`
--
ALTER TABLE `tabel_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_daftar` (`id_daftar`),
  ADD KEY `id_rombel` (`id_rombel`);

--
-- Indexes for table `tabel_tahunajaran`
--
ALTER TABLE `tabel_tahunajaran`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `table_buku`
--
ALTER TABLE `table_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `table_detail_index_buku`
--
ALTER TABLE `table_detail_index_buku`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `table_kategori_buku`
--
ALTER TABLE `table_kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indexes for table `table_rak_buku`
--
ALTER TABLE `table_rak_buku`
  ADD PRIMARY KEY (`id_rak_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kembalikan`
--
ALTER TABLE `kembalikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_perpustakaan`
--
ALTER TABLE `setting_perpustakaan`
  MODIFY `id_setting_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_akun`
--
ALTER TABLE `tabel_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_alokasiguru`
--
ALTER TABLE `tabel_alokasiguru`
  MODIFY `id_alokasiguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tabel_alokasimapel`
--
ALTER TABLE `tabel_alokasimapel`
  MODIFY `id_alokasimapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_jenisbayar`
--
ALTER TABLE `tabel_jenisbayar`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_jenismapel`
--
ALTER TABLE `tabel_jenismapel`
  MODIFY `id_jenismapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_jenis_transaksi`
--
ALTER TABLE `tabel_jenis_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_level`
--
ALTER TABLE `tabel_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tabel_lulus`
--
ALTER TABLE `tabel_lulus`
  MODIFY `id_lulus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_paketjenjang`
--
ALTER TABLE `tabel_paketjenjang`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tabel_pindah`
--
ALTER TABLE `tabel_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_pinjaman`
--
ALTER TABLE `tabel_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_rencana_anggaran`
--
ALTER TABLE `tabel_rencana_anggaran`
  MODIFY `id_rencana_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_rombel`
--
ALTER TABLE `tabel_rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_sekolah`
--
ALTER TABLE `tabel_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_tahunajaran`
--
ALTER TABLE `tabel_tahunajaran`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_buku`
--
ALTER TABLE `table_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_detail_index_buku`
--
ALTER TABLE `table_detail_index_buku`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_kategori_buku`
--
ALTER TABLE `table_kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_rak_buku`
--
ALTER TABLE `table_rak_buku`
  MODIFY `id_rak_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_alokasiguru`
--
ALTER TABLE `tabel_alokasiguru`
  ADD CONSTRAINT `tabel_alokasiguru_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`);

--
-- Constraints for table `tabel_alokasimapel`
--
ALTER TABLE `tabel_alokasimapel`
  ADD CONSTRAINT `tabel_alokasimapel_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`),
  ADD CONSTRAINT `tabel_alokasimapel_to_rombel` FOREIGN KEY (`id_rombel`) REFERENCES `tabel_rombel` (`id_rombel`);

--
-- Constraints for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  ADD CONSTRAINT `tabel_anggota_to_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tabel_siswa` (`id_siswa`);

--
-- Constraints for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  ADD CONSTRAINT `tabel_daftar_to_angkatan` FOREIGN KEY (`id_angkatan`) REFERENCES `tabel_tahunajaran` (`id_angkatan`),
  ADD CONSTRAINT `tabel_daftar_to_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tabel_jenjang` (`id_jenjang`);

--
-- Constraints for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  ADD CONSTRAINT `tabel_jenjang_to_paketjenjang` FOREIGN KEY (`id_paket`) REFERENCES `tabel_paketjenjang` (`id_paket`);

--
-- Constraints for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD CONSTRAINT `tabel_kelas_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `tabel_jenjang` (`id_jenjang`);

--
-- Constraints for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  ADD CONSTRAINT `tabel_mapel_ibfk_1` FOREIGN KEY (`id_jenismapel`) REFERENCES `tabel_jenismapel` (`id_jenismapel`);

--
-- Constraints for table `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  ADD CONSTRAINT `tabel_nilai_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`),
  ADD CONSTRAINT `tabel_nilai_to_semester` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`),
  ADD CONSTRAINT `tabel_nilai_to_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tabel_siswa` (`id_siswa`);

--
-- Constraints for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  ADD CONSTRAINT `tabel_pembayaran_to_jenisbayar` FOREIGN KEY (`id_jenis`) REFERENCES `tabel_jenisbayar` (`id_jenis`),
  ADD CONSTRAINT `tabel_pembayaran_to_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tabel_siswa` (`id_siswa`);

--
-- Constraints for table `tabel_rombel`
--
ALTER TABLE `tabel_rombel`
  ADD CONSTRAINT `tabel_kelas_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`);

--
-- Constraints for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD CONSTRAINT `tabel_siswa_to_daftar_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tabel_daftar` (`id_daftar`),
  ADD CONSTRAINT `tabel_siswa_to_rombel_ibfk_1` FOREIGN KEY (`id_rombel`) REFERENCES `tabel_rombel` (`id_rombel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
