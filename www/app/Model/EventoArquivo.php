<?php
class EventoArquivo extends AppModel {
   var $useTable = "tb_agendaeventos_arquivos";
   
   // var $displayField = 'titulo_ptbr';
   // public $belongsTo = array('GaleriaImagenCapa');

	var $order = 'EventoArquivo.ordem ASC, EventoArquivo.id DESC';

   
   var $belongsTo = array(
		'Evento' 	=> array(
			'className' 	=> 'Evento',
			'foreignKey' 	=> 'evento_id',
			'dependent'     => true
		),
	);
   

	public $validate = array(
		'nome_curto_do_arquivo_ptbr' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Favor informar um nome curto para o arquivo',
			)
		),

		// 'arquivo_ptbr_file' => array(
		// 	'required' => array(
		// 		'rule' => array('notEmpty'),
		// 		'message' => 'Inserir o arquivo no campo do idioma PTBR',
		// 	)
		// ),
	);

   
   public $info_files = array(
								'arquivo_ptbr_file' => array(
									'ext' 	=> array(),
									'dir' 	=> 'uploads/arquivos/eventos_ptbr/',
									'size'	=> array('w'=> 0, 'h' => 0, 'force' => false),
									'th' 	=> array('width' => 0, 'height' => 0)
								),
								'arquivo_eng_file' => array(
									'ext' 	=> array(),
									'dir' 	=> 'uploads/arquivos/eventos_eng/',
									'size'	=> array('w'=> 0, 'h' => 0, 'force' => false),
									'th' 	=> array('width' => 0, 'height' => 0)
								),
								'arquivo_esp_file' => array(
									'ext' 	=> array(),
									'dir' 	=> 'uploads/arquivos/eventos_esp/',
									'size'	=> array('w'=> 0, 'h' => 0, 'force' => false),
									'th' 	=> array('width' => 0, 'height' => 0)
								),
							);


}
?>