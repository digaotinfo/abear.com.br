<?
class VideoCategoriasController extends AppController{
	var $name 		= "VideoCategorias";
    public $helpers = array('Html', 'Session', 'Form', 'Time');
   // var $uses		= array('VideoCategoria');
    var $scaffold 	= 'admin';
  	var $transformUrl = array(
  								'url_amigavel_ptbr' => 'nome_ptbr',
  								'url_amigavel_eng' => 'nome_eng',
  								'url_amigavel_esp' => 'nome_esp',
  								);

	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'nome_ptbr'	=> 'Nome da Categoria em Português',

								);
			$showImage	=	array(
								//'foto_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->VideoCategoria->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}