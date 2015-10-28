-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2015 at 11:29 PM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.6.10-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_nama`) VALUES
(1, 'mujib', '21232f297a57a5a743894a0e4a801fc3', 'mujibiqbal@gmail.com', 'Mujib Iqbal'),
(2, 'iqbal', 'iqbal', 'iqbal@gmail.com', 'Mas Iqbal');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(5) NOT NULL,
  `blog_judul` text NOT NULL,
  `blog_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `customer_nama` varchar(25) NOT NULL,
  `customer_telefon` varchar(15) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_email` varchar(40) NOT NULL,
  `customer_username` varchar(25) NOT NULL,
  `customer_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_telefon`, `customer_alamat`, `customer_email`, `customer_username`, `customer_password`) VALUES
(1, 'customer', '000087764368', 'Yogyakarta', 'customer@gmail.com', 'customer', '91ec1f9324753048c0096d036a694f86');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `gaji_id` int(11) NOT NULL,
  `kreator_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `gaji_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`gaji_id`, `kreator_id`, `job_id`, `gaji_jumlah`) VALUES
(18, 1, 2, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `kreator_id` int(5) NOT NULL,
  `job_keuntungan` int(3) NOT NULL,
  `job_progress` int(3) NOT NULL,
  `job_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `order_id`, `kreator_id`, `job_keuntungan`, `job_progress`, `job_status`) VALUES
(2, 2, 1, 10, 100, 'selesai');

--
-- Triggers `jobs`
--
DELIMITER $$
CREATE TRIGGER `jobselesaidikerjakan` AFTER UPDATE ON `jobs` FOR EACH ROW BEGIN
IF NEW.`job_status` = 'selesai' THEN
UPDATE `order` SET `order`.`order_status` = 'selesai' WHERE `order`.`order_id` = NEW.`order_id`;
INSERT INTO `gaji` VALUES('',NEW.`kreator_id`, NEW.`job_id`, (SELECT `order_total` FROM `order` WHERE `order`.`order_id`=NEW.`order_id`)* (NEW.`job_keuntungan`/100));
INSERT INTO `pendapatan` VALUES('',NEW.`job_id`, NOW(), (SELECT `order_total` FROM `order` WHERE `order`.`order_id`=NEW.`order_id`)-(SELECT `gaji_jumlah` FROM `gaji` WHERE `gaji`.`job_id`=NEW.`job_id`));
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `konten_id` int(5) NOT NULL,
  `konten_nama` varchar(25) NOT NULL,
  `konten_jenis` varchar(20) NOT NULL,
  `konten_deskripsi` text NOT NULL,
  `konten_file` varchar(50) NOT NULL,
  `konten_status` varchar(20) NOT NULL,
  `konten_keterangan` text NOT NULL,
  `konten_komentar` text NOT NULL,
  `job_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`konten_id`, `konten_nama`, `konten_jenis`, `konten_deskripsi`, `konten_file`, `konten_status`, `konten_keterangan`, `konten_komentar`, `job_id`) VALUES
(10, 'Artikel', '', '', 'CVku2.doc', 'diterima', 'ds s sdsd', 'Ok', 2);

--
-- Triggers `konten`
--
DELIMITER $$
CREATE TRIGGER `kontenditerimaadmin` AFTER UPDATE ON `konten` FOR EACH ROW BEGIN
IF NEW.`konten_status` = 'diterima' THEN
UPDATE `jobs` SET `jobs`.`job_status` = 'selesai' WHERE `jobs`.`job_id` = NEW.`job_id`;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kreator`
--

