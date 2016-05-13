<?
class Voar extends AppModel{
	var $useTable = 'tb_txt_como_voar';

	public $info_files = array(
								'img_file' => array(
									'ext' 	=> array('gif', 'jpeg', 'png', 'jpg'),
									'dir' 	=> 'uploads/img/galeria_capa/',
									'size'	=> array('w'=> 300, 'h' => 204, 'force' => false),
									'th' 	=> array('width' => 100, 'height' => 100)
								),
							);
}