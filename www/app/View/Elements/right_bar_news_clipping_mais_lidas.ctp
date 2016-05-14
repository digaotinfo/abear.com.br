<?php 
//print_r($videos); 
	
?>
<div class='right_ associa_Rbar'>
	
	<!-- FACEBOOK -->
	<div id='bt_fb'>
		<div class='title'><p>abear <?=__d('default', 'no')?> facebook</p></div>
		<div class="fb-like-box" data-href="https://www.facebook.com/voarpormaisbr" data-width="232" data-height="260" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
		<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
	</div>
	
	<!-- TWITTER -->
	<div id='bt_tw'>
		<div class='title'><p>abear <?=__d('default', 'no')?> twitter</p></div>
		<a class="twitter-timeline" href="https://twitter.com/abear_br" data-widget-id="473486710160912384">Tweets by @abear_br</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	
	
	<?php
	if (!empty($mais_lidas)) {
		?>
		<div id='mais_lidas'>
			<div class='title'><p><?=__d('default', 'mais lidas')?></p></div>
			
			
			<?php
			foreach ($mais_lidas as $registro):
				?>
				<div class='noticia_'>
					<a href='<?=$this->Html->url(array(
													'controller' => 'imprensas', 
													'action' => 'clipping',
													'url_amigavel' => 4
												))?>'>
						<div class='seta mais-lidas'></div>
						<div class='conteudo'><p><i><?=$registro[$model_maislidas]['titulo_'. $lang]?></i></p></div>
					</a>
				</div>
				<?php
			endforeach;
			?>
		</div>
		<?php
	}
	?>
	
	<?php if(!empty($videos[0]['Video']['video_'.$lang])){ ?>
	<div id='videos_'>
		<p class='title'><?=__d('default', 'vídeos')?></p>
		<a href='<?=$this->Html->url(array('controller' => 'videos', 'action' => 'videos', $videos[0]['Video']['url_amigavel_'.$lang]))?>'>
		
		<?php
			$frame = split("/", $videos[0]['Video']['video_'.$lang]);
			$img_yt = split('"', $frame[4]);
			
			echo $this->Html->image('http://img.youtube.com/vi/' .$img_yt[0]. '/0.jpg');
		?>
		
		</a>
		<div class='todos'>
			<a href="<?=$this->Html->url(array('controller' => 'videos', 'action' => 'index'))?>"><p>Ver todos</p><div></div></a>
		</div>
	</div>
	<?php } ?>
</div>