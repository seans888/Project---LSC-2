-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 04:01 PM
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
  `announcement` varchar(45) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_course_id` int(11) NOT NULL,
  `task_course_employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `status` varchar(45) DEFAULT NULL,
  `class_list_course_id` int(11) NOT NULL,
  `class_list_course_employee_id` int(11) NOT NULL,
  `class_list_student_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `id` int(11) NOT NULL,
  `choose` varchar(100) NOT NULL,
  `is_correct` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `course_id` int(11) NOT NULL,
  `course_employee_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `course_description` varchar(100) DEFAULT NULL,
  `time_created` time(6) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `course_description`, `time_created`, `date_created`, `employee_id`) VALUES
(6, 'MCSPROJ', 'Applied Projects 2', '838:59:59.999999', '2016-10-24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `age` varchar(45) NOT NULL,
  `gender` enum('Male','Female') CHARACTER SET utf32 NOT NULL,
  `cell_number` varchar(15) DEFAULT NULL,
  `email_add` varchar(100) DEFAULT NULL,
  `home_add` varchar(255) NOT NULL,
  `employee_type` enum('Admin','Professor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `middle_name`, `age`, `gender`, `cell_number`, `email_add`, `home_add`, `employee_type`) VALUES
(2, 'Johanna Marisse', 'Heramia', 'Credito', '18', 'Female', '09261523128', 'jcheramia@student.apc.edu.ph', 'P 53 - 20 12th 15th St., Villamor Air Base, Pasay City', 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1477217086),
('m130524_201442_init', 1477217090);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `ask` varchar(255) DEFAULT NULL,
  `task_id` int(11) NOT NULL,
  `task_course_id` int(11) NOT NULL,
  `task_course_employee_id` int(11) NOT NULL,
  `image` varbinary(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `feedback` varchar(100) NOT NULL,
  `min_grade` int(11) DEFAULT NULL,
  `max_grade` int(11) DEFAULT NULL,
  `stud_answer_choice_id` int(11) NOT NULL,
  `stud_answer_choice_question_id` int(11) NOT NULL,
  `stud_answer_student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `time` time(6) DEFAULT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `cell_number` varchar(15) DEFAULT NULL,
  `email_add` varchar(100) DEFAULT NULL,
  `home_add` varchar(255) DEFAULT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `middle_name`, `age`, `gender`, `cell_number`, `email_add`, `home_add`, `date_registered`) VALUES
(2, 'Jana Marie', 'Gardon', 'Gavarra', '18', 'Female', '09191231253', 'jggardon@student.apc.edu.ph', 'Taguig City', '2016-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `stud_answer`
--

CREATE TABLE `stud_answer` (
  `choice_id` int(11) NOT NULL,
  `choice_question_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_created` date DEFAULT NULL,
  `time_open` time(6) DEFAULT NULL,
  `date_open` date NOT NULL,
  `time_close` time(6) DEFAULT NULL,
  `task_type` enum('Quiz','Assignment','Exercise') DEFAULT NULL,
  `time_remaining` time(6) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `course_employee_id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `time_created` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jcheramia', '4qlUO6J_eWP5muCHjxypAA5CF3EwBYwM', '$2y$13$j33UwCp2LdMZKLosR/rcgueKSAowjxf1EE28NNQLMBUg1djhhHQjK', NULL, 'johannaheramia@gmail.com', 10, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'jggardon', 'yjTHLelZVEF-ulVt5sIfxmaWcH8B0XA3', '$2y$13$SqHyU1JfXo7TPJA4vrXM1eH7Vh8cA6K1NZqZNYQDOfWRik6004DTu', NULL, 'jggardon@student.apc.edu.ph', 10, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ann_calendar`
--
ALTER TABLE `ann_calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employee_has_task_employee1_idx` (`employee_id`),
  ADD KEY `fk_ann_calendar_task1_idx` (`task_id`,`task_course_id`,`task_course_employee_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`class_list_course_id`,`class_list_course_employee_id`,`class_list_student_id`,`schedule_id`),
  ADD KEY `fk_class_list_has_schedule_schedule1_idx` (`schedule_id`),
  ADD KEY `fk_class_list_has_schedule_class_list1_idx` (`class_list_course_id`,`class_list_course_employee_id`,`class_list_student_id`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`,`question_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_choice_question1_idx` (`question_id`);

--
-- Indexes for table `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`course_id`,`course_employee_id`,`student_id`),
  ADD KEY `fk_course_has_student_student1_idx` (`student_id`),
  ADD KEY `fk_course_has_student_course1_idx` (`course_id`,`course_employee_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`,`employee_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_course_employee_idx` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_question_task1_idx` (`task_id`,`task_course_id`,`task_course_employee_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`stud_answer_choice_id`,`stud_answer_choice_question_id`,`stud_answer_student_id`,`feedback`),
  ADD KEY `fk_result_stud_answer1_idx` (`stud_answer_choice_id`,`stud_answer_choice_question_id`,`stud_answer_student_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `first_name_UNIQUE` (`first_name`),
  ADD UNIQUE KEY `last_name_UNIQUE` (`last_name`),
  ADD UNIQUE KEY `age_UNIQUE` (`age`),
  ADD UNIQUE KEY `gender_UNIQUE` (`gender`),
  ADD UNIQUE KEY `home_add_UNIQUE` (`home_add`);

--
-- Indexes for table `stud_answer`
--
ALTER TABLE `stud_answer`
  ADD PRIMARY KEY (`choice_id`,`choice_question_id`,`student_id`),
  ADD KEY `fk_stud_answer_student1_idx` (`student_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`,`course_id`,`course_employee_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_task_course1_idx` (`course_id`,`course_employee_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ann_calendar`
--
ALTER TABLE `ann_calendar`
  ADD CONSTRAINT `fk_ann_calendar_task1` FOREIGN KEY (`task_id`,`task_course_id`,`task_course_employee_id`) REFERENCES `task` (`id`, `course_id`, `course_employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_has_task_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_class_list_has_schedule_class_list1` FOREIGN KEY (`class_list_course_id`,`class_list_course_employee_id`,`class_list_student_id`) REFERENCES `class_list` (`course_id`, `course_employee_id`, `student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_class_list_has_schedule_schedule1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `fk_choice_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class_list`
--
ALTER TABLE `class_list`
  ADD CONSTRAINT `fk_course_has_student_course1` FOREIGN KEY (`course_id`,`course_employee_id`) REFERENCES `course` (`id`, `employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course_has_student_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_task1` FOREIGN KEY (`task_id`,`task_course_id`,`task_course_employee_id`) REFERENCES `task` (`id`, `course_id`, `course_employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_result_stud_answer1` FOREIGN KEY (`stud_answer_choice_id`,`stud_answer_choice_question_id`,`stud_answer_student_id`) REFERENCES `stud_answer` (`choice_id`, `choice_question_id`, `student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stud_answer`
--
ALTER TABLE `stud_answer`
  ADD CONSTRAINT `fk_stud_answer_choice1` FOREIGN KEY (`choice_id`,`choice_question_id`) REFERENCES `choice` (`id`, `question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stud_answer_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_course1` FOREIGN KEY (`course_id`,`course_employee_id`) REFERENCES `course` (`id`, `employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
