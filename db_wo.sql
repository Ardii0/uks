-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 10:49 AM
-- Server version: 8.0.29
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
  `id_foto` int NOT NULL,
  `foto1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `foto1`, `foto2`, `foto3`, `foto4`, `date_created`) VALUES
(1, '1668140193197.jpg', '1668150950359.jpg', '1668150966234.jpg', 'kelasss 4', '2022-11-10 07:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu_paket`
--

CREATE TABLE `menu_paket` (
  `id_menu_paket` int NOT NULL,
  `paket1` varchar(255) NOT NULL,
  `paket2` varchar(255) NOT NULL,
  `paket3` varchar(255) NOT NULL,
  `paket4` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_paket`
--

INSERT INTO `menu_paket` (`id_menu_paket`, `paket1`, `paket2`, `paket3`, `paket4`, `date_created`) VALUES
(2, 'masa<br>sama<br>bin<br>usla', 'Klinik Sehat Setia Brebes Mempunyai Tiga Spesialis yang ditangani. 1. Dokter Umum 2. Dokter Gigi 3. Dokter Tulang (Fisioterapi).', 'Menjadi pusat pelayan kesehatan terkemuka di Brebes dengan pelayanan yang prima dan profesional.', '1. Meningkatkan derajat kesehatan masyarkat di wilayah Brebes dan sekitar. <br>2. Melakukan Pelayanan Kesehatan sesuai dengan Standar. 3. Memiliki Sumber daya manusia yang profesional dengan mengembngkan kompetensi.', '2018-07-15 09:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `stok_buku_keluar`
--

CREATE TABLE `stok_buku_keluar` (
  `id_stok_keluar` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_buku_keluar`
--

INSERT INTO `stok_buku_keluar` (`id_stok_keluar`, `id_buku`, `tgl_keluar`) VALUES
(1, 1, '0000-00-00');

--
-- Triggers `stok_buku_keluar`
--
DELIMITER $$
CREATE TRIGGER `t_keluar` AFTER INSERT ON `stok_buku_keluar` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok - 1
   WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_buku_masuk`
--

CREATE TABLE `stok_buku_masuk` (
  `id_stok_masuk` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `stok_buku_masuk`
--
DELIMITER $$
CREATE TRIGGER `t_masuk` AFTER INSERT ON `stok_buku_masuk` FOR EACH ROW BEGIN
   UPDATE table_buku SET stok = stok + 1
   WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int NOT NULL,
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
  `status_pembayaran_dp` int DEFAULT '0',
  `status_pembayaran_pelunasan` int DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mdate` datetime NOT NULL,
  `ddate` datetime NOT NULL,
  `c_by` varchar(50) NOT NULL,
  `m_by` varchar(50) NOT NULL,
  `d_by` varchar(50) NOT NULL,
  `del_flag` int NOT NULL,
  `last_login` datetime NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `id_pesanan`, `id_pembayaran`, `id_paket_wedding`, `nama`, `username`, `password`, `no_telp`, `email`, `jenis_kelamin`, `alamat`, `nama_pemesan`, `no_telp_pemesan`, `email_pemesan`, `alamat_pemesan`, `judul_pw`, `tanggal_pesanan`, `tanggal_acara`, `tanggal_bayar_dp`, `harga_pw`, `dp_pw`, `pelunasan_pw`, `bayar_dp`, `bayar_pelunasan`, `no_invoice_dp`, `nama_bank_dp`, `bukti_pembayaran_dp`, `tanggal_bayar_pelunasan`, `nama_bank_pelunasan`, `no_invoice_pelunasan`, `bukti_pembayaran_pelunasan`, `status_pembayaran_dp`, `status_pembayaran_pelunasan`, `timestamp`, `mdate`, `ddate`, `c_by`, `m_by`, `d_by`, `del_flag`, `last_login`, `level`) VALUES
