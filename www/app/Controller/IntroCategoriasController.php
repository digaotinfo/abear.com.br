<?
class IntroCategoriasController extends AppController{
	var $name = "IntroCategorias";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	//public $uses = array('ImpresaGalerriasCapa');
	var $scaffold = 'admin';
	var $transformUrl = array(
								'url_amigavel_ptbr' => 'categoria_ptbr',
								'url_amigavel_eng' => 'categoria_esp',
								'url_amigavel_esp' => 'categoria_esp'
								
								);
	
	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'categoria_ptbr'		=> 'Categoria em Português',
								);
			$showImage	=	array(
								//'img_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->IntroCategoria->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}