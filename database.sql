-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 19. sep 2021 ob 20.44
-- Različica strežnika: 10.4.6-MariaDB
-- Različica PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `database`
--

-- --------------------------------------------------------

--
-- Struktura tabele `guest`
--

CREATE TABLE `guest` (
  `id` int(10) NOT NULL,
  `eCode` int(5) NOT NULL,
  `name` varchar(150) COLLATE utf8_slovenian_ci NOT NULL,
  `phoneNumber` text COLLATE utf8_slovenian_ci NOT NULL,
  `guestNumber` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` text COLLATE utf8_slovenian_ci NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `guest`
--

INSERT INTO `guest` (`id`, `eCode`, `name`, `phoneNumber`, `guestNumber`, `date`, `time`) VALUES
(1, 10000, 'Smith', '081222111', 10, '2021-07-26', '12:30'),
(2, 10000, 'Jones', '071444555', 8, '2021-07-26', '15:00'),
(3, 10000, 'Taylor', '081555777', 15, '2021-07-26', '18:00'),
(4, 20000, 'Brown', '081333222', 15, '2021-07-28', '12:00'),
(5, 20000, 'Williams', '081369852', 10, '2021-07-28', '15:30'),
(7, 30000, 'Johnson', '081741852', 10, '2021-07-29', '12:00'),
(11, 30000, 'Davis', '081111999', 11, '2021-08-10', '12:00'),
(13, 20000, 'Jones', '081888999', 14, '2021-09-07', '12:00');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
