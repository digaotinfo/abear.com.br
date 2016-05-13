<?
class Logo extends AppModel{
	var $useTable = 'tb_logos';
	
	public $displayField = 'name_logo';
	
    public $belongsTo = array(
						'Sobre' => array(
										'className' => 'Sobre'
											));
	}