CREATE TABLE `kreator` (
  `kreator_id` int(5) NOT NULL,
  `kreator_nama` varchar(25) NOT NULL,
  `kreator_alamat` text NOT NULL,
  `kreator_telfon` varchar(15) NOT NULL,
  `kreator_email` varchar(40) NOT NULL,
  `kreator_username` varchar(25) NOT NULL,
  `kreator_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kreator`
--

INSERT INTO `kreator` (`kreator_id`, `kreator_nama`, `kreator_alamat`, `kreator_telfon`, `kreator_email`, `kreator_username`, `kreator_password`) VALUES
(1, 'iqbal', 'Sewon Timbulharjo sewon Bantul', '083457689', 'iqbal@gmail.com', 'iqbal', 'eedae20fc3c7a6e9c5b1102098771c70'),
(2, 'kreator', 'Bantul Bantul Bantul ', '0976548987', 'kreator@gmail.com', 'kreator', '23f5e1973b5a048ffaaa0bd0183b5f87');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(5) NOT NULL,
  `pemesan_id` int(5) NOT NULL,
  `paket_id` int(5) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_jumlah` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_keterangan` text NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `pemesan_id`, `paket_id`, `order_date`, `order_jumlah`, `order_total`, `order_keterangan`, `order_status`) VALUES
(2, 1, 5, '2015-10-13 00:00:00', 20, 200000, 'paket harus bla bla bla', 'selesai'),
(4, 1, 7, '2015-10-13 00:00:00', 2, 0, 'bla bla bla', 'pengerjaan'),
(5, 1, 6, '2015-10-13 00:00:00', 2, 2, 'bla bla bla', 'proses pembayaran'),
(6, 1, 6, '2015-10-13 00:00:00', 3, 900000, 'ok', 'proses pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paket_id` int(5) NOT NULL,
  `paket_nama` varchar(25) NOT NULL,
  `konten_jenis` varchar(20) NOT NULL,
  `paket_deskripsi` text NOT NULL,
  `paket_jangkawaktu` varchar(20) NOT NULL,
  `paket_jumlah` varchar(20) NOT NULL,
  `paket_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `paket_nama`, `konten_jenis`, `paket_deskripsi`, `paket_jangkawaktu`, `paket_jumlah`, `paket_harga`) VALUES
(5, 'Paket 1', 'video', 'Ini adalah deskripsi Paket 1', '1 Minggu', '10', 240000),
(6, 'Paket 2', 'teks', 'Isi deskripsi paket 2', '1 Minggu', '10', 300000),
(7, 'Paket 3', 'audio', 'Isi deskripsi paket 3', '2 minggu', '20', 300000),
(8, 'Paket 4', 'audio', 'Isi deskripsi paket 3', '2 minggu', '20', 354000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL DEFAULT '0',
  `payment_date` datetime NOT NULL,
  `payment_total` int(11) NOT NULL,
  `payment_keterangan` text NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_date`, `payment_total`, `payment_keterangan`, `payment_status`) VALUES
(8, 2, '2015-10-14 00:00:00', 100000, 'ke rekening bla bla bla', 'lunas');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `customerkonfirmasipembayaran` AFTER UPDATE ON `payment` FOR EACH ROW BEGIN
IF NEW.`payment_status` = 'lunas' THEN
UPDATE `order` SET `order`.`order_status` = 'pengerjaan' WHERE `order`.`order_id` = NEW.`order_id`;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `pendapatan_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `pendapatan_tanggal` date NOT NULL,
  `pendapatan_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`pendapatan_id`, `job_id`, `pendapatan_tanggal`, `pendapatan_jumlah`) VALUES
(3, 2, '2015-10-28', 180000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`gaji_id`),
  ADD KEY `kreator_id` (`kreator_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `kreator_id` (`kreator_id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`konten_id`),
  ADD KEY `order_id` (`job_id`);

--
-- Indexes for table `kreator`
--
ALTER TABLE `kreator`
  ADD PRIMARY KEY (`kreator_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `pemesan_id` (`pemesan_id`),
  ADD KEY `pemesan_id_2` (`pemesan_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`pendapatan_id`),
  ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `gaji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `konten_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kreator`
--
ALTER TABLE `kreator`
  MODIFY `kreator_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `paket_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `pendapatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`kreator_id`) REFERENCES `kreator` (`kreator_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`kreator_id`) REFERENCES `kreator` (`kreator_id`);

--
-- Constraints for table `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`pemesan_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`paket_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
