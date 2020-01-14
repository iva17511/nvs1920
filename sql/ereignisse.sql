-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jan 2020 um 11:06
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
-- Tabellenstruktur für Tabelle `ereignisse`
--

CREATE TABLE `ereignisse` (
  `ID` int(11) NOT NULL,
  `Titel` varchar(25) COLLATE utf8_german2_ci NOT NULL,
  `Datum` date NOT NULL,
  `Wichtigkeit` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `Beschreibung` varchar(200) COLLATE utf8_german2_ci DEFAULT NULL,
  `User` varchar(50) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `ereignisse`
--

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ereignisse`
--
ALTER TABLE `ereignisse`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ereignisse`
--
ALTER TABLE `ereignisse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
