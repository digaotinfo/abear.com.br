<?php
class Sitemapcategoria extends AppModel {
	var $name = "tb_sitemap_categoria"; //para tornar o script compatível com php4
		//tem que ser TB_MENU, sem o S, porque se colocar TB_MENUS ele procura por TB_MENUSES.

	
	public $validate = array(
		'categoria' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Favor informar o titulo'
			)
		),'url' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Favor informar a url'
			)
		)
	);
	
	var $displayField = 'categoria';
   
	var $order = array("Sitemapcategoria.lateral" => "DESC" ,"Sitemapcategoria.ordem" => "ASC" ,"Sitemapcategoria.categoria" => "ASC");
	
	var $hasMany = array(
		'Sitemapsubcategoria' 	=> array(
			'className' 	=> 'Sitemapsubcategoria',
			'foreignKey' 	=> 'sitemapcategoria_id'
		),
	);
}