<?
class MaisLidasController extends AppController{
	var $name = "MaisLidas";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	//public $uses = array('MaisLida');
	var $scaffold = 'admin';
/* 	var $transformUrl = array('url_amigavel' => 'titulo'); */
	
	function beforeFilter() {
		parent::beforeFilter();
		
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'news_associados_id'	=> 'Id Associados',
									
								);
			$showImage	=	array(
								'',
							);
			
			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
			
			
			$this->set('schemaTable', $this->MaisLida->schema());
		}
	}
}