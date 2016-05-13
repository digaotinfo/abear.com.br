<?
class Comentario extends AppModel{
    var $useTable = 'tb_noticias_comentarios';
    
    public $belongsTo = 'Noticia';
}