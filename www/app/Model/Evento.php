<?php
class Evento extends AppModel {
   var $useTable = "tb_agendaeventos";
   
   var $displayField = 'titulo_ptbr';
   public $belongsTo = array('GaleriaImagenCapa');

   public $validate = array(
		'titulo_ptbr' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Favor informar o Título em Português.',
			)
		),
	);
   
	public $hasMany = array(
		'EventoArquivo' 	=> array(
			'className' 	=> 'EventoArquivo',
			'foreignKey' 	=> 'evento_id',
			'dependent' 	=> true,
		),
		//'Videos',
		'EventoVideo' 	=> array(
			'className' 	=> 'EventoVideo',
			'foreignKey' 	=> 'evento_id',
			'dependent' 	=> true,
		),
	);
   
}
?>
