<?
class NotaReleasesController extends AppController{
	var $name 		= "NotaReleases";
    public $helpers = array('Html', 'Session', 'Form', 'Paginator', 'Time', 'Text');
    var $uses		= array('NotaRelease');
    var $scaffold 	= 'admin';
	public $components = array('Paginator');
  	//var $transformUrl = array('url_amigavel_ptbr' => 'titulo_ptbr');



	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'	=> 'ID',
									'nome'	=> 'Nome',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->NotaRelease->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}