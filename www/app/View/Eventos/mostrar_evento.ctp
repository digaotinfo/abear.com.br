<?php
//echo $evento[$model]
	// print_r($imagens);
    $this->start('og:title');
        ?>
        <meta property="og:title" content="<?=$evento[$model]['titulo_'.$lang]?>"/>
        <?php
    $this->end();

    $this->start('og:description');
        $texto = str_replace('"', '', $evento[$model]['chamada_'.$lang]);
        ?>
        <meta property="og:description" content="<?=strip_tags($texto)?>"/>
        <?php
    $this->end();




    $this->start('og:image');
        if (!empty($imagens['GaleriaImagenCapa']['img_file'])) {

            $src = Router::url('/'.$imagens['GaleriaImagenCapa']['img_file'], true);
            ?>
            <meta property="og:image" content="<?=$src?>" />
            <?php
        }
    $this->end();
?>


<div class='row progEvento interna'>
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

    <div class='eventos'>
        <div class='sub-title'>
            <p>
                <?php
                if ($evento[$model]['destaque_eventos'] == 1) {
                    ?>
                    <?=__d('default', 'evento')?> Abear
                    <?php
                } else {
                    ?>
                    <?=__d('default', 'eventos do setor')?>
                    <?php
                }
                ?>


            </p>
        </div>
    	<div class='evento_main interna'>
            <div class='left_'>
    		<?php
                $month = CakeTime::format('F', $evento[$model]['data']);
                $mes = $meses[$month];


                if(!empty($evento[$model]['imagem_destacada_'.$lang.'_file'])):
                    ?>
                    <div class="area-imagem">
                        <div class="imagem" style="background-image: url(<?=$this->webroot.$evento[$model]['imagem_destacada_'.$lang.'_file']?>)"></div>
                    </div>
                    <?php
                else:
                    ?>
                    <div class='mes'><p><?=$mes?></p></div>
                    <?php
                endif;
                ?>
            </div>

            <div class='right_'>
                <div class='event'>
                    <?php
                    if (empty($evento[$model]['mostrar_segunda_data']) || $evento[$model]['mostrar_segunda_data'] != 1){
                        ?>
                        <div class='date'><p><?= $this->Time->format('d.m.Y', $evento[$model]['data']);?></p><div></div></div>
                        <?php
                    }
                    ?>

                    <div class='info'>
                        <div class='title'><p><?=$evento[$model]['chamada_'.$lang]?></p></div>
                            <p class="hora-agenda">

                        <?php
                            ////// DATAS=>>>
                            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                            ///*** data 1
                            $dataDia = $this->Time->format('d', $evento[$model]['data']);
                            $dataMes = $this->Time->format('m', $evento[$model]['data']);
                            $dataAno = $this->Time->format('Y', $evento[$model]['data']);

                            ///*** data 2
                            $mostrarSegundaData = $evento[$model]['mostrar_segunda_data'];

                            $segundaDataDia = $this->Time->format('d', $evento[$model]['segunda_data']);
                            $segundaDataMes = $this->Time->format('m', $evento[$model]['segunda_data']);
                            $segundaDataAno = $this->Time->format('Y', $evento[$model]['segunda_data']);

                            ////// HORÁRIOS=>>>
                            ///*** horário 1
                            $mostrarHoraInicio = $evento[$model]['mostrar_horario_de_inicio'];
                            $dataHoraInicio = $evento[$model]['horario_de_inicio'];

                            $mostrarHoraTermino = $evento[$model]['mostrar_horario_de_termino'];
                            $dataHoraTermino = $evento[$model]['horario_de_termino'];

                            ///*** horário 2
                            $mostrarSegundoHoraInicio = $evento[$model]['mostrar_horario_de_inicio_da_segunda_data'];
                            $segundaDataHoraInicio  = $evento[$model]['horario_de_inicio_da_segunda_data'];

                            $mostrarSegundoHoraTermino = $evento[$model]['mostrar_horario_de_termino_da_segunda_data'];
                            $segundaDataHoraTermino = $evento[$model]['horario_de_termino_da_segunda_data'];
                            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>




                            ////PIPO
                            // echo "<hr>";
                            if (!empty($mostrarSegundaData) && $mostrarSegundaData == 1):
                                if (
                                    ($dataHoraInicio == $segundaDataHoraInicio) 
                                    && 
                                    ($dataHoraTermino == $segundaDataHoraTermino)):
                                    // echo "Modelo 2";
                                    ///=> verificar se precisa mostrar mês ou não
                                    echo __d('default', 'Dias ');
                                    if($dataMes == $segundaDataMes){
                                        echo $this->Time->format('d', $evento[$model]['data']);
                                        echo __d('default', ' e ');
                                        echo $this->Time->format('d/m', $evento[$model]['segunda_data']);
                                    }else{
                                        echo $this->Time->format('d/m', $evento[$model]['data']);
                                        echo __d('default', ' e ');
                                        echo $this->Time->format('d/m', $evento[$model]['segunda_data']);
                                    }

                                    ///=> verificar se precisa mostrar as horas ou não

                                    if($mostrarHoraInicio == 1 || $mostrarSegundoHoraInicio == 1 ):
                                        if($mostrarHoraTermino == 1 || $mostrarSegundoHoraTermino == 1 ){
                                            echo __d('default', ' das ');
                                        }else{
                                            echo __d('default', ' às ');
                                        }
                                        echo $this->Time->format('H:i', $dataHoraInicio);
                                    endif;
                                    if($mostrarHoraTermino == 1 || $mostrarSegundoHoraTermino == 1 ):
                                        echo __d('default', ' às ');
                                        echo $this->Time->format('H:i', $dataHoraTermino);
                                    endif;

                                else:
                                    if (
                                        ($mostrarHoraInicio == 0 && $mostrarHoraTermino == 0)
                                        &&
                                        ($mostrarSegundoHoraInicio == 0 && $mostrarSegundoHoraTermino == 0)
                                        ):
                                        // echo "Modelo 2 sem horas<br>";
                                        ///=> verificar se precisa mostrar mês ou não
                                        echo __d('default', 'Dias ');
                                        if($dataMes == $segundaDataMes){
                                            echo $this->Time->format('d', $evento[$model]['data']);
                                            echo __d('default', ' e ');
                                            echo $this->Time->format('d/m', $evento[$model]['segunda_data']);
                                        }else{
                                            echo $this->Time->format('d/m', $evento[$model]['data']);
                                            echo __d('default', ' e ');
                                            echo $this->Time->format('d/m', $evento[$model]['segunda_data']);
                                        }
                                           

                                    elseif (
                                        ($mostrarHoraInicio == 1 || $mostrarHoraTermino == 1)
                                        &&
                                        ($mostrarSegundoHoraInicio == 0 && $mostrarSegundoHoraTermino == 0)
                                        ):
                                        // echo "Modelo 2 com horas do primeiro<br><br>";
                                        ///=> verificar se precisa mostrar mês ou não
                                        if($dataMes == $segundaDataMes){
                                            echo $this->Time->format('d', $evento[$model]['data']);
                                            echo __d('default', ' e ');
                                            echo $this->Time->format('d/m', $evento[$model]['segunda_data']);
                                        }else{
                                            echo $this->Time->format('d/m', $evento[$model]['data']);
                                            echo __d('default', ' e ');
                                            echo $this->Time->format('d/m', $evento[$model]['segunda_data']);
                                        }
                                        // >>> data de inicio PRIMEIRA DATA
                                        if($mostrarHoraInicio == 1):
                                            if($mostrarHoraTermino == 1){
                                                echo __d('default', ' das ');
                                            }else{
                                                echo __d('default', ' às ');
                                            }
                                            echo $this->Time->format('H:i', $dataHoraInicio);
                                        endif;
                                        // <<< data de inicio PRIMEIRA DATA
                                        if($mostrarHoraTermino == 1):
                                            if($mostrarHoraInicio == 1){
                                                echo __d('default', ' às ');
                                            }else{
                                                echo __d('default', ' até às ');
                                            }
                                            echo $this->Time->format('H:i', $dataHoraTermino);
                                        endif;

                                       

                                    else:
                                        // echo "Modelo 3";
                                        ///=> verificar se precisa mostrar as horas ou não

                                        echo $this->Time->format('d/m', $evento[$model]['data']);
                                        echo __d('default', ' das ');
                                        echo $this->Time->format('H:i', $evento[$model]['horario_de_inicio']);
                                        echo __d('default', ' às ');
                                        echo $this->Time->format('H:i', $evento[$model]['horario_de_termino']);

                                        if(
                                            $evento[$model]['mostrar_horario_de_inicio_da_segunda_data'] == 1
                                            || $evento[$model]['mostrar_horario_de_termino_da_segunda_data'] == 1
                                                ){
                                                echo '<br>';
                                                echo __d('default', ' e ');
                                                echo '<br>';
                                                echo $this->Time->format('d/m', $evento[$model]['segunda_data']);

                                                 // >>> data de inicio SEGUNDA DATA
                                                if($evento[$model]['mostrar_horario_de_inicio_da_segunda_data'] == 1){
                                                    if($evento[$model]['mostrar_horario_de_termino_da_segunda_data'] == 1){
                                                        echo __d('default', ' das ');
                                                    }else{
                                                        echo __d('default', ' às ');
                                                    }
                                                    echo $this->Time->format('H:i', $evento[$model]['horario_de_inicio_da_segunda_data']);
                                                }
                                                // <<< data de inicio SEGUNDA DATA
                                                // >>> data de termino SEGUNDA DATA
                                                if($evento[$model]['mostrar_horario_de_termino_da_segunda_data'] == 1){
                                                    if($evento[$model]['mostrar_horario_de_inicio_da_segunda_data'] == 0){
                                                        echo __d('default', ' até às ');
                                                    }else{
                                                        echo __d('default', ' às ');
                                                    }
                                                    echo $this->Time->format('H:i', $evento[$model]['horario_de_termino_da_segunda_data']);
                                                }
                                                // <<< data de termino SEGUNDA DATA
                                        }
                                    


                                        
                                    endif;

                                endif;
                            else:
                                // echo "Modelo 1";
                                ///=> verificar se precisa mostrar as horas ou não
                                if($mostrarHoraInicio == 1){
                                    echo __d('default', 'Horário de Início: ');
                                    echo $this->Time->format('H:i', $evento[$model]['horario_de_inicio']);
                                }
                                if($mostrarHoraInicio == 1 && $mostrarHoraTermino == 1){
                                    echo '<br>';
                                }
                                if($mostrarHoraTermino == 1){
                                    echo __d('default', 'Horário de Término: ');
                                    echo $this->Time->format('H:i', $evento[$model]['horario_de_termino']);
                                }
                            endif;
                            // die();
                            ///////////

                            ?>







                        </p>






                        <div class='text'><p><?=$evento[$model]['descricao_'.$lang]?></p></div>
                    </div>
                </div>

                <?php
                echo $this->element('galeria-fotos-eventos');
                ?>

                <?// >>> videos?>
                    <?php
                        if(!empty($evento['EventoVideo'])):
                            $countVideos = count($videosEvento);

                            if($countVideos == 1):
                                foreach($videosEvento as $video){
                                    ?>
                                        <div class="video_">
                                            <div class="row" data-equalizer="">
                                                <div class="medium-4 small-12 columns content-video video_info vertical-align" data-equalizer-watch="">
                                                    <div class='v-bottom'>
                                                        <p class="title"><?=$video['EventoVideo']['titulo_'.$lang]?></p>
                                                        <p class="text"><?=$video['EventoVideo']['tema_'.$lang]?></p>
                                                        <p class="desc"><?=$video['EventoVideo']['descritivo_'.$lang]?></p>
                                                        <?php
                                                            $noBorder = '';
                                                            if($video == end($videosPaginate)){
                                                                $noBorder = 'no-border';
                                                             }
                                                        ?>
                                                        <div class="traco <?=$noBorder?>"></div>
                                                    </div>

                                                </div>
                                                <div class="medium-8 small-12 columns" data-equalizer-watch="">

                                                    <div class="flex-video widescreen">
                                                        <?=$video['EventoVideo']['video_'.$lang]?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                }
                            else:

                                ?>
                                    <div class="medium-12 columns arquivos-videos ">
                                        <ul class="example-orbit video_" data-orbit data-options="
                                                                                                slide_number: false;
                                                                                                timer: false;
                                                                                                timer_paused_class:'';">
                                            <?php
                                            foreach($videosEvento as $video){
                                                ?>
                                                <li data-orbit-slide="<?=$video['EventoVideo']['titulo_'.$lang]?>" class="small-8 small-centered columns">
                                                    <div class="row" data-equalizer>
                                                        <div class="medium-4 columns content-video video_info vertical-align" data-equalizer-watch>
                                                            <div class='v-bottom'>
                                                                <p class="title"><?=$video['EventoVideo']['titulo_'.$lang]?></p>
                                                                <p class="desc"><?=$video['EventoVideo']['descritivo_'.$lang]?></p>
                                                                <?php
                                                                    $noBorder = '';
                                                                    if($video == end($videosPaginate)){
                                                                        $noBorder = 'no-border';
                                                                     }
                                                                ?>
                                                                <div class="traco <?=$noBorder?>"></div>
                                                            </div>
                                                        </div>
                                                        <div class="medium-8 columns" data-equalizer-watch>
                                                            <div class="flex-video widescreen">
                                                                <?=$video['EventoVideo']['video_'.$lang]?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                <?php

                            endif;
                        endif;
                        ?>
                <?// >>> arquivos  ?>
                    <?php if(!empty($arquivosEvento)): ?>
                        <div class="medium-12 columns arquivos">
                            <div class="topo-arquivos">

                                <div class="large-3 medium-4 small-6 columns titulo">
                                    <p>Download dos Arquivos</p>
                                </div>
                                    <hr>


                            </div>
                            <ul class="large-block-grid-4 medium-block-grid-3 small-block-grid-1">
                                <?php
                                    foreach($arquivosEvento as $arquivo):
                                        ?>
                                        <li>
                                            <a href="<?php echo Router::url('/'.$arquivo['EventoArquivo']['arquivo_'.$lang.'_file'], true)?>" class="button expand" target="_blank"><?php echo $arquivo['EventoArquivo']['nome_curto_do_arquivo_ptbr']?></a>
                                        </li>
                                <?php
                                    endforeach;
                                    ?>
                            </ul>

                        </div>
                    <?php endif; ?>
                <?// <<< arquivos?>

                &nbsp;
                <div class='social_share right'>
                    <a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
                    <a href="<?=urlencode($evento[$model]['titulo_'.$lang]) ?>+via @abear_br+<?=Router::url('', true)?>" share-pj='twitter'><div></div></a>
                    <a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
                    <?php
                    if(!empty($evento[$model]['imagem_destacada_'.$lang.'_file'])){
                        $img = Router::url('/'.$evento[$model]['imagem_destacada_'.$lang.'_file'], true);
                    }else{
                        $img = Router::url('/uploads/img/logo/abear_200px.png', true);
                    }
                    ?>
                    <a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg="<?=$img?>" share-pj-pindesc="<?=$evento[$model]['chamada_'.$lang]?>"><div></div></a>
                    <a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
                </div>
            </div>

        </div>
        <div class='pagina_eventos'>
            <div class='hold'>
				<div>
					<?php
					$next_ = '';
					$prev_ = '';
					if(!$neighbors['prev'][$model]['url_amigavel_'.$lang]) $prev_ = 'deactive';
					if(!$neighbors['next'][$model]['url_amigavel_'.$lang]) $next_ = 'deactive';
					?>
                    <a href="<?=$this->Html->url(
                                                array(
                                                    'action' => 'mostrar_evento',
                                                    $neighbors['next'][$model]['url_amigavel_'.$lang]
                                                )
                                            )?>" class='arrowL <?=$prev_?>'>
                        <div></div>
                        <p><?=__d('default', 'anterior')?></p>
                    </a>

					<div><p> | </p></div>

                    <a href="<?=$this->Html->url(
                                                array(
                                                    'action' => 'mostrar_evento',
                                                    $neighbors['prev'][$model]['url_amigavel_'.$lang]
                                                )
                                            )?>" class='arrowR <?=$prev_?>'>
                        <div></div>
                        <p><?=__d('default', 'próximo')?></p>
                    </a>

             	</div>
            </div>
        </div>
    </div>

</div>
