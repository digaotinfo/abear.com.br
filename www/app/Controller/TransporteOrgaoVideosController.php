<?php
class TransporteOrgaoVideosController extends AppController {
    var $name 		= "TransporteOrgaoVideos";
    public $helpers = array('Html', 'Session', 'Form', 'Time', 'Paginator');
    //var $uses		= array('TransporteOrgaoVideo');
    var $scaffold 	= 'admin';
    public $components = array('Paginator');

    function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'			=> 'ID',
									'titulo_ptbr'	=> 'Titulo em Português',
								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->TransporteOrgaoVideo->schema());
		}
	}
}