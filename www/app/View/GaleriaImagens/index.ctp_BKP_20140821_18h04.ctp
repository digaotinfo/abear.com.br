<?php 
//print_r($fotos);
//print_r($eventos);
//print_r($capas);
// print_r($registros);
//print_r($this->Paginator->params());
// print_r($categoria);
// print_r($tipo_filtro);

?>
<!--
<div>
<?php foreach($registros as $registro){  /* print_r($foto); */ ?>
	<a href="#" modal-pj='.foto_modal' id='<?=$registros[0]['GaleriaImagenCapa']['id']?>' rel='<?=$registro[$model]['id']?>'>
		<?=$this->Html->image('/'.$registro[$model]['img_file'], array('rel' => $registro[$model]['id']));?>
	</a>
<?php } ?>
</div>
-->

<!-- <div>
<?php foreach($registros as $registro){  /* print_r($foto); */ ?>
	<a href="#" modal-pj='.foto_modal' id='<?=$registros[0]['GaleriaImagenCapa']['id']?>' rel='<?=$registro[$model]['id']?>'>
		<?//=$this->Html->image('/'.$registro[$model]['img_file'], array('rel' => $registro[$model]['id']));?>
		<p rel="<?=$registro[$model]['id']?>">teste</p>
	</a>
<?php } ?>
</div> -->

<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'galeria de fotos')?></p></div>
		<div class='quad'></div>
	</div>
	<div class='galeria_organizar'>
		<div class='organizar'>
			<div><p><?=__d('default', 'Organizar:')?></p></div>
			<div><a href="mais-recentes" class='active'><?=__d('default', 'mais recentes')?></a></div>
			<div class='separador'><p> | </p></div>
			<div><a href="por-album"><?=__d('default', 'por album')?></a></div>
		</div>
		<div class='seta a1'></div>
	</div>
	<div class='galeria_news'>
		<div class='row'>
			<?php 
			foreach($registros as $registro): 
				?>
				<div>

						<?php if($tipo_filtro == 'mais-recentes'){ ?>
						
						<a href="#" modal-pj='.foto_modal' id='<?=$registros[0]['GaleriaImagenCapa']['id']?>' rel='<?=$registro[$model]['id']?>'>
						<?php }else{ ?>
							<a href="<?php echo $this->webroot.'galerias/'.$myurl[1].'/album/'.$registro[$model]['url_amigavel_'.$lang];?>" >
						<?php } 
					
									echo $this->Html->image('/'.$registro[$model]['img_file'], array(
																									'rel' => $registro['GaleriaImagenCapa']['id'], 
																									'value' => $registro['GaleriaImagenCapa']['id'],
																									'data-reveal-id' => 'fotos_modal', 
																									'como-voar-img',
																									));
									?>
							</a>
							
							
							<div class='title'><p><?=$registro[$model]['titulo_'.$lang]?></p></div>
							
							<?php if($tipo_filtro == 'mais-recentes'){ ?>
								<div class='info'><p>Capa: <?=$registro['GaleriaImagenCapa']['titulo_'.$lang]?></p></div>
							<?php }else{ ?>
								<div class='info'><p><?=$this->Time->format('d.m.Y', $registro['GaleriaImagenCapa']['data']);?></p></div>
							<?php } ?>

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




