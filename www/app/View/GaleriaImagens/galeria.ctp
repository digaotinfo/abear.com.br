<?php 
//print_r($fotos);
// print_r($NamePage);
?>
		<div class='row news'>

			<?php
			/// TITULO DA PÁGINA
			////////////////////////////////////
			?>
			<div class='titulo_grande'>
				<div class='title'><p><?=__d('default', 'galeria de fotos').' '.$NamePage['GaleriaCategoria']['nome_'.$lang]?></p></div>
				<div class='quad'></div>
			</div>
			<?php
			////////////////////////////////////
			/// END TITULO DA PÁGINA






			/// TÓPICOS DE FILTRO DE GALERIAS
			////////////////////////////////////
			?>
			<div class='galeria_organizar'>
				<div class='organizar'>
					<div>
						<a href="<?=$this->Html->url(array(
														'controller' => 'GaleriaImagens', 
														'action' => 'index',
														$categoria
													))?>">
							<?=__d('default', 'Ver outras galerias')?>
						</a>
					</div>
				</div>
				<div class='seta a1'></div>
			</div>
			<?php
			////////////////////////////////////
			/// END TÓPICOS DE FILTRO DE GALERIAS






			/// ESPAÇO DA GALERIA
			////////////////////////////////////
			?>
			<div class='galeria_evento'>
				<?php
				/// GALERIA CAPA
				////////////////////////////////////
				?>
				<div class='left_'>
					<div align='center' class='mBot10 padding-capa-galeria'><?=$this->Html->image('/'.$fotos[0]['GaleriaImagenCapa']['img_file'])?></div>
					<div class='title padding-capa-galeria'><p><?= $fotos[0]['GaleriaImagenCapa']['titulo_'.$lang]?></p></div>
					<!-- <div class='date padding-capa-galeria'><p><?= $this->Time->format('d.m.Y', $fotos[0]['GaleriaImagenCapa']['data']);?></p></div> -->
					<div class='text padding-capa-galeria'><p><?= $fotos[0]['GaleriaImagenCapa']['descricao_'.$lang]?></p></div>
				</div>
				<?php
				////////////////////////////////////
				/// END GALERIA CAPA
				?>

				<div class='right_'>
					<?php






					
					/// GALERIA IMAGENS
					////////////////////////////////////
					?>
					<div class='galeria_news'>
						<?php
						$i = 0;
						$count = 1;
						$count2 = 0;
						foreach($fotos as $foto):

							if($count == 1){
								//echo "<div class='row'>";
							}

							$classe_final = '';
							$i++;
							if (count($fotos) == $i) {
								$classe_final = 'end';
							}
							?>

							<div class="medium-4 large-3 small-12 columns small-centered medium-uncentered galerias-capa-content <?=$classe_final?>">
								<div class="small-12 galeria-thumbs-fotos" style="background-image: url('<?=$this->webroot . $foto[$model]['img_file'];?>');">

									<a href="#" modal-pj='.foto_modal' id='<?=$fotos[0]['GaleriaImagenCapa']['id']?>' rel='<?=$foto[$model]['id']?>'>
										<?=$this->Html->image('gif-transparente.gif', array('rel' => $foto[$model]['id'],
																					'width' => '100%',
																					'height' => '100%'));?>
									</a>

								</div>
								<hr>
							</div>
							<?
							$count++;
							$count2++;
							if($count == 3 || $count2 >= count($fotos)){
								//echo "</div>";
								$count = 1;
							}
						endforeach; 
						?>
					</div>
					<?php
					////////////////////////////////////
					/// END GALERIA IMAGENS







					?>
				</div>
			</div>

			<?php
			/// PAGINAÇÃO
			////////////////////////////////////
			if ($this->Paginator->counter('{:pages}') > 1) {
				?>
				<div class="small-12">
					<div class='paginator'>
						<div class='hold'>
							<?php 
							$this->Paginator->options(
											array('url' => array(
												'controller' => 'GaleriaImagens', 
												'action' => 'galeria',
												'categoria' => $categoria,
												'url_amigavel' => $url_amigavel
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
				</div>
				<?php
			}
			////////////////////////////////////
			/// END PAGINAÇÃO
			?>
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
