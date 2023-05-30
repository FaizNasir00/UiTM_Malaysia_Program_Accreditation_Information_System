-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 04:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pais`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakulti`
--

CREATE TABLE `fakulti` (
  `fakulti_id` int(11) NOT NULL,
  `nama_fakulti` varchar(50) NOT NULL,
  `alamat_fakulti` varchar(250) NOT NULL,
  `no_tel_fakulti` varchar(20) NOT NULL,
  `no_fax_fakulti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakulti`
--

INSERT INTO `fakulti` (`fakulti_id`, `nama_fakulti`, `alamat_fakulti`, `no_tel_fakulti`, `no_fax_fakulti`) VALUES
(1, 'FSKM', 'Shah Alam', '', ''),


-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `panel_id` int(11) NOT NULL,
  `jenis_panel` varchar(20) NOT NULL,
  `nama_panel` varchar(50) NOT NULL,
  `bidang` varchar(250) NOT NULL,
  `institusi` varchar(250) NOT NULL,
  `no_tel` varchar(20) NOT NULL,
  `emel` varchar(50) NOT NULL,
  `cv` blob NOT NULL,
  `borang_terima_pelantikan` blob NOT NULL,
  `bayaran_honororium` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`panel_id`, `jenis_panel`, `nama_panel`, `bidang`, `institusi`, `no_tel`, `emel`, `cv`, `borang_terima_pelantikan`, `bayaran_honororium`) VALUES
(2, 'Panel Dalam', 'Rahman', 'business', 'Fakulti ', '', 'faiz@gmail.com', '', '', ''),


-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `permohonan_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `jenis_permohonan` varchar(50) NOT NULL,
  `tarikh_permohonan` date NOT NULL,
  `kampus` varchar(250) NOT NULL,
  `alamat_program` varchar(250) NOT NULL,
  `no_fon` varchar(20) NOT NULL,
  `no_faks` varchar(20) NOT NULL,
  `emel_rasmi` varchar(50) NOT NULL,
  `kod_program` varchar(20) NOT NULL,
  `nama_program_bm` varchar(50) NOT NULL,
  `nama_program_bi` varchar(50) NOT NULL,
  `tarikh_jkpt` date NOT NULL,
  `tahap_mqf` varchar(10) NOT NULL,
  `kod_nec` varchar(20) NOT NULL,
  `tarikh_program_dimulakan` date NOT NULL,
  `tarikh_kohort_pertama_bergraduat` date NOT NULL,
  `nama_pic` varchar(50) NOT NULL,
  `jawatan_pic` varchar(30) NOT NULL,
  `no_tel_pejabat_pic` varchar(20) NOT NULL,
  `no_tel_bimbit_pic` varchar(20) NOT NULL,
  `pautan_dokumen_penilaian` varchar(50) NOT NULL,
  `tarikh_diterima_uhek` date NOT NULL,
  `tarikh_senat` date NOT NULL,
  `bil_senat` varchar(20) NOT NULL,
  `no_rujukan_mqa` varchar(20) NOT NULL,
  `sijil_mqa_bm` varchar(20) NOT NULL,
  `sijil_mqa_bi` varchar(20) NOT NULL,
  `panel_dalam` varchar(50) NOT NULL,
  `panel_luar` varchar(50) NOT NULL,
  `status_permohonan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`permohonan_id`, `status_id`, `jenis_permohonan`, `tarikh_permohonan`, `kampus`, `alamat_program`, `no_fon`, `no_faks`, `emel_rasmi`, `kod_program`, `nama_program_bm`, `nama_program_bi`, `tarikh_jkpt`, `tahap_mqf`, `kod_nec`, `tarikh_program_dimulakan`, `tarikh_kohort_pertama_bergraduat`, `nama_pic`, `jawatan_pic`, `no_tel_pejabat_pic`, `no_tel_bimbit_pic`, `pautan_dokumen_penilaian`, `tarikh_diterima_uhek`, `tarikh_senat`, `bil_senat`, `no_rujukan_mqa`, `sijil_mqa_bm`, `sijil_mqa_bi`, `panel_dalam`, `panel_luar`, `status_permohonan`) VALUES
-- Private
-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `permohonan_id` int(11) NOT NULL,
  `status_terkini` varchar(250) NOT NULL,
  `tarikh_terima_dokumen` date NOT NULL,
  `tarikh_lantik_panel` date NOT NULL,
  `tarikh_penilaian_pertama` date NOT NULL,
  `tarikh_maklumbalas_pertama` date NOT NULL,
  `tarikh_penilaian_kedua` date NOT NULL,
  `tarikh_maklumbalas_kedua` date NOT NULL,
  `tarikh_jkppp` date NOT NULL,
  `tarikh_senat` date NOT NULL,
  `tarikh_penghantaran_ke_mqa` date NOT NULL,
  `tarikh_terima_sps02` date NOT NULL,
  `tarikh_tersenarai_di_mqr` date NOT NULL,
  `tarikh_selesai` date NOT NULL,
  `catatan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `permohonan_id`, `status_terkini`, `tarikh_terima_dokumen`, `tarikh_lantik_panel`, `tarikh_penilaian_pertama`, `tarikh_maklumbalas_pertama`, `tarikh_penilaian_kedua`, `tarikh_maklumbalas_kedua`, `tarikh_jkppp`, `tarikh_senat`, `tarikh_penghantaran_ke_mqa`, `tarikh_terima_sps02`, `tarikh_tersenarai_di_mqr`, `tarikh_selesai`, `catatan`) VALUES
-- Private data
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'FaizGusion', 'faiz@gmail.com', '$2y$10$fdesfsdfsef/mICfuJ2'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakulti`
--
ALTER TABLE `fakulti`
  ADD PRIMARY KEY (`fakulti_id`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`panel_id`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`permohonan_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakulti`
--
ALTER TABLE `fakulti`
  MODIFY `fakulti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `permohonan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
