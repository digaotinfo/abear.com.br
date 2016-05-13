<?php
App::uses('Controller', 'Controller');

class DadoseFatosController extends AppController {
    var $name 		= "Dadosfatos";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text', 'Paginator');
    public $uses 	= array('Dadosefato', 'Texto', 'Dadosefatosgrafico', 'Dadosefatotipo', 'GaleriaImagenCapa', 'GaleriaImagen', 'GaleriaCategoria', 'VideoCategoria');
    var $scaffold 	= 'admin';

    var $paginate = array(
                        'order'  => array(
                                        'id' => 'DESC'
                        ),
                        'limit' => 30,
                        );

    function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		 		=> 'ID',
									'titulo_ptbr' 		=> 'Titulo em Português',
									'dadosefatotipo_id'	=> 'Tipo Dados e Fatos',
									'ativo'				=> 'Ativo',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Dadosefato->schema());

			$this->buscaGenerica($showThisFields);

		}
	}

    public function index($url=null){
    	$model = 'Dadosefato';

        $lang = $this->Cookie->read('lang');

        /// Categorias de Dados e Fatos
        // Dadosefatotipo.id,
        // Dadosefatotipo.url_amigavel_ptbr,
        // Dadosefatotipo.nome_'.$lang .'
        $tipos = $this->Dadosefatotipo->query('
        										SELECT
        											*

        										FROM
        											tb_dadosefatos_tipos as Dadosefatotipo
        											inner join tb_dados_e_fatos_new as Dadosefato on (Dadosefato.dadosefatotipo_id = Dadosefatotipo.id)

        										WHERE
        											Dadosefato.ativo = 1
        											AND Dadosefato.titulo_'.$lang. ' <> ""
        											AND Dadosefatotipo.ativo = 1
        											AND Dadosefatotipo.url_amigavel_ptbr <> ""
        											AND Dadosefatotipo.nome_'. $lang. ' <> ""

        										GROUP BY
        											Dadosefatotipo.id

        										ORDER BY
													Dadosefatotipo.ordem ASC;
        									');

        // print_r($tipos);
        // die();
        $url_amigavel = array();

		if(!empty($url)){
			$url_amigavel = array(
									'Dadosefatotipo.url_amigavel_ptbr' => $url
									);

		}

       $this->paginate = array(
								'fields' => array(
												'id',
												'Dadosefato.titulo_'.$lang,
												'Dadosefato.titulo_da_imagem_1_'.$lang,
												'Dadosefato.titulo_da_imagem_2_'.$lang,
												'Dadosefato.titulo_da_imagem_3_'.$lang,
												'chamada_'.$lang,
												'url_amigavel_'.$lang,
												'dadosefatotipo_id',
												'Dadosefatotipo.url_amigavel_'.$lang,
												'Dadosefatotipo.nome_'.$lang,
												// 'importante',
												'imagem_1_'.$lang.'_file',
												'imagem_2_'.$lang.'_file',
												'imagem_3_'.$lang.'_file',
												'descricao_da_imagem_1_'.$lang,
												'descricao_da_imagem_2_'.$lang,
												'descricao_da_imagem_3_'.$lang,
                                                'ordem',
												),
                                'conditions' => array(
                                					'Dadosefato.ativo' => 1,
										            'Dadosefato.titulo_'.$lang. ' <>' => '',
                                                    'Dadosefatotipo.nome_'.$lang. ' <>' => '',
										            $url_amigavel,
										            ),
                                'order' 	 => array(
                                					// 'Dadosefato.importante' => 'DESC',
                                    				'Dadosefato.ordem' => 'ASC',
                                    				),
                                'limit' => 4,
                                'recursive' => 2
								);

		$registro = $this->paginate($model);


		$this->set(array(
						'model' => $model,
    					'lang' => $lang,
    					'tipos' => $tipos,
    					'registros' => $registro,
    					));
    }

    function migracao(){
    	$model = 'Dadosefato';

    }
}
