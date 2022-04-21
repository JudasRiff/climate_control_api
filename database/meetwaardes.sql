-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 apr 2022 om 14:57
-- Serverversie: 5.7.19
-- PHP-versie: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bp5_6`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `meetwaardes`
--

DROP TABLE IF EXISTS `meetwaardes`;
CREATE TABLE IF NOT EXISTS `meetwaardes` (
  `apparaatNaam` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `datumTijd` datetime NOT NULL,
  `Co2` int(11) DEFAULT NULL,
  `luchtvochtigheid` int(11) DEFAULT NULL,
  `temperatuur` int(11) DEFAULT NULL,
  `aantalMensen` int(11) DEFAULT NULL,
  PRIMARY KEY (`apparaatNaam`,`datumTijd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `meetwaardes`
--

INSERT INTO `meetwaardes` (`apparaatNaam`, `datumTijd`, `Co2`, `luchtvochtigheid`, `temperatuur`, `aantalMensen`) VALUES
('arduino1', '2021-10-01 00:00:00', 68, 95, 20, 10),
('arduino2', '2021-09-01 00:00:00', 70, 90, 25, 15),
('arduino1', '2021-11-11 02:13:15', 1, 12, 20, 0),
('arduino1', '2021-12-10 01:01:07', 2, 15, 22, 0),
('70B3D57ED0047FA0', '2022-01-27 12:18:00', 2, 15, 22, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
