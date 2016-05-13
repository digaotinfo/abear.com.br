<?php
App::uses('Controller', 'Controller');

class EstruturasController extends AppController {
    var $name 		= "Estruturas";
    public $helpers = array('Html', 'Session', 'Form');
    var $uses		= array('Estrutura', 'Texto', 'Logo', 'Comite', 'Diretor', 'DecricaoDiretoria');
    var $scaffold 	= 'admin';
  	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'	=> 'ID',
									'nome'	=> 'Nome',
									'order'	=> 'Ordem'
								);
			$showImage	=	array(
								'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Estrutura->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
        
}