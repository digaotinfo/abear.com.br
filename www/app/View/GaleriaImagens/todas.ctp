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
					
					<div>
						<a href="<?php
								echo $this->Html->url(
									array(
										'action' => 'todas',
										'por-evento', 
									)
								);
								?>" <?php if ($tipo == 'por-evento'){echo " class='active'";};?>>
							<?=__d('default', 'por evento')?>
						</a>
					</div>
					<div class='separador'><p> | </p></div>

					<div>
						<a href="<?php
								echo $this->Html->url(
									array(
										'action' => 'todas',
										'mais-recentes', 
									)
								);
								?>" <?php if ($tipo == 'mais-recentes'){echo " class='active'";};?>>
							<?=__d('default', 'mais recentes')?>
						</a>
					</div>
				</div>
				<div class='seta <?php 
									if ($tipo == "por-evento"){
										echo "a2";
									} else {
										echo "a1";
									};
								?>'></div>
			</div>
			<div class='galeria_news'>
					<?php 
					//print_r($registros);
					$count = 1;
					$count2 = 0;
					foreach($registros as $registro): 
						if($count == 1){echo "<div class='row'>";}
						if ($tipo == "por-evento"){
							$id_galeria = "";
							$rel = '';
							
						} else {
							$id_galeria = "galeria-date='0'";
							$rel = "rel='".$registro[$model]['id']."'";
						};
						
						?>
						<div>
							<a modal-pj='.foto_modal' id='<?=$registro[$model]['galeria_imagen_capa_id']?>' <?=$rel.' '.$id_galeria?>>
								<?=$this->Html->image('/'.$registro[$model]['img_file'], array(
																							//'rel' => $registro[$model]['id'], 
																							//'value' => $registro[$model]['galeria_imagen_capa_id'], 
																							//'data-reveal-id' => 'fotos_modal', 
																							//'como-voar-img'
																						)
																						);?>
							</a>
							
							
							<div class='title'>
								<p><?=$registro[$model]['titulo_'.$lang]?></p>
							</div>
							<div class='info'>
								<?php
								if (!empty($registro[$model]['data'])) {
									?>
									<p><?=$this->Time->format('d.m.Y', $registro[$model]['data']);?></p>
									<?php
								}


								if (!empty($registro[$model]['descricao_'. $lang])) {
									?>
									<?=$registro[$model]['descricao_'. $lang];?>
									<?php
								}
								?>

							</div>
						</div>
						<?php 
						$count++;
						$count2++;
						if($count == 5 || $count2 >= count($registros)){echo "</div>"; $count = 1;}
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
				<?php
			}
			?>
		</div>

        <div id='img_info_div'>
       		<div class='title'><p>Titulo da ibagem</p></div>
       		<div class='text'><p>Texto descritivo da ibagem</p></div>
        </div>
		<?php
		/*
			?>
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
			<?php
		*/
		?>
