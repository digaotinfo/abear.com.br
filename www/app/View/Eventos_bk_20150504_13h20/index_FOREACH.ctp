<?php
//print_r($eventos_destaque);
//print_r($eventos);	
//print_r($configuracao);
//print_r($mesessssss);
?>
<div class='row progEvento'>
    <div class='titulo_grande'>
        <div class='title'>
            <a href="<?=$this->Html->url(
                                            array(
                                                'action' => 'index',
                                            )
                                        )?>">
                <p><?=__d('default', 'Eventos')?></p>
            </a>
        </div>
        <div class='quad'></div>
    </div>
    <div class='no-bb'>
        <?=$this->element('intros')?>
    </div>
    <div class='eventos'>
    
    	<?php 
        if(!empty($eventos_destaque)){ 
            ?>
            <div class="row">
                <div class="medium-2 columns left">&nbsp</div>
                <div class="large-10 medium-10 columns evento_amarelo">
                    <?php foreach($eventos_destaque as $destaque):?>
                        <div class="event">
                            <div class='date'>
                                <p><?=$this->Time->format('d.m.Y', $destaque[$model]['data']);?></p>

                            <div>                                
                            </div></div>
                            <?php if(!empty($destaque[$model]['imagem_destacada_'.$lang.'_file'])):?>
                                <div class="area-imagem">
                                    <a href="<?=$this->Html->url(
                                                                    array(
                                                                        'controller' => 'eventos', 
                                                                        'action' => 'mostrar_evento', 
                                                                        $destaque[$model]['url_amigavel_'.$lang]
                                                                    )) ?>">
                                        <div class="imagem" style="background-image: url(<?=$this->webroot.$destaque[$model]['imagem_destacada_'.$lang.'_file']?>)"></div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class='info'>
                                <a href="<?=$this->Html->url(
                                                                    array(
                                                                        'controller' => 'eventos', 
                                                                        'action' => 'mostrar_evento', 
                                                                        $destaque[$model]['url_amigavel_'.$lang]
                                                                    )) ?>">
                                    <p class='title'><?=$destaque[$model]['titulo_'.$lang]?></p>
                                </a>
                                <a href="<?=$this->Html->url(
                                                                    array(
                                                                        'controller' => 'eventos', 
                                                                        'action' => 'mostrar_evento', 
                                                                        $destaque[$model]['url_amigavel_'.$lang]
                                                                    )) ?>">
                                    <p class='text'><?=$destaque[$model]['chamada_'.$lang]?></p>
                                </a>

                            <div class='saiba_mais'>
                                    <a href="<?=$this->Html->url(
                                                                    array(
                                                                        'controller' => 'eventos', 
                                                                        'action' => 'mostrar_evento', 
                                                                        $destaque[$model]['url_amigavel_'.$lang]
                                                                    )) ?>">
                                                                    
                                        <?php
                                                $now =  date('Y-m-d h:i:s');
                                                if($destaque[$model]['data'] < $now){
                                            ?>                                                                    
                                                    <div>
                                                        <p><?=__d('default', 'Saiba como foi o evento')?></p>
                                                    </div>
                                                    <div class='arrow'></div>
                                        <?php
                                                }
                                            ?>
                                    </a>
                            </div>
                            </div>
                        </div>
                <?php endforeach;?>
                </div>
            </div>
           
            <?php 
        } 
        ?>
        
        
        <div class='sub-title'><p><?=__d('default', 'eventos do setor')?></p></div>
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
                        <div class="row">
                             <?php
                                $registro_dia = 0;
                                foreach ($evento as $e) {
                                    $registro_dia++;

                                    $img = '';
                                    $countImg = count($e['imagem_destacada_'.$lang.'_file']);

                                    if($countImg == 1){
                                        $fechaAbreRow = "</div><div class='row'>";
                                        $img = 'img';
                                    }
                                    if($countImg == 0){
                                        $fechaAbreRow = "";
                                    }
                                    if( $e['imagem_destacada_'.$lang.'_file'] != '' ):
                                        ?>
                                        <div class='medium-6 small-12 columns event <?=$img?>'>
                                            <div class='date'>
                                                <p><?= $this->Time->format('d.m.Y', $e['data']);?></p>
                                                <div></div> 
                                            </div>
                                            
                                            <div class='info'>
                                                <?php if(!empty($e['imagem_destacada_'.$lang.'_file'])):?>
                                                    <div class="area-imagem">
                                                        <a href="<?=$this->Html->url(
                                                                        array(
                                                                            'controller' => 'eventos', 
                                                                            'action' => 'mostrar_evento', 
                                                                            $e['url_amigavel_'.$lang]
                                                                        )) ?>">
                                                            <div class="imagem" style="background-image: url(<?=$this->webroot.$e['imagem_destacada_'.$lang.'_file']?>)"></div>
                                                        </a>
                                                    </div>
                                                <?php endif;?>
                                                <div class='title'>
                                                    <a href='<?=$this->Html->url(
                                                                                array(
                                                                                    'controller' => 'eventos', 
                                                                                    'action' => 'mostrar_evento', 
                                                                                    $e['url_amigavel_'.$lang]
                                                                                )) ?>'>
                                                        <p><?= $e['chamada_'.$lang];?></p>
                                                    </a>
                                                </div>
                                                <div class='text'>
                                                    <a href='<?=$this->Html->url(
                                                                                array(
                                                                                    'controller' => 'eventos', 
                                                                                    'action' => 'mostrar_evento', 
                                                                                    $e['url_amigavel_'.$lang]
                                                                                )) ?>'>
                                                        <p><?= $e['descricao_'.$lang];?></p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            echo $fechaAbreRow;
                                   
                                    else:
                                        ?>
                                        <div class='medium-6 small-12 columns event'>
                                            <div class='date'>
                                                <p><?= $this->Time->format('d.m.Y', $e['data']);?></p>
                                                <div></div> 
                                            </div>
                                            
                                            <div class='info'>
                                                <div class='title'>
                                                    <a href='<?=$this->Html->url(
                                                                                array(
                                                                                    'controller' => 'eventos', 
                                                                                    'action' => 'mostrar_evento', 
                                                                                    $e['url_amigavel_'.$lang]
                                                                                )) ?>'>
                                                        <p><?= $e['chamada_'.$lang];?></p>
                                                    </a>
                                                </div>
                                                <div class='text'>
                                                    <a href='<?=$this->Html->url(
                                                                                array(
                                                                                    'controller' => 'eventos', 
                                                                                    'action' => 'mostrar_evento', 
                                                                                    $e['url_amigavel_'.$lang]
                                                                                )) ?>'>
                                                        <p><?= $e['descricao_'.$lang];?></p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endif;// <<< com img
                                }
                            ?> 
                        </div>
                    </div>
                </div>
                <?php
            }


















            if ($this->Paginator->counter('{:pages}') > 0) {
                ?>
                <div class='pagina_eventos'>
                    <div class='hold'>
        				<div>
        				<?php
                        if(!empty($this->params->paging['Evento']['nextPage'])){
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
                        if(!empty($this->params->paging['Evento']['prevPage'])){ 
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
                     </div></div>
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
