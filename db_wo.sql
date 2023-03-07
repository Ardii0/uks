-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 10:57 AM
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
(35, 449, 10),
(36, 444, 9),
(40, 449, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alokasimapel`
--

CREATE TABLE `tabel_alokasimapel` (
  `id_alokasimapel` int NOT NULL,
  `id_mapel` int NOT NULL,
  `id_rombel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_alokasimapel`
--

INSERT INTO `tabel_alokasimapel` (`id_alokasimapel`, `id_mapel`, `id_rombel`) VALUES
(1, 9, 2),
(2, 9, 1);

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
-- Table structure for table `tabel_jenisbayar`
--

CREATE TABLE `tabel_jenisbayar` (
  `id_jenis` int NOT NULL,
  `kode_jenis` varchar(3) DEFAULT NULL,
  `nama_jenis` varchar(25) DEFAULT NULL,
  `tipe_jenis` int DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tabel_level`
--

CREATE TABLE `tabel_level` (
  `id_level` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_level`
--

INSERT INTO `tabel_level` (`id_level`, `username`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'adminis@tra.tor', '202cb962ac59075b964b07152d234b70', 'Admin'),
(2, 'Akademik', 'akademik@gmail.com', '202cb962ac59075b964b07152d234b70', 'Kesiswaan'),
(3, 'Perpus', 'perpus@gmail.com', '202cb962ac59075b964b07152d234b70', 'PetugasPerpus'),
(4, 'Guru', 'guru@gmail.com', '202cb962ac59075b964b07152d234b70', 'Guru'),
(5, 'TU', 'tu@gmail.com', '202cb962ac59075b964b07152d234b70', 'TU');

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
(9, 2, 'Matematika', 'Matematika Ilmu yang MENYENANGKAN HAHAHAHA', 'AKTIF'),
(10, 1, 'Bahasa Semua nya', 'Semangat Brother', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nilai`
--

CREATE TABLE `tabel_nilai` (
  `id_nilai` int NOT NULL,
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
  `nar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_nilai`
--

INSERT INTO `tabel_nilai` (`id_nilai`, `id_siswa`, `id_mapel`, `id_semester`, `nuh1`, `nuh2`, `nuh3`, `nt1`, `nt2`, `nt3`, `mid`, `smt`, `rnuh`, `rnt`, `nh`, `nar`) VALUES
(1, 1, 9, 1, 1, 1, 1, 1, 1, 1, 1, 11, NULL, NULL, NULL, NULL),
(2, 1, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(3, 1, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(4, 1, 9, 1, 10, 10, 10, 10, 10, 10, 10, 20, '10', '10', '10', '13.333333333333'),
(5, 1, 9, 1, 20, 20, 20, 20, 20, 20, 20, 20, '20', '20', '20', '20'),
(6, 1, 9, 1, 2, 2, 2, 2, 2, 2, 2, 2, '2', '2', '2', '2');

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
-- Table structure for table `tabel_pembayaran`
--

CREATE TABLE `tabel_pembayaran` (
  `id` int NOT NULL,
  `id_tf` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` int DEFAULT NULL,
  `id_ta` int DEFAULT NULL,
  `id_jenis` int DEFAULT NULL,
  `nominal` int DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `cek_p` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pembayaran`
--

INSERT INTO `tabel_pembayaran` (`id`, `id_tf`, `date`, `id_siswa`, `id_ta`, `id_jenis`, `nominal`, `keterangan`, `cek_p`) VALUES
(1, NULL, '2023-03-07 09:54:38', 1, NULL, 1, 200000, 'Bayar SPP', 0);

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
-- Table structure for table `tabel_semester`
--

CREATE TABLE `tabel_semester` (
  `id_semester` int NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
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
(3, 3, 1, 0),
(4, 7, 1, 0);

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
(1, 'OK', 'TA 2020/2021', 'OK', '2023-02-01', '2023-02-28', 0, 'AKTIF'),
(3, 'OK', 'TA 2022/2023', '', '0000-00-00', '0000-00-00', 0, 'AKTIF');

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
  `rak_buku_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_buku`
--

INSERT INTO `table_buku` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`, `keterangan`, `sumber`, `stok`, `del_flag`, `kategori_id`, `rak_buku_id`, `created_at`, `foto`) VALUES
(1, 'Tokyo Ravengers', 'Jepang', 'Ahmad Subarjo', 2000, 'Wibu', NULL, -1, 1, 'Anime', '001', '2023-03-03 02:44:45', NULL),
(2, 'Tokyo Ravengers', 'Jepang', 'Ahmad Subarjo', 2000, 'Wibu', NULL, -1, 1, 'Anime', '001', '2023-03-03 02:44:45', NULL),
(3, 'ada', 'ada', 'da', 12312, 'Semangat Brother', NULL, 2, 1, 'Cerpen', '001', '2023-03-03 02:45:40', NULL);

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
-- Indexes for table `stok_buku_keluar`
--
ALTER TABLE `stok_buku_keluar`
  ADD PRIMARY KEY (`id_stok_keluar`);

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
-- Indexes for table `tabel_level`
--
ALTER TABLE `tabel_level`
  ADD PRIMARY KEY (`id_level`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `stok_buku_keluar`
--
ALTER TABLE `stok_buku_keluar`
  MODIFY `id_stok_keluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_alokasiguru`
--
ALTER TABLE `tabel_alokasiguru`
  MODIFY `id_alokasiguru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tabel_alokasimapel`
--
ALTER TABLE `tabel_alokasimapel`
  MODIFY `id_alokasimapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `tabel_jenisbayar`
--
ALTER TABLE `tabel_jenisbayar`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `tabel_level`
--
ALTER TABLE `tabel_level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  MODIFY `id_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_paketjenjang`
--
ALTER TABLE `tabel_paketjenjang`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `tabel_alokasiguru_to_guru` FOREIGN KEY (`kode_guru`) REFERENCES `tabel_guru` (`kode_guru`),
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
