<?php
//print_r($albuns);
//print_r($url);

if ($tem_galeria) {
	?>
	<div class='gal_vid'>
		<div class='videos'>
			<div class='top'>
				<p class='title'><?=__d('default', 'VÍDEOS')?></p>
				<div class='todos'><a href="#"><p><?=__d('default', 'Ver todos')?></p><div></div></a></div>
			</div>
			
			<?=$videos['Video']['video_'.$lang]?>
			<div class='video_info'><p><?=$videos['Video']['chamada_'.$lang]?></p></div>
		</div>
		
		<div class='imagens'>
			<p class='title'><?=__d('default', 'Galeria')?></p>
			<div class='fotos_orbit' align='center'>
				<div class='orbit_ mBot10 imprensa_imagesOrbit'>
		
					<div class='elementToOrbit'>
		        		<div class='img'>
		                	<?php 
		                
		                		$count = 0;
		                		foreach($albuns as $album): 
		                			if($count%8 == 0 && $count != 0){
		                		
		                			?>
		                					</div>
		                				</div>
					                	<div class='elementToOrbit'>
					                		<div class='img'>
					                		<img src="<?= $this->webroot.''.$album['GaleriaImagenCapa']['img_file']?>" rel="<?=$album['GaleriaImagenCapa']['id']?>" value='<?=$album['GaleriaImagenCapa']['id']?>' data-reveal-id="fotos_modal" como-voar-img>
										
		                			<?php
		                			}else if($count%2 != 0 || $count == 0){
		                			?>
		
					                		<img src="<?= $this->webroot.''.$album['GaleriaImagenCapa']['img_file']?>" rel='<?=$album['GaleriaImagenCapa']['id']?>' value='<?=$album['GaleriaImagenCapa']['id']?>' data-reveal-id="fotos_modal" como-voar-img>
									<?php
									}else{
											?>
												</div>
		                						<div class='img'>
		
					                		<img src="<?= $this->webroot.''.$album['GaleriaImagenCapa']['img_file']?>" rel='<?=$album['GaleriaImagenCapa']['id']?>' value='<?=$album['GaleriaImagenCapa']['id']?>' data-reveal-id="fotos_modal" como-voar-img>
									
									<?php
									}
									$count++;
								endforeach;
							?>
		                </div>
		        	</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>