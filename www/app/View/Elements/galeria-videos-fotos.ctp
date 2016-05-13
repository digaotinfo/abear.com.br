<?php
	//print_r($videos);
?>
<div class='galeria_'>
	<div class='videos_hold'>
		<div class='single row'>
			<div class='video small-12 medium-6 columns'><?=$videos[0]['Video']['video_'.$lang]?></div>
			<div class='info small-12 medium-6 columns'>
				<div class='todos'><a href="<?=$this->Html->url(array('controller' => 'videos', 'action' => 'videos'))?>"><p><?=__d('default', 'VER TODOS')?></p><div></div></a></div>
				<div class='title'><p><?=$videos[0]['Video']['titulo_'.$lang]?></p></div>
				<div class='text'><p><?=$videos[0]['Video']['chamada_'.$lang]?></p></div>

					<?php
					//print_r($videos);
					if(count($videos) > 1){
						?>
						<div class='more'>
							<?php
							//$count = 0;
							for ($i=1; $i < 3; $i++) { 
								if(!empty($videos[$i])){
									?>
									<div class='vid'>
										<a href="#" video-click>
											<?php
												$frame = split("/", $videos[$i]['Video']['video_'.$lang]);
												$img_yt = split('"', $frame[4]);
												echo $this->Html->image('http://img.youtube.com/vi/' .$img_yt[0]. '/0.jpg', array('tit' => $videos[$i]['Video']['titulo_'.$lang], 'desc' => $videos[$i]['Video']['chamada_'.$lang], 'end' => $videos[$i]['Video']['video_'.$lang]));
											?>
										</a>
									</div>
									<?php
								}
							}
							?>
						</div>
						<?php
					}
					?>
			</div>
		</div>
	</div>
	<div class='line_div'></div>
	<div class='images_hold'>
		<?php
		//print_r($albuns);
		if(count($albuns) > 1){
			?>
			<div class='image_imageOrbit'>
				<?php
				foreach ($albuns as $imagem) {
					?>
					<div align='center' class='mTop10'>
						<a href='#' modal-pj='.foto_modal' id='<?=$imagem['GaleriaImagenCapa']['id']?>'>
							<?=$this->Html->image(
												'/'.$imagem['GaleriaImagenCapa']['img_file'], 
												array(
													'diflu-titulo' => $imagem['GaleriaImagenCapa']['titulo_'.$lang], 
													'diflu-desc' => $imagem['GaleriaImagenCapa']['descricao_'.$lang]
												)
											)?>
						</a>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		}else{
			?>
			<?= $this->element('galeria-foto-unica')?>
			<?php
		}
		?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		
		$('.image_imageOrbit').slick({
			dots: true
		});
		setTimeout(function(){
			$('.single .info').css('height', $('.single .video').height());
		}, 200);
	});
</script>