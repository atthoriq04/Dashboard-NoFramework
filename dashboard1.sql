-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2019 at 09:51 AM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard1`
--

-- --------------------------------------------------------

--
-- Table structure for table `databuku`
--

CREATE TABLE `databuku` (
  `id` int(11) NOT NULL,
  `Kategori` varchar(100) NOT NULL,
  `judulbuku` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahunterbit` int(5) NOT NULL,
  `ISBN` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `databuku`
--

INSERT INTO `databuku` (`id`, `Kategori`, `judulbuku`, `penulis`, `penerbit`, `tahunterbit`, `ISBN`) VALUES
(1, 'Fantasi', 'A Darker Shade of Magic - Sihir Kelam', 'V.E.SCHWAB', 'Gramedia Pustaka Utama', 2019, 9786020623320),
(7, 'Romance', 'Good Bye Day', 'Arnold Leonard', 'Anugrah Publisher', 2018, 9786926409621),
(9, 'Fantasi', 'TherMelian - Revelation', 'Shenny MS', 'Elex Media Komputindo', 2018, 9786020292021),
(10, 'Fantasi', 'TherMelian - Chronicle', 'Shenny MS', 'Elex Media Komputindo', 2018, 9786020292076),
(11, 'Fantasi', 'TherMelian - Recollection', 'Shenny MS', 'Elex Media Komputindo', 2018, 9786020312658),
(12, 'Romance', 'Kisses to Remember', 'kurumi Tasaki', 'Gramedia Pustaka Utama', 2017, 9786024282875),
(13, 'Romance', 'Salju Pertama Di Hokkaido', 'Angelique Puspadewi', 'Gramedia Pustaka Utama', 2017, 9786020376684),
(14, 'Mystery', 'Psychic Detective Yakumo - The Light Beyond the Darkness', 'Manabu Kaminaga', 'Clover', 2017, 9786024280185),
(15, 'Mystery', 'Pshycic Detective Yakumo - Connected Feelings', 'Manabu Kaminaga', 'Clover', 2017, 978602428446),
(16, 'Romance', 'Tulisan Ghani', 'Radin Azkia', 'Loveable', 2018, 9786025406540650),
(17, 'Romance', 'I Want to Eat Your Pancreas - kimi no suizou wo tabetai', 'Sumino Yoru', 'Penerbit Haru', 2018, 9786026383457),
(18, 'Fiksi', 'Garis Waktu', 'Fiersa Besari', 'Mediakita', 2018, 9789797945921),
(20, 'Fiksi', 'Ryugajou Nanana Burried Treasure', 'Ootorino Kazuma', 'Shining Rose Media', 2016, 978602735840),
(21, 'Fiksi', 'Candid', 'Obata Yasumi', 'Shining Rose Media', 2017, 986021831694),
(22, 'Romance', 'Cloud Above My bed', 'Malashantii', 'Elex Media Komputindo', 2018, 9786020497921),
(23, 'Non-Fiksi', 'Salah Jurusan - Tentukan Pilihan, Temukan Tujuan', 'Rusydan Ubaidi Hamdani', 'Transmedia', 2014, 978602103601),
(24, 'Teknologi', 'Tips dan Trik Jaringan Wireless', 'Victoria', 'Elex Media Komputindo', 2014, 9786020261820),
(25, 'Teknologi', 'Java Untuk Pemula', 'Jubilee Enterprise', 'Elex Media Komputindo', 2014, 9786020255453),
(26, 'Teknologi', ' 24 Jam Belajar PHP', 'Edy Winarno ST, M.Eng', 'Elex Media Komputindo', 2014, 9786020249483),
(27, 'Non-Fiksi', 'Goodbye, Things: Hidup Minimalis ala Orang Jepang', 'Fumio Sasaki', 'Gramedia Pustaka Utama', 2018, 9786020398402),
(28, 'non-Fiksi', 'Sebuah Seni untuk Bersikap bodo amat', 'mark manson', 'Gramedia Pustama Utama', 2018, 9786024526986);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Email`, `Password`) VALUES
(5, 'admin', 'Admin@Admin.com', '$2y$10$wJ28uVxsb42/A/nqNmiBsux8wUlQd/3v6larL6d4RqfwdHf8iswpO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databuku`
--
ALTER TABLE `databuku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databuku`
--
ALTER TABLE `databuku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
