<?
class AviacaosController extends AppController{
	var $name = "Aviacaos";
	public $helpers = array('Html', 'Session', 'Form');
	//public $uses = array('minha_model');
	var $scaffold = 'admin';
	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();
		
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',	
								);
			$showImage	=	array(
/* 								'img_file' */
							);
			
			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
			
			
			$this->set('schemaTable', $this->Aviacao->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
	
}