<?
class DadosefatotiposController extends AppController {
    var $name 		= "Dadosefatotipos";
    public $helpers = array('Html', 'Session', 'Form');
    //public $uses 	= array('Dadosefatotipo');
    var $transformUrl = array('url_amigavel_ptbr' => 'nome_ptbr');
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
									'id'		=> 'ID',
									'nome_ptbr' => 'Nome em Português',
									'ordem'		=> 'Ordem',
									'ativo' 	=> 'Ativo'

								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Dadosefatotipo->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}