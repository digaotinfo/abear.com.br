<?php 
	
    $this->start('og:title');
        ?>
        <meta property="og:title" content="<?=__d('default', 'Código de Ética')?>"/>
        <?php
    $this->end();

?>
<div class='row conheca'>
    <div class='titulo_grande'>
        <div class='title'><p><?=__d('default', 'Código de Ética')?></p></div>
        <div class='quad'></div>
    </div>
    <?=$this->element('intros')?>
    <div class='paragrafo'>
        <?= $etica[$model]["texto_1_{$lang}"];?>
    </div>
    <?=$this->element('tipo-galeria')?>
    <div class='social_share right'>
        <a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
        <a href="<?=urlencode(__d('default', 'Código de Ética')) ?>+via @abear_br+<?=Router::url('', true)?>" share-pj='twitter'><div></div></a>
        <a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
        <a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg="<?=Router::url('/uploads/img/logo/abear_200px.png', true)?>" share-pj-pindesc="<?=__d('default', 'Código de Ética')?>"><div></div></a>
        <a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
    </div>
</div>