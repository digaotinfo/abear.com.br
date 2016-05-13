<?php
	//print_r($conselheiros);
	//print_r($comites);
	//print_r($diretoria[0]['Diretor']['descricao_'.$lang]);
	//print_r($txt_diretoria);
	//print_r($diretor);
	//print_r($desc);
?>
<div class='row conheca'>
    <div class='titulo_grande'>
        <div class='title'><p><?=__d('default', 'Estrutura da Entidade')?></p></div>
        <div class='quad'></div>
    </div>
    <?=$this->element('intros')?>
    <div class='estrutura'>
        <div class='element loggo'>
            <div class='eLeft'>
                <div class='title'><p><?=$desc['DescricaoConselho']['titulo_'.$lang]?></p></div>
                <div class='text'><p><?=$desc['DescricaoConselho']['descricao_'.$lang]?></p></div>
            </div>
            <div class='eRight'>
                <div class='logos'>
                	<?php
                    $count = 0;
                    foreach($conselheiros as $fundadores){
                        if($count == 0){
                        ?>
                            <div align='center' class='active' id="c<?= $fundadores['Estrutura']['id']; ?>" style='background-image: url(<?='../'.$fundadores['Estrutura']['foto_file']?>);'></div>
                        <?php
                        }else{
                        ?>
                            <div align='center' id="c<?=$fundadores['Estrutura']['id'];?>" style='background-image: url(<?='../'.$fundadores['Estrutura']['foto_file']?>);'></div>
                        <?php }?>

                	<?php
                    $count++;
                } ?>
                </div>

                <div class='line active' id='bp0'></div>

                <?php
                $i = 1;
                foreach($conselheiros as $fundadores){          

                    $class = ($i == 1)?'active':'';
                    ?>
                    <div class='info conselheiro <?= $class;?>' id="c<?=$fundadores['Estrutura']['id'];?>">
                        <div id='info_left'>
                            <div class='info_title'><p><?=__d('default', 'titulares')?></p></div>
                            <div class='info_text'><p><?= $fundadores['Estrutura']['titulares_'.$lang];?></p></div>
                        </div>
                        <div id='info_right'>
                            <div class='info_title'><p><?=__d('default', 'suplentes')?></p></div>
                            <div class='info_text'><p><?= $fundadores['Estrutura']['suplentes_'.$lang];?></p></div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>


            </div>
        </div>

        <div class='element diret'>
            <div class='eLeft'>
                <div class='title'><p><?=$txt_diretoria['DescricaoDiretoria']['titulo_'.$lang]?></p></div>
                <div class='text'><p><?=$txt_diretoria['DescricaoDiretoria']['descricao_'.$lang]?></p></div>
            </div>
            <div class='eRight'>
                <div class='pessoa_hold'>
                    <div class='pessoas'>
		                <?php
		                    $count = 0;
		                    foreach($diretoria as $fotos):
		                        
		                        if ($count <= 2 || $count > 3) {
			                            if($count == 0){
				                            ?>
				                            <div class='pessoa active' >
				                            <?php
			                            }else{
			                            	?>
			                            	<div class='pessoa' >
				                            <?php       
			                            }
			                            ?>
			                            <?=$this->Html->image('/'.$fotos['Diretor']['foto_file'], array('rel' => $fotos['Diretor']['id']))?>
		                            </div>
		                            <?php
		                        } else if($count == 3) {
		                        	?>
		                        		</div>

			                            <div class='line active pessoa1'></div>
			
			                            <div class='info info_pessoas'>
			                                <p class='infoP_title'><?=$diretoria[0]['Diretor']['nome']?></p>
			                                <p class='infoP_cargo'><?=$diretoria[0]['Diretor']['cargo_'.$lang]?></p>
			                                <div class='infoP_text'><p><?=$diretoria[0]['Diretor']['descricao_'.$lang]?></p></div>
			                            </div>
			                        </div>
			
			                        <div class='pessoa_hold'>
			                            <div class='pessoas'>
			                                <div class='pessoa' >
			                                    <?=$this->Html->image('/'.$fotos['Diretor']['foto_file'], array('rel' => $fotos['Diretor']['id']))?>
			                                </div>
			                        <?php
				                }
		                        $count++;
		                    endforeach;
		                ?>
                    </div>
                    <div class='line'></div>

                    <div class='info info_pessoas' style='display:none;'>
                        <p class='infoP_title'><?=$diretor['Diretor']['nome']?></p>
                        <p class='infoP_cargo'><?=$diretor['Diretor']['chamada_'.$lang]?></p>
                        <div class='infoP_text'><?=$diretor['Diretor']['descricao_'.$lang]?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class='element'>
            <div class='eLeft'>
                <div class='title'><p><?=__d('default', 'Comitês')?></p></div>
                <div class='text'><p><?= $comites['Comite']["chamada_{$lang}"];?></p></div>
            </div>
            <div class='eRight'>
                <div class='info info_pessoas2 noBorderBot'>
                    <div class='infoP_text'><p><?= $comites['Comite']["texto_{$lang}"];?></p></div>
                </div>
            </div>
            <?=$this->element('tipo-galeria')?>
        </div>
    </div>
        </div>
        
    </div>
</div>
