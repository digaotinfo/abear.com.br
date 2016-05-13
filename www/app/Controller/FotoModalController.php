<?
class FotoModalController extends AppController{
	public $uses = array('GaleriaImagen', 'GaleriaImagenCapa', 'Dadosefato');	
	var $paginate = array(
                        'limit'  => 1,
                        'order'  => array(
                                        //'id' => 'asc'
                                        ),
                        'ativo' => 1
                        ); 
                        	
	function foto_modal($galeria_imagen_capa_id=null, $id=null){
		//print_r($galeria_imagen_capa_id);
		// print_r($id);
		// print_r($this->params['pass'][0]);
		$model = 'GaleriaImagen';
		$this->layout = 'ajax';
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);
		
		if($galeria_imagen_capa_id != 0){
			if(!empty($id)){
				$foto = $this->$model->find('first', array(
													'fields' => array(
																		'GaleriaImagen.id',
																		'GaleriaImagen.galeria_imagen_capa_id',
																		'GaleriaImagen.img_file',
																		'GaleriaImagen.titulo_'.$lang,
																		'GaleriaImagen.descricao_'.$lang,
																		),
													'conditions' => array(
																		'GaleriaImagen.id' => $id,
																		),
												));
				
			}else{
				$foto = $this->$model->find('first', array(
													'fields' => array(
																		'GaleriaImagen.id',
																		'GaleriaImagen.galeria_imagen_capa_id',
																		'GaleriaImagen.img_file',
																		'GaleriaImagen.titulo_'.$lang,
																		'GaleriaImagen.descricao_'.$lang,
																		),
													'conditions' => array(
																		'GaleriaImagen.galeria_imagen_capa_id' => $galeria_imagen_capa_id,
																		),
			
												));
			}
			$neighbors = $this->$model->find('neighbors', array(
	            												'field' => 'id',
	            												'value' => $foto[$model]['id'],
	                                                            'fields' => array(
					                                                            'id',
					                                                            'titulo_'.$lang, 
					                                                            'descricao_'.$lang,
																				),
	                                                            'conditions' => array(
	                                                            					'GaleriaImagen.id <>' => $id,
	                                                            					'GaleriaImagen.galeria_imagen_capa_id' => $foto[$model]['galeria_imagen_capa_id'],
	                                                            					),
																));
		}
		// >>> DADOS E FATOS
		// print_r($this->params);
		if($this->params['pass'][0] == 'dados-e-fatos'){
			$model = 'Dadosefato';
			$foto = $this->Dadosefato->find('first', array(
												'fields' => array(
																	// 'id',
																	// 'galeria_imagen_capa_id',
																	// 'img_file',
																	// 'titulo_'.$lang,
																	// 'chamada_'.$lang,
																	),
												'conditions' => array(
																	'Dadosefato.id' => $id,
																	),
												));
												
			$neighbors = $this->Dadosefato->find('neighbors', array(
	            												'field' => 'id',
	            												'value' => $id,
	                                                            'fields' => array(
					                                                            // 'id',
					                                                            // 'titulo_'.$lang, 
					                                                            // 'descricao_'.$lang,
																				),
	                                                            'conditions' => array(
	                                                            					'Dadosefato.id' => $id,
	                                                            					),
																));
		}
		// <<< DADOS E FATOS

		else{
			$foto = $this->$model->find('first', array(
												'fields' => array(
																	'id',
																	'galeria_imagen_capa_id',
																	'img_file',
																	'titulo_'.$lang,
																	'descricao_'.$lang,
																	),
												'conditions' => array(
																	'GaleriaImagen.id' => $id,
																	//'GaleriaImagen.galeria_imagen_capa_id' => $galeria_imagen_capa_id,
																	),
												));
												
			$neighbors = $this->$model->find('neighbors', array(
	            												'field' => 'id',
	            												'value' => $id,
	                                                            'fields' => array(
					                                                            'id',
					                                                            'titulo_'.$lang, 
					                                                            'descricao_'.$lang,
																				),
	                                                            'conditions' => array(
	                                                            					'GaleriaImagen.id <>' => $id,
	                                                            					//'GaleriaImagen.galeria_imagen_capa_id' => $galeria_imagen_capa_id,
	                                                            					),
																));
	//print_r($foto);
		}	

		$imagens = $this->paginate($model);
		
		$this->set(array(
							'model' 	=> $model,
							'foto' 		=> $foto,
							//'imagens' => $imagens,
							'neighbors' => $neighbors,
							'capa_id' 	=> $galeria_imagen_capa_id,
						));
							
		//print_r($neighbors);
							
		$this->render('../Elements/foto-modal');
	}
}