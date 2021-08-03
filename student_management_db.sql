-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 10:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `count_type` (OUT `total` INT(50) UNSIGNED, IN `type_id` INT(50) UNSIGNED)  BEGIN 
select count(*) from users where users.user_type_id=type_id INTO total;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `num_ass` (INOUT `sub_id` INT(50) UNSIGNED)  BEGIN 
select count(*) from  assignment where assignment.subject_id=sub_id into sub_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_assign` (IN `id` INT(50) UNSIGNED)  BEGIN 
select * from assignment where assignment.id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_user` (IN `username` VARCHAR(50), IN `password` VARCHAR(50))  BEGIN
SELECT  * from users WHERE users.username=username and users.password=password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_user_id` (IN `id` INT(20) UNSIGNED)  BEGIN
select * from users WHERE users.id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_user_u_p` (IN `username` VARCHAR(20), IN `password` VARCHAR(20))  BEGIN
SELECT * FROM `users`  where`users`.username=username and`users` .password=password;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `subject_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `title`, `path`, `subject_id`) VALUES
(3, 'first_assign', 'uploads/Question two.docx_1', 0),
(4, 'first_assign', 'uploads/Question two.docx_1_1', 0),
(5, 'first_assign', 'uploads/Question three.docx_1', 0),
(6, 'www', 'uploads/Question two.docx_1_1_1', 1),
(7, 'hom2', 'uploads/Question three.docx_1_1', 0),
(8, 'HW2', 'uploads/Heart-41.jpg_1', 0),
(9, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1', 1),
(10, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1', 1),
(11, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1', 1),
(12, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1', 1),
(13, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1', 1),
(14, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1', 1),
(15, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1_1', 1),
(16, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1_1_1', 1),
(17, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1_1_1_1', 1),
(18, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1', 1),
(19, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1', 1),
(20, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1', 1),
(21, 'e2eeee', 'uploads/OP03.pdf_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `arabic_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `english_name` varchar(50) NOT NULL,
  `arabic_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `english_code` varchar(11) NOT NULL,
  `credit_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `arabic_name`, `english_name`, `arabic_code`, `english_code`, `credit_hours`) VALUES
(0, 'هياكل البيانات', 'Data Structures', 'علوم123', 'cs123', 3),
(1, 'المترجمات', 'compilers', 'علوم50', 'cs50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `users_id` int(20) NOT NULL,
  `salary` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`users_id`, `salary`) VALUES
