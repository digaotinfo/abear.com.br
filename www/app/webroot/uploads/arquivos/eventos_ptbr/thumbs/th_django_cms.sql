DROP TABLE IF EXISTS `cms_aliaspluginmodel`;
CREATE TABLE `cms_aliaspluginmodel` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `plugin_id` integer,
  `alias_placeholder_id` integer,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

CREATE INDEX cms_aliaspluginmodel_921abf5c ON `cms_aliaspluginmodel` (alias_placeholder_id);
CREATE INDEX cms_aliaspluginmodel_b25eaab4 ON `cms_aliaspluginmodel` (plugin_id);

DROP TABLE IF EXISTS `cms_cmsplugin`;
CREATE TABLE `cms_cmsplugin` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `position` smallint unsigned,
  `language` varchar(15) NOT NULL,
  `plugin_type` varchar(50) NOT NULL,
  `creation_date` datetime NOT NULL,
  `changed_date` datetime NOT NULL,
  `level` integer unsigned NOT NULL,
  `lft` integer unsigned NOT NULL,
  `rght` integer unsigned NOT NULL,
  `tree_id` integer unsigned NOT NULL,
  `parent_id` integer,
  `placeholder_id` integer,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_cmsplugin_667a6151 ON `cms_cmsplugin` (placeholder_id);
