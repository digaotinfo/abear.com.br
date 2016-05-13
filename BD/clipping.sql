CREATE TABLE `tb_clipping` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NULL,
  `titulo_ptbr` VARCHAR(200) NULL,
  `titulo_eng` VARCHAR(200) NULL,
  `titulo_esp` VARCHAR(200) NULL,
  `texto_ptbr` TEXT NULL,
  `texto_eng` TEXT NULL,
  `texto_esp` TEXT NULL,
  `ativo` TINYINT(1) NULL DEFAULT 1,
  `url_amigavel__ptbr` VARCHAR(300) NULL,
  `url_amigavel_eng` VARCHAR(300) NULL,
  `url_amigavel_esp` VARCHAR(300) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;
