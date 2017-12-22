-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 22. Dez 2017 um 16:43
-- Server-Version: 10.1.24-MariaDB
-- PHP-Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_photocase`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einnahmen`
--

CREATE TABLE `einnahmen` (
  `ID` int(11) NOT NULL,
  `ID_Mieter` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Betrag` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `einnahmen`
--

INSERT INTO `einnahmen` (`ID`, `ID_Mieter`, `Datum`, `Betrag`) VALUES
(1, 4, '2017-12-01', 3000),
(14, 22, '2017-12-16', 23000),
(16, 23, '2017-11-20', 15550.25),
(17, 22, '2017-08-01', 2300),
(18, 4, '2016-09-19', 2300),
(19, 24, '2016-11-04', 1700);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mieter`
--

CREATE TABLE `mieter` (
  `ID` int(11) NOT NULL,
  `Nachname` varchar(32) DEFAULT NULL,
  `Vorname` varchar(32) DEFAULT NULL,
  `Strasse` varchar(32) DEFAULT NULL,
  `PLZ` int(4) DEFAULT NULL,
  `Ort` varchar(32) DEFAULT NULL,
  `Liegenschaft` int(3) DEFAULT NULL,
  `Mietzins` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mieter`
--

INSERT INTO `mieter` (`ID`, `Nachname`, `Vorname`, `Strasse`, `PLZ`, `Ort`, `Liegenschaft`, `Mietzins`) VALUES
(4, 'Tüscher', 'Patrick', 'Reinweg 13', 5000, 'Aarau', 1, 6000),
(16, 'Stierli', 'Michael', 'Strasse 20', 5555, 'Stadt', 2, 1000),
(21, 'Burri', 'Nicola', 'Einestrasse 20', 4444, 'Wohnfelden', 3, 15000),
(22, 'Trottmann', 'Kevin', 'Eine Strasse 20', 5525, 'Fischbach-Göslikon', 4, 1500),
(23, 'Djuranec', 'Matej', 'Im Gugel 33', 5522, 'Tägerig', 5, 1100),
(24, 'Roth', 'Marco', 'Im Gugel 33', 5522, 'Tägerig', 6, 1100),
(27, 'Hitz', 'Dominic', 'Bremgarterstrasse 7', 5525, 'Fischbach-Gölikon', 7, 1700),
(28, 'Stierli', 'Ramon', 'Bodenackerstrasse 42', 5525, 'Fischbach-Göslikon', 8, 1600),
(29, 'Seiler', 'Erika', 'Uetlibergstrasse 231', 8000, 'Zürich', 9, 2300),
(30, 'Power', 'Max', 'Ziegelackefeld 3', 8919, 'Rottenschwil', 10, 1700),
(31, 'Meier', 'Guido', 'Winterstrasse 6', 8919, 'Rottenschwil', 11, 1400),
(32, 'Stolz', 'Karsten', 'Buchrain 76', 5017, 'Erlinsbach', 12, 1250);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnungen`
--

CREATE TABLE `rechnungen` (
  `ID` int(11) NOT NULL,
  `Typ` varchar(32) NOT NULL,
  `Art` varchar(32) NOT NULL,
  `Rechnungstext` varchar(200) NOT NULL,
  `Datum` date NOT NULL,
  `Betrag` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `rechnungen`
--

INSERT INTO `rechnungen` (`ID`, `Typ`, `Art`, `Rechnungstext`, `Datum`, `Betrag`) VALUES
(4, 'Heizkosten', 'Oelrechnung', 'Heizoel', '2017-12-09', 234),
(6, 'Nebenkosten', 'Stromrechnung', 'Weihnachtsbeleuchtung', '2017-12-15', 399),
(7, 'Nebenkosten', 'Stromrechnung', 'Stromrechnung von Hanspeter Lustig ', '2017-12-16', 399),
(8, 'Heizkosten', 'Reparaturrechnung', 'Reparatur Waschmaschine', '2017-12-10', 20),
(9, 'Heizkosten', 'Oelrechnung', 'Kauf 2000l Flüssigkeit', '2017-12-07', 40000),
(10, 'Heizkosten', 'Wasserrechnung', 'alte Heizkostenrechnung', '2016-11-02', 300),
(11, 'Nebenkosten', 'Reparaturrechnung', 'Zukunftsrechnung', '2018-01-01', 500),
(13, 'Nebenkosten', 'Hauswartsrechnung', 'Treppenhaus neu gestrichen', '2016-11-08', 2500),
(14, 'Heizkosten', 'Stromrechnung', 'Stromheizung November 2016', '2016-11-24', 900);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`) VALUES
(23, 'admin@admin.ch', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', '2017-12-16 09:49:36'),
(24, 'matej.djuranec@gmx.ch', 'f05a85a01082c2229ae72f90a490eb1f', 'Matej', 'Djuranec', '2017-12-18 14:15:30'),
(25, 'mbekooglu@gmx.ch', 'ec927e5035f5d852adce14a63068cfc6', 'Mikayil', 'Bekooglu', '2017-12-21 17:55:35');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `einnahmen`
--
ALTER TABLE `einnahmen`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `mieter`
--
ALTER TABLE `mieter`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `rechnungen`
--
ALTER TABLE `rechnungen`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `einnahmen`
--
ALTER TABLE `einnahmen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT für Tabelle `mieter`
--
ALTER TABLE `mieter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT für Tabelle `rechnungen`
--
ALTER TABLE `rechnungen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
