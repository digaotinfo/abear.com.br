<?
class DadosefatoarquivosController extends AppController {
    var $name 		= "Dadosefatoarquivos";
    public $helpers = array('Html', 'Session', 'Form');
    public $uses 	= array('Dadosefatoarquivo');
    var $scaffold 	= 'admin';

    function beforeFilter() {
		parent::beforeFilter();

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$showThisFields	=	array(
									'id'		  					=> 'ID',
									'dadosefato_id' 				=> 'Dados e Fatos',
									'nome_curto_do_arquivo_ptbr' 	=> 'Nome Curto em Português',
                                    'ordem'                         => 'Ordem',

								);
			$showImage	=	array(
								//'imagem_file'
							);

			$this->set('showFields', $showThisFields);
			$this->set('fieldToImg', $showImage);


			$this->set('schemaTable', $this->Dadosefatoarquivo->schema());

			$this->buscaGenerica($showThisFields);
		}
	}
}
