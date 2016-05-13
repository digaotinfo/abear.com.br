<?php
class Sitemapsubcategoria extends AppModel {
	var $name = "tb_sitemap_subcategoria"; //para tornar o script compatível com php4
		//tem que ser TB_MENU, sem o S, porque se colocar TB_MENUS ele procura por TB_MENUSES.

	
	public $validate = array(
		'sitemapcategoria_id' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Favor informar a categoria'
			)
		),
		'subcategoria' => array(
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
	
	var $displayField = 'subcategoria';
   
	var $order = array("Sitemapsubcategoria.ordem" => "ASC" ,"Sitemapsubcategoria.subcategoria" => "ASC");
	
	public $belongsTo = array('Sitemapcategoria');
}