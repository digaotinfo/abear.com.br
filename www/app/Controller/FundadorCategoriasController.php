<?
class FundadorCategoriasController extends AppController{
	var $name 		= "FundadorCategorias";
    public $helpers = array('Html', 'Session', 'Form');
    //var $uses		= array('Comites');
    var $scaffold 	= 'admin';
  	var $transformUrl = array('url_amigavel_ptbr' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'categoria'	=> 'Categoria',

								);
			$showImage	=	array(
								//'foto_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->FundadorCategoria->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
	

}
