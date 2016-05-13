<?php
// print_r($eventos);

?>
<script type="text/javascript">
	$( document ).ready(function() {
		$('.titulo_grande .title p').html($('#titulo-ano').val());
	});
</script>
<div class='row progEvento agenda'>
    <div class='titulo_grande'>
        <div class='title'>
            <a href="<?=$this->Html->url(
                                            array(
                                                'action' => 'agenda',
                                            )
                                        )?>">
                <p><?=__d('default', 'Agenda ')?> </p>
            </a>
        </div>
        <div class='quad'></div>
    </div>
    <div class='no-bb'>
        <?=$this->element('intros')?>
    </div>

    <?php
	    if ($this->Paginator->counter('{:pages}') > 0) {
	         ?>
            <div class='pagina_agenda'>
                <div class='hold'>
    				<div>
        				<?php
	                        if(!empty($this->params->paging[$model]['nextPage'])){
	                           echo $this->Paginator->next(
	                                                    __d('default', 'Meses Anteriores'),
	                                                     array('class' => 'arrowL', 'action' => 'index')
	                                                     // array('action' => 'index'),
	                                                    );
	                        }else{
	                            echo $this->Paginator->next(
	                                                    __d('default', 'Meses Anteriores'),
	                                                    array('class' => 'arrowL desactive', 'action' => 'index')
	                                                    );
	                        }

	                        echo "<div><p> | </p></div>";
	                        if(!empty($this->params->paging[$model]['prevPage'])){ 
	                            echo $this->Paginator->prev(
	                                                    __d('default', 'Próximos Meses'),
	                                                    array('class' => 'arrowR', 'action' => 'index')
	                                                    );
	                        }else{
	                            echo $this->Paginator->prev(
	                                                    __d('default', 'Próximos Meses'),
	                                                    array('class' => 'arrowR desactive', 'action' => 'index')
	                                                    );
	                        }
                         ?>
                 	</div>
                </div>
            </div>
	        <?php
	    }
        ?>

    <div class='eventos'>
        
        <?php
        if(!empty($eventos)){
            $this_month = $this->Time->format('F', date('m'));
            $this_month = $meses[$this_month];

	        $this_year = date('Y');
            if(count(@$eventos[$this_year]) == 0 ){
                $this_year = intval($this_year) - 1;
            }if(count(@$eventos[$this_year+1]) > 0){
            	$this_year = $this_year + 1;
            }
	       
            foreach ($eventos[$this_year] as $mes => $evento) {
                $i = 1;
                ?>
                <div class='evento_main'>
                    <div class='left_'>
                        <div class='mes'><p><?= $mes;?></p></div>
                    </div>
                    <div class='right_'>
                        <div class="row" >
                           	<?php 
                        		foreach ($evento as $day => $e) {
                        			$fechaAbreColumns = '';
                        			if(count($evento)%1 ==0){
                        				$fechaAbreColumns = "</div><div class='medium-12 small-12 columns event-agenda'>";
                        			}
                        			?>
	                        		<div class='medium-12 small-12 columns'>
	                        			<div class="row">
	                        				<div class='medium-12 small-12 columns event-agenda'>
			                        			<div class='date'>
			                                	<?php 
			                                		$this_time = $this->Time->format('l d F', $e[0]['data']);
													$this_time = explode(" ", $this_time);
													$this_time = "{$day} | {$dia_semana[$this_time[0]]}";
			                            			?>
			                                		
			                                		<p><?= $this_time;?></p>
			                                    	<div></div> 
			                                	</div>
			                                </div>
		                                </div>
		                                	 
											<div class="row" data-equalizer>
												<?php 
			                                	$countE = count($e);
			                                	$qtdColumns = '4';
			                                	if($countE == 1){
			                                		$qtdColumns  = '12';
			                                	}
			                                	for($i=0; $i<$countE; $i++){

			                                		$fechaAbreRow = '';
			                                		$traco = '';
			                                		if($i == 2){
			                                			$fechaAbreRow = "</div><div class='row' data-equalizer>";
			                                		}if($countE > 3 && $i < 3){
			                                			$traco = '<hr>';
			                                		}



			                                		$primeiroAno = $this->Time->format('Y', $evento[$day][0]['data']);
													$ultimoAno = '';
													$ano = '';
													if($e == end($evento)){
														$ultimoAno = $this->Time->format('Y', $e[0]['data']);
													}
													if($primeiroAno == $ultimoAno){
														$ano = $primeiroAno;
													}else{
														$ano = $primeiroAno;
													}
													echo $this->Form->input('titulo-ano', array(
																							'type' 	=> 'hidden',
																							'value'	=> __d('default', 'Agenda ').$ano
																						));



			                                    	?>
													<div class="medium-<?=$qtdColumns?> columns agenda vertical-align" data-equalizer-watch>
														<div class="info">
														<?=$traco?>
															<div class='title'>
				                                                <p><?= $e[$i]['titulo_'.$lang];?></p>
				                                            </div>
															<div class='text'>
				                                                <p><?= $e[$i]['descricao_'.$lang];?></p>
				                                            </div>
				                                        </div>
													</div>
												<?php
												echo $fechaAbreRow;
												}
											?>
											</div>
		                            </div>
									<?php
								}
								?>
                        </div>
                      
                    </div>
                </div>
                <?php
            }
        }else{
            echo __d('default', 'Em breve mais informações.');
        }
        ?>
    </div>
</div>
