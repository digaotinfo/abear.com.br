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




CREATE TABLE `tb_clipping_historico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `clipping_id` INT NULL,
  `username` VARCHAR(100) NULL,
  `name` VARCHAR(200) NULL,
  `acao` CHAR(2) NULL,
  `edicao` LONGTEXT NULL,
  `delete` TINYINT(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;








HOT SITE

ALTER TABLE `abear_2014`.`tb_hotsites` 
ADD COLUMN `premio_de_jornalismo_abear_titulo` VARCHAR(100) NULL AFTER `id`,
ADD COLUMN `premio_de_jornalismo_abear_ativo` TINYINT(1) NULL AFTER `premio_de_jornalismo_abear`;

ALTER TABLE `abear_2014`.`tb_hotsites` 
CHANGE COLUMN `premio_de_jornalismo_abear_titulo` `premio_de_jornalismo_abear_titulo` VARCHAR(100) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NULL DEFAULT NULL COMMENT 'Titulo que será mostrado no menu do site referente ao Prêmio de Jornalismo ABEAR' ;


ALTER TABLE `abear_2014`.`tb_hotsites` 
DROP COLUMN `premio_de_jornalismo_abear_ativo`,
CHANGE COLUMN `premio_de_jornalismo_abear_titulo` `premio_de_jornalismo_abear_titulo` VARCHAR(100) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NULL DEFAULT NULL COMMENT 'Titulo que será mostrado no menu do site referente ao Prêmio de Jornalismo ABEAR.' ,
ADD COLUMN `agencia_abear_titulo` VARCHAR(100) NULL COMMENT 'Titulo que será mostrado no menu do site referente a Agência ABEAR' AFTER `premio_de_jornalismo_abear`,
ADD COLUMN `clube_abear_titulo` VARCHAR(100) NULL COMMENT 'Titulo que será mostrado no menu do site referente ao Clube ABEAR' AFTER `agencia_abear`,
ADD COLUMN `tudo_para_voar_melhor_titulo` VARCHAR(100) NULL COMMENT 'Titulo que será mostrado no menu do site referente a Tudo pra Voar Melhor.' AFTER `clube_abear`,
ADD COLUMN `transporte_de_orgaos_titulo` VARCHAR(100) NULL COMMENT 'Titulo que será mostrado no menu do site referente a Transporte de Orgãos.' AFTER `tudo_para_voar_melhor`,
ADD COLUMN `asas_do_bem_titulo` VARCHAR(100) NULL COMMENT 'Titulo que será mostrado no menu do site referente a Asas do Bem.' AFTER `transporte_de_orgaos`,
ADD COLUMN `aviacao_em_debate_titulo` VARCHAR(100) NULL COMMENT 'Titulo que será mostrado no menu do site referente a Aviação em Debate.' AFTER `asas_do_bem`;

