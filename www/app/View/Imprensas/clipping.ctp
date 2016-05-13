<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?php echo __d('default', 'Clipping'); ?></p></div>
		<div class='quad'></div>
	</div>

    <?=$this->element('intros')?>

	<div class='associados_hold'>
		<div class='left_'>
			<?php foreach($registros as $registro): ?>
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
			<?php endforeach; ?>


			<?php
				/// Páginação:
				$paginacao = $this->Paginator->params();
		
		        if ($this->Paginator->counter('{:pages}') > 0) {
		            ?>
		            <div class='pagina_eventos'>
		                <div class='hold'>
		                    <div>
		                        <?php
			                        if(!empty($this->params->paging[$model]['prevPage'])){
			                            echo $this->Paginator->prev(
			                                __d('default', 'Meses Anteriores'),
			                                array('class' => 'arrowL')
			                            );
			                        }else{
			                            echo $this->Paginator->prev(
			                                __d('default', 'Meses Anteriores'),
			                                array('class' => 'arrowL desactive')
			                            );
			                        }
			                        echo "<div><p> | </p></div>";
			                        if(!empty($this->params->paging[$model]['nextPage'])){
			                                echo $this->Paginator->next(
			                                __d('default', 'Próximos Meses'),
			                                array('class' => 'arrowR')
			                            );
			                        }else{
			                            echo $this->Paginator->next(
			                                __d('default', 'Próximos Meses'),
			                                array('class' => 'arrowR desactive')
			                            );
			                        }
		                        ?>
		                    </div>
						</div>
					</div>
		            <?php
		        }
			?>
		</div>
		<?=$this->element('right_bar_news_associadas')?>
	</div>
</div>
