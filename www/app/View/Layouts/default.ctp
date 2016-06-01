<?php

//echo '['. __d('default', 'pipo') .']';
$titulo = '';
$fb_url = '';
$tw_url = '';
$yt_url = '';

if (!empty($configuracao["Configuracao"])) {
	$titulo = $configuracao["Configuracao"]['tag_title'];
	$fb_url = $configuracao["Configuracao"]['facebook'];
	$tw_url = $configuracao["Configuracao"]['twitter'];
	$yt_url = $configuracao["Configuracao"]['youtube'];
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
		<link rel="shortcut icon" href="<?=$this->webroot?>favicon.ico">
		<link rel="icon" type="image/gif" href="<?=$this->webroot?>animated_favicon2.gif">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />

        <?php echo $this->fetch('meta'); ?>

        <title><?= $titulo;?></title>
        <?php
        if (!empty($configuracao['Configuracao']['tag_keywords'])):
			?>
			<meta name="keywords" content="<?=$configuracao['Configuracao']['tag_keywords']?>" />
			<?php
		endif;

        if (!empty($configuracao['Configuracao']['tag_description'])):
			?>
			<meta name="description" content="<?=$configuracao['Configuracao']['tag_description']?>" />
			<?php
		endif;
		?>



		<meta property="og:type" content="article" />
		<meta property="og:site_name" content="Abear" />
		<?php
		$local = "pt_BR";
		if ($lang == 'eng') {
			$local = "en_US";

		} elseif ($lang == 'esp') {
			$local = "es_ES";

		}
		?>
		<meta property="og:locale" content="<?=$local?>" />
		<?php
		/*
		<meta property="og:type" content="activity" />
		<meta property="og:title" content="<?= $titulo;?>"/>
		<meta property="og:description" content="< ? php echo $this->fetch('meta_description') ? >"/>
		*/
		?>
		<?php //echo $this->fetch('og:image');?>




		<?php
		//// URL FACEBOOK
		////////////////////////////////////////////
		echo $this->fetch('og:url');

		if (!$this->fetch('og:url')) {
			?>
			<meta property="og:url" content="<?=$this->Html->url('', true)?>" />
			<?php
		}
		////////////////////////////////////////////
		////////////////////////////////////////////
		?>
		<?php
		//// TITULO FACEBOOK
		////////////////////////////////////////////
		echo $this->fetch('og:title');

		if (!$this->fetch('og:title')) {
			?>
			<meta property="og:title" content="<?=$titulo?>"/>
			<?php
		}
		////////////////////////////////////////////
		////////////////////////////////////////////
		?>
		<?php
		//// IMAGEM FACEBOOK
		////////////////////////////////////////////
		echo $this->fetch('og:image');

		if (!$this->fetch('og:image')) {
			//echo 'sss';
			//$this->start('og:image');
				?>
				<meta property="og:image" content="http://abear.com.br/uploads/img/logo/abear_200px.png" />
				<?php
			//$this->end();
		}
		////////////////////////////////////////////
		////////////////////////////////////////////
		?>

		<?php
		//// DESCRIPTION FACEBOOK
		////////////////////////////////////////////
		echo $this->fetch('og:description');

		if (!$this->fetch('og:description')) {
			//$this->start('og:description');
				if (!empty($configuracao['Configuracao']['tag_description'])):
					?>
					<meta property="og:description" content="<?=$configuracao['Configuracao']['tag_description']?>"/>
					<?php
				endif;
			//$this->end();
		}
		////////////////////////////////////////////
		////////////////////////////////////////////
		?>



                <?php
                echo $this->Html->css(array('layouts/reset.css',
                							'layouts/foundation.css',
                							'layouts/slick.css',//banner
                                            'layouts/estilo.css',
                                            'layouts/flexslider.css',
                                            // >>> facybox
                                            '/assets/fancybox/source/jquery.fancybox.css?v=2.1.5'
                    ));

                echo $this->Html->script(array(
                								'customs/modernizr.foundation.js',
		                						'layouts/jquery-1.10.2.min.js',
		                						'layouts/foundation.min.js',
												'layouts/foundation.equalizer.js',
		                						'layouts/Greensock/TweenMax.js',
		                						'layouts/slick.js',
		                						'layouts/jquery.flexslider-min.js',
		                						'layouts/default.js',
		                						'layouts/menu-dropdow.js',
		                						// >>> fancybox
		                						'/assets/fancybox/source/jquery.fancybox.js?v=2.1.5',

        			));
        		?>

        <script>
        	var webroot = '<?=$this->webroot;?>';
        </script>

    </head>

    <body>
		<?php
			$mostrarMenu = 'hide';
			if($lang == 'ptbr'){
				$mostrarMenu = '';
			}
		 ?>
		<div class='aHeader'>
			<div class='bg_branco_fullRight'></div>
			<div class='row'>
				<a href='<?=$this->Html->url(array('controller' => 'index', 'action' => 'index'))?>'><?=$this->Html->image('/'.$configuracao['Configuracao']['logo_file'])?></a>
				<div class='head'>
					<div class='top'>
						<div class='top_hold'>
							<div class='newSpace'>
								<div>
									<a href="http://abearcrm.riweb.com.br/mailingbasic.aspx" class="btn btn-crm"><?php eho __d('default', 'CLICK AQUI') ?></a>
								</div>
							</div>
							<div class='divisoria'></div>
							<div class='language'>
								<div>
									<?php
									$display = '';
									if ($lang != 'eng') {

										?>
		                                <a href="<?= $this->webroot; ?>eng"> ENG</a>
										<?php
										echo "<p>/</p> ";
									}
									if ($lang != 'esp') {
										?>

		                             	<a href="<?= $this->webroot; ?>esp">  ESP </a>
										<?php
									}
									if ($lang == 'eng') {
										echo "<p>/</p> ";
									}
									if ($lang != 'ptbr') {

										?>
			                           	<a href="<?= $this->webroot; ?>pt-br"> PT </a>
		                                <?
									}
									?>
								</div>
							</div>
							<div class='divisoria'></div>
							<div class='social'>
								<?php
								if (!empty($fb_url)) {
									?>
									<a href="<?= $fb_url;?>" target="_blank" id='fb'></a>
									<?php
								}
								if (!empty($tw_url)) {
									?>
									<a href="<?= $tw_url;?>" target="_blank" id='tw'></a>
									<?php
								}
								if (!empty($yt_url)) {
									?>
									<a href="<?= $yt_url;?>" target="_blank" id='yt'></a>
									<?php
								}
								?>



							</div>
							<div class='divisoria'></div>
							<div class='search'>
								<div>
									<form id="buscar" action='<?= $this->webroot;?>busca/'>
										<div>
											<input type='text' id='search' placeholder='<?=__d('default', 'PESQUISAR')?>'>
										</div>
										<div class='bt_ok'>
											<button id='btn_busca'>OK</button>
										</div>
										 <script>
											$("#btn_busca").click(function()
											{
												if($("#input_busca").val() != '')
												{
													window.location = '<?= $this->webroot;?>busca/' + $("#input_busca").val();
												}
											});
										</script>
									</form>
								</div>
							</div>
						</div>

					</div>
					<div class='menu'>
						<ul class='hold'>
							<li>
								<div><a href="#" dropdown-pj="drop_progConheca" data-options="is_hover:true"><p><?= __d('default', 'CONHEÇA')?></p></a></div>

                                <ul id="drop_progConheca" class="dropdown_pj pTop10">
                                    <li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'index'))?>"><?= __d('default', 'A ABEAR')?></a></li>
                                    <li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'estruturas'))?>"><?= __d('default', 'Estrutura da Entidade')?></a></li>
                                    <li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'fundadores'))?>"><?= __d('default', 'Fundadores')?></a></li>
									<li class="<?=$mostrarMenu?>"><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'etica'))?>"><?= __d('default', 'Código de Ética')?></a></li>
									<li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'setor_aereo'))?>"><?= __d('default', 'Setor Aéreo')?></a></li>
                                </ul>
							</li>
							<li class="<?=$mostrarMenu?>">
								<div><a href="#" dropdown-pj="drop_progEventos" data-options="is_hover:true"><p><?= __d('default', 'PROGRAMAS E EVENTOS')?></p></a></div>
								<ul id="drop_progEventos" class="dropdown_pj pTop10">
									<?php
									if (!empty($hotsite_urls)){
										if (!empty($hotsite_urls[$model_hotsite]['aviacao_em_debate'])){
											$myHotSite = $hotsite_urls[$model_hotsite]['aviacao_em_debate'];
											$findme   = 'http';
											$result = strpos($myHotSite, $findme);

											if($result === false){
												$link = 'http://'.$hotsite_urls[$model_hotsite]['aviacao_em_debate'];
											}else{
												$link =  $hotsite_urls[$model_hotsite]['aviacao_em_debate'];
											}
											?>
											<li><a href="<?=$link?>" target="_blank"><?= __d('default', 'Aviação em Debate')?></a></li>
											<?php
										}
									}
									?>
									<li><a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'index'))?>"><?= __d('default', 'Eventos')?></a></li>
									<?php
									if (!empty($hotsite_urls)){
										if (!empty($hotsite_urls[$model_hotsite]['premio_de_jornalismo_abear'])){
											?>
											<li><a href="<?=$hotsite_urls[$model_hotsite]['premio_de_jornalismo_abear']?>" target="_blank"><?= __d('default', 'Prêmio de Jornalismo ABEAR')?></a></li>
											<?php
										}
									}
									?>
									<li><a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'aviacao'))?>"><?= __d('default', 'Por Dentro da Aviação')?></a></li>
									<li><a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'como_voar'))?>"><?= __d('default', 'Como Voa o Brasil')?></a></li>

								</ul>
							</li>
							<li class="<?=$mostrarMenu?>">
								<div><a href="#" dropdown-pj="drop_news" data-options="is_hover:true"><p><?php echo __d('default', 'IMPRENSA')?></p></a></div>
								<ul id="drop_news" class="dropdown_pj pTop10">
									<li><a href="<?=$this->webroot.'imprensa/notas-e-releases'?>"><?php echo __d('default', 'Notas e Releases')?></a></li>
									<li><a href="<?=$this->webroot.'imprensa/artigos'?>"><?php echo __d('default', 'Artigos')?></a></li>
									<li>
										<?php
											echo $this->Html->link(
												__d('default', 'Clipping'),
												array(
													'controller' => 'Imprensas', 
													'action' => 'clipping'
												)); 
										?>
									</li>
									<li><a href="<?=$this->webroot.'imprensa/na-midia'?>"><?php echo __d('default', 'Na Mídia')?></a></li>
									<li><a href="<?=$this->webroot.'imprensa/news-das-associadas'?>"><?php echo __d('default', 'News das Associadas')?></a></li>
									<?php
									if (!empty($hotsite_urls)){
										if (!empty($hotsite_urls[$model_hotsite]['agencia_abear'])){
											?>
											<li><a href="<?=$hotsite_urls[$model_hotsite]['agencia_abear']?>" target="_blank"><?= __d('default', 'Agência ABEAR')?></a></li>
											<?php
										}
									}
									?>
								</ul>
							</li>
							<li class="<?=$mostrarMenu?>">
								<div><a href="<?=$this->Html->url(array('controller' => 'dadoseFatos', 'action' => 'index'))?>"><p><?= __d('default', 'DADOS E FATOS')?></p></a></div>
							</li>
							<li>
								<div><a href="#" dropdown-pj="drop_exp" data-options="is_hover:true"><p><?= __d('default', 'EXPERIÊNCIA DE VOAR')?></p></a></div>
									<ul id="drop_exp" class="dropdown_pj pTop10">
										<li><a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'guia_passageiros'))?>"><?= __d('default', 'Guia do Passageiro')?></a></li>
										<?php
											//<li><a href="< ?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'clube_abear'))? >">< ?= __d('default', 'Clube ABEAR')? ></a></li>
										?>
										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['clube_abear'])){
												?>
												<li><a href="<?=$hotsite_urls[$model_hotsite]['clube_abear']?>" target="_blank"><?= __d('default', 'Clube ABEAR')?></a></li>
												<?php
											}
										}
										?>
										<li class="<?=$mostrarMenu?>"><div class='submenu_tituloAmarelo'><p><?php echo __d('default', 'CAMPANHAS')?></p></div></li>
										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['asas_do_bem'])){
												?>
												<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$hotsite_urls[$model_hotsite]['asas_do_bem']?>" target="_blank"><?= __d('default', 'Asas do Bem')?></a></li>
												<?php
											}
										}
										?>
										<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'voar_mais_brasil'))?>"><?php echo __d('default', 'Voar Por Mais Brasil')?></a></li>
										<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'nas_aeronaves'))?>"><?= __d('default', 'Nas Aeronaves')?></a></li>

										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['transporte_de_orgaos'])){
												?>
												<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$hotsite_urls[$model_hotsite]['transporte_de_orgaos']?>" target="_blank"><?= __d('default', 'Transporte de Órgãos')?></a></li>
												<?php
											}
										}
										?>

										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['tudo_para_voar_melhor'])){
												?>
												<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$hotsite_urls[$model_hotsite]['tudo_para_voar_melhor']?>" target="_blank"><?= __d('default', 'Tudo Para Voar Melhor')?></a></li>
												<?php
											}
										}
										?>
									</ul>
							</li>
							<li>
								<div><a href="<?=$this->Html->url(array('controller' => 'contatos', 'action' => 'index'))?>"><p><?=__d('default', 'CONTATO')?></p></a></div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<nav class="top-bar" data-topbar>
				<section class="top-bar-section">
					<!-- Right Nav Section -->
					<ul class="right">
						<li class="has-dropdown">

							<a href="#" style='color:white;'>ABEAR - <?=__d('default', 'MENU')?></a>
							<ul class="dropdown">

								<li class='has-dropdown'>
									<a href="#"><?=__d('default', 'CONHEÇA')?></a>
									<ul class='dropdown'>
										<li class='title_menu pTop10'><?=__d('default', 'CONHEÇA')?></li>
										<li class="divider"></li>
										<li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'index'))?>"><?= ucwords(__d('default', 'A ABEAR'))?></a></li>
										<li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'estruturas'))?>"><?= __d('default', 'Estrutura da Entidade')?></a></li>
										<li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'fundadores'))?>"><?= __d('default', 'Fundadores')?></a></li>
										<li class="<?=$mostrarMenu?>"><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'etica'))?>"><?= __d('default', 'Código de Ética')?></a></li>
										<li><a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'setor_aereo'))?>"><?= __d('default', 'Setor Aéreo')?></a></li>
									</ul>
								</li>

								<li class="divider"></li>

								<li class='has-dropdown <?=$mostrarMenu?>'>
									<a href="#"><?=__d('default', 'PROGRAMAS E EVENTOS')?></a>
									<ul class='dropdown'>
										<li class='title_menu pTop10'><?=__d('default', 'PROGRAMAS E EVENTOS')?></li>
										<li class="divider"></li>
										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['aviacao_em_debate'])){
												$myHotSite = $hotsite_urls[$model_hotsite]['aviacao_em_debate'];
												$findme   = 'http';
												$result = strpos($myHotSite, $findme);

												if($result === false){
													$link = 'http://'.$hotsite_urls[$model_hotsite]['aviacao_em_debate'];
												}else{
													$link =  $hotsite_urls[$model_hotsite]['aviacao_em_debate'];
												}
												?>
												<li><a href="<?=$link?>" target="_blank"><?= __d('default', 'Aviação em Debate')?></a></li>
												<?php
											}
										}
										?>
										<li><a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'index'))?>"><?=ucwords(__d('default', 'Eventos'))?></a></li>

										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['premio_de_jornalismo_abear'])){
												?>
												<li><a href="<?=$hotsite_urls[$model_hotsite]['premio_de_jornalismo_abear']?>" target="_blank"><?= __d('default', 'Prêmio de Jornalismo ABEAR')?></a></li>
												<?php
											}
										}
										?>

										<li><a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'aviacao'))?>"><?= __d('default', 'Por Dentro da Aviação')?></a></li>
										<li><a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'como_voar'))?>"><?= __d('default', 'Como Voa o Brasil')?></a></li>

									</ul>
								</li>

								<li class="divider"></li>

								<li class='has-dropdown <?=$mostrarMenu?>'>
									<a href="#"><?=__d('default', 'IMPRENSA')?></a>
									<ul class='dropdown'>
										<li class='title_menu pTop10'><?=__d('default', 'IMPRENSA')?></li>
										<li class="divider"></li>
										<li><a href="<?=$this->webroot.'imprensa/notas-e-releases'?>"><?php echo __d('default', 'Notas e Releases')?></a></li>
										<li><a href="<?=$this->webroot.'imprensa/artigos'?>"><?php echo __d('default', 'Artigos')?></a></li>
										<li>
											<?php
												echo $this->Html->link(
												__d('default', 'Clipping'),
												array(
													'controller' => 'Imprensas', 
													'action' => 'clipping'
												));
											?>
										</li>
										<li><a href="<?=$this->webroot.'imprensa/na-midia'?>"><?php echo __d('default', 'Na Mídia')?></a></li>
										<li><a href="<?=$this->webroot.'imprensa/news-das-associadas'?>"><?php echo __d('default', 'News das Associadas')?></a></li>

										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['agencia_abear'])){
												?>
												<li><a href="<?=$hotsite_urls[$model_hotsite]['agencia_abear']?>" target="_blank"><?= __d('default', 'Agência ABEAR')?></a></li>
												<?php
											}
										}
										?>
									</ul>
								</li>

								<li class="divider"></li>

								<li class="<?=$mostrarMenu?>"><a href="<?=$this->Html->url(array('controller' => 'dadosFatos', 'action' => 'index'))?>"><?=__d('default', 'DADOS E FATOS')?></a></li>

								<li class="divider"></li>

								<li class='has-dropdown'>
									<a href="#"><?=__d('default', 'EXPERIÊNCIA DE VOAR')?></a>
									<ul class='dropdown'>
										<li class='title_menu pTop10'><?=__d('default', 'EXPERIÊNCIA DE VOAR')?></li>
										<li class="divider"></li>
										<li><a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'guia_passageiros'))?>"><?= __d('default', 'Guia do Passageiro')?></a></li>
										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['clube_abear'])){
												?>
												<li><a href="<?=$hotsite_urls[$model_hotsite]['clube_abear']?>" target="_blank"><?= __d('default', 'Clube ABEAR')?></a></li>
												<?php
											}
										}
										?>

										<li class='title_menu pTop10 <?=$mostrarMenu?>'><?php echo __d('default', 'CAMPANHAS')?></li>
										<li class="divider <?=$mostrarMenu?>"></li>
										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['asas_do_bem'])){
												?>
												<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$hotsite_urls[$model_hotsite]['asas_do_bem']?>" target="_blank"><?= __d('default', 'Asas do Bem')?></a></li>
												<?php
											}
										}
										?>
										<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'voar_mais_brasil'))?>"><?php echo __d('default', 'Voar Por Mais Brasil')?></a></li>
										<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'nas_aeronaves'))?>"><?= __d('default', 'Nas Aeronaves')?></a></li>
										<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['transporte_de_orgaos'])){
												?>
												<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$hotsite_urls[$model_hotsite]['transporte_de_orgaos']?>" target="_blank"><?= __d('default', 'Transporte de Órgãos')?></a></li>
												<?php
											}
										}
										?><?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['tudo_para_voar_melhor'])){
												?>
												<li class='mL5 <?=$mostrarMenu?>'><a href="<?=$hotsite_urls[$model_hotsite]['tudo_para_voar_melhor']?>" target="_blank"><?= __d('default', 'Tudo Para Voar Melhor')?></a></li>
												<?php
											}
										}
										?>
									</ul>
								</li>

								<li class="divider"></li>

								<li><a href="<?=$this->Html->url(array('controller' => 'contatos', 'action' => 'index'))?>"><?=__d('default', 'CONTATO')?></a></li>
							</ul>
						</li>
					</ul>
				</section>
			</nav>
		</div>

        <!--MIOLO DA PAGINA-->
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>

       <!--FIM MIOLO DA PAGINA-->
		<?php
			$classNewFooter = '';
			$numberColumns = 4;
			if(!empty($mostrarMenu)){
				$classNewFooter = 'new-footer';
				$numberColumns = 12;
			}
		?>
		<div class='aFooter <?=$classNewFooter?>'>
			<div class='row'>
				<div class='footerMenu row' data-equalizer>
					<div class="small-<?=$numberColumns?> columns" data-equalizer-watch>
						<div class='title'><?=__d('default', 'CONHEÇA')?></div>
						<a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'index'))?>"><?= __d('default', 'A ABEAR')?></a>
						<a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'estruturas'))?>"><?= __d('default', 'Estrutura da Entidade')?></a>
						<a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'fundadores'))?>"><?= __d('default', 'Fundadores')?></a>
						<a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'etica'))?>" class="<?=$mostrarMenu?>"><?= __d('default', 'Código de Ética')?></a>
						<a href="<?=$this->Html->url(array('controller' => 'abears', 'action' => 'setor_aereo'))?>"><?= __d('default', 'Setor Aéreo')?></a>
					</div>

					<div class="small-4 columns <?=$mostrarMenu?>" data-equalizer-watch>
						<div class='title'><?=__d('default', 'PROGRAMAS E EVENTOS')?></div>

						<?php
						if (!empty($hotsite_urls)){
							if (!empty($hotsite_urls[$model_hotsite]['aviacao_em_debate'])){
								$myHotSite = $hotsite_urls[$model_hotsite]['aviacao_em_debate'];
								$findme   = 'http';
								$result = strpos($myHotSite, $findme);

								if($result === false){
									$link = 'http://'.$hotsite_urls[$model_hotsite]['aviacao_em_debate'];
								}else{
									$link =  $hotsite_urls[$model_hotsite]['aviacao_em_debate'];
								}
								?>
								<a href="<?=$link?>" target="_blank"><?= __d('default', 'Aviação em Debate')?></a>
								<?php
							}
						}
						?>
						<a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'index'))?>"><?= __d('default', 'Eventos')?></a>
						<?php
						if (!empty($hotsite_urls)){
							if (!empty($hotsite_urls[$model_hotsite]['premio_de_jornalismo_abear'])){
								?>
								<a href="<?=$hotsite_urls[$model_hotsite]['premio_de_jornalismo_abear']?>" target="_blank"><?= __d('default', 'Prêmio de Jornalismo ABEAR')?></a>
								<?php
							}
						}
						?>

						<a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'aviacao'))?>"><?= __d('default', 'Por Dentro da Aviação')?></a>
						<a href="<?=$this->Html->url(array('controller' => 'eventos', 'action' => 'como_voar'))?>"><?= __d('default', 'Como Voa o Brasil')?></a>

					</div>

					<div class="small-4 columns <?=$mostrarMenu?>" data-equalizer-watch>
						<div class='title'><a href="<?=$this->webroot.'ultimas-noticias'?>" class='title'><?=__d('default', 'IMPRENSA')?></a></div>
						<a href="<?=$this->webroot.'imprensa/notas-e-releases'?>"><?php echo __d('default', 'Notas e Releases')?></a>
						<a href="<?=$this->webroot.'imprensa/artigos'?>"><?php echo __d('default', 'Artigos')?></a>
						<?php
							echo $this->Html->link(
							__d('default', 'Clipping'),
							array(
								'controller' => 'Imprensas', 
								'action' => 'clipping'
							));
						?>
						<a href="<?=$this->webroot.'imprensa/na-midia'?>"><?php echo __d('default', 'Na Mídia')?></a>
						<a href="<?=$this->webroot.'imprensa/news-das-associadas'?>"><?php echo __d('default', 'News das Associadas')?></a>

						<?php
							if (!empty($hotsite_urls)){
								if (!empty($hotsite_urls[$model_hotsite]['agencia_abear'])){
									?>
									<a href="<?=$hotsite_urls[$model_hotsite]['agencia_abear']?>" target="_blank"><?= __d('default', 'Agência ABEAR')?></a>
									<?php
								}
							}
						?>
					</div>

					<div class="columns padding-top20" data-equalizer>
						<div class="small-4 end columns" data-equalizer-watch>
							<?php if(empty($mostrarMenu)): ?>
								<a href="<?= $this->webroot;?>dados-e-fatos" class='title'><?=__d('default', 'DADOS E FATOS')?></a>
									<div class='spacer'></div>
								<a href="<?=$this->Html->url(array('controller' => 'contatos', 'action' => 'index'))?>" class='title'><?=__d('default', 'CONTATO')?></a>
								<a href="<?=$this->Html->url(array('controller' => 'contatos', 'action' => 'index'))?>" class='title'><?=__d('default', 'NOVO LINK')?></a>
							<?php endif ?>
						</div>

						<div class="small-4  columns" data-equalizer-watch>
							<?php
								if(empty($mostrarMenu)): ?>
									<div class='title'><?=__d('default', 'CAMPANHAS')?></div>
									<?php
										if (!empty($hotsite_urls)){
											if (!empty($hotsite_urls[$model_hotsite]['asas_do_bem'])){
												?>
												<a href="<?=$hotsite_urls[$model_hotsite]['asas_do_bem']?>" target="_blank"><?= __d('default', 'Asas do Bem')?></a>
												<?php
											}
										}
										?>
									<a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'voar_mais_brasil'))?>"><?php echo __d('default', 'Voar Por Mais Brasil')?></a>
									<a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'nas_aeronaves'))?>"><?= __d('default', 'Nas Aeronaves')?></a>
									<?php
									if (!empty($hotsite_urls)){
										if (!empty($hotsite_urls[$model_hotsite]['transporte_de_orgaos'])){
											?>
											<a href="<?=$hotsite_urls[$model_hotsite]['transporte_de_orgaos']?>" target="_blank"><?= __d('default', 'Transporte de Órgãos')?></a>
											<?php
										}
									}
									?>
									<?php
									if (!empty($hotsite_urls)){
										if (!empty($hotsite_urls[$model_hotsite]['tudo_para_voar_melhor'])){
											?>
											<a href="<?=$hotsite_urls[$model_hotsite]['tudo_para_voar_melhor']?>" target="_blank"><?= __d('default', 'Tudo Para Voar Melhor')?></a>
											<?php
										}
									}
									?>
							<?php endif; ?>
						</div>

						<div class="small-<?=$numberColumns?> end columns" data-equalizer-watch>
							<div class='title'><?=__d('default', 'EXPERIÊNCIA DE VOAR')?></div>
							<a href="<?=$this->Html->url(array('controller' => 'voarExperiencias', 'action' => 'guia_passageiros'))?>"><?= __d('default', 'Guia do Passageiro')?></a>

							<?php
							if (!empty($hotsite_urls)){
								if (!empty($hotsite_urls[$model_hotsite]['clube_abear'])){
									?>
									<a href="<?=$hotsite_urls[$model_hotsite]['clube_abear']?>" target="_blank"><?= __d('default', 'Clube ABEAR')?></a>
									<?php
								}
							}
							?>
							<?php if(!empty($mostrarMenu)): ?>
								<a href="<?=$this->Html->url(array('controller' => 'contatos', 'action' => 'index'))?>" class='title'><?=__d('default', 'CONTATO')?></a>
							<?php endif; ?>

						</div>

					</div>

				</div>
				<div class='footerInfo'>
					<?php
						if(!empty($mostrarMenu)){
							foreach ($enderecos as $endereco) {
		                        $e = $endereco['Endereco'];
		                        ?>
		                        <div class="medium-6 end columns info-footer">
		                            <p class='title'><?= $e['cidade'];?></p>
		                            <p><?= $e['logradouro'];?>, <?= $e['numero'];?> - <?= $e['complemento'];?></br><?= $e['cep'];?>  |  <?= $e['bairro'];?>  |  <?= $e['cidade'];?>/<?= $e['estado'];?></br><?= $e['telefone1'];?></p>
		                        </div>
		                        <?php
	                    	}

						}else{
					?>
		                    <?php
								foreach ($enderecos as $endereco) {
			                        $e = $endereco['Endereco'];
			                        ?>
			                        <div>
			                            <p class='title'><?= $e['cidade'];?></p>
			                            <p><?= $e['logradouro'];?>, <?= $e['numero'];?> - <?= $e['complemento'];?></br><?= $e['cep'];?>  |  <?= $e['bairro'];?>  |  <?= $e['cidade'];?>/<?= $e['estado'];?></br><?= $e['telefone1'];?></p>
			                        </div>
			                        <?php
			                    }
							?>
					<?php } ?>





				</div>
			</div>
		</div>


		<div class='foto_modal row' id='fotos_modal'>
			<?=$this->element('foto-modal')?>
		</div>


		<div class='modal_mail'>
			<div class='close_ modal-pj-close'><p>X</p></div>
			<div class='title'><p><?=__d('default', 'Compartilhar por e-mail')?></p></div>

			<form id='share_mail_form'>
				<div class='remetente'>
					<div>
						<input type='text' id='nameR' name='nameR' placeholder='<?=__d('default', 'Nome do Remetente')?>'>
					</div>
					<div>
						<input type='email' id='emailR' name='emailR' placeholder='<?=__d('default', 'Email do Remetente')?>'>
					</div>
				</div>
				<div class='destinatario'>
					<div>
						<input type='text' id='nameD' name='nameD' placeholder='<?=__d('default', 'Nome do Destinatário')?>'>
					</div>
					<div>
						<input type='email' id='emailD' name='emailD' placeholder='<?=__d('default', 'Email do Destinatário')?>'>
					</div>
				</div>
				<div class='msg'>
					<textarea id='msg_mail' name='msg_mail'></textarea>
				</div>
				<button type='submit'><?=__d('default', 'Enviar')?></button>
			</form>

			<div class='loader' align='center'><?=$this->Html->image('/img/index/loader.gif')?></div>
		</div>

		</div>

		<?php
		$debugar_sql = true;

		if ($debugar_sql) {
			?>
			<div class="hide debug">
				<?=$this->element('sql_dump'); ?>
			</div>
			<?php
		}
		?>





		<script type="text/javascript">
			$(document).foundation({
				reveal:{
					dismiss_modal_class: 'close-reveal-modal'
				}
			});

			$( document ).ready(function() {
				$('.modal_mail button').click(function(e){
					e.preventDefault();
					var isValid = true;
					var form = $(this).parent();
					var loader = $(this).parent().parent().find('.loader');

					$('.modal_mail .error').remove();

					$( "#share_mail_form input" ).each(function(index, value){

						if( $(value).attr('type') == 'email' ){
							if( !isEmail($(value).val())){
								isValid = false;
								$(value).parent().append('<div class="error" style="margin-bottom: 5px; width:100%; background: #fed712; padding: 3px; color: #515151; font-size: 10px; border: 1px solid #ccc; display:none;">Preencha este campo corretamente com o '+$(value).attr('placeholder')+'!</div>');
							}
						}else{
							if($(value).val() == ''){
								isValid = false;
								$(value).parent().append('<div class="error" style="margin-bottom: 5px; width:100%; background: #fed712; padding: 3px; color: #515151; font-size: 10px; border: 1px solid #ccc; display:none;">Preencha este campo corretamente com o '+$(value).attr('placeholder')+'!</div>');
							}
						}
					});
					$('.modal_mail .error').show(10);

					//alert(isValid);
					//return false;
					if(isValid){
						form.hide(0);
						loader.show(10);

						$.post( (webroot) + "compartilhar/email/", $( "#share_mail_form" ).serialize(), function(data){
							if (data == 'true') {
								$('#share_mail_form').find('input, textarea').val('');
							 	$('#share_mail_form').find('input[type="radio"], input[type="checkbox"]').prop('checked', false);
								$('.modal_mail').trigger('closeModal');
							    alert('Formulario enviado!');
							} else {
								alert('Seu e-mail não pode ser enviado. Tente novamente mais tarde');
							}
							form.show(10);
							loader.hide(0);
						});
					}else{
						alert('Preencha todos os campos corretamente antes de enviar!');
					}
				});

				$('[modal-pj]').click(function(){
					if($(this).attr('modal-pj') == '.modal_mail'){
						$('.modal_mail textarea').val($(this).attr('href'));
					}else if($(this).attr('modal-pj') == '.foto_modal'){
						var id = $(this).attr('id');
						var rel = $(this).attr('rel');
						var date = $(this).attr('galeria-date');
						var endereco = '';

						if(date == '0') id = 0;

						if(rel){endereco = (webroot) + "imagem/" + id + '/' + rel;}
						else{endereco = (webroot) + "imagem/" + id;}
						$.post( endereco, function(data){
							$('.foto_modal').html(data);
						});
					}
				})
			});
        </script>

        <?=$this->fetch('script')?>

        <script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-38243772-1']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();


			function contabilizarEvento(temaDoEvento, nomeDoEvento, obsDoEvento) {
				_gaq.push(['_trackEvent', ""+ temaDoEvento, ""+ nomeDoEvento, ''+ obsDoEvento]);
				// console.log('clicado');
			}
		</script>
		<?php
			// echo $this->Html->script(array(
			// 							'layouts/foundation.js',
			// 							'layouts/foundation.equalizer.js',
			// 						));
		?>


		<!-- Código do Google para tag de remarketing -->
		<!--
		As tags de remarketing não podem ser associadas a informações pessoais de identificação nem inseridas em páginas relacionadas a categorias de confidencialidade. Veja mais informações e instruções sobre como configurar a tag em: http://google.com/ads/remarketingsetup
		-->
		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 960663633;
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/960663633/?value=0&amp;guid=ON&amp;script=0"/>
		</div>
</noscript>


        </body>
</html>
