<?php

App::uses('Controller', 'Controller');

class SetoraereosController extends AppController {
    var $name 		= "Setoraereos";
    public $helpers = array('Html', 'Session', 'Form');
    public $uses 	= array('Setoraereo', 'Texto');
    var $scaffold 	= 'admin';
    var $transformUrl = array(
                            'url_amigavel_ptbr' => 'nome_ptbr',
                            'url_amigavel_eng' => 'nome_eng',
                            'url_amigavel_esp' => 'nome_esp'
                        );
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
									'nome_ptbr'		=> 'Nome em Português',
									'ativo'			=> 'Ativo',
									'order'			=> 'Ordem',

								);
			$showImage	=	array(
								'imgagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Setoraereo->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}
