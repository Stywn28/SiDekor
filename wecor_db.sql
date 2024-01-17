-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 09:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wecor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Si Admin', 'siadmin@gmail.com', 'f698db0eca0a3fe5ebd3077f1ef08fc2', NULL, '2024-01-15 17:54:31', NULL),
(2, 'Setyawan', 'setya@gmail.com', '$2y$10$FOJeac5zF2CL.6ngfh4WvuILJ.4LlGiAYfm87JT6pzUIe4DN1JQKG', NULL, '2024-01-15 17:53:18', NULL),
(3, 'ADMIN', 'admin@gmail.com', '$2y$10$9ctGiQXHHBO9JIrJsXI7d.EbFlrrfNS4SEKc3gxBLZz1jAPMeEl3u', NULL, NULL, NULL),
(4, 'Marsha', 'marshaadmin@gmail.com', '$2y$10$7a0prmUPq4Ne.mIW5x0EiOEnAP9y2v56.pava8gd0JraCCCfX.JU2', '2024-01-15 17:19:44', '2024-01-15 17:19:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dekorasi`
--

CREATE TABLE `dekorasi` (
  `id_dekor` int(11) NOT NULL,
  `nama_dekor` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` varchar(15) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dekorasi`
--

INSERT INTO `dekorasi` (`id_dekor`, `nama_dekor`, `deskripsi`, `harga`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dekorasi 1', 'Dekorasi Pernikahan', '1200000', '1704885088_4149a9be8b13a9e127c5.jpg', '2024-01-14 18:18:43', '2024-01-17 03:58:51', NULL),
(2, 'Dekorasi 2', 'Dekorasi Pernikahan', '1000000', '1704885012_17cca5f55ec1df22b039.jpg', '2024-01-15 06:26:24', '2024-01-17 03:59:17', NULL),
(3, 'Dekorasi 3', 'Dekorasi Pernikahan', '1500000', '1704841993_13a6275af4a7adbf3fb3.jpg.jpg', '2024-01-16 15:17:55', '2024-01-17 03:59:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(150) NOT NULL,
  `id` varchar(21) DEFAULT NULL,
  `id_dekor` int(11) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `snap` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id`, `id_dekor`, `lama`, `tanggal`, `total`, `status`, `snap`, `created_at`, `updated_at`, `deleted_at`) VALUES
('', '107460926703963431603', 1, '1', '2024-01-24', '1200000', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(21) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `ponsel` varchar(15) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `ponsel`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
('107460926703963431603', 'SAMARAN', 'saoyasuper88@gmail.com', NULL, NULL, '2024-01-16 09:56:55', '2024-01-17 06:24:55', NULL),
('1705399049', 'Marsha', 'marshauser@gmail.com', '082342315236', '$2y$10$.0EDXO3Aex5ehYd5FIEmz.n9rZjCsPk6Yq7W7fgtom/Af5VXUsE5y', '2024-01-16 09:57:29', '2024-01-16 09:57:29', NULL),
('1705408458', 'Salsa', 'usersalsa@gmail.com', '082123232121', '$2y$10$o37qQDg70NLOtxu9KSTHYeJolDMLyW8xutvQWRJBg.6weAlsXoDO6', '2024-01-16 12:34:18', '2024-01-16 12:34:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dekorasi`
--
ALTER TABLE `dekorasi`
  ADD PRIMARY KEY (`id_dekor`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dekorasi`
--
ALTER TABLE `dekorasi`
  MODIFY `id_dekor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
