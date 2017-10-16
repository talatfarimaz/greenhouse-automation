create database sys;
USE sys;
SHOW ENGINE INNODB STATUS;

CREATE TABLE IF NOT EXISTS `sys`.`kisi_bilgileri` (
  `kisi_id` INT unsigned NOT NULL auto_increment,
  `isim` VARCHAR(45) NULL,
  `eposta` VARCHAR(45) NOT NULL,
  `sifre` VARCHAR(45) NULL,
  PRIMARY KEY (`kisi_id`, `eposta`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sys`.`sera_bilgileri` (
   `kisi_id_sera` INT unsigned NOT NULL auto_increment,
 `vana_durum` varchar(45) null,
    `havalandirma_durum` varchar(45) null,
      `nem_degerleri` INT NULL,
        `sicaklik_deger` INT NULL,
          `ruzgar_deger` INT NULL,
  CONSTRAINT `fk_sera_kisi_bilgileri`
    FOREIGN KEY (`kisi_id_sera`)
    REFERENCES `sys`.`kisi_bilgileri` (`kisi_id`)
     ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `sys`.`log` (
  `kisi_bilgileri_kisi_id` INT unsigned NOT NULL auto_increment,
  `kisi_bilgileri_eposta` VARCHAR(45) NOT NULL,
  `log_tarih` DATETIME NULL,
  `log_bilgi` VARCHAR(45) NULL,
  PRIMARY KEY (`kisi_bilgileri_kisi_id`, `kisi_bilgileri_eposta`),
  CONSTRAINT `fk_log_kisi_bilgileri1`
    FOREIGN KEY (`kisi_bilgileri_kisi_id` , `kisi_bilgileri_eposta`)
    REFERENCES `sys`.`kisi_bilgileri` (`kisi_id` , `eposta`)
     ON DELETE CASCADE ON UPDATE CASCADE)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `sys`.`duyuru` (
  `duyuru_id` INT unsigned NOT NULL auto_increment,
  `duyuru_icerik` VARCHAR(45) NULL,
  `duyuru_tarih` DATETIME NULL,
  PRIMARY KEY (`duyuru_id`))
ENGINE = InnoDB;

ALTER TABLE sera_bilgileri
ADD saat timestamp;