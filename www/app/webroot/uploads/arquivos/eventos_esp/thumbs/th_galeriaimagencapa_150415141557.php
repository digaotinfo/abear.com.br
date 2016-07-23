<?
class GaleriaImagenCapa extends AppModel{
	var $useTable = 'tb_galeria_imagem_capa';
	
	var $displayField = 'titulo_ptbr';
	
	//public $hashMany = array('GaleriaImagen', 'Evento', 'Noticia');
	//public $hashMany = array('Evento', 'Noticia');
	
	//public $belongsTo = array('GaleriaCategoria');
	
	
	public $hasMany = array(
	        'GaleriaImagen' => array(
	            'className' => 'GaleriaImagen',

				//tabela do relacionamento
				//'joinTable'             => 'tb_galeria_imagem_capa',
				'foreignKey'            => 'galeria_imagen_capa_id',

				//'associationForeignKey' => 'galeria_imagen_capa_id',
				'dependent' => true
	        ),
	);

	public $belongsTo = array(
	        'GaleriaCategoria' => array(
	            'className' => 'GaleriaCategoria',

				//tabela do relacionamento
				//'joinTable'             => 'tb_galeria_imagem_capa',
				'foreignKey'            => 'galeria_categoria_id',
	        ),

	);

	// Informações que serão recuperadas no momento do upload do(s) arquivo(s)
	public $info_files = array(
                            'img_file' => array(
                                                    'ext' 	=> array(
                                                                    'gif', 
                                                                    'jpeg', 
                                                                    'png', 
                                                                    'jpg',
                                                                ),
                                                    'dir' 	=> 'uploads/img/galeria_capa/',
                                                    'size'	=> array('w'=> 400, 'h' => 400, 'force' => false),
                                                    'th' 	=> array('width' => 100, 'height' => 100)
                                                )
                        );
	
}