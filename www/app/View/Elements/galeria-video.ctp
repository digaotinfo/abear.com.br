<?php

    // $texto = "wDuE_fnd1s0&list=PLgEd0TXjWBqSiJaWOkIYKtli8f4UGNYVN";
    // $pos = strpos($texto, "&list=");
    // $parte = substr($texto, 0, $pos);
    // echo $parte;
?>
<div class='galeria_ video'>
	<div class='videos_hold'>
		<div class='single row'>
			<div class='video small-12 medium-6 columns'><?=$videos[0]['Video']['video_'.$lang]?></div>
			<div class='info small-12 medium-6 columns'>
				<div class='todos'>
					<a href="<?=$this->webroot.'videos/'.$myurl[1].'/'.$videos[0]['Video']['url_amigavel_'.$lang]?>">
						<p>
							<?=__d('default', 'VER TODOS')?>
						</p>
						<div></div>
					</a>
				</div>
				<div class='title'><p><?=$videos[0]['Video']['titulo_'.$lang]?></p></div>
				<div class='text'><p><?=$videos[0]['Video']['chamada_'.$lang]?></p></div>

					<?php
						if(count($videos) > 1){
							?>
							<div class='more'>
								<?php
								for ($i=1; $i < 3; $i++) { 
									if(!empty($videos[$i])){
										?>
										<div class='vid'>
											<a href="<?=$this->webroot.'videos/'.$myurl[1].'/'.$videos[0]['Video']['url_amigavel_'.$lang]?>" video-click>
												<?php
													$frame = split("/", $videos[$i]['Video']['video_'.$lang]);
													$img_yt = split('"', $frame[4]);
													

													$texto = $img_yt[0];
												    $pos = strpos($texto, "&list=");
												    $pos2 = strpos($texto, "?list=");
												    if($pos > 0){
												    	$imgVideo = substr($texto, 0, $pos);
												    }if($pos2 > 0){
												    	$imgVideo = substr($texto, 0, $pos2);
												    }else{
												    	$imgVideo = $img_yt[0];
												    }
												    
													echo $this->Html->image('http://img.youtube.com/vi/' .$imgVideo. '/0.jpg', array('tit' => $videos[$i]['Video']['titulo_'.$lang], 'desc' => $videos[$i]['Video']['chamada_'.$lang], 'end' => $videos[$i]['Video']['video_'.$lang]));

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

</div>

<script type="text/javascript">
	$( document ).ready(function() {
		setTimeout(function(){
			$('.single .info').css('height', $('.single .video').height());
		}, 200);
	});
</script>