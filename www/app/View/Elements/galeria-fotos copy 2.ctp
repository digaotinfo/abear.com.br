<?php
	//print_r($albuns);
?>

	<div class="galeria_">
    	<?php
		if(count($albuns) > 1){
		?>
        	<div id="slider" class="flexslider">
				<ul class="slides">
                	<?php
						foreach ($albuns as $imagens) {
							foreach($imagens['GaleriaImagen'] as $imagem){
					?>
						<li>
								<?php echo $this->Html->image('/'.$imagem['img_file'], 
									array(
										'diflu-titulo' => $imagem['titulo_'.$lang], 
										'diflu-desc' => $imagem['descricao_'.$lang], 
										'rel' => $this->webroot.$imagem['img_th_hidden'], 
									)
								);
								?>
						</li>
					<?php
							}
						}
					?>
                </ul>
            </div>
            <div id="carousel" class="flexslider">
				<ul class="slides">
					<?php
						foreach ($albuns as $imagens) {
							foreach($imagens['GaleriaImagen'] as $imagem){
					?>
						<li>
								<?=$this->Html->image('/'.$imagem['img_th_hidden'])?>
						</li>
					<?php
							}
						}
					?>
				</ul>
			</div>
        <?php
		}else{
			echo $this->element('galeria-foto-unica');
		}
		?>
	</div>