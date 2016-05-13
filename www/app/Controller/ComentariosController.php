<?
class ComentariosController extends AppController{
        var $name = "Comentarios";
	public $helpers = array('Html', 'Session', 'Form');
	//public $uses = array('minha_model');
	var $scaffold = 'admin';
	//var $transformUrl = array('url_amigavel' => 'titulo_ptbr');
	
	
	function beforeFilter() {
		parent::beforeFilter();
		
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'noticia_id'	=> 'ID Noticia',
									'nome'          => 'Autor',
									'comentario'	=> 'Comentario',
								);
			$showImage	=	array(
								'',
							);
			
			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);
			
			
			$this->set('schemaTable', $this->Comentario->schema());
		}
	}
}