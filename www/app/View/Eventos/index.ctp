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
                <div class="small-12 columns evento_amarelo">
                    <?php
                    foreach($eventos_destaque as $destaque):
                        ?>
                        <div class="medium-6 columns">
                            <div class="event">
                                <div class='date'>
                                    <p>
                                        <?=$this->Time->format('d.m.Y', $destaque[$model]['data']);?>
                                        <?php
                                        if (!empty($destaque[$model]['mostrar_segunda_data']) && $destaque[$model]['mostrar_segunda_data'] == 1){
                                            ?>
                                            <?= __d('default', 'e');?>
                                            <?=$this->Time->format('d.m.Y', $destaque[$model]['segunda_data']);?>
                                            <?php
                                        }?>
                                    </p>
                                    <div <?php
                                            if (!empty($destaque[$model]['mostrar_segunda_data']) && $destaque[$model]['mostrar_segunda_data'] == 1){
                                                echo 'class="dupla-data"';
                                            }?>></div>
                                </div>
                                <?php
                                if(!empty($destaque[$model]['imagem_destacada_'.$lang.'_file'])):
                                    ?>
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
                                    <?php
                                endif;
                                ?>
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
                                            }else{
                                                ?>
                                                 <div>
                                                    <p><?=__d('default', 'Saiba sobre o evento')?></p>
                                                </div>
                                                <div class='arrow'></div>
                                                <?php

                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
        }
        ?>


        <div class='sub-title'><p><?=__d('default', 'eventos do setor')?></p></div>
        <div class="hide">
            <?php
                print_r($eventos);
            ?>
        </div>

        <?php
        if(!empty($eventos)){
            $this_month = $this->Time->format('F', date('m'));
            $this_month = $meses[$this_month];


            $this_year = date('Y');
            if(count(@$eventos[$this_year]) == 0 ){
                $this_year = intval($this_year) - 1;
            }
            if(count(@$eventos[$this_year]) == 0 ){
                $this_year = intval($this_year) - 1;
            }
        ?>
        <div class="hide ano">
            <?php
                print_r($this_year);
            ?>
        </div>

        <?php
            if(!empty($eventos[$this_year]))://>>>se tiver eventos nesse ano
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

                                    $img = 6;
                                    $countImg = count($e['imagem_destacada_'.$lang.'_file']);

                                    if($countImg == 1){
                                        $fechaAbreRow = "</div><div class='row'>";
                                        $img = 12;
                                    }
                                    if($countImg == 0){
                                        $fechaAbreRow = "";
                                        if($registro_dia%2 == 0){
                                                $fechaAbreRow = "</div><div class='row'>";
                                        }
                                    }
                                    ?>

                                    <div class='medium-<?=$img?> small-12 columns event'>
                                        <div class='date'>
                                            <p>

                                                <?php
                                                    echo $this->Time->format('d.m.Y', $e['data']).' ';
    //                                                print_r($e);
                                                    if (!empty($e['mostrar_segunda_data']) && $e['mostrar_segunda_data'] == 1){
                                                        echo  __d('default', 'e');
                                                        echo ' '.$this->Time->format('d.m.Y', $e['segunda_data']);

                                                    }

                                                ?>
                                            </p>
                                            <div></div>
                                        </div>

                                        <div class='info'>
                                            <?php
                                            if(!empty($e['imagem_destacada_'.$lang.'_file'])):
                                                $registro_dia = 0;
                                                $fechaAbreRow = "</div><div class='row'>";
                                                ?>
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
                                                <?php
                                            endif;
                                            ?>
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
                                                    <p><?//= $e['descricao_'.$lang];?></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    echo $fechaAbreRow;
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
            endif;
        }else{
            echo __d('default', 'Em breve mais informações.');
        }
        ?>
    </div>
</div>
