<?
class Intro extends AppModel{
	var $useTable = 'tb_intro';
	
	public $belongsTo = 'IntroCategoria';
}