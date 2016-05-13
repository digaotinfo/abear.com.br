<?php 
	//print_r($lang);

?>
<div class='row conheca'>
    <div class='titulo_grande'>
        <div class='title'><p><?=__d('default', 'setor aéreo')?></p></div>
        <div class='quad'></div>
    </div>
    <?=$this->element('intros')?>
    <div class='setor_aereo'>
        <?php foreach ($registros as $setor) {
            $s = $setor['Setoraereo'];
            $nome = explode("-", $s['nome_'.$lang]);
            $nome = strtolower($nome[0]);

            ?>
            <div class='empresa'>
                <div class='logo' align='center'>
                <?=$this->Html->image('/'.$s['imagem_file'])?>
                </div>
                <div class='info'>
                    <div class='title'><p><?= $s["nome_{$lang}"];?></p></div>
                    <?= $s["texto_{$lang}"];?>
                    <div class='links'><p>

                    <?php
                        if(!empty($s["site"])){
		                    $http = '';
	                        $urlstr = $s['site'];
							$myhttp   = 'http://';
							$url = strpos($urlstr, $myhttp);
							
							if($url === false ){
								$http = 'http://';
							}
						
                    ?>
                        <a href="<?=$http.$s['site']?>" target="_blank"><?=__d('default', 'visitar o site')?></a>

                    <?php
	                        }
	                        if(!empty($s["site"]) && !empty($s["facebook"])){
                    ?>
                          |  

                    <?php
                        }
                        if(!empty($s["facebook"])){
                    ?>
                        <a href="<?= $s["facebook"];?>" target="_blank">facebook</a>

                    <?php
                        }
                    ?>
                    </p></div>
                </div>
            </div>
            <?php
        }?>
    <?=$this->element('tipo-galeria')?>
    </div>

</div>

		        