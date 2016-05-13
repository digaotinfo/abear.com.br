<?

class NoticiasController extends AppController {
    var $name = "Noticias";
	public $helpers = array('Html', 'Session', 'Form', 'Time', 'Text');
	public $uses = array('Noticia', 'NoticiaCategoria');
	var $scaffold = 'admin';
	var $transformUrl = array(
								'url_amigavel_ptbr' => 'titulo_ptbr',
  								'url_amigavel_eng' => 'titulo_eng',
  								'url_amigavel_esp' => 'titulo_esp',
								);
    var $paginate = array(
                       	'limit' => 30,
                        'order'  => array(
                                        'id' => 'DESC'
                        ),
                        'conditions' => array(
                             'Noticia.ativo' => '1'
                        )
                        );


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'					=> 'ID',
									'titulo_ptbr'			=> 'Titulo em Protuguês',
									'noticia_categoria_id'	=> 'Categoria da Noticia',
									'ativo'					=> 'Ativo',
									'destaque' 				=> 'Destaque',
								);
			$showImage	=	array(
								'',
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
            // echo "<pre>";
            // print_r($this->Noticia->schema());
            // echo "</pre>";
            // die();
			$this->set('schemaTable', $this->Noticia->schema());

			$this->buscaGenerica($showThisFields);
		}
	}

    function index(){
           $model = 'Noticia';
           $this->set('model', $model);

           $this->paginate['recursive'] = -1;



           $this->set('registros', $this->paginate($model));

    }

    function admin_index(){
       	$model = 'Noticia';
       	$this->set('model', $model);

       	$categoria_noticia = $this->NoticiaCategoria->find('list', array(
       																'fields' => array(
       																				// 'id', 'nome_ptbr'
       																				),

       																));
       	$this->set('categoria_noticia', $categoria_noticia);
       	$array_conditions = array();

       	$remove_hide = 'hidden';
       	$is_on = '';
       	/// ==> Filtro
		if (!empty($this->request->data['filtro']['NoticiaCategoria'])) {
			$remove_hide = '';
			$is_on = 'on'; //https://www.youtube.com/watch?v=N3DbqWl3-II

			$ids_categorias = '';
			$count = count($this->request->data['filtro']['NoticiaCategoria']);

			foreach($this->request->data['filtro']['NoticiaCategoria'] as $r){
				$ids_categorias .= $r. ',';
			}

			$sql_noticia_id = "
								SELECT DISTINCT
									Noticia.id
								FROM
									tb_noticias as Noticia
								INNER JOIN
									tb_noticias_categoria as NC ON (NC.id=Noticia.noticia_categoria_id)
								WHERE
									NC.id IN (" .substr_replace($ids_categorias, '', -1, 1). ")
								";


			$noticias = $this->$model->query($sql_noticia_id);


			// >>> Desmontar Array
			$noticia_id = Set::classicExtract($noticias, '{n}.Noticia.id');
			// <<< Desmontar Array

			array_push($array_conditions, array('Noticia.id' => $noticia_id));

		}

		// >>> find com conditions do input busca

		if (!empty($this->request->data['filtro']['busca'])) {
			$remove_hide = '';
			$is_on = 'on';

			array_push($array_conditions, array(
											'OR' => array(
												'Noticia.titulo_ptbr like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.titulo_eng like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.titulo_esp like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.chamada_ptbr like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.chamada_eng like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.chamada_esp like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.texto_1_ptbr like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.texto_2_ptbr like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.texto_1_eng like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.texto_2_eng like "%'. $this->request->data['filtro']['busca'] .'%" ',
												'Noticia.texto_1_esp like "%'. $this->request->data['filtro']['busca'] .'%" ',

											),
										));
		}
		// <<< find com conditions do input busca


		// >>> Verifica se existe algo na busca
		if (!empty($array_conditions)) {
			$this->paginate['conditions'] = $array_conditions;
		}

		$this->set(array(
						'remove_hide' => $remove_hide,
						'is_on' => $is_on,
						));
		// <<< Verifica se existe algo na busca
		// <<< Filtro

		// $this->paginate['recursive'] = 0;
		$registros = $this->paginate($model);
		$this->set('registros', $registros);

    }

}
