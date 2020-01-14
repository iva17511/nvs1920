-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jan 2020 um 11:22
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kalenderanwendung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vollmonde`
--

CREATE TABLE `vollmonde` (
  `Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `vollmonde`
--

INSERT INTO `vollmonde` (`Datum`) VALUES
('2019-01-21'),
('2019-02-19'),
('2019-03-21'),
('2019-04-19'),
('2019-05-18'),
('2019-06-17'),
('2019-07-16'),
('2019-08-15'),
('2019-09-14'),
('2019-10-13'),
('2019-11-12'),
('2019-12-12'),
('2020-01-10'),
('2020-02-09'),
('2020-03-09'),
('2020-04-08'),
('2020-05-07'),
('2020-06-05'),
('2020-07-05'),
('2020-08-03'),
('2020-09-02'),
('2020-10-01'),
('2020-10-31'),
('2020-11-30'),
('2020-12-30'),
('2021-01-28'),
('2021-02-27'),
('2021-03-28'),
('2021-04-27'),
('2021-05-26'),
('2021-06-24'),
('2021-07-24'),
('2021-08-22'),
('2021-09-21'),
('2021-10-20'),
('2021-11-19'),
('2021-12-19');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `vollmonde`
--
ALTER TABLE `vollmonde`
  ADD PRIMARY KEY (`Datum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
