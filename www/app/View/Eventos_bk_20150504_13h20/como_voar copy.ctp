<?php 
	//print_r($txtvoar);
	//print_r($video);						
?>

<div class='row progEvento'>
	<div class='titulo_grande img'>
		<div class='title'>
			<?php 
				if(!empty($txtvoar[$model]['logo_' .$lang. '_file'])){ 
					echo $this->Html->image('/'.$txtvoar[$model]['logo_' .$lang. '_file']);
				}else{
					echo __d('default', 'Como Voa o Brasil');
				}
			?>
		
		</div>
		<div class='quad'></div>
	</div>

	<?=$this->element('intros')?>

	<div class='text'>
		<p><?=$txtvoar[$model]['texto_'.$lang]?></p>
	</div>


<!-- TESTE GALERIA -->
	<div class='fotos_orbit' align='center'>
        <?=$videos[0]['Video']['video_'.$lang]?>
        <div class='orbit_ comoVoar_imagesOrbit'>
        	<div class='elementToOrbit'>
        		<div class='img'>
                	<?php 
                		$count = 0;
                		foreach($albuns as $imagem): 
                			// if($count%1 == 0 && $count != 0){
                			if(!empty($imagem['GaleriaImagen'])){
                			?>
                					</div>
                				</div>
			                	<div class='elementToOrbit'>
			                		<div class='img' >
			                		
				                		<img modal-pj='.foto_modal' id="<?=$imagem['GaleriaImagenCapa']['id']?>" rel="<?=$imagem['GaleriaImagen'][0]['id']?>" src="<?= $this->webroot.''.$imagem['GaleriaImagenCapa']['img_file']?>" rel="<?=$imagem['GaleriaImagenCapa']['id']?>" data-reveal-id="fotos_modal" como-voar-img>
									
	                			<?php
	                			// }else if($count%1 != 0 || $count == 0){
	                			?>

				                		 <!-- <img src="<?= $this->webroot.''.$imagem['GaleriaImagenCapa']['img_file']?>" rel='<?=$imagem['GaleriaImagen'][0]['id']?>' data-reveal-id="fotos_modal" como-voar-img>  -->
								<?php
								// }else{
										?>
											<!-- </div> -->
                						<!-- <div class='img'> -->

			                		 <!-- <img modal-pj='.foto_modal' id="<?=$imagem['GaleriaImagenCapa']['id']?>" rel="<?=$imagem['GaleriaImagen'][0]['id']?>" src="<?= $this->webroot.''.$imagem['GaleriaImagenCapa']['img_file']?>" rel='<?=$imagem['GaleriaImagenCapa']['id']?>' data-reveal-id="fotos_modal" como-voar-img>  -->
							
							<?php
							}
							$count++;
						endforeach;
					?>
                </div>
        	</div>
        </div>
    </div>
<!-- END TESTE GALERIA -->











<!-- Galeria -->
	<?//=$this->element('tipo-galeria')?>
<!-- /Galeria  -->

</div>
		<script type="text/javascript">
		$( document ).ready(function() {
			$('.comoVoar_imagesOrbit').slick({
				dots: true
			});
		});
	</script>

