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
  `url_amigavel_ptbr` VARCHAR(300) NULL,
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

ALTER TABLE `tb_hotsites` 
ADD COLUMN `premio_de_jornalismo_abear_titulo_ptbr` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Português.' AFTER `id`,
ADD COLUMN `premio_de_jornalismo_abear_titulo_eng` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Inglês.' AFTER `premio_de_jornalismo_abear_titulo_ptbr`,
ADD COLUMN `premio_de_jornalismo_abear_titulo_esp` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Espanhol.' AFTER `premio_de_jornalismo_abear_titulo_eng`,
ADD COLUMN `agencia_abear_titulo_ptbr` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Português.' AFTER `premio_de_jornalismo_abear`,
ADD COLUMN `agencia_abear_titulo_eng` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Inglês.' AFTER `agencia_abear_titulo_ptbr`,
ADD COLUMN `agencia_abear_titulo_esp` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Espanhol.' AFTER `agencia_abear_titulo_eng`,
ADD COLUMN `clube_abear_titulo_ptbr` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Português.' AFTER `agencia_abear`,
ADD COLUMN `clube_abear_titulo_eng` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Inglês.' AFTER `clube_abear_titulo_ptbr`,
ADD COLUMN `clube_abear_titulo_esp` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Espanhol.' AFTER `clube_abear_titulo_eng`,
ADD COLUMN `tudo_para_voar_melhor_titulo_ptbr` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Português.' AFTER `clube_abear`,
ADD COLUMN `tudo_para_voar_melhor_titulo_eng` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Inglês.' AFTER `tudo_para_voar_melhor_titulo_ptbr`,
ADD COLUMN `tudo_para_voar_melhor_titulo_esp` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Espanhol.' AFTER `tudo_para_voar_melhor_titulo_eng`,
ADD COLUMN `transporte_de_orgaos_titulo_ptbr` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Português.' AFTER `tudo_para_voar_melhor`,
ADD COLUMN `transporte_de_orgaos_titulo_eng` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Inglês.' AFTER `transporte_de_orgaos_titulo_ptbr`,
ADD COLUMN `transporte_de_orgaos_titulo_esp` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Espanhol.' AFTER `transporte_de_orgaos_titulo_eng`,
ADD COLUMN `asas_do_bem_titulo_ptbr` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Português.' AFTER `transporte_de_orgaos`,
ADD COLUMN `asas_do_bem_titulo_eng` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Inglês.' AFTER `asas_do_bem_titulo_ptbr`,
ADD COLUMN `asas_do_bem_titulo_esp` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Espanhol.' AFTER `asas_do_bem_titulo_eng`,
ADD COLUMN `aviacao_em_debate_titulo_ptbr` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Português.' AFTER `asas_do_bem`,
ADD COLUMN `aviacao_em_debate_titulo_eng` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Inglês.' AFTER `aviacao_em_debate_titulo_ptbr`,
ADD COLUMN `aviacao_em_debate_titulo_esp` VARCHAR(100) NULL COMMENT 'Colocar o titulo do link site em Espanhol.' AFTER `aviacao_em_debate_titulo_eng`;



ALTER TABLE `tb_hotsites` 
ADD COLUMN `quero_voar_titulo_ptbr` VARCHAR(100) NULL AFTER `aviacao_em_debate`,
ADD COLUMN `quero_voar_titulo_eng` VARCHAR(100) NULL AFTER `quero_voar_titulo_ptbr`,
ADD COLUMN `quero_voar_titulo_esp` VARCHAR(100) NULL AFTER `quero_voar_titulo_eng`,
ADD COLUMN `quero_voar` VARCHAR(200) NULL AFTER `quero_voar_titulo_esp`;


ALTER TABLE `tb_hotsites` 
CHANGE COLUMN `quero_voar_titulo_ptbr` `quero_voar_titulo_ptbr` VARCHAR(100) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NULL DEFAULT NULL COMMENT 'Colocar o titulo do link site em Português.' ,
CHANGE COLUMN `quero_voar_titulo_eng` `quero_voar_titulo_eng` VARCHAR(100) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NULL DEFAULT NULL COMMENT 'Colocar o titulo do link site em Inglês.' ,
CHANGE COLUMN `quero_voar_titulo_esp` `quero_voar_titulo_esp` VARCHAR(100) CHARACTER SET 'latin1' COLLATE 'latin1_general_ci' NULL DEFAULT NULL COMMENT 'Colocar o titulo do link site em Espanhol.' ;

