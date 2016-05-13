<?
class ImprensaGaleriasController extends AppController{
	var $name = "ImprensaGalerias";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	//public $uses = array('ImprensaGaleria');
	var $scaffold = 'admin';
	
	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									//'imprensa_galeria_capa_id' => 'Album',
									'titulo_ptbr'		=> 'Titulo em Português',
								);
			$showImage	=	array(
								'img_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->ImprensaGaleria->schema());
		}
	}
}