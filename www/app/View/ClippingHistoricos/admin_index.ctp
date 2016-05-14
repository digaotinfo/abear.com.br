<style>
	#log_form table td{
		padding: 10px 0;
	}
</style>
<div id="log_form">
	<h3>Histórico Clipping</h3>
		<br><br>
		<table>
			<tr>
				<th style="width: 130px;">Data</th>
				<th style="width: 150px;">Usuário</th>
				<th>Edição</th>
				<th style="width: 90px;">Tipo</th>
			</tr>

			<?php
			$i = 0;
			foreach ($registros as $registro):
			$i++;
				?>
				<tr>
					<td><?php echo $registro[0]['created']; ?></td>
					<td><?php echo $registro[$model]['name']; ?></td>
					<td><?php echo $registro[$model]['edicao']; ?></td>
					<td>
						<?php 
							if( $registro[$model]['acao'] == "I" ){
								echo "Criado";
							} 
							if( $registro[$model]['acao'] == "U" ){
								echo "Alterado";
							} 
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