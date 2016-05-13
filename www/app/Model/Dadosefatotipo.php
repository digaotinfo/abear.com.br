<?php
class Dadosefatotipo extends AppModel {
	var $useTable = "tb_dadosefatos_tipos";
	public $displayField= 'nome_ptbr';

	public $order = 'Dadosefatotipo.ordem ASC';
}
?>
