<?
class VideosController extends AppController{
	var $name 		= "Videos";
    public $helpers = array('Html', 'Session', 'Form', 'Text');
    //var $uses		= array('Video');
    var $scaffold 	= 'admin';
        var $paginate = array(
                        'order'  => array(
                                        'id' => 'DESC'
                        ),
                        'limit' => 30,
                        ); 
  	var $transformUrl = array(
  								'url_amigavel_ptbr' => 'titulo_ptbr',
  								'url_amigavel_eng' => 'titulo_eng',
  								'url_amigavel_esp' => 'titulo_esp',

  								);


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',
									'video_categoria_id' => 'Categoria do Video',
									'ativo'			=> 'Ativo'
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Video->schema());

			$this->buscaGenerica($showThisFields);
		}
	}

	public function index($categoria=null, $url=null){
		// echo '<br>url: '.$url.'<br>';
		// echo 'categoria: '.$categoria.'<br>';

		$model = 'Video';
		$lang = $this->Cookie->read('lang');
		
		$videoConditions = array();
		$videosPagination = array();
		$videoNeighbors = array();

		if ($categoria == 'todos') {
			$categoria = '';
		}




		if($categoria == 'watch'){
			$videoConditions = array(
										'Video.video_'.$lang. ' <>' => '',
										'Video.url_amigavel_'.$lang => $this->params->pass[1],
										'Video.ativo' => 1,
									);
			$video = $this->$model->find('first', array(
														'fields' => array(
																		'id',
																		"VideoCategoria.url_amigavel_{$lang}",
																		),
														'conditions' => $videoConditions
														));
			
			$this->redirect(array(
								'action' => 'index',
								'categoria' => $video['VideoCategoria']['url_amigavel_'.$lang],
								'url' => $this->params->pass[1]
								));
		}








		/////===> Vídeo de Destaque
		///================================================================================================			
		/// CASO TENHA URL DO VÍDEO DE DESTAQUE:
		if(!empty($url)){
			// echo "tem vídeo único clicado<br>";
			$videoConditions = array(
										'Video.video_'.$lang. ' <>' => '',
										'Video.url_amigavel_'.$lang => $url,
										'Video.ativo' => 1,
									);
		} else {
			// echo "Primeiro Vídeo<br>";
			$videoConditions = array(
										'Video.titulo_'.$lang.' <>' => '',
										'Video.video_'.$lang. ' <>' => '',
										'Video.destaque' => 1,
										'Video.ativo' => 1,
									);

		}
		if (!empty($categoria)) {
			array_push($videoConditions, array('VideoCategoria.url_amigavel_'.$lang => $categoria));
		}
		$video = $this->$model->find('first', array(
													'fields' => array(
																		'id',
																		'Video.video_categoria_id',
																		"VideoCategoria.nome_{$lang}",
																		"VideoCategoria.url_amigavel_{$lang}",
																		"url_amigavel_{$lang}",
																		"titulo_{$lang}",
																		"chamada_{$lang}",
																		"video_{$lang}"
																		),
													'conditions' => $videoConditions,
													'order' => array(
														'Video.id' => 'DESC'
													)
												));	
		if (empty($video)) {
			$video = $this->$model->find('first', array(
													'fields' => array(
																		'id',
																		'Video.video_categoria_id',
																		"VideoCategoria.nome_{$lang}",
																		"VideoCategoria.url_amigavel_{$lang}",
																		"url_amigavel_{$lang}",
																		"titulo_{$lang}",
																		"chamada_{$lang}",
																		"video_{$lang}"
																		),
													'conditions' => array(
														'Video.titulo_'.$lang.' <>' => '',
														'Video.ativo' => 1,
													),
													'order' => array(
														'Video.id' => 'DESC'
													)
												));	
		}
		///================================================================================================			
		
		




		/////===> Paginação de Vídeos (de baixo)
		///================================================================================================
		//// CASO EXISTA CATEGORIA
		if(!empty($categoria)){
			// echo "tem categoria<br>";
			$videosPagination = array(
										'video_'.$lang. ' <>' => '',
										'VideoCategoria.url_amigavel_'.$lang => $categoria,
	            						"Video.url_amigavel_{$lang} <>" => '',
										'Video.ativo' => 1,
										'Video.id <> ' => $video[$model]['id']
										);
		} else {
			// echo "SEM categoria<br>";
			$videosPagination = array(
										'video_'.$lang. ' <>' => '',
	            						"Video.url_amigavel_{$lang} <>" => '',
										'Video.ativo' => 1,
										'Video.id <> ' => $video[$model]['id']
										);
			
		}
		$this->paginate = array(
								'conditions' => $videosPagination,
								'order'		=> array('id' => 'DESC'),
								'limit'		=> '8',
							);
		$videos = $this->paginate($model);

		///================================================================================================








		
		/////===> Paginação de Próximo e Anterior do Vídeo em destaque
		///================================================================================================
		//// CASO EXISTA CATEGORIA
		if(!empty($categoria)){
			$videoNeighbors = array(
									'video_'.$lang. ' <>' => '',
	            					"Video.url_amigavel_{$lang} <>" => '',
	            					// "Video.destaque" => 1,
	            					'VideoCategoria.url_amigavel_'.$lang => $categoria,
	            					'Video.ativo' => 1
									);
		} else {
			$videoNeighbors = array(
									'video_'.$lang. ' <>' => '',
	            					"Video.url_amigavel_{$lang} <>" => '',
	            					// "Video.destaque" => 1,
	            					'Video.ativo' => 1
									);
		}
		$neighbors = $this->$model->find('neighbors', array(
            												'field' => 'id', "url_amigavel_{$lang}",
            												'value' => $video[$model]['id'],
                                                            'fields' => array(
				                                                            'id',
				                                                            "url_amigavel_{$lang}",
																			),
                                                            'conditions' => $videoNeighbors,
                                                            'limit' => 1,
                                                            'order' => array(
                                                            					'id' => 'DESC'
                                                            					)
															));
		///================================================================================================

		$this->set(array(
						'model' => $model,
						'lang' => $lang,
						'categoria' => $categoria,
						'url' => $url,
						'video' => $video,
       					'videos' => $videos,
       					'neighbors' => $neighbors
       				));
       	
	}
	
	
	
}