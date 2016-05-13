<?
class NasAeronavesTitulosController extends AppController{
	var $name 		= "NasAeronavesTitulos";
    public $helpers = array('Html', 'Session', 'Form', 'Time');
    //var $uses		= array('NasAeronavesTitulo');
    var $scaffold 	= 'admin';

	function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		=> 'ID',
									'titulo_sup_ptbr'	=> 'Titulo Superior em Português',
									'titulo_inf_ptbr'	=> 'Titulo Inferior em Português',
									'ativo'				=> 'Ativo',

								);
			$showImage	=	array(
								//'foto_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->NasAeronavesTitulo->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}