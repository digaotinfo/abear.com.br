<?php
//print_r($neighbors);
//print_r($foto);
//print_r($model);
//print_r($capa_id);

if(!empty($foto)):
    if($model != 'Dadosefato'){
        $img = $foto[$model]['img_file'];
        $titulo = $foto[$model]['titulo_'.$lang];
        $desc = $foto[$model]['descricao_'.$lang];
    }
    // print_r($foto);
    if($model == 'Dadosefato'){
        $img = $foto[$model]['imagem_1_ptbr_file'];
        $titulo = $foto[$model]['titulo_'.$lang];
        $desc = $foto[$model]['chamada_'.$lang];
    }
?>

    	<div class='top'><div class='first'></div><div class='last'><a href="#" class='modal-pj-close'><?=__d('default', 'fechar')?></a> </div></div>
    	
    		<div class='foto'> <?=$this->Html->image('/'.$img)?></div>
    		<div class='info'>
    			<div class='title'><p><?=strip_tags($titulo)?></p></div>
    			<div class='text'><p><?=strip_tags($desc)?></p></div>
    		</div>
    		
    		<?php $img_modal = $this->webroot.$img;?>

    		<style type="text/css">
    			.foto_modal .foto{background-image: url(<?=$img_modal?>);}
    		</style>
    	
    	<div class='bot'>
            <div class='first'></div>
            <?php
            if(!empty($neighbors['next'][$model]['id'])){
            	
    	        $parametro_capa_id = $foto[$model]['galeria_imagen_capa_id'];
    	        if ($capa_id == 0) {
    		        $parametro_capa_id = 0;
    	        }
            
    	        
                ?>
                <div class='prev_'><a href="<?=$this->webroot?>imagem/<?=$parametro_capa_id.'/'.$neighbors['next'][$model]['id']?>"><?=__d('default', 'Anteriores')?><div></div></a></div>
                <?php
            }else{
               echo '<div class="prev_ deactive"><a href="#">'.__d('default', 'Anteriores').'<div></div></a></div>';
            }

            if(!empty($neighbors['prev'][$model]['id'])){
            	
    	        $parametro_capa_id = $foto[$model]['galeria_imagen_capa_id'];
    	        if ($capa_id == 0) {
    		        $parametro_capa_id = 0;
    	        }
            
    	        
            	
            	
            	?>
                <div class='next_'><a href="<?=$this->webroot?>imagem/<?=$parametro_capa_id.'/'.$neighbors['prev'][$model]['id']?>"><?=__d('default', 'Próximos')?><div></div></a></div>
                <?php
            }else{
               echo '<div class="next_ deactive"><a href="#">'.__d('default', 'Próximos').'<div></div></a></div>';
            }
            ?>	


    	</div>



<script type="text/javascript">
	var img = $('.foto_modal .foto img'); // Get my img elem
	var pic_real_height;

	$("<img/>") // Make in memory copy of image to avoid css issues
    .attr("src", $(img).attr("src"))
    .load(function() {
        // pic_real_width = this.width;   // Note: $(this).width() will not
        pic_real_height = this.height; // work for in memory images.
       // $('.foto_modal .foto').css('height', pic_real_height);
        $('.foto_modal .foto img').remove();
    });

    $('.foto_modal .prev_, .foto_modal .next_').each(function(index, value){
    	if($(value).is('span')){
    		if($(value).find('a').length == 0){
    			var txt = $(value).text();
    			$(value).parent().append('<div class="'+$(value).attr('class')+' deactive"><a href="#">'+txt+'<div></div></a></div>');
    		}else{
    			var txt = $(value).text();
    			$(value).parent().append('<div class='+$(value).attr('class')+'><a href="'+$(value).find('a').attr('href')+'">'+txt+'<div></div></a></div>');
    		}
    		$(value).remove();
    	}
    });

    $('.foto_modal .prev_ a, .foto_modal .next_ a').click(function(e){
    	e.preventDefault();
        /*OLD*/
    	if($(this).parent().hasClass('deactive')) return;
    	$.post($(this).attr('href'), function(data){
	    	$('.foto_modal').html(data);
    	});
/*     	postToModal($(this).attr('rel'), "modal"); //OLD OLD*/

        /*NEW*/
    });
    $('.modal-pj-close').click(function(e){
    	e.preventDefault();
    	$('.foto_modal').trigger('closeModal');
    })
</script>

<?php endif; ?>