(1, 2520),
(4, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `users_id` int(20) NOT NULL,
  `St_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`users_id`, `St_code`) VALUES
(3, 20090443),
(4, 20090330),
(5, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `student_course_registration`
--

CREATE TABLE `student_course_registration` (
  `st_code` int(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  `year` int(10) NOT NULL,
  `term` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course_registration`
--

INSERT INTO `student_course_registration` (`st_code`, `course_id`, `year`, `term`, `time`) VALUES
(0, 0, 2, 2, '2019-03-30 20:37:30'),
(0, 1, 2, 2, '2019-03-30 20:37:30'),
(2020, 0, 2, 2, '2019-03-31 06:50:20'),
(2020, 1, 2, 2, '2019-03-31 06:50:20'),
(20090330, 0, 2, 2, '2019-03-30 20:42:53'),
(20090330, 1, 2, 2, '2019-03-30 20:42:53'),
(20090443, 0, 2, 2, '2016-04-17 09:02:44'),
(20090443, 1, 2, 2, '2016-04-17 09:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `name`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'summer');

-- --------------------------------------------------------

--
-- Table structure for table `urls_data`
--

CREATE TABLE `urls_data` (
  `id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urls_data`
--

INSERT INTO `urls_data` (`id`, `title`, `path`) VALUES
(2, 'Add New USer', 'register.php'),
(3, 'Register Course', 'register_course.php'),
(4, 'View All Users', 'list.php'),
(5, 'Upload Assignment', 'upload_assignment.php'),
(6, 'Delete User', 'list_2.php'),
(7, 'Update User', 'list_2.php'),
(8, 'Download Assignment', 'show_assignments.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `email`, `user_type_id`) VALUES
(1, 'Ahmed', '789', 'wael', 'eid', 'wwwww@yahoo.com', 1),
(3, 'sss', '122', 's', 'f', 'bgjkjjhjugy', 3),
(4, 'wael', '123', 'wael', 'eid', 'waelfcih@gmail.com', 2),
(5, 'Ali', '123', 'wael', 'eid', 'waelfcih@gmail.com', 2);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `on_delete_user` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
INSERT INTO `users_delete_log`(`id`, `username`, `password`, `fname`, `lname`, `email`, `user_type_id`) VALUES(old.id,old.username,old.password,old.fname,old.lname,old.email,old.user_type_id) ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `on_update_user` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
INSERT INTO `users_update_log`(`id`, `username`, `password`, `fname`, `lname`, `email`, `user_type_id`) VALUES(old.id,old.username,old.password,old.fname,old.lname,old.email,old.user_type_id) ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_delete_log`
--

CREATE TABLE `users_delete_log` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type_id` int(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_delete_log`
--

INSERT INTO `users_delete_log` (`id`, `username`, `password`, `fname`, `lname`, `email`, `user_type_id`, `time`, `by`) VALUES
(0, '', '', '', '', '', 0, '2016-05-06 22:32:54', 0),
(2, 'xxx', '12322', 'wael', 'eid', 'wwwww@yahoo.com', 2, '2016-05-08 07:22:15', 0),
(3, 'www', '123', 'wael', 'eid', 'wwwwwwww@yahoo.com', 2, '2016-05-06 22:34:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_types_urls`
--

CREATE TABLE `users_types_urls` (
  `user_type_id` int(11) NOT NULL,
  `url_tpe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_types_urls`
--

INSERT INTO `users_types_urls` (`user_type_id`, `url_tpe`) VALUES
(1, 2),
(2, 3),
(1, 4),
(2, 5),
(3, 5),
(1, 6),
(1, 7),
(2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users_update_log`
--

CREATE TABLE `users_update_log` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type_id` int(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_update_log`
--

INSERT INTO `users_update_log` (`id`, `username`, `password`, `fname`, `lname`, `email`, `user_type_id`, `time`, `by`) VALUES
(1, 'wael', '123', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-06 22:41:39', 0),
(2, 'xxx', '123', 'wael', 'eid', 'wwwww@yahoo.com', 2, '2016-05-07 21:17:39', 0),
(1, 'wael', '1234', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-07 21:23:07', 0),
(1, 'wael', '12345', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 06:37:38', 0),
(1, 'wael', '123', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 07:27:30', 0),
(1, 'Ahmed', '123', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 07:27:45', 0),
(1, 'Ahmed', '14566', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 07:27:51', 0),
(1, 'wael', '123', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-06 22:41:39', 0),
(2, 'xxx', '123', 'wael', 'eid', 'wwwww@yahoo.com', 2, '2016-05-07 21:17:39', 0),
(1, 'wael', '1234', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-07 21:23:07', 0),
(1, 'wael', '12345', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 06:37:38', 0),
(1, 'wael', '123', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 07:27:30', 0),
(1, 'Ahmed', '123', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 07:27:45', 0),
(1, 'Ahmed', '14566', 'wael', 'eid', 'wwwww@yahoo.com', 1, '2016-05-08 07:27:51', 0),
(3, 'sss', '122', 's', 'f', 'e', 2, '2019-03-30 20:14:30', 0),
(3, 'sss', '122', 's', 'f', 'e', 3, '2019-03-30 20:14:47', 0),
(5, 'www', '123', 'wael', 'eid', 'waelfcih@gmail.com', 2, '2019-03-31 06:51:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tpe`
--

CREATE TABLE `user_tpe` (
  `type_id` int(20) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tpe`
--

INSERT INTO `user_tpe` (`type_id`, `type`) VALUES
(1, 'Admin'),
(2, 'Student'),
(3, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `name`) VALUES
(0, '2017'),
(1, '2016'),
(2, '2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_fk` (`subject_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`users_id`,`St_code`),
  ADD UNIQUE KEY `St_code` (`St_code`);

--
-- Indexes for table `student_course_registration`
--
ALTER TABLE `student_course_registration`
  ADD PRIMARY KEY (`st_code`,`course_id`,`year`,`term`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urls_data`
--
ALTER TABLE `urls_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_delete_log`
--
ALTER TABLE `users_delete_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u` (`username`);

--
-- Indexes for table `users_types_urls`
--
ALTER TABLE `users_types_urls`
  ADD PRIMARY KEY (`url_tpe`,`user_type_id`);

--
-- Indexes for table `user_tpe`
--
ALTER TABLE `user_tpe`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `urls_data`
--
ALTER TABLE `urls_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tpe`
--
ALTER TABLE `user_tpe`
  MODIFY `type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
