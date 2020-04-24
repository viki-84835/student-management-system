-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 04:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` varchar(30) NOT NULL,
  `className` varchar(30) NOT NULL,
  `yearGrade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `className`, `yearGrade`) VALUES
('11', '11', 'UpperScience'),
('12', '12', 'UpperScience');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Dob` date NOT NULL,
  `City` varchar(15) NOT NULL,
  `classID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `firstName`, `lastName`, `gender`, `Email`, `Mobile`, `Dob`, `City`, `classID`) VALUES
(10001, 'Kartik', 'Gondaliya', 'Male', 'kartikgondaliya@gmail.com', 0, '0000-00-00', '', '11'),
(10002, 'Vivek', 'Gamit', 'Male', '', 0, '0000-00-00', '', '12'),
(10003, 'Smital', 'Suvagiya', 'Female', '', 0, '0000-00-00', '', '11'),
(10005, 'Axay', 'Bhanderi', 'Male', '', 0, '0000-00-00', '', '12'),
(10006, 'Gopi', 'Dholariya', 'Female', '', 0, '0000-00-00', '', '11'),
(10007, 'Pradip', 'Pansuriya', 'Male', '', 0, '0000-00-00', '', '12'),
(10008, 'Tejas', 'Pansuriya', 'Male', '', 0, '0000-00-00', '', '11'),
(10009, 'Avani', 'Ribadiya', 'Female', '', 0, '0000-00-00', '', '12'),
(10010, 'Lakshit', 'Gajera', 'Male', '', 0, '0000-00-00', '', '11'),
(10011, 'Jay', 'Gondaliya', 'Male', '', 0, '0000-00-00', '', '11'),
(10012, 'Divyesh', 'Pansuriya', 'Male', '', 0, '0000-00-00', '', '12'),
(10013, 'Pooja', 'Saravaiya', 'Female', '', 0, '0000-00-00', '', '12'),
(10014, 'Gopal', 'Kachhela', 'Male', '', 0, '0000-00-00', '', '12'),
(10015, 'Dharti', 'Pansuriya', 'Female', '', 0, '0000-00-00', '', '12'),
(10016, 'Ravi', 'Patel', 'Male', '', 0, '0000-00-00', '', '12'),
(10017, 'Hardik', 'Dholariya', 'Male', '', 0, '0000-00-00', '', '11'),
(10018, 'Prizesh', 'Bhadaniya', 'Male', '', 0, '0000-00-00', '', NULL),
(10019, 'Nitesh', 'Kapadiya', 'Male', 'nitesh@gmail.com', 2147483647, '2001-06-06', 'Babra', NULL),
(10020, 'vivek', 'godhani', 'Male', '', 0, '0000-00-00', '', '11'),
(10021, 'vivek', 'godhani', 'Male', 'godhanivivekp@gmail.com', 2147483647, '2000-06-03', 'jamanagar', '11'),
(10023, 'vivek', 'cpp', 'Male', 'vpgodhani@gmail.com', 2147483647, '2000-06-03', 'jamanagar', '11'),
(10024, 'vivek', 'cpp9', 'Male', 'vpgodhani@gmail.com', 2147483647, '2000-06-03', 'jamanagar', '11');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `studentID` int(11) NOT NULL,
  `subjectID` varchar(30) NOT NULL,
  `subject_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`studentID`, `subjectID`, `subject_score`) VALUES
(10001, '6', 91),
(10001, '4', 84),
(10001, '3', 89),
(10001, '2', 0),
(10001, '5', 80),
(10001, '1', 94),
(10011, '6', 11),
(10011, '4', NULL),
(10011, '3', NULL),
(10011, '2', NULL),
(10011, '5', NULL),
(10011, '1', NULL),
(10002, '6', 80),
(10002, '4', 74),
(10002, '3', 79),
(10002, '2', 0),
(10002, '5', 89),
(10002, '1', 91),
(10014, '3', NULL),
(10014, '4', NULL),
(10014, '5', NULL),
(10014, '6', NULL),
(10014, '2', NULL),
(10003, '3', 96),
(10003, '4', 83),
(10003, '5', 76),
(10003, '6', 93),
(10003, '2', 97),
(10005, '3', 89),
(10005, '4', 92),
(10005, '5', 69),
(10005, '6', 91),
(10005, '2', 0),
(10007, '3', NULL),
(10007, '4', NULL),
(10007, '5', NULL),
(10007, '6', NULL),
(10007, '2', NULL),
(10006, '3', NULL),
(10006, '4', NULL),
(10006, '5', NULL),
(10006, '6', NULL),
(10006, '2', NULL),
(10008, '3', NULL),
(10008, '4', NULL),
(10008, '5', NULL),
(10008, '6', NULL),
(10008, '2', NULL),
(10009, '3', NULL),
(10009, '4', NULL),
(10009, '5', NULL),
(10009, '6', NULL),
(10009, '2', NULL),
(10010, '3', NULL),
(10010, '4', NULL),
(10010, '5', NULL),
(10010, '6', NULL),
(10010, '2', NULL),
(10012, '3', NULL),
(10012, '4', NULL),
(10012, '5', NULL),
(10012, '6', NULL),
(10012, '2', NULL),
(10013, '3', 56),
(10013, '4', 70),
(10013, '5', 69),
(10013, '6', 71),
(10013, '2', 92),
(10015, '3', 78),
(10015, '4', 65),
(10015, '5', 42),
(10015, '6', 75),
(10015, '2', 81),
(10016, '3', NULL),
(10016, '4', NULL),
(10016, '5', NULL),
(10016, '6', NULL),
(10016, '2', NULL),
(10017, '3', NULL),
(10017, '4', NULL),
(10017, '5', NULL),
(10017, '6', NULL),
(10017, '2', NULL),
(10020, '3', NULL),
(10020, '4', NULL),
(10020, '5', NULL),
(10020, '6', NULL),
(10020, '2', NULL),
(10023, '5', 0),
(10023, '4', 0),
(10023, '3', 0),
(10023, '2', 0),
(10023, '1', 0),
(10024, '6', 11),
(10024, '5', 0),
(10024, '4', 0),
(10024, '3', 0),
(10024, '2', 0),
(10024, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` varchar(30) NOT NULL,
  `subjectName` varchar(30) NOT NULL,
  `subjectType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectName`, `subjectType`) VALUES
