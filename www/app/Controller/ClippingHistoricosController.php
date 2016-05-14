<?
class ClippingHistoricosController extends AppController{
	var $name 		= "ClippingHistoricos";
    public $helpers = array('Html', 'Session', 'Form', 'Paginator', 'Time', 'Text');
    var $uses		= array("ClippingHistorico");
    var $scaffold 	= 'admin';
	public $components = array('Paginator');

	function beforeFilter() {
		parent::beforeFilter();
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			    => 'ID',
									'username'	    => 'Titulo em Português',
									'edicao'	            => 'Alteração',
									'acao'	            => 'Ação',
								);
			$showImage	=	array(
// 								'imagem_capa_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);

			$this->set('schemaTable', $this->ClippingHistorico->schema());
		}
	}

	function  admin_index(){
		$model = "ClippingHistorico";
		$this->set("model", $model);
		
		$this->paginate = array(
				"fields" => array(
						'ClippingHistorico.name',
						'ClippingHistorico.edicao',
						'ClippingHistorico.acao',
						'DATE_FORMAT(ClippingHistorico.created, "%d/%m/%y às %h:%ihs") as created',
				),
				"order" => array(
						"ClippingHistorico.id" => "DESC"
				),
				"limit" => 50,
				"conditions" => array(
						"ClippingHistorico.delete <>" => 1
				)
		);
		
		$registros = $this->paginate($model);
		$this->set("registros", $registros);
	}
}
