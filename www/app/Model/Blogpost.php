<?php
class Blogpost extends AppModel {
	var $name = "tb_blogposts";
	
	public $belongsTo = 'Blogcategoria';
	
	public $order = 'Blogpost.created DESC';
}
?>
