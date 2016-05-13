<?
App::uses('AppController', 'Controller');

class BannersController extends AppController{
    	var $name 		= "Banners";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Paginator');
    //var $uses		= array('ImprensaVideo');
    var $scaffold 	= 'admin';
    var $transformUrl = array(
    							'url_amigavel_ptbr' => 'titulo_ptbr',
    							'url_amigavel_eng'  => 'titulo_eng',
    							'url_amigavel_esp'  => 'titulo_esp',
    							);

	var $paginate = array(
                        'order'  => array(
                                        'id' => 'desc'
                        ),
                   ); 

	function beforeFilter() {
		parent::beforeFilter();
		
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',
									'order'			=> 'Ordem',
									'ativo'			=> 'Ativo'									
									
								);
			$showImage	=	array(
								'banner_file'
							);
			
			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
			
			
			$this->set('schemaTable', $this->Banner->schema());
		}
	}
			
}