<?php
//print_r($fotos);
//print_r($videos);
?>
<div class='row exp_de_voar'>
	<div class='titulo_grande'>
		<div class='title'><p><?=$fotos[$model]['titulo_'.$lang]?></p></div>
		<div class='quad'></div>
	</div>
	<div class='orgaos'>
		<div class='first'>
			<div class='left_'>
				<?=$this->Html->image('/'.$fotos[$model]['img_file'])?>
				<div class='seta_'><a href="#" data-reveal-id="fotos_modal"><div></div></a></div>
			</div>
			<div class='right_'>
				<div class='text'><p><?=$fotos[$model]['texto_'.$lang]?></p></div>
				<div class='todos'><a href="#"><p><?=__d('default', 'Ver todas as imagens')?></p><div></div></a></div>
			</div>
		</div>
		<div class='second row'>
			<div class='left_ small-4 columns'>
				<div>
					<div class='text'><p><?=$videos[0]['Video']['chamada_'.$lang]?></p></div>
					<div class='todos'><a href="<?=$this->Html->url(array('controller' => 'videos', 'action' => 'index', $videos[0]['Video']['url_amigavel_'.$lang]))?>"><p><?=__d('default', 'Ver todos')?></p><div></div></a></div>
				</div>
			</div>
			<div class='right_ small-8 columns'>
				<?=$videos[0]['Video']['video_'.$lang]?>
			</div>
		</div>
	</div>
</div>