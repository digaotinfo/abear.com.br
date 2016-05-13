<!-- <pre> -->
	<?php
//var_dump($registros);
// print_r($registros);
?>
<!-- </pre> -->


<div id="content" style="padding-left:80px">
	<div class="galeriaImagenCapas index">
	<h2>Como Voa o Brasil Galeria</h2>

	<table cellpadding="0" cellspacing="0">


		<tbody>
			<tr>
				<th><a href="/abear.com.br/www/admin/GaleriaImagenCapas/index/sort:ID/direction:asc">ID</a></th>
				<th><a href="/abear.com.br/www/admin/GaleriaImagenCapas/index/sort:Titulo%20em%20Portugu%C3%AAs/direction:asc">Titulo Em Português</a></th>
				<th><a href="/abear.com.br/www/admin/GaleriaImagenCapas/index/sort:Imagem/direction:asc">Imagem</a></th>
				<th>Acoes</th>
			</tr>

			<?php
			foreach ($registros as $r) {
				?>
				<tr>
					<td><?php echo $r["GaleriaImagenCapa"]["id"];?></td>
					<td><?php echo $r["GaleriaImagenCapa"]["titulo_ptbr"];?></td>
					<td><img src="<?php echo $this->webroot.$r["GaleriaImagenCapa"]["img_file"];?>" alt=""></td>
					<td class="actions">
						<a href=' <?=$this->Html->url(array(	 	
												'action' => 'admin_edit', $r[$model]['id']
												)
										);
									?>' class='radius button action bt_e'>
										Editar
						</a>
						
						
						<?=$this->Form->postLink('Excluir',
								array('action' => 'delete', $r[$model]['id']),
								array('confirm' => 'Tem certeza que deseja excluir este registro?', 'class' => 'radius button action bt_x')
						);
						?>
					</td>
				</tr>
				<?php
			}
			?>
			
		</tbody>
	</table>
	<p></p>
	<div class="paging">
		<span class="prev disabled">&lt; Anterior</span><span class="next disabled">Proximo &gt;</span>	</div>
	</div>

<!-- <div style="width:16%;float:left;height:500px;"> -->
<div style="float:left;height:500px;">
    <div class="actions">
        <h3>Açoes</h3>
        <ul>
            <li><a href="<?php echo $this->webroot;?>admin/voars/add/?galeria_categoria_id=2">Adicionar Como Voa o Brasil Galeria</a></li>

        </ul>
    </div>
    
</div>			
</div>