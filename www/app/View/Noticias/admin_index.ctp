<?php
// print_r($registros);
?>
<div id="conteudo_form">
		  <?=$this->element('/admin/filtro');?>

		<?php echo $this->Html->link('[Nova noticia]', array('action' => 'add')); ?>
		<br><br>
		<table>
			<tr>
				<th>Id</th>
				<th>Titulo em Português</th>
				<th>Categoria da Noticia</th>
				<th>Data de Publicação</th>
				<th>Ativo</th>
				<th>Destaque</th>
				
				<th>&nbsp;</th>
			</tr>
			
			<?php 
			$i = 0;
			foreach ($registros as $registro): 
			$i++;
				?>
				<tr>
					<td><?php echo $registro[$model]['id']; ?></td>
					<td>
						<?php
							$lang = '';
							if(!empty($registro[$model]['titulo_ptbr'])){
								$lang = 'ptbr';
							} 
							if(!empty($registro[$model]['titulo_eng'])){
								$lang = 'eng';
							} 
							if(!empty($registro[$model]['titulo_esp'])){
								$lang = 'esp';
							} 
							echo $registro[$model]['titulo_'.$lang]; 
							?>
						</td>
					<td><?php echo $registro['NoticiaCategoria']['nome_ptbr']; ?></td>
					<td>
						<?php
							if(!empty($registro[$model]['data_de_publicacao'])){
								// echo $registro[$model]['data_de_publicacao'];
								echo $this->Time->format('d/m/y H:i', $registro[$model]['data_de_publicacao']).'hs';
							}else{
								echo 'Não possui data.';
							}
						?>
					</td>
					<td>
						<?php 
							if($registro[$model]['ativo'] == 1){
								echo '✓';
							}
							?>
					</td>
					<td>
						<?php 
							if($registro[$model]['destaque'] == 1){
								echo '✓';
							}
							?>
					</td>
					<!-- <td><?php echo $registro[$model]['destaque'];?></td> -->
					<td>
						<?php 
							echo $this->Html->link('[alterar]', array('action' => 'edit', $registro[$model]['id']));
							
							echo $this->Form->postLink('[excluir]', 
															array('action' => 'delete', $registro[$model]['id']),
															array('confirm' => 'Tem certeza?')
														);
							?>
					</td>
					
				
				</tr>
				<tr>
					<td colspan="2">&nbsp</td>
					
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