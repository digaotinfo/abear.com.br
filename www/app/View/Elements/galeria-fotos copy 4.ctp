<?php
	//print_r($albuns);
?>
	<div class="galeria_">
    	<?php
		if(count($albuns) > 1){
		?>
	        
            <div id="carousel_" class="flexslider">
				<ul class="slides">
					<?php
						foreach ($albuns as $imagens) {
					?>
						<li>
<!-- 							<a href="#" modal-pj='.foto_modal' id="<?=$imagens['GaleriaImagenCapa']['id']?>" rel="<?=$imagens['GaleriaImagen'][0]['id']?>"> -->
								<?=$this->Html->image('/'.$imagens['GaleriaImagenCapa']['img_file'], array('modal-pj' => '.foto_modal', 'id' => $imagens['GaleriaImagenCapa']['id'], 'rel' => $imagens['GaleriaImagen'][0]['id']))?>
								<?//=$this->Html->image('/'.$imagens['GaleriaImagenCapa']['img_file'])?>
<!-- 							</a> -->
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



