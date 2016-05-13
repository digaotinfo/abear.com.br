<?php
class GaleriaImagen extends AppModel {
   var $useTable = "tb_galeria_imagem";
   
   //public $belongsTo = 'GaleriaImagenCapa';

   //public $belongsTo = array('GaleriaCategoria');


   public $belongsTo = array(
	        'GaleriaImagenCapa' => array(
	            'className' => 'GaleriaImagenCapa',

				//tabela do relacionamento
				//'joinTable'             => 'tb_galeria_imagem_capa',
				'foreignKey'            => 'galeria_imagen_capa_id',


				//'associationForeignKey' => 'galeria_imagen_capa_id',
	        ),

	        //'GaleriaCategoria',

	);
}
?>