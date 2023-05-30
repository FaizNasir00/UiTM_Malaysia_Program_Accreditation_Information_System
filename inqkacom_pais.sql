-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2023 at 10:11 AM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inqkacom_pais`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakulti`
--

CREATE TABLE `fakulti` (
  `fakulti_id` int(11) NOT NULL,
  `nama_fakulti` varchar(250) NOT NULL,
  `alamat_fakulti` varchar(250) NOT NULL,
  `no_tel_fakulti` varchar(20) NOT NULL,
  `no_fax_fakulti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakulti`
--

INSERT INTO `fakulti` (`fakulti_id`, `nama_fakulti`, `alamat_fakulti`, `no_tel_fakulti`, `no_fax_fakulti`) VALUES
(1, 'Arshad Ayub Graduate Business School (AAGBS)', 'Kompleks Al-Farabi, Jalan Ilmu/1, Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(2, 'Fakulti Perakaunan', 'Aras 1 & 2 Bangunan FPN, UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Bandar Puncak Alam, Selangor', '', ''),
(3, 'Fakulti Sains Pentadbiran Dan Pengajian Polisi', 'UiTM Cawangan Negeri Sembilan, Kampus Seremban 3, 70300 Seremban, Negeri Sembilan', '', ''),
(4, 'Akademi Pengajian Bahasa (APB)', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(5, 'Accounting Research Institute (ARI)', 'Aras 12, Menara SAAS, Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(6, 'Fakulti Sains Gunaan', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(7, 'Fakulti Perladangan dan Agroteknologi', 'UiTM Cawangan Melaka, Kampus Jasin, 77300 Merlimau, Melaka', '', ''),
(8, 'Fakulti Pengurusan & Perniagaan', 'UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Puncak Alam, Selangor', '0148549669', ''),
(9, 'Kolej Pengajian Seni Kreatif', 'Aras 4, Kompleks Ilham, Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(10, 'Kolej Pengajian Pengkomputeran, Informatik dan Media', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(11, 'Kolej Pengajian Kejuruteraan', 'Aras 9, Menara 2, Kompleks Kejuruteraan, Tuanku Abdul Halim Mu\'adzam Shah, Universiti Teknologi MARA 40450 Shah Alam, Selangor', '', ''),
(12, 'Kolej Pengajian Alam Bina', 'Kompleks Tahir Majid, Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(13, 'Fakulti Pergigian', 'UiTM Cawangan Selangor, Kampus Sungai Buloh, 47000 Jalan Hospital, Sungai Buloh, Selangor', '', ''),
(14, 'Fakulti Pendidikan', 'Aras 5 & 7, Bangunan FSK 1,5 UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Bandar Puncak Alam, Selangor', '', ''),
(15, 'Fakulti Pengurusan Hotel dan Pelancongan', 'UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Puncak Alam, Selangor', '', ''),
(16, 'Fakulti Sains Kesihatan', 'UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Puncak Alam, Selangor', '', ''),
(17, 'Akademi Pengajian Islam Kontemporari  (ACIS) ', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(18, 'Malaysia Institute of Transport (MITRANS)', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(19, 'Fakulti Undang-Undang', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(20, 'Fakulti Perubatan', 'UiTM Cawangan Selangor, Kampus Sungai Buloh, 47000 Jalan Hospital, Sungai Buloh, Selangor', '', ''),
(21, 'Fakulti Farmasi', 'Aras 11, Bangunan FF1, UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Bandar Puncak Alam, Selangor', '', ''),
(22, 'Fakulti Sains Sukan dan Rekreasi', 'Bangunan Akademik 3, Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '', ''),
(23, 'Pusat Asasi', '', '', ''),
(24, 'Universiti Teknologi MARA Cawangan Perak Kampus Seri Iskandar', 'Universiti Teknologi MARA Cawangan Perak Kampus Seri Iskandar,\r\n32610 Bandar Baru Seri Iskandar,\r\nPerak', '', ''),
(25, 'Universiti Teknologi MARA Cawangan Perak Kampus Tapah', 'Universiti Teknologi MARA Cawangan Perak Kampus Tapah, \r\n35400 Tapah Road,\r\nPerak', '', ''),
(26, 'Universiti Teknologi MARA Cawangan Selangor Kampus Dengkil', 'Pusat Asasi\r\nUniversiti Teknologi MARA Cawangan Selangor Kampus Dengkil,\r\n43800 Dengkil , \r\nSelangor', '', ''),
(27, 'Universiti Teknologi MARA Cawangan Selangor Kampus Sungai Buloh', 'Universiti Teknologi MARA Cawangan Selangor Kampus Sungai Buloh, \r\nJalan Hospital, \r\n47000 Sungai Buloh, \r\nSelangor', '', ''),
(28, 'Universiti Teknologi MARA Cawangan Selangor Kampus Puncak Alam', 'Universiti Teknologi MARA Cawangan Selangor Kampus Puncak Alam, \r\n42300 Bandar Puncak Alam,\r\nSelangor', '', ''),
(29, 'Universiti Teknologi MARA Cawangan Selangor Kampus Puncak Perdana', 'Universiti Teknologi MARA Cawangan Selangor Kampus Puncak Perdana,\r\nSeksyen U10, \r\n40150 Shah Alam,\r\nSelangor', '', ''),
(30, 'Universiti Teknologi MARA Cawangan Pahang Kampus Jengka', 'Universiti Teknologi MARA Cawangan Pahang Kampus Jengka,\r\n26400 Bandar Tun Abdul Razak Jengka,\r\nPahang', '', ''),
(31, 'Universiti Teknologi MARA Cawangan Pahang Kampus Raub', 'Universiti Teknologi MARA Cawangan Pahang Kampus Raub,\r\n27600 Raub,\r\nPahang', '', ''),
(32, 'Universiti Teknologi MARA Cawangan Kelantan Kampus Machang', 'Universiti Teknologi MARA Cawangan Kelantan Kampus Machang, \r\nBukit Ilmu, \r\n18500 Machang, \r\nKelantan', '', ''),
(33, 'Universiti Teknologi MARA Cawangan Kelantan Kampus Kota Bharu', 'Universiti Teknologi MARA Cawangan Kelantan Kampus Kota Bharu,\r\nLembah Sireh,\r\n15050 Kota Bharu,\r\nKelantan', '', ''),
(34, 'Universiti Teknologi MARA Cawangan Johor Kampus Segamat', 'Universiti Teknologi MARA Cawangan Johor Kampus Segamat,\r\nJalan Universiti Off KM 12 Jalan Muar,\r\n85000 Segamat,\r\nJohor', '', ''),
(35, 'Universiti Teknologi MARA Cawangan Johor Kampus Pasir Gudang', 'Universiti Teknologi MARA Cawangan Johor Kampus Pasir Gudang \r\nJalan Purnama\r\nBanda Seri Alam \r\n81750 Masai \r\nJohor', '', ''),
(36, 'Universiti Teknologi MARA Cawangan Kedah Kampus Sungai Petani', 'Universiti Teknologi MARA Cawangan Kedah Kampus Sungai Petani\r\n08400 Merbok\r\nKedah', '', ''),
(37, 'Universiti Teknologi MARA Cawangan Melaka Kampus Alor Gajah', 'Universiti Teknologi MARA Cawangan Melaka Kampus Alor Gajah \r\nKM 26 Jalan Lendu\r\n78000 Alor Gajah\r\nMelaka', '', ''),
(38, 'Universiti Teknologi MARA Cawangan Melaka Kampus Bandaraya Melaka', 'Universiti Teknologi MARA Cawangan Melaka Kampus Bandaraya Melaka\r\n110, Off Jalan Hang Tuah\r\n75300 Melaka ', '', ''),
(39, 'Universiti Teknologi MARA Cawangan Melaka Kampus Jasin', 'Universiti Teknologi MARA Cawangan Melaka Kampus Jasin\r\n77300 Merlimau\r\nMelaka', '', ''),
(40, 'Universiti Teknologi MARA Cawangan Negeri Sembilan Kampus Kuala Pilah', 'Universiti Teknologi MARA Cawangan Negeri Sembilan Kampus Kuala Pilah \r\nPekan Parit Tinggi\r\n72000 Kuala Pilah\r\nNegeri Sembilan', '', ''),
(41, 'Universiti Teknologi MARA Cawangan Negeri Sembilan Kampus Seremban 3', 'Universiti Teknologi MARA Cawangan Negeri Sembilan Kampus Seremban 3 \r\nPersiaran Seremban Tiga/1, \r\nSeremban 3\r\n70300 Seremban\r\nNegeri Sembilan', '', ''),
(42, 'Universiti Teknologi MARA Cawangan Negeri Sembilan Kampus Rembau', 'Universiti Teknologi MARA Cawangan Negeri Sembilan Kampus Rembau \r\n71300 Rembau \r\nNegeri Sembilan', '', ''),
(43, 'Universiti Teknologi MARA Cawangan Pulau Pinang Kampus Bertam', 'Universiti Teknologi MARA Cawangan Pulau Pinang Kampus Bertam\r\n13200 Kepala Batas\r\nPulau Pinang', '', ''),
(44, 'Universiti Teknologi MARA Cawangan Pulau Pinang Kampus Permatang Pauh', 'Universiti Teknologi MARA Cawangan Pulau Pinang Kampus Permatang Pauh \r\nJalan Permatang Pauh\r\n13500 Permatang Pauh\r\nPulau Pinang', '', ''),
(45, 'Universiti Teknologi MARA Cawangan Sarawak Kampus Samarahan', 'Universiti Teknologi MARA Cawangan Sarawak Kampus Samarahan \r\nJalan Meranek \r\n94300 Kota Samarahan \r\nSarawak', '', ''),
(46, 'Universiti Teknologi MARA Cawangan Sarawak Kampus Mukah', 'Universiti Teknologi MARA Cawangan Sarawak Kampus Mukah\r\nK.M 7.5 Jalan Oya\r\n96400 Mukah\r\nSarawak', '', ''),
(47, 'Universiti Teknologi MARA Cawangan Perlis Kampus Arau', 'Universiti Teknologi MARA Cawangan Perlis Kampus Arau \r\n02600 Arau \r\nPerlis', '', ''),
(48, 'Universiti Teknologi MARA Cawangan Sabah Kampus Kota Kinabalu', 'Universiti Teknologi MARA Cawangan Sabah Kampus Kota Kinabalu \r\nBeg Berkunci 71\r\n88997 Kota Kinabalu\r\nSabah', '', ''),
(49, 'Universiti Teknologi MARA Cawangan Sabah Kampus Tawau', 'Universiti Teknologi MARA Cawangan Sabah Kampus Tawau\r\nKM36 Jalan Apas Balung\r\nPeti Surat 61372\r\n91032 Tawau\r\nSabah', '', ''),
(50, 'Universiti Teknologi MARA Cawangan Terengganu Kampus Dungun', 'Universiti Teknologi MARA Cawangan Terengganu Kampus Dungun\r\nSura Hujung\r\n23000 Dungun\r\nTerengganu', '', ''),
(51, 'Universiti Teknologi MARA Cawangan Terengganu Kampus Bukit Besi', 'Universiti Teknologi MARA Cawangan Terengganu Kampus Bukit Besi \r\n23200 Dungun \r\nTerengganu', '', ''),
(52, 'Universiti Teknologi MARA Cawangan Terengganu Kampus Kuala Terengganu', 'Universiti Teknologi MARA Cawangan Terengganu Kampus Kuala Terengganu\r\n21080 Kuala Terengganu\r\nTerengganu', '', ''),
(53, 'Universiti Teknologi MARA Shah Alam', 'Universiti Teknologi MARA, \r\nJalan Ilmu 1/1,\r\n40450 Shah Alam,\r\nSelangor', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `panel_id` int(11) NOT NULL,
  `jenis_panel` varchar(20) NOT NULL,
  `nama_panel` varchar(500) NOT NULL,
  `bidang` varchar(250) NOT NULL,
  `institusi` varchar(250) NOT NULL,
  `no_tel` varchar(20) NOT NULL,
  `emel` varchar(50) NOT NULL,
  `cv` blob NOT NULL,
  `borang_terima_pelantikan` blob NOT NULL,
  `bayaran_honororium` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`panel_id`, `jenis_panel`, `nama_panel`, `bidang`, `institusi`, `no_tel`, `emel`, `cv`, `borang_terima_pelantikan`, `bayaran_honororium`) VALUES
(1, 'Panel Luar', 'PM Dr. Juliana Abdul Wahab (School of Communication, USM)', 'School of Communication, USM', 'School of Communication, USM', '', '', '', '', 'no'),
(2, 'Panel Luar', 'Dr. Abdul Riezal Bin Dim', '-', 'Faculty of Applied and Creative Arts, UNiMAS', '012345678', 'ariezal@uitm.edu.my', '', '', ''),
(3, 'Panel Dalam', 'PM Dr. Rusmadiah Anwar', '', 'Kolej Pengajian Seni Kreatif', '013254687', 'rusma@uitm.edu.my', '', '', 'Yes'),
(4, 'Panel Dalam', 'Dr Mazlan Che Soh (KUK FSPPP)', '-', 'Kolej Pengajian Seni Kreatif', '015642387', 'mazlanche@uitm.edu.my', '', '', 'Yes'),
(5, 'Panel Dalam', 'Dr. Nik Zam Nik Wan (KUK Cawangan Kelantan)', '-', 'Kolej Pengajian Seni Kreatif', '015642387', 'mazlanche@uitm.edu.my', '', '', 'Yes');

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
  `no_bil_jkpt` varchar(10) NOT NULL,
  `no_ruj_jkpt` varchar(10) NOT NULL,
  `tahap_mqf` varchar(10) NOT NULL,
  `bidang_nec` varchar(255) NOT NULL,
  `kod_nec` varchar(20) NOT NULL,
  `tarikh_program_dimulakan` date NOT NULL,
  `tarikh_kohort_pertama_bergraduat` date NOT NULL,
  `nama_pic` varchar(50) NOT NULL,
  `jawatan_pic` varchar(30) NOT NULL,
  `no_tel_pejabat_pic` varchar(20) NOT NULL,
  `no_tel_bimbit_pic` varchar(20) NOT NULL,
  `pautan_dokumen_penilaian` varchar(50) NOT NULL,
  `tarikh_senat` date NOT NULL,
  `bil_senat` varchar(20) NOT NULL,
  `no_rujukan_mqa` varchar(20) NOT NULL,
  `sijil_mqa_bm` blob NOT NULL,
  `sijil_mqa_bi` blob NOT NULL,
  `panel_dalam1` varchar(100) NOT NULL,
  `panel_dalam2` varchar(100) NOT NULL,
  `panel_dalam3` varchar(100) NOT NULL,
  `panel_dalam4` varchar(100) NOT NULL,
  `panel_luar1` varchar(100) NOT NULL,
  `panel_luar2` varchar(100) NOT NULL,
  `panel_luar3` varchar(100) NOT NULL,
  `panel_luar4` varchar(100) NOT NULL,
  `institusi_dalam1` varchar(500) NOT NULL,
  `institusi_dalam2` varchar(500) NOT NULL,
  `institusi_dalam3` varchar(500) NOT NULL,
  `institusi_dalam4` varchar(500) NOT NULL,
  `institusi_luar1` varchar(500) NOT NULL,
  `institusi_luar2` varchar(500) NOT NULL,
  `institusi_luar3` varchar(500) NOT NULL,
  `institusi_luar4` varchar(500) NOT NULL,
  `status_permohonan` varchar(50) NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`permohonan_id`, `status_id`, `jenis_permohonan`, `tarikh_permohonan`, `kampus`, `alamat_program`, `no_fon`, `no_faks`, `emel_rasmi`, `kod_program`, `nama_program_bm`, `nama_program_bi`, `no_bil_jkpt`, `no_ruj_jkpt`, `tahap_mqf`, `bidang_nec`, `kod_nec`, `tarikh_program_dimulakan`, `tarikh_kohort_pertama_bergraduat`, `nama_pic`, `jawatan_pic`, `no_tel_pejabat_pic`, `no_tel_bimbit_pic`, `pautan_dokumen_penilaian`, `tarikh_senat`, `bil_senat`, `no_rujukan_mqa`, `sijil_mqa_bm`, `sijil_mqa_bi`, `panel_dalam1`, `panel_dalam2`, `panel_dalam3`, `panel_dalam4`, `panel_luar1`, `panel_luar2`, `panel_luar3`, `panel_luar4`, `institusi_dalam1`, `institusi_dalam2`, `institusi_dalam3`, `institusi_dalam4`, `institusi_luar1`, `institusi_luar2`, `institusi_luar3`, `institusi_luar4`, `status_permohonan`, `catatan`) VALUES
(1, 1, 'IQA02(T/L)', '2023-05-03', 'Fakulti Perakaunan', 'Aras 11, Bangunan FF1, UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Bandar Puncak Alam, Selangor', '0145532287', '0145534288', 'abc@gmail.com', 'AC111', 'Sarjana Muda Filem (Kepujian) Sinematografi', 'Diploma Perakaunan Fast -track', '28', '123456', '4', 'Audio-Visual Techniques and Media Production', '1111', '2023-05-03', '2023-05-03', 'Dr. Zalina binti Zakaria', 'EXECUTIVE OFFICER', '143546547', '456546546', '654546456', '2023-05-03', '272', 'SWA4111', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 2, 'IQA02(T/L)', '2023-05-03', 'Fakulti Perakaunan', 'Aras 1 & 2 Bangunan FPN, UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Bandar Puncak Alam, Selangor', '0145532287', '0145534288', 'abc@gmail.com', 'AC111', 'Diploma Perakaunan Fast -track', 'Diploma Perakaunan Fast -track', '28', '123456', '4', 'Akaun', '1111', '2023-05-25', '2023-05-03', 'aaaa', 'bbbb', '035656825', '0154646523', 'www.drive.com', '2023-05-03', '272', 'WC5847', '', '', 'PM Dr. Rusmadiah Anwar', 'PM Dr. Rusmadiah Anwar', 'PM Dr. Rusmadiah Anwar', 'PM Dr. Rusmadiah Anwar', 'PM Dr. Juliana Abdul Wahab (School of Communicatio', 'PM Dr. Juliana Abdul Wahab (School of Communicatio', 'Dr. Abdul Riezal Bin Dim', 'PM Dr. Juliana Abdul Wahab (School of Communicatio', 'Kolej Pengajian Seni Kreatif', 'Kolej Pengajian Seni Kreatif', 'Kolej Pengajian Seni Kreatif', 'Kolej Pengajian Seni Kreatif', 'School of Communication, USM', 'School of Communication, USM', 'School of Communication, USM', 'School of Communication, USM', 'Terima Dokumen', ''),
(3, 3, 'IQA02(T/L)', '2023-05-03', 'Fakulti Perakaunan', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '0145532287', '0145534288', 'abc@gmail.com', 'AC111', 'Diploma Perakaunan Fast -track', 'Diploma Perakaunan Fast -track', '28', '12345', '4', 'Akaun', '1111', '2023-05-03', '2023-05-03', 'aaaa', 'bbbb', '01234568', '0154646523', 'www.drive.com', '2023-05-03', '272', 'SWA4111', '', '', 'Dr Mazlan Che Soh (KUK FSPPP)', 'Dr Mazlan Che Soh (KUK FSPPP)', 'PM Dr. Rusmadiah Anwar', 'PM Dr. Rusmadiah Anwar', 'Dr. Abdul Riezal Bin Dim', 'Dr. Abdul Riezal Bin Dim', 'PM Dr. Juliana Abdul Wahab (School of Communication, USM)', 'PM Dr. Juliana Abdul Wahab (School of Communication, USM)', 'Kolej Pengajian Seni Kreatif', 'Kolej Pengajian Seni Kreatif', 'Kolej Pengajian Seni Kreatif', 'Kolej Pengajian Seni Kreatif', 'Faculty of Applied and Creative Arts, UNiMAS', 'School of Communication, USM', 'School of Communication, USM', 'School of Communication, USM', 'Terima Dokumen', ''),
(4, 4, 'IQA01(B)', '2023-05-03', 'Fakulti Perakaunan', 'Kompleks Tahir Majid, Universiti Teknologi MARA, 40450 Shah Alam, Selangor', '0145532287', '0145534288', 'abc@gmail.com', 'AC111', 'Diploma Perakaunan Fast -track', 'Diploma Perakaunan Fast -track', '28', '12345', '4', 'Akaun', '1111', '2023-05-03', '2023-05-03', 'aaaa', 'Faculty of Applied and Creativ', '01234568', '0154646523', 'www.drive.com', '2023-05-03', '272', 'SWA4111', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `kod_program` varchar(10) NOT NULL,
  `nama_program_bm` varchar(500) NOT NULL,
  `nama_program_bi` varchar(500) NOT NULL,
  `alamat_program` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `kod_program`, `nama_program_bm`, `nama_program_bi`, `alamat_program`) VALUES
(1, 'AC111', 'Sarjana Muda Filem (Kepujian) Sinematografi', 'Diploma Perakaunan Fast -track', 'Aras 11, Bangunan FF1, UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Bandar Puncak Alam, Selangor'),
(2, 'AC111', 'Diploma Perakaunan Fast -track', 'Diploma Perakaunan Fast -track', 'Aras 1 & 2 Bangunan FPN, UiTM Cawangan Selangor, Kampus Puncak Alam, 42300 Bandar Puncak Alam, Selangor'),
(3, 'AC111', 'Diploma Perakaunan Fast -track', 'Diploma Perakaunan Fast -track', 'Universiti Teknologi MARA, 40450 Shah Alam, Selangor'),
(4, '', 'Diploma Perakaunan Fast -track', 'Diploma Perakaunan Fast -track', 'Kompleks Tahir Majid, Universiti Teknologi MARA, 40450 Shah Alam, Selangor');

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
  `tarikh_tersenarai_di_mqr` date NOT NULL,
  `tarikh_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `permohonan_id`, `status_terkini`, `tarikh_terima_dokumen`, `tarikh_lantik_panel`, `tarikh_penilaian_pertama`, `tarikh_maklumbalas_pertama`, `tarikh_penilaian_kedua`, `tarikh_maklumbalas_kedua`, `tarikh_jkppp`, `tarikh_senat`, `tarikh_penghantaran_ke_mqa`, `tarikh_tersenarai_di_mqr`, `tarikh_selesai`) VALUES
(1, 1, 'Terima Dokumen', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 2, 'Terima Dokumen', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 3, 'Terima Dokumen', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 4, 'Terima Dokumen', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'FaizNasir', 'faizhiruko00@gmail.com', '$2y$10$G51kBz4pdgtIMsTUxo5caOl0dBLKrLCMA3QH9NvVGFmFF/mICfuJ2'),
(3, 'InQKA2023', 'mail.razortv@gmail.com', '$2y$10$tUUSSaVI9zvXIurf1RtLEeDui2OUVddEQaIQb1I81vZsZmutsFH2q'),
(4, 'Shafique86', 'shafiq113@uitm.edu.my', '$2y$10$ba8cuFc5v2r.IaNGUQ.O0e/SmXDWVQWl./ZaKQUTjlnHQXyY6PkMa'),
(5, 'kamarul72', 'kamar446@uitm.edu.my', '$2y$10$ee3LfWS/KZhC9pNwt1NRKu6VwfOiFGCcHzPYO6WDbdfKDyi77jVea'),
(6, 'InQKA_UiTM', 'inqka2@uitm.edu.my', '$2y$10$i0HrmUESIPFNnBJVEALCweUb/17I0aSZ5oQzukoTnHBwaVe/lMqui'),
(8, 'inqka', 'inqka@uitm.edu.my', '$2y$10$sxDHjVXPmLTEx6LwkYPZ9OnNjVvNgTe7ut4fssYf/.pAmX6Uf/kFW'),
(9, 'InQKAuitm', 'inqkauitm@uitm.edu.my', '$2y$10$cbArzt8C4urYEsJ9RHFmCOqwHwrohShmxzEle9BhAH64fPqoZn1t6'),
(11, 'nuralisa', 'nuralisa@uitm.edu.my', '$2y$10$4cQUtm0EWl0vTvwAh7MhtOKlqgYXfm54vhIs3Jvzfq8TppzgIv62y');

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
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

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
  MODIFY `fakulti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `permohonan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
