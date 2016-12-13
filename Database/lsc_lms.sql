-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 06:10 PM
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
-- Table structure for table `ann_calendar`
--

CREATE TABLE `ann_calendar` (
  `id` int(11) NOT NULL,
  `announcement` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `status` enum('Absent','Late','Excuse','Present') NOT NULL,
  `class_list_user_id` int(11) NOT NULL,
  `class_list_course_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `user_id` int(11) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`user_id`, `item_name`, `created_at`) VALUES
(2016001, 'students', NULL),
(2016002, 'students', NULL),
(2016003, 'instructors', '2016-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `data` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `data`, `created_at`, `updated_at`, `rule_name`) VALUES
('add-classlist', 2, NULL, NULL, '2016-12-11', '2016-12-11', NULL),
('add-course', 2, NULL, NULL, '2016-12-07', '2016-12-07', NULL),
('add-student-to-course', 2, NULL, NULL, '2016-12-13', '2016-12-13', NULL),
('add-task', 2, NULL, NULL, '2016-12-11', '2016-12-11', NULL),
('add-user', 2, NULL, NULL, '2016-12-12', '2016-12-12', NULL),
('check-attendance', 2, NULL, NULL, '2016-12-11', '2016-12-11', NULL),
('delete-course', 2, NULL, NULL, '2016-12-12', '2016-12-12', NULL),
('instructors', 1, 'Group for instructors', NULL, '2016-12-07', '2016-12-07', NULL),
('students', 1, 'Group for students', NULL, '2016-12-07', '2016-12-07', NULL),
('update-course', 2, NULL, NULL, '2016-12-07', '2016-12-07', NULL),
('update-schedule', 2, NULL, NULL, '2016-12-11', '2016-12-11', NULL),
('view-course', 2, NULL, NULL, '2016-12-07', '2016-12-07', 'view-own-course'),
('view-own-courses', 2, NULL, NULL, '2016-12-12', '2016-12-12', NULL),
('view-task', 2, NULL, NULL, '2016-12-14', '2016-12-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('instructors', 'add-classlist'),
('instructors', 'add-course'),
('instructors', 'add-student-to-course'),
('instructors', 'add-task'),
('instructors', 'check-attendance'),
('instructors', 'delete-course'),
('instructors', 'update-course'),
('instructors', 'view-course'),
('instructors', 'view-own-courses'),
('students', 'view-course'),
('students', 'view-task');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('view-own-course', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `id` int(11) NOT NULL,
  `choose` varchar(255) NOT NULL,
  `is_correct` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`user_id`, `course_id`) VALUES
(2016001, 1),
(2016002, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course_description` varchar(200) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `course_description`, `date_created`, `user_id`) VALUES
(1, 'High School Entrance Test / Science High School Review', '', '2016-12-13', 2016003);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `middle_name`, `last_name`, `contact_number`, `home_address`, `image`) VALUES
(2016001, 'jcheramia', 'Ziun3IPUjiumjVeeOs-OCNHXP595o8vu', '$2y$13$j43vJIxEvKmf/z44mablT.BMM1.GjCmUxQ72DF.DJ3iwuixw9YIBm', NULL, 'jcheramia@student.apc.edu.ph', 10, '0000-00-00', '0000-00-00', 'Johanna Marisse', 'Credito', 'Heramia', '09261523128', 'P 53 - 20 12th 15th St., Villamor Air Base, Pasay City', NULL),
(2016002, 'jgtadeo', 'DOW9VuZJgS_Z6QC-cuT3-U3BalKcOBZq', '$2y$13$F2JLnG8LZ2aHEdnp8sZnYeYvlCSe6UDya54ubaT1v9larjdI5cEvC', NULL, 'jgtadeo@student.apc.edu.ph', 10, '0000-00-00', '0000-00-00', 'Jose Lorenzo', 'Gonzales', 'Tadeo', '09354811320', 'Makati', NULL),
(2016003, 'jggardon', 'bAsXQPzqUOOEzoGGH5xYcK8Xt1ozQAQz', '$2y$13$17gKuVz31mCwUqlgIlf1aOyWtcwbYqg4/SquiqgFDrqD3K4nt0lDa', NULL, 'jggardon@student.apc.edu.ph', 10, '0000-00-00', '0000-00-00', 'Jana Marie', 'Gavarra', 'Gardon', '09064902062', 'Taguig', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `answer2` varchar(255) DEFAULT NULL,
  `answer3` varchar(255) DEFAULT NULL,
  `answer4` varchar(255) DEFAULT NULL,
  `answer5` varchar(255) DEFAULT NULL,
  `answer6` varchar(255) DEFAULT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `answer`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `task_id`) VALUES
