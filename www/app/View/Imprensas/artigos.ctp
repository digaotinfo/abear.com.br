<?php
//print_r($registros);
//print_r($myurl);
//TROCADO O ORIGINAL POR UMA COPIA DO ASSOCIADOS (Modificado)
//print_r($categoria);
?>

<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=$txtArtigo['TxtArtigo']['titulo_'.$lang]?></p></div>
		<div class='quad'></div>
	</div>

    <?=$this->element('intros')?>

	<div class='associados_hold'>
		<div class='left_'>

			<?php
			foreach($registros as $associado):
				?>
				<div class='artigo date columns'>
					<div class='top'>
						<p><?=$this->Time->format('d.m.Y', $associado[$model]['data']);?></p>
						<div></div>
					</div>

					<?php
					$class_texto = 'small-12';
					if(!empty($associado[$model]['imagem_' .$lang. '_file'])){
						if (strlen(trim($associado[$model]['imagem_' .$lang. '_file'])) > 0){
							$class_texto = 'small-8';
							?>
							<div class="small-4 columns">
								<a href='<?=$this->Html->url(
															array(
																'controller' => 'imprensas',
																'action' => 'mostrar_noticia',
																'categoria' => $categoria,
																'url_amigavel' => $associado[$model]['url_amigavel_'. $lang]
															)
														)?>'>
									<?=$this->Html->image('/'.$associado[$model]['imagem_' .$lang. '_file'])?>
								</a>
							</div>
							<?php
						}
					}
					?>
					<div class='title'>
						<a href='<?=$this->Html->url(
													array(
														'controller' => 'imprensas',
														'action' => 'mostrar_noticia',
														'categoria' => $categoria,
														'url_amigavel' => $associado[$model]['url_amigavel_'. $lang]
													)
												)?>'>
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
			<div class='paginator pTop20 new'>
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
											array(
												'class' => 'prev',
												)
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
