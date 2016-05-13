<?php
class Faqcategoria extends AppModel {
   var $name = "tb_perguntasfrequentes_categorias";
   
	public $displayField= 'categoria_ptbr';

	var $order = 'Faqcategoria.ordem';
}
?>
