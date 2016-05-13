<?
class HotsitesController extends AppController{
	var $name 		= "Hotsites";
    public $helpers = array('Html', 'Session', 'Form');
    //var $uses		= array('Hotsite');
    var $scaffold 	= 'admin';
  	//var $transformUrl = array('url_amigavel_ptbr' => 'titulo_ptbr');


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									//'id'							=> 'ID',
									'premio_de_jornalismo_abear'	=> 'Prêmio de Jornalismo Abear',
									'agencia_abear'					=> 'Agência Abear',
									'clube_abear'					=> 'Clube Abear',
									'tudo_para_voar_melhor'			=> 'Tudo para Voar Melhor',
									'transporte_de_orgaos'			=> 'Transporte de Órgãos',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Hotsite->schema());
		}
	}

	function admin_index(){
		$model = 'Hotsite';
		$this->set('model', $model);

		$this->set('registro', $this->$model->find('first'));
	}

	function admin_edit($id=null){
		$model = 'Hotsite';
		$this->set('model', $model);

		$this->set('registro', $this->$model->find('first', array('id' => $id )));

		if($this->request->is('post')){

			$this->$model->set($this->request->data);

			if($this->$model->validates()){
				if($this->$model->save($this->request->data)){
					$this->Session->setFlash("HotSite alterado com sucesso com sucesso!");

					$this->redirect(array('action' => 'index', 'admin' => true));


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
}