(1, NULL, NULL, NULL, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', '09889928823', 'admin@gmail.com', 'laki-laki', 'Semarang', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-02-23 06:00:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2023-02-23 13:00:50', 1),
(2, NULL, NULL, NULL, 'konsumen wom', 'konsumen', '202cb962ac59075b964b07152d234b70', '0988992883', 'rizki.rizaludin@gmail.com', 'laki-laki', 'semaranggg', 'hapid', '0999999956', 'widi@gmail.com', 'pbg', 'Paket 1', '2022-11-10', '2022-11-18', '2022-11-07', '100000000', '20000', '5000', '5000', '15000', '1112', 'mandiri', '1667789225734.PNG', '2022-11-07', 'BCA', '090290019', '1667793843911.jpg', 2, 2, '2023-02-20 11:14:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2023-02-20 18:14:08', 2),
(3, NULL, NULL, NULL, 'finance', 'finance', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-11-20 11:24:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-20 18:24:54', 3),
(6, NULL, NULL, NULL, ' zaky ', 'fer', '202cb962ac59075b964b07152d234b70', '085786652577', 'geo@gmail.com', 'laki-laki', 'jl. Sekaran no 41 semarang', 'ada', '123123123', 'ada@ada.ada', 'ada', 'Paket 1', '2023-02-17', '2023-02-24', '2022-11-29', '100000000', '20000', '5000', '20000', '15000', '12568989', 'bca', '1676617568793.png', '2022-11-24', 'BCA', '334566', '1667914969690.jpg', 1, 2, '2023-02-17 07:06:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2023-02-17 14:06:22', 2),
(7, NULL, NULL, NULL, 'petugas', 'petugas', '202cb962ac59075b964b07152d234b70', '0300399403', 'petugas@gmail.com', 'laki-laku', 'semarang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-09 08:33:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '0000-00-00 00:00:00', 2),
(11, NULL, NULL, NULL, 'fifi listiana', 'fifi', '202cb962ac59075b964b07152d234b70', '09889928823', 'fifi@gmail.com', 'perempuan', 'Semarang', 'Udin', '089399308391', 'udin@gmail.com', 'tegal', 'Paket 1', '2022-11-17', '2022-11-24', '2022-11-17', '100000000', '20000', '5000', '20000', NULL, 'invdp568990', 'BTN', '1668672060880.jpg', NULL, NULL, NULL, NULL, 1, 0, '2022-11-17 08:01:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-17 10:10:00', 2),
(12, NULL, NULL, NULL, 'ada', 'ada', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-03-01 09:34:52', '2023-02-20 11:26:01', '2023-02-20 11:26:01', '', '', '', 1, '2023-03-01 16:34:52', 5),
(13, NULL, NULL, NULL, 'da', 'da', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-03-01 09:05:24', '2023-02-20 11:26:01', '2023-02-20 11:26:01', '', '', '', 1, '2023-03-01 16:05:24', 4),
(14, NULL, NULL, NULL, 'ni', 'ni', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-02-20 11:01:40', '2023-02-20 11:26:01', '2023-02-20 11:26:01', '', '', '', 1, '2023-02-20 18:01:40', 6),
(16, NULL, NULL, NULL, 'tu', 'tu', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-02-20 11:01:50', '2023-02-20 11:26:01', '2023-02-20 11:26:01', '', '', '', 1, '2023-02-20 18:01:50', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alokasiguru`
--

CREATE TABLE `tabel_alokasiguru` (
  `id_alokasiguru` int NOT NULL,
  `kode_guru` int NOT NULL,
  `id_mapel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_alokasiguru`
--

INSERT INTO `tabel_alokasiguru` (`id_alokasiguru`, `kode_guru`, `id_mapel`) VALUES
(1, 450, 9),
(32, 449, 9),
(35, 449, 10),
(36, 444, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alokasimapel`
--

CREATE TABLE `tabel_alokasimapel` (
  `id` int NOT NULL,
  `id_mapel` int NOT NULL,
  `id_kelas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_anggota`
--

CREATE TABLE `tabel_anggota` (
  `id_anggota` int NOT NULL,
  `id_siswa` int NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_anggota`
--

INSERT INTO `tabel_anggota` (`id_anggota`, `id_siswa`, `tgl_daftar`, `status`) VALUES
(1, 1, '2023-02-21', 1),
(3, 2, '2023-03-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_daftar`
--

CREATE TABLE `tabel_daftar` (
  `id_daftar` int NOT NULL,
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
  `tgl_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `warga_negara` varchar(255) DEFAULT NULL,
  `diterima` varchar(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_daftar`
--

INSERT INTO `tabel_daftar` (`id_daftar`, `no_reg`, `id_angkatan`, `id_jenjang`, `tgl_daftar`, `nisn`, `nama`, `jekel`, `tempat_lahir`, `anak_ke`, `saudara_kandung`, `saudara_angkat`, `tgl_lahir`, `agama`, `alamat`, `telepon`, `foto`, `warga_negara`, `diterima`) VALUES
(2, '12', 1, 3, '2023-02-18', '213', 'Ahmad Jay', 'L', 'Los Angel', 1, '1', '1', '2023-03-11', 'Islam', 'Jl.Roti Burger Ayam', '123', '1677472666712.png', 'WNI', 'Y'),
(3, '313', 1, 3, '2023-02-28', '3123', 'Irvanda', 'L', 'Taman', 1, '4', '0', '2023-03-03', 'Islam', 'Taman', '08989898', NULL, 'WNI', 'Y'),
(6, '2334233', 1, 5, '2023-03-01', '34534545', 'Rizqi', 'L', 'Semarang', 2, 'ada', 'ada', '2003-11-11', 'Islam', 'Mangkang', '089765543321', '1677650453679.png', 'WNI', 'Y'),
(7, '2334233', 1, 5, '2023-03-01', '34534545', 'Rizqi', 'L', 'Semarang', 2, 'ada', 'ada', '2003-11-11', 'Islam', 'Mangkang', '089765543321', '1677650453679.png', 'WNI', 'Y'),
(8, '2334233', 1, 5, '2023-03-01', '34534545', 'Rizqi', 'L', 'Semarang', 2, 'ada', 'ada', '2003-11-11', 'Islam', 'Mangkang', '089765543321', '1677650453679.png', 'WNI', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_guru`
--

CREATE TABLE `tabel_guru` (
  `kode_guru` int NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jekel` enum('L','P') DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` text,
  `status` enum('AKTIF','NONAKTIF') DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_guru`
--

INSERT INTO `tabel_guru` (`kode_guru`, `nip`, `nama_guru`, `jekel`, `no_hp`, `alamat`, `status`) VALUES
(444, '22222', 'Saburo', 'L', '0990998', 'Atlantis', 'AKTIF'),
(449, '884564', 'Ahmad', 'L', '545454', '', 'AKTIF'),
(450, '3242134', 'Eko', 'L', '08932422342', 'Ungaran', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenismapel`
--

CREATE TABLE `tabel_jenismapel` (
  `id_jenismapel` int NOT NULL,
  `nama_jenismapel` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jenismapel`
--

INSERT INTO `tabel_jenismapel` (`id_jenismapel`, `nama_jenismapel`, `keterangan`, `status`) VALUES
(1, 'Bahasa Semuanya', 'Semangat Brother', 'AKTIF'),
(2, 'Bebas', 'Silahkan Kalau Mau hehe', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenjang`
--

CREATE TABLE `tabel_jenjang` (
  `id_jenjang` int NOT NULL,
  `kd_jenjang` varchar(50) NOT NULL,
  `nama_jenjang` varchar(50) NOT NULL,
  `keterangan` text,
  `paket` varchar(2) NOT NULL,
  `aktif` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jenjang`
--

INSERT INTO `tabel_jenjang` (`id_jenjang`, `kd_jenjang`, `nama_jenjang`, `keterangan`, `paket`, `aktif`) VALUES
(1, 'J001', 'SD', 'School Dasar', '2', 1),
(3, 'J002', 'SMP', '', '1', 1),
(4, 'J003', 'SMA', NULL, '2', 1),
(5, 'J004', 'SMK', NULL, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int NOT NULL,
  `id_jenjang` int NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `keterangan` text,
  `status` enum('AKTIF','NONAKTIF','','') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `id_jenjang`, `nama_kelas`, `keterangan`, `status`) VALUES
(1, 1, 'X', 'Ok', 'AKTIF'),
(2, 4, 'XII', 'Test', 'AKTIF'),
(3, 3, 'XI', 'Ok', 'AKTIF'),
(5, 5, 'XII', NULL, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mapel`
--

CREATE TABLE `tabel_mapel` (
  `id_mapel` int NOT NULL,
  `id_jenismapel` int NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `keterangan` text,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_mapel`
--

INSERT INTO `tabel_mapel` (`id_mapel`, `id_jenismapel`, `nama_mapel`, `keterangan`, `status`) VALUES
(9, 2, 'Menjadi Kaizooku', 'Ore wa Kaizokou ni naru', 'AKTIF'),
(10, 1, 'Bahasa Semua nya', 'Semangat Brother', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_paketjenjang`
--

CREATE TABLE `tabel_paketjenjang` (
  `id_paket` int NOT NULL,
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_paketjenjang`
--

INSERT INTO `tabel_paketjenjang` (`id_paket`, `kode_paket`, `nama_paket`) VALUES
(1, 'SD', 'Sekolah Dasar'),
(2, 'SMP', 'Sekolah Menengah Pertama'),
(3, 'SMA', 'Sekolah Menengah Atas'),
(4, 'SMK', 'Sekolah Menengah Kejuruan');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_paket_wedding`
--

CREATE TABLE `tabel_paket_wedding` (
  `id_paket_wedding` int NOT NULL,
  `judul_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gambar_pw` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga_pw` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dp_pw` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pelunasan_pw` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_pw` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `decoration_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `makeup_artist_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `documentation_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `catering_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `entertainment_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `efek_flashmob_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exclusive_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `del_flag` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_paket_wedding`
--

INSERT INTO `tabel_paket_wedding` (`id_paket_wedding`, `judul_pw`, `gambar_pw`, `harga_pw`, `dp_pw`, `pelunasan_pw`, `deskripsi_pw`, `decoration_pw`, `makeup_artist_pw`, `documentation_pw`, `catering_pw`, `entertainment_pw`, `efek_flashmob_pw`, `exclusive_pw`, `timestamp`, `del_flag`) VALUES
(3, 'Paket terbang', NULL, '20000', '5000', '15000', 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusifeeee', '2023-02-20 02:46:13', 1),
(8, 'paketan', '1667309643180.png', '10000', '2000', '8000', 'deskripsi meras', 'dekor', 'makeuo', 'dokumentasi', 'cater', 'entertaint', 'fllas', 'givee', '2022-11-02 14:03:07', 1),
(9, 'Paket 1', '1667914522357.jpg', '100000000', '20000', '5000', 'Deskripsi', 'dekorasi', '2', 'dokumentasi', '4', 'entertainment', 'efek', 'ekslusife', '2022-11-08 13:35:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembayaran_dp`
--

CREATE TABLE `tabel_pembayaran_dp` (
  `id_pembayaran_dp` int NOT NULL,
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
  `status_pembayaran_dp` int DEFAULT '0',
  `status_pembayaran_pelunasan` int DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mdate` datetime NOT NULL,
  `ddate` datetime NOT NULL,
  `c_by` varchar(50) NOT NULL,
  `m_by` varchar(50) NOT NULL,
  `d_by` varchar(50) NOT NULL,
  `del_flag` int NOT NULL,
  `last_login` datetime NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pembayaran_dp`
--

INSERT INTO `tabel_pembayaran_dp` (`id_pembayaran_dp`, `id_admin`, `id_pesanan`, `id_paket_wedding`, `nama_pemesan`, `no_telp_pemesan`, `email_pemesan`, `alamat_pemesan`, `judul_pw`, `tanggal_pesanan`, `tanggal_acara`, `tanggal_bayar_dp`, `harga_pw`, `dp_pw`, `pelunasan_pw`, `bayar_dp`, `bayar_pelunasan`, `no_invoice_dp`, `nama_bank_dp`, `bukti_pembayaran_dp`, `tanggal_bayar_pelunasan`, `nama_bank_pelunasan`, `no_invoice_pelunasan`, `bukti_pembayaran_pelunasan`, `status_pembayaran_dp`, `status_pembayaran_pelunasan`, `timestamp`, `mdate`, `ddate`, `c_by`, `m_by`, `d_by`, `del_flag`, `last_login`, `level`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-11-09 09:07:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-09 15:32:45', 1),
(2, NULL, NULL, NULL, 'gudang garam', '0999999956', 'ririri@gmail.com', 'pbg', 'Paket terbang', '2022-11-06', '2022-11-18', '2022-11-07', '20000', '5000', '15000', '5000', '15000', '1112', 'mandiri', '1667789225734.PNG', '2022-11-07', 'BCA', '090290019', '1667793843911.jpg', 2, 2, '2022-11-08 04:38:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-08 11:38:57', 2),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-11-09 09:06:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-09 16:06:56', 3),
(6, NULL, NULL, NULL, 'RIriri', '0999999956', 'ririri@gmail.com', 'bangun galih tegal', 'Paket terbang', '2022-11-08', '2022-11-10', '2022-11-29', '20000', '5000', '15000', '5000', '15000', '12568989', 'bca', '1667914902883.jpg', '2022-11-24', 'BCA', '334566', '1667914969690.jpg', 2, 2, '2022-11-08 13:46:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-08 20:38:24', 2),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-09 08:33:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '0000-00-00 00:00:00', 2),
(11, '2', NULL, NULL, 'hapid', '0999999956', 'widi@gmail.com', 'pbg', 'Paket 1', '2022-11-10', '2022-11-18', NULL, '100000000', '20000', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-10 02:44:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 0, '0000-00-00 00:00:00', 0),
(12, '11', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17', NULL, NULL, NULL, '20000', NULL, 'invdp568990', 'BTN', '1668672060880.jpg', NULL, NULL, NULL, NULL, 1, 0, '2022-11-17 08:01:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 0, '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembayaran_pelunasan`
--

CREATE TABLE `tabel_pembayaran_pelunasan` (
  `id_pembayaran_pelunasan` int NOT NULL,
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
  `status_pembayaran_dp` int DEFAULT '0',
  `status_pembayaran_pelunasan` int DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mdate` datetime NOT NULL,
  `ddate` datetime NOT NULL,
  `c_by` varchar(50) NOT NULL,
  `m_by` varchar(50) NOT NULL,
  `d_by` varchar(50) NOT NULL,
  `del_flag` int NOT NULL,
  `last_login` datetime NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pembayaran_pelunasan`
--

INSERT INTO `tabel_pembayaran_pelunasan` (`id_pembayaran_pelunasan`, `id_admin`, `id_pesanan`, `id_paket_wedding`, `nama_pemesan`, `no_telp_pemesan`, `email_pemesan`, `alamat_pemesan`, `judul_pw`, `tanggal_pesanan`, `tanggal_acara`, `tanggal_bayar_dp`, `harga_pw`, `dp_pw`, `pelunasan_pw`, `bayar_dp`, `bayar_pelunasan`, `no_invoice_dp`, `nama_bank_dp`, `bukti_pembayaran_dp`, `tanggal_bayar_pelunasan`, `nama_bank_pelunasan`, `no_invoice_pelunasan`, `bukti_pembayaran_pelunasan`, `status_pembayaran_dp`, `status_pembayaran_pelunasan`, `timestamp`, `mdate`, `ddate`, `c_by`, `m_by`, `d_by`, `del_flag`, `last_login`, `level`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-11-09 09:07:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-09 15:32:45', 1),
(2, NULL, NULL, NULL, 'gudang garam', '0999999956', 'ririri@gmail.com', 'pbg', 'Paket terbang', '2022-11-06', '2022-11-18', '2022-11-07', '20000', '5000', '15000', '5000', '15000', '1112', 'mandiri', '1667789225734.PNG', '2022-11-07', 'BCA', '090290019', '1667793843911.jpg', 2, 2, '2022-11-08 04:38:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-08 11:38:57', 2),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-11-09 09:06:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-09 16:06:56', 3),
(6, NULL, NULL, NULL, 'RIriri', '0999999956', 'ririri@gmail.com', 'bangun galih tegal', 'Paket terbang', '2022-11-08', '2022-11-10', '2022-11-29', '20000', '5000', '15000', '5000', '15000', '12568989', 'bca', '1667914902883.jpg', '2022-11-24', 'BCA', '334566', '1667914969690.jpg', 2, 2, '2022-11-08 13:46:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '2022-11-08 20:38:24', 2),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-09 08:33:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 1, '0000-00-00 00:00:00', 2),
(11, '2', NULL, NULL, 'hapid', '0999999956', 'widi@gmail.com', 'pbg', 'Paket 1', '2022-11-10', '2022-11-18', NULL, '100000000', '20000', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-10 02:44:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pesanan`
--

CREATE TABLE `tabel_pesanan` (
  `id_pesanan` int NOT NULL,
  `id_admin` int DEFAULT NULL,
  `id_pembayaran` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_paket_wedding` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_pemesan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telp_pemesan` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_pemesan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin_pemesan` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_pemesan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `judul_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gambar_pw` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga_pw` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dp_pw` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pelunasan_pw` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_pw` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `decoration_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `makeup_artist_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `documentation_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `catering_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `entertainment_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `efek_flashmob_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exclusive_pw` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `tanggal_pesanan` datetime DEFAULT NULL,
  `status` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `del_flag` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pesanan`
--

INSERT INTO `tabel_pesanan` (`id_pesanan`, `id_admin`, `id_pembayaran`, `id_paket_wedding`, `nama_pemesan`, `username`, `no_telp_pemesan`, `email_pemesan`, `jenis_kelamin_pemesan`, `alamat_pemesan`, `judul_pw`, `gambar_pw`, `harga_pw`, `dp_pw`, `pelunasan_pw`, `deskripsi_pw`, `decoration_pw`, `makeup_artist_pw`, `documentation_pw`, `catering_pw`, `entertainment_pw`, `efek_flashmob_pw`, `exclusive_pw`, `tanggal_acara`, `tanggal_pesanan`, `status`, `timestamp`, `del_flag`) VALUES
(9, 2, NULL, '', ' zaky ', 'konsumen', '085786652577', 'geo@gmail.com', 'laki-laki', 'Ds. Bangun Galih', 'paketan', '1667309643180.png', '10000', '2000', '8000', 'deskripsi meras', 'dekor', 'makeuo', 'dokumentasi', 'cater', 'entertaint', 'fllas', NULL, '0000-00-00', '2022-11-02 14:37:13', 0, '2022-11-04 14:42:09', 1),
(10, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Paket terbang', '', '20000', NULL, NULL, 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '0000-00-00', '2022-11-06 09:12:34', 0, '2022-11-06 08:12:34', 1),
(11, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Paket terbang', '', '20000', NULL, NULL, 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '0000-00-00', '2022-11-06 09:14:24', 0, '2022-11-06 08:14:24', 1),
(12, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Paket terbang', '', '20000', NULL, NULL, 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '0000-00-00', '2022-11-06 09:21:14', 0, '2022-11-06 08:21:14', 1),
(13, NULL, NULL, '', 'gudang garam', NULL, '0999999956', 'jaasa@gmail.com', NULL, 'pbg', 'paketan', '1667309643180.png', '10000', NULL, NULL, 'deskripsi meras', 'dekor', 'makeuo', 'dokumentasi', 'cater', 'entertaint', 'fllas', 'givee', '0000-00-00', '2022-11-06 09:33:27', 0, '2022-11-06 08:33:27', 1),
(14, NULL, NULL, '', 'hunaa', NULL, '099999999999', 'ririri@gmail.com', NULL, 'pbg', 'paketan', '1667309643180.png', '10000', '2000', '8000', 'deskripsi meras', 'dekor', 'makeuo', 'dokumentasi', 'cater', 'entertaint', 'fllas', 'givee', '0000-00-00', '2022-11-06 09:35:03', 0, '2022-11-06 08:35:03', 1),
(15, NULL, NULL, NULL, 'fadewai', NULL, '0999999956', 'ririri@gmail.com', NULL, 'pbg', 'Paket terbang', '', '20000', '5000', '15000', 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '0000-00-00', '2022-11-06 09:49:06', 0, '2022-11-06 08:49:06', 1),
(16, 2, NULL, '3', 'gudang garam', 'konsumen', '0999999956', 'ririri@gmail.com', NULL, 'pbg', 'Paket terbang', '', '20000', '5000', '15000', 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '0000-00-00', '2022-11-06 10:10:28', 0, '2022-11-06 09:10:28', 1),
(17, 2, NULL, '3', 'RIriri', 'konsumen', '099999999999', 'ririri@gmail.com', NULL, 'pbg', 'Paket terbang', '', '20000', '5000', '15000', 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '2022-11-24', '2022-11-06 10:11:45', 0, '2022-11-15 07:13:38', 1),
(18, 2, NULL, '3', 'gudang garam', 'konsumen', '0999999956', 'ririri@gmail.com', NULL, 'pbg', 'Paket terbang', '', '20000', '5000', '15000', 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '2022-11-18', '2022-11-06 10:16:59', 0, '2022-11-06 09:16:59', 1),
(19, 6, NULL, '3', 'RIriri', 'fer', '0999999956', 'ririri@gmail.com', NULL, 'bangun galih tegal', 'Paket terbang', '', '20000', '5000', '15000', 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusife', '2022-11-10', '2022-11-08 14:40:39', 0, '2022-11-08 13:40:39', 1),
(20, 2, NULL, '9', 'hapid', 'konsumen', '0999999956', 'widi@gmail.com', NULL, 'pbg', 'Paket 1', '1667914522357.jpg', '100000000', '20000', '5000', 'Deskripsi', 'dekorasi', '2', 'dokumentasi', '4', 'entertainment', 'efek', 'ekslusife', '2022-11-18', '2022-11-10 03:44:02', 0, '2022-11-10 02:44:02', 1),
(21, 11, NULL, '9', 'Udin', 'fifi', '089399308391', 'udin@gmail.com', NULL, 'tegal', 'Paket 1', '1667914522357.jpg', '100000000', '20000', '5000', 'Deskripsi', 'dekorasi', '2', 'dokumentasi', '4', 'entertainment', 'efek', 'ekslusife', '2022-11-24', '2022-11-17 04:30:23', 0, '2022-11-17 03:30:23', 1),
(22, 2, NULL, '3', 'Rizqi', 'konsumen', '089xxxxxxxxxx', 's@s', NULL, 'mangkang', 'Paket terbang', '', '20000', '5000', '15000', 'Deskripsi', 'dekorasi', 'makeup', 'dokumentasi', 'catering', 'entertainment', 'efek', 'ekslusifeeee', '0000-00-00', '2023-02-20 10:31:39', 0, '2023-02-20 09:31:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pinjaman`
--

CREATE TABLE `tabel_pinjaman` (
  `id_pinjaman` int NOT NULL,
  `no_pinjaman` int DEFAULT NULL,
  `id_anggota` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'DIPINJAM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pinjaman`
--

INSERT INTO `tabel_pinjaman` (`id_pinjaman`, `no_pinjaman`, `id_anggota`, `id_buku`, `tgl_pinjaman`, `tgl_kembali`, `status`) VALUES
(1, 798, 1, 1, '2023-02-28', '2023-02-28', 'DIKEMBALIKAN'),
(2, 798333, 3, 7, '2023-02-28', '0000-00-00', 'DIPINJAM'),
(4, 352, 1, 1, '2023-02-28', '0000-00-00', 'DIPINJAM'),
(5, 12, 1, 1, '2023-03-01', '0000-00-00', 'DIPINJAM');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_rombel`
--

CREATE TABLE `tabel_rombel` (
  `id_rombel` int NOT NULL,
  `id_kelas` int NOT NULL,
  `nama_rombel` varchar(100) NOT NULL,
  `kode_guru` int NOT NULL,
  `kuota` int NOT NULL,
  `status` enum('AKTIF','NONAKTIF') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_rombel`
--

INSERT INTO `tabel_rombel` (`id_rombel`, `id_kelas`, `nama_rombel`, `kode_guru`, `kuota`, `status`) VALUES
(1, 1, 'TKJ', 449, 35, 'AKTIF'),
(2, 3, 'TKJ 2', 444, 123, 'AKTIF'),
(5, 2, 'TKJ 3', 444, 291, 'AKTIF'),
(6, 3, 'TB', 444, 221, 'AKTIF'),
(10, 2, 'AKL', 444, 21, 'AKTIF'),
(12, 5, 'VII A', 450, 50, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id_siswa` int NOT NULL,
  `id_daftar` int NOT NULL,
  `id_rombel` int DEFAULT NULL,
  `saldo_tabungan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`id_siswa`, `id_daftar`, `id_rombel`, `saldo_tabungan`) VALUES
(1, 2, 1, 123123123),
(2, 3, 5, 123123123),
(3, 3, NULL, 0),
(4, 7, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tahunajaran`
--

CREATE TABLE `tabel_tahunajaran` (
  `id_angkatan` int NOT NULL,
  `kd_angkatan` varchar(15) NOT NULL,
  `nama_angkatan` varchar(20) NOT NULL,
  `keterangan` text,
  `tgl_a` date NOT NULL,
  `tgl_b` date NOT NULL,
  `aktif` int NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_tahunajaran`
--

INSERT INTO `tabel_tahunajaran` (`id_angkatan`, `kd_angkatan`, `nama_angkatan`, `keterangan`, `tgl_a`, `tgl_b`, `aktif`, `status`) VALUES
(1, 'OK', 'EDITORBERKELAS2029', 'OK', '2023-02-01', '2023-02-28', 0, 'AKTIF'),
(3, 'OK', 'da', '', '0000-00-00', '0000-00-00', 0, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `table_buku`
--

CREATE TABLE `table_buku` (
  `id_buku` int NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penerbit_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penulis_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_terbit` int DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sumber` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok` int NOT NULL,
  `del_flag` int NOT NULL DEFAULT '1',
  `kategori_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rak_buku_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_buku`
--

INSERT INTO `table_buku` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`, `keterangan`, `sumber`, `stok`, `del_flag`, `kategori_id`, `rak_buku_id`) VALUES
(1, 'Tokyo Ravengers', 'Jepang', 'Jepang', 2000, 'Wibu', NULL, -1, 1, 'Anime', '001');

-- --------------------------------------------------------

--
-- Table structure for table `table_detail_index_buku`
--

CREATE TABLE `table_detail_index_buku` (
  `id_stok` int NOT NULL,
  `id_detail_index_buku` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_buku` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_kategori_buku`
--

CREATE TABLE `table_kategori_buku` (
  `id_kategori_buku` int NOT NULL,
  `nama_kategori_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_kategori_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1'
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
  `id_rak_buku` int NOT NULL,
  `nama_rak_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_rak_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `del_flag` int NOT NULL DEFAULT '1'
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
-- Indexes for table `menu_paket`
--
ALTER TABLE `menu_paket`
  ADD PRIMARY KEY (`id_menu_paket`);

--
-- Indexes for table `stok_buku_keluar`
--
ALTER TABLE `stok_buku_keluar`
  ADD PRIMARY KEY (`id_stok_keluar`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tabel_alokasiguru`
--
ALTER TABLE `tabel_alokasiguru`
  ADD PRIMARY KEY (`id_alokasiguru`),
  ADD KEY `tabel_alokasiguru_to_mapel` (`id_mapel`);

--
-- Indexes for table `tabel_alokasimapel`
--
ALTER TABLE `tabel_alokasimapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_angkatan` (`id_angkatan`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tabel_guru`
--
ALTER TABLE `tabel_guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `tabel_jenismapel`
--
ALTER TABLE `tabel_jenismapel`
  ADD PRIMARY KEY (`id_jenismapel`);

--
-- Indexes for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  ADD PRIMARY KEY (`id_jenjang`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_jenismapel` (`id_jenismapel`);

--
-- Indexes for table `tabel_paketjenjang`
--
ALTER TABLE `tabel_paketjenjang`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tabel_paket_wedding`
--
ALTER TABLE `tabel_paket_wedding`
  ADD PRIMARY KEY (`id_paket_wedding`);

--
-- Indexes for table `tabel_pembayaran_dp`
--
ALTER TABLE `tabel_pembayaran_dp`
  ADD PRIMARY KEY (`id_pembayaran_dp`);

--
-- Indexes for table `tabel_pembayaran_pelunasan`
--
ALTER TABLE `tabel_pembayaran_pelunasan`
  ADD PRIMARY KEY (`id_pembayaran_pelunasan`);

--
-- Indexes for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tabel_pinjaman`
--
ALTER TABLE `tabel_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tabel_rombel`
--
ALTER TABLE `tabel_rombel`
  ADD PRIMARY KEY (`id_rombel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `kode_guru` (`kode_guru`);

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
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_paket`
--
ALTER TABLE `menu_paket`
  MODIFY `id_menu_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok_buku_keluar`
--
ALTER TABLE `stok_buku_keluar`
  MODIFY `id_stok_keluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_alokasiguru`
--
ALTER TABLE `tabel_alokasiguru`
  MODIFY `id_alokasiguru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tabel_alokasimapel`
--
ALTER TABLE `tabel_alokasimapel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  MODIFY `id_daftar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_guru`
--
ALTER TABLE `tabel_guru`
  MODIFY `kode_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `tabel_jenismapel`
--
ALTER TABLE `tabel_jenismapel`
  MODIFY `id_jenismapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  MODIFY `id_jenjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  MODIFY `id_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_paketjenjang`
--
ALTER TABLE `tabel_paketjenjang`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_paket_wedding`
--
ALTER TABLE `tabel_paket_wedding`
  MODIFY `id_paket_wedding` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_pembayaran_dp`
--
ALTER TABLE `tabel_pembayaran_dp`
  MODIFY `id_pembayaran_dp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabel_pembayaran_pelunasan`
--
ALTER TABLE `tabel_pembayaran_pelunasan`
  MODIFY `id_pembayaran_pelunasan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tabel_pinjaman`
--
ALTER TABLE `tabel_pinjaman`
  MODIFY `id_pinjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_rombel`
--
ALTER TABLE `tabel_rombel`
  MODIFY `id_rombel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_tahunajaran`
--
ALTER TABLE `tabel_tahunajaran`
  MODIFY `id_angkatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_buku`
--
ALTER TABLE `table_buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_detail_index_buku`
--
ALTER TABLE `table_detail_index_buku`
  MODIFY `id_stok` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_kategori_buku`
--
ALTER TABLE `table_kategori_buku`
  MODIFY `id_kategori_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_rak_buku`
--
ALTER TABLE `table_rak_buku`
  MODIFY `id_rak_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `tabel_alokasimapel_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`);

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
-- Constraints for table `tabel_pinjaman`
--
ALTER TABLE `tabel_pinjaman`
  ADD CONSTRAINT `tabel_pinjaman_to_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tabel_anggota` (`id_anggota`),
  ADD CONSTRAINT `tabel_pinjaman_to_buku` FOREIGN KEY (`id_buku`) REFERENCES `table_buku` (`id_buku`);

--
-- Constraints for table `tabel_rombel`
--
ALTER TABLE `tabel_rombel`
  ADD CONSTRAINT `tabel_guru_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `tabel_guru` (`kode_guru`),
  ADD CONSTRAINT `tabel_kelas_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`);

--
-- Constraints for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD CONSTRAINT `tabel_siswa_to_daftar_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tabel_daftar` (`id_daftar`),
  ADD CONSTRAINT `tabel_siswa_to_rombel_ibfk_1` FOREIGN KEY (`id_rombel`) REFERENCES `tabel_rombel` (`id_rombel`);

--
-- Constraints for table `table_detail_index_buku`
--
ALTER TABLE `table_detail_index_buku`
  ADD CONSTRAINT `table_detail_index_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `table_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