(3, 'What is the question all about?', 'me', 'you', 'me', 'us', 'forever', '4 lang sapat na', 2),
(4, 'What is your final grade?', '4', '1', 'R', '2', '3', '4 lang sapat na', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `min_grade` int(11) DEFAULT NULL,
  `max_grade` int(11) DEFAULT NULL,
  `stud_answer_id` int(11) DEFAULT NULL,
  `stud_answer_question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `schedule` varchar(17) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `stud_answer`
--

CREATE TABLE `stud_answer` (
  `id` int(11) NOT NULL,
  `user_answer` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `answers` varchar(255) DEFAULT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `task_type` enum('Exam','Quiz','Exercise','Assignment') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `time_open` time(6) DEFAULT NULL,
  `time_close` time(6) DEFAULT NULL,
  `date_open` date DEFAULT NULL,
  `date_close` date DEFAULT NULL,
  `time_remaining` time(6) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `task_type`, `date_created`, `time_open`, `time_close`, `date_open`, `date_close`, `time_remaining`, `attempts`, `course_id`) VALUES
(1, 'try', 'try desc', 'Exam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Final exam on BEHASCI', '', 'Quiz', '2016-12-13', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Short qyuz', '', 'Quiz', '2016-12-13', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Task sample', 'task description', 'Exam', '2016-12-13', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `middle_name`, `last_name`, `gender`, `contact_number`, `home_address`, `image`) VALUES
(2016001, 'jcheramia', 'HOemqsXQN0szGxlb_oxVy2615M8Nkavz', '$2y$13$RJwvzSkRavQlO12Iq71RK.Sc9MVSiB8t2DJD/6X/EiPACowOdFBee', NULL, 'jcheramia@student.apc.edu.ph', 10, '0000-00-00', '0000-00-00', 'Johanna Marisse', 'Credito', 'Heramia', 'Female', '09261523128', 'P 53 - 20 12th 15th St., Villamor Air Base, Pasay City', ''),
(2016002, 'jgtadeo', 'HGkJFwHOI1w1jOiP_rRBo7f3m_-mQ1R-', '$2y$13$o1lDOhGkHZrudmQsmvLZpejV5vk0pHyfzyEfUBaD1pf8V88LzPo.K', NULL, 'jgtadeo@student.apc.edu.ph', 10, '0000-00-00', '0000-00-00', 'Jose Lorenzo', 'Gonzales', 'Tadeo', 'Male', '09354811320', '8291 B Dapitan St., Guadalupe Nuevo, MAkati City', ''),
(2016003, 'jggardon', '2sIYMkshMU48Rf8_6mbSgbFGm0QNg7N1', '$2y$13$6WUeZ8/LTjsdZox/IsWVj.t4TKzCtAoijtCSMh.l55NmDsp5CnlOC', NULL, 'jggardon@student.apc.edu.ph', 10, '0000-00-00', '0000-00-00', 'Jana Marie', 'Gavarra', 'Gardon', 'Female', '09061234567', 'Mb 16 Unit 507 BCDA Silang Village, USUSAN, Taguig City', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ann_calendar`
--
ALTER TABLE `ann_calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ann_calendar_user1_idx` (`user_id`),
  ADD KEY `fk_ann_calendar_task1_idx` (`task_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`class_list_user_id`,`class_list_course_id`,`schedule_id`),
  ADD KEY `fk_attendance_schedule1_idx` (`schedule_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`user_id`,`item_name`),
  ADD KEY `fk_auth_assignment_auth_item1_idx` (`item_name`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `fk_auth_item_auth_rule1_idx` (`rule_name`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `fk_auth_item_has_auth_item_auth_item2_idx` (`child`),
  ADD KEY `fk_auth_item_has_auth_item_auth_item1_idx` (`parent`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`user_id`,`course_id`),
  ADD KEY `fk_class_list_course1_idx` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_course_user_idx` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_question_task1_idx` (`task_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_result_stud_answer1_idx` (`stud_answer_id`,`stud_answer_question_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `stud_answer`
--
ALTER TABLE `stud_answer`
  ADD PRIMARY KEY (`id`,`question_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_stud_answer_question1_idx` (`question_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_task_course1_idx` (`course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016004;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stud_answer`
--
ALTER TABLE `stud_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016004;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ann_calendar`
--
ALTER TABLE `ann_calendar`
  ADD CONSTRAINT `fk_ann_calendar_task1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ann_calendar_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_class_list1` FOREIGN KEY (`class_list_user_id`,`class_list_course_id`) REFERENCES `class_list` (`user_id`, `course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_attendance_schedule1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `fk_auth_assignment_auth_item1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auth_assignment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `fk_auth_item_auth_rule1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `fk_auth_item_has_auth_item_auth_item1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auth_item_has_auth_item_auth_item2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class_list`
--
ALTER TABLE `class_list`
  ADD CONSTRAINT `fk_class_list_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_class_list_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_task1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_result_stud_answer1` FOREIGN KEY (`stud_answer_id`,`stud_answer_question_id`) REFERENCES `stud_answer` (`id`, `question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stud_answer`
--
ALTER TABLE `stud_answer`
  ADD CONSTRAINT `fk_stud_answer_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
