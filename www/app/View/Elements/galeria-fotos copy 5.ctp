<?php
	//print_r($albuns);
?>
	<div class="galeria_">
    	<?php
		if(count($albuns) > 1){
		?>            
            <div id="carousel" class="flexslider">
				<ul class="slides">
					<?php
						foreach ($albuns as $imagens) {
					?>	
							<li>
						<a href="#" modal-pj='.foto_modal' id="<?=$imagens['GaleriaImagenCapa']['id']?>" rel="<?=$imagens['GaleriaImagen'][0]['id'] ?>" >
									<?php
										echo $this->Html->image('/'.$imagens['GaleriaImagenCapa']['img_file'], array(
																													'diflu-titulo' => $imagens['GaleriaImagenCapa']['titulo_'.$lang], 
																													'diflu-desc' => $imagens['GaleriaImagenCapa']['descricao_'.$lang], 
																													'rel' => $this->webroot.$imagens['GaleriaImagenCapa']['img_th_hidden'], 
																													));
									?>
						</a>
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