<?
class AviacaoVideosController extends AppController{
	var $name 		= "AviacaoVideos";
    public $helpers = array('Html', 'Session', 'Form');
    //var $uses		= array('Comites');
    var $scaffold 	= 'admin';
  	//var $transformUrl = array('url_amigavel_ptbr' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		  	=> 'ID',
									'titulo_ptbr' 	=> 'Titulo em Português',
									'ativo' 		=> 'Ativo',
									'destaque' 		=> 'Destaque'
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->AviacaoVideo->schema());
		}
	}
}