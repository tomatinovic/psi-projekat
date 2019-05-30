-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2019 at 07:27 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignedgroup`
--

INSERT INTO `assignedgroup` (`idAssigned`, `idTClass`, `idStudent`) VALUES
(1, 1, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drivinglessons`
--

INSERT INTO `drivinglessons` (`idLesson`, `idTeacher`, `idStudent`, `date`, `time`, `done`) VALUES
(1, 2, 3, '11.05.2019.', '11:00', '1'),
(2, 2, 3, '01.06.2019.', '12:00', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`idExam`, `date`, `time`, `free`) VALUES
(1, '31.05.2019.', '10:00', 30),
(2, '07.06.2019.', '09:00', 25);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `examlist`
--

INSERT INTO `examlist` (`idList`, `idExam`, `idStudent`) VALUES
(1, 2, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teaching`
--

INSERT INTO `teaching` (`idTeaching`, `idTeacher`, `idStudent`) VALUES
(1, 2, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theoryclass`
--

INSERT INTO `theoryclass` (`idTClass`, `idTeacher`, `day`, `time`) VALUES
(1, 2, 'ponedeljak/petak', '11:30-13:30');

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
(1, 'Tamara', 'Tomanic', 'tacka', 'tacka123', 'sal alj', '12391823019', '932098239482049', 'aaa', 0),
(2, 'Aleksandra', 'Dragutinovic', 'saska', 'saska123', 'tt', 'uu', 'ee', 'jfghfghf', 1),
(3, 'Darko', 'Ardalic', 'darko', 'darko123', 'ulicaa', '654605460', '0650651605', 'asdasdasd', 2),
(4, 'Marko', 'Ardalic', 'maki', 'maki123', 'aaaa', 'bbb', '643213546876', 'dasdasdasd', 3),
(11, 'asdasd', 'asdasd', 'asdasd', 'sdfs', 'fsdfs', 'dfsfsd', 'fsdf', 'dfgdfg', 1),
(12, 'asdasd', 'asdasd', 'asdasd', 'sdfs', 'fsdfs', 'dfsfsd', 'fsdf', 'dfgdfg', 1),
(17, 'asdasd', 'asdasd', 'asdasd', 'sdfs', 'fsdfs', 'dfsfsd', 'fsdf', 'dfgdfg', 1),
(18, 'yy', 'yy', 'yy', 'yy', 'yy', 'yy', 'yy', 'yy', 0),
(19, 'ytrr', 'rr', 'rr', 'rr', 'rr', 'rr', 'rr', 'rr', 0),
(20, 'pp', 'pp', 'pp', 'pp', 'pp', 'pp', 'pp', 'pp', 2),
(21, 'll', 'll', 'll', 'll', 'll', 'll', 'll', 'll', 0),
(22, 'oo', 'oo', 'oo', 'oo', 'oo', 'oo', 'oo', 'oo', 0),
(23, 'dfg', 'dfg', 'gfd', 'gfd', 'gfd', 'gfd', 'fg', 'dfg', 2),
(24, 'sss', 'sss', 'sss', 'sss', 'sss', 'ss', 'ss', 'ss', 0),
(26, 'uioui', 'uiouo', 'ouioiu', 'ouio', 'uiou', 'ouiou', 'uiou', 'oiuioui', 1);

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
