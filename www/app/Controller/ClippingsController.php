<?
class ClippingsController extends AppController{
	var $name 		= "Clippings";
    public $helpers = array('Html', 'Session', 'Form', 'Paginator', 'Time', 'Text');
    var $uses		= array('Clipping');
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
								'imagem_capa_file'
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

// 	function  admin_del($id){
// 		$model = "Clipping";
// 		$this->set("model", $model);
		
			
// 			if (!$this->request->is('post')) {
// 				throw new MethodNotAllowedException();
// 			}
// 			$this->$model->id = $id;
// 			if (!$this->$model->exists()) {
// 				throw new NotFoundException(__('Registro inexistente'));
// 			}
// 			if ($this->$model->saveField('delete', true)) {
// 				$this->Session->setFlash(__('Registro excluído com sucesso.'));
// 				$this->redirect(array('action' => 'admin_index'));
// 			}else{
// 				$this->Session->setFlash(__('Registro não excluido.'));
// 				$this->redirect(array('action' => 'admin_index'));
// 			}
			
			
			
// 	}
}
