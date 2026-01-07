-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jan 2026 um 01:10
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tiere`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hunde`
--

CREATE TABLE `hunde` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Age` int(11) NOT NULL,
  `braucht erfahrenen Besitzer` tinyint(1) NOT NULL,
  `vermittelbar` tinyint(1) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `hunde`
--

INSERT INTO `hunde` (`ID`, `Name`, `Age`, `braucht erfahrenen Besitzer`, `vermittelbar`, `Beschreibung`, `Foto`) VALUES
(1, 'Mausi', 3, 1, 0, 'Mausi ist grundsätzlich ein offener Hund, der freundlich auf Menschen zugeht. Bei manchen Menschen ist er anfangs aber eher etwas skeptischer und es kann vorkommen, dass er diese verbellt. In der Regel ist das Eis aber schnell gebrochen und Mausi zeigt dann seine aufgeweckte und lustige Art.', 'adoptiere\\hunde\\Mausi.jpg'),
(2, 'Schnucki', 3, 1, 1, 'Schnucki ist grundsätzlich eine freundliche Hündin, möchte von Fremden aber nicht gleich mit Streicheleinheiten überfallen werden. Beim Kennenlernen von Fremden erwartet sie sich eine gewisse Individualdistanz von ihrem Gegenüber, um sich in ihrem Tempo annähern zu können. Bedrängt man sie nicht und hat vielleicht auch noch das ein oder andere Leckerli in der Tasche, ist das Eis schnell gebrochen.', 'adoptiere\\hunde\\Schnucki.jpg'),
(3, 'Baby', 12, 1, 1, 'Baby liebt Leckerlis in jeder Form und Geschmacksrichtung, zu jeder Tages-, und Nachtzeit und in jeder Situation. Mavis Vorliebe für Leckerlis ist allerdings Fluch und Segen zugleich. Im Training ist sie top motiviert, liebt Suchspiele jeder Art und würde alles für Futter tun. Gleichzeitig kann Baby allerdings sehr fordernd werden und man muss sie hin und wieder daran erinnern, dass man sich nicht selbst an Taschen oder Leckerlibeuteln bedient oder durch frustiges Bellen nicht unbedingt mehr Leckerlis bekommt.', 'adoptiere\\hunde\\Baby.jpg'),
(4, 'Ilya', 16, 0, 1, 'Bei Hundebegegnungen in moderater Distanz ist Ilya bereits gut ansprechbar. Ist der andere Hund zu Nahe, kann es vorkommen das sie in die Leine springt und bellt. Im direkten Kontakt entscheidet die Sympathie. Im neuen Zuhause möchte Ilya definitiv Einzelprinzessin sein, weshalb keine Artgenossen oder andere Tiere im gemeinsamen Haushalt leben sollten. Ilya kann problemlos einen Maulkorb tragen, fährt brav im Auto mit und kennt die Grundkommandos.', 'adoptiere\\hunde\\Ilya.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `katzen`
--

CREATE TABLE `katzen` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  ` Age` int(11) NOT NULL,
  `braucht Garten` tinyint(1) NOT NULL,
  `vermittelbar` tinyint(1) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `katzen`
--

INSERT INTO `katzen` (`ID`, `Name`, ` Age`, `braucht Garten`, `vermittelbar`, `Beschreibung`, `Foto`) VALUES
(1, 'Riso & Helmi', 24, 1, 0, 'Riso und Helmi sind zwei sehr unterschiedliche Katzen, die sich allerdings wunderbar ergänzen und nur gemeinsam in ein neues Zuhause ziehen möchten.\r\n\r\nHelmi ist ein entzückender rot-weißer Wirbelwind, der alles mit vollem Körpereinsatz angeht. Ob Spielen, Erkunden oder Kuscheln – Helmi ist immer zu 100 % dabei. Sie ist sehr liebesbedürftig, sucht intensiv den Kontakt zu seinen Menschen und braucht viel Beschäftigung und Action. Still sitzen ist nichts für sie, denn ihre Neugier und ihr Bewegungsdrang wollen täglich ausgelebt werden.\r\n\r\nRiso ist der gemütlichere Teil dieses Duos. Der hübsche Britisch-Mix liebt es zu plaudern, zu kuscheln und die Nähe ihrer Menschen zu genießen. Sie spielt und rauft gerne mit Helmi, weiß aber auch, wann genug ist, und zieht sich dann lieber zum Entspannen zurück.', 'adoptiere\\katzen\\Riso_Helmi.jpg'),
(2, 'Fabi', 25, 1, 0, 'Fabi ist ein freundlicher, aufgeweckter Kater mit großem Entdeckergeist. Er ist sehr neugierig, immer unterwegs und möchte bei allem dabei sein. Dabei hat er allerdings auch einen ausgeprägten eigenen Kopf – die Dinge sollten idealerweise nach seinen Vorstellungen laufen. Wird ihm etwas zu viel oder läuft nicht in seinem Sinne, kann er durchaus unwirsch reagieren und das klar kommunizieren.\r\n\r\n', 'adoptiere\\katzen\\Fabi.jpg'),
(3, 'Bärbel', 2, 1, 1, 'Bärbel ist eine neugierige und aufmerksame Katzendame, die viel Interesse an ihrer Umgebung zeigt. Im Zimmer sitzt sie oft bei der Tür und beobachtet genau, was draußen passiert – sie wäre also in einem Zuhause mit mehr Bewegungsfreiheit bestimmt glücklich.\r\n\r\nKommt man zu ihr, streift sie einem manchmal freundlich um die Beine und sucht vorsichtige Nähe. Berührungen lässt sie punktuell zu, doch schnell wird ihr körperliche Nähe zu viel. Dann zeigt sie deutlich, dass sie Abstand möchte und kann auch wehrhaft reagieren. Hochheben oder ausgiebiges Kuscheln gehören derzeit nicht zu ihrem Repertoire.', 'adoptiere\\katzen\\Bärbel.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kleintiere`
--

