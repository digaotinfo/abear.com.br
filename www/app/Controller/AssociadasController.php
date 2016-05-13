<?
class AssociadasController extends AppController{
	var $name 		= "Associadas";
    public $helpers = array('Html', 'Session', 'Form');
    var $uses		= array('Associada', 'Associadamaislida');
    var $scaffold 	= 'admin';
  	var $transformUrl = array(
  							'url_amigavel_ptbr' => 'titulo_ptbr',
  							'url_amigavel_esp' => 'titulo_esp',
  							'url_amigavel_eng' => 'titulo_eng',
  						);


	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			=> 'ID',
									'titulo_ptbr'	=> 'Título',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Associada->schema());
		}
	}
	
	
	
	function noticialida($id = null) {
		$this->layout = 'ajax';
		$this->autoRender = false;
		
		//print_r($id);
		//die();
		
		if (!empty($id) || $id != null) {
			$this->Associadamaislida->create();
			$this->Associadamaislida->set(array(
				'associadas_id' => $id,
				'created' => date("Y-m-d H:i:s"),
			));
			$this->Associadamaislida->save();
			
			echo 'ok';
		}
		
	}
}