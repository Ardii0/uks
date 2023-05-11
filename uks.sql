-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 11:54 AM
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
-- Table structure for table `daftar_obat`
--

CREATE TABLE `daftar_obat` (
  `id` bigint NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_obat`
--

INSERT INTO `daftar_obat` (`id`, `create_date`, `update_date`, `dosis`, `expired`, `nama_obat`) VALUES
(1, '2023-04-11 15:40:10', '2023-04-11 15:40:10', '100', '2023-04-11 07:00:00', 'Panadol');

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
(3, 'Mijen', 'Dwi Arianto', '1987-02-02 09:57:00', 'Magelang', 0);

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
(4, 'Cuci Tangan Bersama', '2023-05-11 00:40:00', '2023-05-11 01:30:00', 'Dilakukan Di Wastafel depan UKS', '1683780730703.jpg'),
(10, 'Ada', '2023-05-18 07:19:00', '0000-00-00 00:00:00', 'ada', '1683789592019.png');

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
(1, 'Bismillah', 2, 2, 2, 1),
(3, 'Tes', 2, 1, 2, 2);

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
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `daftar_penanganan` longtext COLLATE utf8mb4_general_ci,
  `status` bit(1) DEFAULT NULL,
  `keluhan` longtext COLLATE utf8mb4_general_ci,
  `nama_pasien` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guru_id` bigint DEFAULT NULL,
  `karyawan_id` bigint DEFAULT NULL,
  `keterangan_pasien_id` bigint DEFAULT NULL,
  `pasien_status_id` int DEFAULT NULL,
  `siswa_id` bigint DEFAULT NULL,
  `tahun_bulan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `create_date`, `update_date`, `daftar_penanganan`, `status`, `keluhan`, `nama_pasien`, `guru_id`, `karyawan_id`, `keterangan_pasien_id`, `pasien_status_id`, `siswa_id`, `tahun_bulan`) VALUES
(1, '2023-04-11 15:42:58', '2023-04-11 15:43:29', NULL, b'1', 'Pusing', 'Rizqi Ramandika', NULL, NULL, NULL, 2, 1, '2023-04'),
(2, '2023-04-11 15:43:46', '2023-04-11 15:43:46', NULL, b'0', 'Pusing', 'Dwi Sasmita', 1, NULL, NULL, 1, NULL, '2023-04'),
(3, '2023-05-11 09:31:43', '2023-05-11 09:31:43', NULL, b'0', 'Ada', 'Orlynz', NULL, NULL, NULL, 2, 3, '2023-05');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
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

INSERT INTO `siswa` (`id`, `alamat`, `kelas`, `nama_siswa`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`, `TB`, `BB`, `riwayat_penyakit`, `gol_darah`, `no_telepon_wali`, `alergi`, `nama_wali`) VALUES
(1, 'Mangkang', 'VII A', 'Rizqi Ramandika', '2003-11-08', 'Semarang', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Bringin', 'VII A', 'Orlynz', '2004-02-02', 'Semarang', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Rembang', 'XI TKJ', 'Mala Fillatunnida', '2023-04-30', 'Rembang', NULL, '163 cm', '48 kg', 'Maag', 'A', '08123445', 'Udang', 'Akbar'),
(5, 'Semarang', 'XI Tata Busana', 'Lina', '2023-05-09', 'Semarang', NULL, '', '', '', '', '', '', '');

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
  ADD KEY `FKgr9hwaq6pbnt0taj7xmiay0sv` (`pasien_status_id`),
  ADD KEY `FK47quael7ajgnjndxqajkdqsja` (`siswa_id`);

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
-- AUTO_INCREMENT for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan_uks`
--
ALTER TABLE `kegiatan_uks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pasien_status`
--
ALTER TABLE `pasien_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penanganan_periksa`
--
ALTER TABLE `penanganan_periksa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penanganan_pertama`
--
ALTER TABLE `penanganan_pertama`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `FKg2i0oe51i65ahdj5n0oisaqn0` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `FKgr9hwaq6pbnt0taj7xmiay0sv` FOREIGN KEY (`pasien_status_id`) REFERENCES `pasien_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
