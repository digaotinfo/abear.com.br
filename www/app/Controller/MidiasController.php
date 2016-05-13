<?
class MidiasController extends AppController{
	var $name = "Midias";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	//public $uses = array('Logo', 'Abear', 'Texto');
	var $scaffold = 'admin';
	
	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'	=> 'ID',
									'nome'	=> 'Titulo em Português',
								);
			$showImage	=	array(
								'logo_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Midia->schema());
		}
	}	
}