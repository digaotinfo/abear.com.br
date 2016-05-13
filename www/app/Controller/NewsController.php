<?
class NewsController extends AppController{
	var $name 		= "News";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Paginator', 'Text');
    var $uses		= array('TxtArtigo', 'Artigo', 'NotaRelease', 'Imprensa', 'NaMidia', 'NaMidiaVideo', 'Associada', 'Associadamaislida', 'ImprensaVideo', 'GaleriaImagenCapa', 'GaleriaImagen', 'GaleriaCategoria', 'NoticiaCategoria', 'Noticia', 'Radio');
	var $paginate = array(
                        'order'  => array(
                                        'id' => 'DESC'
                        ),
                    ); 
	
	function beforeFilter() {
		parent::beforeFilter();
	}

}