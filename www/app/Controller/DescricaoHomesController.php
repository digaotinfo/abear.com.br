<?
class DescricaoHomesController extends AppController{
	var $name 		= "DescricaoHomes";
    public $helpers = array('Html', 'Session', 'Form');
    //var $uses		= array('DescricaoHome');
    var $scaffold 	= 'admin';


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',
								);
			$showImage	=	array(
								'logos_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->DescricaoHome->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}