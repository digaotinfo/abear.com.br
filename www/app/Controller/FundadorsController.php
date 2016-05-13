<?
class FundadorsController extends AppController{
    var $name 		= "Fundadors";
    public $helpers = array('Html', 'Session', 'Form');
    var $uses		= array('Fundador', 'Texto');
    var $scaffold 	= 'admin';
  	var $transformUrl = array('url_amigavel_ptbr' => 'titulo_ptbr');
    var $paginate = array(
                'order'  => array(
                                'id' => 'DESC'
                ),
                );   

	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'nome'				=> 'Nome',
									'fundador_categoria_id' => 'Categoria',
									'ativo'				=> 'Ativo',

								);
			$showImage	=	array(
								'logo_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Fundador->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}
