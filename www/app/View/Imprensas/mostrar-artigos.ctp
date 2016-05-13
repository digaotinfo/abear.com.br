<?php
//print_r($registro);


$this->start('og:title');
	?>
	<meta property="og:title" content="<?=$registro[$model]['titulo_'.$lang]?>"/>
	<?php
$this->end();

$this->start('og:description');
	$texto = str_replace('"', '', $registro[$model]['texto_1_'.$lang]);
	?>
	<meta property="og:description" content="<?=strip_tags($texto)?>"/>
	<?php
$this->end();




$this->start('og:image');
	if (!empty($registro[$model]['imagem_' .$lang. '_file'])) {
		?>
		<meta property="og:image" content="<?=$this->Html->url('/'. $registro[$model]['imagem_' .$lang. '_file'], true)?>" />
		<?php
	} else {
		if (strpos($registro[$model]['texto_1_'.$lang],'<img') !== false) {
			require 'phpQuery-onefile.php';
			$pq = phpQuery::newDocumentHTML($registro[$model]['texto_1_'.$lang]);
			$img = $pq->find('img:first');
			$src = $img->attr('src');
			
			?>
			<meta property="og:image" content="<?=$src?>" />
			<?php
		}
	}
$this->end();




?>

<style type="text/css">
	.espacamento-imagem {
		padding-top: 10px;
		padding-bottom: 10px;
	}
</style>
<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=$txtArtigo['TxtArtigo']['titulo_'.$lang]?></p></div>
		<div class='quad'></div>
	</div>
	<?=$this->element('intros')?>
	<div class='artigos'>
		<div class='associados_hold'>
		
		<div class='left_'>
			<div class='artigo date'>
				<div class='top'><p><?=$this->Time->format('d/m/y', $registro[$model]['data']);?></p><div></div></div>
				<div class='title'><p><?=$registro[$model]['titulo_'.$lang]?></p></div>
				<?php
				if (!empty($registro[$model]['imagem_' .$lang. '_file'])):
					?>
					<div class="small-12 columns espacamento-imagem text-center">
						<?=$this->Html->image('/'.$registro[$model]['imagem_' .$lang. '_file'])?>
					</div>
					<?php
				endif;
				?>
				<div class='text'><p><?=$registro[$model]['texto_1_'.$lang]?></p></div>

                <?php
                	echo $this->element('galeria-fotos-eventos');
                ?>

				<div class='text'><p><?=$registro[$model]['texto_2_'.$lang]?></p></div>
				
				<div class='social_share'>
					<a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
					<a href="<?=urlencode($registro[$model]['titulo_'.$lang]) ?>+via @abear_br+<?=Router::url(''.$this->Html->url(
													array(
														'controller' => 'imprensas',
														'action' => 'mostrar_noticia',
														'categoria' => $categoria,
														'url_amigavel' => $registro[$model]['url_amigavel_'.$lang])), true)?>" share-pj='twitter'><div></div></a>
					<a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
					<a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg="<?=Router::url('/uploads/img/logo/abear_200px.png', true)?>" share-pj-pindesc="<?=$registro[$model]['titulo_'.$lang]?>"><div></div></a>
					<a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
				</div>
				<br>
			</div>




			<div class='pagina_eventos'>
				<div class='hold'>
					<div>
						<?php
							$next_ = '';
							$prev_ = '';
							if(empty($neighbors['prev'][$model]['url_amigavel_'.$lang])){ $prev_ = 'desactive';}
							if(empty($neighbors['next'][$model]['url_amigavel_'.$lang])){ $next_ = 'desactive';}
						?>
	
						<a href="<?=$this->Html->url(
													array(
														'controller' => 'imprensas',
														'action' => 'mostrar_noticia',
														'categoria' => $categoria,
														'url_amigavel' => $neighbors['next'][$model]['url_amigavel_'.$lang]
													));?>" class='arrowL <?=$next_?>'>
							<div></div>
							<p><?=__d('default', 'anterior')?></p>
						</a>
	
						<div><p> | </p></div>
			
						<a href="<?=$this->Html->url(
													array(
														'controller' => 'imprensas',
														'action' => 'mostrar_noticia',
														'categoria' => $categoria,
														'url_amigavel' => $neighbors['prev'][$model]['url_amigavel_'.$lang]
													));?>" class='arrowR <?=$prev_?>'>
							<div></div>
							<p><?=__d('default', 'próximo')?></p>
						</a>
					</div>
				</div>
			</div>




		</div>
		<?=$this->element('right_bar_news_associadas')?>
		</div>
	</div>
</div>
