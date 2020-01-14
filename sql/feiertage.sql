-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jan 2020 um 11:11
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
-- Tabellenstruktur für Tabelle `feiertage`
--

CREATE TABLE `feiertage` (
  `Name` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `Datum` date NOT NULL,
  `Beschreibung` varchar(200) COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `feiertage`
--

INSERT INTO `feiertage` (`Name`, `Datum`, `Beschreibung`) VALUES
('Neujahr', '2020-01-01', 'Erster Tag des Kalenderjahres'),
('Heilige Drei Könige', '2020-01-06', 'Laut Matthäus-Evangelium 3 Weise, Magier oder Astrologen aus dem Osten, die einer Sternkonstellation folgend über Jerusalem nach Bethlehem kamen, um den neugeboren König der Juden zu suchen.'),
('Aschermittwoch', '2020-02-26', 'Läutet die 40-tägige Fastenzeit bis zum Karsamstag ein und hängt damit vom Termin des Frühlingsvollmond ab. Kein gesetzlicher Feiertag.'),
('Palmsonntag', '2020-04-05', 'Einzug von Jesus Christus in Jerusalem, leitet die Karwoche ein. Kein gesetzlicher Feiertag.'),
('Gründonnerstag', '2020-04-09', 'Steht traditionell im Zeichen der Leiden Jesu Christi. Kein gesetzlicher Feiertag.'),
('Karfreitag', '2020-04-10', 'Der erste Tag der christlichen Dreitagefeier zu Ostern, Kreuzigung Jesu Christi.'),
('Karsamstag', '2020-04-11', 'Tag der Höllenfahrt Christi. Die Kirche gedenkt der Grabesruhe Christi und erwartete seine Auferstehung mit Fasten und Gebeten. Kein gesetzlicher Feiertag.'),
('Ostersonntag', '2020-04-12', 'Auferstehung von Jesu Christi, Beginn der Osterzeit'),
('Ostermontag', '2020-04-13', 'Das Osterfest dient dem Gedenken der Kreuzigung und Auferstehung Christi. Montag nach erstem Vollmond nach dem 20. März.'),
('Staatsfeiertag', '2020-05-01', 'Tag der Arbeit, im Zeichen der österreichischen Unabhängigkeit.'),
('Christi Himmelfahrt', '2020-05-21', 'Christus zeigte sich vierzig Tage nach seiner Auferstehung seinen Jüngern und fuhr darauf in den Himmel auf, wo er den Platz zur Rechten Gottes einnahm.'),
('Pfingstmontag', '2020-06-01', 'Ende der Osterzeit. Der Heilige Geist sprach Jeusus\' Jünger Mut zu und ermunterte sie, die Lehre Christi zu verbreiten.'),
('Fronleichnam', '2020-06-11', 'Feiert die leibliche Gegenwart Jesu Christi durch das Sakrament der Eucharistie nach dem Vorbild des letzten Abendmahls.'),
('Maria Himmelfahrt', '2020-08-15', 'Dem Fest liegt der Glaube zugrunde, dass Maria, die Mutter Jesus, nach ihrer Bestattung in einem steinernem Grab von Christus in den Himmel gerufen worden sei - „mit Leib und Seele“.'),
('Erntedank', '2020-10-04', 'Traditionelle Feier der Christen nach der Ernte im Herbst, um Gott für die Gaben der Ernte Dank zu erweisen. Kein gesetzlicher Feiertag.'),
('Nationalfeiertag', '2020-10-26', 'Zum Gedenken an die Entstehung der ersten österreichischen Republik.'),
('Allerheiligen', '2020-11-01', 'Da es mit fortschreitender Zeit unmöglich schien, jedem Heiligen einen eigenen Tag des Gedenkens zu widmen, wurde Allerheiligen als Fest geschaffen.'),
('Allerseelen', '2020-11-02', 'Gedenkt allen Verstorbenen und der armen Seelen im Fegefeuer, nicht nur den Heiligen. Kein gesetzlicher Feiertag.'),
('Heiliger Nikolaus', '2020-12-06', 'Gedenktag für den heiligen Bischof Nikolaus von Myra. Kein gesetzlicher Feiertag.'),
('Maria Empfängnis', '2020-12-08', 'Feiert die Empfängnis der Maria durch die Mutter Anna, findet also 9 Monate vor der tatsächlichen Geburt Marias statt.'),
('Heiligabend', '2020-12-24', 'Abend der Geburt Christi.'),
('Weihnachten', '2020-12-25', 'Fest der Geburt Jesu Christi.'),
('Stephanitag', '2020-12-26', 'In Jerusalem bekannte sich Stephanus zum Christentum und wurde durch seine Steinigung zum ersten Märtyrer.'),
('Silvester', '2020-12-31', 'Letzter Tag des Kalenderjahres.');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `feiertage`
--
ALTER TABLE `feiertage`
  ADD PRIMARY KEY (`Datum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
