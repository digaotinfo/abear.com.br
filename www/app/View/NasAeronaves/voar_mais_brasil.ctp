<?php 
//print_r($txt);
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
			<?=$this->Html->image('/'.$txt[$model]['logo_' .$lang. '_file'])?>
			<div class='text'><p><?=$txt[$model]['texto_'.$lang]?></p></div>
		</div>
		<?php }else{ } ?>
		
		<div class='right_'>
		
		<?php
		if(!empty($midias)){
		 	foreach($midias as $midia):  
		 ?>
				<div class='sound_'>
					<div class='data'><p><?php echo $this->Time->format('d/m/y', $midia['VoarMaisBrasilMidia']['data']);?></p><div></div></div>
					<!-- <iframe width="100%" height="120" scrolling="no" frameborder="no" src="<?=$midia['VoarMaisBrasilMidia']['link_'.$lang];?>"></iframe> -->
					<?=$midia['VoarMaisBrasilMidia']['link_'.$lang];?>
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
			
			<?php }else{ } ?>
		</div>
	</div>
</div>
