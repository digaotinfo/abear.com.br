<?
class ComoVoarGaleria extends AppModel{
	var $useTable = 'tb_galeria_como_voar';
	
	public $hashMany = 'ComoVoarGaleriaVideo';
	public $displayField = 'titulo_ptbr';
}