<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?php echo __d('default', 'Clipping'); ?></p></div>
		<div class='quad'></div>
	</div>

    <?=$this->element('intros')?>

	<div class='associados_hold'>
		<div class='left_'>
            <div class='artigo date'>
                <div class='top'><p><?=$this->Time->format('d/m/y', $registro[$model]['data']);?></p><div></div></div>
                <div class='title'><p><?=$registro[$model]['titulo_'.$lang]?></p></div>
                
                <div class='text'><p><?=$registro[$model]['texto_'.$lang]?></p></div>

                <div class='social_share'>
                    <a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
                    <a href="<?=urlencode($registro[$model]['titulo_'.$lang]) ?>+via @abear_br+<?=Router::url(''.$this->Html->url(
                                                    array(
                                                        'controller' => 'imprensas',
                                                        'action' => 'clipping',
                                                        'url_amigavel' => $registro[$model]['url_amigavel_'.$lang])), true)?>" share-pj='twitter'><div></div></a>
                    <a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
                    <a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg="<?=Router::url('/uploads/img/logo/abear_200px.png', true)?>" share-pj-pindesc="<?=$registro[$model]['titulo_'.$lang]?>"><div></div></a>
                    <a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
                </div>
                <br>
            </div>
            
            
            
            <div class='pagina_eventos'>
				<div class='hold'>
					<div>
						<?php
							$next_ = '';
							$prev_ = '';
							if(empty($neighbors['prev'][$model]['url_amigavel_'.$lang])){ $prev_ = 'desactive';}
							if(empty($neighbors['next'][$model]['url_amigavel_'.$lang])){ $next_ = 'desactive';}
						?>
	
						<a href="<?=$this->Html->url(
													array(
														'controller' => 'Imprensas',
														'action' => 'clipping',
														$neighbors['next'][$model]['url_amigavel_'.$lang]
													));?>" class='arrowL <?=$next_?>'>
							<div></div>
							<p><?=__d('default', 'anterior')?></p>
						</a>
	
						<div><p> | </p></div>
			
						<a href="<?=$this->Html->url(
													array(
														'controller' => 'Imprensas',
														'action' => 'clipping',
														$neighbors['prev'][$model]['url_amigavel_'.$lang]
													));?>" class='arrowR <?=$prev_?>'>
							<div></div>
							<p><?=__d('default', 'próximo')?></p>
						</a>
					</div>
				</div>
			</div>
            
            			
		</div>
		<?=$this->element('right_bar_ultimos_clippings')?>
	</div>
</div>
