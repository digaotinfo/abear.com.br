<?php 
//print_r($fotos);
?>
		<div class='row news'>
			<div class='titulo_grande'>
				<div class='title'><p><?=__d('default', 'galeria de fotos')?></p></div>
				<div class='quad'></div>
			</div>
			<div class='galeria_organizar'>
				<div class='organizar'>
					<div><a href="<?php
									// echo $this->Html->url(
									// 	array(
									// 		'action' => 'todas',
									// 	)
									// );

									////////////////////////
									///////////////////////
									echo $this->webroot.'galerias/'.$myurl[1];
									?>"><?=__d('default', 'Ver outras galerias')?></a></div>
				</div>
				<div class='seta a1'></div>
			</div>




			<div class='galeria_evento'>
				<div class='left_'>
					<div align='center' class='mBot10 padding-capa-galeria'><?=$this->Html->image('/'.$fotos[0]['GaleriaImagenCapa']['img_file'])?></div>
					<div class='title padding-capa-galeria'><p><?= $fotos[0]['GaleriaImagenCapa']['titulo_'.$lang]?></p></div>
					<div class='date padding-capa-galeria'><p><?= $this->Time->format('d.m.Y', $fotos[0]['GaleriaImagenCapa']['data']);?></p></div>
					<div class='text padding-capa-galeria'><p><?= $fotos[0]['GaleriaImagenCapa']['descricao_'.$lang]?></p></div>
				</div>

				<div class='right_'>
					<div class='galeria_news'>
							<?
							$count = 1;
							$count2 = 0;
							foreach($fotos as $foto):
								if($count == 1){
									echo "<div class='row'>";
								}
								?>

								<div>
									<a href="#" modal-pj='.foto_modal' id='<?=$fotos[0]['GaleriaImagenCapa']['id']?>' rel='<?=$foto[$model]['id']?>'>
										<?=$this->Html->image('/'.$foto[$model]['img_file'], array('rel' => $foto[$model]['id']));?>
									</a>
								</div>
								<?
								$count++;
								$count2++;
								if($count == 3 || $count2 >= count($fotos)){
									echo "</div>";
									$count = 1;
								}
							endforeach; 
							?>
					</div>
				</div>

			<?php
			if ($this->Paginator->counter('{:pages}') > 1) {
				?>
				<div class='paginator'>
					<div class='hold'>
					<?php 
						$this->Paginator->options(
										array('url' => array(
											'controller' => 'galeriaImagens', 
											'action' => 'galeria',
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
	</div>

		<div class='foto_modal row' id='fotos_modal' data-reveal>
			<div class='top'><div class='first'></div><div class='last'><a href="#" class='close-reveal-modal'>fechar</a> </div></div>
			<div class='foto' style="background: url(img/news/galeria-fotos_foto.png) no-repeat center center;"> </div>
			<div class='info'>
				<p class='title'>Titulo da foto</p>
				<p class='text'>Lorem ipsum dolor sit amet, nostrum splendide eu mea, id accusamus disputando. Lorem ipsum dolor sit amet, nostrum splendide eu mea, id accusamus disputando.</p>
			</div>
			<div class='bot'>
				<div class='first'></div>
				<div class='prev_'><a href="#">anterior<div></div></a></div>
				<div class='next_'><a href="#">próximo<div></div></a></div>
			</div>
		</div>
