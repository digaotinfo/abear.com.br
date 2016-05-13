<?php
class VoarMaisBrasilMidiasController extends AppController{
	var $name 		= "VoarMaisBrasilMidias";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Paginator');
    //var $uses		= array('VoarMaisBrasilMidia');
    var $scaffold 	= 'admin';
    // public $components = array('Paginator');
    var $paginate = array(
                        'order'  => array(
                                        'id' => 'DESC'
                        ),
                        );   

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


			$this->set('schemaTable', $this->VoarMaisBrasilMidia->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
	
}
