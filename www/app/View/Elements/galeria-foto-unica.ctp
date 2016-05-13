<?php
	// print_r($albuns);
	//print_r($imagensGaleria);
//print_r($imagens);

if(!empty($imagens)){
	?>

 	<div class='galeria_'>
		<div class='galeria_hold'>
			<div class='unica_imageOrbit'>
				<?php
				foreach($imagens['GaleriaImagen'] as $imagem): 
					// print_r($imagem);
					?>
					<div id="slider" class="flexslider">
						<ul class="slides">
							<?=$this->Html->image(
												'/'.$imagem['img_file'], 
												array(
	 												'diflu-titulo' => $imagens['GaleriaImagenCapa']['titulo_'.$lang],
													'diflu-desc' => $imagens['GaleriaImagenCapa']['descricao_'.$lang]
												)
											)?>
						</ul>
					</div>
				
					<?php
				endforeach;
				?>
			</div>
		</div>
		<div class='info'>
			<div class='title'>
					<?php
					//print_r($albuns);
					if (!empty($albuns)) {
						?>
						<p><?=$imagens['GaleriaImagenCapa']['titulo_'.$lang]?></p>
						<?php
					}
					?>
			</div>
			<div class='text'>
				<?php
				if (!empty($albuns)) {
					?>
					<p><?=$imagens['GaleriaImagenCapa']['descricao_'.$lang]?></p>
					<?php
				}
				?>
			</div>
		</div>
	</div> 

	

	<?php 
	if(count($imagensGaleria) > 1){
		?>
	
		<script type="text/javascript">
			$( document ).ready(function() {
				$('.unica_imageOrbit').slick({
					dots: true
				});

				setTimeout(function(){
				var hei = 0;
				var wid = 0;
				var galeriaHeight = 0;
				var galeriaWidth = $('.galeria_hold').width();
				var quantItems = $('.unica_imageOrbit .slick-slide').length - 2;
				var val = Math.floor(((galeriaWidth - (quantItems * 10))/quantItems)-4);

				$('.unica_imageOrbit img').each(function(index, value){
					var obj = $(value);
					var h = obj.height();
					var w = obj.width();

					if(w >= h){
						obj.css('max-width', '100%');
						if(h > hei){ hei = h; wid = w}
						//obj.css('margin-left', Math.floor((galeriaWidth - w)/2) );
					}
					else{
						//obj.css('margin-left', Math.floor((galeriaWidth - w)/2) );
					}
				});

				if(Math.floor((hei * $('.galeria_hold').width())/wid) > 400){
					galeriaHeight = 400;
				}else{
					galeriaHeight = Math.floor((hei * $('.galeria_hold').width())/wid);
				}

				$('.unica_imageOrbit').css('height', galeriaHeight + 140);
				$('.galeria_hold').css('height', galeriaHeight + 140);
				$('.galeria_hold .slick-list').css('height', galeriaHeight);
				$('.unica_imageOrbit').css('overflow', 'hidden');//.find('.slick-next, .slick-prev').css('margin-top', (galeriaHeight/2 - 35));
				$('.unica_imageOrbit .slick-dots').show(0).css('bottom', '-20px').find('li').css('display', 'block').css('float', 'left');
				$('.galeria_ .info .title').html('<p>'+$('.unica_imageOrbit .slick-slide').eq(1).find('img').attr('diflu-titulo')+'</p>');
				$('.galeria_ .info .text').html('<p>'+$('.unica_imageOrbit .slick-slide').eq(1).find('img').attr('diflu-desc')+'</p>');

				$('.unica_imageOrbit img').each(function(index, value){
					var obj = $(value);
					var h = obj.height();
					var w = obj.width();
					var realGaleriaHeight = Math.floor(galeriaHeight);

					if(h < galeriaHeight){
						obj.css('margin-top', Math.floor((galeriaHeight - h)/2) );
					}

					if(realGaleriaHeight-5 > h){
						obj.css('margin-top', (realGaleriaHeight-h)/2);
					}
				});

					var w_h = 0;

					if(val > 140){w_h = 140;}
					else{w_h = val;}

				$('.unica_imageOrbit .slick-dots li').each(function(index, value){
					var obj = $(value);
					var imgOnGaleria = $('.unica_imageOrbit .slick-slide').eq(index + 1);
					
					//if(quantItems <= 5){
						if(index == 0){
							obj.css('margin-left', (galeriaWidth - quantItems * w_h - 5 * quantItems)/2);
						}

						if(imgOnGaleria.width() >= imgOnGaleria.height){
							obj.css('height', w_h).css('width', w_h).css('background', 'rgba(255,255,255,.3)').css('border', '1px solid white').html('<img src="'+imgOnGaleria.find('img').attr('src')+'" style="max-width: 100%;">').find('img').css('margin-top', (obj.height() - obj.find('img').height())/2 );
						}else{
							obj.css('height', w_h).css('width', w_h).css('background', 'rgba(255,255,255,.3)').css('border', '1px solid white').html('<img src="'+imgOnGaleria.find('img').attr('src')+'" style="max-height: 100%;">').find('img').css('margin-top', (obj.height() - obj.find('img').height())/2 );
						}
					// }else{

					// }
					// obj.click(function(){
					// 	$('.galeria_ .info .title').html('<p>'+imgOnGaleria.find('img').attr('diflu-titulo')+'</p>');
					// 	$('.galeria_ .info .text').html('<p>'+imgOnGaleria.find('img').attr('diflu-desc')+'</p>');
					// });
				});


				$('.unica_imageOrbit .slick-prev, .unica_imageOrbit .slick-next').css('margin-top', (galeriaHeight/2 - 35) - ((galeriaHeight + w_h + 10)/2));

			},300);
		});
		</script>
		<?php 



	} else { 
		?>
		<script type="text/javascript">		
		
			$( document ).ready(function() {
				var obj = $('.unica_imageOrbit img');
				var w = obj.width();
				var h = obj.height();
				if(w >= h){
					obj.css('width', '100%');
				}else{
					obj.css('max-height', '500px').css('margin-left', (obj.parent().width() - obj.width())/2);
				}
			});
		</script>
		<?php 
	} 
}
?>
