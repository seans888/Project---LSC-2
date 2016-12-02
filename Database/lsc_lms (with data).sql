-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 12:03 PM
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
  `employee_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `status` enum('Absent','Late','Excuse','Present') NOT NULL,
  `class_list_course_id` int(11) NOT NULL,
  `class_list_course_employee_id` int(11) NOT NULL,
  `class_list_user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `user_id` int(11) DEFAULT NULL,
  `auth_item_name` varchar(64) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`user_id`, `auth_item_name`, `created_at`, `employee_id`) VALUES
(1, 'student', NULL, NULL),
(2, 'student', NULL, NULL),
(3, 'student', NULL, NULL),
(NULL, 'admin', NULL, 1),
(NULL, 'instructor', NULL, 2),
(NULL, 'instructor', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` text,
  `data` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `auth_rule_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `data`, `created_at`, `updated_at`, `auth_rule_name`) VALUES
('add-course', '2', NULL, NULL, NULL, NULL, NULL),
('add-task', '2', NULL, NULL, NULL, NULL, NULL),
('admin', '1', 'Group for ADMINS', NULL, NULL, NULL, NULL),
('delete-course', '2', NULL, NULL, NULL, NULL, NULL),
('delete-student', '2', NULL, NULL, NULL, NULL, NULL),
('delete-task', '2', NULL, NULL, NULL, NULL, NULL),
('instructor', '1', 'Group for INSTRUCTORS', NULL, NULL, NULL, NULL),
('student', '1', 'Group for STUDENTS', NULL, NULL, NULL, NULL),
('take-task', '2', NULL, NULL, NULL, NULL, NULL),
('update-course', '2', NULL, NULL, NULL, NULL, NULL),
('update-student', '2', NULL, NULL, NULL, NULL, NULL),
('update-task', '2', NULL, NULL, NULL, NULL, NULL),
('view-course', '2', NULL, NULL, NULL, NULL, NULL),
('view-grade', '2', NULL, NULL, NULL, NULL, NULL),
('view-student', '2', NULL, NULL, NULL, NULL, NULL),
('view-task', '2', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `auth_item_name` varchar(64) NOT NULL,
  `auth_item_name1` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`auth_item_name`, `auth_item_name1`) VALUES
('instructor', 'add-course'),
('instructor', 'add-task'),
('instructor', 'delete-course'),
('instructor', 'delete-task'),
('instructor', 'update-course'),
('instructor', 'update-task'),
('instructor', 'view-course'),
('instructor', 'view-grade'),
('instructor', 'view-student'),
('instructor', 'view-task'),
('student', 'take-task'),
('student', 'update-student'),
('student', 'view-course'),
('student', 'view-grade'),
('student', 'view-student'),
('student', 'view-task');

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

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `id` int(11) NOT NULL,
  `choose` varchar(255) NOT NULL,
  `is_correct` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `course_id` int(11) NOT NULL,
  `course_employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course_description` varchar(200) DEFAULT NULL,
  `time_created` time(6) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `age` varchar(3) NOT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `home_add` varchar(255) NOT NULL,
  `employee_type` enum('Tutor','Admin') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `middle_name`, `last_name`, `gender`, `age`, `contact_number`, `home_add`, `employee_type`, `image`) VALUES
