<?
class NewslettersEditableTypesController extends AppController{
	var $name 		= "NewslettersEditableTypes";
    public $helpers = array('Html', 'Session', 'Form', 'Text');
    // var $uses		= array('NewslettersEditableType');
    var $scaffold 	= 'admin';
  	var $transformUrl = array('url_amigavel_ptbr' => 'nome');



	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'nome'		=> 'Nome',
									// 'img_file' 	=> 'Modelo',
								);
			$showImage	=	array(
								'img_th_hidden'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->NewslettersEditableType->schema());
		}
	}
}