CREATE INDEX cms_cmsplugin_6be37982 ON `cms_cmsplugin` (parent_id);
CREATE INDEX cms_cmsplugin_656442a0 ON `cms_cmsplugin` (tree_id);
CREATE INDEX cms_cmsplugin_3cfbd988 ON `cms_cmsplugin` (rght);
CREATE INDEX cms_cmsplugin_caf7cc51 ON `cms_cmsplugin` (lft);
CREATE INDEX cms_cmsplugin_c9e9a848 ON `cms_cmsplugin` (level);
CREATE INDEX cms_cmsplugin_b5e4cf8f ON `cms_cmsplugin` (plugin_type);
CREATE INDEX cms_cmsplugin_8512ae7d ON `cms_cmsplugin` (language);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (1,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.503001','2015-02-26 21:46:39.550639',0,1,2,1,NULL,1);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (2,3,'pt-BR','MultiColumnPlugin','2015-02-26 21:46:39.556466','2015-02-26 21:46:39.722793',0,1,14,2,NULL,2);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (3,3,'pt-BR','ColumnPlugin','2015-02-26 21:46:39.576675','2015-02-26 21:46:39.740554',1,2,13,2,2,2);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (4,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.598409','2015-02-26 21:46:39.609622',2,3,12,2,3,2);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (5,3,'pt-BR','ColumnPlugin','2015-02-26 21:46:39.629396','2015-02-26 21:46:39.749232',1,4,11,2,2,2);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (6,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.661721','2015-02-26 21:46:39.670566',2,5,10,2,5,2);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (7,3,'pt-BR','ColumnPlugin','2015-02-26 21:46:39.725048','2015-02-26 21:46:39.760453',1,6,9,2,2,2);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (8,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.763396','2015-02-26 21:46:39.772198',2,7,8,2,7,2);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (9,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.503001','2015-02-26 21:46:39.899738',0,1,2,3,NULL,3);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (10,3,'pt-BR','MultiColumnPlugin','2015-02-26 21:46:39.556466','2015-02-26 21:46:39.918818',0,1,14,4,NULL,4);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (11,3,'pt-BR','ColumnPlugin','2015-02-26 21:46:39.576675','2015-02-26 21:46:39.938460',1,2,5,4,10,4);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (12,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.598409','2015-02-26 21:46:40.164044',2,3,4,4,11,4);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (13,3,'pt-BR','ColumnPlugin','2015-02-26 21:46:39.629396','2015-02-26 21:46:40.072611',1,6,9,4,10,4);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (14,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.661721','2015-02-26 21:46:40.180395',2,7,8,4,13,4);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (15,3,'pt-BR','ColumnPlugin','2015-02-26 21:46:39.725048','2015-02-26 21:46:40.117707',1,10,13,4,10,4);
INSERT INTO `cms_cmsplugin` (`id`,`position`,`language`,`plugin_type`,`creation_date`,`changed_date`,`level`,`lft`,`rght`,`tree_id`,`parent_id`,`placeholder_id`) VALUES (16,0,'pt-BR','TextPlugin','2015-02-26 21:46:39.763396','2015-02-26 21:46:40.195847',2,11,12,4,15,4);
DROP TABLE IF EXISTS `cms_globalpagepermission`;
CREATE TABLE `cms_globalpagepermission` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `can_change` bool NOT NULL,
  `can_add` bool NOT NULL,
  `can_delete` bool NOT NULL,
  `can_change_advanced_settings` bool NOT NULL,
  `can_publish` bool NOT NULL,
  `can_change_permissions` bool NOT NULL,
  `can_move_page` bool NOT NULL,
  `can_view` bool NOT NULL,
  `can_recover_page` bool NOT NULL,
  `group_id` integer,
  `user_id` integer,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_globalpagepermission_e8701ad4 ON `cms_globalpagepermission` (user_id);
CREATE INDEX cms_globalpagepermission_0e939a4f ON `cms_globalpagepermission` (group_id);

DROP TABLE IF EXISTS `cms_globalpagepermission_sites`;
CREATE TABLE `cms_globalpagepermission_sites` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `globalpagepermission_id` integer NOT NULL,
  `site_id` integer NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_globalpagepermission_sites_9365d6e7 ON `cms_globalpagepermission_sites` (site_id);
CREATE INDEX cms_globalpagepermission_sites_a3d12ecd ON `cms_globalpagepermission_sites` (globalpagepermission_id);

DROP TABLE IF EXISTS `cms_page`;
CREATE TABLE `cms_page` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `created_by` varchar(70) NOT NULL,
  `changed_by` varchar(70) NOT NULL,
  `creation_date` datetime NOT NULL,
  `changed_date` datetime NOT NULL,
  `publication_date` datetime,
  `publication_end_date` datetime,
  `in_navigation` bool NOT NULL,
  `soft_root` bool NOT NULL,
  `reverse_id` varchar(40),
  `navigation_extenders` varchar(80),
  `template` varchar(100) NOT NULL,
  `login_required` bool NOT NULL,
  `limit_visibility_in_menu` smallint,
  `is_home` bool NOT NULL,
  `application_urls` varchar(200),
  `application_namespace` varchar(200),
  `level` integer unsigned NOT NULL,
  `lft` integer unsigned NOT NULL,
  `rght` integer unsigned NOT NULL,
  `tree_id` integer unsigned NOT NULL,
  `publisher_is_draft` bool NOT NULL,
  `languages` varchar(255),
  `revision_id` integer unsigned NOT NULL,
  `xframe_options` integer NOT NULL,
  `parent_id` integer,
  `publisher_public_id` integer,
  `site_id` integer NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_page_9365d6e7 ON `cms_page` (site_id);
CREATE INDEX cms_page_6be37982 ON `cms_page` (parent_id);
CREATE INDEX cms_page_b7700099 ON `cms_page` (publisher_is_draft);
CREATE INDEX cms_page_656442a0 ON `cms_page` (tree_id);
CREATE INDEX cms_page_3cfbd988 ON `cms_page` (rght);
CREATE INDEX cms_page_caf7cc51 ON `cms_page` (lft);
CREATE INDEX cms_page_c9e9a848 ON `cms_page` (level);
CREATE INDEX cms_page_e721871e ON `cms_page` (application_urls);
CREATE INDEX cms_page_4fa1c803 ON `cms_page` (is_home);
CREATE INDEX cms_page_cb540373 ON `cms_page` (limit_visibility_in_menu);
CREATE INDEX cms_page_7b8acfa6 ON `cms_page` (navigation_extenders);
CREATE INDEX cms_page_3d9ef52f ON `cms_page` (reverse_id);
CREATE INDEX cms_page_1d85575d ON `cms_page` (soft_root);
CREATE INDEX cms_page_db3eb53f ON `cms_page` (in_navigation);
CREATE INDEX cms_page_2247c5f0 ON `cms_page` (publication_end_date);
CREATE INDEX cms_page_93b83098 ON `cms_page` (publication_date);
INSERT INTO `cms_page` (`id`,`created_by`,`changed_by`,`creation_date`,`changed_date`,`publication_date`,`publication_end_date`,`in_navigation`,`soft_root`,`reverse_id`,`navigation_extenders`,`template`,`login_required`,`limit_visibility_in_menu`,`is_home`,`application_urls`,`application_namespace`,`level`,`lft`,`rght`,`tree_id`,`publisher_is_draft`,`languages`,`revision_id`,`xframe_options`,`parent_id`,`publisher_public_id`,`site_id`) VALUES (1,'script','script','2015-02-26 21:46:39.421381','2015-02-26 21:46:40.246548','2015-02-26 21:46:39.779019',NULL,0,0,NULL,NULL,'feature.html',0,NULL,1,NULL,NULL,0,1,2,1,1,'pt-BR',0,0,NULL,2,1);
INSERT INTO `cms_page` (`id`,`created_by`,`changed_by`,`creation_date`,`changed_date`,`publication_date`,`publication_end_date`,`in_navigation`,`soft_root`,`reverse_id`,`navigation_extenders`,`template`,`login_required`,`limit_visibility_in_menu`,`is_home`,`application_urls`,`application_namespace`,`level`,`lft`,`rght`,`tree_id`,`publisher_is_draft`,`languages`,`revision_id`,`xframe_options`,`parent_id`,`publisher_public_id`,`site_id`) VALUES (2,'script','script','2015-02-26 21:46:39.783847','2015-02-26 21:46:40.219158','2015-02-26 21:46:39.779019',NULL,0,0,NULL,NULL,'feature.html',0,NULL,1,NULL,NULL,0,1,2,2,0,'pt-BR',0,0,NULL,1,1);
DROP TABLE IF EXISTS `cms_page_placeholders`;
CREATE TABLE `cms_page_placeholders` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `page_id` integer NOT NULL,
  `placeholder_id` integer NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `cms_page_placeholders` (`id`,`page_id`,`placeholder_id`) VALUES (1,1,1);
INSERT INTO `cms_page_placeholders` (`id`,`page_id`,`placeholder_id`) VALUES (2,1,2);
INSERT INTO `cms_page_placeholders` (`id`,`page_id`,`placeholder_id`) VALUES (3,2,3);
INSERT INTO `cms_page_placeholders` (`id`,`page_id`,`placeholder_id`) VALUES (4,2,4);
DROP TABLE IF EXISTS `cms_pagepermission`;
CREATE TABLE `cms_pagepermission` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `can_change` bool NOT NULL,
  `can_add` bool NOT NULL,
  `can_delete` bool NOT NULL,
  `can_change_advanced_settings` bool NOT NULL,
  `can_publish` bool NOT NULL,
  `can_change_permissions` bool NOT NULL,
  `can_move_page` bool NOT NULL,
  `can_view` bool NOT NULL,
  `grant_on` integer NOT NULL,
  `group_id` integer,
  `page_id` integer,
  `user_id` integer,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_pagepermission_e8701ad4 ON `cms_pagepermission` (user_id);
CREATE INDEX cms_pagepermission_1a63c800 ON `cms_pagepermission` (page_id);
CREATE INDEX cms_pagepermission_0e939a4f ON `cms_pagepermission` (group_id);

DROP TABLE IF EXISTS `cms_pageuser`;
CREATE TABLE `cms_pageuser` (
  `user_ptr_id` integer NOT NULL,
  `created_by_id` integer NOT NULL,
  PRIMARY KEY (`user_ptr_id`)
);


DROP TABLE IF EXISTS `cms_pageusergroup`;
CREATE TABLE `cms_pageusergroup` (
  `group_ptr_id` integer NOT NULL,
  `created_by_id` integer NOT NULL,
  PRIMARY KEY (`group_ptr_id`)
);


DROP TABLE IF EXISTS `cms_placeholder`;
CREATE TABLE `cms_placeholder` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `slot` varchar(255) NOT NULL,
  `default_width` smallint unsigned,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_placeholder_5e97994e ON `cms_placeholder` (slot);
INSERT INTO `cms_placeholder` (`id`,`slot`,`default_width`) VALUES (1,'feature',NULL);
INSERT INTO `cms_placeholder` (`id`,`slot`,`default_width`) VALUES (2,'content',NULL);
INSERT INTO `cms_placeholder` (`id`,`slot`,`default_width`) VALUES (3,'feature',NULL);
INSERT INTO `cms_placeholder` (`id`,`slot`,`default_width`) VALUES (4,'content',NULL);
INSERT INTO `cms_placeholder` (`id`,`slot`,`default_width`) VALUES (5,'clipboard',NULL);
DROP TABLE IF EXISTS `cms_placeholderreference`;
CREATE TABLE `cms_placeholderreference` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `name` varchar(255) NOT NULL,
  `placeholder_ref_id` integer,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

CREATE INDEX cms_placeholderreference_328d0afc ON `cms_placeholderreference` (placeholder_ref_id);

DROP TABLE IF EXISTS `cms_staticplaceholder`;
CREATE TABLE `cms_staticplaceholder` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `dirty` bool NOT NULL,
  `creation_method` varchar(20) NOT NULL,
  `draft_id` integer,
  `public_id` integer,
  `site_id` integer,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_staticplaceholder_9365d6e7 ON `cms_staticplaceholder` (site_id);
CREATE INDEX cms_staticplaceholder_1ee2744d ON `cms_staticplaceholder` (public_id);
CREATE INDEX cms_staticplaceholder_5cb48773 ON `cms_staticplaceholder` (draft_id);

DROP TABLE IF EXISTS `cms_title`;
CREATE TABLE `cms_title` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `language` varchar(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `page_title` varchar(255),
  `menu_title` varchar(255),
  `meta_description` text,
  `slug` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `has_url_overwrite` bool NOT NULL,
  `redirect` varchar(255),
  `creation_date` datetime NOT NULL,
  `published` bool NOT NULL,
  `publisher_is_draft` bool NOT NULL,
  `publisher_state` smallint NOT NULL,
  `page_id` integer NOT NULL,
  `publisher_public_id` integer,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_title_1a63c800 ON `cms_title` (page_id);
CREATE INDEX cms_title_f7202fc0 ON `cms_title` (publisher_state);
CREATE INDEX cms_title_b7700099 ON `cms_title` (publisher_is_draft);
CREATE INDEX cms_title_1268de9a ON `cms_title` (has_url_overwrite);
CREATE INDEX cms_title_d6fe1d0b ON `cms_title` (path);
CREATE INDEX cms_title_2dbcba41 ON `cms_title` (slug);
CREATE INDEX cms_title_8512ae7d ON `cms_title` (language);
INSERT INTO `cms_title` (`id`,`language`,`title`,`page_title`,`menu_title`,`meta_description`,`slug`,`path`,`has_url_overwrite`,`redirect`,`creation_date`,`published`,`publisher_is_draft`,`publisher_state`,`page_id`,`publisher_public_id`) VALUES (1,'pt-BR','Início',NULL,NULL,NULL,'inicio','',0,NULL,'2015-02-26 21:46:39.463997',1,1,0,1,2);
INSERT INTO `cms_title` (`id`,`language`,`title`,`page_title`,`menu_title`,`meta_description`,`slug`,`path`,`has_url_overwrite`,`redirect`,`creation_date`,`published`,`publisher_is_draft`,`publisher_state`,`page_id`,`publisher_public_id`) VALUES (2,'pt-BR','Início',NULL,NULL,NULL,'inicio','',0,NULL,'2015-02-26 21:46:39.463997',1,0,1,2,1);
DROP TABLE IF EXISTS `cms_usersettings`;
CREATE TABLE `cms_usersettings` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `language` varchar(10) NOT NULL,
  `clipboard_id` integer,
  `user_id` integer NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE INDEX cms_usersettings_2655b062 ON `cms_usersettings` (clipboard_id);
INSERT INTO `cms_usersettings` (`id`,`language`,`clipboard_id`,`user_id`) VALUES (1,'pt-BR',5,1);
DROP TABLE IF EXISTS `django_site`;
CREATE TABLE `django_site` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `django_site` (`id`,`domain`,`name`) VALUES (1,'example.com','example.com');
DROP TABLE IF EXISTS `djangocms_column_column`;
CREATE TABLE `djangocms_column_column` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `width` varchar(50) NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

INSERT INTO `djangocms_column_column` (`cmsplugin_ptr_id`,`width`) VALUES (3,'33%');
INSERT INTO `djangocms_column_column` (`cmsplugin_ptr_id`,`width`) VALUES (5,'33%');
INSERT INTO `djangocms_column_column` (`cmsplugin_ptr_id`,`width`) VALUES (7,'33%');
INSERT INTO `djangocms_column_column` (`cmsplugin_ptr_id`,`width`) VALUES (11,'33%');
INSERT INTO `djangocms_column_column` (`cmsplugin_ptr_id`,`width`) VALUES (13,'33%');
INSERT INTO `djangocms_column_column` (`cmsplugin_ptr_id`,`width`) VALUES (15,'33%');
DROP TABLE IF EXISTS `djangocms_column_multicolumns`;
CREATE TABLE `djangocms_column_multicolumns` (
  `cmsplugin_ptr_id` integer NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

INSERT INTO `djangocms_column_multicolumns` (`cmsplugin_ptr_id`) VALUES (2);
INSERT INTO `djangocms_column_multicolumns` (`cmsplugin_ptr_id`) VALUES (10);
DROP TABLE IF EXISTS `djangocms_file_file`;
CREATE TABLE `djangocms_file_file` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `file` varchar(100) NOT NULL,
  `title` varchar(255),
  `target` varchar(100) NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);


DROP TABLE IF EXISTS `djangocms_flash_flash`;
CREATE TABLE `djangocms_flash_flash` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `file` varchar(100) NOT NULL,
  `width` varchar(6) NOT NULL,
  `height` varchar(6) NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);


DROP TABLE IF EXISTS `djangocms_googlemap_googlemap`;
CREATE TABLE `djangocms_googlemap_googlemap` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `title` varchar(100),
  `address` varchar(150) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `city` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `zoom` smallint unsigned NOT NULL,
  `lat` decimal,
  `lng` decimal,
  `route_planer_title` varchar(150),
  `route_planer` bool NOT NULL,
  `width` varchar(6) NOT NULL,
  `height` varchar(6) NOT NULL,
  `info_window` bool NOT NULL,
  `scrollwheel` bool NOT NULL,
  `double_click_zoom` bool NOT NULL,
  `draggable` bool NOT NULL,
  `keyboard_shortcuts` bool NOT NULL,
  `pan_control` bool NOT NULL,
  `zoom_control` bool NOT NULL,
  `street_view_control` bool NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);


