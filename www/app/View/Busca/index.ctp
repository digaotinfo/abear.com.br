<?php
$this->start('script');
		//echo $this->Html->script('abear');
		?>
		<script type="text/javascript">
			$( document ).ready(function() {
				$("#resultado_de_busca #btn_busca").click(function()
				{
					if($("#resultado_de_busca #input_busca").val() != '')
					{
						window.location = '<?= $this->Html->url(array("controller" => "busca"));?>/' + $("#resultado_de_busca #input_busca").val();	
					}
				});
			});
		</script>
		<?php
$this->end();

$this->start('css');
		echo $this->Html->css('busca');
$this->end();
?>



<div class='row' id="resultado_de_busca">
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'Busca')?></p></div>
		<div class='quad'></div>
	</div>

	<div class='imprensa_hold'>
		
		<div class='right_'>

			<div class='search'>
				<div>
					<form id="buscar" action='<?= $this->Html->url(array('controller' => 'busca'));?>/' onSubmit="return false">
						<div>
							<input type='text' id='input_busca' placeholder='PESQUISAR' value="<?= $busca; ?>">
						</div>
						<div class='bt_ok'>
							<button id='btn_busca'>OK</button>
						</div>
					</form>
				</div>
			</div>

			<div class='artigo date result'>
				<div class='title'>
					<p>
					<?= __d('default', 'Buscando por');?>
					"<?= $busca; ?>"  <?= __( 'foram encontrados');?>  
					<?php // NÃO DAR UM ENTER AQUI. Pois 'registro' e 'registros' depende do IF e se der um enter, o S fica separado ?>
					<?php echo $this->Paginator->counter('{:count}'); ?> <?= __d('default', 'registro');?><?php if ($this->Paginator->counter('{:count}') > 1 ) echo 's' ?>
					</p>
				</div> 
			</div>
			<p></p>


			<?php
			foreach($registros as $registro):
				$tipo_conteudo = '';
				?>
				<div class='artigo date bTop result'>
					<a href="<?php 
								$url_link = '';
									
									if ( $registro['Busca']['tipo'] == 'abear'): 
										$tipo_conteudo = __d('default', 'A ABEAR');
										//echo 'conheca/abear/';
										$url_link = $this->Html->url(
																		array(
																			'controller' => 'abears', 
																			'action' => 'index',
																		)
																	);

										// OK
                                	elseif ( $registro['Busca']['tipo'] == 'eventos'): 
										$tipo_conteudo = __d('default', 'Eventos');
                                   		//echo 'agenda/evento/' . $registro['Busca']['url_'.$lang]; 
										$url_link = $this->Html->url(
																		array(
																			'controller' => 'eventos', 
																			'action' => 'mostrar_evento',
																			$registro['Busca']['url_'.$lang],
																		)
																	);

										// OK
                                    elseif ( $registro['Busca']['tipo'] == 'fundadores'):
										$tipo_conteudo = __d('default', 'Fundadores');
                                     	//echo 'conheca/associados';
										$url_link = $this->Html->url(
																		array(
																			'controller' => 'abears', 
																			'action' => 'fundadores',
																		)
																	);

										// OK
									/*
                                    elseif ( $registro['Busca']['tipo'] == 'historias'):
                                    	echo 'experiencia-de-voar/historia-da-aviacao/';
										$url_link = $this->Html->url(
																		array(
																			'controller' => 'abears', 
																			'action' => 'fundadores',
																		)
																	);

										// OK
									elseif ( $registro['Busca']['tipo'] == 'blogposts'): 
                                    	echo 'blog/' . $registro['Busca']['url_'.$lang];
										// OK
                                   	elseif ( $registro['Busca']['tipo'] == 'campanhas'): 
                                     	echo'noticias/campanha/' . $registro['Busca']['url_'.$lang]; 
										// OK
									elseif ( $registro['Busca']['tipo'] == 'comites'): 
										echo'conheca/comites'; 
										//OK									
									elseif ( $registro['Busca']['tipo'] == 'conselheiros'): 
										echo'conheca/conselho';
									*/
										//OK
									elseif ( $registro['Busca']['tipo'] == 'dadosefatos'): 
										$tipo_conteudo = __d('default', 'DADOS E FATOS');
										//echo'dados-e-fatos/' . $registro['Busca']['url_'.$lang]; 
										$url_link = $this->Html->url(
																		array(
																			'controller' => 'dadosfatos', 
																			'action' => 'index',
																			$registro['Busca']['url_'.$lang]
																		)
																	);
										//OK
									/*
									elseif ( $registro['Busca']['tipo'] == 'dicas'): 
										echo'experiencia-de-voar/dicas/' . $registro['Busca']['url_'.$lang]; 
										//OK
									elseif ( $registro['Busca']['tipo'] == 'diretores'): 
										echo'conheca/diretoria';
										//OK
									*/
									elseif ( $registro['Busca']['tipo'] == 'noticias'): 
										$tipo_conteudo = __d('default', 'NEWS');
										$url_link = $this->webroot . 'imprensa/' . $registro['Busca']['url_'.$lang];

										// OK
									/*
									elseif ( $registro['Busca']['tipo'] == 'perguntasfrequentes'): 
										echo'experiencia-de-voar/faq';
										// OK
									elseif ( $registro['Busca']['tipo'] == 'releases'): 
										echo'releases/' . $registro['Busca']['url_'.$lang];
										// OK
									elseif ( $registro['Busca']['tipo'] == 'statusvoos'): 
										echo'dados-e-fatos/status-de-voos';
										// OK										
									*/
									endif; 

								echo $url_link;
									?>">
						<div class='title'><p><?= ucwords($tipo_conteudo) .' - '. $registro['Busca']['titulo_'.$lang] ?> </p></div>
						<div class='text'>
							<p><?=$registro['Busca']['chamada_'.$lang]?></p>
						</div>
					</a>
				</div>
				<?php
			endforeach;
			?>


			<?php
			//echo $this->Paginator->counter('{:pages}');
			if ($this->Paginator->counter('{:pages}') > 1) {
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