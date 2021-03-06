<?
class DescricaoDiretoriasController extends AppController{
 	var $name 		= "DescricaoDiretorias";
    public $helpers = array('Html', 'Session', 'Form');
    //var $uses		= array('Estrutura', 'Texto', 'Logo', 'Comite');
    var $scaffold 	= 'admin';
  	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		  => 'ID',
									'titulo_ptbr' => 'Titulo em Português'

								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->DescricaoDiretoria->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
	
}
