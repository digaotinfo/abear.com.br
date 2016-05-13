<?
class NewslettersEditablesController extends AppController{
	var $name 		= "NewslettersEditables";
    public $helpers = array('Html', 'Session', 'Form', 'Paginator', 'Time', 'Text');
    var $uses		= array('NewslettersEditable', 'NewslettersEditableType');
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
									'titulo'	=> 'Titulo',
									'created'	=> 'Criado em'
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->NewslettersEditable->schema());

			$this->buscaGenerica($showThisFields);
		}
	
	}

	function admin_index(){
		$model = 'NewslettersEditable';
		$this->set('model', $model);

		$this->paginate['limit'] = 10;
		$registros = $this->paginate($model);
		$this->set('registros', $registros);
	
	}

	function admin_types(){
		$model = 'NewslettersEditableType';
		$this->set('model', $model);

		$this->set('registros', $this->$model->find('all'));
	}

	function admin_add($type_id){
		$model = 'NewslettersEditable';
		$this->set('model', $model);

		$this->layout = 'ajax'; // <<< remove layout admin
		
		// >>> qual template
		$type = $this->NewslettersEditableType->find('first', array(
																	'conditions' => array('NewslettersEditableType.id' => $type_id),
																));
		$this->set('type', $type);
		// <<< qual template

		// >>> redes sociais
		$configuracao = $this->Configuracao->find('first');
		$this->set('configuracao', $configuracao);
		// <<< redes sociais

		if($this->request->is('post')){
			$this->$model->set($this->request->data);

			if ($this->$model->validates()) {
				// >>> corrigindo tynimce
				$find = array('http://server.local/abear.com.br/www/', '../../../', 'contenteditable="true', '-- [if');
				$sub = array(Router::url('/',true), Router::url('/',true), 'contenteditable="false', '--[if');
				$newHtml = str_replace($find, $sub, $this->request->data['mce_0']);
				// <<< corrigindo tynimce

				$this->request->data[$model]['html'] = $newHtml;
				$this->request->data[$model]['newsletter_editable_type_id'] = $type['NewslettersEditableType']['id'];

				// salva
				if ($this->$model->save($this->request->data)) {
					// >>> salvar o caminho do html
					$this->request->data[$model]['url_arquivo_html'] = 'newsletter/'.$this->$model->getLastInsertId().'.html';
					$this->$model->save($this->request->data);
					// <<< salvar o caminho do html

					// >>> created html file
					$arquivoHtml = $_SERVER [ 'DOCUMENT_ROOT' ].$this->webroot.'app/webroot/newsletter/'.$this->$model->getLastInsertId().'.html';
					$html = '
							<html>
							    <head>
							        <meta charset="UTF-8">
							        <title>'.$this->request->data[$model]['titulo'].'</title>
							    </head>

							    <body>
							    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
							            <tbody>
							                <tr>
							                    <td align="center">
							                        <table width="600" cellspacing="0" cellpadding="0" style="font-size: 14px;font-family: Calibri;">
							        
							       						'.$this->request->data[$model]['html'].'

							       					</table>
							       				</td>
							       			</tr>
							       		</tbody>
							       	</table>

							    </body>
							</html>
							';

					#Criar o arquivo
					$fp = fopen($arquivoHtml , "w");
					$fw = fwrite($fp, $html);
					// <<< created html file


					$this->Session->setFlash('Newsletter salva com sucesso!');

					$this->redirect(array('action' => 'index', 'admin' => true));
				}
			}
		}

	}

	function admin_edit($id=null){
		$model = 'NewslettersEditable';
		$this->set('model', $model);

		$this->layout = 'ajax'; // <<< remove layout admin
		
		$this->set('registro', $this->$model->find('first', array(
																	'conditions' => array(
																							'id' => $id
																						)
																	)));
		// >>> redes sociais
		$configuracao = $this->Configuracao->find('first');
		$this->set('configuracao', $configuracao);
		// <<< redes sociais

		$this->$model->id = $id;
		if($this->request->is('post')){
			$this->$model->set($this->request->data);
			// >>> corrigindo tynimce
			$find = array('http://server.local/abear.com.br/www/', '../../../', '-- [if');
			$sub = array(Router::url('/',true), Router::url('/',true), '--[if');
			$newHtml = str_replace($find, $sub, $this->request->data['mce_0']);
			// <<< corrigindo tynimce

			if ($this->$model->validates()) {
				$this->request->data[$model]['html'] = $newHtml;
				// salva
				if ($this->$model->save($this->request->data)) {
					// >>> leitura do diretorio
					$path = $_SERVER [ 'DOCUMENT_ROOT' ].$this->webroot.'app/webroot/newsletter/';
					$diretorio = dir($path);
					while($arquivo = $diretorio -> read()){ 
						if($arquivo == $id.'.html'){
							unlink($path.$arquivo);// <<< deleta arquivo deste ID

							// >>> created html file
							$arquivoHtml = $_SERVER [ 'DOCUMENT_ROOT' ].$this->webroot.'app/webroot/newsletter/'.$id.'.html';
							$html = '
									<html>
									    <head>
									        <meta charset="UTF-8">
									        <title>'.$this->request->data[$model]['titulo'].'</title>
									    </head>

									    <body>
									        <table width="100%" border="0" cellspacing="0" cellpadding="0">
									            <tbody>
									                <tr>
									                    <td align="center">
									                        <table width="600" cellspacing="0" cellpadding="0" style="font-size: 14px;font-family: Calibri;">
									        					'.$this->request->data[$model]['html'].'
									        				</table>
									       				</td>
									       			</tr>
									       		</tbody>
									       	</table>

									    </body>
									</html>
									';

							#Criar o arquivo
							$fp = fopen($arquivoHtml , "w");
							$fw = fwrite($fp, $html);
							// <<< created html file
						} 
					} 
					$diretorio -> close();
					// <<< leitura do diretorio

					$this->Session->setFlash('Newsletter salva com sucesso!');

					$this->redirect(array('action' => 'index', 'admin' => true));
				}
			}
		}

	}

	function admin_delete($id = null) {
		$model = 'NewslettersEditable';

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->$model->id = $id;
        if (!$this->$model->exists()) {
            throw new NotFoundException(__('Registro inexistente'));
        }
        if ($this->$model->delete()) {
        	// >>> apagar arquivo html
        	$path = $_SERVER [ 'DOCUMENT_ROOT' ].$this->webroot.'app/webroot/newsletter/';
			$diretorio = dir($path);
			while($arquivo = $diretorio -> read()){ 
				if($arquivo == $id.'.html'){
					unlink($path.$arquivo);// <<< deleta arquivo deste ID
				}
			}
			$diretorio -> close();
        	// <<< apagar arquivo html

            $this->Session->setFlash(__('Registro excluído com sucesso.'));
            $this->redirect(array('action' => 'admin_index'));
        }


        $this->Session->setFlash(__('Registro não excluido.'));
        $this->redirect(array('action' => 'admin_index'));
    }

	function admin_html(){
		$model = 'NewslettersEditable';
		$this->set('model', $model);

		$this->set('registro', $this->$model->find('first'));

	}

	function admin_preview($id=null){
		$model = 'NewslettersEditable';
		$this->set('model', $model);

		$this->layout = 'ajax'; // <<< remove layout admin
		
		$this->set('registro', $this->$model->find('first', array(
																	'conditions' => array(
																							'id' => $id
																						)
																	)));

	}

}