DROP TABLE IF EXISTS `djangocms_inherit_inheritpageplaceholder`;
CREATE TABLE `djangocms_inherit_inheritpageplaceholder` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `from_language` varchar(5),
  `from_page_id` integer,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

CREATE INDEX djangocms_inherit_inheritpageplaceholder_ccbb37bf ON `djangocms_inherit_inheritpageplaceholder` (from_page_id);

DROP TABLE IF EXISTS `djangocms_link_link`;
CREATE TABLE `djangocms_link_link` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `anchor` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL,
  `url` varchar(200),
  `mailto` varchar(75),
  `phone` varchar(40),
  `target` varchar(100) NOT NULL,
  `page_link_id` integer,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

CREATE INDEX djangocms_link_link_d916d256 ON `djangocms_link_link` (page_link_id);

DROP TABLE IF EXISTS `djangocms_picture_picture`;
CREATE TABLE `djangocms_picture_picture` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `image` varchar(100) NOT NULL,
  `url` varchar(255),
  `alt` varchar(255),
  `longdesc` varchar(255),
  `float` varchar(10),
  `page_link_id` integer,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

CREATE INDEX djangocms_picture_picture_d916d256 ON `djangocms_picture_picture` (page_link_id);

DROP TABLE IF EXISTS `djangocms_style_style`;
CREATE TABLE `djangocms_style_style` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `class_name` varchar(50),
  `tag_type` varchar(50) NOT NULL,
  `padding_left` smallint,
  `padding_right` smallint,
  `padding_top` smallint,
  `padding_bottom` smallint,
  `margin_left` smallint,
  `margin_right` smallint,
  `margin_top` smallint,
  `margin_bottom` smallint,
  `additional_classes` varchar(200) NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);


