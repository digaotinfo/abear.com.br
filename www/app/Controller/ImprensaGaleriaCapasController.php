<?
class ImprensaGaleriaCapasController extends AppController{
	var $name = "ImprensaGaleriaCapas";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	//public $uses = array('ImpresaGalerriasCapa');
	var $scaffold = 'admin';
	var $transformUrl = array(
								'url_amigavel_ptbr' => 'titulo_ptbr',
								'url_amigavel_eng' => 'titulo_eng',
								'url_amigavel_esp' => 'titulo_esp'
								
								);
	
	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'titulo_ptbr'		=> 'Titulo em Português',
								);
			$showImage	=	array(
								'img_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->ImprensaGaleriaCapa->schema());
		}
	}

}