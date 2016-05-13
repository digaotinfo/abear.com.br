<?
class VoarsController extends AppController{
	var $name 		= "Voars";
    public $helpers = array('Html', 'Session', 'Form');
    var $uses		= array('Voar', 'GaleriaImagenCapa', 'GaleriaCategoria');
    var $scaffold 	= 'admin';
  	//var $transformUrl = array('url_amigavel_ptbr' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',

								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Voar->schema());

			$this->buscaGenerica($showThisFields);
		}
	}

	function admin_galeria_list(){
		$model = 'GaleriaImagenCapa';
		$this->set('model', $model);

		$this->paginate = array(
								'conditions' => array(
													'GaleriaCategoria.url_amigavel_ptbr' => 'como-voa-o-brasil'
													),
								'recursive' => 0
								);

		$registros = $this->paginate($model);
		$this->set('registros', $registros);

	}

	function admin_galeria_add(){
		$model = 'GaleriaImagenCapa';
		$this->set('model', $model);

		if($this->request->is('post')){

			$this->$model->set($this->request->data);

			if($this->$model->validates()){

				///////////////////////////
				// realiza o upload
				$a_files = array('img');
				foreach ($a_files as $inputFile):
					if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
						$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');
						$this->request->data[$model][$inputFile.'_th_hidden'] = str_replace('//', '/', $this->thumbPath($this->request->data[$model][$inputFile.'_th_hidden']));
						// $this->request->data[$model][$inputFile.'_th_hidden'] = str_replace('//', '/', $this->thumbPath($this->request->data[$model][$inputFile]));
						// $this->request->data[$model]['img_th_hidden'] = $this->thumbPath($this->request->data[$model][$inputFile]);
					} else {
						$this->request->data[$model][$inputFile] = '';
					}
				endforeach;
				///////////////////////////
				//////////////////////////


				$this->request->data[$model]['url_amigavel_ptbr'] = $this->stringToSlug($this->request->data[$model]['titulo_ptbr']);
				$this->request->data[$model]['url_amigavel_esp'] = $this->stringToSlug($this->request->data[$model]['titulo_esp']);
				$this->request->data[$model]['url_amigavel_eng'] = $this->stringToSlug($this->request->data[$model]['titulo_eng']);

				if($this->$model->save($this->request->data)){
					$this->Session->setFlash("Sua imagem foi salva com sucesso!");

					$this->redirect(array('action' => 'galeria_list', 'admin' => true));


				}else{
					// Listando os erros que a Model está informando.
					$erros = $this->$model->validationErrors;
					$mensagem_erros = '';
					foreach ($erros as $erro):
						$index_name = key($erro);
						$mensagem_erros .= '&bull; ' . $erro[$index_name] . '</br>';
					endforeach;

					 /// Colocando os erros na sessão ativa para ser mostrado ao usuário
					$this->Session->setFlash($mensagem_erros, 'default', array('class' => 'alert'));
				}
			}
		}
	}

	function admin_galeria_edit($id = null){
		$model = 'GaleriaImagenCapa';
		$this->set('model', $model);

		$galeriaCapa = $this->$model->find('first', array(
															'conditions' => array(
																					'GaleriaImagenCapa.id' => $id
																				)
														));

		$this->set('registro', $galeriaCapa);

		$this->$model->id = $galeriaCapa[$model]['id'];

		if($this->request->is('post')){

			$this->$model->set($this->request->data);

			if($this->$model->validates()){

				///////////////////////////
				// realiza o upload
				$a_files = array('img');
				foreach ($a_files as $inputFile):
					if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
						$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');
						$this->request->data[$model][$inputFile.'_th_hidden'] = str_replace('//', '/', $this->thumbPath($this->request->data[$model][$inputFile.'_th_hidden']));
						// $this->request->data[$model][$inputFile.'_th_hidden'] = str_replace('//', '/', $this->thumbPath($this->request->data[$model][$inputFile]));
						// $this->request->data[$model]['img_th_hidden'] = $this->thumbPath($this->request->data[$model][$inputFile]);
					} else {
						$this->request->data[$model][$inputFile] = '';
					}
				endforeach;
				///////////////////////////
				//////////////////////////


				$this->request->data[$model]['url_amigavel_ptbr'] = $this->stringToSlug($this->request->data[$model]['titulo_ptbr']);
				$this->request->data[$model]['url_amigavel_esp'] = $this->stringToSlug($this->request->data[$model]['titulo_esp']);
				$this->request->data[$model]['url_amigavel_eng'] = $this->stringToSlug($this->request->data[$model]['titulo_eng']);


				if($this->$model->save($this->request->data)){
					$this->Session->setFlash("Sua imagem foi salva com sucesso!");

					$this->redirect(array('action' => 'galeria_list', 'admin' => true));


				}else{
					// Listando os erros que a Model está informando.
					$erros = $this->$model->validationErrors;
					$mensagem_erros = '';
					foreach ($erros as $erro):
						$index_name = key($erro);
						$mensagem_erros .= '&bull; ' . $erro[$index_name] . '</br>';
					endforeach;

					 /// Colocando os erros na sessão ativa para ser mostrado ao usuário
					$this->Session->setFlash($mensagem_erros, 'default', array('class' => 'alert'));
				}
			}
		}
	}

	function admin_galeria_delete($id){
    	$model = 'GaleriaImagenCapa';

    	/// Segurança:
    	///=================================================
    	/// - Verifica se a requisição a este método está sendo feito por um post.
    	if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

    	/// - Verifica se o registro realmente existe.
        $this->$model->id = $id;
        if (!$this->$model->exists()) {
            throw new NotFoundException(__('Registro inexistente'));
        }
    	///=================================================



	    /// Apaga os registros da base de dados
		if ($this->$model->delete($id)) {
			// Inserindo um alerta de sucesso na sessão ativa para ser mostrado ao usuário
			$this->Session->setFlash('Noticia excluída com sucesso!');

			// Redirecionando o usuário para a listagem dos registros
			$this->redirect(array('action' => 'galeria_list'));
		}


    }
}
