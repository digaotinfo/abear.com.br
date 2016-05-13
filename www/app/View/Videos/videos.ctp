<?php
// print_r($video);
//print_r($videos);
// print_r('['.$categoria.']');
//print_r($neighbors);
//die();
$VideoCategoria = '';
?>
<div class='row news'>
			<div class='titulo_grande'>
				<div class='title'>
					<p>
						<?=__d('default', 'vídeos')?>  
						<?php 
						if(!empty($video)){
							echo $video['VideoCategoria']['nome_'.$lang];
						}
						?>
					</p>
				</div>
				<div class='quad'></div>
			</div>
			<div class='video_visualizar'>
				<?=$video[$model]["video_{$lang}"]?>
				<!-- <iframe width="612" height="380" class='vd' src="http://www.youtube.com/embed/97gvP3ai60w" frameborder="0" allowfullscreen style='display: inline-block;'></iframe> -->
				


				<div class='info'>
					<div  class='title'><p><?=$video[$model]["titulo_{$lang}"]?></p></div>
					<p class='text'><?=$video[$model]["chamada_{$lang}"]?></p>
	
					
					<div class='prev_next'>
						<?php
						if (!empty($neighbors['next'])){?>
							<div class='prev_'><a href="<?=$this->webroot.'videos/'.$categoria.'/'.$neighbors['next'][$model]['url_amigavel_'.$lang]?>"><?=__d('default', 'anterior')?><div></div></a></div>
	
							<?php
						}else{
							echo "<div class='prev_ deactive'><a href='#'>".__d('default', 'anterior')."<div></div></a></div>";
						}
						if (!empty($neighbors['prev'])){?>
							<div class='next_'><a href="<?=$this->webroot.'videos/'.$categoria.'/'.$neighbors['prev'][$model]['url_amigavel_'.$lang]?>"><?=__d('default', 'próximo')?><div></div></a></div>
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

							foreach($videos as $video){

								if($count < 4){ 
									$frame = split("/", $video[$model]['video_'.$lang]);
									$img_yt = split('"', $frame[4]);
									$imgYoutube = $img_yt[0];

									// >>> se for de embed de playlist
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
											<!-- <a href='<?=$this->Html->url(array('action' => 'videos', $video[$model]['url_amigavel_'.$lang]))?>'> -->
											<a href='<?=$this->webroot.'videos/'.$categoria.'/watch/'.$video[$model]['url_amigavel_'.$lang]?>/page:<?=$this->Paginator->current()?>'>

												<?=$this->Html->image('http://img.youtube.com/vi/' .$imgYoutube. '/0.jpg')?>

											</a>
											<div class='video_info'>
												<p><?=$video[$model]['titulo_'.$lang]?> [<?php print_r($video[$model]['video_categoria_id'])?>]</p>
											</div>
										</div>	
									<?php
						 		}else{
									$count = 0;
									?>
										</div>
										<div class='video_small'>
											<div class='video_'>
												<!-- <a href='<?=$this->Html->url(array('action' => 'videos', $video[$model]['url_amigavel_'.$lang]))?>'> -->
												<a href='<?=$this->webroot.'videos/'.$categoria.'/watch/'.$video[$model]['url_amigavel_'.$lang]?>/page:<?=$this->Paginator->current()?>'>

												<?=$this->Html->image('http://img.youtube.com/vi/' .$img_yt[0]. '/0.jpg')?>

												</a>
												<div class='video_info'>
													<p><?=$video[$model]['titulo_'.$lang]?></p>
												</div>
											</div>	
									<?php
						 		}
						 	$count++;
						 	}
						?>
				</div>	
			</div>			
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
				if((!empty($this->Paginator->params->paging['Video']['prevPage']))){
                	echo $this->Paginator->prev(
                                            '',
                                            null,
                                            null,
                                            array('class' => 'prev')
                                            );
                  }
                 
                	echo $this->Paginator->numbers(array(
                    									'separator' => '',
                                                        'currentTag' => 'a',
                    									'tag' => 'div',
                    									'class' => 'bt'
                                                                                        
                    									));
                           
                 if((!empty($this->Paginator->params->paging['Video']['nextPage']))){
                   echo $this->Paginator->next(
                                            '',
                                            null,
                                            null,
                                            array('class' => 'next')
                                            );
                  }
                 ?>
						
					</div>
				</div>
			</div>
		</div>

