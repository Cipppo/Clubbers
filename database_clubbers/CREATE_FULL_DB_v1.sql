-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`INDIRIZZO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`INDIRIZZO` (
  `civico` VARCHAR(45) NOT NULL,
  `via` VARCHAR(45) NOT NULL,
  `comune` VARCHAR(45) NOT NULL,
  `CAP` VARCHAR(45) NOT NULL,
  `stato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`civico`, `via`, `CAP`, `comune`, `stato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FOTO_PROFILO_CLUBBER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FOTO_PROFILO_CLUBBER` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(512) NULL,
  PRIMARY KEY (`URL`),
  UNIQUE INDEX `URL_UNIQUE` (`URL` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CLUBBER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`CLUBBER` (
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
  CONSTRAINT `fk_CLUBBER_INDIRIZZO`
    FOREIGN KEY (`INDIRIZZO_civico` , `INDIRIZZO_via` , `INDIRIZZO_CAP` , `INDIRIZZO_comune` , `INDIRIZZO_stato`)
    REFERENCES `mydb`.`INDIRIZZO` (`civico` , `via` , `CAP` , `comune` , `stato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLUBBER_FOTO_PROFILO_CLUBBER1`
    FOREIGN KEY (`FOTO_PROFILO_CLUBBER_URL`)
    REFERENCES `mydb`.`FOTO_PROFILO_CLUBBER` (`URL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FOLLOW_CLUBBER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FOLLOW_CLUBBER` (
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  `CLUBBER_nickname1` VARCHAR(26) NOT NULL,
  INDEX `fk_FOLLOW_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  INDEX `fk_FOLLOW_CLUBBER_CLUBBER2_idx` (`CLUBBER_nickname1` ASC) VISIBLE,
  PRIMARY KEY (`CLUBBER_nickname`, `CLUBBER_nickname1`),
  CONSTRAINT `fk_FOLLOW_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FOLLOW_CLUBBER_CLUBBER2`
    FOREIGN KEY (`CLUBBER_nickname1`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`NOTIFICA_CLUBBER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`NOTIFICA_CLUBBER` (
  `id_NOTIFICA` INT NOT NULL AUTO_INCREMENT,
  `data_notifica` DATE NOT NULL,
  `caption` VARCHAR(512) NOT NULL,
  `visto` TINYINT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`id_NOTIFICA`),
  INDEX `fk_NOTIFICA_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_NOTIFICA_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`INDIRIZZO_CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`INDIRIZZO_CLUB` (
  `civico` VARCHAR(45) NOT NULL,
  `via` VARCHAR(45) NOT NULL,
  `comune` VARCHAR(45) NOT NULL,
  `CAP` VARCHAR(45) NOT NULL,
  `stato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`civico`, `via`, `CAP`, `comune`, `stato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FOTO_PROFILO_CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FOTO_PROFILO_CLUB` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(512) NULL,
  PRIMARY KEY (`URL`),
  UNIQUE INDEX `URL_UNIQUE` (`URL` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`CLUB` (
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
  CONSTRAINT `fk_CLUB_INDIRIZZO_CLUB1`
    FOREIGN KEY (`INDIRIZZO_CLUB_civico` , `INDIRIZZO_CLUB_via` , `INDIRIZZO_CLUB_CAP` , `INDIRIZZO_CLUB_comune` , `INDIRIZZO_CLUB_stato`)
    REFERENCES `mydb`.`INDIRIZZO_CLUB` (`civico` , `via` , `CAP` , `comune` , `stato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLUB_FOTO_PROFILO_CLUB1`
    FOREIGN KEY (`FOTO_PROFILO_CLUB_URL`)
    REFERENCES `mydb`.`FOTO_PROFILO_CLUB` (`URL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`NOTIFICA_CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`NOTIFICA_CLUB` (
  `id_NOTIFICA` INT NOT NULL AUTO_INCREMENT,
  `data_notifica` DATE NOT NULL,
  `caption` VARCHAR(512) NOT NULL,
  `visto` TINYINT NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_NOTIFICA`),
  INDEX `fk_NOTIFICA_CLUB_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  CONSTRAINT `fk_NOTIFICA_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`CLUB` (`Clubname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FOLLOW_CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FOLLOW_CLUB` (
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`CLUB_Clubname`, `CLUBBER_nickname`),
  INDEX `fk_FOLLOW_CLUB_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_FOLLOW_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`CLUB` (`Clubname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FOLLOW_CLUB_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TAG`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TAG` (
  `nome` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TAG_CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TAG_CLUB` (
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `TAG_nome` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`CLUB_Clubname`, `TAG_nome`),
  INDEX `fk_TAG_CLUB_TAG1_idx` (`TAG_nome` ASC) VISIBLE,
  CONSTRAINT `fk_TAG_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`CLUB` (`Clubname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TAG_CLUB_TAG1`
    FOREIGN KEY (`TAG_nome`)
    REFERENCES `mydb`.`TAG` (`nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`NOME_EVENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`NOME_EVENTO` (
  `nome` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`nome`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`DATA_EVENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`DATA_EVENTO` (
  `data` DATETIME NOT NULL,
  `ora_inizio` TIME NOT NULL,
  `durata` INT NOT NULL,
  PRIMARY KEY (`data`, `ora_inizio`, `durata`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`EVENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`EVENTO` (
  `idEVENTO` INT NOT NULL AUTO_INCREMENT,
  `numero_posti` INT NOT NULL,
  `descrizione` VARCHAR(16000) NOT NULL,
  `NOME_EVENTO_nome` VARCHAR(128) NOT NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `DATA_EVENTO_data` DATETIME NOT NULL,
  `DATA_EVENTO_ora_inizio` TIME NOT NULL,
  `DATA_EVENTO_durata` INT NOT NULL,
  PRIMARY KEY (`idEVENTO`),
  UNIQUE INDEX `idEVENTO_UNIQUE` (`idEVENTO` ASC) VISIBLE,
  INDEX `fk_EVENTO_NOME_EVENTO1_idx` (`NOME_EVENTO_nome` ASC) VISIBLE,
  INDEX `fk_EVENTO_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  INDEX `fk_EVENTO_DATA_EVENTO1_idx` (`DATA_EVENTO_data` ASC, `DATA_EVENTO_ora_inizio` ASC, `DATA_EVENTO_durata` ASC) VISIBLE,
  CONSTRAINT `fk_EVENTO_NOME_EVENTO1`
    FOREIGN KEY (`NOME_EVENTO_nome`)
    REFERENCES `mydb`.`NOME_EVENTO` (`nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`CLUB` (`Clubname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_DATA_EVENTO1`
    FOREIGN KEY (`DATA_EVENTO_data` , `DATA_EVENTO_ora_inizio` , `DATA_EVENTO_durata`)
    REFERENCES `mydb`.`DATA_EVENTO` (`data` , `ora_inizio` , `durata`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`BANNER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`BANNER` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(45) NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`URL`),
  INDEX `fk_BANNER_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  CONSTRAINT `fk_BANNER_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`CLUB` (`Clubname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`POST_CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`POST_CLUB` (
  `idPOST_CLUB` INT NOT NULL AUTO_INCREMENT,
  `caption` VARCHAR(8000) NOT NULL,
  `EVENTO_idEVENTO` INT NOT NULL,
  `CLUB_Clubname` VARCHAR(255) NOT NULL,
  `BANNER_URL` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`idPOST_CLUB`),
  UNIQUE INDEX `idPOST_CLUB_UNIQUE` (`idPOST_CLUB` ASC) VISIBLE,
  INDEX `fk_POST_CLUB_EVENTO1_idx` (`EVENTO_idEVENTO` ASC) VISIBLE,
  INDEX `fk_POST_CLUB_CLUB1_idx` (`CLUB_Clubname` ASC) VISIBLE,
  INDEX `fk_POST_CLUB_BANNER1_idx` (`BANNER_URL` ASC) VISIBLE,
  CONSTRAINT `fk_POST_CLUB_EVENTO1`
    FOREIGN KEY (`EVENTO_idEVENTO`)
    REFERENCES `mydb`.`EVENTO` (`idEVENTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_POST_CLUB_CLUB1`
    FOREIGN KEY (`CLUB_Clubname`)
    REFERENCES `mydb`.`CLUB` (`Clubname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_POST_CLUB_BANNER1`
    FOREIGN KEY (`BANNER_URL`)
    REFERENCES `mydb`.`BANNER` (`URL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PARTECIPA_EVENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PARTECIPA_EVENTO` (
  `EVENTO_idEVENTO` INT NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`EVENTO_idEVENTO`, `CLUBBER_nickname`),
  INDEX `fk_PARTECIPA_EVENTO_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_PARTECIPA_EVENTO_EVENTO1`
    FOREIGN KEY (`EVENTO_idEVENTO`)
    REFERENCES `mydb`.`EVENTO` (`idEVENTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PARTECIPA_EVENTO_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`LIKE_POST_CLUB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`LIKE_POST_CLUB` (
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  `POST_CLUB_idPOST_CLUB` INT NOT NULL,
  PRIMARY KEY (`CLUBBER_nickname`, `POST_CLUB_idPOST_CLUB`),
  INDEX `fk_LIKE_POST_POST_CLUB1_idx` (`POST_CLUB_idPOST_CLUB` ASC) VISIBLE,
  CONSTRAINT `fk_LIKE_POST_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LIKE_POST_POST_CLUB1`
    FOREIGN KEY (`POST_CLUB_idPOST_CLUB`)
    REFERENCES `mydb`.`POST_CLUB` (`idPOST_CLUB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`POST_CLUBBER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`POST_CLUBBER` (
  `idPOST_CLUBBER` INT NOT NULL AUTO_INCREMENT,
  `caption` VARCHAR(4000) NULL,
  `BANNER_URL` VARCHAR(512) NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`idPOST_CLUBBER`),
  INDEX `fk_POST_CLUBBER_BANNER1_idx` (`BANNER_URL` ASC) VISIBLE,
  INDEX `fk_POST_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_POST_CLUBBER_BANNER1`
    FOREIGN KEY (`BANNER_URL`)
    REFERENCES `mydb`.`BANNER` (`URL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_POST_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FOTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FOTO` (
  `URL` VARCHAR(512) NOT NULL,
  `alt` VARCHAR(512) NOT NULL,
  `POST_CLUBBER_idPOST_CLUBBER` INT NOT NULL,
  PRIMARY KEY (`URL`),
  INDEX `fk_FOTO_POST_CLUBBER1_idx` (`POST_CLUBBER_idPOST_CLUBBER` ASC) VISIBLE,
  CONSTRAINT `fk_FOTO_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`POST_CLUBBER` (`idPOST_CLUBBER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TAGGATO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TAGGATO` (
  `POST_CLUBBER_idPOST_CLUBBER` INT NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`POST_CLUBBER_idPOST_CLUBBER`, `CLUBBER_nickname`),
  INDEX `fk_TAGGATO_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_TAGGATO_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`POST_CLUBBER` (`idPOST_CLUBBER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TAGGATO_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`LIKE_POST_CLUBBER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`LIKE_POST_CLUBBER` (
  `POST_CLUBBER_idPOST_CLUBBER` INT NOT NULL,
  `CLUBBER_nickname` VARCHAR(26) NOT NULL,
  PRIMARY KEY (`POST_CLUBBER_idPOST_CLUBBER`, `CLUBBER_nickname`),
  INDEX `fk_LIKE_POST_CLUBBER_CLUBBER1_idx` (`CLUBBER_nickname` ASC) VISIBLE,
  CONSTRAINT `fk_LIKE_POST_CLUBBER_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`POST_CLUBBER` (`idPOST_CLUBBER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LIKE_POST_CLUBBER_CLUBBER1`
    FOREIGN KEY (`CLUBBER_nickname`)
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`COMMENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMMENTO` (
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
    REFERENCES `mydb`.`CLUBBER` (`nickname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMMENTO_POST_CLUBBER1`
    FOREIGN KEY (`POST_CLUBBER_idPOST_CLUBBER`)
    REFERENCES `mydb`.`POST_CLUBBER` (`idPOST_CLUBBER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