DROP TABLE IF EXISTS `djangocms_teaser_teaser`;
CREATE TABLE `djangocms_teaser_teaser` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(100),
  `url` varchar(255),
  `description` text,
  `page_link_id` integer,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

CREATE INDEX djangocms_teaser_teaser_d916d256 ON `djangocms_teaser_teaser` (page_link_id);

DROP TABLE IF EXISTS `djangocms_text_ckeditor_text`;
CREATE TABLE `djangocms_text_ckeditor_text` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);

INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (1,'<h1>Welcome to django CMS!</h1><p>The easy-to-use and developer-friendly CMS</p>');
INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (4,'<h2>Plugin-based</h2>
<p>Highly extendable plugin-based system that allows you to freely build sites
with various kinds of contents.</p>
<h2>Pretty URLs</h2>
<p>Thanks to readable URLs the page structures are perfect for search engine
optimizations (SEO).</p>
<h2>Plugin-based</h2>
<p>Integrate an online shop with django SHOP - a highly flexible and
extendable e-commerce solution.</p>
');
INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (6,'<h2>Permission management</h2>
<p>Permission management to set specific rights to different users.</p>
<h2>Apps</h2>
<p>Add hundreds of available Python apps easily or get the ready to use
add-ons.</p>
<h2>Frontend-Editing</h2>
<p>Frontend-editing to directly change content on your website. Works with all
plugins.</p>
');
INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (8,'<h2>Analytics</h2>
<p>Add your Google Analytics account to the CMS to track all relevant data
about your users.</p>
<h2>Developers</h2>
<p>Hundreds of developers manage the continuous development of django CMS via
GitHub.</p>
<h2>International</h2>
<p>Administer multiple sites and languages. The CMS itself is translated in
over 40 languages.</p>
');
INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (9,'<h1>Welcome to django CMS!</h1><p>The easy-to-use and developer-friendly CMS</p>');
INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (12,'<h2>Plugin-based</h2>
<p>Highly extendable plugin-based system that allows you to freely build sites
with various kinds of contents.</p>
<h2>Pretty URLs</h2>
<p>Thanks to readable URLs the page structures are perfect for search engine
optimizations (SEO).</p>
<h2>Plugin-based</h2>
<p>Integrate an online shop with django SHOP - a highly flexible and
extendable e-commerce solution.</p>
');
INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (14,'<h2>Permission management</h2>
<p>Permission management to set specific rights to different users.</p>
<h2>Apps</h2>
<p>Add hundreds of available Python apps easily or get the ready to use
add-ons.</p>
<h2>Frontend-Editing</h2>
<p>Frontend-editing to directly change content on your website. Works with all
plugins.</p>
');
INSERT INTO `djangocms_text_ckeditor_text` (`cmsplugin_ptr_id`,`body`) VALUES (16,'<h2>Analytics</h2>
<p>Add your Google Analytics account to the CMS to track all relevant data
about your users.</p>
<h2>Developers</h2>
<p>Hundreds of developers manage the continuous development of django CMS via
GitHub.</p>
<h2>International</h2>
<p>Administer multiple sites and languages. The CMS itself is translated in
over 40 languages.</p>
');
DROP TABLE IF EXISTS `djangocms_video_video`;
CREATE TABLE `djangocms_video_video` (
  `cmsplugin_ptr_id` integer NOT NULL,
  `movie` varchar(100),
  `movie_url` varchar(255),
  `image` varchar(100),
  `width` smallint unsigned NOT NULL,
  `height` smallint unsigned NOT NULL,
  `auto_play` bool NOT NULL,
  `auto_hide` bool NOT NULL,
  `fullscreen` bool NOT NULL,
  `loop` bool NOT NULL,
  `bgcolor` varchar(6) NOT NULL,
  `textcolor` varchar(6) NOT NULL,
  `seekbarcolor` varchar(6) NOT NULL,
  `seekbarbgcolor` varchar(6) NOT NULL,
  `loadingbarcolor` varchar(6) NOT NULL,
  `buttonoutcolor` varchar(6) NOT NULL,
  `buttonovercolor` varchar(6) NOT NULL,
  `buttonhighlightcolor` varchar(6) NOT NULL,
  PRIMARY KEY (`cmsplugin_ptr_id`)
);


DROP TABLE IF EXISTS `menus_cachekey`;
CREATE TABLE `menus_cachekey` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  `site` integer unsigned NOT NULL,
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `menus_cachekey` (`id`,`language`,`site`,`key`) VALUES (1,'pt-br',1,'menu_cache_menu_nodes_pt-br_1');
DROP TABLE IF EXISTS `reversion_revision`;
CREATE TABLE `reversion_revision` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `manager_slug` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL,
  `comment` text NOT NULL,
  `user_id` integer,
  PRIMARY KEY (`id`)
);

CREATE INDEX reversion_revision_e8701ad4 ON `reversion_revision` (user_id);
CREATE INDEX reversion_revision_c69e55a4 ON `reversion_revision` (date_created);
CREATE INDEX reversion_revision_b16b0f06 ON `reversion_revision` (manager_slug);

DROP TABLE IF EXISTS `reversion_version`;
CREATE TABLE `reversion_version` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `object_id` text NOT NULL,
  `object_id_int` integer,
  `format` varchar(255) NOT NULL,
  `serialized_data` text NOT NULL,
  `object_repr` text NOT NULL,
  `content_type_id` integer NOT NULL,
  `revision_id` integer NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE INDEX reversion_version_5de09a8d ON `reversion_version` (revision_id);
CREATE INDEX reversion_version_417f1b1c ON `reversion_version` (content_type_id);
CREATE INDEX reversion_version_0c9ba3a3 ON `reversion_version` (object_id_int);
