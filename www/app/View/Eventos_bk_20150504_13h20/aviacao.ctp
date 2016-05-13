<?php 
	//print_r($txt);
	//print_r($videos);
	//print_r($videoDestaques);
	//die();
	$this->start('og:title');
        ?>
        <meta property="og:title" content="<?=$txt[$model]['titulo_'.$lang]?>"/>
        <?php
    $this->end();

    $this->start('og:image');
        if (!empty($txt[$model]['imagem_facebook_' .$lang. '_file'])) {
            $src = Router::url('/'.$txt[$model]['imagem_facebook_' .$lang. '_file'], true);
            ?>
            <meta property="og:image" content="<?=$src?>" />
            <?php
        }
    $this->end();
?>

<div class='row progEvento'>
	<div class='titulo_grande img'>
		<div class='title'>
		<?=$this->Html->image('/'.$txt[$model]['logo_' .$lang. '_file'])?>
		</div> 
		<div class='quad'></div>
	</div>

	<?=$this->element('intros')?>
	
	<?php if(!empty($txt)){ ?>
	<div class='text bBot'>
		<p><?=$txt[$model]['texto_'.$lang]?></p>
	</div>
	<?php } ?>
	

	<?php 
		foreach($videosPaginate as $video){

		?>
		<div class="video_">
			<div class="row" data-equalizer="">
				<div class="medium-8 small-12 columns" data-equalizer-watch="">
					
					<div class="flex-video widescreen">
						<?=$video['Video']['video_'.$lang]?>
					</div>
				</div>
				<div class="medium-4 small-12 columns content-video video_info vertical-align" data-equalizer-watch="">
					<div class='v-bottom'>
						<p class="title"><?=$video['Video']['titulo_'.$lang]?></p>
						<p class="text"><?=$video['Video']['chamada_'.$lang]?></p>
						<p class="desc"><?=$video['Video']['descricao_'.$lang]?></p>
						<?php
							$noBorder = '';
							if($video == end($videosPaginate)){
								$noBorder = 'no-border';
							 }
						?>
						<div class="traco <?=$noBorder?>"></div>
					</div>
					
				</div>
    		</div>
		</div>
		<?php } ?>

		<div class='paginator bTop pTop20'>
     		<div class='hold'>
    		
    		<?php 
    		    echo $this->Paginator->prev(
                                        '',
                                        null,
                                        null,
                                        array('tag' => 'div', 'class' => 'prev', 
                                                    'url' => array(
                                                     				"#" => "listagem",
                                                     				)
                                            )
                                        );
           
             
            	echo $this->Paginator->numbers(array(
            										'modulus' => 5,
            										'ellipsis' => '...',
                									'separator' => '',
                                                    'currentTag' => 'a',
                									'tag' => 'div',
                									'class' => 'bt',
                                                    'url' => array(
    	                                                            "#" => "listagem",
    	                                                        ),
                									));
                       
             
               	echo $this->Paginator->next(
                                        '',
                                        null,
                                        null,
                                        array('tag' => 'div','class' => 'next', 
                                                    'url' => array(
    	                                                            "#" => "listagem",
    	                                                        )
                                            )
                                        );
             ?>
    			
    			
    		</div>
     	</div>
	<div class='social_share right'>
		<a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
		<a href="<?=urlencode($txt[$model]['titulo_'.$lang]) ?>+via @abear_br+<?=Router::url('', true)?>" share-pj='twitter'><div></div></a>
		<a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
		<?php  
			if(!empty($txt[$model]['logo_' .$lang. '_file'])){
				$img = $src = Router::url('/'.$txt[$model]['logo_' .$lang. '_file'], true);	
			}else{
				$img = Router::url('/uploads/img/logo/abear_200px.png', true);
			}
		?>
		<a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg="<?=$img?>" share-pj-pindesc="<?='Por dentro da aviação.'?>"><div></div></a>
		<a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
	</div>
	
</div>
<script type="text/javascript">
	$( document ).ready(function() {
		// >>> video por dentro da aviação
	 //    var w = $('.progEvento .video iframe').attr('width', '600');
		// var h = $('progEvento .video iframe').attr('height', '100%');
		// if($(window).width() < '945'){
		// 	var w = $('.progEvento .video iframe').attr('width', '550');
		// }
		// if($(window).width() < '865'){
		// 	var w = $('.progEvento .video iframe').attr('width', '500');
		// }
		// if($(window).width() < '790'){
		// 	var w = $('.progEvento .video iframe').attr('width', '480');
		// }
		// if($(window).width() < '945'){
		// 	var w = $('.progEvento .video iframe').attr('width', '450');
		// }
		// if($(window).width() < '715'){
		// 	var w = $('.progEvento .video iframe').attr('width', '400');
		// }

		// $('iframe').css("width", w);
		// $('iframe').css("height", h);
	    // <<< video por dentro da aviação
	});
</script>
