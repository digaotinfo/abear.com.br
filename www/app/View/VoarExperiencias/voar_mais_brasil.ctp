<?php 
// print_r($txt);
//print_r($midias);
?>
<div class='row exp_de_voar'>
	<div class='titulo_grande'>
		<div class='title'><p><?=$txt[$model]['titulo_'.$lang]?></p></div>
		<div class='quad'></div>
	</div>
	<?=$this->element('intros')?>
	<div class='xp_hold'>
	
		<?php if(!empty($txt)){ ?>
		<div class='left_' align='center'>
			<?php if(!empty($txt[$model]['logo_' .$lang. '_file'])){ ?>
				<?=$this->Html->image('/'.$txt[$model]['logo_' .$lang. '_file'])?>
			<?php } ?>
			<div class='text'><p><?=$txt[$model]['texto_'.$lang]?></p></div>
		</div>
		<?php }else{ } ?>
		
		<div class='right_'>
		
		<?php
		if(!empty($midias)){
		 	foreach($midias as $midia):  
		 ?>
				<div class='sound_'>
					<div class='data'>
						<p>
							<?php echo $this->Time->format('d/m/y', $midia['VoarMaisBrasilMidia']['data']);?>
						</p>
						<div></div>
					</div>

					<div class='video-responsive'>
						<?=$midia['VoarMaisBrasilMidia']['link_'.$lang];?>
					</div>
					<div class='title'><p><?=$midia['VoarMaisBrasilMidia']['titulo_'.$lang];?></p></div>
					<div class='info'><p><?=$midia['VoarMaisBrasilMidia']['descricao_'.$lang];?></p></div>
				</div>
		<?  endforeach; ?>
			<div class='paginator bTop pTop20'>
				<div class='hold'>
		<?php 
			if(!empty($this->params->paging['VoarMaisBrasilMidia']['prevPage'])){
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
                       
            if(!empty($this->params->paging['VoarMaisBrasilMidia']['nextPage'])){
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
			
			<?php }?>
		</div>
	</div>
	<?php if(empty($midias)){echo __d('default', 'Em breve mais informações.');}?>
</div>
