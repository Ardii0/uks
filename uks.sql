-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 01:37 PM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penerbit_buku`, `penulis_buku`, `tahun_terbit`, `keterangan`, `sumber`, `created_at`, `foto`) VALUES
(1, 'Laut Tengah', 'Akads', ' Berliana Kimberly', 2022, 'Laut Tengah merupakan novel karya Berliana Kimberly yang diterbitkan oleh Akad Publishing pada tahun 2022. Novel ini cocok dibaca oleh remaja perempuan maupun wanita dewasa yang menyukai novel bertema romance.', 'Beli', '2023-05-12 02:19:00', '1683771606217.png');

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
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `tgl_barang_masuk` datetime DEFAULT NULL,
  `asal_barang` varchar(255) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL
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
(15, 'Lampu', '2023-05-12 11:44:11', 'dana boss', 6);

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
(1, 'Peresmian UKS SMPN 1 SMG', '2023-05-11 00:30:00', '2023-05-11 02:00:00', 'Pembukaan UKS SMPN 1 Semarang', '1683778201252.jpg'),
(4, 'Cuci Tangan Bersama', '2023-05-11 00:40:00', '2023-05-11 01:30:00', 'Kegiatan diadakan Di depan UKS', '1683780730703.jpg');

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
(1, 'Lekas Sembuh', 2, 1, 1, 1),
(3, 'Tes', 2, 1, 2, 2),
(4, 'Lekas Sembuh', 2, 1, 1, 5),
(5, 'Cepat Sembuh', 1, 1, 1, 1);

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
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT current_timestamp(),
  `status` bit(1) DEFAULT b'0',
  `keluhan` longtext DEFAULT NULL,
  `guru_id` bigint(20) DEFAULT NULL,
  `siswa_id` bigint(20) DEFAULT NULL,
  `karyawan_id` bigint(20) DEFAULT NULL,
  `keterangan_pasien_id` bigint(20) DEFAULT NULL,
  `pasien_status` varchar(255) DEFAULT NULL,
  `tahun_bulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `create_date`, `update_date`, `status`, `keluhan`, `guru_id`, `siswa_id`, `karyawan_id`, `keterangan_pasien_id`, `pasien_status`, `tahun_bulan`) VALUES
(1, '2023-04-11 08:42:58', '2023-04-11 08:43:29', b'1', 'Pusingduh', NULL, 1, NULL, NULL, 'Siswa', '2023-04'),
(2, '2023-04-11 08:43:46', '2023-04-11 08:43:46', b'0', 'Pusing', 1, NULL, NULL, NULL, 'Guru', '2023-04'),
(5, '2023-05-12 01:40:57', '2023-05-12 01:40:57', b'0', 'Mual Mual', NULL, 4, NULL, NULL, 'Siswa', NULL),
(6, '2023-05-12 01:42:21', '2023-05-12 01:42:21', b'0', 'Mual', NULL, 4, NULL, NULL, 'Siswa', NULL),
(7, '2023-05-12 06:49:02', '2023-05-12 06:49:02', b'0', 'Demam', 3, NULL, NULL, NULL, 'Guru', '2023-05'),
(8, '2023-05-12 06:50:08', '2023-05-12 06:50:08', b'0', 'Sakit Kepala', NULL, NULL, 2, NULL, 'Karyawan', '2023-05');

-- --------------------------------------------------------

--
-- Table structure for table `program_click`
--

CREATE TABLE `program_click` (
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
-- Dumping data for table `program_click`
--

INSERT INTO `program_click` (`id`, `create_date`, `keluhan`, `saran`, `guru_id`, `siswa_id`, `karyawan_id`, `pasien_status`, `tahun_bulan`) VALUES
(1, '2023-05-12 03:33:38', 'Mual', 'Makan Ayam', 3, NULL, NULL, 'Guru', '2023-05'),
(2, '2023-05-12 03:35:37', 'Muntah', 'Makan Bayam\r\n', NULL, 4, NULL, 'Siswa', '2023-05');

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
(6, 'wdad', '2023-05-12 09:36:00', 'awdad', '1683884186357.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `total_periksa` int(11) DEFAULT NULL,
  `TB` varchar(255) DEFAULT NULL,
  `BB` varchar(255) DEFAULT NULL,
  `riwayat_penyakit` varchar(255) DEFAULT NULL,
  `gol_darah` varchar(255) DEFAULT NULL,
  `no_telepon_wali` varchar(255) DEFAULT NULL,
  `alergi` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_click`
--
ALTER TABLE `program_click`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `FKg2i0oe51i65ahdj5n0oisaqn0` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
