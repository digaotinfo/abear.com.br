<?php
	//print_r($albuns);
?>

	<div class="galeria_">
    	<?php
		if(count($albuns) > 1){
		?>
<!--
        	<div id="slider" class="flexslider" modal-pj='.foto_modal' id="<?=$albuns[0]['GaleriaImagenCapa']['id']?>" rel="<?=$albuns[0]['GaleriaImagen'][0]['id'] ?>">
				<ul class="slides">
                	<?php
						foreach ($albuns as $imagem) {
					?>
						<li>
								<?php echo $this->Html->image('/'.$imagem['GaleriaImagenCapa']['img_file'], 
									array(
										'diflu-titulo' => $imagem['GaleriaImagenCapa']['titulo_'.$lang], 
										'diflu-desc' => $imagem['GaleriaImagenCapa']['descricao_'.$lang], 
										'rel' => $this->webroot.$imagem['GaleriaImagenCapa']['img_th_hidden'], 
									)
								);
								?>
						</li>
					<?php
						}
					?>
                </ul>
            </div>
-->
            
            
            <div id="carousel" class="flexslider">
				<ul class="slides">
					<?php
						foreach ($albuns as $imagens) {
					?>
						<li>
								<?=$this->Html->image('/'.$imagens['GaleriaImagenCapa']['img_th_hidden'], array('modal-pj' => '.foto_modal', 'id' => $imagens['GaleriaImagenCapa']['id'], 'rel' => $imagens['GaleriaImagen'][0]['id']))?>
						</li>
					<?php
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