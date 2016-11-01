-- MySQL Script generated by MySQL Workbench
-- 11/01/16 20:24:19
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
CREATE SCHEMA IF NOT EXISTS `lsc_lms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `lsc_lms` ;

-- -----------------------------------------------------
-- Table `lsc_lms`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `first_name` VARCHAR(30) NOT NULL COMMENT '',
  `last_name` VARCHAR(30) NOT NULL COMMENT '',
  `middle_name` VARCHAR(30) NULL COMMENT '',
  `age` VARCHAR(3) NOT NULL COMMENT '',
  `gender` ENUM('Female', 'Male') NOT NULL COMMENT '',
  `cell_number` VARCHAR(45) NULL COMMENT '',
  `email_add` VARCHAR(100) NULL COMMENT '',
  `home_add` VARCHAR(255) NOT NULL COMMENT '',
  `employee_type` ENUM('Tutor', 'Admin') NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`student` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `status` ENUM('reserved', 'enrolled', 'done', 'cancelled') NOT NULL COMMENT '',
  `number_of_hours` INT NULL COMMENT '',
  `review_class` ENUM('Senior High / College Entrance Review', 'High School Entrance Test / Science High School Review', 'Civil Service Exam Review', 'Law Aptitude Exam / Law School Admission Test Review', 'National Medical Admission Test Review') NOT NULL COMMENT '',
  `last_name` VARCHAR(30) NOT NULL COMMENT '',
  `first_name` VARCHAR(30) NOT NULL COMMENT '',
  `middle_name` VARCHAR(30) NULL COMMENT '',
  `nickname` VARCHAR(15) NOT NULL COMMENT '',
  `gender` ENUM('Female', 'Male') NOT NULL COMMENT '',
  `age` INT NOT NULL COMMENT '',
  `email_address` VARCHAR(100) NOT NULL COMMENT '',
  `contact_number` VARCHAR(30) NOT NULL COMMENT '',
  `address` VARCHAR(255) NOT NULL COMMENT '',
  `school` VARCHAR(100) NOT NULL COMMENT '',
  `school_address` VARCHAR(255) NOT NULL COMMENT '',
  `guardian_name` VARCHAR(100) NULL COMMENT '',
  `relation` VARCHAR(45) NULL COMMENT '',
  `guardian_contact_number` VARCHAR(30) NULL COMMENT '',
  `guardian_email_address` VARCHAR(255) NULL COMMENT '',
  `date_of_registration` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`course` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `title` VARCHAR(100) NOT NULL COMMENT '',
  `course_description` VARCHAR(200) NULL COMMENT '',
  `time_created` TIME(6) NULL COMMENT '',
  `date_created` DATE NULL COMMENT '',
  `employee_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `employee_id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_course_employee_idx` (`employee_id` ASC)  COMMENT '',
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
  `course_id` INT NOT NULL COMMENT '',
  `course_employee_id` INT NOT NULL COMMENT '',
  `student_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`course_id`, `course_employee_id`, `student_id`)  COMMENT '',
  INDEX `fk_course_has_student_student1_idx` (`student_id` ASC)  COMMENT '',
  INDEX `fk_course_has_student_course1_idx` (`course_id` ASC, `course_employee_id` ASC)  COMMENT '',
  CONSTRAINT `fk_course_has_student_course1`
    FOREIGN KEY (`course_id` , `course_employee_id`)
    REFERENCES `lsc_lms`.`course` (`id` , `employee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_has_student_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `lsc_lms`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`task` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `title` VARCHAR(100) NOT NULL COMMENT '',
  `description` VARCHAR(255) NULL COMMENT '',
  `task_type` ENUM('Exam', 'Quiz', 'Exercise', 'Assignment') NULL COMMENT '',
  `created` TIMESTAMP(6) NULL COMMENT '',
  `time_open` TIME(6) NULL COMMENT '',
  `time_close` TIME(6) NULL COMMENT '',
  `date_open` DATE NULL COMMENT '',
  `date_close` DATE NULL COMMENT '',
  `time_remaining` TIME(6) NULL COMMENT '',
  `attempts` INT NULL COMMENT '',
  `course_id` INT NOT NULL COMMENT '',
  `course_employee_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_task_course1_idx` (`course_id` ASC, `course_employee_id` ASC)  COMMENT '',
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
  `id` INT NOT NULL COMMENT '',
  `announcement` VARCHAR(50) NOT NULL COMMENT '',
  `employee_id` INT NOT NULL COMMENT '',
  `task_id` INT NOT NULL COMMENT '',
  INDEX `fk_employee_has_task_employee1_idx` (`employee_id` ASC)  COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_ann_calendar_task1_idx` (`task_id` ASC)  COMMENT '',
  CONSTRAINT `fk_employee_has_task_employee1`
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
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `ask` VARCHAR(255) NOT NULL COMMENT '',
  `image` VARBINARY(8000) NULL COMMENT '',
  `task_id` INT NOT NULL COMMENT '',
  `task_course_id` INT NOT NULL COMMENT '',
  `task_course_employee_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_question_task1_idx` (`task_id` ASC, `task_course_id` ASC, `task_course_employee_id` ASC)  COMMENT '',
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
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `choose` VARCHAR(255) NOT NULL COMMENT '',
  `is_correct` VARCHAR(255) NOT NULL COMMENT '',
  `question_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `question_id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_choice_question1_idx` (`question_id` ASC)  COMMENT '',
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
  `choice_id` INT NOT NULL COMMENT '',
  `choice_question_id` INT NOT NULL COMMENT '',
  `student_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`choice_id`, `choice_question_id`, `student_id`)  COMMENT '',
  INDEX `fk_stud_answer_student1_idx` (`student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_stud_answer_choice1`
    FOREIGN KEY (`choice_id` , `choice_question_id`)
    REFERENCES `lsc_lms`.`choice` (`id` , `question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stud_answer_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `lsc_lms`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`schedule` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `time` TIME(6) NOT NULL COMMENT '',
  `day` ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday') NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`attendance` (
  `status` ENUM('Absent', 'Late', 'Excuse', 'Present') NOT NULL COMMENT '',
  `class_list_course_id` INT NOT NULL COMMENT '',
  `class_list_course_employee_id` INT NOT NULL COMMENT '',
  `class_list_student_id` INT NOT NULL COMMENT '',
  `schedule_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`class_list_course_id`, `class_list_course_employee_id`, `class_list_student_id`, `schedule_id`)  COMMENT '',
  INDEX `fk_class_list_has_schedule_schedule1_idx` (`schedule_id` ASC)  COMMENT '',
  INDEX `fk_class_list_has_schedule_class_list1_idx` (`class_list_course_id` ASC, `class_list_course_employee_id` ASC, `class_list_student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_class_list_has_schedule_class_list1`
    FOREIGN KEY (`class_list_course_id` , `class_list_course_employee_id` , `class_list_student_id`)
    REFERENCES `lsc_lms`.`class_list` (`course_id` , `course_employee_id` , `student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_list_has_schedule_schedule1`
    FOREIGN KEY (`schedule_id`)
    REFERENCES `lsc_lms`.`schedule` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`result`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`result` (
  `feedback` VARCHAR(255) NOT NULL COMMENT '',
  `min_grade` INT NULL COMMENT '',
  `max_grade` INT NULL COMMENT '',
  `stud_answer_choice_id` INT NOT NULL COMMENT '',
  `stud_answer_choice_question_id` INT NOT NULL COMMENT '',
  `stud_answer_student_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`feedback`)  COMMENT '',
  INDEX `fk_result_stud_answer1_idx` (`stud_answer_choice_id` ASC, `stud_answer_choice_question_id` ASC, `stud_answer_student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_result_stud_answer1`
    FOREIGN KEY (`stud_answer_choice_id` , `stud_answer_choice_question_id` , `stud_answer_student_id`)
    REFERENCES `lsc_lms`.`stud_answer` (`choice_id` , `choice_question_id` , `student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
