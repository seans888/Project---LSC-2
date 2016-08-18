-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2016 at 01:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsc_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jcheramia', 'CqnbOmUqlqLRUVyqfKp31gYtH3izSPhw', '$2y$13$NWeZgRfWnuUbU/wQYaJ0wOKA/zopgdKBi6hEvW/xWzeYsjUGIwYxC', NULL, 'johannaheramia@yahoo.com', 10, 1470537921, 1470537921),
(5, 'jgtadeo', 'z6jyxY9bwA59LkNdOKTsVmDtgLA2EthL', '$2y$13$hevVxEr1ZnzKjVbC7rXcde28M1eWdmrEBrt8FGALyPWPoSpE.I9ny', NULL, 'renzotadeo@yahoo.com', 10, 1470552269, 1470552269),
(6, 'jggardon', 'azn0lSqdJPf5cdHCyFlmrwf2prV6BT5T', '$2y$13$XDHJ9RkS2/gOZQMKGrMmI.qr4LEgujWRcT0HNLVpvZIxZWQhJRVnS', NULL, 'jggardon@student.apc.edu.ph', 10, 1470552319, 1470552319);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL),
('instructor', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can create course', NULL, NULL, NULL, NULL),
('create course', 1, 'allows user to create course', NULL, NULL, NULL, NULL),
('create grade', 1, 'allows user to create grade', NULL, NULL, NULL, NULL),
('create schedule', 1, 'allows user to create schedule', NULL, NULL, NULL, NULL),
('create student', 1, 'allow a user to create student', NULL, NULL, NULL, NULL),
('create task', 1, 'allows user to create task', NULL, NULL, NULL, NULL),
('instructor', 1, 'instructor can create grade, schedule and task', NULL, NULL, NULL, NULL),
('update course', 1, 'allow a user to update course', NULL, NULL, NULL, NULL),
('update grade', 1, 'allow a user to update grade', NULL, NULL, NULL, NULL),
('update schedule', 1, 'allow a user to update schedule', NULL, NULL, NULL, NULL),
('update student', 1, 'allow a user to update student', NULL, NULL, NULL, NULL),
('update task', 1, 'allow a user to update task', NULL, NULL, NULL, NULL),
('view course', 1, 'allow a user to view course', NULL, NULL, NULL, NULL),
('view grade', 1, 'allow a user to view grade', NULL, NULL, NULL, NULL),
('view schedule', 1, 'allow a user to view schedule', NULL, NULL, NULL, NULL),
('view student', 1, 'allow a user to view student', NULL, NULL, NULL, NULL),
('view task', 1, 'allow a user to view task', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create course'),
('admin', 'create student'),
('admin', 'view course'),
('admin', 'view student'),
('admin', 'view task'),
('instructor', 'create grade'),
('instructor', 'create schedule'),
('instructor', 'create task');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `subject`) VALUES
(1, 'High School Entrance Test Review ', 'Math'),
(2, 'Civil Service Examination Review', 'vocabulary'),
(3, 'Comprehensive College Entrance Test Review', 'general science and physics');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `employee_position` enum('Admin','Instructor') NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `gender` enum('F','M') NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email_address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_creates_course`
--

CREATE TABLE `employee_creates_course` (
  `employee_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_submits_grade`
--

CREATE TABLE `employee_submits_grade` (
  `employee_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `grade_student_id` int(11) NOT NULL,
  `grade_course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `homework` int(11) DEFAULT NULL,
  `exercise` int(11) DEFAULT NULL,
  `quiz` int(11) DEFAULT NULL,
  `grade_final` int(11) DEFAULT NULL,
  `attendance` varchar(7) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `receiver_name`, `receiver_email`, `subject`, `content`, `attachment`) VALUES
(1, 'jcheramia', 'johannaheramia@yahoo.com', 'try', 'asdfg', 'attachments/1470562107.sql');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1470451418),
('m130524_201442_init', 1470451421),
('m140506_102106_rbac_init', 1470554093);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `nickname` varchar(15) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `age` int(11) NOT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `contact_number` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `school` varchar(45) NOT NULL,
  `school_address` varchar(50) NOT NULL,
  `guardian_name` varchar(40) NOT NULL,
  `date_of_registration` date NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `lastname`, `firstname`, `middlename`, `nickname`, `gender`, `age`, `email_address`, `contact_number`, `address`, `school`, `school_address`, `guardian_name`, `date_of_registration`, `status`) VALUES
(1, 'jgtadeo', '123456789', 'Tadeo', 'Jose Lorenzo', 'Gonzales', 'Renzo', 'F', 18, 'jgtadeo@student.apc.edu.ph', 2147483647, 'Makati City', 'Asia Pacific College', 'Magallanes', 'Carol Tadeo', '0000-00-00', 'active'),
(2, 'hereyes', '123456789', 'Reyes', 'Hannah', 'Escobal', 'Hannah', 'F', 18, 'hereyes@yahoo.com', 2147483647, 'Makati City', 'Asia Pacific College', 'Magallanes', 'Hannah Reyes', '0000-00-00', 'inactive'),
(3, 'mlbelchez', '123456789', 'Belchez', 'Maica', 'Lucero', 'Maica', 'F', 18, 'animegirl@yahoo.com', 2147483647, 'Malibay', 'Asia Pacific College', 'Magallanes', 'Adela', '2016-08-09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `category`, `course_id`, `student_id`) VALUES
(1, 'Quiz 1', 'Quiz', 1, 2),
(2, 'Labwork', 'Quiz', 1, 1),
(3, 'quiz', 'Quiz', 3, 1),
(4, 'Midterm', 'Major Exam', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jcheramia', 'CqnbOmUqlqLRUVyqfKp31gYtH3izSPhw', '$2y$13$NWeZgRfWnuUbU/wQYaJ0wOKA/zopgdKBi6hEvW/xWzeYsjUGIwYxC', NULL, 'johannaheramia@yahoo.com', 10, 1470537921, 1470537921);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`admin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employee_creates_course`
--
ALTER TABLE `employee_creates_course`
  ADD PRIMARY KEY (`employee_id`,`course_id`),
  ADD KEY `fk_employee_has_course_course1_idx` (`course_id`),
  ADD KEY `fk_employee_has_course_employee1_idx` (`employee_id`);

--
-- Indexes for table `employee_submits_grade`
--
ALTER TABLE `employee_submits_grade`
  ADD PRIMARY KEY (`employee_id`,`grade_id`,`grade_student_id`,`grade_course_id`),
  ADD KEY `fk_employee_has_grade_grade1_idx` (`grade_id`,`grade_student_id`,`grade_course_id`),
  ADD KEY `fk_employee_has_grade_employee1_idx` (`employee_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`,`student_id`,`course_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_grade_student1_idx` (`student_id`),
  ADD KEY `fk_grade_course1_idx` (`course_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`,`student_id`,`course_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_schedule_student_idx` (`student_id`),
  ADD KEY `fk_schedule_course1_idx` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`,`course_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_task_course1_idx` (`course_id`),
  ADD KEY `fk_task_student1_idx` (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_creates_course`
--
ALTER TABLE `employee_creates_course`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_submits_grade`
--
ALTER TABLE `employee_submits_grade`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_creates_course`
--
ALTER TABLE `employee_creates_course`
  ADD CONSTRAINT `fk_employee_has_course_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_has_course_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee_submits_grade`
--
ALTER TABLE `employee_submits_grade`
  ADD CONSTRAINT `fk_employee_has_grade_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_has_grade_grade1` FOREIGN KEY (`grade_id`,`grade_student_id`,`grade_course_id`) REFERENCES `grade` (`id`, `student_id`, `course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fk_grade_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grade_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_schedule_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_schedule_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_task_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
