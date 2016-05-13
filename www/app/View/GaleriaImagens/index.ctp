<?php 
//print_r($fotos);
//print_r($eventos);
//print_r($capas);
// print_r($registros);
//print_r($this->Paginator->params());
// print_r($categoria);
// print_r($tipo_filtro);


//echo '['. strlen($categoria) .']';
?>


<div class='row news'>
	
	<?php
	/// TITULO DA PÁGINA
	////////////////////////////////////
	$nome_da_categoria = '';
	if (!empty($NamePage['GaleriaCategoria']['nome_'.$lang])) {
		$nome_da_categoria = $NamePage['GaleriaCategoria']['nome_'.$lang];
	}
	?>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'galeria de fotos').' '.$nome_da_categoria?></p></div>
		<div class='quad'></div>
	</div>
	<?php
	////////////////////////////////////
	/// END TITULO DA PÁGINA






	/// TÓPICOS DE FILTRO DE GALERIAS
	////////////////////////////////////
	$mais_recentes_active = '';
	$por_album_active = '';
	$posicao_seta = 'a1';

	if (!empty($tipo_filtro)) {
		if ($tipo_filtro == 'mais-recentes') {
			$mais_recentes_active = 'active';
			$posicao_seta = 'a2';
		}
		if ($tipo_filtro == 'por-album') {
			$por_album_active = 'active';
		}
	} else {
		$por_album_active = 'active';
	}
	?>
	<div class='galeria_organizar'>
		<div class='organizar'>
			<div><p><?=__d('default', 'Organizar:')?></p></div>
			<div><a href="<?=$this->Html->url(
												array(
													'controller' => 'GaleriaImagens', 
													'action' => 'index',
													$categoria,
													'mais-recentes',
												)
											);?>" class='<?=$mais_recentes_active?>'><?=__d('default', 'mais recentes')?></a></div>
			<div class='separador'><p> | </p></div>
			<div><a href="<?=$this->Html->url(
												array(
													'controller' => 'GaleriaImagens', 
													'action' => 'index',
													$categoria,
													'por-album',
												)
											);?>" class="<?=$por_album_active?>"><?=__d('default', 'por album')?></a></div>
		</div>
		<div class='seta <?=$posicao_seta?>'></div>
	</div>
	<?php
	////////////////////////////////////
	/// END TÓPICOS DE FILTRO DE GALERIAS






	/// ESPAÇO DA GALERIA
	////////////////////////////////////
	?>
	<div class='galeria_news'>
		<?php
		/// GALERIA
		////////////////////////////////////
		//echo "[". $categoria ."]";
		?>
		<div class='row'>
			<?php
			if (empty($registros)) {
				?>
				<div class="small-12 text-center">
					<?=__d('default', 'Em breve mais informações.');?>
				</div>
				<?php
			}



			$i = 0;
			foreach($registros as $registro): 
				$i++;

				$classe_final = '';
				if (count($registros) == $i) {
					$classe_final = 'end';
				}
				?>
				<div class="medium-4 large-3 small-12 columns small-centered medium-uncentered galerias-capa-content <?=$classe_final?>">

						<div class="small-12 galeria-thumbs-capas" style="background-image: url('<?=$this->webroot . $registro[$model]['img_file'];?>');">
							<a <?php 
								/// LINK DA IMAGEM
								/////////////////////////////////////

								/// ===> Caso seja mais recentes, ele irá abrir um lightbox com o ID geral
								if($tipo_filtro == 'mais-recentes'){ 
									?>
									href="#" modal-pj='.foto_modal' id='<?=$registros[0]['GaleriaImagenCapa']['id']?>' rel='<?=$registro[$model]['id']?>'
									<?php 

								/// ===> Caso seja galeria, ele abrirá o lighbtbox com o ID de galeria
								}else{ 
									?>
									href="<?=$this->Html->url(
																array(
																	'controller' => 'GaleriaImagens', 
																	'action' => 'galeria',
																	'categoria' => $categoria,
																	'url_amigavel' => $registro[$model]['url_amigavel_'.$lang]
																)
															);?>"
									<?php 
								} 
								/////////////////////////////////////
								/// END LINK DA IMAGEM
								?> > <?php





								/// IMAGEM
								/////////////////////////////////////
								echo $this->Html->image('gif-transparente.gif', array(
																					'rel' => $registro['GaleriaImagenCapa']['id'], 
																					'value' => $registro['GaleriaImagenCapa']['id'],
																					'data-reveal-id' => 'fotos_modal', 
																					'como-voar-img',
																					'width' => '100%',
																					'height' => '100%',
																				));
								/////////////////////////////////////
								/// END IMAGEM
								?>
							</a>
						</div>	
							
						<div class='title'>
							<p>
								<?=$registro[$model]['titulo_'.$lang]?>
							</p>
						</div>
						

						<div class='info'>
							<p>
								<?php 
								if($tipo_filtro == 'mais-recentes'){ 
									?>
									Capa: <?=$registro['GaleriaImagenCapa']['titulo_'.$lang]?>
									<?php 
								}else{ 
									?>
									<?=$this->Time->format('d.m.Y', $registro['GaleriaImagenCapa']['data']);?>
									<?php 
								} 
								?>
							</p>
						</div>

						<hr>
				</div>
				<?php 
			endforeach; 
			?>
		</div>
		<?php
		////////////////////////////////////
		/// END GALERIA






		/// PAGINAÇÃO
		////////////////////////////////////
		$paginacao = $this->Paginator->params();
		
		if ($paginacao['pageCount'] > 1) {
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
		////////////////////////////////////
		/// END PAGINAÇÃO
		?>
	</div>
	<?php
	////////////////////////////////////
	/// END ESPAÇO DA GALERIA
	?>

</div>



