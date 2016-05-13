<?php 
//print_r($fotos);
//print_r($eventos);
//print_r($capas);
//print_r($registros);
//print_r($this->Paginator->params());
?>
<div class='row news'>
			<div class='titulo_grande'>
				<div class='title'><p><?=__d('default', 'galeria de fotos')?></p></div>
				<div class='quad'></div>
			</div>
			<div class='galeria_organizar'>
				<div class='organizar'>
					<div><p><?=__d('default', 'Organizar:')?></p></div>
					<div><a href="#"><?=__d('default', 'por evento')?></a></div>
					<div class='separador'><p> | </p></div>
					<div><a href="#" class='active'><?=__d('default', 'mais recentes')?></a></div>
				</div>
				<div class='seta a1'></div>
			</div>
			<div class='galeria_news'>
				<div class='row'>
					<?php 
					//print_r($registros);
					foreach($registros as $registro): 
						?>
						<div>
							<a href="<?=$registro[$model]['galeria_imagen_capa_id']?>" data-reveal-id="fotos_modal">
								<?=$this->Html->image('/'.$registro[$model]['img_file'], array(
																							'rel' => $registro[$model]['galeria_imagen_capa_id'], 
																							'value' => $registro[$model]['galeria_imagen_capa_id'], 
																							'data-reveal-id' => 'fotos_modal', 
																							'como-voar-img'));?>
							</a>
							
							
							<div class='title'><p><?=$registro[$model]['titulo_'.$lang]?></p></div>
							<div class='info'><p><?=$this->Time->format('d.m.Y', $registro[$model]['data']);?></p></div>
						</div>
						<?php 
					endforeach; 
					?>
				</div>

			</div>
			<div class='paginator'>
				<div class='hold'>
				<?php 
                	echo $this->Paginator->prev(
                                            '',
                                            array('model' => $model),
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
		</div>


		<div class='foto_modal row' id='fotos_modal' data-reveal>
			<div class='top'><div class='first'></div><div class='last'><a href="#" class='close-reveal-modal'><?=__d('default', 'fechar')?></a> </div></div>
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
