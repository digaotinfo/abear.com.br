<?
class VoarExperienciasController extends AppController{
	var $name 		= "VoarExperiencias";
    public $helpers = array('Html', 'Session', 'Form', 'Time');
    var $uses		= array('VoarExperiencia', 'NasAeronavesTitulo', 'VoarExperienciaVideo', 'VoarMaisBrasilMidia', 'VoarMaisBrasil', 'GuiaPassageiro', 'Clube', 'ClubeTexto', 'TransporteOrgao', 'TransporteOrgaoVideo', 'GaleriaCategoria', 'GaleriaImagenCapa');
    var $scaffold 	= 'admin';
    var $paginate = array(
                        'order'  => array(
                                        'id' => 'DESC'
                        ),
                        );

	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',

								);
			$showImage	=	array(
								//'foto_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->VoarExperiencia->schema());
		}
	}
	
	public function index() {
	}
	
	public function guia_passageiros($id=null) {
		$model = 'GuiaPassageiro';
		$this->set('model', $model);
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);
		
		
		$imgs = $this->$model->find('all', array(
													'fields' => array(
																		'id',
																		'img_' .$lang. '_file',
																		'titulo_'.$lang,
																		'texto_'.$lang
																		),
													'conditions' => array(
																			'img_' .$lang. '_file <>' => '',
																			'ativo' => 1,
																		),
													'order' => array(
																		'ordem' => 'ASC'
																		),
													));
		$this->set(array(
							'imgs' => $imgs,
							));
	}
	
	function icones($id=null){
		$model ='GuiaPassageiro';
		$this->set('model', $model);
		$this->autoRender = false;
		
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);
		
		$guias = $this->$model->find('first', array(
													'fields' => array(
																		'id',
																		'titulo_'.$lang,
																		'texto_'.$lang,
																		'img_' .$lang. '_file',
																		),
													'conditions' => array(
																			'id' => $id
																			),
													));
		?>
		<script type="text/javascript" src="<?=$this->webroot;?>js/layouts/default.js"></script>
		<?php
		foreach($guias as $guia){
			?>
			<div class='title'><p><?=$guia['titulo_'.$lang]?></p></div>
			<div class='text'><p><?=$guia['texto_'.$lang]?></p></div>


			<div class='social_share'>
				<a href="<?= Router::url(array(
												'controller' => 'voarExperiencias', 
												'action' => 'urlcompartilhar',
												$guia['id']
											), true) ?>" share-pj='facebook'><div></div></a>
				<a href="<?= Router::url(array(
												'controller' => 'voarExperiencias', 
												'action' => 'urlcompartilhar',
												$guia['id']
											), true) ?>" share-pj='twitter'><div></div></a>
				<a href="<?= Router::url(array(
												'controller' => 'voarExperiencias', 
												'action' => 'urlcompartilhar',
												$guia['id']
											), true) ?>" modal-pj='.modal_mail'><div></div></a>
				<a href="<?= Router::url(array(
												'controller' => 'voarExperiencias', 
												'action' => 'urlcompartilhar',
												$guia['id']
											), true) ?>" share-pj='pinterest' share-pj-pinimg='<?=Router::url('/'.$guia['img_' .$lang. '_file'], true)?>' share-pj-pindesc='<?=$guia['titulo_'.$lang]?>'><div></div></a>
				<a href="<?= Router::url(array(
												'controller' => 'voarExperiencias', 
												'action' => 'urlcompartilhar',
												$guia['id']
											), true) ?>" share-pj='g-plus'><div></div></a>
			</div>
			<?php
		}
	}
	
	function urlcompartilhar($id=null){
		$model ='GuiaPassageiro';
		$this->set('model', $model);
		
		
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);
		
		$registro = $this->$model->find('first', array(
													'fields' => array(
																		'id',
																		'img_' .$lang. '_file',
																		'titulo_'.$lang,
																		'texto_'.$lang
																		),
													'conditions' => array(
																			'id' => $id
																			),
													));

		$this->set('registro', $registro);
	}
	
	function voar_mais_brasil(){
		$model = 'VoarMaisBrasil';
		$this->set('model', $model);
		
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);
		
		$txt = $this->$model->find('first', array(
													'fields' => array(
																		'id',
																		'titulo_'.$lang,
																		'texto_'.$lang,
																		'logo_' .$lang. '_file',
																		),
													'conditions' => array(
																		'titulo_'.$lang. ' <>' => ''
																		)
													));

		$this->paginate['fields'] = array('id', 'data', 'link_'.$lang, 'titulo_'.$lang, 'descricao_'.$lang);
		$this->paginate['conditions'] = array('titulo_'.$lang. ' <>' => '');
		$this->paginate['limit'] = 2;
		$midias = $this->paginate('VoarMaisBrasilMidia');
		
		$this->set(array(
							'txt' => $txt,
							'midias' => $midias,
							));
	}
	
	function nas_aeronaves(){
		$model = 'VoarExperiencia';
		$this->set('model', $model);
		
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);
		
		$fotos = $this->$model->find('all', array(
												'fields' => array(
																'id',
																'img_'.$lang.'_file',
																'img_'.$lang.'_th_hidden',
																'titulo_'.$lang,
																'texto_'.$lang,
																'url_amigavel_'.$lang,
																'ordem',	
																	),
												'conditions' => array(
																	'ativo' => 1,
																		),
												'order' => array(
																'ordem' => 'ASC',	
																	),
												'limit' => 20,
													));
	
		$titulos = $this->NasAeronavesTitulo->find('first', array(
																	'fields' => array(
																						'titulo_sup_'.$lang,
																						'titulo_inf_'.$lang,
																						),
																	'conditions' => array(
																							'ativo' => 1
																							),
																	));
		
		$this->set(array(
						'fotos'  => $fotos,
						'titulo' => $titulos,
						//'videos' => $videos
						));
	}
	
}