(1, 'jcheramia', 'OIhTdMfQVcUNZwcjnICLyo0R3c9pdbLs', '$2y$13$qLvmL/cXYgap2YmlWZ6Pvep4uwKErB3Cjkom4EyWHU60ejaSQk.FS', NULL, 'jcheramia@student.apc.edu.ph', 10, 1480675786, 1480675786, 'Johanna Marisse', 'Credito', 'Heramia', 'Female', '19', '09261523128', 'P 53 - 20 12th 15th St., Villamor Air Base Pasay, City', 'Admin', NULL),
(2, 'jggardon', 'S26n8F2xCCvf1x_zUJt13uhrzOueeNdg', '$2y$13$cw4CA2.crQLzbKGXJhy5/ez2Jtwcnv.S0mB/E0B2KLQcSJlk1dxWC', NULL, 'jggardon@student.apc.edu.ph', 10, 1480675867, 1480675867, 'Jana Marie', 'Gavarra', 'Gardon', 'Female', '18', '09064902062', 'Mb 16 Unit 507 BCDA Silang Village, USUSAN, Taguig City', 'Tutor', NULL),
(3, 'jgtadeo', 'TFjQKLXiU0zFo-QxY_j7xH82MpKoqyhn', '$2y$13$wcEoEwJuZG43HgDuuUjyF.i1MumolCd/3EROtk9rqocrrbg8lC/Ju', NULL, 'jgtadeo@yahoo.com', 10, 1480675903, 1480675903, 'Jose Lorenzo', 'Gonzales', 'Tadeo', 'Male', '19', '09354811320', '8291  B. Dapitan ST., Guadalupe Nuevo, Makati City', 'Tutor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `ask` varchar(255) NOT NULL,
  `image` varbinary(8000) DEFAULT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

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
  `stud_answer_choice_id` int(11) NOT NULL,
  `stud_answer_choice_question_id` int(11) NOT NULL,
  `stud_answer_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `schedule` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `stud_answer`
--

CREATE TABLE `stud_answer` (
  `choice_id` int(11) NOT NULL,
  `choice_question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
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
  `created` timestamp(6) NULL DEFAULT NULL,
  `time_open` time(6) DEFAULT NULL,
  `time_close` time(6) DEFAULT NULL,
  `date_open` date DEFAULT NULL,
  `date_close` date DEFAULT NULL,
  `time_remaining` time(6) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `course_employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `review_class` enum('Senior High / College Entrance Review','High School Entrance Test / Science High School Review','Civil Service Exam Review','Law Aptitude Exam / Law School Admission Test Review','National Medical Admission Test Review') NOT NULL,
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

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `created_at`, `status`, `updated_at`, `review_class`, `first_name`, `middle_name`, `last_name`, `gender`, `contact_number`, `home_address`, `image`) VALUES
(1, 'jcheramia', 'v9SCwzFBXpb0YAdYKRpOVQnFjRW6OKvl', '$2y$13$8mnY7S5d9TnD6n.PRk0HUODuS8jKztuYfATdtuXrwUPlVIgZOPNpK', NULL, 'jcheramia@student.apc.edu.ph', 1480675689, 10, 1480675689, 'Senior High / College Entrance Review', 'Johanna Marisse', 'Credito', 'Heramia', 'Female', '09261523128', 'P 53 - 20 12th 15th St., Villamor Air Base, Pasay City', ''),
(2, 'jggardon', 'vItdpiBtsXqvEVwS2feDWI3EgREtJaHd', '$2y$13$zdi.3jdLN0z6I/VH0jRF8uoEx49XvBMhz.euBIdUtzXUxpQO2XYgW', NULL, 'jggardon@student.apc.edu.ph', 1480675717, 10, 1480675717, 'High School Entrance Test / Science High School Review', 'Jana Marie', 'Gavarra', 'Gardon', 'Female', '09061234567', 'Mb 16 Unit 507 BCDA Silang Village, USUSAN, Taguig City', ''),
(3, 'jgtadeo', 'hToCY1nEdo1pN3HWXnNJmm7sPeUFe43l', '$2y$13$ymL8ywbWHm.bF1Fhx3HlPOIsUnoIkudELydUVOQjzj9wEDZsG.QC.', NULL, 'jgtadeo@student.apc.edu.ph', 1480675745, 10, 1480675745, 'National Medical Admission Test Review', 'Jose Lorenzo', 'Gonzales', 'Tadeo', 'Female', '09354811320', 'Guadalupe Makati City', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ann_calendar`
--
ALTER TABLE `ann_calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ann_calendar_employee1_idx` (`employee_id`),
  ADD KEY `fk_ann_calendar_task1_idx` (`task_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`class_list_course_id`,`class_list_course_employee_id`,`class_list_user_id`,`schedule_id`),
  ADD KEY `fk_attendance_schedule1_idx` (`schedule_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD KEY `fk_auth_assignment_auth_item1_idx` (`auth_item_name`),
  ADD KEY `fk_auth_assignment_employee1_idx` (`employee_id`),
  ADD KEY `fk_auth_assignment_user1` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `fk_auth_item_auth_rule1_idx` (`auth_rule_name`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`auth_item_name`,`auth_item_name1`),
  ADD KEY `fk_auth_item_has_auth_item_auth_item2_idx` (`auth_item_name1`),
  ADD KEY `fk_auth_item_has_auth_item_auth_item1_idx` (`auth_item_name`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

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
  ADD PRIMARY KEY (`course_id`,`course_employee_id`,`user_id`),
  ADD KEY `fk_course_has_student_course1_idx` (`course_id`,`course_employee_id`),
  ADD KEY `fk_class_list_user1_idx` (`user_id`);

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
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `created_at_UNIQUE` (`created_at`);

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
  ADD KEY `fk_result_stud_answer1_idx` (`stud_answer_choice_id`,`stud_answer_choice_question_id`,`stud_answer_user_id`);

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
  ADD PRIMARY KEY (`choice_id`,`choice_question_id`,`user_id`),
  ADD KEY `fk_stud_answer_user1_idx` (`user_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_task_course1_idx` (`course_id`,`course_employee_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ann_calendar`
--
ALTER TABLE `ann_calendar`
  ADD CONSTRAINT `fk_ann_calendar_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ann_calendar_task1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_class_list1` FOREIGN KEY (`class_list_course_id`,`class_list_course_employee_id`,`class_list_user_id`) REFERENCES `class_list` (`course_id`, `course_employee_id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_attendance_schedule1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `fk_auth_assignment_auth_item1` FOREIGN KEY (`auth_item_name`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auth_assignment_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auth_assignment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `fk_auth_item_auth_rule1` FOREIGN KEY (`auth_rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `fk_auth_item_has_auth_item_auth_item1` FOREIGN KEY (`auth_item_name`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auth_item_has_auth_item_auth_item2` FOREIGN KEY (`auth_item_name1`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `fk_choice_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class_list`
--
ALTER TABLE `class_list`
  ADD CONSTRAINT `fk_class_list_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course_has_student_course1` FOREIGN KEY (`course_id`,`course_employee_id`) REFERENCES `course` (`id`, `employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_task1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_result_stud_answer1` FOREIGN KEY (`stud_answer_choice_id`,`stud_answer_choice_question_id`,`stud_answer_user_id`) REFERENCES `stud_answer` (`choice_id`, `choice_question_id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stud_answer`
--
ALTER TABLE `stud_answer`
  ADD CONSTRAINT `fk_stud_answer_choice1` FOREIGN KEY (`choice_id`,`choice_question_id`) REFERENCES `choice` (`id`, `question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stud_answer_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_course1` FOREIGN KEY (`course_id`,`course_employee_id`) REFERENCES `course` (`id`, `employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
