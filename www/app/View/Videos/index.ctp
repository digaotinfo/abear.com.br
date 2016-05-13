<?php
//print_r($video);
//print_r($videos);
//print_r($neighbors);
//print_r($catVideos);
// print_r($neighbors);
// print_r($this->Paginator->options['url']['page']);
// print_r($this->Paginator->options['url']['direction']);
// die();
// echo "<hr>";

if(empty($categoria)){
	$categoria = 'todos';
}
?>
<div class='row news'>
			<div class='titulo_grande'>
				<div class='title'>
					<p>
						<?php
							echo  __d('default', 'vídeos');

							// se tem categoria ...
							if($categoria != 'todos'){
								echo ' '.$video['VideoCategoria']['nome_'.$lang];
							}

						?>
					</p>
				</div>
				<div class='quad'></div>
			</div>
			<div class='video_visualizar'>
			<?=$video[$model]["video_{$lang}"]?>
				<div class='info'>
					<div  class='title'>
						<p>
							<?php
								echo $video[$model]["titulo_{$lang}"];

							?>
						</p>
					</div>
					<p class='text'><?=$video[$model]["chamada_{$lang}"]?></p>


					<div class='prev_next'>
						<?php
						if (!empty($neighbors['next'])){?>
							<div class='prev_'>
								<a href="<?=$this->Html->url(array(
																'action' => 'index',
																'categoria' => $categoria,
																'url' => $neighbors['next'][$model]['url_amigavel_'.$lang],
																'page' => $this->Paginator->current()
																))
																?>">
									<?=__d('default', 'anterior')?>
									<div></div>
								</a>
							</div>
							<?php
						}else{
							echo "<div class='prev_ deactive'><a href='#'>".__d('default', 'anterior')."<div></div></a></div>";
						}
						if (!empty($neighbors['prev'])){?>
							<div class='next_'>
								<a href="<?=$this->Html->url(array(
																'action' => 'index',
																'categoria' => $categoria,
																'url' => $neighbors['prev'][$model]['url_amigavel_'.$lang],
																'page' => $this->Paginator->current()
																))
																?>">
									<?=__d('default', 'próximo')?>
									<div></div>
								</a>
							</div>
						<?php
						}else{
							echo "<div class='next_ deactive'><a href='#'>".__d('default', 'próximo')."<div></div></a></div>";
						} ?>
					</div>


				</div>
			</div>
		</div>

		<div class='news bgWhite w100 pTop20 mBot0 pBot10'>
			<div class='row'>
					<div class='video_small'>
				<?php
					$count = 0;

					foreach($videos as $videoThumb){
						// print_r($videoThumb['VideoCategoria']['VideoCategoria']);
							if($count < 4){
								$frame = split("/", $videoThumb['Video']['video_'.$lang]);
								$img_yt = split('"', $frame[4]);

								// >>> se for de embed de playlist
								$imgYoutube = $img_yt[0];
								$mystring = $imgYoutube;
								$findme   = '?';
								$pos = strpos($mystring, $findme);

								if($pos > 0):
									$arrayYoutube = explode('?', $img_yt[0]);
									$imgYoutube = $arrayYoutube[0];
								endif;
								// <<< se for de embed de playlist

									?>
										<div class='video_'>

											<a href='<?=$this->Html->url(array(
																			'action' => 'index',
																			'categoria' => $categoria,
																			'url' => $videoThumb[$model]['url_amigavel_'.$lang],
																			'page' => $this->Paginator->current(),
																			))
																			?>'>

												<?=$this->Html->image('http://img.youtube.com/vi/' .$imgYoutube. '/0.jpg')?>

											</a>
											<div class='video_info'>
												<p>
													<?php echo $this->Text->truncate(
											                                    $videoThumb[$model]['titulo_'.$lang],
											                                    28,
											                                    array(
											                                        'ellipsis' => '...',
											                                        'exact' => false
											                                    )
											                                );
											          ?>

												</p>
											</div>
										</div>
									<?php
					 		}else{
								$count = 0;
								$frame = split("/", $videoThumb['Video']['video_'.$lang]);
								$img_yt = split('"', $frame[4]);

								// >>> se for de embed de playlist
								$imgYoutube = $img_yt[0];
								$mystring = $imgYoutube;
								$findme   = '?';
								$pos = strpos($mystring, $findme);

								if($pos > 0):
									$arrayYoutube = explode('?', $img_yt[0]);
									$imgYoutube = $arrayYoutube[0];
								endif;
								// <<< se for de embed de playlist
								?>
									</div>
									<div class='video_small'>
										<div class='video_'>
											<a href='<?=$this->Html->url(array(
																			'action' => 'index',
																			'categoria' => $categoria,
																			'url' => $videoThumb[$model]['url_amigavel_'.$lang],
																			'page' => $this->Paginator->current(),
																			))
																			?>'>

												<?=$this->Html->image('http://img.youtube.com/vi/' .$imgYoutube. '/0.jpg')?>

											</a>
											<div class='video_info'>
												<p>
													<?php echo $this->Text->truncate(
										                                    $videoThumb[$model]['titulo_'.$lang],
										                                    28,
										                                    array(
										                                        'ellipsis' => '...',
										                                        'exact' => false
										                                    )
										                                );
										          ?>
												</p>
											</div>
										</div>
								<?php
					 		}
					 	$count++;
				 	}

				?>
				</div>
			</div>

				<?php if($this->Paginator->params->paging[$model]['pageCount'] > 1): ?>
					<div class='paginator row mBot0'>
						<div class='hold'>
						<?php
							$this->Paginator->options(array(
									'url' => array(
											'controller' => 'videos',
											'action' => $this->params['action'],
											'categoria' => $categoria,
										)
								));
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
				<?php endif?>
		</div>
