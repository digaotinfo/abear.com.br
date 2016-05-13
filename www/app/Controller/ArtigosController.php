<?
class ArtigosController extends AppController{
	var $name 		= "Artigos";
    public $helpers = array('Html', 'Session', 'Form', 'Paginator', 'Time', 'Text');
    var $uses		= array('Artigo');
    var $scaffold 	= 'admin';
	public $components = array('Paginator');
  	//var $transformUrl = array('url_amigavel_ptbr' => 'titulo_ptbr');



	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Artigo->schema());
		}
	}

	function index(){
		$model = 'Artigo';
		$this->set('model', $model);
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);

		$this->Paginator->settings = array(
	        'limit' => 6,
			'conditions' => array(
				"publicar_em_{$lang}" => 1
			),
			'order' => 'created DESC'
	    );

		$artigos = $this->Paginator->paginate('Artigo');
		$this->set('artigos', $artigos);

	}
}
