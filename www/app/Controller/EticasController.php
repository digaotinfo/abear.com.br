<?php

App::uses('Controller', 'Controller');

class EticasController extends AppController {
    var $name 		= "Eticas";
    public $helpers = array('Html', 'Session', 'Form');
    var $uses		= array('Etica', 'Texto' );
    var $scaffold 	= 'admin';
  	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									//'publicar_em_ptbr'	=> 'Public. em Português',
									'chamada_ptbr'		=> 'Chamada em Português',
									//'tags_ptbr'			=>	'TAG em Português'

								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Etica->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}
