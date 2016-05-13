<?php
//print_r($release);
//print_r($imprensa);
//print_r($albuns);
//print_r($registros);
//print_r($release);
?>

<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'NOTÍCIAS')?></p></div>
		<div class='quad'></div>
	</div>
	<?=$this->element('intros')?>
	<div class='imprensa_hold mBot30'>
		<div class='left_'>
			<div class='title'><p><?=__d('default', 'Notas e releases')?></p></div>
			<div class='cargo'><p><?=__d('default', 'Assessoria de imprensa da abear')?></p></div>
			
			<?php 
			foreach($release as $nota): 
				?>
				<div class='contato'>
					<div class='name'><p><?=$nota['NotaRelease']['nome']?></p></div>
					<div class='info'><p><?=$nota['NotaRelease']['tel']?></br><?=$nota['NotaRelease']['email']?></p></div>
				</div>
				<div class='separator'></div>
				<?  
			endforeach; 
			?>
			
			
		</div>
		<div class='right_'>
			<?php 
			//print_r($registros);
			foreach($registros as $noticia):
				$url_noticia = $this->Html->url(array(
													'controller' => 'imprensas', 
													'action' => 'mostrar_noticia',
													'categoria' => $noticia['NoticiaCategoria']['url_amigavel_'.$lang],
													'url_amigavel' => $noticia[$model]['url_amigavel_'.$lang],
												));
				?>
				<div class='artigo date'>
					<div class='top'><p><?=$this->Time->format('d/m/y', $noticia[$model]['data']);?></p><div></div></div>
					<div class='title'>
						<a href='<?=$url_noticia?>'>
							<p>
								<?=$noticia['NoticiaCategoria']['nome_'.$lang];?> - <?=$noticia[$model]['titulo_'.$lang]?>
							</p>
						</a>
					</div>
					<div class='text'>
						<p><?=$noticia[$model]['chamada_'.$lang];?></p>
					</div>
				</div>
				<?php 
			endforeach; 


			if ($this->Paginator->counter('{:count}') > 0) {
				?>

				<div class='paginator bTop pTop20'>
					<div class='hold'>
					
					<?php 
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
