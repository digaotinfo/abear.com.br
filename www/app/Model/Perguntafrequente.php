<?php
class Perguntafrequente extends AppModel {
	var $name = "tb_perguntasfrequentes";
	
	public $belongsTo = 'Faqcategoria';
}
?>
