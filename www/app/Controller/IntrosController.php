<?
class IntrosController extends AppController{
	var $name = "Intros";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	//public $uses = array('ImpresaGalerriasCapa');
	var $scaffold = 'admin';
	var $transformUrl = array(
								'url_amigavel_ptbr' => 'texto_ptbr',
								'url_amigavel_eng'  => 'texto_eng',
								'url_amigavel_esp'  => 'texto_esp'
								
								);
    var $paginate = array(
                        'order'  => array(
                                        'id' => 'desc'
                        ),
                   );  
	
	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'texto_ptbr'		=> 'Texto em Português',
									'intro_categoria_id' => 'Categoria de Introducão',
									'ativo'				 => 'Ativo'
								);
			$showImage	=	array(
								//'img_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Intro->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}