<?php
class Fundador extends AppModel {
	var $useTable = "tb_associados";
	public $belongsTo = 'FundadorCategoria';

	var $order = 'Fundador.ordem ASC, Fundador.nome ASC';
}
?>
