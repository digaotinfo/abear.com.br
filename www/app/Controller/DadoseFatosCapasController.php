<?
class DadoseFatosCapasController extends AppController{
	var $name 		= "DadoseFatosCapas";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
    //public $uses 	= array('DadoseFatosCapa');
    var $scaffold 	= 'admin';
    
    var $paginate = array(
                        'order'  => array(
                                        'id' => 'DESC'
                        ),
                        );     
    
    function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		 	=> 'ID',
									'titulo_ptbr' 	=> 'Titulo em Português',
									'dadosefato_id'=> 'Dados e Fatos',
									'ativo'			=> 'Ativo',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->DadoseFatosCapa->schema());
		}
	}
}