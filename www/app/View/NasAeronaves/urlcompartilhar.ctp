<?php
//print_r($imgs);
//print_r($configuracao['Configuracao']);


$this->start('og:title');
	?>
	<meta property="og:title" content="<?=$registro[$model]['titulo_'.$lang]?>"/>
	<?php
$this->end();

$this->start('og:description');
	$texto = str_replace('"', '', $registro[$model]['texto_'.$lang]);
	?>
	<meta property="og:description" content="<?=strip_tags($texto)?>"/>
	<?php
$this->end();

$this->start('og:image');
	if (!empty($registro[$model]['img_' .$lang. '_file'])):
		?>
		<meta property="og:image" content="<?=$this->Html->url('/', true) . $registro[$model]['img_' .$lang. '_file']?>" />
		<?php
	endif;
$this->end();
?>

<div class='row exp_de_voar'>
	<div class='titulo_grande'>
		<div class='title'>
			<a href="<?=$this->Html->url(
                                        array(
											'controller' => 'voarExperiencias', 
											'action' => 'guia_passageiros'
                                        )
                                        )?>">
				<p><?=__d('default', 'Guia do Passageiro')?></p>
			</a>
		</div>
		<div class='quad'></div>
	</div>

	<div class='row content'>
		<div class='small-12 conteudo'>
			<div class="small-12 columns">
				<h5 class='title'><?=$registro[$model]['titulo_'.$lang]?></h5>
			</div>
			<div class="large-3 medium-4 small-6 columns small-centered medium-uncentered">
				<?=$this->Html->image('/'. $registro[$model]['img_' .$lang. '_file']);?>
			</div>
			<div class='large-9 medium-8 small-12 columns'>
				<?=$registro[$model]['texto_'.$lang]?>
			</div>
		</div>
	</div>
	
	<div class='row'>
		<div class="small-12 columns">&nbsp;</div>
	</div>
</div>