<?php
	//print_r($tipos);
	// print_r($registros);
	//print_r($galerias);
	//print_r($albuns);
	//print_r($videos);
	//print_r($url_dadosefatos);

         ?>



    <?php
	$this->start('og:title');
        ?>
        <meta property="og:title" content="<?=__d('default', 'DADOS E FATOS')?>"/>
        <?php
    $this->end();

?>
<?php
$this->start('script');

?>


		<script type="text/javascript">
			// $(document).ready(function(){
			// 	$( "a#facebook" ).click(function() {
			// 	 	var chamadaId = $(this).parent().attr('id');
			// 	 	var chamada = $('.social_share.right#'+chamadaId+' .chamada').val();
			// 	 	console.log(chamada);
			// 	 	$('#description').attr('content', chamada);

			// 	});
			// });
		</script>


	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox' ).fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
			});



			$('div.dado').each(function(index, value){
				var sessao 		= $(value).find('div.title p').html();

				$(this).find('div.arquivos div.download a').click(function(){
					var nome        = $(this).html().trim();
					var arquivoPath = $(this).attr('href');

					var arquivoPath_array   = arquivoPath.split('/');
					var arquivoNome         = arquivoPath_array[arquivoPath_array.length-1];

					// console.log('sessao: '+ sessao +' - nome: '+ nome +' - arquivoNome: '+ arquivoNome)

					contabilizarEvento('Dados e Fatos', sessao, 'DOWNLOAD: '+ nome +' ('+ arquivoNome +')');
				});

			});


		});
	</script>






<?php
$this->end();
?>








