<?

class PaisesController extends AppController{
	var $name = "Paises";
	public $helpers = array('Html', 'Session', 'Form');
	//public $uses = array('Midiakit');
	var $scaffold = 'admin';
	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');
	
	
	function beforeFilter() {
		parent::beforeFilter();
		
		/*
if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			=> 'ID',
									'uf'			=> 'UF',
									'estado'		=> 'Pica',
								);
			$showImage	=	array(
								'',
							);
			
			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
			
			
			$this->set('schemaTable', $this->Estado->schema());
		}
*/
	}
    
    
    
}