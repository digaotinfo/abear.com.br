<?
class GaleriaCategoria extends AppModel{
	var $useTable = 'tb_galeria_categoria';
	
	var $displayField = 'nome_ptbr';
	public $hashMany = 'GaleriaImagenCapa';
}