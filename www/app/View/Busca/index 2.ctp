<?php
$this->start('script');
		//echo $this->Html->script('abear');
$this->end();

$this->start('css');
		echo $this->Html->css('busca');
$this->end();
?>



<div class='row'>
	<div class='titulo_grande'>
		<div class='title'><p><?=__d('default', 'Busca')?></p></div>
		<div class='quad'></div>
	</div>

	<div class='imprensa_hold'>
		
		<div class='right_'>

			<div class='artigo date'>
				<div class='top'>
					<?= __d('default', 'Buscando por');?>
					"<?= $busca; ?>"  <?= __( 'foram_encontrados');?>  
					<?php // NÃO DAR UM ENTER AQUI. Pois 'registro' e 'registros' depende do IF e se der um enter, o S fica separado ?>
					<?php echo $this->Paginator->counter('{:count}'); ?> <?= __d('default', 'registro');?><?php if ($this->Paginator->counter('{:count}') > 1 ) echo 's' ?>
				</div>
			</div>



			<?php
			foreach($registros as $registro): 
				?>
				<div class='artigo date bTop'>
					<a href="<?php echo $this->webroot; 
									
									if ( $registro['Busca']['tipo'] == 'abear'): 
										echo 'conheca/abear';
										// OK
                                	elseif ( $registro['Busca']['tipo'] == 'eventos'): 
                                   		echo 'agenda/' . $registro['Busca']['url_'.$lang]; 
										// OK
                                    elseif ( $registro['Busca']['tipo'] == 'associados'):
                                     	echo 'conheca/associados';
										// OK
                                    elseif ( $registro['Busca']['tipo'] == 'historias'):
                                    	echo 'experiencia-de-voar/historia-da-aviacao/';  
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
										//OK
									elseif ( $registro['Busca']['tipo'] == 'dadosefatos'): 
										echo'dados-e-fatos/' . $registro['Busca']['url_'.$lang]; 
										//OK
									elseif ( $registro['Busca']['tipo'] == 'dicas'): 
										echo'experiencia-de-voar/dicas/' . $registro['Busca']['url_'.$lang]; 
										//OK
									elseif ( $registro['Busca']['tipo'] == 'diretores'): 
										echo'conheca/diretoria';
										//OK
									elseif ( $registro['Busca']['tipo'] == 'noticias'): 
										echo'noticias/' . $registro['Busca']['url_'.$lang];
										// OK
									elseif ( $registro['Busca']['tipo'] == 'perguntasfrequentes'): 
										echo'experiencia-de-voar/faq';
										// OK
									elseif ( $registro['Busca']['tipo'] == 'releases'): 
										echo'releases/' . $registro['Busca']['url_'.$lang];
										// OK
									elseif ( $registro['Busca']['tipo'] == 'statusvoos'): 
										echo'dados-e-fatos/status-de-voos';
										// OK										
									endif; ?>">

						<div class='top'><p>gsdfgsdfg</p><div></div></div>
						<div class='title'><a href=''><p><?= $registro['Busca']['titulo_'.$lang] ?> </p></a></div>
						<div class='text'>
							<p><?=$registro['Busca']['chamada_'.$lang]?></p>
						</div>
					</a>
				</div>
				<?php
			endforeach;
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
		</div>
		<!-- Galeria -->
		<?php //$tipo_galeria?>
			<?=$this->element('tipo-galeria')?>
		<!-- /Galeria  -->
	</div>
</div>












=========================++++++++++++++++++++++++==================++++++++++++++++
<script>
	$(document).ready(function(e) {
		$(".destaque_video iframe").attr('width', '280').attr('height', '200');
	});
</script>

<div class="content">
	<div class="box940">
		<div class="title"> <?= __d('default', 'Busca');?> </div>
		<div class="subtitle"> 
			<?= __d('default', 'Buscando por');?>
             "<?= $busca; ?>"  <?= __( 'foram_encontrados');?>  
              <?php // NÃO DAR UM ENTER AQUI. Pois 'registro' e 'registros' depende do IF e se der um enter, o S fica separado ?>
              <?php echo $this->Paginator->counter('{:count}'); ?> <?= __d('default', 'registro');?><?php if ($this->Paginator->counter('{:count}') > 1 ) echo 's' ?>
             
       </div>
        
       <?php // print_r($registros); ?>
        
        
       <?php
       foreach($registros as $registro): 
       		?>
		   	<div class="contentBusca">
                <div class="boxGray">
                    <div class="boxBuscaTitle">
                        <div class="buscaTitle">
                        	
                        	<a href="<?php echo $this->webroot; 
									
									if ( $registro['Busca']['tipo'] == 'abear'): 
										echo 'conheca/abear';
										// OK
                                	elseif ( $registro['Busca']['tipo'] == 'eventos'): 
                                   		echo 'agenda/' . $registro['Busca']['url_'.$lang]; 
										// OK
                                    elseif ( $registro['Busca']['tipo'] == 'associados'):
                                     	echo 'conheca/associados';
										// OK
                                    elseif ( $registro['Busca']['tipo'] == 'historias'):
                                    	echo 'experiencia-de-voar/historia-da-aviacao/';  
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
										//OK
									elseif ( $registro['Busca']['tipo'] == 'dadosefatos'): 
										echo'dados-e-fatos/' . $registro['Busca']['url_'.$lang]; 
										//OK
									elseif ( $registro['Busca']['tipo'] == 'dicas'): 
										echo'experiencia-de-voar/dicas/' . $registro['Busca']['url_'.$lang]; 
										//OK
									elseif ( $registro['Busca']['tipo'] == 'diretores'): 
										echo'conheca/diretoria';
										//OK
									elseif ( $registro['Busca']['tipo'] == 'noticias'): 
										echo'noticias/' . $registro['Busca']['url_'.$lang];
										// OK
									elseif ( $registro['Busca']['tipo'] == 'perguntasfrequentes'): 
										echo'experiencia-de-voar/faq';
										// OK
									elseif ( $registro['Busca']['tipo'] == 'releases'): 
										echo'releases/' . $registro['Busca']['url_'.$lang];
										// OK
									elseif ( $registro['Busca']['tipo'] == 'statusvoos'): 
										echo'dados-e-fatos/status-de-voos';
										// OK										
									endif; ?>">
                                     
                              	<?= $registro['Busca']['titulo_'.$lang] ?>       
                            </a>															
                        </div>
                    </div>
                    <div class="clear"></div>
                    <p>	<?=$registro['Busca']['chamada_'.$lang]?></p>
                </div>
            </div> 
       		<?php 
       	endforeach; 
       	?>
       
        <div class="clear"></div>
        <div class="paginacao">
            <div class="boxPaginacao">
                    <div class="paginacaoPaginas">                  
                        <?php //echo $this->Paginator->first('<<'); ?>
                        <?php echo $this->Paginator->prev( '<img src="'.$this->webroot.'images/3_1_dicas/20120912_Site_Abear_11.png">' , array('escape' => false) , null, array('class' => 'hide')); ?>                     
                                        
                        <?php echo $this->Paginator->numbers(array( 'separator' => '' , 'modulus' => 8 ,  'class' => 'numbers' )); ?>
                        
                        <?php echo $this->Paginator->next( '<img src="'.$this->webroot.'images/3_1_dicas/20120912_Site_Abear_13.png">' , array('escape' => false), null, array('class' => 'hide')); ?>
                        <?php //echo $this->Paginator->last('>>'); ?>
                    </div>
       
            </div>
        </div>     
            
	</div> 
</div>