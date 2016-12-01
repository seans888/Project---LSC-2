-- MySQL Script generated by MySQL Workbench
-- 12/01/16 10:36:49
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema lsc_lms
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lsc_lms
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lsc_lms` DEFAULT CHARACTER SET utf8 ;
USE `lsc_lms` ;

-- -----------------------------------------------------
-- Table `lsc_lms`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`employee` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `auth_key` VARCHAR(32) NULL,
  `password_hash` VARCHAR(255) NULL,
  `password_reset_token` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `status` SMALLINT(6) NULL,
  `created_at` INT(11) NULL,
  `updated_at` INT(11) NULL,
  `first_name` VARCHAR(30) NOT NULL,
  `middle_name` VARCHAR(30) NULL,
  `last_name` VARCHAR(30) NOT NULL,
  `gender` ENUM('Female', 'Male') NOT NULL,
  `age` VARCHAR(3) NOT NULL,
  `contact_number` VARCHAR(30) NULL,
  `home_add` VARCHAR(255) NOT NULL,
  `employee_type` ENUM('Tutor', 'Admin') NULL,
  `image` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `created_at_UNIQUE` (`created_at` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `auth_key` VARCHAR(32) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `password_reset_token` VARCHAR(255) NULL,
  `email` VARCHAR(255) NOT NULL,
  `created_at` INT(11) NOT NULL,
  `status` SMALLINT(6) NOT NULL,
  `updated_at` INT(11) NOT NULL,
  `review_class` ENUM('Senior High / College Entrance Review', 'High School Entrance Test / Science High School Review', 'Civil Service Exam Review', 'Law Aptitude Exam / Law School Admission Test Review', 'National Medical Admission Test Review') NOT NULL,
  `first_name` VARCHAR(30) NOT NULL,
  `middle_name` VARCHAR(30) NULL,
  `last_name` VARCHAR(30) NOT NULL,
  `gender` ENUM('Female', 'Male') NOT NULL,
  `contact_number` VARCHAR(30) NOT NULL,
  `home_address` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `course_description` VARCHAR(200) NULL,
  `time_created` TIME(6) NULL,
  `date_created` DATE NULL,
  `employee_id` INT NOT NULL,
  PRIMARY KEY (`id`, `employee_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_course_employee_idx` (`employee_id` ASC),
  CONSTRAINT `fk_course_employee`
    FOREIGN KEY (`employee_id`)
    REFERENCES `lsc_lms`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`class_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`class_list` (
  `course_id` INT NOT NULL,
  `course_employee_id` INT NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`course_id`, `course_employee_id`, `user_id`),
  INDEX `fk_course_has_student_course1_idx` (`course_id` ASC, `course_employee_id` ASC),
  INDEX `fk_class_list_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_course_has_student_course1`
    FOREIGN KEY (`course_id` , `course_employee_id`)
    REFERENCES `lsc_lms`.`course` (`id` , `employee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_list_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`task` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` VARCHAR(150) NULL,
  `task_type` ENUM('Exam', 'Quiz', 'Exercise', 'Assignment') NULL,
  `created` TIMESTAMP(6) NULL,
  `time_open` TIME(6) NULL,
  `time_close` TIME(6) NULL,
  `date_open` DATE NULL,
  `date_close` DATE NULL,
  `time_remaining` TIME(6) NULL,
  `attempts` INT NULL,
  `course_id` INT NOT NULL,
  `course_employee_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_task_course1_idx` (`course_id` ASC, `course_employee_id` ASC),
  CONSTRAINT `fk_task_course1`
    FOREIGN KEY (`course_id` , `course_employee_id`)
    REFERENCES `lsc_lms`.`course` (`id` , `employee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`ann_calendar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`ann_calendar` (
  `id` INT NOT NULL,
  `announcement` VARCHAR(50) NOT NULL,
  `employee_id` INT(11) NOT NULL,
  `task_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ann_calendar_employee1_idx` (`employee_id` ASC),
  INDEX `fk_ann_calendar_task1_idx` (`task_id` ASC),
  CONSTRAINT `fk_ann_calendar_employee1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `lsc_lms`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ann_calendar_task1`
    FOREIGN KEY (`task_id`)
    REFERENCES `lsc_lms`.`task` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`question` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ask` VARCHAR(255) NOT NULL,
  `image` VARBINARY(8000) NULL,
  `task_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_question_task1_idx` (`task_id` ASC),
  CONSTRAINT `fk_question_task1`
    FOREIGN KEY (`task_id`)
    REFERENCES `lsc_lms`.`task` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`choice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`choice` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `choose` VARCHAR(255) NOT NULL,
  `is_correct` VARCHAR(255) NOT NULL,
  `question_id` INT NOT NULL,
  PRIMARY KEY (`id`, `question_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_choice_question1_idx` (`question_id` ASC),
  CONSTRAINT `fk_choice_question1`
    FOREIGN KEY (`question_id`)
    REFERENCES `lsc_lms`.`question` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`stud_answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`stud_answer` (
  `choice_id` INT NOT NULL,
  `choice_question_id` INT NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`choice_id`, `choice_question_id`, `user_id`),
  INDEX `fk_stud_answer_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_stud_answer_choice1`
    FOREIGN KEY (`choice_id` , `choice_question_id`)
    REFERENCES `lsc_lms`.`choice` (`id` , `question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stud_answer_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`schedule` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subject` VARCHAR(100) NOT NULL,
  `day` ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday') NOT NULL,
  `schedule` VARCHAR(17) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`attendance` (
  `status` ENUM('Absent', 'Late', 'Excuse', 'Present') NOT NULL,
  `class_list_course_id` INT NOT NULL,
  `class_list_course_employee_id` INT NOT NULL,
  `class_list_user_id` INT(11) NOT NULL,
  `schedule_id` INT NOT NULL,
  PRIMARY KEY (`class_list_course_id`, `class_list_course_employee_id`, `class_list_user_id`, `schedule_id`),
  INDEX `fk_attendance_schedule1_idx` (`schedule_id` ASC),
  CONSTRAINT `fk_attendance_class_list1`
    FOREIGN KEY (`class_list_course_id` , `class_list_course_employee_id` , `class_list_user_id`)
    REFERENCES `lsc_lms`.`class_list` (`course_id` , `course_employee_id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_attendance_schedule1`
    FOREIGN KEY (`schedule_id`)
    REFERENCES `lsc_lms`.`schedule` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`result`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`result` (
  `feedback` VARCHAR(255) NOT NULL,
  `score` INT NOT NULL,
  `grade` INT NOT NULL,
  `min_grade` INT NULL,
  `max_grade` INT NULL,
  `stud_answer_choice_id` INT NOT NULL,
  `stud_answer_choice_question_id` INT NOT NULL,
  `stud_answer_user_id` INT(11) NOT NULL,
  PRIMARY KEY (`feedback`),
  INDEX `fk_result_stud_answer1_idx` (`stud_answer_choice_id` ASC, `stud_answer_choice_question_id` ASC, `stud_answer_user_id` ASC),
  CONSTRAINT `fk_result_stud_answer1`
    FOREIGN KEY (`stud_answer_choice_id` , `stud_answer_choice_question_id` , `stud_answer_user_id`)
    REFERENCES `lsc_lms`.`stud_answer` (`choice_id` , `choice_question_id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_rule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_rule` (
  `name` VARCHAR(64) NOT NULL,
  `data` TEXT(100) NULL,
  `created_at` DATE NULL,
  `updated_at` DATE NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_item` (
  `name` VARCHAR(64) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `description` TEXT(100) NULL,
  `data` TEXT(100) NULL,
  `created_at` DATE NULL,
  `updated_at` DATE NULL,
  `auth_rule_name` VARCHAR(64) NULL,
  PRIMARY KEY (`name`),
  INDEX `fk_auth_item_auth_rule1_idx` (`auth_rule_name` ASC),
  CONSTRAINT `fk_auth_item_auth_rule1`
    FOREIGN KEY (`auth_rule_name`)
    REFERENCES `lsc_lms`.`auth_rule` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_assignment` (
  `user_id` INT(11) NOT NULL,
  `auth_item_name` VARCHAR(64) NOT NULL,
  `created_at` DATE NULL,
  PRIMARY KEY (`user_id`, `auth_item_name`),
  INDEX `fk_auth_assignment_auth_item1_idx` (`auth_item_name` ASC),
  CONSTRAINT `fk_auth_assignment_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auth_assignment_auth_item1`
    FOREIGN KEY (`auth_item_name`)
    REFERENCES `lsc_lms`.`auth_item` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_item_child`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_item_child` (
  `auth_item_name` VARCHAR(64) NOT NULL,
  `auth_item_name1` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`auth_item_name`, `auth_item_name1`),
  INDEX `fk_auth_item_has_auth_item_auth_item2_idx` (`auth_item_name1` ASC),
  INDEX `fk_auth_item_has_auth_item_auth_item1_idx` (`auth_item_name` ASC),
  CONSTRAINT `fk_auth_item_has_auth_item_auth_item1`
    FOREIGN KEY (`auth_item_name`)
    REFERENCES `lsc_lms`.`auth_item` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auth_item_has_auth_item_auth_item2`
    FOREIGN KEY (`auth_item_name1`)
    REFERENCES `lsc_lms`.`auth_item` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
