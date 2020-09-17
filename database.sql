-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema films_sys
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema films_sys
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `films_sys` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `films_sys` ;

-- -----------------------------------------------------
-- Table `films_sys`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `films_sys`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE UNIQUE INDEX `id_UNIQUE` ON `films_sys`.`categorias` (`id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `films_sys`.`filmes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `films_sys`.`filmes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(256) NOT NULL,
  `categoria` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE UNIQUE INDEX `id_UNIQUE` ON `films_sys`.`filmes` (`id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `films_sys`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `films_sys`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(256) NOT NULL,
  `senha` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE UNIQUE INDEX `id_UNIQUE` ON `films_sys`.`users` (`id` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;