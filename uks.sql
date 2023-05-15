-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 05:46 AM
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
-- Database: `uks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `username`) VALUES
(1, '202cb962ac59075b964b07152d234b70', 'smpn1_smg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penerbit_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penulis_buku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_terbit` int DEFAULT NULL,
  `keterangan` longtext COLLATE utf8mb4_general_ci,
  `sumber` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`, `keterangan`, `sumber`, `created_at`, `foto`) VALUES
(1, 'Laut Tengah', 'Akads', ' Berliana Kimberly', 2022, 'Laut Tengah merupakan novel karya Berliana Kimberly yang diterbitkan oleh Akad Publishing pada tahun 2022. Novel ini cocok dibaca oleh remaja perempuan maupun wanita dewasa yang menyukai novel bertema romance.', 'Beli', '2023-05-12 02:19:00', '1683771606217.png'),
(5, 'ada', 'ada', 'da', 2009, 'ada', 'Puspita Sari', '2023-05-14 17:00:00', '1684119131474.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_obat`
--

CREATE TABLE `daftar_obat` (
  `id` bigint NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `stocks` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `satuan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_obat`
--

INSERT INTO `daftar_obat` (`id`, `create_date`, `update_date`, `stocks`, `satuan`, `expired`, `nama_obat`) VALUES
(1, '2023-04-11 15:40:10', '2023-04-11 15:40:10', '100', 'Tablet', '2023-04-11 07:00:00', 'Panadol'),
(2, '0000-00-00 00:00:00', NULL, '4', 'Sirup', '2023-05-27 11:36:00', 'OBH Combi'),
(3, '0000-00-00 00:00:00', NULL, '4', 'Sirup', '2023-05-13 15:23:00', 'Bronchitin');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` bigint NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `create_date`, `update_date`, `nama`) VALUES
(1, '2023-04-11 08:39:27', '2023-04-11 15:39:37', 'Pusing'),
(2, '2023-05-10 03:59:46', NULL, 'Mual');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_periksa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `alamat`, `nama_guru`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`) VALUES
(1, 'Mangkang', 'Dwi Sasmita', '1986-04-06 07:00:00', 'Semarang', 1),
(3, 'Mijen', 'Dwi Arianto', '1987-02-02 09:57:00', 'Magelang', 0),
(6, 'Jl. Kali Pancur', 'Secondta', '1986-07-22 00:00:00', 'Semarang', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_barang_masuk` datetime DEFAULT NULL,
  `asal_barang` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah_barang` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama_barang`, `tgl_barang_masuk`, `asal_barang`, `jumlah_barang`) VALUES
(1, 'Kasur', '2003-11-08 07:00:00', 'DANA BOS', 4),
(2, 'Kursi', '2003-11-08 07:00:00', 'DANA BOS', 9),
(4, 'Kipas', '2023-05-10 00:00:00', 'dana bos', 6),
(5, 'Meja', '2023-05-10 00:00:00', 'Dana Bos', 36),
(14, 'Kipas', '2023-05-12 11:43:16', 'dana bos', 6),
(15, 'Lampu', '2023-05-12 11:44:11', 'dana boss', 6),
(16, 'Meja panjang', '2023-05-15 04:46:20', 'Pendanaan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_periksa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `alamat`, `nama_karyawan`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`) VALUES
(1, 'Tugurejo', 'Ridho Roma', '2023-04-11 07:00:00', 'Semarang', 0),
(2, 'Tegal', 'Surtiono', '2023-02-02 07:00:00', 'Semarang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_uks`
--

CREATE TABLE `kegiatan_uks` (
  `id` int NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` timestamp NULL DEFAULT NULL,
  `tanggal_akhir` timestamp NULL DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `foto` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan_uks`
--

INSERT INTO `kegiatan_uks` (`id`, `nama_kegiatan`, `tanggal_mulai`, `tanggal_akhir`, `deskripsi`, `foto`) VALUES
(1, 'Peresmian UKS SMPN 1 SMG', '2023-05-11 00:30:00', '2023-05-11 02:00:00', 'Pembukaan UKS SMPN 1 Semarang', '1683778201252.jpg'),
(4, 'Cuci Tangan Bersama', '2023-05-11 00:40:00', '2023-05-11 01:30:00', 'Kegiatan diadakan Di depan UKS', '1683780730703.jpg'),
(17, 'Senam', '2023-05-26 03:00:00', '2023-05-26 05:00:00', 'Kegiatan Senam di Lapangan', '1684118931742.png');

-- --------------------------------------------------------

--
-- Table structure for table `pasien_status`
--

CREATE TABLE `pasien_status` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien_status`
--

INSERT INTO `pasien_status` (`id`, `name`, `create_date`, `update_date`) VALUES
(1, 'Guru', '2023-04-11 08:42:38', '2023-04-11 15:42:38'),
(2, 'Siswa', '2023-04-11 08:42:38', '2023-04-11 15:42:38'),
(3, 'Karyawan', '2023-04-11 08:42:38', '2023-04-11 15:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan_periksa`
--

CREATE TABLE `penanganan_periksa` (
  `id` int NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `diagnosa_penyakit_id` bigint DEFAULT NULL,
  `tindakan_id` bigint DEFAULT NULL,
  `penanganan_pertama_id` bigint DEFAULT NULL,
  `periksa_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penanganan_periksa`
--

INSERT INTO `penanganan_periksa` (`id`, `catatan`, `diagnosa_penyakit_id`, `tindakan_id`, `penanganan_pertama_id`, `periksa_id`) VALUES
(1, 'Lekas Sembuh', 2, 1, 1, 1),
(3, 'Tes', 2, 1, 2, 2),
(4, 'Lekas Sembuh', 2, 1, 1, 5),
(5, 'Cepat Sembuh', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penanganan_pertama`
--

CREATE TABLE `penanganan_pertama` (
  `id` bigint NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `nama_penanganan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penanganan_pertama`
--

INSERT INTO `penanganan_pertama` (`id`, `create_date`, `update_date`, `nama_penanganan`) VALUES
(1, '2023-04-11 15:39:46', '2023-04-11 15:39:46', 'Di Perban'),
(2, '2023-05-10 11:05:16', NULL, 'Di Korbankan');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` bigint NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` bit(1) DEFAULT b'0',
  `keluhan` longtext COLLATE utf8mb4_general_ci,
  `guru_id` bigint DEFAULT NULL,
  `siswa_id` bigint DEFAULT NULL,
  `karyawan_id` bigint DEFAULT NULL,
  `keterangan_pasien_id` bigint DEFAULT NULL,
  `pasien_status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_bulan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `create_date`, `update_date`, `status`, `keluhan`, `guru_id`, `siswa_id`, `karyawan_id`, `keterangan_pasien_id`, `pasien_status`, `tahun_bulan`) VALUES
(1, '2023-04-11 08:42:58', '2023-04-11 08:43:29', b'1', 'Pusingduh', NULL, 1, NULL, NULL, 'Siswa', '2023-04'),
(2, '2023-04-11 08:43:46', '2023-04-11 08:43:46', b'0', 'Pusing', 1, NULL, NULL, NULL, 'Guru', '2023-04'),
(5, '2023-05-12 01:40:57', '2023-05-12 01:40:57', b'0', 'Mual Mual', NULL, 4, NULL, NULL, 'Siswa', '2023-05'),
(6, '2023-05-12 01:42:21', '2023-05-12 01:42:21', b'0', 'Mual', NULL, 4, NULL, NULL, 'Siswa', '2023-05'),
(7, '2023-05-12 06:49:02', '2023-05-12 06:49:02', b'0', 'Demam', 3, NULL, NULL, NULL, 'Guru', '2023-05'),
(8, '2023-05-12 06:50:08', '2023-05-12 06:50:08', b'0', 'Sakit Kepala', NULL, NULL, 2, NULL, 'Karyawan', '2023-05');

-- --------------------------------------------------------

--
-- Table structure for table `program_click`
--

CREATE TABLE `program_click` (
  `id` bigint NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keluhan` longtext COLLATE utf8mb4_general_ci,
  `saran` longtext COLLATE utf8mb4_general_ci,
  `guru_id` bigint DEFAULT NULL,
  `siswa_id` bigint DEFAULT NULL,
  `karyawan_id` bigint DEFAULT NULL,
  `pasien_status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_bulan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_click`
--

INSERT INTO `program_click` (`id`, `create_date`, `keluhan`, `saran`, `guru_id`, `siswa_id`, `karyawan_id`, `pasien_status`, `tahun_bulan`) VALUES
(1, '2023-05-12 03:33:38', 'Mual', 'Makan Ayam', 3, NULL, NULL, 'Guru', '2023-05'),
(2, '2023-05-12 03:35:37', 'Muntah', 'Makan Bayam\r\n', NULL, 4, NULL, 'Siswa', '2023-05'),
(3, '2023-05-14 21:53:15', 'Sakit hati', 'Semangat', NULL, 3, NULL, 'Siswa', '2023-05');

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id` int NOT NULL,
  `nama_program` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` longtext COLLATE utf8mb4_general_ci,
  `foto` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_kerja`
--

INSERT INTO `program_kerja` (`id`, `nama_program`, `tanggal`, `deskripsi`, `foto`) VALUES
(3, 'wadawddee', '2023-05-12 09:03:00', 'dwadad                                                                                                                        ', '1683882237914.jpg'),
(4, 'adawdawd', '2023-05-10 09:15:00', 'dwadawd', '1683882949253.jpg'),
(5, 'adawds', '2023-05-06 09:20:00', 'dawawd', '1683883225753.jpg'),
(6, 'wdad', '2023-05-12 09:36:00', 'awdad', '1683884186357.jpg'),
(7, 'Pelaksanaan', '2023-05-15 02:55:00', 'Melaksanakan', '1684119318338.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_periksa` int DEFAULT NULL,
  `TB` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BB` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `riwayat_penyakit` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gol_darah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telepon_wali` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alergi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `foto`, `nama_siswa`, `kelas`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`, `TB`, `BB`, `riwayat_penyakit`, `gol_darah`, `no_telepon_wali`, `alergi`, `nama_wali`) VALUES
(1, '1684118451484.png', 'Rizqi Ramandika', 'VII A', 'Mangkang', '2003-11-08', 'Semarang', 1, '600', '89', 'Tidak ada', 'C', '080494857', 'Udang', 'Wali'),
(3, NULL, 'Orlynz', 'VII A', 'Bringin', '2004-02-02', 'Semarang', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Mala Fillatunnida', 'XI TKJ', 'Rembang', '2023-04-30', 'Rembang', NULL, '163 cm', '48 kg', 'Maag', 'A', '08123445', 'Udang', 'Akbar'),
(5, NULL, 'Lina', 'XI Tata Busana', 'Semarang', '2023-05-09', 'Semarang', NULL, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `nama`, `create_date`, `update_date`) VALUES
(1, 'Di Istirahatkan', '2023-04-11 08:39:57', '2023-04-11 15:39:57'),
(2, 'Di Mutilasi', '2023-05-10 04:04:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_uks`
--
ALTER TABLE `kegiatan_uks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien_status`
--
ALTER TABLE `pasien_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penanganan_periksa`
--
ALTER TABLE `penanganan_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK2k8dghilwkkc0j9pa2kwgbdxx` (`diagnosa_penyakit_id`),
  ADD KEY `FK1t5wmmw5ljdxmr7me915pqr01` (`tindakan_id`),
  ADD KEY `FK32mt44a65dkhlh6pxty5awrh2` (`penanganan_pertama_id`),
  ADD KEY `FKhodf9h6bb8ltbkru05ot05kb0` (`periksa_id`);

--
-- Indexes for table `penanganan_pertama`
--
ALTER TABLE `penanganan_pertama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK8hrcq33h7p66gri512oqd3wa2` (`guru_id`),
  ADD KEY `FKg2i0oe51i65ahdj5n0oisaqn0` (`karyawan_id`),
  ADD KEY `FK8draj8pinaijavtb6k4umjyoq` (`keterangan_pasien_id`),
  ADD KEY `FK47quael7ajgnjndxqajkdqsja` (`siswa_id`);

--
-- Indexes for table `program_click`
--
ALTER TABLE `program_click`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK8hrcq33h7p66gri512oqd3wa2` (`guru_id`),
  ADD KEY `FKg2i0oe51i65ahdj5n0oisaqn0` (`karyawan_id`),
  ADD KEY `FK47quael7ajgnjndxqajkdqsja` (`siswa_id`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan_uks`
--
ALTER TABLE `kegiatan_uks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pasien_status`
--
ALTER TABLE `pasien_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penanganan_periksa`
--
ALTER TABLE `penanganan_periksa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penanganan_pertama`
--
ALTER TABLE `penanganan_pertama`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_click`
--
ALTER TABLE `program_click`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penanganan_periksa`
--
ALTER TABLE `penanganan_periksa`
  ADD CONSTRAINT `FK1t5wmmw5ljdxmr7me915pqr01` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id`),
  ADD CONSTRAINT `FK2k8dghilwkkc0j9pa2kwgbdxx` FOREIGN KEY (`diagnosa_penyakit_id`) REFERENCES `diagnosa` (`id`),
  ADD CONSTRAINT `FK32mt44a65dkhlh6pxty5awrh2` FOREIGN KEY (`penanganan_pertama_id`) REFERENCES `penanganan_pertama` (`id`),
  ADD CONSTRAINT `FKhodf9h6bb8ltbkru05ot05kb0` FOREIGN KEY (`periksa_id`) REFERENCES `periksa` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `FK47quael7ajgnjndxqajkdqsja` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `FK8draj8pinaijavtb6k4umjyoq` FOREIGN KEY (`keterangan_pasien_id`) REFERENCES `tindakan` (`id`),
  ADD CONSTRAINT `FK8hrcq33h7p66gri512oqd3wa2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `FKg2i0oe51i65ahdj5n0oisaqn0` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
