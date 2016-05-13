<?php
//print_r($tipo_galeria);
if(!empty($tipo_galeria)){
	echo $this->element($tipo_galeria);
?>

        <div id='img_info_div'>
       		<div class='title'><p>Titulo da ibagem</p></div>
       		<div class='text'><p>Texto descritivo da ibagem</p></div>
        </div>
<?php
}
?>
