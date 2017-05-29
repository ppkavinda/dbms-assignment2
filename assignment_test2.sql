-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2017 at 11:50 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` varchar(50) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `name`) VALUES
('DEP1', 'it'),
('DEP2', 'physics'),
('DEP3', 'maths'),
('DEP4', 'chemistry'),
('DEP5', 'mechanic');

-- --------------------------------------------------------

--
-- Table structure for table `diploma`
--

CREATE TABLE `diploma` (
  `d_id` varchar(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `dep_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diploma`
--

INSERT INTO `diploma` (`d_id`, `name`, `dep_id`) VALUES
('D1', 'cs', 'DEP1'),
('D2', 'is', 'DEP1'),
('D3', 'chemist', 'DEP4'),
('D4', 'physist', 'DEP2'),
('D5', 'statistic', 'DEP3'),
('D6', 'engineer', 'DEP5'),
('D7', 'se', 'DEP1'),
('D8', 'radiology', 'DEP4'),
('D9', 'astronomy', 'DEP2');

-- --------------------------------------------------------

--
-- Table structure for table `diploma_module`
--

CREATE TABLE `diploma_module` (
  `d_id` varchar(50) NOT NULL,
  `mcode` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diploma_module`
--

INSERT INTO `diploma_module` (`d_id`, `mcode`, `semester`) VALUES
('D1', 'M1', '1'),
('D1', 'M2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exmas`
--

CREATE TABLE `exmas` (
  `date` date NOT NULL,
  `mcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exmas`
--

INSERT INTO `exmas` (`date`, `mcode`) VALUES
('2017-05-10', 'M1'),
('2017-05-17', 'M1'),
('2017-05-25', 'M1'),
('2017-05-26', 'M1'),
('2017-05-01', 'M2'),
('2017-05-16', 'M2'),
('2017-05-04', 'M3');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `mcode` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `cr_level` int(11) NOT NULL,
  `coordinator_id` varchar(50) NOT NULL,
  `d_id` varchar(50) NOT NULL,
  `dep_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`mcode`, `title`, `cr_level`, `coordinator_id`, `d_id`, `dep_id`, `semester`) VALUES
('M1', 'dsa 1', 2, 'L1', 'D1', 'DEP1', 1),
('M10', 'test', 3, 'L3', 'D5', 'DEP1', 2),
('M12', 'machine learn', 2, '', 'D7', 'DEP1', 2),
('M13', 'x-ray', 3, '', 'D8', 'DEP4', 1),
('M14', 'quontom mechenic', 3, '', 'D9', 'DEP2', 1),
('M15', 'magnetic feidls', 3, '', 'D4', 'DEP2', 1),
('M2', 'programming 1', 2, 'L2', 'D2', 'DEP1', 1),
('M3', 'math 1', 5, '', 'D1', 'DEP3', 1),
('M4', 'prog & problem 1', 4, '', 'D2', 'DEP1', 1),
('M5', 'computer system', 4, '', 'D2', 'DEP1', 1),
('M6', 'orgenic', 3, '', 'D3', 'DEP4', 2),
('M8', 'atom 2', 3, '', 'D3', 'DEP4', 2),
('M9', 'electronic 2', 3, '', 'D4', 'DEP2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `l_id` varchar(50) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `dep_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`l_id`, `fname`, `lname`, `dep_id`) VALUES
('L1', 'noel', 'pranando', 'DEP1'),
('L2', 'kasun', 'jayawardhana', 'DEP2'),
('L3', 'ruwan', 'weerasinghe', 'DEP1');

-- --------------------------------------------------------

--
-- Table structure for table `staff_module`
--

CREATE TABLE `staff_module` (
  `mcode` varchar(50) NOT NULL,
  `l_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_module`
--

INSERT INTO `staff_module` (`mcode`, `l_id`) VALUES
('M2', 'L1'),
('M1', 'L2'),
('M2', 'L2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` varchar(50) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `address1` varchar(225) NOT NULL,
  `address2` varchar(225) NOT NULL,
  `d_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `fname`, `lname`, `address1`, `address2`, `d_id`) VALUES
('S1', 'prasad', 'kavinda', 'medawatta kerantholla', 'thelijjawila', 'D1'),
('S2', 'shehan', 'chamika', 'kaduwela road battaramulla', 'colombo', 'D2'),
('S3', 'thusitha', 'salinda', 'rahula road', 'kandy', 'D3'),
('S4', 'thusitha', 'salinda', 'rahula road', 'kandy', 'D3'),
('S5', 'danushka', 'herath', 'alawwa', 'kurunagala', 'D4');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `date` date NOT NULL,
  `mcode` varchar(50) NOT NULL,
  `s_id` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_exam`
--

INSERT INTO `student_exam` (`date`, `mcode`, `s_id`, `grade`) VALUES
('2017-05-01', 'M2', 'S1', 'B'),
('2017-05-17', 'M1', 'S1', 'C+'),
('2017-05-26', 'M1', 'S1', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `ulevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `ulevel`) VALUES
('A1', '93e3b03050327fbae23c3489f0878d6f', 0),
('L3', '2eaac698ef09c12c7e37e8ede8776426', 1),
('L4', '93f56ccb72718b484ea3464e0c670327', 1),
('S2', '97833e1ab4a92ac4c39442488eadcd26', 2),
('S3', '67d9b1a7d64d9a9961ca409ea16bffdd', 2),
('S4', '9174d41d27447d06999085b0f2a67619', 2),
('S5', '466003902974669942f8e8127bd44c88', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `diploma`
--
ALTER TABLE `diploma`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `diploma_module`
--
ALTER TABLE `diploma_module`
  ADD PRIMARY KEY (`d_id`,`mcode`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `mcode` (`mcode`);

--
-- Indexes for table `exmas`
--
ALTER TABLE `exmas`
  ADD PRIMARY KEY (`date`,`mcode`),
  ADD KEY `mcode` (`mcode`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`mcode`),
  ADD KEY `module_ibfk_2` (`d_id`),
  ADD KEY `diploma_module_ibfk_3` (`dep_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `staff_module`
--
ALTER TABLE `staff_module`
  ADD PRIMARY KEY (`mcode`,`l_id`),
  ADD KEY `staff_module_ibfk_1` (`l_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`date`,`mcode`,`s_id`),
  ADD KEY `date` (`date`,`mcode`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diploma`
--
ALTER TABLE `diploma`
  ADD CONSTRAINT `diploma_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diploma_module`
--
ALTER TABLE `diploma_module`
  ADD CONSTRAINT `diploma_module_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `diploma` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diploma_module_ibfk_2` FOREIGN KEY (`mcode`) REFERENCES `module` (`mcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exmas`
--
ALTER TABLE `exmas`
  ADD CONSTRAINT `exmas_ibfk_1` FOREIGN KEY (`mcode`) REFERENCES `module` (`mcode`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `diploma_module_ibfk_3` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `diploma` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_module`
--
ALTER TABLE `staff_module`
  ADD CONSTRAINT `staff_module_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `staff` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_module_ibfk_2` FOREIGN KEY (`mcode`) REFERENCES `module` (`mcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `diploma` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD CONSTRAINT `student_exam_ibfk_1` FOREIGN KEY (`date`,`mcode`) REFERENCES `exmas` (`date`, `mcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_exam_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `students` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
