<?php
//print_r($registros);
//print_r($myurl);
?>

<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'News das associadas')?></p></div>
		<div class='quad'></div>
	</div>

    <?=$this->element('intros')?>

	<div class='associados_hold'>
		<div class='left_'>

			<?php
			foreach($registros as $associado):
				if(!empty($associado[$model]['imagem_' .$lang. '_file'])){

					$this_day = $this->Time->format('d', $associado[$model]['data']);
					$this_day = $this_day;
					$ano = $this->Time->format('y', $associado[$model]['data']);
					?>
						<div class='artigo date img'>
							<div class='top'>
								<p><?=$this->Time->format('d.m.Y', $associado[$model]['data']);?></p>
								<div></div>
							</div>

					<div class='imagem' align='center'>
						<?=$this->Html->image('/'.$associado[$model]['imagem_' .$lang. '_file'])?>
					</div>
					<?php

				}else{
					?>
						<div class='artigo date'>
							<div class='top'>
								<p><?=$this->Time->format('d.m.Y', $associado[$model]['data']);?></p>
								<div></div>
							</div>
					<?php
				}
				?>
				<div class='title'>
					<!-- <a href='<?=$this->webroot.$myurl[0].'/'.$myurl[1].'/mostrar/'. $associado[$model]['url_amigavel_'. $lang]?>'> -->
					<a href='<?=$this->Html->url(
												array(
													'controller' => 'imprensas',
													'action' => 'mostrar_noticia',
													'categoria' => $categoria,
													'url_amigavel' => $associado[$model]['url_amigavel_'. $lang]))?>'>
						<?=$associado[$model]['titulo_'. $lang]?>
					</a>
				</div>
				<?php if(!empty($associado[$model]['chamada_'. $lang])): ?>
					<div class='text'>
						<p>
							<?php
							echo $this->Text->truncate(
														$associado[$model]['chamada_'. $lang],
														100,
														array(
															'ellipsis' => '...',
															'exact' => false,
															'html' => false,
														)
													);
							?>
						</p>
					</div>
				<?php endif; ?>

			</div>
				<?php
			endforeach;
			?>

		<?php
		/// Páginação:
		$paginacao = $this->Paginator->params();

		if ($paginacao['pageCount'] > 1) {
			?>
			<div class='paginator bTop pTop20 new'>
				<div class='hold'>
				<?php
				$this->Paginator->options(
										array('url' => array(
											'controller' => 'imprensas',
											'action' => 'listarTodas',
											'categoria' => $categoria,
										)));
				echo $this->Paginator->prev(
											'',
											null,
											null,
											array('class' => 'prev')
									);

				echo $this->Paginator->numbers(array(
														'separator' => '',
														'currentTag' => 'a',
														'tag' => 'div',
														'class' => 'bt'
									));


				echo $this->Paginator->next(
											'',
											null,
											null,
											array('class' => 'next')
									);
				?>
				</div>
			</div>
			<?php
		}
		?>
	</div>


		<?=$this->element('right_bar_news_associadas')?>
	</div>
</div>
