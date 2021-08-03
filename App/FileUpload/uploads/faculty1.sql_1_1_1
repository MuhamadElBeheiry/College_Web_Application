-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 09:07 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faculty1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN `user` VARCHAR(20), IN `pass` VARCHAR(20))
BEGIN
select * from student where username=user and password=pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `register`(IN `Id` INT(20), IN `user1` VARCHAR(20), IN `pass` VARCHAR(20), IN `firstname` VARCHAR(20), IN `lastname` VARCHAR(20), IN `dept` INT(2))
BEGIN
insert into student values(Id,user1,pass,firstname,lastname,dept);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `instructor_id` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `instructor_id`) VALUES
(1, 'cs200', 'compilers', 20055),
(2, 'it200', 'Image processing', 20057),
(3, 'cs2012', 'parallel ', 20057),
(4, 'cs2014', 'logic design', 20056);

-- --------------------------------------------------------

--
-- Table structure for table `course_dept`
--

CREATE TABLE IF NOT EXISTS `course_dept` (
  `course_id` int(20) NOT NULL,
  `dept_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_dept`
--

INSERT INTO `course_dept` (`course_id`, `dept_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'cs'),
(2, 'is'),
(3, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dept_id` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20058 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `username`, `password`, `fname`, `lname`, `dept_id`) VALUES
(20055, 'tamer20', '20090330', 'Tamer', 'yassen', 1),
(20056, 'ahmed20', '20090332', 'Ahmed', 'ali', 2),
(20057, 'ahmed20', '20090333', 'ahmed', 'ali', 2);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(20) NOT NULL,
  `user1` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` int(20) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user1`, `password`, `fname`, `lname`, `time`) VALUES
(2, 'w', 'r', 'r', 0, '2015-04-26 23:40:03'),
(3, '3', '3', 'bvmbnm', 0, '2015-04-27 14:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dept_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `fname`, `lname`, `dept_id`) VALUES
(12, '201203332', '20120333', 'wael', 'eid fathy', 1),
(13, '123', '123', 'wael', 'eid fathy', 2),
(14, '20120333', '20120333', 'asdfdsf', 'eid fathy', 1),
(15, '55', '22', 'asdfdsf', 'eid fathy', 1),
(16, 't', 'u', 'j', 'p', 1),
(33, '33', '33', 'a', 'eid fathy', 2),
(56, '56', '23', 'asdfdsf', 'eid fathy', 1),
(20090330, 'wael2013', '20090330', 'wael', 'eid fathy', 1),
(20090331, 'admin', 'admin', 'tamer', 'yassen', 1),
(20090334, 'wael', '', 'ali', 'mohammed', 1),
(20090335, 'mohammed', '200908', 'mohammed', 'ali', 2),
(20090336, '01092546901', '1234', 'ali', 'eid fathy', 3);

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `user_delete` BEFORE DELETE ON `student`
 FOR EACH ROW BEGIN
insert into log(id,user1,password,fname,lname) values(old.id,old.username,old.password,old.fname,old.lname);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `st_id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`st_id`, `course_id`) VALUES
(20090330, 3),
(20090330, 4),
(20090330, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `code` (`code`), ADD KEY `fk1` (`instructor_id`);

--
-- Indexes for table `course_dept`
--
ALTER TABLE `course_dept`
  ADD KEY `fk3` (`dept_id`), ADD KEY `fk4` (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`password`), ADD KEY `fk2` (`dept_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`password`), ADD KEY `fk` (`dept_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD KEY `fk5` (`st_id`), ADD KEY `fk6` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20058;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
ADD CONSTRAINT `fk1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_dept`
--
ALTER TABLE `course_dept`
ADD CONSTRAINT `fk3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk4` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
ADD CONSTRAINT `fk2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `fk` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
ADD CONSTRAINT `fk5` FOREIGN KEY (`st_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk6` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
