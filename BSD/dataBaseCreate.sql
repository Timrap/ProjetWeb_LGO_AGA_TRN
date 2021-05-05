-- MySQL Script generated by MySQL Workbench
-- Wed Apr 28 14:46:12 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema annoncesfaciles
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema annoncesfaciles
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `annoncesfaciles` DEFAULT CHARACTER SET utf8 ;
USE `annoncesfaciles` ;aannoncesfacilesannoncesfacilesdvertisements

-- -----------------------------------------------------
-- Table `annoncesfaciles`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `annoncesfaciles`.`Users` (
  `idUsers` INT NOT NULL AUTO_INCREMENT,
  `Firstname` VARCHAR(25) NOT NULL,
  `Lastname` VARCHAR(25) NOT NULL,
  `Mail` VARCHAR(60) NOT NULL,
  `Type` TINYINT(2) NOT NULL,
  `PasswordHash` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUsers`),
  INDEX `UniqueUser` (`Mail` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `annoncesfaciles`.`Advertisements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `annoncesfaciles`.`Advertisements` (
  `idAdvertisements` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(40) NOT NULL,
  `Category` TINYINT(3) NOT NULL,
  `Description` VARCHAR(512) NOT NULL,
  `Image` VARCHAR(128) NULL,
  `Price` DECIMAL(2) NOT NULL,
  `Users_idUsers` INT NOT NULL,
  PRIMARY KEY (`idAdvertisements`, `Users_idUsers`),
  INDEX `fk_Advertisements_Users_idx` (`Users_idUsers` ASC) VISIBLE,
  INDEX `UniqueAdvertisement` (`Title` ASC, `Description` ASC, `Image` ASC, `Price` ASC) VISIBLE,
  CONSTRAINT `fk_Advertisements_Users`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `annoncesfaciles`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
annoncesfacilesannoncesfacilesannoncesfacilesannoncesfacilesannoncesfaciles