('1', 'Mathematics', 'Selective'),
('2', 'Biology', 'Selective'),
('3', 'Chemistry', 'Core'),
('4', 'Physics', 'Core'),
('5', 'English', 'Core'),
('6', 'Computer', 'Core');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Dob` date NOT NULL,
  `City` varchar(15) NOT NULL,
  `subjectID` varchar(30) DEFAULT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `firstName`, `lastName`, `gender`, `Email`, `Mobile`, `Dob`, `City`, `subjectID`, `username`) VALUES
(11, 'vivek', 'godhani', 'Male', 'godhanivivekp@gmail.com', 2147483647, '2000-06-03', 'jamanagar', '1', 'vpgodhani');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Role`) VALUES
(1, 'kartikgondaliya0@gmail.com', '$2y$10$iUY7KmNDJuEft6szbuiQ0.5XBCcHxh7lDISsaxEaHJjj1EAtIfFAa', 'Teacher'),
(2, 'vicky', '$2y$10$w5uPDMCZbGSryzWCUaGL7OhDXs4U8MLTLMM6U3hjaAc0ksUgLNUJe', 'Teacher'),
(3, 'kartik', '$2y$10$Of3DRhF/ZaoMBeYvigfxFuDeDhiXbgP5JPr5pm4v5LGdD731QxRW.', 'Admin'),
(4, 'Axay', '$2y$10$VglSkjTftxFq2ZahlxKNrux.FsELjI0RCMQ49tXkuvbPr2WI/GxKK', 'Teacher'),
(6, 'godhanivivek', '$2y$10$uiQX3qvRdwhXYaS8oIEZ2.Yjrp2NxNsbQrfvoL1YqIzfDQP7/jmvC', 'Admin'),
(20, 'vpgodhani', '$2y$10$kRPcgVchVQHgaX43gQnJkuCuqbLIOpwuPLn1s8sLmHHj71FiwbsDa', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `classID` (`classID`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10025;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
