<?php 
$this->start('script');

	//echo $this->Html->script('../');
	$mySO = $_SERVER["HTTP_USER_AGENT"];
	$nameSO   = 'Mac';
	$nameMySO = strpos($mySO, $nameSO);
	
	$comando_para_copiar = '';
	if($nameMySO > 0){
		$comando_para_copiar = '<kbd>COMMAND</kbd> + <kbd>C</kbd>';
	}else{
		$comando_para_copiar = '<kbd>CTRL</kbd> + <kbd>C</kbd>';
	}

	?>
		<!-- >>> fancybox -->
		<script type="text/javascript">
			$(document).ready(function() {
					$('a.fancybox').on('click', function () {
					    var idCopy = $(this).attr('rel');
					    $.fancybox({
							autoSize: true,
							autoHeight: true,
							autoWidth: true,
							fitToView: true,
							padding: 20,
							title: 'Pressione <?=$comando_para_copiar?> para copiar o código fonte acima.',
							content: '<textarea class="exibir-codigofonte">'+ $('.html-'+idCopy).val()+'</textarea>',
							close  : [27],
							afterShow: function() {
								$('.exibir-codigofonte').focus();
								$('.exibir-codigofonte').select();
							}

						});	
					    $(document).keyup(function(e) {
							if (e.keyCode == 27) { //Escape button
								$.fancybox.close();
							}
						});
				});
				 $("a.iframe").fancybox({
			        type: 'iframe',
			        title: 'OBS: Para melhor funcionamento da Newsletter, favor não utilizar a URL da mesma.'
			    });
			});
		</script>
		<!-- <<< fancybox -->

	<?php 
$this->end();


$this->start('css');
	?>
	<style type="text/css">
		textarea.exibir-codigofonte {
			width:700px; 
			height:400px;
			font-size: 10px;
		}
		.form-busca {
			width: 100%;
			float: left;
			display: none;
		}

		.form-busca small.alert {
			display: none;
		}

		.form-busca div {
			float: left;
			clear: none !important;
		}
		.form-busca .input {
			width: 70%;
		}
		.form-busca .submit {
			width: 20%;
		}
		.form-busca .submit input {
			/*height: 49px;*/
		}
	</style>
	<?php
$this->end();
?>

<!-- <a href="http://jsfiddle.net/user/login/" class="iframe">Click me!</a> -->
	<h1>Newsletters</h1>
	<div class="form-busca">
		<?php
		echo $this->Form->create($model);
		echo $this->Form->input('busca', array(
											'placeholder' => 'Busque a newsletter pela palavra chave',
											'label' => '',
										));
		echo $this->Form->end('Buscar', array(
											'div' => '',
										));
		?>
	</div>

	<div id="conteudo_form">

		<?php echo $this->Html->link('[Nova newsletter]', array('action' => 'types', 'admin' => true)); ?>
		<br><br>

		<table>
			<tr>
				<!-- <th>Id</th> -->
				<th>Titulo</th>
				<th>Criado em</th>
				<th>Ação</th>
			</tr>
	   
			<?php 
			foreach ($registros as $registro): 
				?>
				<tr>
					<td><?php echo $registro[$model]['titulo']; ?>
					</td> 
					<td><?php echo $this->Time->format($registro[$model]['created'], '%d/%m/%Y', 'invalid'); ?></td> 
					<td>
						<a class="iframe" href="<?=$this->webroot.$registro[$model]['url_arquivo_html']?>"  rel="<?=$registro[$model]['id']?>">
							[preview]
						</a>
						<?php
						echo $this->Html->Link('[editar]', array(
																'action' 	=> 'edit',
																'admin'		=> true,
																$registro[$model]['id']
																));

						echo $this->Form->postLink('[apagar]', array(
																	'action' 	=> 'delete',
																	'admin'		=> true,
																	$registro[$model]['id']
																	),
																array(
																	'confirm' => 'Deseja excluir?'
																	));

						?>
						
						<br>
						<br>
						<a href="javascript:void(0)" class="fancybox" rel="<?=$registro[$model]['id']?>">
							<p id="remove">[mostrar codigo fonte]</p>
							
							<textarea class="html-<?=$registro[$model]['id']?>" style="display: none;">
<?php
							$code = '<html>
										<head>
											<title>'.$registro[$model]["titulo"].'</title>
										</head>

										<body>
											<table width="600" align="center" style="font-size: 14px;font-family: Calibri;" cellpadding="0" cellspacing="0">
													'. $registro[$model]["html"] .'
												</table>
											</body>

										</html>
									';
							$html = preg_replace('~>\s+<~', '><', $code);
							echo $html;

?>
								
							</textarea>
							
						</a>
					</td>
				</tr>
				<?php 
			endforeach; 
			?>
		</table>
		
		<?=$this->Paginator->numbers();?>

	</div>

