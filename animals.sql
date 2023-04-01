-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Apr 2023 um 13:29
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be18_cr5_animal_adoption_arnaldobismarques`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animalId` int(11) NOT NULL,
  `animal_name` varchar(100) NOT NULL,
  `animal_address` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `vaccine` varchar(10) DEFAULT NULL,
  `breed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animalId`, `animal_name`, `animal_address`, `description`, `size`, `age`, `vaccine`, `breed`) VALUES
(7, 'Balli', 'Praterstraße 17', 'aussie.jpg', 'M', 5, 'Yes', 'Australian Sheperd'),
(9, 'Balli II', 'Süßenbrunner Straße 53', 'aussie2.jpg', 'M', 9, 'No', 'Australian Sheperd'),
(20, 'Rex (left)', 'Süßenbrunner Straße 53', 'german.jpg', 'L', 3, 'Yes', 'German Shepard'),
(22, 'John Snow', 'Wiener Straße 4', 'aussie3.jpg', 'L', 1, 'Yes', 'Australian Sheperd'),
(23, 'Prince', 'Wiener Straße 4', 'german2.jpg', 'L', 9, 'Yes', 'German Sheperd'),
(24, 'Daedalus', 'Praterstraße 17', 'horse.jpg', 'L', 3, 'Yes', 'Mustang'),
(25, 'Bree', 'Süßenbrunner Straße 53', 'collie.jpg', 'M', 10, 'Yes', 'Collie'),
(28, 'Kill Bill', 'Praterstraße 17', 'blackie.jpg', 'S', 8, 'No', 'Black cat'),
(29, 'Missy', 'Wiener Straße 4', 'rottweiler.jpg', 'L', 2, 'No', 'Rottweiler'),
(30, 'Arnaldo', 'Süßenbrunner Straße 53', 'chiku.jpg', 'S', 4, 'No', 'Chihuahua'),
(38, 'Bob', 'Süßenbrunner Straße 53', 'cat.jpg', 'S', 3, 'Yes', 'Tigercat');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
