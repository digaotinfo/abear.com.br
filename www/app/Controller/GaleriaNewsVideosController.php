<?
class GaleriaNewsVideosController extends AppController{
	var $name = "GaleriaNewsVideos";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	//public $uses = array('Logo', 'Abear', 'Texto');
	var $scaffold = 'admin';
	
	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'titulo_ptbr'		=> 'Titulo em Português',
									//'descricao_ptbr'	=> 'Descrição em Português',
									//'ativo'				=> 'Ativo',

								);
			$showImage	=	array(
								'imgagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->GaleriaNewsVideo->schema());
		}
	}	
}