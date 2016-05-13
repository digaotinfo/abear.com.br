
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_alias` (`alias`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','admin','2009-04-05 00:10:34','2009-04-05 00:10:34'),(2,'Registered','registered','2009-04-05 00:10:50','2009-04-06 05:20:38'),(3,'Public','public','2009-04-05 00:12:38','2009-04-07 01:41:45');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_configuracoes`
--

DROP TABLE IF EXISTS `tb_configuracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_configuracoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(300) DEFAULT NULL COMMENT 'Será lido pelo Google. Será colocado em todas as páginas do site',
  `tag_keywords` varchar(400) DEFAULT NULL COMMENT 'Será lido pelo Google. Será colocado em todas as páginas do site caso essas não tenham keywords.',
  `tag_description` varchar(400) DEFAULT NULL COMMENT 'Será lido pelo Google. Será colocado em todas as páginas do site caso essas não tenham description.',
  `facebook_image_file` varchar(300) DEFAULT NULL COMMENT 'Imagem que irá aparecer no Facebook caso um usuário compartilhe alguma página do site.',
  `google_analytics` varchar(200) DEFAULT NULL COMMENT 'Inserir apenas o código do Analytics.',
  `email_destinatario` varchar(200) DEFAULT NULL COMMENT 'E-mail que irá receber qualquer interação do site (formulário de contato e/ou outros).',
  `email_remetente_host` varchar(300) DEFAULT NULL COMMENT 'SMTP do site: smtp.nomedosite.com.br',
  `email_remetente` varchar(200) DEFAULT NULL COMMENT 'E-mail que fará o envio autenticado de qualquer interação do site (formulário de contato e/ou outros).',
  `email_remetente_senha` varchar(100) DEFAULT NULL COMMENT 'Deverá ser a senha real do e-mail de remetente.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_configuracoes`
--

LOCK TABLES `tb_configuracoes` WRITE;
/*!40000 ALTER TABLE `tb_configuracoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_configuracoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `website` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation_key` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `timezone` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'pipo','e216d09b3c9b2f6c45449fb530508b8f877bfd98','pipo','',NULL,'17a17f0184c20a44d9b7118d5e0666e3',NULL,NULL,'0',1,'2012-06-20 11:28:21','2012-06-20 11:28:21'),(2,0,'zoio old','c4157d5858ce997451d6e71b86e3b0ca2d2cb2b6','','',NULL,'',NULL,NULL,'0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,0,'zoio','c4157d5858ce997451d6e71b86e3b0ca2d2cb2b6','Zóio','zoiodev@zoio.net.br',NULL,'',NULL,NULL,'0',0,'2012-09-14 13:03:52','2012-09-14 13:03:52');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
