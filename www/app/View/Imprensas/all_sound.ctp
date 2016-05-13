<?php 
//print_r($txt);
//print_r($midias);

?>
<div class='row exp_de_voar'>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'NO RADIO')?></p></div>
		<div class='quad'></div>
	</div>
	<?=$this->element('intros')?>
	<div class='xp_hold'>
		<div class='left_' align='center'>
			<div id='mais_lidas'>
				<div class='title'><p><?=__d('default', 'NA MÍDIA')?></p></div>
				<?php 
				if(!empty($midias)){ 
					foreach($midias as $midia):
						?>
						<div class='noticia_'>
							<a href='<?php
										echo $this->Html->url(array(
											'controller' => 'imprensas', 
											'action' => 'mostrar_noticia',
											'categoria' => $midia['NoticiaCategoria']['url_amigavel_'.$lang],
											'url_amigavel' => $midia['Noticia']['url_amigavel_'.$lang]
										));
										?>'>
								<div class='seta mais-lidas'></div>
								<div class='conteudo'><p><i><?=$midia['Noticia']['titulo_'.$lang]?></i></p></div>
							</a>
						</div>
						<?php 
					endforeach;
				} 
				?>
				<div class='todos'><a href="<?=$this->webroot.'imprensa/na-midia'?>"><p><?=__d('default', 'Ver todos')?></p><div></div></a></div>
			</div>
		</div>
		
		<div class='right_'>
			
			<?php
			if(!empty($radios)){
			 	foreach($radios as $midia):  
			 		?>
					<div class='sound_'>
						<div class='data'><p><?php echo $this->Time->format('d/m/y', $midia[$model]['data']);?></p><div></div></div>
						<?=$midia[$model]['link_'.$lang];?>
						<div class='title'><p><?=$midia[$model]['titulo_'.$lang];?></p></div>
						<div class='info'><p><?=$midia[$model]['descricao_'.$lang];?></p></div>
					</div>
					<?  
				endforeach; 
				?>
				<div class='paginator bTop pTop20'>
					<div class='hold'>
						<?php 
						if(!empty($this->params->paging[$model]['prevPage'])){
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
			                       
			            if(!empty($this->params->paging[$model]['nextPage'])){
			               echo $this->Paginator->next(
			                                        ' ',
			                                        null,
			                                        null,
			                                        array('class' => 'next')
			                                        );
			            }
				         ?>
					</div>
				</div>
				
				<?php 
			}else{ 

			}
			?>
		</div>
	</div>
</div>
