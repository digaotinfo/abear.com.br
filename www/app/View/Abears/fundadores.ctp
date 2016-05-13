<?php
	//print_r($fundadores);
?>
<div class='row conheca'>
    <div class='titulo_grande'>
        <div class='title'><p><?=__d('default', 'Fundadores')?></p></div>
        <div class='quad'></div>
    </div>
    <?=$this->element('intros')?>
    <div class='fundadores'>
        <?php 
        $count = 0;
        foreach($fundadores as $fund):

            $f = $fund['Fundador'];
            if(!empty($f["texto_{$lang}"]) || !empty($f['url_1']) || !empty($f['url_2'])){
                if($count == count($fundadores) - 1){
                    ?>
                    <div class='empresa noBorderBot'>
                    <?php
                }else{
                    ?>
                    <div class='empresa'>
                    <?php
                }
                ?>
               
                    <?=$this->Html->image('/'.$fund['Fundador']['logo_file'], array('class'=>'logo', 'id' => $fund['Fundador']['id']))?>
                    <div class='info'>
                        <div class='text'><p><?= $f["texto_{$lang}"];?></p></div>
                        <div class='links'><p>
                            <?php
                            if(!empty($f['url_1'])){
                                ?>
                                <a href="<?= $f['url_1'];?>" target="_blank"><?=__d('default', 'visitar o site')?></a>
                                <?php
                            }
                            if(!empty($f['url_1']) && !empty($f['url_2'])){
                                ?>
                                |  

                                <?php
                            }
                            if(!empty($f['url_2'])){
                                ?>
                                <a href="<?= $f['url_2'];?>" target="_blank">facebook</a></p>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            <?php
            }
            $count++;
        endforeach;
        ?>

        <div class='sub-title'><p><?=__d('default', 'Associados')?></p><div></div></div>

        <?php
        $count = 0;
        foreach($associados as $fund):
            $f = $fund['Fundador'];
            if(!empty($f["texto_{$lang}"]) || !empty($f['url_1']) || !empty($f['url_2'])){
                if($count == count($associados) - 1){
                   ?>
                    <div class='empresa noBorderBot'>
                   <?php
                }else{
                   ?>
                    <div class='empresa'>
                   <?php
                }
                ?>
                    <div class='logo'>
                        
                        <?=$this->Html->image('/'.$f['logo_file'], array('id' => $f['id']) )?>
                    </div>
                    <div class='info'>
                        <div class='text'><p><?= $f["texto_{$lang}"];?></p></div>
                        <div class='links'>
                            <p>
                                <?php
                                if(!empty($f['url_1'])){
                                    ?>
                                    <a href="<?= $f['url_1'];?>" target="_blank"><?=__d('default', 'visitar o site')?></a>
                                    <?php
                                }
                                if(!empty($f['url_1']) && !empty($f['url_2'])){
                                    ?>
                                    |  

                                    <?php
                                }
                                if(!empty($f['url_2'])){
                                    ?>
                                    <a href="<?= $f['url_2'];?>" target="_blank">facebook</a></p>
                                    <?php
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            $count++;
        endforeach;
        ?>
        <?=$this->element('tipo-galeria')?>
    </div>
</div>

