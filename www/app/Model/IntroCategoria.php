<?
class IntroCategoria extends AppModel{
	var $useTable = 'tb_intro_categoria';
	
	public $hashMany = 'Intro';
	var $displayField = 'categoria_ptbr';
}