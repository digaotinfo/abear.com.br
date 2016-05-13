<?
class EventoArquivosController extends AppController {
    var $name 		= "EventoArquivos";
    public $helpers = array('Html', 'Session', 'Form');
    public $uses 	= array('EventoArquivo', 'Evento');
    var $scaffold 	= 'admin';
    
    function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		  					=> 'ID',
									'nome_curto_do_arquivo_ptbr' 	=> 'Nome Curto em Português',
									'evento_id' 					=> 'Referente ao Evento',
									'ordem' 						=> 'Ordem',

								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->EventoArquivo->schema());

			$this->buscaGenerica($showThisFields);
		}
	}



	function admin_add(){
		$model = 'EventoArquivo';
		$this->set('model', $model);

		$eventoList = $this->Evento->find('all', array(
														'fields' => array(
															'id',
															'titulo_ptbr',
															'titulo_esp',
															'titulo_eng'
														),
														'recursive' => -1,
														'order' => array(
															'data' => 'DESC',
														)
														));
		$this->set('eventoList', $eventoList);


		if($this->request->is('post')){
			$this->$model->set($this->request->data);

			if($this->$model->validates()){
				///////////////////////////
				// realiza o upload
				// >>> arquivo_ptbr_file
				$a_files = array('arquivo_ptbr', 'arquivo_eng', 'arquivo_esp');
				foreach ($a_files as $inputFile):
					if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
						$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');

						if (trim($this->request->data[$model][$inputFile.'_file']) == trim('001 Erro ao efetuar upload do arquivo:  ')) {
							unset($this->request->data[$model][$inputFile.'_file']);
							// $this->request->data[$model][$inputFile.'_file'] = '';
						}
					} else {
						$this->request->data[$model][$inputFile.'_file'] = '';
						// unset($this->request->data[$model][$inputFile.'_file']);
					}
				endforeach;
				// // <<< arquivo_ptbr_file
				// // >>> arquivo_eng_file
				// $a_files = array('arquivo_eng');
				// foreach ($a_files as $inputFile):
				// 	if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
				// 		$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');
				// 	} else {
				// 		$this->request->data[$model][$inputFile] = '';
				// 	}
				// endforeach;
				// // <<< arquivo_eng_file
				// // >>> arquivo_esp_file
				// $a_files = array('arquivo_esp');
				// foreach ($a_files as $inputFile):
				// 	if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
				// 		$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');
				// 	} else {
				// 		$this->request->data[$model][$inputFile] = '';
				// 	}
				// endforeach;
				// <<< arquivo_esp_file
				///////////////////////////
				//////////////////////////



				if($this->$model->save($this->request->data)){
					$this->Session->setFlash("Seu arquivo foi salvo com sucesso!");

					$this->redirect(array('action' => 'index'));


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


	/*
	function admin_edit($id=null){
		$model = 'EventoArquivo';
		$this->set('model', $model);

		$eventoArquivo = $this->$model->find('first', array(
													'conditions' => array(
																			'EventoArquivo.id' => $id
																		)
												));

		$eventoList = $this->Evento->find('all', array(
														'fields' => array(
																'id',
																'titulo_ptbr',
																'titulo_esp',
																'titulo_eng'
															),
														'recursive' => -1,
														'order' => array(
															'data' => 'DESC',
														)
														));

		$this->$model->id = $eventoArquivo[$model]['id'];
		if($this->request->is('post')){
			$this->$model->set($this->request->data);

			if($this->$model->validates()){
				///////////////////////////
				// realiza o upload
				// >>> arquivo_ptbr_file
				$a_files = array('arquivo_ptbr');
				foreach ($a_files as $inputFile):
					if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
						$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');
					} else {
						$this->request->data[$model][$inputFile] = '';
					}
				endforeach;
				// <<< arquivo_ptbr_file
				// >>> arquivo_eng_file
				$a_files = array('arquivo_eng');
				foreach ($a_files as $inputFile):
					if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
						$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');
					} else {
						$this->request->data[$model][$inputFile] = '';
					}
				endforeach;
				// <<< arquivo_eng_file
				// >>> arquivo_esp_file
				$a_files = array('arquivo_esp');
				foreach ($a_files as $inputFile):
					if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
						$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');
					} else {
						$this->request->data[$model][$inputFile] = '';
					}
				endforeach;
				// <<< arquivo_esp_file
				///////////////////////////
				//////////////////////////

				print_r($this->request->data);
				die();

			}
		}
		
		$this->set(array(
							'eventoArquivo' => $eventoArquivo,
							'eventoList' => $eventoList,

						));
	}
	*/

    /* EDIT */
	function admin_edit($id=null){
		$model = 'EventoArquivo';
		$this->set('model', $model);


		/// Verifica se esse ID existe ou não
		$this->$model->id = $id;
        if (!$this->$model->exists()) {
            throw new NotFoundException(__('Registro inexistente'));
        }
        
		
		
		$eventoList = $this->Evento->find('all', array(
												'fields' => array(
														'id',
														'titulo_ptbr',
														'titulo_esp',
														'titulo_eng'
													),
												'recursive' => -1,
												'order' => array(
													'data' => 'DESC',
												)
												));

		$this->set('eventoList', $eventoList);
																	
		
		
		/// Verifica se houve post e se foi de alteração
		if ($this->request->is('post') || $this->request->is('put')) {
			/// Seta a model com as informações que vieram do post
			$this->$model->set($this->request->data);
			
			/// Verifica se a Model está válida. 
			/// OBS.: caso estejamos utilizando algum validate da Model, o Cake irá printar o que há de errado no ELSE deste script
			if($this->$model->validates()){
				
				// echo "<pre>";
				// print_r($this->request->data[$model]);
				// echo "</pre>";
				// die();

				///////////////////////////
				// realiza o upload
				/////
				$a_files = array('arquivo_ptbr', 'arquivo_eng', 'arquivo_esp');
				foreach ($a_files as $inputFile):
					if ($this->request->data[$model][$inputFile.'_file']['name'] != '') {
						$this->request->data[$model][$inputFile.'_file'] = $this->subirImagem($model, $inputFile.'_file', $inputFile.'_file', 'add', '');

						if (trim($this->request->data[$model][$inputFile.'_file']) == trim('001 Erro ao efetuar upload do arquivo:  ')) {
							// unset($this->request->data[$model][$inputFile.'_file']);
							$this->request->data[$model][$inputFile.'_file'] = '';
						}
					} else {
						unset($this->request->data[$model][$inputFile.'_file']);
					}
				endforeach;
				///////////////////////////
				///////////////////////////


				// echo "<hr><pre>";
				// print_r($this->request->data[$model]);
				// echo "</pre>";
				// die();

				/// Gravando dados na base de ados
				if($this->$model->saveAll($this->request->data)){
					
					// Inserindo um alerta de sucesso na sessão ativa para ser mostrado ao usuário
	            	$this->Session->setFlash('Arquivo alterado com sucesso!');
	            	
	            	// Redirecionando o usuário para a listagem dos registros
					$this->redirect(array('action' => 'index'));
				}
			} else {
				
				/// Listando os erros que a Model está informando.
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
		
		
		/// Seta o request data com as informações que a Model possui.
		$this->request->data = $this->$model->read(null, $id);

	}
	/*  END EDIT */


}