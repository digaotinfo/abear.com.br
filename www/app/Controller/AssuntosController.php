<?
class AssuntosController extends AppController{
    var $name = "Assuntos";
	public $helpers = array('Html', 'Session', 'Form');
	//public $uses = array('minha_model');
	var $scaffold = 'admin';
	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();
		
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
                                                                        'id'	  => 'ID',
                                                                        'assunto' => 'Assunto',
								);
			$showImage	=	array(
								''
							);
			
			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
			
			
			$this->set('schemaTable', $this->Assunto->schema());
		}
	}
        
        function index(){
        	$model = 'Assunto';
        	$this->set('model', $model);
        
            $assunto = $this->Assunto->find('all', array(
                                                            'fields' => array(
                                                                'id',
                                                                'assunto',
                                                            ),
                                    'order' => array(
                                                    'id' => 'DESC',
                                                ),
                                    ));

            $this->set('assunto', $assunto);
        }
}