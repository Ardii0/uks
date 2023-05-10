-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 03:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uks` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `uks`;

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
-- Table structure for table `daftar_obat`
--

CREATE TABLE `daftar_obat` (
  `id` bigint(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `dosis` varchar(255) DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL
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
  `alamat` varchar(255) DEFAULT NULL,
  `nama_guru` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL
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
  `id` bigint(20) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL
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
(1, 'Bersih-bersih UKS', '2023-05-10 13:00:00', '2023-05-10 02:00:00', 'Semangat Anak-anak', '1683726912346.jpg');

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
  `catatan` varchar(255) DEFAULT NULL,
  `diagnosa_penyakit_id` bigint(20) DEFAULT NULL,
  `tindakan_id` bigint(20) DEFAULT NULL,
  `penanganan_pertama_id` bigint(20) DEFAULT NULL,
  `periksa_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penanganan_periksa`
--

INSERT INTO `penanganan_periksa` (`id`, `catatan`, `diagnosa_penyakit_id`, `tindakan_id`, `penanganan_pertama_id`, `periksa_id`) VALUES
(1, 'Bismillah', 2, 2, 2, 1);

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
(2, '2023-05-10 11:05:16', NULL, 'Di Korbankan');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` bigint(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `daftar_penanganan` longtext DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `keluhan` longtext DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `guru_id` bigint(20) DEFAULT NULL,
  `karyawan_id` bigint(20) DEFAULT NULL,
  `keterangan_pasien_id` bigint(20) DEFAULT NULL,
  `pasien_status_id` int(11) DEFAULT NULL,
  `siswa_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `create_date`, `update_date`, `daftar_penanganan`, `status`, `keluhan`, `nama_pasien`, `guru_id`, `karyawan_id`, `keterangan_pasien_id`, `pasien_status_id`, `siswa_id`) VALUES
(1, '2023-04-11 15:42:58', '2023-04-11 15:43:29', NULL, b'1', 'Pusing', 'Rizqi Ramandika', NULL, NULL, NULL, 2, 1),
(2, '2023-04-11 15:43:46', '2023-04-11 15:43:46', NULL, b'0', 'Pusing', 'Dwi Sasmita', 1, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `alamat`, `kelas`, `nama_siswa`, `tanggal_lahir`, `tempat_lahir`, `total_periksa`) VALUES
(1, 'Mangkang', 'VII A', 'Rizqi Ramandika', '2003-11-08 07:00:00', 'Semarang', 1),
(3, 'Bringin', 'VII A', 'Orlynz', '2004-02-02 10:22:59', 'Semarang', 0);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan_uks`
--
ALTER TABLE `kegiatan_uks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien_status`
--
ALTER TABLE `pasien_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penanganan_periksa`
--
ALTER TABLE `penanganan_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penanganan_pertama`
--
ALTER TABLE `penanganan_pertama`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
