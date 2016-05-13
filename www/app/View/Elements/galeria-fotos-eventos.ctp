<?php
if($imagens['GaleriaImagenCapa']['id'] != 1 && !empty($imagens['GaleriaImagen'])){
	?>


<?php ////////////////////  MESCLADO PJ&AYESHA  com div-flu da capa   ////////////////////////////////////?>
 <div class='galeria_'>
	<div class='galeria_hold'>
		<div class='evento_imageOrbit'>
			<div id="slid" class="flexslider" align='center'>
				<ul class="slides" >
					<?php
						foreach($imagens['GaleriaImagen'] as $imagem):
							?>
							<li class="pad10">
								<?=$this->Html->image('/'.$imagem['img_file'], array(
																					'legenda-titulo' => strip_tags($imagem['titulo_'.$lang]), 
																					'legenda-desc' => strip_tags($imagem['descricao_'.$lang]), 
																					'rel' => $this->webroot.$imagem['img_th_hidden'],
																														))?>
							</li>

							<?php
						endforeach;
					?>

				</ul>
			</div>


		</div>
			<div class='info legenda-foto'>
				<div class='title'><p><?=$imagens['GaleriaImagen'][0]['titulo_'.$lang]?></p></div>
                                <?php //print_r($lang); ?>
				<div class='text'><p><?=$imagens['GaleriaImagen'][0]['descricao_'.$lang]?></p></div>
			</div>
	</div>

	<div id="carous" class="flexslider ">
		<ul class="slides">
			<?php
				foreach($imagens['GaleriaImagen'] as $imagem){
					?>
				

					<li>
						<?=$this->Html->image('/'.$imagem['img_th_hidden'])?>

					</li>
				
			<?php 
					} 
				?>
		</ul>
	</div>

	
</div>
 
<script type="text/javascript">
	$( document ).ready(function() {
            $('.evento_imageOrbit').slick({
                    dots: true
            });

            setTimeout(function(){
                var hei = 0;
                var wid = 0;
                var galeriaHeight = 0;
                var galeriaWidth = $('.galeria_hold').width();
                var quantItems = $('.evento_imageOrbit .slick-slide').length - 2;
                var val = Math.floor(((galeriaWidth - (quantItems * 10))/quantItems)-4);

                $('.evento_imageOrbit img').each(function(index, value){
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

                $('.evento_imageOrbit').css('height', galeriaHeight + 140);
                $('.galeria_hold').css('height', galeriaHeight + 140);
                $('.galeria_hold .slick-list').css('height', galeriaHeight);
                $('.evento_imageOrbit').css('overflow', 'hidden');//.find('.slick-next, .slick-prev').css('margin-top', (galeriaHeight/2 - 35));
                $('.evento_imageOrbit .slick-dots').show(0).css('bottom', '-20px').find('li').css('display', 'block').css('float', 'left');
                // $('.galeria_ .info .title').html('<p>'+$('.evento_imageOrbit .slick-slide').eq(1).find('img').attr('alt')+'</p>');
                // $('.galeria_ .info .text').html('<p>'+$('.evento_imageOrbit .slick-slide').eq(1).find('img').attr('text')+'</p>');

                $('.evento_imageOrbit img').each(function(index, value){
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

                $('.evento_imageOrbit .slick-dots li').each(function(index, value){
                    var obj = $(value);
                    var imgOnGaleria = $('.evento_imageOrbit .slick-slide').eq(index + 1);

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
                     click(function(){
                            // $('.galeria_ .info.legenda-foto .title').html('<p>'+imgOnGaleria.find('img').attr('diflu-titulo')+'</p>');
                            // $('.galeria_ .info.legenda-foto .text').html('<p>'+imgOnGaleria.find('img').attr('diflu-desc')+'</p>');

                     });

                });
                
                
                $("#carous.flexslider").click(function(){
                    $('.info.legenda-foto .title').html('<p>'+ $('.pad10.flex-active-slide img').attr('legenda-titulo') +'</p>');	
                    $('.info.legenda-foto .text').html('<p>'+ $('.pad10.flex-active-slide img').attr('legenda-desc') +'</p>');	
               
                });
//                $('#carous.flexslider .flex-viewport .slides .flex-active-slide').click(function(){
//                    console.log('clik');
////                    $('.info.legenda-foto .title').html('<p>'+ $('.pad10.flex-active-slide img').attr('legenda-titulo') +'</p>');	
//                    $('.info.legenda-foto .text').html('<p>'+ $('.pad10.flex-active-slide img').attr('legenda-desc') +'</p>');	
//                });

                
                $('.evento_imageOrbit .slick-prev, .evento_imageOrbit .slick-next').css('margin-top', (galeriaHeight/2 - 35) - ((galeriaHeight + w_h + 10)/2));

                },300);
	});

</script>


<?php } ?>