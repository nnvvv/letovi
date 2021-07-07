-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 04:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letovi`
--

-- --------------------------------------------------------

--
-- Table structure for table `klasa`
--

CREATE TABLE `klasa` (
  `idKlase` int(11) NOT NULL,
  `nazivKlase` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasa`
--

INSERT INTO `klasa` (`idKlase`, `nazivKlase`) VALUES
(1, 'ekonomska'),
(2, 'prva'),
(3, 'biznis');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL,
  `telefon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `name`, `username`, `password`, `admin`, `telefon`) VALUES
(1, 'Marija Bjelopetrovic', 'marija', 'marija97', 1, '063418418'),
(2, 'Stefan Jelic', 'stefi', 'stefi', 1, '064765121'),
(3, 'Nina Vukovic', 'nina', 'nina', 1, '064354778'),
(4, 'Petar Petrovic', 'pera', 'pera', 0, '062557643'),
(5, 'Andrija Cvijovic', 'aki', 'aki', 0, '064112312'),
(6, 'Ivana Vasic', 'ika', 'ika', 0, '062275442'),
(7, 'Bojan Peric', 'boki', 'boki', 0, '063418543'),
(9, 'Novak Djokovic', 'nole', 'nole', 0, '063519519'),
(10, 'Jelena Terzic', 'jecka', 'jecka', 0, '065432178'),
(11, 'Jelena Terzic', 'jecka', 'jecka', 0, '065432178'),
(12, 'Zeljko Milic', 'zeljkan', 'zeljkan', 0, '0603699529'),
(13, 'Emilija Obradovic', 'ema', 'ema', 0, '0643217689'),
(18, 'Mina Nikolic', 'mina', 'mina', 0, '0603699527'),
(19, 'Milos Milakovic', 'somi', 'somi', 0, '0697854321'),
(20, 'Nenad Ilic', 'sone', 'sone', 0, '0603699527'),
(21, 'Mateja Djordjevic', 'mata', 'mata', 0, '0643268769');

-- --------------------------------------------------------

--
-- Table structure for table `let`
--

CREATE TABLE `let` (
  `id` int(11) NOT NULL,
  `mestoOd` varchar(50) NOT NULL,
  `mestoDo` varchar(50) NOT NULL,
  `klasa` int(11) NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `let`
--

INSERT INTO `let` (`id`, `mestoOd`, `mestoDo`, `klasa`, `cena`) VALUES
(1, 'Beograd', 'Amsterdam', 2, 6866),
(2, 'Beograd', 'Atina', 2, 89700),
(3, 'Beograd', 'Barselona', 3, 58722),
(4, 'Beograd', 'Frankfurt', 1, 18744),
(5, 'Beograd', 'Helsinki', 2, 30452),
(6, 'Beograd', 'Kopenhagen', 1, 10052),
(7, 'Beograd', 'Pariz', 3, 36014),
(8, 'Beograd', 'Rim', 2, 47600),
(9, 'Beograd', 'Dizeldorf', 3, 26810),
(10, 'Beograd', 'Istanbul', 2, 15682),
(11, 'Nis', 'Atina', 3, 55000),
(12, 'Nis', 'Berlin', 1, 6000),
(13, 'Nis', 'Malme', 3, 10250),
(14, 'Budimpesta', 'Milano', 1, 5560),
(15, 'Budimpesta', 'Barselona', 3, 60582),
(16, 'Budimpesta', 'Pariz', 3, 12300),
(17, 'Temisvar', 'Dortmund', 1, 3250),
(18, 'Temisvar', 'Tel-Aviv', 1, 8258),
(19, 'Solun', 'Madrid', 3, 16540),
(20, 'Beograd', 'Dubai', 3, 58600),
(26, 'Atina', 'Barselona', 1, 13780),
(27, 'Atina', 'Barselona', 1, 13780),
(28, 'Pariz', 'Stokholm', 1, 25600),
(29, 'Sofija', 'Atina', 1, 9700),
(30, 'Beograd', 'Berlin', 2, 54300);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `rezervacijaID` int(11) NOT NULL,
  `datum` date NOT NULL,
  `let` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `brojSedista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`rezervacijaID`, `datum`, `let`, `korisnik`, `brojSedista`) VALUES
(2, '2020-01-30', 12, 1, 4),
(3, '2020-02-14', 14, 9, 2),
(4, '2020-02-28', 9, 9, 5),
(5, '2020-03-07', 3, 12, 5),
(6, '2020-05-22', 8, 12, 5),
(7, '2020-02-10', 10, 10, 2),
(8, '2020-08-05', 5, 10, 5),
(9, '2020-02-15', 7, 2, 6),
(10, '2020-06-25', 2, 2, 3),
(11, '2020-02-07', 12, 6, 4),
(12, '2020-02-15', 13, 3, 2),
(13, '2020-02-22', 16, 1, 2),
(14, '2020-02-08', 7, 7, 3),
(15, '2020-05-15', 16, 9, 4),
(16, '2020-02-29', 7, 1, 2),
(17, '1970-01-01', 2, 9, 3),
(18, '2020-02-08', 13, 1, 3),
(19, '2020-06-26', 9, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `let`
--
ALTER TABLE `let`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klasa` (`klasa`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`rezervacijaID`),
  ADD KEY `let` (`let`),
  ADD KEY `korisnik` (`korisnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `let`
--
ALTER TABLE `let`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `rezervacijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
