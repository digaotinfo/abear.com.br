<?php
// print_r($type['NewslettersEditableType']['html']);
// print_r($configuracao['Configuracao']['facebook']);
?>
<html>
	<head>
		<?php
			echo $this->Html->css('newsletter.css');

			// >>> atualizar data
			$data = date('D');
			$mes = date('M');
			$dia = date('d');
			$ano = date('Y');

			$semana = array(
						'Sun'=>'DOMINGO',
						'Mon'=>'SEGUNDA-FEIRA',
						'Tue'=>'TERÇA-FEIRA',
						'Wed'=>'QUARTA-FEIRA',
						'Thu'=>'QUINTA-FEIRA',
						'Fri'=>'SEXTA-FEIRA',
						'Sat'=>'SÁBADO'
						);

			$mes_extenso = array(
								'Jan'=>'JANEIRO',
								'Feb'=>'FEVEREIRO',
								'Mar'=>'MARÇO',
								'Apr'=>'ABRIL',
								'May'=>'MAIO',
								'Jun'=>'JUNHO',
								'Jul'=>'JUSLHO',
								'Aug'=>'AGOSTO',
								'Nov'=>'NOVEMBRO',
								'Sep'=>'SETEMBRO',
								'Oct'=>'OUTUBRO',
								'Dec'=>'DEZEMBRO'
							);
			$find = array("{DATA}", "[FACEBOOK]", "[TWITTER]", "[YOUTUBE]", "[LINKEDIN]", "http://server.local/abear.com.br/www/");
			$subDate =  array($semana["$data"].", <b>{$dia} de ".$mes_extenso["$mes"]." de {$ano}</b>", $configuracao['Configuracao']['facebook'], $configuracao['Configuracao']['twitter'], $configuracao['Configuracao']['youtube'], $configuracao['Configuracao']['linkedin'], Router::url('/', true));
			$html = str_replace($find, $subDate, $type['NewslettersEditableType']['html']);
			// <<< atualizar data
			?>

		<!-- >>> IMPORTANT -->
		<?=$this->Html->script('jquery_min.js');?>
		<?=$this->Html->script('jquery-ui_min.js');?>
		<?=$this->Html->script('jquery.browser.js');?>

		<!-- >>> elfinder -->
		<?php
		echo $this->Html->css('../elfinder/css/elfinder.min.css');
		echo $this->Html->script('../elfinder/js/elfinder.min.js');
		?>
		<!-- <<< elfinder -->

		<!-- >>> tinymce -->
		<?=$this->Html->script('tinymce_editable/tinymce.min.js');?>
		<?=$this->Html->script('tinymce_editable/js/newsletter_custom.js');// <<< alteração tinymce?>
		<!-- <<< tinymce -->

		<script type="text/javascript">
			//elfinder
			function elFinderBrowser(field_name, url, type, win) {
				tinymce.activeEditor.windowManager.open({
					file: '<?= $this->webroot; ?>elfinder/elfinder.html', // use an absolute path!
					title: 'Upload de Imagem para NewsLetter Abear',
					width: 900,
					height: 530,
					resizable: 'yes'
				}, {
					setUrl: function(url) {
						win.document.getElementById(field_name).value = url;
					}
				});
				return false;
			}
		</script>
		<!-- >>> IMPORTANT -->

		<meta charset="UTF-8">
	</head>

	<body style="margin-left: 0px;">

		<?php
		echo $this->Form->create($model);
			?>

			<div style="background-color: #9ACB22; color: #fff; z-index: 9999; position: fixed; top: 0; width:100%; ">
				<div style="/*background-color: #FFD700;*/ font-family: verdana; font-size: 14px; color: #949494;padding: 10px 8px;" align="right">
					<?=$this->Html->link('[voltar]', array('action' => 'admin_types'), array('class' => 'voltar'))?>
				</div>
				<div style="padding: 5px; font-family: verdana; font-size: 12px;padding-left: 50%;" id="menu_ferramenta">
					<div id="barra" style="margin-left: -443px;"></div>
				</div>
			</div>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" text-align: center;margin-top: 100px;">
				<tbody>
					<tr>
						<td>
							<table width="600" align='center' style="font-size: 14px;font-family: Calibri, Regular;margin-top: 50px;" class="editable_">

<?php ################################################################################ ?>







<?php ################################################################################ ?>

								<?=$html;?>
							</table>

						</td>
					</tr>
				</tbody>
			</table> <!-- <<< editable -->

			<br />
			<br />
			<br />
			<br />
			<br />
			<div style="background-color: #9ACB22; color: #fff; z-index: 9999; position: fixed; bottom: 0px;  width:100%; ">
				<div style="font-family: verdana; font-size: 12px;padding-left: 50%;" id="menu_ferramenta">
					<div id="barra" style="margin-left: -321px;"></div>
				</div>


				<div align='center' style="padding: 10px; /*background-color: #FFD700;*/ font-family: verdana; font-size: 14px; color: #949494;">
					<?=$this->Form->input('titulo', array(
														'label' => false,
														'placeholder' => 'Escolha o Titulo',
														'div' => true,
														));
							?>
					<?//$this->Form->end('Salvar', array('div' => '',));?>
					<?=$this->Form->input('Salvar', array(
														'label' => false,
														'div' => '',
														'type' => 'submit',
														));?>
				</div>


			</div>
			<?php
		echo $this->Form->end();
		?>


	</body>

</html>
