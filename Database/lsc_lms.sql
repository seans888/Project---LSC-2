-- MySQL Script generated by MySQL Workbench
-- 12/06/16 09:12:34
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
-- Table `lsc_lms`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `username` VARCHAR(50) NOT NULL COMMENT '',
  `auth_key` VARCHAR(32) NOT NULL COMMENT '',
  `password_hash` VARCHAR(255) NOT NULL COMMENT '',
  `password_reset_token` VARCHAR(255) NULL COMMENT '',
  `email` VARCHAR(200) NOT NULL COMMENT '',
  `status` SMALLINT(6) NOT NULL COMMENT '',
  `created_at` DATE NOT NULL COMMENT '',
  `updated_at` DATE NOT NULL COMMENT '',
  `first_name` VARCHAR(30) NOT NULL COMMENT '',
  `middle_name` VARCHAR(30) NULL COMMENT '',
  `last_name` VARCHAR(30) NOT NULL COMMENT '',
  `gender` ENUM('Female', 'Male') NOT NULL COMMENT '',
  `contact_number` VARCHAR(30) NOT NULL COMMENT '',
  `home_address` VARCHAR(255) NOT NULL COMMENT '',
  `image` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`course` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(100) NOT NULL COMMENT '',
  `course_description` VARCHAR(200) NULL COMMENT '',
  `date_created` DATE NULL COMMENT '',
  `user_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_course_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_course_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`class_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`class_list` (
  `user_id` INT(11) NOT NULL COMMENT '',
  `course_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `course_id`)  COMMENT '',
  INDEX `fk_class_list_course1_idx` (`course_id` ASC)  COMMENT '',
  CONSTRAINT `fk_class_list_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_list_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `lsc_lms`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`task` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `title` VARCHAR(100) NOT NULL COMMENT '',
  `description` VARCHAR(150) NULL COMMENT '',
  `task_type` ENUM('Exam', 'Quiz', 'Exercise', 'Assignment') NULL COMMENT '',
  `date_created` DATE NULL COMMENT '',
  `time_open` TIME(6) NULL COMMENT '',
  `time_close` TIME(6) NULL COMMENT '',
  `date_open` DATE NULL COMMENT '',
  `date_close` DATE NULL COMMENT '',
  `time_remaining` TIME(6) NULL COMMENT '',
  `attempts` INT NULL COMMENT '',
  `course_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_task_course1_idx` (`course_id` ASC)  COMMENT '',
  CONSTRAINT `fk_task_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `lsc_lms`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`ann_calendar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`ann_calendar` (
  `id` INT NOT NULL COMMENT '',
  `announcement` VARCHAR(50) NOT NULL COMMENT '',
  `user_id` INT NULL COMMENT '',
  `task_id` INT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_ann_calendar_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_ann_calendar_task1_idx` (`task_id` ASC)  COMMENT '',
  CONSTRAINT `fk_ann_calendar_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
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
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_question_task1_idx` (`task_id` ASC)  COMMENT '',
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
  `user_id` INT NOT NULL COMMENT '',
  `choice_id` INT NOT NULL COMMENT '',
  `choice_question_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `choice_id`, `choice_question_id`)  COMMENT '',
  INDEX `fk_stud_answer_choice1_idx` (`choice_id` ASC, `choice_question_id` ASC)  COMMENT '',
  CONSTRAINT `fk_stud_answer_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stud_answer_choice1`
    FOREIGN KEY (`choice_id` , `choice_question_id`)
    REFERENCES `lsc_lms`.`choice` (`id` , `question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`schedule` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `subject` VARCHAR(100) NOT NULL COMMENT '',
  `day` ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday') NOT NULL COMMENT '',
  `schedule` VARCHAR(17) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`attendance` (
  `status` ENUM('Absent', 'Late', 'Excuse', 'Present') NOT NULL COMMENT '',
  `class_list_user_id` INT(11) NOT NULL COMMENT '',
  `class_list_course_id` INT NOT NULL COMMENT '',
  `schedule_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`class_list_user_id`, `class_list_course_id`, `schedule_id`)  COMMENT '',
  INDEX `fk_attendance_schedule1_idx` (`schedule_id` ASC)  COMMENT '',
  CONSTRAINT `fk_attendance_class_list1`
    FOREIGN KEY (`class_list_user_id` , `class_list_course_id`)
    REFERENCES `lsc_lms`.`class_list` (`user_id` , `course_id`)
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
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `feedback` VARCHAR(100) NOT NULL COMMENT '',
  `score` INT NOT NULL COMMENT '',
  `grade` INT NOT NULL COMMENT '',
  `min_grade` INT NULL COMMENT '',
  `max_grade` INT NULL COMMENT '',
  `stud_answer_user_id` INT NOT NULL COMMENT '',
  `stud_answer_choice_id` INT NOT NULL COMMENT '',
  `stud_answer_choice_question_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)  COMMENT '',
  INDEX `fk_result_stud_answer1_idx` (`stud_answer_user_id` ASC, `stud_answer_choice_id` ASC, `stud_answer_choice_question_id` ASC)  COMMENT '',
  CONSTRAINT `fk_result_stud_answer1`
    FOREIGN KEY (`stud_answer_user_id` , `stud_answer_choice_id` , `stud_answer_choice_question_id`)
    REFERENCES `lsc_lms`.`stud_answer` (`user_id` , `choice_id` , `choice_question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_rule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_rule` (
  `name` VARCHAR(64) NOT NULL COMMENT '',
  `data` TEXT(100) NULL COMMENT '',
  `created_at` DATE NULL COMMENT '',
  `updated_at` DATE NULL COMMENT '',
  PRIMARY KEY (`name`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_item` (
  `name` VARCHAR(64) NOT NULL COMMENT '',
  `type` INT NOT NULL COMMENT '',
  `description` TEXT(100) NULL COMMENT '',
  `data` TEXT(100) NULL COMMENT '',
  `created_at` DATE NULL COMMENT '',
  `updated_at` DATE NULL COMMENT '',
  `rule_name` VARCHAR(64) NULL COMMENT '',
  PRIMARY KEY (`name`)  COMMENT '',
  INDEX `fk_auth_item_auth_rule1_idx` (`rule_name` ASC)  COMMENT '',
  CONSTRAINT `fk_auth_item_auth_rule1`
    FOREIGN KEY (`rule_name`)
    REFERENCES `lsc_lms`.`auth_rule` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_assignment` (
  `user_id` INT NOT NULL COMMENT '',
  `item_name` VARCHAR(64) NOT NULL COMMENT '',
  `created_at` DATE NULL COMMENT '',
  PRIMARY KEY (`user_id`, `item_name`)  COMMENT '',
  INDEX `fk_auth_assignment_auth_item1_idx` (`item_name` ASC)  COMMENT '',
  CONSTRAINT `fk_auth_assignment_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lsc_lms`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auth_assignment_auth_item1`
    FOREIGN KEY (`item_name`)
    REFERENCES `lsc_lms`.`auth_item` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lsc_lms`.`auth_item_child`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lsc_lms`.`auth_item_child` (
  `parent` VARCHAR(64) NOT NULL COMMENT '',
  `child` VARCHAR(64) NOT NULL COMMENT '',
  PRIMARY KEY (`parent`, `child`)  COMMENT '',
  INDEX `fk_auth_item_has_auth_item_auth_item2_idx` (`child` ASC)  COMMENT '',
  INDEX `fk_auth_item_has_auth_item_auth_item1_idx` (`parent` ASC)  COMMENT '',
  CONSTRAINT `fk_auth_item_has_auth_item_auth_item1`
    FOREIGN KEY (`parent`)
    REFERENCES `lsc_lms`.`auth_item` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auth_item_has_auth_item_auth_item2`
    FOREIGN KEY (`child`)
    REFERENCES `lsc_lms`.`auth_item` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
