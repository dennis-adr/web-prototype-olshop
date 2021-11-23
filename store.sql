-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 07:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_admin`
--

CREATE TABLE `db_admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`id`, `admin_name`, `username`, `password`) VALUES
(1, 'Maulida Maizani A', 'maizan@gmail.com', 'maizan'),
(2, 'Dennis Bima Adriansyah', 'dennis@gmail.com', 'dennis');

-- --------------------------------------------------------

--
-- Table structure for table `db_pembeli`
--

CREATE TABLE `db_pembeli` (
  `id` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `pesanan` text NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_pembeli`
--

INSERT INTO `db_pembeli` (`id`, `nama`, `no_telp`, `alamat`, `pesanan`, `total`) VALUES
(125, 'Dennis Bima A', '088888888888', 'Kecamatan Mertoyudan Kabupaten Magelang', 'id1=5,id2=0,id3=2,id4=0,id5=0,id6=0, id7=0,id8=0,id9=0,id10=0,id11=0,id21=1', 455000);

-- --------------------------------------------------------

--
-- Table structure for table `db_product`
--

CREATE TABLE `db_product` (
  `id` int(40) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `nama_item` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` float NOT NULL,
  `detail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_product`
--

INSERT INTO `db_product` (`id`, `barcode`, `nama_item`, `stok`, `harga`, `detail`) VALUES
(1, 'b0001', 'kaos oblong', 20, 25000, 'unisex, all size'),
(2, 'b0002', 'kemeja flanel', 15, 115000, 'male, all size'),
(3, 'b0003', 'hoodie jumper', 12, 150000, 'unisex, all size'),
(4, 'b0004', 'jacket parasut', 20, 95000, 'female, all size'),
(5, 'b0005', 'sweater oversize', 10, 37000, 'female, all size'),
(6, 'b0006', 'cardigan oversize', 25, 70000, 'female, all size'),
(7, 'c0001', 'denim pants', 22, 110000, 'male, all size'),
(8, 'c0002', 'jogger pants', 25, 79000, 'male, all size'),
(9, 'c0003', 'short pants', 10, 55000, 'male, all size'),
(10, 'c0004', 'linen skirt', 20, 60500, 'female, all size'),
(11, 'c0005', 'kulot jeans', 20, 115000, 'female, all size'),
(21, 'c0006', 'training katun', 2, 30000, 'unisex, all size');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_pembeli`
--
ALTER TABLE `db_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_product`
--
ALTER TABLE `db_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_admin`
--
ALTER TABLE `db_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_pembeli`
--
ALTER TABLE `db_pembeli`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `db_product`
--
ALTER TABLE `db_product`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
