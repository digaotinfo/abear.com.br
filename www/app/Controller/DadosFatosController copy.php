<?php
App::uses('Controller', 'Controller');

class DadosfatosController extends AppController {
    var $name 		= "Dadosfatos";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text', 'Paginator');
    public $uses 	= array('Dadosefato', 'Texto', 'Dadosefatosgrafico', 'Dadosefatotipo', 'GaleriaImagenCapa', 'GaleriaImagen', 'GaleriaCategoria', 'VideoCategoria');
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
									'id'		 	=> 'ID',
									'titulo_ptbr' 	=> 'Titulo em Português',
									'dadosefatotipo_id'=> 'Tipo Dados e Fatos',
									'destaque'		=> 'Destaque',
									'inferior'		=> 'Inferior da Pagina',
									'ativo'			=> 'Ativo',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Dadosefato->schema());
		}
	}
    
    public function index($url=null){
    	$model = 'Dadosefato';
    
    	//print_r($url);
        $lang = $this->Cookie->read('lang');

        /// Categorias de Dados e Fatos
        $tipos = $this->Dadosefatotipo->find('all', array(
                                                            'fields' => array(
				                                                            	'id',
				                                                                'url_amigavel_'.$lang,
				                                                                'nome_'.$lang,
                                                                				),
                                                            'conditions' => array(
				                                                                'Dadosefatotipo.ativo' => 1,
				                                                                'nome_'. $lang. ' <>' => '', 
                                                                					),
                                                            'order' => array(
                                                            					'ordem' => 'ASC'
                                                            					),
                                                                ));
                                   
		if(!empty($url)){
		//print_r($url);
				$agenda = $this->$model->find('all', array(
														'fields' => array(
																			'id',
																			'Dadosefato.galeria_imagen_capa_id',
																			'Dadosefato.titulo_'.$lang,
																			'chamada_'.$lang,
																			'texto_'.$lang,
																			'Dadosefatotipo.url_amigavel_'.$lang,
																			'dadosefatotipo_id',
																			'Dadosefato.url_amigavel_'.$lang,
																			),
														'conditions' => array(
																				'Dadosefato.destaque_superior' => 1,
																				'inferior' => 0,
																				'Dadosefato.titulo_'.$lang. ' <>' => '',
																				'Dadosefatotipo.url_amigavel_'.$lang => $url,
																				),
														//'limit' => 2,
														'order' => array(
																			'Dadosefato.id' => 'DESC'
																			),
														'recursive' => 2
														));
                                    										
           $this->paginate = array(
									'fields' => array(
													'id',
													'Dadosefato.galeria_imagen_capa_id',
													'Dadosefato.titulo_'.$lang,
													'chamada_'.$lang,
													'texto_'.$lang,
													'url_amigavel_'.$lang,
													'dadosefatotipo_id',
													'Dadosefatotipo.url_amigavel_'.$lang,
													),
	                                'conditions' => array(
	                                					'Dadosefato.destaque_superior' => 0,
	                                					'Dadosefato.inferior' => 1,
	                                					'Dadosefato.ativo' => 1,
											            'Dadosefato.titulo_'.$lang. ' <>' => '',
											            'Dadosefatotipo.url_amigavel_'.$lang => $url,
											            ),
	                                'order' 	 => array(
	                                    				'ordem_da_importancia' => 'DESC',
	                                    				),
	                                'limit' => 4,
	                                'recursive' => 2
									);
									
			$agenda_inferior = $this->paginate($model);
						
		}else{		
			$agenda = $this->$model->find('all', array(
													'fields' => array(
																		'id',
																		'Dadosefato.galeria_imagen_capa_id',
																		'Dadosefato.titulo_'.$lang,
																		'chamada_'.$lang,
																		'texto_'.$lang,
																		'Dadosefato.url_amigavel_'.$lang,
																		'dadosefatotipo_id',
																		'Dadosefatotipo.url_amigavel_'.$lang,
																		),
													'conditions' => array(
																			'Dadosefato.destaque_superior' => 1,
																			'inferior' => 0,
																			'Dadosefato.ativo' => 1,
																			'Dadosefato.titulo_'.$lang. ' <>' => ''
																			),
													'limit' => 2,
													'order' => array(
																		'ordem_da_importancia' => 'ASC'
																		),
													'recursive' => 2					
														));	
		
			$this->paginate = array(
									'fields' => array(
													'id',
													'Dadosefato.galeria_imagen_capa_id',
													'Dadosefato.titulo_'.$lang,
													'chamada_'.$lang,
													'texto_'.$lang,
													'url_amigavel_'.$lang,
													'dadosefatotipo_id',
													'Dadosefatotipo.url_amigavel_'.$lang,
													),
                                    'conditions' => array(
                                    					'Dadosefato.destaque_superior' => 0,
                                    					'inferior' => 1,
                                    					'Dadosefato.ativo' => 1,
											            ),
                                    'order' 	 => array(
                                        				'ordem_da_importancia' => 'ASC',
                                        				),
                                    'limit' => 4,
                                    'recursive' => 2
									);
									
			$agenda_inferior = $this->paginate($model);
	}	
	
       $this->set(array(
						'model' => $model,
    					'lang' => $lang,
    					'tipos' => $tipos,
    					'agenda' => $agenda, 
    					'inferior' => $agenda_inferior,
    					));
    
    //print_r($url);
    								
    }
}
