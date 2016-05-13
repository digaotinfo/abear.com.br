<?php
class EventoVideo extends AppModel {
   var $useTable = "tb_agendaeventos_videos";
   
   // var $displayField = 'titulo_ptbr';
   // public $belongsTo = array('GaleriaImagenCapa');
   
   var $belongsTo = array(
		'Evento' 	=> array(
			'className' 	=> 'Evento',
			'foreignKey' 	=> 'evento_id',
			'dependent'     => true
		),
	);
   
   
}
?>