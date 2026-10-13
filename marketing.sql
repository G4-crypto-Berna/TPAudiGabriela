-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2026 at 04:00 PM
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
-- Database: `marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `accion` varchar(20) NOT NULL,
  `tabla_cambiada` varchar(50) NOT NULL,
  `id_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `fecha_hora`, `accion`, `tabla_cambiada`, `id_registro`) VALUES
(1, 'admin', '2026-06-27 00:54:44', 'INSERT', 'suscriptores', 1),
(2, 'admin', '2026-06-27 00:59:48', 'INSERT', 'suscriptores', 2),
(3, 'admin', '2026-06-27 01:16:16', 'UPDATE', 'suscriptores', 1),
(4, 'admin', '2026-06-27 01:16:32', 'UPDATE', 'suscriptores', 2),
(5, 'admin', '2026-06-27 09:23:54', 'INSERT', 'suscriptores', 3);

-- --------------------------------------------------------

--
-- Table structure for table `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `hash_integridad` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `nombre`, `email`, `idioma`, `activo`, `hash_integridad`) VALUES
(1, 'Gabriela', 'Gaby@gmail.com', 'br', 1, 'da62b52e62a24d8b3283191b4828aca81aceee641b5798ab6f904ca965143629'),
(2, 'Kevin', 'Kevv@gmail.com', 'en', 0, 'f60225643d121bfcb22bf030b41fff11544c4f00609c2f21f02678b93b87b36b'),
(3, 'Vanina', 'Vani@gmail.com', 'br', 1, 'bfc7acb60713538e66950ab1a196491d2e815c7ea61ad6f8e1ccbe0c17371a2b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
