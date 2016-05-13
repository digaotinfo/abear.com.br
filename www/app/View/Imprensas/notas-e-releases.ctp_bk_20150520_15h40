<?php
//print_r($release);
//print_r($imprensa);
//print_r($albuns);
//print_r($registros);
// print_r($registros);
?>

<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'Notas e Releases')?></p></div>
		<div class='quad'></div>
	</div>
	<?=$this->element('intros')?>
	<div class='imprensa_hold mBot30'>
		<div class='left_'>
			<div class='title'><p><?=__d('default', 'Notas e Releases')?></p></div>
			<div class='cargo'><p><?=__d('default', 'Assessoria de imprensa da abear')?></p></div>
			
			<? 
			foreach($release as $nota): 
				?>
				<div class='contato'>
					<div class='name'><p><?=$this->Text->autoLink($nota['NotaRelease']['nome'], array('target' => '_blank'));?></p></div>
					<div class='info'><p><?=$nota['NotaRelease']['tel']?></br><?=$this->Text->autoLink($nota['NotaRelease']['email'], array('target' => '_blank'));?></p></div>
				</div>
				<div class='separator'></div>
				<?  
			endforeach; 
			?>
			
			
		</div>
		<div class='right_' id="divisor-NR-index">
			<?php 
			foreach($registros as $noticia):
				if(!empty($noticia[$model]['chamada_'.$lang])):
				
				endif;
				?>
				<div class='artigo date columns'>
					<div class='top'><p><?=$this->Time->format('d/m/y', $noticia[$model]['data']);?></p><div></div></div>
					<div class='title'>
						<a href='<?=$this->Html->url(
													array(
														'controller' => 'imprensas', 
														'action' => 'mostrar_noticia',
														'categoria' => $categoria,
														'url_amigavel' => $noticia[$model]['url_amigavel_'.$lang]
													)
												)?>'>
							<p><?=$noticia[$model]['titulo_'.$lang]?></p>
						</a>
					</div>

					
					<?php
					$classText = '';
					if (!empty($noticia[$model]['imagem_' .$lang. '_file'])):
						if (strlen(trim($noticia[$model]['imagem_' .$lang. '_file'])) > 0):
							$classText = 'medium-8 small-12 columns';
							?>
							<div class="medium-4 small-12 columns">
								<a href='<?=$this->Html->url(
														array(
															'controller' => 'imprensas', 
															'action' => 'mostrar_noticia',
															'categoria' => $categoria,
															'url_amigavel' => $noticia[$model]['url_amigavel_'.$lang]
														)
													)?>'>
									<?=$this->Html->image('/'.$noticia[$model]['imagem_' .$lang. '_file'])?>
								</a>
							</div>
							<?php
						endif;
					endif;
					?>
					
					<div class='text <?=$classText?>'>
						<a href='<?=$this->Html->url(
													array(
														'controller' => 'imprensas', 
														'action' => 'mostrar_noticia',
														'categoria' => $categoria,
														'url_amigavel' => $noticia[$model]['url_amigavel_'.$lang]
													)
												)?>'>
							<p>
								<?php
								echo $this->Text->truncate(
											strip_tags($noticia[$model]['texto_1_'.$lang]),
											200,
											array(
												'ellipsis' => '...',
												'exact' => false,
												'html' => false,
											)
										);
								?>
							</p>
						</a>
					</div>
				</div>
				<? 
			endforeach; 
			?>
			<?php
			if ($this->Paginator->counter('{:pages}') > 1) {
				?>
				<div class='paginator bTop pTop20'>
					<div class='hold'>
					
					<?php 
						/////////////////////////////////////
						/// Colocar os parâmetros de Categoria junto com a controller e action.
						/// O Routes está configurado para receber isso.
						/////////////////////////////////////
						$this->Paginator->options(array(
							'url' => array(
									'controller' => 'imprensas',
									'action' => $this->params['name'],
									'categoria' => $categoria,
								)
						));
					    echo $this->Paginator->prev(
	                                            '',
	                                            null,
	                                            null,
	                                            array('tag' => 'div', 'class' => 'prev')
	                                            );
	               
	                 
	                	echo $this->Paginator->numbers(array(
	                										'modulus' => 5,
	                										'ellipsis' => '...',
	                    									'separator' => '',
	                                                        'currentTag' => 'a',
	                    									'tag' => 'div',
	                    									'class' => 'bt'
	                                                                                        
	                    									));
	                           
	                 
	                   	echo $this->Paginator->next(
	                                            '',
	                                            null,
	                                            null,
	                                            array('tag' => 'div','class' => 'next')
	                                            );
	                 ?>
						
						
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<!-- Galeria -->
		<?php //$tipo_galeria?>
			<?=$this->element('tipo-galeria')?>
		<!-- /Galeria  -->
	</div>
</div>
