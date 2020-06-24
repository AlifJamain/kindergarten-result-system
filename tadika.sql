-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 09:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tadika`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblgabung`
--

CREATE TABLE `tblgabung` (
  `id` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_subjek` int(255) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgabung`
--

INSERT INTO `tblgabung` (`id`, `id_kelas`, `id_subjek`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 2, 1, 1),
(17, 2, 2, 1),
(18, 2, 3, 1),
(19, 2, 4, 1),
(20, 2, 5, 1),
(21, 2, 6, 1),
(22, 2, 7, 1),
(23, 2, 8, 1),
(24, 2, 9, 1),
(25, 2, 10, 1),
(26, 2, 11, 1),
(27, 2, 12, 1),
(28, 2, 13, 1),
(29, 2, 14, 1),
(30, 2, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgabung2`
--

CREATE TABLE `tblgabung2` (
  `id` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_psikomotor` int(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgabung2`
--

INSERT INTO `tblgabung2` (`id`, `id_kelas`, `id_psikomotor`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 2, 1, 1),
(7, 2, 2, 1),
(8, 2, 3, 1),
(9, 2, 4, 1),
(10, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgabung3`
--

CREATE TABLE `tblgabung3` (
  `id` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_sosial` int(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgabung3`
--

INSERT INTO `tblgabung3` (`id`, `id_kelas`, `id_sosial`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 2, 1, 1),
(7, 2, 2, 1),
(8, 2, 3, 1),
(9, 2, 4, 1),
(10, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblguru`
--

CREATE TABLE `tblguru` (
  `id_guru` int(255) NOT NULL,
  `emel_guru` varchar(255) NOT NULL,
  `katalaluan_guru` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `kp_guru` varchar(255) NOT NULL,
  `tarikh_lahir_guru` varchar(255) NOT NULL,
  `status_perkahwinan` varchar(255) NOT NULL,
  `alamat_guru` varchar(255) NOT NULL,
  `tahap_pendidikan` varchar(255) NOT NULL,
  `tarikh_mula_bekerja` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_acc_bank` varchar(255) NOT NULL,
  `nama_waris` varchar(255) NOT NULL,
  `hubungan_waris` varchar(255) NOT NULL,
  `no_tel_waris` varchar(255) NOT NULL,
  `alamat_waris` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguru`
--

INSERT INTO `tblguru` (`id_guru`, `emel_guru`, `katalaluan_guru`, `nama_guru`, `kp_guru`, `tarikh_lahir_guru`, `status_perkahwinan`, `alamat_guru`, `tahap_pendidikan`, `tarikh_mula_bekerja`, `nama_bank`, `no_acc_bank`, `nama_waris`, `hubungan_waris`, `no_tel_waris`, `alamat_waris`, `status`) VALUES
(1, 'alifjamain@gmail.com', 'alifjamain', 'alifjamain', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(2, 'aaa', 'aaa', 'aaa', '', '', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblkelas`
--

CREATE TABLE `tblkelas` (
  `id` int(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `empid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkelas`
--

INSERT INTO `tblkelas` (`id`, `nama_kelas`, `empid`) VALUES
(1, '5 Pelangi', 1),
(2, '6 Pelangi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblkeputusan`
--

CREATE TABLE `tblkeputusan` (
  `id` int(255) NOT NULL,
  `id_pelajar` int(255) DEFAULT NULL,
  `id_kelas` int(255) DEFAULT NULL,
  `id_subjek` int(255) DEFAULT NULL,
  `marks` int(255) NOT NULL,
  `empid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblkeputusan2`
--

CREATE TABLE `tblkeputusan2` (
  `id` int(255) NOT NULL,
  `id_pelajar` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_psikomotor` int(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `empid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkeputusan2`
--

INSERT INTO `tblkeputusan2` (`id`, `id_pelajar`, `id_kelas`, `id_psikomotor`, `marks`, `empid`) VALUES
(1, 1, 1, 1, '80', 1),
(2, 1, 1, 2, '90', 1),
(3, 1, 1, 5, '100', 1),
(4, 1, 1, 3, '30', 1),
(5, 1, 1, 4, '60', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblkeputusan3`
--

CREATE TABLE `tblkeputusan3` (
  `id` int(255) NOT NULL,
  `id_pelajar` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_sosial` int(255) NOT NULL,
  `marks` int(255) NOT NULL,
  `empid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkeputusan3`
--

INSERT INTO `tblkeputusan3` (`id`, `id_pelajar`, `id_kelas`, `id_sosial`, `marks`, `empid`) VALUES
(1, 1, 1, 5, 50, 1),
(2, 1, 1, 4, 50, 1),
(3, 1, 1, 3, 50, 1),
(4, 1, 1, 2, 50, 1),
(5, 1, 1, 1, 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotifikasi`
--

CREATE TABLE `tblnotifikasi` (
  `id_notifikasi` int(255) NOT NULL,
  `nama_notifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotifikasi`
--

INSERT INTO `tblnotifikasi` (`id_notifikasi`, `nama_notifikasi`) VALUES
(1, 'tiada perjumpaan');

-- --------------------------------------------------------

--
-- Table structure for table `tblpelajar`
--

CREATE TABLE `tblpelajar` (
  `id_pelajar` int(255) NOT NULL,
  `nama_pelajar` varchar(255) NOT NULL,
  `mykid_pelajar` varchar(255) NOT NULL,
  `tarikh_lahir_pelajar` varchar(255) NOT NULL,
  `tarikh_daftar_tadika` varchar(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `jantina_pelajar` varchar(255) NOT NULL,
  `alamat_pelajar` varchar(255) NOT NULL,
  `nama_penjaga` varchar(255) NOT NULL,
  `hubungan_penjaga` varchar(255) NOT NULL,
  `no_tel_penjaga` varchar(255) NOT NULL,
  `alamat_penjaga` varchar(255) NOT NULL,
  `empid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpelajar`
--

INSERT INTO `tblpelajar` (`id_pelajar`, `nama_pelajar`, `mykid_pelajar`, `tarikh_lahir_pelajar`, `tarikh_daftar_tadika`, `id_kelas`, `jantina_pelajar`, `alamat_pelajar`, `nama_penjaga`, `hubungan_penjaga`, `no_tel_penjaga`, `alamat_penjaga`, `empid`) VALUES
(1, 'Muhammad Alif Fariq Bin Jamain', '961213235085', '13/12/1996', '13/12/1996', 1, 'Lelaki', 'No. 24, Jalan Universiti 17, Taman Universiti, 86400. Parit Raja, Johor', 'Jamain Bin Saikon', 'Bapa', '0137754323', 'C18, Jalan Kiambang, Kampung Rahmat, 81030, Kulai, Johor', 1),
(2, 'aaa', 'aaa', 'aaa', 'aaa', 2, 'aaa', 'aaa', 'aaa', 'Ibu', 'aaa', 'aaa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblpentadbir`
--

CREATE TABLE `tblpentadbir` (
  `id_pentadbir` int(255) NOT NULL,
  `emel_pentadbir` varchar(255) NOT NULL,
  `katalaluan_pentadbir` varchar(255) NOT NULL,
  `nama_pentadbir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpentadbir`
--

INSERT INTO `tblpentadbir` (`id_pentadbir`, `emel_pentadbir`, `katalaluan_pentadbir`, `nama_pentadbir`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblpsikomotor`
--

CREATE TABLE `tblpsikomotor` (
  `id` int(255) NOT NULL,
  `nama_psikomotor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpsikomotor`
--

INSERT INTO `tblpsikomotor` (`id`, `nama_psikomotor`) VALUES
(1, 'Kemahiran Kenal Anggota Badan'),
(2, 'Kemahiran Kenal Jari Tangan\r\n'),
(3, 'Kemahiran Seimbang Badan\r\n'),
(4, 'Senaman'),
(5, 'Kemahiran Merentasi Halangan');

-- --------------------------------------------------------

--
-- Table structure for table `tblsosial`
--

CREATE TABLE `tblsosial` (
  `id` int(255) NOT NULL,
  `nama_sosial` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsosial`
--

INSERT INTO `tblsosial` (`id`, `nama_sosial`) VALUES
(1, 'Kemahiran Pergaulan\r\n'),
(2, 'Kemahiran Mengawal Emosi\r\n'),
(3, 'Kemahiran Mematuhi Peraturan\r\n'),
(4, 'Kemahiran Kepimpinan\r\n'),
(5, 'Aktiviti Kebudayaan\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjek`
--

CREATE TABLE `tblsubjek` (
  `id` int(255) NOT NULL,
  `nama_subjek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjek`
--

INSERT INTO `tblsubjek` (`id`, `nama_subjek`) VALUES
(1, 'Bahasa Melayu'),
(2, 'Bahasa Inggeris'),
(3, 'Matematik'),
(4, 'Sains'),
(5, 'Pendidikan Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblgabung`
--
ALTER TABLE `tblgabung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgabung2`
--
ALTER TABLE `tblgabung2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgabung3`
--
ALTER TABLE `tblgabung3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblguru`
--
ALTER TABLE `tblguru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tblkelas`
--
ALTER TABLE `tblkelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkeputusan`
--
ALTER TABLE `tblkeputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkeputusan2`
--
ALTER TABLE `tblkeputusan2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkeputusan3`
--
ALTER TABLE `tblkeputusan3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnotifikasi`
--
ALTER TABLE `tblnotifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `tblpelajar`
--
ALTER TABLE `tblpelajar`
  ADD PRIMARY KEY (`id_pelajar`);

--
-- Indexes for table `tblpentadbir`
--
ALTER TABLE `tblpentadbir`
  ADD PRIMARY KEY (`id_pentadbir`);

--
-- Indexes for table `tblpsikomotor`
--
ALTER TABLE `tblpsikomotor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsosial`
--
ALTER TABLE `tblsosial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjek`
--
ALTER TABLE `tblsubjek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblgabung`
--
ALTER TABLE `tblgabung`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblgabung2`
--
ALTER TABLE `tblgabung2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblgabung3`
--
ALTER TABLE `tblgabung3`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblguru`
--
ALTER TABLE `tblguru`
  MODIFY `id_guru` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblkelas`
--
ALTER TABLE `tblkelas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblkeputusan`
--
ALTER TABLE `tblkeputusan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblkeputusan2`
--
ALTER TABLE `tblkeputusan2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblkeputusan3`
--
ALTER TABLE `tblkeputusan3`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblnotifikasi`
--
ALTER TABLE `tblnotifikasi`
  MODIFY `id_notifikasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpelajar`
--
ALTER TABLE `tblpelajar`
  MODIFY `id_pelajar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpentadbir`
--
ALTER TABLE `tblpentadbir`
  MODIFY `id_pentadbir` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpsikomotor`
--
ALTER TABLE `tblpsikomotor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsosial`
--
ALTER TABLE `tblsosial`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubjek`
--
ALTER TABLE `tblsubjek`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
