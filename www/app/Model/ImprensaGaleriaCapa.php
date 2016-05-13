<?
class ImprensaGaleriaCapa extends AppModel{
	var $useTable = 'tb_imprensa_galeria_capa';
	
	public $hashMany = 'ImprensaGaleria';
	
	public $displayField = 'titulo_ptbr';
}