CREATE TABLE `kleintiere` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Art` text NOT NULL,
  `Vermittelbar` tinyint(1) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kleintiere`
--

INSERT INTO `kleintiere` (`id`, `Name`, `Art`, `Vermittelbar`, `Beschreibung`, `Foto`) VALUES
(1, 'Pesto', 'Ratte', 0, 'Aufgrund eines zu frechen Charakters leider nicht vermittelbar.', 'adoptiere\\kleintiere\\Pesto.jpg'),
(2, 'Schnuppi', 'Hamster', 1, 'Die kleine Hamsterdame Schnuppi sucht nach einem schönen neuen Zuhause mit einem geräumigen und spannend eingericheten Gehege! ', 'adoptiere\\kleintiere\\Schnuppi.jpg'),
(3, 'Konrad', 'Wühlmaus', 0, 'Wühlmäsuse sind leider keine Haustiere', 'adoptiere\\kleintiere\\Konrad.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vögel`
--

CREATE TABLE `vögel` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Art` text NOT NULL,
  `Vermittelbar` tinyint(1) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `vögel`
--

INSERT INTO `vögel` (`id`, `Name`, `Art`, `Vermittelbar`, `Beschreibung`, `Foto`) VALUES
(1, 'babs', 'so eiun toller vogel wow', 1, 'jaja die vögel', 'adoptiere\\vogel\\Babs.jpg'),
(2, 'taube', 'ja weil taube', 0, 'he voll lieb ja', 'adoptiere\\vogel\\Taube.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `hunde`
--
ALTER TABLE `hunde`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`) USING HASH;

--
-- Indizes für die Tabelle `katzen`
--
ALTER TABLE `katzen`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`(768)) USING BTREE;

--
-- Indizes für die Tabelle `kleintiere`
--
ALTER TABLE `kleintiere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`) USING HASH;

--
-- Indizes für die Tabelle `vögel`
--
ALTER TABLE `vögel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`) USING HASH;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `hunde`
--
ALTER TABLE `hunde`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `katzen`
--
ALTER TABLE `katzen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `kleintiere`
--
ALTER TABLE `kleintiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `vögel`
--
ALTER TABLE `vögel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
