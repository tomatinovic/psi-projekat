-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2019 at 11:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_skola`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignedgroup`
--

DROP TABLE IF EXISTS `assignedgroup`;
CREATE TABLE IF NOT EXISTS `assignedgroup` (
  `idAssigned` int(30) NOT NULL AUTO_INCREMENT,
  `idTClass` int(30) NOT NULL,
  `idStudent` int(30) NOT NULL,
  PRIMARY KEY (`idAssigned`),
  KEY `asGroupTClass` (`idTClass`),
  KEY `asStudentIdUser` (`idStudent`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignedgroup`
--

INSERT INTO `assignedgroup` (`idAssigned`, `idTClass`, `idStudent`) VALUES
(1, 1, 3),
(2, 3, 19),
(3, 5, 24),
(4, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `drivinglessons`
--

DROP TABLE IF EXISTS `drivinglessons`;
CREATE TABLE IF NOT EXISTS `drivinglessons` (
  `idLesson` int(30) NOT NULL AUTO_INCREMENT,
  `idTeacher` int(30) NOT NULL,
  `idStudent` int(30) NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `done` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idLesson`),
  KEY `prof-user` (`idTeacher`),
  KEY `student-user` (`idStudent`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drivinglessons`
--

INSERT INTO `drivinglessons` (`idLesson`, `idTeacher`, `idStudent`, `date`, `time`, `done`) VALUES
(1, 2, 3, '11.05.2019.', '11:00', '1'),
(2, 2, 3, '01.06.2019.', '12:00', '0'),
(3, 17, 19, '20.06.2019.', '14:00', '0'),
(4, 18, 24, '03.05.2019.', '08:00', '1'),
(5, 2, 23, '15.06.2019.', '17:00', '0'),
(6, 17, 19, '05.05.2019.', '09:00', '1'),
(7, 18, 24, '21.06.2019.', '08:30', '0'),
(8, 2, 23, '16.06.2019.', '16:00', '0'),
(9, 2, 3, '10.05.2019.', '11:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `idExam` int(30) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `free` int(30) NOT NULL,
  PRIMARY KEY (`idExam`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`idExam`, `date`, `time`, `free`) VALUES
(1, '31.05.2019.', '10:00', 30),
(2, '07.06.2019.', '09:00', 26),
(3, '11.06.2019.', '11:30', 30),
(4, '11.06.2019.', '12:30', 25),
(5, '20.06.2019.', '08:30', 30),
(6, '23.06.2019.', '12:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `examlist`
--

DROP TABLE IF EXISTS `examlist`;
CREATE TABLE IF NOT EXISTS `examlist` (
  `idList` int(30) NOT NULL AUTO_INCREMENT,
  `idExam` int(30) NOT NULL,
  `idStudent` int(30) NOT NULL,
  PRIMARY KEY (`idList`),
  KEY `exExamList` (`idExam`),
  KEY `exStudentUser` (`idStudent`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `examlist`
--

INSERT INTO `examlist` (`idList`, `idExam`, `idStudent`) VALUES
(2, 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `teaching`
--

DROP TABLE IF EXISTS `teaching`;
CREATE TABLE IF NOT EXISTS `teaching` (
  `idTeaching` int(30) NOT NULL AUTO_INCREMENT,
  `idTeacher` int(30) NOT NULL,
  `idStudent` int(30) NOT NULL,
  PRIMARY KEY (`idTeaching`),
  KEY `idUseridProffesor` (`idTeacher`),
  KEY `idUseridStudent` (`idStudent`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teaching`
--

INSERT INTO `teaching` (`idTeaching`, `idTeacher`, `idStudent`) VALUES
(1, 2, 3),
(2, 17, 19),
(3, 18, 24),
(4, 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `theoryclass`
--

DROP TABLE IF EXISTS `theoryclass`;
CREATE TABLE IF NOT EXISTS `theoryclass` (
  `idTClass` int(30) NOT NULL AUTO_INCREMENT,
  `idTeacher` int(30) NOT NULL,
  `day` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTClass`),
  KEY `theoryclassIDTEACHER` (`idTeacher`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theoryclass`
--

INSERT INTO `theoryclass` (`idTClass`, `idTeacher`, `day`, `time`) VALUES
(1, 2, 'ponedeljak/petak', '11:30-13:30'),
(2, 18, 'ponedeljak/subota', '10:00-12:00'),
(3, 17, 'ponedeljak/sreda', '08:30-10:30'),
(4, 2, 'utorak/cetvrtak', '17:00-19:00'),
(5, 18, 'utorak/sreda', '18:00-20:00'),
(6, 17, 'sreda/petak', '15:30-17:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jmbg` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(30) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `name`, `surname`, `username`, `password`, `address`, `phone`, `jmbg`, `email`, `type`) VALUES
(1, 'Tamara', 'Tomanic', 'tacka', 'tacka123', 'Salv Alj', '12391823019', '932098239482049', 'tackaemail', 0),
(2, 'Aleksandra', 'Dragutinovic', 'saska', 'saska123', 'Gosp Vuc', '12391823019', '0101994715003', 'saskaemail', 1),
(3, 'Darko', 'Ardalic', 'darko', 'darko123', 'Ljub Miod', '12391823019', '0650651605', 'darkoemail', 2),
(4, 'Marko', 'Ardalic', 'maki', 'maki123', 'Ljub Miod', '12391823019', '643213546876', 'markoemail', 3),
(17, 'Luka', 'Popovic', 'luka', 'luka123', 'Mar Greg', '0641234567', '1107987710055', 'lukaemail', 1),
(18, 'Dusan', 'Jankovic', 'dule', 'dule123', 'Mir Bul', '0631288873', '1905976710099', 'duleemail', 1),
(19, 'Milica', 'Ristic', 'mica', 'mica123', 'Pat Lum', '0621133311', '2308997715007', 'micaemail', 2),
(20, 'Janko', 'Hristic', 'janko', 'janko123', 'Drag Sre', '0610098753', '1001000710001', 'jankoemail', 3),
(21, 'Jelica', 'Bilic', 'jeca', 'jeca123', 'Juz Bul', '0655599955', '2903999715021', 'jecaemail', 3),
(23, 'Gordana', 'Savic', 'goca', 'goca123', 'Sev Bul', '0643211133', '0404994715044', 'jecaemail', 2),
(24, 'Vuk', 'Glisic', 'vuk', 'vuk123', 'Maks Gor', '0638977789', '1712990710009', 'vukemail', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignedgroup`
--
ALTER TABLE `assignedgroup`
  ADD CONSTRAINT `asGroupTClass` FOREIGN KEY (`idTClass`) REFERENCES `theoryclass` (`idTClass`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asStudentIdUser` FOREIGN KEY (`idStudent`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivinglessons`
--
ALTER TABLE `drivinglessons`
  ADD CONSTRAINT `prof-user` FOREIGN KEY (`idTeacher`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student-user` FOREIGN KEY (`idStudent`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examlist`
--
ALTER TABLE `examlist`
  ADD CONSTRAINT `exExamList` FOREIGN KEY (`idExam`) REFERENCES `exam` (`idExam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exStudentUser` FOREIGN KEY (`idStudent`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teaching`
--
ALTER TABLE `teaching`
  ADD CONSTRAINT `idUseridProffesor` FOREIGN KEY (`idTeacher`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUseridStudent` FOREIGN KEY (`idStudent`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theoryclass`
--
ALTER TABLE `theoryclass`
  ADD CONSTRAINT `theoryclassIDTEACHER` FOREIGN KEY (`idTeacher`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
