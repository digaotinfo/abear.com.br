<?
class GaleriaCategoriasController extends AppController{
	var $name 		= "GaleriaCategorias";
    public $helpers = array('Html', 'Session', 'Form');
    //gvar $uses		= array('CategoriaImagem');
    var $scaffold 	= 'admin';
  	var $transformUrl = array(
  								'url_amigavel_ptbr' => 'nome_ptbr',
  								'url_amigavel_eng'  => 'nome_eng',
  								'url_amigavel_esp'  => 'nome_esp',
  								);


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'nome_ptbr'	=> 'Nome em Português',

								);
			$showImage	=	array(
								//'foto_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->GaleriaCategoria->schema());
			
			$this->buscaGenerica($showThisFields);
		}
	}
}