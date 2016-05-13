<?php
App::uses('Controller', 'Controller');

class AbearsController extends AppController {
    var $name 		= "Abears";
    public $helpers = array('Html', 'Session', 'Form');
    var $uses		= array('Abear', 'Texto', 'Etica', 'Logo', 'Associado', 'Estrutura', 'Diretor', 'DescricaoDiretoria', 'Comite', 'Fundador', 'DescricaoConselho', 'Setoraereo', 'Estatuto');
    var $scaffold 	= 'admin';
    var $paginate = array(
                        'order'  => array(
                                        'id' => 'desc',
                        ),
                   );

	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'				=> 'ID',
									'chamada_ptbr'		=> 'Chamada em Português',

								);
			$showImage	=	array(
								'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Abear->schema());

            $this->buscaGenerica($showThisFields);
		}
	}

    public function index() {
    	$model = 'Abear';
    	$this->set('model', $model);

        $lang = $this->Cookie->read('lang');

        $registros = $this->$model->find('first', array(
                                                    'fields' => array(
                                                    	'Abear.id',
                                                        'Abear.texto_1_'.$lang,
                                                        'Abear.imagem_'.$lang.'_file',
                                                        'Abear.texto_2_'.$lang,
                                                    ),
                                                    'conditions' => array(
                                                        'OR' => array(
                                                            'texto_1_'.$lang. ' <>' => '',
                                                            'texto_2_'.$lang. ' <>' => '',
                                                        )
                                                    ),
                                                    'recursive' => 2,
                                                ));

        if (!empty($registros)) {
            $logos = $this->Logo->find('all', array(
    												'fields' => array(
    																	'id',
    																	'name_logo',
                                                                        'url_link',
    																	'logo_file',
    																	'logo_th_hidden'
    																	),
    												'conditions' => array(
    																		'Logo.abear_id' => $registros[$model]['id']
    																		)
            										));
        }

        //print_r($logos);
        $this->set(array(
        				'registros' => $registros,
        				'logos' 	=> $logos
        					));
        $this->set(compact('lang'));

    }

    public function estruturas() {
		$model = 'Estrutura';
    	$this->set('model', $model);

        $lang = $this->Cookie->read('lang');

		$desc_lateral = $this->DescricaoConselho->find('first', array(
																		'conditions' => array(
																								'titulo_'.$lang. ' <>' => ''
																								)
																		));
		$this->set('desc', $desc_lateral);

        $this->set('conselheiros', $this->$model->find('all', array(
                                                                'fields' => array(
                                                                				'id',
				                                                                'nome',
				                                                                'titulares_'. $lang,
				                                                                'suplentes_'. $lang,
				                                                                'foto_file',
				                                                                ),
                                                                'conditions' => array(
                                                                    			'foto_file <>'  => '',
                                                                    			'ativo' => 1,
                                                                    			),
                                                                'order' => array(
                                                                				'order' => 'ASC'
                                                                				),
                                                                'limit' => 4,
                                                                    	)
                                                        ));

        $this->set('diretoria', $this->Diretor->find('all', array(
        															'fields' => array(
        																			'id',
        																			'nome',
        																			'cargo_'.$lang,
        																			'descricao_'.$lang,
        																			'foto_file',
        															 				'foto_th_hidden',
        															 				'order',
        																				),
        															'conditions' => array(
	    																					'cargo_'.$lang. ' <>' => ''
	    																					),
	    															'order' => array(
	    																				'order' => 'ASC'
	    																			),
	    															'limit' => 6,
        															)

        												));

        $this->set('txt_diretoria', $this->DescricaoDiretoria->find('first', array(
				        															'fields' => array(
				        																			'id',
				        																			'titulo_'.$lang,
				        																			'descricao_'.$lang
				        																				),
				        															'conditions' => array(
				        																					'titulo_'.$lang. ' <>' => ''
				        																					)
				        																)
        												));

        $introFind = $this->Texto->findAllByController('Comites', array(
                                                                        'intro_'. $lang,
                                                                        'tags_'. $lang,
                                                                        'texto_'. $lang,
                                                                    ));

        if(count($introFind)>0) {
            $this->set('intro_comite', $introFind[0]['Texto']['intro_'. $lang]);
        } else {
            $this->set('intro_comite', '');
        }

        $this->set('comites', $this->Comite->find('first', array(
                                                                'fields' => array(
                                                                            'titulo_'.$lang,
                                                                            'chamada_'.$lang,
                                                                            'texto_'.$lang,
                                                                            ),
                                                                'conditions' => array(
                                                                                    'titulo_'. $lang. ' <>' => ''
                                                                                    ),
                                                                'order' => array('id' => 'DESC')
                                                            )));
        $this->set('estatuto', $this->Estatuto->find('first', array(
                                                                'fields' => array(
			                                                                'titulo_'.$lang,
			                                                                'resumo_'.$lang,
			                                                                'estatuto_'.$lang,
                                                                            'arquivo_file_'.$lang,
			                                                                ),
                                                                'conditions' => array(
                                                                                    'titulo_'.$lang.' <>' => '',
                                                                    				'Estatuto.ativo' => 1
                                                                    				),
                                                                'order' => array('id' => 'DESC')
                                                            )));

        $this->set('lang', $lang);

    }

    public function diretores($id=null){
    	//print_r($id);
    	//die();
	    $model = 'Diretor';
	    $lang = $this->Cookie->read('lang');
	    $this->set('lang', $lang);

	    $this->autoRender = false;


	    $diretor = $this->$model->find('first', array(
	    												'fields' => array(
				    														'id',
				    														'nome',
				    														'cargo_'.$lang,
				    														'descricao_'.$lang
				    														),
				    									'conditions' => array(
				    															'id' => $id
				    															)
	    												));
	    ?>

		<p class='infoP_title'><?=$diretor['Diretor']['nome']?></p>
        <p class='infoP_cargo'><?=$diretor['Diretor']['cargo_'.$lang]?></p>
        <div class='infoP_text'><?=$diretor['Diretor']['descricao_'.$lang]?></div>

        <?php

    }

    public function fundadores(){
		$model = 'Fundador';
        $this->set('model', $model);
        $lang = $this->Cookie->read('lang');

        $introFind = $this->Texto->findAllByController('Associados', array(
                                                                        'intro_'. $lang,
                                                                        'imagem_file',
                                                                        'tags_'. $lang,
                                                                        'texto_'. $lang,

                                                                    ));

        if(count($introFind)>0) {
            $this->set('intro', $introFind[0]['Texto']['intro_'. $lang]);
        } else {
            $this->set('intro', '');
        }

        $this->set('fundadores', $this->Fundador->find('all', array(
                                                                'conditions' => array(
                                                                					'ativo' => 1,
                                                                    				'Fundador.fundador_categoria_id' => 5,
                                                                ),
                                                                //'order' => 'Fundador.order ASC, Fundador.nome ASC'
                                                            )
                                                        )
                );

        $this->set('associados', $this->Fundador->find('all', array(
                                                                'conditions' => array(
                                                                    'Fundador.fundador_categoria_id' => 3,
                                                                ),
                                                                //'order' => 'Fundador.ordem ASC, Fundador.nome ASC'
                                                            )
                                                        )
                );

        $this->set('lang', $lang);

    }

    public function etica() {
        $model = 'Etica';

        $lang = $this->Cookie->read('lang');

        $registros = $this->$model->find('first', array(
                                                    'fields' => array(
                                                        'id',
                                                        'texto_1_'.$lang,
                                                        'imagem_file',

                                                    ),
                                                    'conditions' => array(
                                                        'texto_1_'.$lang. ' <>' => '',
                                                    ),
                                                    'recursive' => -1
                                                ));
        $this->set(array(
        				'model' => $model,
        				'lang' => $lang,
        				'etica' => $registros,
        					));

    }

    public function setor_aereo(){
	    $model = 'Setoraereo';
        $this->set('model', $model);
        $lang = $this->Cookie->read('lang');

        $this->set('registros', $this->Setoraereo->find('all', array(
                                                                    'conditions' => array(
                                                                        'Setoraereo.nome_'.$lang.' <>' => '',
                                                                    ),
                                                                    'order' => array(
                                                                                'order' => 'ASC'
                                                                                    )
                                                                )));
        $this->set('lang', $lang);
    }
}
