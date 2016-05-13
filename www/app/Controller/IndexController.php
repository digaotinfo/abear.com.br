<?php

App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');

class IndexController extends AppController {
	public $name 	= 'Index';//'Html', 'Session', 'Form', 'Time', 'Paginator'
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Paginator', 'Text');
	public $uses 	= array('Banner', 'Noticia', 'Videos', 'Agenda', 'DescricaoHome', 'Estrutura');

	function beforeFilter() {
		parent::beforeFilter();
        //$this->Auth->allow('*');
	}

	public function index() {
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);

        $registro = $this->Banner->find('all', array(
        									'fields' => array(
        														'id',
        														'banner_file',
        														'titulo_'.$lang,
        														'url_'.$lang,
        														'url_amigavel_'.$lang,
        														'abrir_em_nova_janela',
        														'order',
        														'expansivel',
        														'banner_expandido_file',
        														// 'hover',
        														),
                                            'order' => array(
                                                            'order' => 'ASC',
                                                        ),
											'conditions' => array(
												'publicado_em_'.$lang => 1,
												'banner_file <>'  => '',
												'ativo' => 1
											),
											'order' => array(
															'order' => 'ASC'
															),
											'limit' => '4'
                                            ));

        $this->set('banners', $registro);

		$registro = $this->Noticia->find('all', array(
											'field' => array(
																'id',
																'titulo_'.$lang,
																'noticia_categoria_id',
																),
											'order' => array(
															'Noticia.id' => 'DESC',
														),
											'conditions' => array(
												'Noticia.titulo_'.$lang .' <>' => '',
												'Noticia.ativo' => 1,
												'Noticia.destaque' => 1
											),
											'limit' => '4'
											));

		$this->set('noticias', $registro);

		$registro = $this->Video->find('all', array(
											'fields' => array(
																'id',
																'video_'.$lang
																),
											'order' => array(
															'id' => 'DESC',
														),
											'conditions' => array(
												'video_'.$lang. ' <>' => '',
												'destaque_home' => 1,
												'ativo' => 1
											),
											'limit' => '3'
											));

		$this->set('videos', $registro);

		$agenda = $this->Agenda->find('all', array(
											'fields' => array(
																'Agenda.id',
																'Agenda.data',
																'Agenda.titulo_'.$lang,
																'Agenda.descricao_'.$lang,
																'Agenda.destaque_home',
																'Agenda.ativo',
																'Agenda.url_amigavel_'.$lang
																),
											'conditions' => array(
																	'Agenda.titulo_'.$lang.' <>' => '',
																	'Agenda.ativo' => 1,
																	'Agenda.destaque_home' => 1,
																	'Agenda.data >' => date('Y-m-d 00:01'),
																	),
											'order' => array(
															'Agenda.data' => 'ASC',
														),
											'limit' => '4'
											));

		// >>> caso não exista eventos na agenda de hj em diante, mostre os ultimos anteriores
		if( !$agenda ){
			$agenda = $this->Agenda->find('all', array(
											'fields' => array(
																'Agenda.id',
																'Agenda.data',
																'Agenda.titulo_'.$lang,
																'Agenda.descricao_'.$lang,
																'Agenda.destaque_home',
																'Agenda.ativo',
																'Agenda.url_amigavel_'.$lang
																),
											'conditions' => array(
																	'Agenda.titulo_'.$lang.' <>' => '',
																	'Agenda.ativo' => 1,
																	'Agenda.destaque_home' => 1,
																	'Agenda.data <' => date('Y-m-d 00:01'),
																	),
											'order' => array(
															'Agenda.data' => 'DESC',
														),
											'limit' => '4'
											));

		}
		$this->set('agendas', $agenda);
		// <<< caso não exista eventos na agenda de hj em diante, mostre os ultimos anteriores

		$descricao = $this->DescricaoHome->find('first', array(
																'fields' => array(
																					'id',
																					'texto_'.$lang,
																					'logos_file',
																					),
																'conditions' => array(
																						'titulo_'.$lang. ' <>' => '',
																						'ativo' => 1
																						)
																));
		$this->set('descricao', $descricao);

		$fundadores = $this->Estrutura->find('all', array(
															'fields' => array(
																				'id',
																				'foto_th_hidden',
																				),
															'order' => array(
																				'order' => 'ASC'
																				),
															));
		$this->set('fundadores', $fundadores);
		//print_r($fundadores);
	}


	///// ADMIN
	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////


	public function admin_index() {
		$menu_ativo = 'home';


		$this->layout = 'admin';
		$this->set(compact('menu_ativo'));
		$this->render();



	}

}
