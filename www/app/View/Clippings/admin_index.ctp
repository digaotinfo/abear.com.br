<?php
// print_r($registros);
?>
<div id="conteudo_form">
		<?php echo $this->Html->link('[Nova Clipping]', array('action' => 'add')); ?>
		<br><br>
		<table>
			<tr>
				<th>Id</th>
				<th>Titulo em Português</th>
				<th>Ativo</th>

				<th>&nbsp;</th>
			</tr>

			<?php
			$i = 0;
			foreach ($registros as $registro):
			$i++;
				?>
				<tr>
					<td><?php echo $registro[$model]['id']; ?></td>
					<td><?php echo $registro[$model]['titulo_ptbr']; ?></td>
					<td>
						<?php
							if($registro[$model]['ativo'] == 1){
								echo '✓';
							}
							?>
					</td>

					<td>
						<?php
							echo $this->Html->link('[alterar]', array('action' => 'edit', $registro[$model]['id']));
							echo $this->Form->postLink('[excluir]',
															array("controller" => "Clippings", 'action' => 'admin_delete', $registro[$model]['id']),
															array('confirm' => 'Tem certeza?')
														);
							?>
					</td>


				</tr>


				<?php
			endforeach;
			?>
		</table>

		<?=$this->Paginator->numbers();?>

	</div>

<script>
	$('.bt_hide').click(function(){
		if($(this).hasClass('on')){
			$('.filter_form').hide();
			$(this).removeClass('on');
		}else{
			$('.filter_form').show();
			$(this).addClass('on');
		}
	});
</script>