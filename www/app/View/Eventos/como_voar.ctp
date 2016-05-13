<?php 
	//print_r($txtvoar);
	//print_r($video);		
	$this->start('og:title');
        ?>
        <meta property="og:title" content="<?=$txtvoar[$model]['titulo_'.$lang]?>"/>
        <?php
    $this->end();



    
    $this->start('og:image');
        if (!empty($txtvoar[$model]['imagem_facebook_' .$lang. '_file'])) {
          
            $src = Router::url('/'.$txtvoar[$model]['imagem_facebook_' .$lang. '_file'], true);
    		
            ?>
            <meta property="og:image" content="<?=$src?>" />
            <?php
        }
    $this->end();				
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

<!-- Galeria -->
	<?//=$this->element('tipo-galeria')?>
<!-- /Galeria  -->
		<div id="imagens-como-voa">
			<?php
				foreach ($albuns as $imagens) {
			?>	
					<div class="large-3 medium-3 small-6 columns" align="center">
						<a href="<?=$this->webroot.'galerias/'.$myurl[1].'/album/'.$imagens['GaleriaImagenCapa']['url_amigavel_'.$lang];
                                        ?>"
                                        >

                            <div class="tam" 
                            	diflu-titulo="<?=$imagens['GaleriaImagenCapa']['titulo_'.$lang]?>" 
                            	diflu-desc="<?=$imagens['GaleriaImagenCapa']['descricao_'.$lang]?>" 
                            	rel="<?=$this->webroot.$imagens['GaleriaImagenCapa']['img_th_hidden']?>" 
                            	style='background-image: url(<?='../'.$imagens['GaleriaImagenCapa']['img_file']?>);'
                            	>
                            </div>
						</a>
					</div>

			<?php
				}
			?>
		</div>

<!-- <div class='social_share right margin-top40'>
	<a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
	<a href="<?=urlencode($txtvoar[$model]['titulo_'.$lang]) ?>+<?=Router::url('', true)?>" share-pj='twitter'><div></div></a>
	<a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
	<a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg='IMG' share-pj-pindesc='DESC'><div></div></a>
	<a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
</div> -->		
</div>
<div id='img_info_div'>
       		<div class='title'><p>Titulo da ibagem</p></div>
       		<div class='text'><p>Texto descritivo da ibagem</p></div>
        </div>
		<script type="text/javascript">
		$( document ).ready(function() {
			$('.comoVoar_imagesOrbit').slick({
				dots: true
			});
		});
	</script>

