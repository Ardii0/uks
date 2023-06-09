-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 10:54 AM
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
-- Database: `uks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
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
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `penulis_buku` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`, `keterangan`, `sumber`, `tgl_masuk`, `foto`) VALUES
(1, 'Laut Tengah', 'Akads', ' Berliana Kimberly', 2022, 'Laut Tengah merupakan novel karya Berliana Kimberly yang diterbitkan oleh Akad Publishing pada tahun 2022. Novel ini cocok dibaca oleh remaja perempuan maupun wanita dewasa yang menyukai novel bertema romance.', 'Beli', '2023-05-12', '1683771606217.png'),
(5, 'ada', 'ada', 'da', 2009, 'ada', 'Puspita Sari', '2023-05-15', '1684119131474.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_obat`
--

CREATE TABLE `daftar_obat` (
  `id` bigint(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `stocks` varchar(255) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_obat`
--

INSERT INTO `daftar_obat` (`id`, `create_date`, `update_date`, `stocks`, `satuan`, `expired`, `nama_obat`) VALUES
(1, '2023-04-11 15:40:10', '2023-04-11 15:40:10', '100', 'Tablet', '2023-04-11', 'Panadol'),
(2, '0000-00-00 00:00:00', NULL, '4', 'Sirup', '2023-05-27', 'OBH Combi'),
(3, '0000-00-00 00:00:00', NULL, '4', 'Sirup', '2023-05-13', 'Bronchitin');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` bigint(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `nama` varchar(255) DEFAULT NULL
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
  `id` bigint(20) NOT NULL,
  `foto` text DEFAULT NULL,
  `nama_guru` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL,
  `TB` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `riwayat_penyakit` varchar(255) DEFAULT NULL,
  `gol_darah` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `alergi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `foto`, `nama_guru`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`, `TB`, `BB`, `riwayat_penyakit`, `gol_darah`, `no_telepon`, `alergi`) VALUES
(1, NULL, 'Solikin', 'Jl. Kali Pancur', '1978-06-15', 'Semarang', NULL, 178, 75, 'mag', 'b', '089', 'usus ayamm'),
(2, NULL, 'Dwi Nur', 'Jl. Senopati', '2023-05-11', 'Demak', NULL, 167, 69, 'Asam Lambung', 'AB', '089', 'air'),
(3, NULL, 'Saeful', 'Jl. Kali Pancur', '2023-05-17', 'Semarang', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `tgl_barang_masuk` date DEFAULT NULL,
  `pendanaan` varchar(255) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama_barang`, `tgl_barang_masuk`, `pendanaan`, `jumlah_barang`) VALUES
(5, 'Meja', '2023-08-27', 'Dana Bos', 6),
(14, 'Kipas', '2023-05-12', 'dana bos', 6),
(15, 'Lampu', '2023-05-12', 'dana boss', 6);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) NOT NULL,
  `foto` text DEFAULT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL,
  `TB` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `riwayat_penyakit` varchar(255) DEFAULT NULL,
  `gol_darah` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `alergi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `foto`, `nama_karyawan`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`, `TB`, `BB`, `riwayat_penyakit`, `gol_darah`, `no_telepon`, `alergi`) VALUES
(1, NULL, 'Sutar', 'Jl. Kali Pancur', '1982-01-04', 'Kendal', NULL, 174, 79, 'mag', '', '', 'usus ayam'),
(2, NULL, 'Karmo', 'Jl. Senopati', '1980-07-10', 'Demak', NULL, 169, 74, '-', 'a', '08999999', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_uks`
--

CREATE TABLE `kegiatan_uks` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_mulai` timestamp NULL DEFAULT NULL,
  `tanggal_akhir` timestamp NULL DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan_uks`
--

INSERT INTO `kegiatan_uks` (`id`, `nama_kegiatan`, `tanggal_mulai`, `tanggal_akhir`, `deskripsi`, `foto`) VALUES
(1, 'Peresmian UKS SMPN 1 SMG', '2023-05-11 00:30:00', '2023-05-11 02:00:00', 'Pembukaan UKS SMPN 1 Semarang', '1683778201252.jpg'),
(4, 'Cuci Tangan Bersama', '2023-05-11 00:40:00', '2023-05-11 01:30:00', 'Kegiatan diadakan Di depan UKS', '1683780730703.jpg'),
(17, 'Senam Sehat', '2023-05-26 03:00:00', '2023-05-26 05:00:00', 'Kegiatan Senam di Lapangan', '1684137029918.png');

-- --------------------------------------------------------

--
-- Table structure for table `pasien_status`
--

CREATE TABLE `pasien_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
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
  `id` int(11) NOT NULL,
  `diagnosa_id` bigint(20) DEFAULT NULL,
  `tindakan_id` bigint(20) DEFAULT NULL,
  `penanganan_pertama_id` bigint(20) DEFAULT NULL,
  `daftar_obat_id` bigint(20) DEFAULT NULL,
  `periksa_id` bigint(20) DEFAULT NULL,
  `tensi_systolic` bigint(20) DEFAULT NULL,
  `tensi_diastolic` bigint(20) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penanganan_periksa`
--

INSERT INTO `penanganan_periksa` (`id`, `diagnosa_id`, `tindakan_id`, `penanganan_pertama_id`, `daftar_obat_id`, `periksa_id`, `tensi_systolic`, `tensi_diastolic`, `catatan`) VALUES
(1, 2, 1, 1, 2, 1, 117, 80, 'Semoga Sembuh'),
(2, 2, 1, 2, 2, 2, 119, 30, 'Lekas Sembuh'),
(3, 2, 1, 1, 2, 5, 110, 20, 'Lekas Sembuh'),
(4, 1, 1, 1, 2, 1, 120, 90, 'Cepat Sembuh'),
(5, 2, 1, 1, 3, 6, 117, 80, 'Lekas Sembuh');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan_pertama`
--

CREATE TABLE `penanganan_pertama` (
  `id` bigint(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `nama_penanganan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penanganan_pertama`
--

INSERT INTO `penanganan_pertama` (`id`, `create_date`, `update_date`, `nama_penanganan`) VALUES
(1, '2023-04-11 15:39:46', '2023-04-11 15:39:46', 'Di Perban'),
(2, '2023-05-10 11:05:16', NULL, 'Di Korbankan'),
(3, '0000-00-00 00:00:00', NULL, 'Di beri Obat');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` bigint(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT current_timestamp(),
  `status` bit(1) DEFAULT b'0',
  `keluhan` longtext DEFAULT NULL,
  `guru_id` bigint(20) DEFAULT NULL,
  `siswa_id` bigint(20) DEFAULT NULL,
  `karyawan_id` bigint(20) DEFAULT NULL,
  `keterangan_pasien_id` bigint(20) DEFAULT NULL,
  `pasien_status` varchar(255) DEFAULT NULL,
  `tahun_bulan` varchar(255) DEFAULT NULL,
  `tahun_bulan_hari` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `create_date`, `update_date`, `status`, `keluhan`, `guru_id`, `siswa_id`, `karyawan_id`, `keterangan_pasien_id`, `pasien_status`, `tahun_bulan`, `tahun_bulan_hari`) VALUES
(1, '2023-04-11 08:42:58', '2023-04-11 08:43:29', b'1', 'Pusingduh', NULL, 1, NULL, NULL, 'Siswa', '2023-04', '2023-04-11'),
(2, '2023-04-11 08:43:46', '2023-04-11 08:43:46', b'0', 'Pusing', 1, NULL, NULL, NULL, 'Guru', '2023-04', '2023-04-11'),
(5, '2023-05-12 01:40:57', '2023-05-12 01:40:57', b'0', 'Mual Mual', NULL, 4, NULL, NULL, 'Siswa', '2023-05', '2023-05-12'),
(6, '2023-05-12 01:42:21', '2023-05-12 01:42:21', b'0', 'Mual', NULL, 4, NULL, NULL, 'Siswa', '2023-05', '2023-05-12'),
(7, '2023-05-12 06:49:02', '2023-05-12 06:49:02', b'0', 'Demam', 3, NULL, NULL, NULL, 'Guru', '2023-05', '2023-05-12'),
(8, '2023-05-12 06:50:08', '2023-05-12 06:50:08', b'0', 'Sakit Kepala', NULL, NULL, 2, NULL, 'Karyawan', '2023-05', '2023-05-12'),
(10, '2023-05-15 07:03:06', '2023-05-15 07:03:06', b'0', 'Pusing', NULL, NULL, 1, NULL, 'Karyawan', '2023-05', '2023-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  `deskripsi` longtext DEFAULT NULL,
  `foto` text DEFAULT NULL
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
-- Table structure for table `program_klik`
--

CREATE TABLE `program_klik` (
  `id` bigint(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `keluhan` longtext DEFAULT NULL,
  `saran` longtext DEFAULT NULL,
  `guru_id` bigint(20) DEFAULT NULL,
  `siswa_id` bigint(20) DEFAULT NULL,
  `karyawan_id` bigint(20) DEFAULT NULL,
  `pasien_status` varchar(255) DEFAULT NULL,
  `tahun_bulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_klik`
--

INSERT INTO `program_klik` (`id`, `create_date`, `keluhan`, `saran`, `guru_id`, `siswa_id`, `karyawan_id`, `pasien_status`, `tahun_bulan`) VALUES
(1, '2023-05-12 03:33:38', 'Mual', 'Makan Ayam', 3, NULL, NULL, 'Guru', '2023-05'),
(2, '2023-05-12 03:35:37', 'Muntah', 'Makan Bayam\r\n', NULL, 4, NULL, 'Siswa', '2023-05'),
(3, '2023-05-14 21:53:15', 'Sakit hati', 'Semangat', NULL, 3, NULL, 'Siswa', '2023-05');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) NOT NULL,
  `foto` text DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL,
  `TB` int(11) DEFAULT NULL,
  `BB` int(11) DEFAULT NULL,
  `riwayat_penyakit` varchar(255) DEFAULT NULL,
  `gol_darah` varchar(255) DEFAULT NULL,
  `no_telepon_wali` varchar(255) DEFAULT NULL,
  `alergi` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `foto`, `nama_siswa`, `kelas`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`, `TB`, `BB`, `riwayat_penyakit`, `gol_darah`, `no_telepon_wali`, `alergi`, `nama_wali`) VALUES
(1, '1684118451484.png', 'Rizqi Ramandika', 'VII A', 'Mangkang', '2003-11-08', 'Semarang', 1, 600, 89, 'Tidak ada', 'C', '080494857', 'Udang', 'Wali'),
(3, NULL, 'Orlynz', 'VII A', 'Bringin', '2004-02-02', 'Semarang', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Mala Fillatunnida', 'XI TKJ', 'Rembang', '2023-04-30', 'Rembang', 2, 163, 48, 'Maag', 'A', '08123445', 'Udang', 'Akbar'),
(5, NULL, 'Lina', 'XI Tata Busana', 'Semarang', '2023-05-09', 'Semarang', NULL, 0, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id`, `foto`, `created_at`) VALUES
(3, '1684141123249.png', '2023-05-15 03:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
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
  ADD KEY `FK2k8dghilwkkc0j9pa2kwgbdxx` (`diagnosa_id`),
  ADD KEY `FK1t5wmmw5ljdxmr7me915pqr01` (`tindakan_id`),
  ADD KEY `FK32mt44a65dkhlh6pxty5awrh2` (`penanganan_pertama_id`),
  ADD KEY `FKhodf9h6bb8ltbkru05ot05kb0` (`periksa_id`),
  ADD KEY `daftar_obat_id` (`daftar_obat_id`);

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
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_klik`
--
ALTER TABLE `program_klik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan_uks`
--
ALTER TABLE `kegiatan_uks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pasien_status`
--
ALTER TABLE `pasien_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penanganan_periksa`
--
ALTER TABLE `penanganan_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penanganan_pertama`
--
ALTER TABLE `penanganan_pertama`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `program_klik`
--
ALTER TABLE `program_klik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penanganan_periksa`
--
ALTER TABLE `penanganan_periksa`
  ADD CONSTRAINT `penanganan_periksa_ibfk_1` FOREIGN KEY (`diagnosa_id`) REFERENCES `diagnosa` (`id`),
  ADD CONSTRAINT `penanganan_periksa_ibfk_2` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id`),
  ADD CONSTRAINT `penanganan_periksa_ibfk_3` FOREIGN KEY (`penanganan_pertama_id`) REFERENCES `penanganan_pertama` (`id`),
  ADD CONSTRAINT `penanganan_periksa_ibfk_4` FOREIGN KEY (`daftar_obat_id`) REFERENCES `daftar_obat` (`id`),
  ADD CONSTRAINT `penanganan_periksa_ibfk_5` FOREIGN KEY (`periksa_id`) REFERENCES `periksa` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `periksa_ibfk_3` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