<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'DADOS E FATOS')?></p></div>
		<div class='quad'></div>
	</div>
	<div class='no-bb'>
		<?=$this->element('intros')?>
	</div>
	<div class='row dados_fatos'>
		<?php
		//////////////////////////////////////////////////////////////////////
		// SIDE BAR
		//////////////////////////////////////////////////////////////////////
		?>
		<div class='left_'>
			<div class='menu'>
				<?php
					$active_D = '';
					if($url_dadosefatos == 'dados-e-fatos'){
						$active_D = 'active';
					}
				?>
				<a href="<?=$this->webroot.'dados-e-fatos'?>" class='<?=$active_D?>'><?=__d('default', 'Mostrar todos')?></a>
				<?php

					foreach ($tipos as $cat) {
					  $c = $cat['Dadosefatotipo'];

					  $active = '';
					  if($url_dadosefatos == $c['url_amigavel_ptbr']){
						  $active = 'active';
					  }
					?>
					<a href="<?=$this->webroot.'dados-e-fatos/' .$c['url_amigavel_ptbr']?>" class='<?=$active?>'>
            <?=$c['nome_'.$lang]?>
          </a>
					<?php
				}?>
			</div>
			<div class='videos_'>
				<?php if(!empty($videos)){ ?>
					<p class='title'><?=__d('default', 'Vídeos')?></p>
					<?=$videos[0]['Video']["video_{$lang}"]?>
					<div class='todos'>
						<a href="<?=$this->Html->url(
													array(
														'controller' => 'videos',
														'action' => 'videos',
														$videos[0]['Video']["url_amigavel_".$lang]
													)
												)?>">
							<p><?=__d('default', 'Ver todos')?></p><div></div>
						</a>
					</div>
				<? } ?>
			</div>



			<?php
			///////////////////////////////////////////////////////////////////////////
			//// GALERIA
			///////////////////////////////////////////////////////////////////////////
			//print_r($albuns);
			if(!empty($albuns)){
				?>
				<div class='imagens_' >
					<p class='title'><?=__d('default', 'Galeria')?></p>


					<div class='galeria dots_new'>
						<div class='dados_fatos_orbit'>
							<div class='elementToOrbit'>
								<div class='img'>

									<?php
									$count = 0;
									foreach($albuns as $fotos){
										if($fotos['GaleriaImagenCapa']['id'] != 1 ):
											if($count % 6 == 0 && $count != 0){

												?>
													</div>
												</div>
												<div class='elementToOrbit'>
													<div class='img'>
														<a href='<?=$this->Html->url(
																					array(
																						'controller' => 'galeriaImagens',
																						'action' => 'galeria',
																						$fotos['GaleriaImagenCapa']['url_amigavel_'. $lang]
																					)
																				)?>'>
															<?= $this->Html->image('/'.$fotos['GaleriaImagenCapa']['img_th_hidden']) ?>
														</a>
												<?php

											}else if($count % 3 == 0 && $count != 0){

												?>
												</div>
												<div class='img'>
													<a href='<?=$this->Html->url(
																				array(
																					'controller' => 'galeriaImagens',
																					'action' => 'galeria',
																					$fotos['GaleriaImagenCapa']['url_amigavel_'. $lang]
																				)
																			)?>'>
														<?= $this->Html->image('/'.$fotos['GaleriaImagenCapa']['img_th_hidden']) ?>
													</a>
												<?php

											}else{

												?>
												<a href='<?=$this->Html->url(
																			array(
																				'controller' => 'galeriaImagens',
																				'action' => 'galeria',
																				$fotos['GaleriaImagenCapa']['url_amigavel_'. $lang]
																			)
																		)?>'>
													<?= $this->Html->image('/'.$fotos['GaleriaImagenCapa']['img_th_hidden']) ?>
												</a>
												<?php
											}
											$count++;
										endif;
									}
									?>

								</div>
							</div>
						</div>
					</div>
					<div class='todos'>
						<a href="<?=$this->Html->url(
													array(
														'controller' => 'galeriaImagens',
														'action' => 'todas'
													)
												)?>">
							<p><?=__d('default', 'Ver todos')?></p><div></div>
						</a>
					</div>
				</div>
				<?php
			}
			?>
		</div>

		<?php
		//////////////////////////////////////////////////////////////////////
		// END - SIDE BAR
		//////////////////////////////////////////////////////////////////////












		//////////////////////////////////////////////////////////////////////
		// CONTEUDO
		//////////////////////////////////////////////////////////////////////
		?>

		<div class='right_'>
			<?php
			if(!empty($registros)):
				$count = 1;
				foreach($registros as $registro){
					$no_border = '';
					if($registros[0][$model]['titulo_'.$lang]){
						$no_border = 'noBorderBot';
					}

					?>

					<?php


				$count++;
				}
			else:
			   // echo 'Não existe Dados.';
			endif;
			?>

			<div class='artigos_' id="listagem">
                <?php
                if(!empty($registros)):
                    ?>
    				<div class='social_share right' id="<?=$registro['Dadosefato']['id']?>">
    	                 <a href="<?= $this->webroot.'dados-e-fatos/' ?>" share-pj='facebook'><div></div></a>
    	                <a href="<?=urlencode('Dados e Fatos') ?>+via @abear_br+<?=Router::url('', true)?>" share-pj='twitter'><div></div></a>
    	                <a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
    	                <a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg="<?=Router::url('/uploads/img/logo/abear_200px.png', true)?>" share-pj-pindesc="<?=__d('default', 'DADOS E FATOS')?>"><div></div></a>
    	                <a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
    	            </div>
                    <?php
                endif;
                ?>

				<?php
				if(!empty($registros)):
					foreach ($registros as $registro):
						?>
						<div class='artigo img'>
							<div class='top'>
								<hr>
							</div>
							<div class="dado">
								<div class="title"><p><?=$registro['Dadosefato']['titulo_'.$lang]?></p></div>
								<div class="text"><?=$registro['Dadosefato']['chamada_'.$lang]?></div>

								<!-- >>> arquivos -->
								<?php if(!empty($registro['Dadosefatoarquivo'][0]["arquivo_".$lang."_file"]) && $registro['Dadosefatoarquivo'][0]['data_de_publicacao'] <= date('Y-m-d H:i') && $registro['Dadosefatoarquivo'][0]['ativo'] == 1):?>
									<div class="arquivos">
										<div class="row">
											<div class="large-12 medium-12 small-12 columns dados-e-fatos">

													<div class="small-12 small-only-text-center columns download">
														<p><?=__d('default', 'downloaddearquivos')?>:</p>
													</div>
													<div class="small-12 small-only-text-center columns download">
														<ul class="small-block-grid-1 medium-block-grid-3 dados-e-fatos">


															<?php
																$count = 0;

                                                                /////////////////////////////////////////////////////////////////////////////
                                                                ////+++====> ORDENANDO A ARRAY
                                                                ///. O order pela Model e pela Controller não funcionou.
                                                                /////////////////////////////////////////////////////////////////////////////
                                                                usort($registro['Dadosefatoarquivo'], function($a, $b) {
                                                                    return $a['ordem'] - $b['ordem'];
                                                                });
                                                                /////////////////////////////////////////////////////////////////////////////
                                                                /////////////////////////////////////////////////////////////////////////////
                                                                /////////////////////////////////////////////////////////////////////////////
																foreach ($registro['Dadosefatoarquivo'] as $arquivo) {

																	if($count == 0){
																		if($arquivo["arquivo_".$lang."_file"] != ' ' && $arquivo["arquivo_".$lang."_file"] != '' && $arquivo['data_de_publicacao'] <= date('Y-m-d H:i') && $arquivo['ativo'] == 1):
																			?>
																				<li>
																					<a href="<?=$this->webroot.$arquivo["arquivo_{$lang}_file"];?>" target="_blank" class="button expand" >
                                                                                        <?php
                                                                                        if (!empty($arquivo["nome_curto_do_arquivo_{$lang}"])) {
                                                                                            echo $arquivo["nome_curto_do_arquivo_{$lang}"];
                                                                                        } else {
                                                                                            echo "DOWNLOAD";
                                                                                        }
                                                                                        ?>
																					</a>
																				</li>
																			<?php
																		endif;
																	}else{

																	   if($arquivo["arquivo_".$lang."_file"] != ' ' && $arquivo["arquivo_".$lang."_file"] != '' && $arquivo['data_de_publicacao'] <= date('Y-m-d H:i') && $arquivo['ativo'] == 1):
																		   ?>
																		   	<li>
																				<a href="<?=$this->webroot. $arquivo["arquivo_".$lang."_file"];?>" target="_blank" class="button expand" >
																					<?php
                                                                                    if (!empty($arquivo["nome_curto_do_arquivo_{$lang}"])) {
                                                                                        echo $arquivo["nome_curto_do_arquivo_{$lang}"];
                                                                                    } else {
                                                                                        echo "DOWNLOAD";
                                                                                    }
                                                                                    ?>
																				</a>
																			</li>
																			<?php
																		endif;
																	}


																	$count++;
																}

															?>



														</ul>
													</div>
												<!-- </div> -->
											</div>
										</div>
									</div>
								<?php endif ;?>
								<!-- <<< arquivos -->
							</div>

							<?php
								for($i=1; $i<=3; $i++){
									if(!empty($registro['Dadosefato']['imagem_'.$i.'_'.$lang.'_file'])){
										?>
										<div class="dado_">
											<div class='row'>
												<a class="fancybox" rel="<?=$registro['Dadosefato']['id']?>" href="<?= $this->webroot . $registro['Dadosefato']['imagem_'.$i.'_'.$lang.'_file'];?>" title="<?= $registro['Dadosefato']["titulo_da_imagem_{$i}_{$lang}"];?>">
													<div class="imagem-dado imagem" style="background-image: url(<?= $this->webroot . $registro['Dadosefato']['imagem_'.$i.'_'.$lang.'_file'];?>)"></div>
												</a>
												<div class="large-8  medium-8 small-12 columns">
													<div class='content columns dados-e-fatos conteudo'>
														<div class='title'><p><?= $registro['Dadosefato']["titulo_da_imagem_{$i}_{$lang}"];?></p></div>
														 <div class='text'><p><?= $registro['Dadosefato']["descricao_da_imagem_{$i}_{$lang}"];?></p></div>
												   </div>
												</div>
											</div>
										</div>
								<?php
									}else{// >>> caso tenha apenas texto
										if(!empty($registro['Dadosefato']["titulo_{$i}_{$lang}"])){
											?>
										<div class="dado_">
											<div class='row'>
												<div class="large-12  medium-12 small-12 columns">
													<div class='dados-e-fatos  margin-left-9'>
														<div class='title'><p><?= $registro['Dadosefato']["titulo_da_imagem_{$i}_{$lang}"];?></p></div>
														 <div class='text'><p><?= $registro['Dadosefato']["descricao_da_imagem_{$i}_{$lang}"];?></p></div>
												   </div>
												</div>
											</div>
										</div>
									<?php
										}
									}
								}
								?>

							<?php //print_r($registro) ?>



					   </div>
						<?php
					endforeach;
				else:

				endif;
				?>
			</div>
								</div>

		</div>
		<?php
		//////////////////////////////////////////////////////////////////////
		// END - CONTEUDO
		//////////////////////////////////////////////////////////////////////








		?>
</div>




<?php
	if ($this->Paginator->counter('{:pages}') > 1) {
	  ?>
		<div class='paginator bTop pTop20'>
			<div class='hold'>

			<?php
				echo $this->Paginator->prev(
										'',
										null,
										null,
										array('tag' => 'div', 'class' => 'prev',
													'url' => array(
																	"#" => "listagem",
																	)
											)
										);


				echo $this->Paginator->numbers(array(
													'modulus' => 5,
													'ellipsis' => '...',
													'separator' => '',
													'currentTag' => 'a',
													'tag' => 'div',
													'class' => 'bt',
													'url' => array(
																	"#" => "listagem",
																),
													));


				echo $this->Paginator->next(
										'',
										null,
										null,
										array('tag' => 'div','class' => 'next',
													'url' => array(
																	"#" => "listagem",
																)
											)
										);
			 ?>


			</div>
		</div>
	  <?php
	}
	?>

	</div>
</div>

<script type="text/javascript">
$( document ).ready(function() {
	$('.dados_fatos_orbit').slick({
		arrows:false,
		dots: true
	});
});
</script>
