<?php
// print_r($eventos);

?>
<div class='row progEvento agenda'>
    <div class='titulo_grande'>
        <div class='title'>
            <a href="<?=$this->Html->url(
                                            array(
                                                'action' => 'agenda',
                                            )
                                        )?>">
                <p><?=__d('default', 'Agenda 2014')?></p>
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
	                                                     array('class' => 'arrowL')
	                                                    );
	                        }else{
	                            echo $this->Paginator->next(
	                                                    __d('default', 'Meses Anteriores'),
	                                                    array('class' => 'arrowL desactive')
	                                                    );
	                        }

	                        echo "<div><p> | </p></div>";
	                        if(!empty($this->params->paging[$model]['prevPage'])){ 
	                            echo $this->Paginator->prev(
	                                                    __d('default', 'Próximos Meses'),
	                                                    array('class' => 'arrowR')
	                                                    );
	                        }else{
	                            echo $this->Paginator->prev(
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

    <div class='eventos'>
        
        <?php
        if(!empty($eventos)){
            $this_month = $this->Time->format('F', date('m'));
            $this_month = $meses[$this_month];
            

	        $this_year = date('Y');
            if(count(@$eventos[$this_year]) == 0 ){
                $this_year = intval($this_year) - 1;
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
                           	<div class="row" data-equalizer>
                           	<?php 
                        		foreach ($evento as $day => $e) {
                        			$fechaAbreColumns = '';
                        			if(count($evento)%1 ==0){
                        				$fechaAbreColumns = "</div><div class='medium-12 small-12 columns event-agenda'>";
                        			}
                        			?>
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
		                            <?php 
	                                	$countE = count($e);
	                                	for($i=0; $i<$countE; $i++){

	                                		$fechaAbreRow = '';
	                                		$traco = '';
	                                		if($i >= 2){
	                                			$fechaAbreRow = "</div><div class='medium-12 small-12 columns event-agenda'>";
	                                		}if($countE > 3 && $i < 3){
	                                			$traco = 'traco-registro-agenda';
	                                		}
	                                    	?>
											<div class="medium-4 columns agenda" data-equalizer-watch>
												<div class='info <?=$traco?>'>
		                                            <div class='title'>
		                                                <p><?= $e[$i]['titulo_'.$lang];?></p>
		                                            </div>
		                                            <div class='text'>
		                                                <p><?= $e[$i]['descricao_'.$lang];?></p>
		                                            </div>
		                                        </div>
											</div>
									
										<?php
	                                    }
								}
								?>
							</div>















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
