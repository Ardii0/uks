-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 12:52 AM
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
-- Database: `db_sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

CREATE TABLE `data_diri` (
  `id_data_diri` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `jurusan_sekolah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_instansi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_kerja` date DEFAULT NULL,
  `bidang_instansi` varchar(255) DEFAULT NULL,
  `lokasi_instansi` varchar(255) DEFAULT NULL,
  `nama_instansi2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jabatan2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_kerja2` date DEFAULT NULL,
  `nama_usaha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis_usaha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tahun_usaha` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_perguruan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tahun_perguruan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 1),
(3, 3),
(4, 3),
(5, 4),
(6, 1);

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
(3, 6),
(4, 1),
(5, 6),
(6, 3),
(7, 3),
(8, 4),
(9, 1);

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
(1, '7', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `stok_buku_keluar`
--

CREATE TABLE `stok_buku_keluar` (
  `id_stok_keluar` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_stok_masuk` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
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
-- Table structure for table `tabel_akun`
--

CREATE TABLE `tabel_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(255) DEFAULT NULL,
  `jenis_akun` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alokasiguru`
--

CREATE TABLE `tabel_alokasiguru` (
  `id_alokasiguru` int(11) NOT NULL,
  `kode_guru` varchar(255) NOT NULL,
  `jam_mengajar` varchar(255) DEFAULT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_alokasiguru`
--

INSERT INTO `tabel_alokasiguru` (`id_alokasiguru`, `kode_guru`, `jam_mengajar`, `id_mapel`) VALUES
(8, 'KG-VNKIWZ', '2', 8),
(9, 'KG-VNKIWZ', NULL, 9),
(10, 'KG-VNKIWZ', NULL, 10),
(11, 'KG-VNKIWZ', NULL, 11),
(12, 'KG-VNKIWZ', NULL, 12),
(13, 'KG-VNKIWZ', NULL, 13),
(28, 'KG-Z4XFYE', '23', 9),
(29, 'KG-Z4XFYE', '24', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alokasimapel`
--

CREATE TABLE `tabel_alokasimapel` (
  `id_alokasimapel` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `jam_belajar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_alokasimapel`
--

INSERT INTO `tabel_alokasimapel` (`id_alokasimapel`, `id_mapel`, `id_kelas`, `semester`, `jam_belajar`) VALUES
(4, 8, 1, 1, 3),
(5, 8, 2, 3, 4),
(6, 9, 1, NULL, 12),
(8, 9, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_anggota`
--

CREATE TABLE `tabel_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_daftar`
--

CREATE TABLE `tabel_daftar` (
  `id_daftar` int(11) NOT NULL,
  `no_reg` varchar(100) NOT NULL,
  `id_angkatan` int(11) DEFAULT NULL,
  `id_jenjang` int(11) NOT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `gaji_ayah` varchar(255) DEFAULT NULL,
  `ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `gaji_ibu` varchar(255) DEFAULT NULL,
  `nik` longtext NOT NULL,
  `kk` longtext NOT NULL,
  `jekel` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `diterima` varchar(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_daftar`
--

INSERT INTO `tabel_daftar` (`id_daftar`, `no_reg`, `id_angkatan`, `id_jenjang`, `asal_sekolah`, `tgl_daftar`, `nisn`, `nama`, `ayah`, `pekerjaan_ayah`, `gaji_ayah`, `ibu`, `pekerjaan_ibu`, `gaji_ibu`, `nik`, `kk`, `jekel`, `tempat_lahir`, `anak_ke`, `tgl_lahir`, `agama`, `alamat`, `telepon`, `foto`, `diterima`) VALUES
(1, 'REG-DKBATG', 5, 1, 'SMP HASANUDDIN 6', '2023-04-15', '12345678', 'Rizqi Ramandika', 'King', NULL, NULL, 'Queen', NULL, NULL, '12345678', '12345678', 'L', 'Semarang', 2, '2023-04-15', 'Islam', 'Mangkang', '12345678', '1681528125418.png', 'A'),
(2, 'REG-Z3QDQT', 5, 1, 'SMP HASANUDDIN 6', '2023-04-15', '123', 'Cilla', 'King', NULL, NULL, 'Queen', NULL, NULL, '123', '123', 'P', 'Semarang', 2, '2023-04-15', 'Islam', 'Mangkang', '123', '1681529321503.png', 'G'),
(3, 'REG-FBXJEG', 5, 1, 'SMP HASANUDDIN 6', '2023-04-15', '123', 'Saputra', 'King', 'Guru', '4jt - 5jt', 'Queen', 'ART', '2jt - 3jt', '123', '123', 'L', 'Semarang', 2, '2005-04-15', 'Islam', 'Mangkang', '123', '1681534352848.png', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_event`
--

CREATE TABLE `tabel_event` (
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_slug` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_event` date NOT NULL,
  `tanggal_posting` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(200) NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_event`
--

INSERT INTO `tabel_event` (`id_event`, `id_user`, `event_title`, `event_slug`, `deskripsi`, `tanggal_event`, `tanggal_posting`, `gambar`, `status`) VALUES
(4, 6, 'Event WMD', 'event wmd', 'Event WMD', '2023-04-22', '2023-04-09 20:44:36', '1680938772594.jpg', 'nonaktif'),
(5, 9, 'Event Musiks', 'event musiks', '                                        Event Musik Boss', '2023-04-14', '2023-04-09 16:07:35', '1681099478378.png', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_guru`
--

CREATE TABLE `tabel_guru` (
  `kode_guru` varchar(255) DEFAULT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nik` int(11) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `no_sk` varchar(255) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` enum('AKTIF','NONAKTIF') DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_guru`
--

INSERT INTO `tabel_guru` (`kode_guru`, `nama_guru`, `nip`, `nik`, `jekel`, `no_hp`, `jabatan`, `tmt`, `no_sk`, `tgl_sk`, `alamat`, `status`) VALUES
('KG-Z4XFYE', 'Raga Suci Al-Ghali', '324123', 0, 'L', '085875258684', NULL, NULL, NULL, NULL, 'Jl. Pudakpayung 07 RT03/RW01                                        ', 'AKTIF'),
('KG-K5AIDV', 'Arga Dian Setyo Wicaksono', '312312', 0, 'L', '085801565981', NULL, NULL, NULL, NULL, 'Jl. Tanahmas RT02/RW06                                                                                                                        ', 'AKTIF'),
('KG-72IIMM', 'Ida Fahru Roziyah', '441234', 0, 'P', '082584778212', NULL, NULL, NULL, NULL, 'Jl. Kumambang Raya 01 RT12/RW02', 'AKTIF'),
('KG-VNKIWZ', 'Soimatun', '312312', 0, 'P', '084312762267', NULL, NULL, NULL, NULL, 'Jl. Kembang Raya 09 RT04/RW03', 'AKTIF'),
('KG-RP3X25', 'Riyan Suryo Andono', '884564', 0, 'L', '084312762233', NULL, NULL, NULL, NULL, 'Jl. Kalibanteng Kidul 08 RT01/RW02', 'AKTIF'),
('KG-V6Y488', 'Tito Dwi Yulianto', '782514', 0, 'L', '08238475223', NULL, NULL, NULL, NULL, 'Jl. Palangkaraya 12 RT08/RW12', 'AKTIF'),
('KG-AH9TQ4', 'Ade Sucipto', '345632', 0, 'L', '089453725173', NULL, NULL, NULL, NULL, 'Jl. Mangkang Raya 09 RT07/RW02', 'AKTIF');

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
  `date` date DEFAULT NULL,
  `id_level` int(11) NOT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `cek_p` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'SPP', 'SPP', 1, 'Pembayaran SPP', 1),
(2, 'UKT', 'UKT', 2, 'Pembayaran UKT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenismapel`
--

CREATE TABLE `tabel_jenismapel` (
  `id_jenismapel` int(11) NOT NULL,
  `nama_jenismapel` varchar(100) NOT NULL,
  `kurikulum` varchar(255) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_jenismapel`
--

INSERT INTO `tabel_jenismapel` (`id_jenismapel`, `nama_jenismapel`, `kurikulum`, `status`) VALUES
(3, 'Wajib', 'Mateo 2005', 'AKTIF'),
(4, 'Kejuruan', 'Merdeka', 'AKTIF');

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
(1, 'J001', 'SMK Bina Nusantara', 'SMK Binus', 1, 'Jl. Kemantren Raya no 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kuota` int(11) NOT NULL,
  `kode_guru` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `id_tingkat`, `nama_kelas`, `kuota`, `kode_guru`, `keterangan`, `status`) VALUES
(1, 1, 'TKJ I', 28, 'KG-V6Y488', 'Teknik Komputer dan Jaringan', 'AKTIF'),
(2, 2, 'AKL', 19, 'KG-72IIMM', 'Akuntansi dan  Lembaga', 'AKTIF'),
(3, 3, 'TBSM', 23, 'KG-AH9TQ4', 'Teknik Bisnis dan Sepeda Motor', 'AKTIF');

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
  `id_hak_akses` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_level`
--

INSERT INTO `tabel_level` (`id_level`, `username`, `email`, `password`, `level`, `kode_guru`, `id_hak_akses`, `foto`) VALUES
(1, 'Admin', 'adminis@tra.tor', '202cb962ac59075b964b07152d234b70', 'Admin', NULL, 2, NULL),
(2, 'Akademik', 'akademik@gmail.com', '202cb962ac59075b964b07152d234b70', 'Kesiswaan', NULL, 3, NULL),
(3, 'Perpus', 'perpus@gmail.com', '202cb962ac59075b964b07152d234b70', 'PetugasPerpus', NULL, 4, NULL),
(4, 'Guru', 'guru@gmail.com', '202cb962ac59075b964b07152d234b70', 'Guru', '449', 5, NULL),
(5, 'TU', 'tu@gmail.com', '202cb962ac59075b964b07152d234b70', 'TU', NULL, 6, NULL),
(6, 'Alumni', 'alumnmi@gmail.com', '202cb962ac59075b964b07152d234b70', 'Alumni', NULL, NULL, NULL),
(27, 'Raga Suci Al-Ghali', 'RagaSuciAl-Ghali@gmail.com', '217cb94a01679e396c2287e2b67fa3ec', 'Guru', 'KG-Z4XFYE', 5, NULL),
(28, 'Vegas Media Arga', 'VegasMediaArga@gmail.com', 'fa61f827f0f5373133b11cc20d835a79', 'Guru', 'KG-K5AIDV', 5, NULL),
(29, 'Ida Fahru Roziyah,S.Pd', 'IdaFahruRoziyah,S.Pd@gmail.com', '738754a8dc187735701c05a35e80aff9', 'Guru', 'KG-72IIMM', 5, NULL),
(30, 'Soimatun', 'Soimatuh,S.Pd@gmail.com', 'fa61f827f0f5373133b11cc20d835a79', 'Guru', 'KG-VNKIWZ', 5, NULL),
(31, 'Riyan Suryo Andono', 'RiyanSuryoAndono@gmail.com', '33c2cbd53687980928c13725dde63ba1', 'Guru', 'KG-RP3X25', 5, NULL),
(32, 'Tito Dwi Yulianto', 'TitoDwiYulianto@gmail.com', 'd3b653b71dcfd8d90320d6c69090403b', 'Guru', 'KG-V6Y488', 5, NULL),
(33, 'Ade Sucipto', 'AdeSucipto@gmail.com', '7427dfd74090b72827f684cd2fdab748', 'Guru', 'KG-AH9TQ4', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_lowongan`
--

CREATE TABLE `tabel_lowongan` (
  `id_lowongan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_perusahaan` varchar(150) DEFAULT NULL,
  `bidang_usaha` varchar(150) DEFAULT NULL,
  `job_title` varchar(150) DEFAULT NULL,
  `job_slug` varchar(180) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `akhir_waktu` date DEFAULT NULL,
  `tanggal_posting` timestamp NULL DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `is_tampil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_lulus`
--

CREATE TABLE `tabel_lulus` (
  `id_lulus` int(11) NOT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `tanggal_lulus` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mapel`
--

CREATE TABLE `tabel_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_jenismapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_mapel`
--

INSERT INTO `tabel_mapel` (`id_mapel`, `id_jenismapel`, `nama_mapel`, `status`) VALUES
(8, 3, 'Matematika', 'AKTIF'),
(9, 3, 'Bahasa Indonesia', 'AKTIF'),
(10, 4, 'ASJ', 'AKTIF'),
(11, 4, 'Simdig', 'AKTIF'),
(12, 4, 'Pemrograman Dasar', 'AKTIF'),
(13, 3, 'Bahasa Inggris', 'AKTIF'),
(14, 3, 'PAI', 'AKTIF');

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
(1, 'J001', 'SMK');

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

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pindah`
--

CREATE TABLE `tabel_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pinjaman`
--

CREATE TABLE `tabel_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `no_pinjaman` varchar(255) DEFAULT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_index_buku` int(11) NOT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'DIPINJAM',
  `denda` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pinjaman`
--

INSERT INTO `tabel_pinjaman` (`id_pinjaman`, `no_pinjaman`, `id_anggota`, `id_index_buku`, `tgl_pinjaman`, `tgl_kembali`, `status`, `denda`) VALUES
(3, 'PMJ-ITGZX7', 95774, 8, '2023-04-12', '2023-04-12', 'DIKEMBALIKAN', 20000),
(4, 'PMJ-X45Z81', 9980, 10, '2023-04-12', '2023-04-12', 'DIKEMBALIKAN', 20000),
(6, 'PMJ-HYKUBY', 95774, 11, '2023-04-02', '2023-04-12', 'DIKEMBALIKAN', 20000),
(7, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 25000),
(8, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000),
(9, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000),
(10, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000),
(11, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000),
(12, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000),
(13, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000),
(14, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000),
(15, 'PMJ-674OLF', 9980, 8, '2023-03-31', '2023-04-12', 'DIKEMBALIKAN', 10000);

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
  `id_kelas` int(11) DEFAULT NULL,
  `saldo_tabungan` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`id_siswa`, `id_daftar`, `id_kelas`, `saldo_tabungan`, `nama`) VALUES
(1, 1, 1, 1, 'ada');

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
(1, 'TA2018/2019', 'TA 2018/2019', '', '2018-07-01', '2019-06-30', 0, 'AKTIF'),
(2, 'TA2019/2020', 'TA 2019/2020', '', '2019-01-28', '2020-01-28', 0, 'AKTIF'),
(3, 'TA2020/2021', 'TA 2020/2021', '', '2020-01-28', '2021-01-28', 0, 'AKTIF'),
(4, 'TA2021/2022', 'TA 2021/2022', '', '2021-01-28', '2022-01-28', 1, 'AKTIF'),
(5, 'TA2022/2023', 'TA 2022/2023', '', '2022-01-28', '2023-01-28', 0, 'NONAKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_testimoni`
--

CREATE TABLE `tabel_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `pesan` varchar(765) DEFAULT NULL,
  `tampil` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_testimoni`
--

INSERT INTO `tabel_testimoni` (`id_testimoni`, `id_level`, `pesan`, `tampil`) VALUES
(1, 6, 'Allo guys ini testimoni yaaa', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tingkat`
--

CREATE TABLE `tabel_tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `nama_tingkat` varchar(255) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tabel_tingkat`
--

INSERT INTO `tabel_tingkat` (`id_tingkat`, `nama_tingkat`, `id_jenjang`, `keterangan`, `status`) VALUES
(1, 'X', 1, 'Tingkat X', 'AKTIF'),
(2, 'XI', 1, 'Tingkat XI', 'AKTIF'),
(3, 'XII', 1, 'Tingkat XII', 'AKTIF');

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
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_buku`
--

INSERT INTO `table_buku` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`, `keterangan`, `sumber`, `stok`, `del_flag`, `kategori_id`, `rak_buku_id`, `tgl_masuk`, `foto`) VALUES
(1, 'Sri Asih', 'MBC Group', 'Joko Puspito', 2018, 'Alana tidak mengerti mengapa dia selalu dikuasai oleh kemarahan. Tapi dia selalu berusaha untuk melawannya. Dia lahir saat letusan gunung berapi yang memisahkan dia dan orang tuanya. Dia kemudian diadopsi oleh seorang wanita kaya yang berusaha membantunya', NULL, 2, 1, '12', '002', '2023-03-28 00:13:11', '1679987591723.jpg'),
(2, 'Tiga Sandra Terakhir', 'Noura Publishing', 'Brahmanto Anindito', 2015, 'Tiga Sandera Terakhir adalah sebuah novel thriller-militer karya Brahmanto Anindito yang diterbitkan pertama pada 2015 oleh Noura Publishing, Jakarta. Novel bersubjudul Terinspirasi dari Konflik Berdarah di Timur Indonesia ini menceritakan sebuah drama pe', NULL, 0, 1, '12', '002', '2023-03-28 00:16:37', '1679987797810.jpg'),
(3, 'Atlas', 'MBC Group', 'Ariestotoles', 2017, 'Atlas adalah kumpulan peta yang disatukan dalam bentuk buku, tetapi juga ditemukan dalam bentuk multimedia. Atlas dapat memuat informasi geografi, batas negara, statisik geopolitik, sosial, agama dan ekonomi.', NULL, 1, 1, '12', '001', '2023-03-28 00:17:57', '1679987877012.jpg'),
(4, 'Kebebasan Ilmu Pengetahuan & Teknolgi', 'MBC Group', 'Joko Puspito', 2018, 'Sebuah Esai Etika', NULL, 1, 1, '13', '001', '2023-03-28 00:21:40', '1679988100523.jpg'),
(5, 'Kita Pergi Hari ini', 'MBC Group', 'Ziggy Z.', 2020, 'Mi dan Ma dan Mo tidak pernah melihat kucing seperti Nona Gigi. Tentu saja, mereka sudah pernah melihat kucing biasa. Tapi Nona Gigi adalah Kucing Luar Biasa. Kucing Luar Biasa berarti kucing yang di luar kebiasaan. Nona Gigi adalah Cara Lain yang dinanti', NULL, 0, 1, '13', '002', '2023-03-28 00:23:45', '1679988225192.jpg'),
(6, 'Luka Cita', 'Gramedia', ' Valerie Patkar', 2019, 'Untuk mereka yang berhasil menggapai cita-cita, tetapi masih terluka karenanya. Lukacita bercerita tentang para pemimpi yang dikhianati cita-cita mereka sendiri. Ada seorang pendiri perusahaan startup idealis bernama Javier dan seorang mantan atlet catur ', NULL, 0, 1, '14', '002', '2023-03-28 00:29:04', '1679988544943.jpg'),
(20, 'ada', 'ass', 'asas', 2, 'wewe', NULL, 0, 0, '14', '002', '2023-04-12 03:15:39', '1681269385459.jpg');

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
(8, 'A01', 'Di Rak Buku', 1),
(9, 'A02', 'Di Rak Buku', 1),
(10, '0A1', 'Di Rak Buku', 3),
(11, '0A1', 'Di Rak Buku', 4);

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
(12, 'Novel', 'Kategori Buku Novel', 1),
(13, 'Dongeng', 'Kategori Buku Dongeng', 1),
(14, 'Komik', 'Kategori Buku Komik', 1),
(15, 'Ilmu Pengetahuan', 'Kategori Buku Ilmu Pengetahuan', 1);

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
(10, '001', 'Rak No 001', 1),
(11, '002', 'Rak No 002', 1),
(12, '003', 'Rak No 003', 1),
(13, '004', 'Rak No 004', 1),
(14, '005', 'Rak No 005', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`id_data_diri`),
  ADD KEY `id_user` (`id_level`);

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
  ADD PRIMARY KEY (`id_alokasimapel`,`id_mapel`,`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

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
-- Indexes for table `tabel_event`
--
ALTER TABLE `tabel_event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_user` (`id_user`);

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
  ADD PRIMARY KEY (`id_kelas`,`id_tingkat`,`kode_guru`),
  ADD KEY `id_tingkat` (`id_tingkat`);

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
  ADD PRIMARY KEY (`id_lulus`),
  ADD KEY `tabel_lulus_to_daftar` (`id_daftar`),
  ADD KEY `tabel_lulus_to_kelas` (`id_kelas`);

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
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `tabel_pindah_to_daftar` (`id_daftar`),
  ADD KEY `tabel_pindah_to_kelas` (`id_kelas`);

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
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `tabel_tahunajaran`
--
ALTER TABLE `tabel_tahunajaran`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `tabel_testimoni`
--
ALTER TABLE `tabel_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `tabel_testimoni_to_level` (`id_level`);

--
-- Indexes for table `tabel_tingkat`
--
ALTER TABLE `tabel_tingkat`
  ADD PRIMARY KEY (`id_tingkat`,`id_jenjang`),
  ADD KEY `id_jenjang` (`id_jenjang`);

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
-- AUTO_INCREMENT for table `data_diri`
--
ALTER TABLE `data_diri`
  MODIFY `id_data_diri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kembalikan`
--
ALTER TABLE `kembalikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setting_perpustakaan`
--
ALTER TABLE `setting_perpustakaan`
  MODIFY `id_setting_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_akun`
--
ALTER TABLE `tabel_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_alokasiguru`
--
ALTER TABLE `tabel_alokasiguru`
  MODIFY `id_alokasiguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tabel_alokasimapel`
--
ALTER TABLE `tabel_alokasimapel`
  MODIFY `id_alokasimapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_event`
--
ALTER TABLE `tabel_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_jenisbayar`
--
ALTER TABLE `tabel_jenisbayar`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_jenismapel`
--
ALTER TABLE `tabel_jenismapel`
  MODIFY `id_jenismapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_jenis_transaksi`
--
ALTER TABLE `tabel_jenis_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tabel_level`
--
ALTER TABLE `tabel_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tabel_lulus`
--
ALTER TABLE `tabel_lulus`
  MODIFY `id_lulus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_paketjenjang`
--
ALTER TABLE `tabel_paketjenjang`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_pindah`
--
ALTER TABLE `tabel_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_pinjaman`
--
ALTER TABLE `tabel_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_rencana_anggaran`
--
ALTER TABLE `tabel_rencana_anggaran`
  MODIFY `id_rencana_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_tahunajaran`
--
ALTER TABLE `tabel_tahunajaran`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_testimoni`
--
ALTER TABLE `tabel_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_tingkat`
--
ALTER TABLE `tabel_tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_buku`
--
ALTER TABLE `table_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_detail_index_buku`
--
ALTER TABLE `table_detail_index_buku`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_kategori_buku`
--
ALTER TABLE `table_kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_rak_buku`
--
ALTER TABLE `table_rak_buku`
  MODIFY `id_rak_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `tabel_alokasimapel_to_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_alokasimapel_to_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`);

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
  ADD CONSTRAINT `tabel_kelas_to_tingkat` FOREIGN KEY (`id_tingkat`) REFERENCES `tabel_tingkat` (`id_tingkat`);

--
-- Constraints for table `tabel_lulus`
--
ALTER TABLE `tabel_lulus`
  ADD CONSTRAINT `tabel_lulus_to_daftar` FOREIGN KEY (`id_daftar`) REFERENCES `tabel_daftar` (`id_daftar`),
  ADD CONSTRAINT `tabel_lulus_to_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`);

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
-- Constraints for table `tabel_pindah`
--
ALTER TABLE `tabel_pindah`
  ADD CONSTRAINT `tabel_pindah_to_daftar` FOREIGN KEY (`id_daftar`) REFERENCES `tabel_daftar` (`id_daftar`),
  ADD CONSTRAINT `tabel_pindah_to_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`);

--
-- Constraints for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD CONSTRAINT `tabel_siswa_from_daftar` FOREIGN KEY (`id_daftar`) REFERENCES `tabel_daftar` (`id_daftar`),
  ADD CONSTRAINT `tabel_siswa_to_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`);

--
-- Constraints for table `tabel_testimoni`
--
ALTER TABLE `tabel_testimoni`
  ADD CONSTRAINT `tabel_testimoni_to_level` FOREIGN KEY (`id_level`) REFERENCES `tabel_level` (`id_level`);

--
-- Constraints for table `tabel_tingkat`
--
ALTER TABLE `tabel_tingkat`
  ADD CONSTRAINT `tabel_tingkat_to_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tabel_jenjang` (`id_jenjang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
