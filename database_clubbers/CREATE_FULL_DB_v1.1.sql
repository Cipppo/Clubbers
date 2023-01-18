-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema clubbers
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clubbers
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clubbers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb3 ;
USE `clubbers` ;

-- -----------------------------------------------------
-- Table `clubbers`.`contenuto_post_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubbers`.`contenuto_post_club` (
  `URL` INT NOT NULL,
  `alt` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`URL`))
ENGINE = InnoDB;

USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`foto_profilo_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`foto_profilo_club` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`URL`),
  UNIQUE INDEX `URL_UNIQUE` (`URL` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`indirizzo_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`indirizzo_club` (
  `civico` VARCHAR(45) NOT NULL,
  `via` VARCHAR(45) NOT NULL,
  `comune` VARCHAR(45) NOT NULL,
  `CAP` VARCHAR(45) NOT NULL,
  `stato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`civico`, `via`, `CAP`, `comune`, `stato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`club` (
  `Clubname` VARCHAR(255) NOT NULL,
  `data_registrazione` DATETIME NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(12) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `INDIRIZZO_CLUB_civico` VARCHAR(45) NOT NULL,
  `INDIRIZZO_CLUB_via` VARCHAR(45) NOT NULL,
  `INDIRIZZO_CLUB_CAP` VARCHAR(45) NOT NULL,
  `INDIRIZZO_CLUB_comune` VARCHAR(45) NOT NULL,
  `INDIRIZZO_CLUB_stato` VARCHAR(45) NOT NULL,
  `FOTO_PROFILO_CLUB_URL` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`Clubname`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `telefono_UNIQUE` (`telefono` ASC) VISIBLE,
  INDEX `fk_CLUB_INDIRIZZO_CLUB1_idx` (`INDIRIZZO_CLUB_civico` ASC, `INDIRIZZO_CLUB_via` ASC, `INDIRIZZO_CLUB_CAP` ASC, `INDIRIZZO_CLUB_comune` ASC, `INDIRIZZO_CLUB_stato` ASC) VISIBLE,
  INDEX `fk_CLUB_FOTO_PROFILO_CLUB1_idx` (`FOTO_PROFILO_CLUB_URL` ASC) VISIBLE,
  CONSTRAINT `fk_CLUB_FOTO_PROFILO_CLUB1`
    FOREIGN KEY (`FOTO_PROFILO_CLUB_URL`)
    REFERENCES `mydb`.`foto_profilo_club` (`URL`),
  CONSTRAINT `fk_CLUB_INDIRIZZO_CLUB1`
    FOREIGN KEY (`INDIRIZZO_CLUB_civico` , `INDIRIZZO_CLUB_via` , `INDIRIZZO_CLUB_CAP` , `INDIRIZZO_CLUB_comune` , `INDIRIZZO_CLUB_stato`)
    REFERENCES `mydb`.`indirizzo_club` (`civico` , `via` , `CAP` , `comune` , `stato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`banner`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`banner` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(45) NULL DEFAULT NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`URL`),
  INDEX `fk_BANNER_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  CONSTRAINT `fk_BANNER_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`club` (`Clubname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`foto_profilo_clubber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`foto_profilo_clubber` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`URL`),
  UNIQUE INDEX `URL_UNIQUE` (`URL` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`indirizzo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`indirizzo` (
  `civico` VARCHAR(45) NOT NULL,
  `via` VARCHAR(45) NOT NULL,
  `comune` VARCHAR(45) NOT NULL,
  `CAP` VARCHAR(45) NOT NULL,
  `stato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`civico`, `via`, `CAP`, `comune`, `stato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`clubber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`clubber` (
  `nickname` VARCHAR(26) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cognome` VARCHAR(45) NOT NULL,
  `data_nascita` DATE NOT NULL,
  `data_registrazione` DATE NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(12) NOT NULL,
  `INDIRIZZO_civico` VARCHAR(45) NOT NULL,
  `INDIRIZZO_via` VARCHAR(45) NOT NULL,
  `INDIRIZZO_CAP` VARCHAR(45) NOT NULL,
  `INDIRIZZO_comune` VARCHAR(45) NOT NULL,
  `INDIRIZZO_stato` VARCHAR(45) NOT NULL,
  `FOTO_PROFILO_CLUBBER_URL` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`nickname`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `nickname_UNIQUE` (`nickname` ASC) VISIBLE,
  UNIQUE INDEX `telefono_UNIQUE` (`telefono` ASC) VISIBLE,
  INDEX `fk_CLUBBER_INDIRIZZO_idx` (`INDIRIZZO_civico` ASC, `INDIRIZZO_via` ASC, `INDIRIZZO_CAP` ASC, `INDIRIZZO_comune` ASC, `INDIRIZZO_stato` ASC) VISIBLE,
  INDEX `fk_CLUBBER_FOTO_PROFILO_CLUBBER1_idx` (`FOTO_PROFILO_CLUBBER_URL` ASC) VISIBLE,
  CONSTRAINT `fk_CLUBBER_FOTO_PROFILO_CLUBBER1`
    FOREIGN KEY (`FOTO_PROFILO_CLUBBER_URL`)
    REFERENCES `mydb`.`foto_profilo_clubber` (`URL`),
  CONSTRAINT `fk_CLUBBER_INDIRIZZO`
    FOREIGN KEY (`INDIRIZZO_civico` , `INDIRIZZO_via` , `INDIRIZZO_CAP` , `INDIRIZZO_comune` , `INDIRIZZO_stato`)
    REFERENCES `mydb`.`indirizzo` (`civico` , `via` , `CAP` , `comune` , `stato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`post_clubber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`post_clubber` (
  `idPOST_CLUBBER` INT NOT NULL AUTO_INCREMENT,
  `caption` VARCHAR(4000) NULL DEFAULT NULL,
  `BANNER_URL` VARCHAR(512) NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`idPOST_CLUBBER`),
  INDEX `fk_POST_CLUBBER_BANNER1_idx` (`BANNER_URL` ASC) VISIBLE,
  INDEX `fk_POST_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_POST_CLUBBER_BANNER1`
    FOREIGN KEY (`BANNER_URL`)
    REFERENCES `mydb`.`banner` (`URL`),
  CONSTRAINT `fk_POST_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`commento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`commento` (
  `idCOMMENTO` INT NOT NULL AUTO_INCREMENT,
  `caption` VARCHAR(512) NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  `POST_CLUBBER_idPOST_CLUBBER` INT NOT NULL,
  PRIMARY KEY (`idCOMMENTO`),
  UNIQUE INDEX `idCOMMENTO_UNIQUE` (`idCOMMENTO` ASC) VISIBLE,
  INDEX `fk_COMMENTO_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  INDEX `fk_COMMENTO_POST_CLUBBER1_idx` (`POST_CLUBBER_idPOST_CLUBBER` ASC) VISIBLE,
  CONSTRAINT `fk_COMMENTO_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`),
  CONSTRAINT `fk_COMMENTO_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`post_clubber` (`idPOST_CLUBBER`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`data_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`data_evento` (
  `data` DATETIME NOT NULL,
  `ora_inizio` TIME NOT NULL,
  `durata` INT NOT NULL,
  PRIMARY KEY (`data`, `ora_inizio`, `durata`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`nome_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`nome_evento` (
  `nome` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`nome`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evento` (
  `idEVENTO` INT NOT NULL AUTO_INCREMENT,
  `numero_posti` INT NOT NULL,
  `descrizione` VARCHAR(16000) NOT NULL,
  `NOME_EVENTO_nome` VARCHAR(128) NOT NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `DATA_EVENTO_data` DATETIME NOT NULL,
  `DATA_EVENTO_ora_inizio` TIME NOT NULL,
  `DATA_EVENTO_durata` INT NOT NULL,
  `banner_URL` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`idEVENTO`),
  UNIQUE INDEX `idEVENTO_UNIQUE` (`idEVENTO` ASC) VISIBLE,
  INDEX `fk_EVENTO_NOME_EVENTO1_idx` (`NOME_EVENTO_nome` ASC) VISIBLE,
  INDEX `fk_EVENTO_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  INDEX `fk_EVENTO_DATA_EVENTO1_idx` (`DATA_EVENTO_data` ASC, `DATA_EVENTO_ora_inizio` ASC, `DATA_EVENTO_durata` ASC) VISIBLE,
  INDEX `fk_evento_banner1_idx` (`banner_URL` ASC) VISIBLE,
  CONSTRAINT `fk_EVENTO_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`club` (`Clubname`),
  CONSTRAINT `fk_EVENTO_DATA_EVENTO1`
    FOREIGN KEY (`DATA_EVENTO_data` , `DATA_EVENTO_ora_inizio` , `DATA_EVENTO_durata`)
    REFERENCES `mydb`.`data_evento` (`data` , `ora_inizio` , `durata`),
  CONSTRAINT `fk_EVENTO_NOME_EVENTO1`
    FOREIGN KEY (`NOME_EVENTO_nome`)
    REFERENCES `mydb`.`nome_evento` (`nome`),
  CONSTRAINT `fk_evento_banner1`
    FOREIGN KEY (`banner_URL`)
    REFERENCES `mydb`.`banner` (`URL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`follow_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`follow_club` (
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`CLUB_Clubname`, `CLUBBER_nickname`),
  INDEX `fk_FOLLOW_CLUB_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_FOLLOW_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`club` (`Clubname`),
  CONSTRAINT `fk_FOLLOW_CLUB_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`follow_clubber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`follow_clubber` (
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  `CLUBBER_nickname1` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`CLUBBER_nickname`, `CLUBBER_nickname1`),
  INDEX `fk_FOLLOW_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  INDEX `fk_FOLLOW_CLUBBER_CLUBBER2_idx` (`CLUBBER_nickname1` ASC) VISIBLE,
  CONSTRAINT `fk_FOLLOW_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`),
  CONSTRAINT `fk_FOLLOW_CLUBBER_CLUBBER2`
    FOREIGN KEY (`CLUBBER_nickname1`)
    REFERENCES `mydb`.`clubber` (`nickname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`foto` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(512) NOT NULL,
  `POST_CLUBBER_idPOST_CLUBBER` INT NOT NULL,
  PRIMARY KEY (`URL`),
  INDEX `fk_FOTO_POST_CLUBBER1_idx` (`POST_CLUBBER_idPOST_CLUBBER` ASC) VISIBLE,
  CONSTRAINT `fk_FOTO_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`post_clubber` (`idPOST_CLUBBER`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`post_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`post_club` (
  `idPOST_CLUB` INT NOT NULL AUTO_INCREMENT,
  `caption` VARCHAR(8000) NOT NULL,
  `EVENTO_idEVENTO` INT NOT NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `BANNER_URL` VARCHAR(512) NOT NULL,
  `contenuto_post_club_URL` INT NOT NULL,
  PRIMARY KEY (`idPOST_CLUB`),
  UNIQUE INDEX `idPOST_CLUB_UNIQUE` (`idPOST_CLUB` ASC) VISIBLE,
  INDEX `fk_POST_CLUB_EVENTO1_idx` (`EVENTO_idEVENTO` ASC) VISIBLE,
  INDEX `fk_POST_CLUB_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  INDEX `fk_POST_CLUB_BANNER1_idx` (`BANNER_URL` ASC) VISIBLE,
  INDEX `fk_post_club_contenuto_post_club1_idx` (`contenuto_post_club_URL` ASC) VISIBLE,
  CONSTRAINT `fk_POST_CLUB_BANNER1`
    FOREIGN KEY (`BANNER_URL`)
    REFERENCES `mydb`.`banner` (`URL`),
  CONSTRAINT `fk_POST_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`club` (`Clubname`),
  CONSTRAINT `fk_POST_CLUB_EVENTO1`
    FOREIGN KEY (`EVENTO_idEVENTO`)
    REFERENCES `mydb`.`evento` (`idEVENTO`),
  CONSTRAINT `fk_post_club_contenuto_post_club1`
    FOREIGN KEY (`contenuto_post_club_URL`)
    REFERENCES `clubbers`.`contenuto_post_club` (`URL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`like_post_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`like_post_club` (
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  `POST_CLUB_idPOST_CLUB` INT NOT NULL,
  PRIMARY KEY (`CLUBBER_nickname`, `POST_CLUB_idPOST_CLUB`),
  INDEX `fk_LIKE_POST_POST_CLUB1_idx` (`POST_CLUB_idPOST_CLUB` ASC) VISIBLE,
  CONSTRAINT `fk_LIKE_POST_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`),
  CONSTRAINT `fk_LIKE_POST_POST_CLUB1`
    FOREIGN KEY (`POST_CLUB_idPOST_CLUB`)
    REFERENCES `mydb`.`post_club` (`idPOST_CLUB`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`like_post_clubber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`like_post_clubber` (
  `POST_CLUBBER_idPOST_CLUBBER` INT NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`POST_CLUBBER_idPOST_CLUBBER`, `CLUBBER_nickname`),
  INDEX `fk_LIKE_POST_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_LIKE_POST_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`),
  CONSTRAINT `fk_LIKE_POST_CLUBBER_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`post_clubber` (`idPOST_CLUBBER`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`notifica_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notifica_club` (
  `id_NOTIFICA` INT NOT NULL AUTO_INCREMENT,
  `data_notifica` DATE NOT NULL,
  `caption` VARCHAR(512) NOT NULL,
  `visto` TINYINT NULL DEFAULT NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_NOTIFICA`),
  INDEX `fk_NOTIFICA_CLUB_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  CONSTRAINT `fk_NOTIFICA_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`club` (`Clubname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`notifica_clubber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notifica_clubber` (
  `id_NOTIFICA` INT NOT NULL AUTO_INCREMENT,
  `data_notifica` DATE NOT NULL,
  `caption` VARCHAR(512) NOT NULL,
  `visto` TINYINT NULL DEFAULT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`id_NOTIFICA`),
  INDEX `fk_NOTIFICA_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_NOTIFICA_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`partecipa_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`partecipa_evento` (
  `EVENTO_idEVENTO` INT NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`EVENTO_idEVENTO`, `CLUBBER_nickname`),
  INDEX `fk_PARTECIPA_EVENTO_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_PARTECIPA_EVENTO_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`),
  CONSTRAINT `fk_PARTECIPA_EVENTO_EVENTO1`
    FOREIGN KEY (`EVENTO_idEVENTO`)
    REFERENCES `mydb`.`evento` (`idEVENTO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tag` (
  `nome` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`tag_club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tag_club` (
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `TAG_nome` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`CLUB_Clubname`, `TAG_nome`),
  INDEX `fk_TAG_CLUB_TAG1_idx` (`TAG_nome` ASC) VISIBLE,
  CONSTRAINT `fk_TAG_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`club` (`Clubname`),
  CONSTRAINT `fk_TAG_CLUB_TAG1`
    FOREIGN KEY (`TAG_nome`)
    REFERENCES `mydb`.`tag` (`nome`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydb`.`taggato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`taggato` (
  `POST_CLUBBER_idPOST_CLUBBER` INT NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`POST_CLUBBER_idPOST_CLUBBER`, `CLUBBER_nickname`),
  INDEX `fk_TAGGATO_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_TAGGATO_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`clubber` (`nickname`),
  CONSTRAINT `fk_TAGGATO_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`post_clubber` (`idPOST_CLUBBER`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
