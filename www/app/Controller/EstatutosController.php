<?
class EstatutosController extends AppController{
	var $name = "Estatutos";
	public $helpers = array('Html', 'Session', 'Form');
    // var $uses		= array('Estatuto');
    var $scaffold 	= 'admin';
  	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			=> 'ID',
									'titulo_ptbr' 	=> 'Titulo em Português',
									'ativo'			=> 'Ativo',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Estatuto->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
	
}