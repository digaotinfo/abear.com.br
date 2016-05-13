<?php
//print_r($registros);
//print_r($logos);


$this->start('og:description');
    $texto = str_replace('"', '', $registros[$model]["texto_1_{$lang}"]);
    ?>
    <meta property="og:description" content="<?=strip_tags($texto)?>"/>
    <?php
$this->end();




$this->start('og:image');
    if (!empty($registros['Abear']['imagem_'.$lang.'_file'])) {

        $src = Router::url('/'.$registros['Abear']['imagem_'.$lang.'_file'], true);
        ?>
        <meta property="og:image" content="<?=$src?>" />
        <?php
    }
$this->end();

?>

<style type="text/css">
    .no-border {
        border: none !important;
    }

    .conheca .imgs_bot .left_,
    .conheca .imgs_bot .right_ {
        height: 31px !important;
    }
</style>


<div class='row conheca'>
    <div class='titulo_grande'>
        <div class='title'><p>Abear</p></div>
        <div class='quad'></div>
    </div>

    <?=$this->element('intros')?>

    <div class='paragrafo mL170'>
        <?php
        	echo $registros[$model]["texto_1_{$lang}"];
        	echo $this->Html->image('/'.$registros['Abear']['imagem_'.$lang.'_file'], array('class' => 'img_sobre'));
        	echo $registros[$model]["texto_2_{$lang}"];
        ?>
        <div class='social_share right'>
            <a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
            <a href="<?=urlencode('ABEAR') ?>+via @abear_br+<?=Router::url('', true)?>" share-pj='twitter'><div></div></a>
            <a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
            <a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg="<?=Router::url('/'.$registros['Abear']['imagem_'.$lang.'_file'], true)?>" share-pj-pindesc="<?='ABEAR'?>"><div></div></a>
            <a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
        </div>
    </div>




    <div class='imgs_bot'>
        <div class='left_'>
            <p class='title'><?php echo __d('default', 'Parceiros');?></p>
        </div>
        <div class='right_'>
        </div>


        <?php
        if (!empty($logos)) {
            foreach ($logos as $logo) {
                ?>
                 <div class="large-2 medium-3 small-4 end columns right no-border">
                    <?php
                    if (!empty($logo['Logo']['url_link'])) {
                        ?>
                        <a href="<?=$logo['Logo']['url_link']?>" target="_blank">
                        <?php
                    }
                    ?>
                    <img src="<?= $this->webroot;?><?=$logo['Logo']['logo_file']?>">
                    <?php
                    if (!empty($logo['Logo']['url_link'])) {
                        ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>

        <?=$this->element('tipo-galeria')?>

    </div>




</div>
