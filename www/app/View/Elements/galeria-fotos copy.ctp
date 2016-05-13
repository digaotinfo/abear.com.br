<?php
	//print_r($albuns);
?>
<div class='galeria_'>
	<div class='galeria_hold'>
		<?php
			if(count($albuns) > 1){
				?>
				<div class='image_imageOrbit'>
					<?php
						foreach ($albuns as $imagem) {
							  // foreach($imagem['GaleriaImagen'] as $foto){
								//print_r($imagem);
								?>
								<div>
									<a href="#" modal-pj='.foto_modal' id="<?=$imagem['GaleriaImagenCapa']['id']?>" rel="<?=$imagem['GaleriaImagen'][0]['id'] ?>" >
										
										<?=$this->Html->image('/'.$imagem['GaleriaImagenCapa']['img_file'], array('diflu-titulo' => $imagem['GaleriaImagenCapa']['titulo_'.$lang], 'diflu-desc' => $imagem['GaleriaImagenCapa']['descricao_'.$lang], 'rel' => $this->webroot.$imagem['GaleriaImagenCapa']['img_th_hidden']))?>
										
									</a>
								</div>
								<?php
							 // }
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
			var hei = 0;
			var wid = 0;
			var galeriaHeight = 0;
			var galeriaWidth = $('.galeria_hold').width();
			var quantItems = $('.image_imageOrbit .slick-slide').length - 2;
			var val = Math.floor(((galeriaWidth - (quantItems * 10))/quantItems)-4);
			var thumbAltura = 70;

			$('.image_imageOrbit img').each(function(index, value){
				var obj = $(value);
				var h = obj.height();
				var w = obj.width();
				
				if(w >= h){
					obj.css('max-width', '100%');
					if(h > hei){ hei = h; wid = w}
					obj.css('margin-left', Math.floor((galeriaWidth - w)/2) );
				}
				else{
					obj.css('margin-left', Math.floor((galeriaWidth - w)/2) );
				}
			});

			if(Math.floor((hei * $('.galeria_hold').width())/wid) > 400){
				galeriaHeight = 400;
			}else{
				galeriaHeight = Math.floor((hei * $('.galeria_hold').width())/wid);
			}

			$('.image_imageOrbit').css('height', galeriaHeight + thumbAltura + 40);
			$('.galeria_hold').css('height', galeriaHeight + thumbAltura + 40);
			$('.galeria_hold .slick-list').css('height', galeriaHeight);
			$('.image_imageOrbit').css('overflow', 'hidden');//.find('.slick-next, .slick-prev').css('margin-top', (galeriaHeight/2 - 35));
			$('.image_imageOrbit .slick-dots').show(0).css('bottom', '-20px').css('padding', '20px 0').css('background', 'rgba(0,0,0,.05)').find('li').css('display', 'block').css('float', 'left');
			$('.galeria_ .info .title').html('<p>'+$('.image_imageOrbit .slick-slide').eq(1).find('img').attr('alt')+'</p>');
			$('.galeria_ .info .text').html('<p>'+$('.image_imageOrbit .slick-slide').eq(1).find('img').attr('text')+'</p>');

			$('.image_imageOrbit img').each(function(index, value){
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

				if(val > thumbAltura){w_h = thumbAltura;}
				else{w_h = val;}

			$('.image_imageOrbit .slick-dots li').each(function(index, value){
				var obj = $(value);
				var imgOnGaleria = $('.image_imageOrbit .slick-slide').eq(index + 1);
				
				//if(quantItems <= 5){
					if(index == 0){
						obj.css('margin-left', (galeriaWidth - quantItems * w_h - (5 * quantItems))/2);
					}

					if(imgOnGaleria.width() >= imgOnGaleria.height){
						obj.css('height', w_h).css('width', w_h).css('background', 'rgba(255,255,255,.3)').css('border', '1px solid white').html('<img src="'+imgOnGaleria.find('img').attr('rel')+'" style="max-width: 100%;">').find('img').css('margin-top', (thumbAltura - obj.find('img').height())/2 );
					}else{
						obj.css('height', w_h).css('width', w_h).css('background', 'rgba(255,255,255,.3)').css('border', '1px solid white').html('<img src="'+imgOnGaleria.find('img').attr('rel')+'" style="max-height: 100%;">').find('img').css('margin-top', (thumbAltura - obj.find('img').height())/10 );//ALTIGO ERA /2 PARA DEFINIR A POSIÇÃO DA IMAGEM
					}
				// }else{

				// }
				obj.click(function(){
					$('.galeria_ .info .title').html('<p>'+imgOnGaleria.find('img').attr('alt')+'</p>');
					$('.galeria_ .info .text').html('<p>'+imgOnGaleria.find('img').attr('text')+'</p>');
				});
			});


			$('.image_imageOrbit .slick-prev, .image_imageOrbit .slick-next').css('margin-top', (galeriaHeight/2 - 35) - ((galeriaHeight + w_h + 10)/2));

		},300);
	});
</script>