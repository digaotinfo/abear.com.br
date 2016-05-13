<?php
class Dadosefatoarquivo extends AppModel {
   var $useTable = "tb_dadosefatos_arquivos";

   //dadosefatotipo_id


	var $belongsTo = array(
		'Dadosefato' 	=> array(
			'className' 	=> 'Dadosefato',
			'foreignKey' 	=> 'dadosefato_id',
			'dependent'     => true
		),
	);
}
?>
