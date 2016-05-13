<?
class NoticiaCategoria extends AppModel{
	var $useTable = 'tb_noticias_categoria';

	var $displayField = 'nome_ptbr';
	public $hashMany = 'Noticia';
}