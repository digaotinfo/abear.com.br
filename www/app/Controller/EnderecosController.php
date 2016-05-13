<?php

class EnderecosController extends AppController {
    var $name 		= "Enderecos";
    public $helpers = array('Html', 'Session', 'Form');
    //var $uses		= array('Enderecos');
    var $scaffold 	= 'admin';


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'cidade'			=> 'Cidade',
								);
			$showImage	=	array(
								'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Endereco->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
        
}