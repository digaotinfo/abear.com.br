<?
class NasAeronavesController extends AppController{
	var $name 		= "NasAeronaves";
    public $helpers = array('Html', 'Session', 'Form', 'Time');
    var $uses		= array('NasAeronave', 'NasAeronavesTitulo', 'VoarExperienciaVideo', 'VoarMaisBrasilMidia', 'VoarMaisBrasil', 'GuiaPassageiro', 'Clube', 'ClubeTexto', 'TransporteOrgao', 'TransporteOrgaoVideo', 'GaleriaCategoria', 'GaleriaImagenCapa');
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


			$this->set('schemaTable', $this->NasAeronave->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
	
	function nas_aeronaves(){
		$model = 'NasAeronave';
		$this->set('model', $model);
		
		$lang = $this->Cookie->read('lang');
		$this->set('lang', $lang);
		
		$fotos = $this->$model->find('all', array(
												'fields' => array(
																'id',
																'img_'.$lang.'_file',
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