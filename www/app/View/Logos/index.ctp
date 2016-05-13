<?php 
//print_r($registros);
?>
<div class='row conheca'>
    <div class='titulo_grande'>
        <div class='title'><p>Abear</p></div>
        <div class='quad'></div>
    </div>
    <?php //foreach($registros as $registro){ ?>
    <div class='paragrafo mL170'>
        <?= $registros['Abear']["texto_1_{$lang}"];?>
        <?=$this->Html->image('/'.$registros['Abear']['imagem_file'], array('class' => 'img_sobre'));?>
        <?= $registros['Abear']["texto_2_{$lang}"];?>
    </div>
    
    <div class='imgs_bot'>
    <?php 
    	foreach($registros as $logo){
    	//print_r($logo);
    		echo $this->Html->image('/'.$logo['logo_th_hidden']); 
    	}
    ?>    
    </div>
</div>