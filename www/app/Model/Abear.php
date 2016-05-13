<?php
class Abear extends AppModel {
	var $useTable = "tb_abear";
	
	public $displayField = 'chamada_ptbr';
	
    public $hashMany = 'Logo';
    
}