<?
class VoarExperienciaVideosController extends AppController{
	var $name 		= "VoarExperienciaVideos";
    public $helpers = array('Html', 'Session', 'Form');
    //var $uses		= array('Comites');
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
								//'foto_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->VoarExperienciaVideo->schema());
		}
	}
}