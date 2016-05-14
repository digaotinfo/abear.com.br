<?
class ClippingsController extends AppController{
	var $name 		= "Clippings";
    public $helpers = array('Html', 'Session', 'Form', 'Paginator', 'Time', 'Text');
    var $uses		= array('Clipping', "ClippingHistorico");
    var $scaffold 	= 'admin';
	public $components = array('Paginator');
  	var $transformUrl = array(
        'url_amigavel_ptbr' => 'titulo_ptbr',
        'url_amigavel_eng'  => 'titulo_eng',
        'url_amigavel_esp'  => 'titulo_esp'
    );

	function beforeFilter() {
		parent::beforeFilter();
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			    => 'ID',
									'titulo_ptbr'	    => 'Titulo em Português',
									'ativo'	            => 'Ativo',
								);
			$showImage	=	array(
// 								'imagem_capa_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);

			$this->set('schemaTable', $this->Clipping->schema());
		}
	}

	function  admin_index(){
		$model = "Clipping";
		$this->set("model", $model);
		
		$this->paginate = array(
				"order" => array(
						"Clipping.data" => "DESC"
				));
		
		$registros = $this->paginate($model);
		$this->set("registros", $registros);
	}

	public function admin_add(){
		$model = "Clipping";
		$this->set("model", $model);
		
		if( $this->request->is("post") ){
			$this->$model->set($this->request->data);
			
			if ($this->$model->validates()) {

				///url_amigavel
				$this->request->data[$model]["url_amigavel_ptbr"] 	= $this->stringToSlug($this->request->data[$model]["titulo_ptbr"]);
				$this->request->data[$model]["url_amigavel_eng"] 	= $this->stringToSlug($this->request->data[$model]["titulo_eng"]);
				$this->request->data[$model]["url_amigavel_esp"] 	= $this->stringToSlug($this->request->data[$model]["titulo_esp"]);
				
				if ($this->$model->save($this->request->data)) {
					/*
					 *
					 * Salvar Histórico no BD >>>
					 */
					$lastInsertId = $this->$model->getLastInsertID();
					$alteracao = "";

					foreach( $this->request->data[$model] as $key => $val ):
						
						switch ($key) {
							case "titulo_ptbr":
								$label = "Titulo em Português";
								if(!empty($val)) $alteracao = $alteracao.$label." Criado ".$this->data[$model]["titulo_ptbr"]. "<br>";
								break;
							case "titulo_eng":
								$label = "Titulo em Inglês";
								if(!empty($val)) $alteracao = $alteracao.$label." Criado ".$this->data[$model]["titulo_eng"]. "<br>";
								break;
							case "titulo_esp":
								$label = "Titulo em Espanhol";
								if(!empty($val)) $alteracao = $alteracao.$label. " Criado ".$this->data[$model]["titulo_esp"]. "<br>";
								break;
							case "texto_ptbr":
								$label = "Texto em Português";
								if(!empty($val)) $alteracao = $alteracao.$label. " Criado ".$this->data[$model]["texto_ptbr"]. "<br>";
								break;
							case "texto_eng":
								$label = "Texto em Inglês";
								if(!empty($val)) $alteracao = $alteracao.$label. " Criado ".$this->data[$model]["texto_eng"]. "<br>";
								break;
							case "texto_esp":
								$label = "Texto em Espanhol";
								if(!empty($val)) $alteracao = $alteracao.$label." Criado ".$this->data[$model]["texto_esp"]. "<br>";
								break;
							case "data":
								$label = "Data";
								if(!empty($val)) $alteracao = $alteracao.$label. " ".$val["year"]."-".$val["month"]."-".$val["day"]. "<br>";
								break;
						}
					endforeach;
					$a_saveHistorico = array(
							"clipping_id" => $lastInsertId,
							"username" => $this->Session->read('Auth.User.username'),
							"name" => $this->Session->read('Auth.User.name'),
							"user_id" => $this->Session->read('Auth.User.id'),
							"acao" => "I",
							"edicao" => "Registro Adicionado: <br/>".$alteracao,
					);
					$this->ClippingHistorico->save($a_saveHistorico);
					/*
					 *
					 * <<< Salvar Histórico no BD
					 */

					$this->Session->setFlash('Registro Salvo com sucesso!');
					
					$this->redirect(array('action' => 'index', 'admin' => true));
				}else {
				
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
			
		}
	}
	
	public function admin_edit($id){
		$model = 'Clipping';
		
		//===-----> Apoio View
		$this->set('model', $model);
		$this->set('medidas_imagens', $this->$model->info_files);
		//==----------------------------------------
		
		/// Verifica se esse ID existe ou não
		$this->$model->id = $id;
		if (!$this->$model->exists()) {
			throw new NotFoundException(__('Registro inexistente'));
		}
		
		/// Verifica se houve post e se foi de alteração
		if ($this->request->is('post') || $this->request->is('put')) {
		
			/// Seta a model com as informações que vieram do post
			$this->$model->set($this->request->data);
		
			/// Verifica se a Model está válida.
			/// OBS.: caso estejamos utilizando algum validate da Model, o Cake irá printar o que há de errado no ELSE deste script
			if($this->$model->validates()){
		
				///url_amigavel
				$this->request->data[$model]["url_amigavel_ptbr"] 	= $this->stringToSlug($this->request->data[$model]["titulo_ptbr"]);
				$this->request->data[$model]["url_amigavel_eng"] 	= $this->stringToSlug($this->request->data[$model]["titulo_eng"]);
				$this->request->data[$model]["url_amigavel_esp"] 	= $this->stringToSlug($this->request->data[$model]["titulo_esp"]);
				
				
				$registro = $this->$model->find("first", array(
						"fields" => array(
								$model.".data",
								$model.".titulo_ptbr",
								$model.".titulo_eng",
								$model.".titulo_esp",
								$model.".texto_ptbr",
								$model.".texto_eng",
								$model.".texto_esp",
						),
						"conditions" => array(
								$model.".id" => $id
						),
				));
					
				$a_fieldOrigin = array(
						"data"			=> $registro[$model]["data"],
						"titulo_ptbr"	=> $registro[$model]["titulo_ptbr"],
						"titulo_eng"	=> $registro[$model]["titulo_eng"],
						"titulo_esp"	=> $registro[$model]["titulo_esp"],
						"texto_ptbr"	=> $registro[$model]["texto_ptbr"],
						"texto_eng"		=> $registro[$model]["texto_eng"],
						"texto_esp"		=> $registro[$model]["texto_esp"],
				);
				$a_fieldsPost = array(
						"data"			=> $this->data[$model]["data"]["year"]."-".$this->data[$model]["data"]["month"]."-".$this->data[$model]["data"]["day"],
						"titulo_ptbr"	=> $this->data[$model]["titulo_ptbr"],
						"titulo_eng"	=> $this->data[$model]["titulo_eng"],
						"titulo_esp"	=> $this->data[$model]["titulo_esp"],
						"texto_ptbr"	=> $this->data[$model]["texto_ptbr"],
						"texto_eng"		=> $this->data[$model]["texto_eng"],
						"texto_esp"		=> $this->data[$model]["texto_esp"],
				);
				 
				$diferenca = array_diff($a_fieldsPost, $a_fieldOrigin);
				
				/*
				 * 
				 * pegar diferenças e salvar no BD >>>
				*/
				$a_fieldSave = array();
				$alteracao = "";
				$edicao = "";
				if( !empty($diferenca) ){
					foreach( $diferenca as $key => $val ):
					switch ($key) {
						case "titulo_ptbr":
							$label = "Titulo em Português";
							$alteracao = $alteracao.$label." alterado de ".$registro[$model]["titulo_ptbr"]. " para ".$this->data[$model]["titulo_ptbr"]. "<br>";
							break;
						case "titulo_eng":
							$label = "Titulo em Inglês";
							$alteracao = $alteracao.$label." alterado de ".$registro[$model]["titulo_eng"]. " para ".$this->data[$model]["titulo_eng"]. "<br>";
							break;
						case "titulo_esp":
							$label = "Titulo em Espanhol";
							$alteracao = $alteracao.$label." alterado de ".$registro[$model]["titulo_esp"]. " para ".$this->data[$model]["titulo_esp"]. "<br>";
							break;
						case "texto_ptbr":
							$label = "Texto em Português";
							$alteracao = $alteracao.$label." alterado de ".$registro[$model]["texto_ptbr"]. " para ".$this->data[$model]["texto_ptbr"]. "<br>";
							break;
						case "texto_eng":
							$label = "Texto em Inglês";
							$alteracao = $alteracao.$label." alterado de ".$registro[$model]["texto_eng"]. " para ".$this->data[$model]["texto_eng"]. "<br>";
							break;
						case "texto_esp":
							$label = "Texto em Espanhol";
							$alteracao = $alteracao.$label." alterado de ".$registro[$model]["texto_esp"]. " para ".$this->data[$model]["texto_esp"]. "<br>";
							break;
						case "data":
							$label = "Data";
							$alteracao = $alteracao.$label." alterada de ".$registro[$model]["data"]. " para ".$this->data[$model]["data"]. "<br>";
							break;
					}
					endforeach;
					$edicao = "Campo(s) Alterado(s): <br>".$alteracao;
				}else{
					$edicao = "Não Houve Alteração.";
				}
				$a_fieldSave = array(
						"clipping_id" => $id,
						"username" => $this->Session->read('Auth.User.username'),
						"name" => $this->Session->read('Auth.User.name'),
						"user_id" => $this->Session->read('Auth.User.id'),
						"acao" => "U",
						"edicao" => $edicao
				);
				$this->ClippingHistorico->save($a_fieldSave);
				/*
				 *
				 * <<< pegar diferenças e salvar no BD
				 */
				
				/// Gravando dados na base de ados
				if($this->$model->save($this->request->data)){
					// Inserindo um alerta de sucesso na sessão ativa para ser mostrado ao usuário
					$this->Session->setFlash('Categoria alterada com sucesso!');
		
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
}
