<div id="content" style="padding-left:80px">
	
	<h2>Hot Sites</h2>
	<table>
		<tbody>
			<tr>
				<th>Hot Sites Ativos</th>
				<th>&nbsp;</th>
			</tr>
				<?php if(!empty($registro[$model]['premio_de_jornalismo_abear'])):?>
					<tr>
						<td><?=$registro[$model]['premio_de_jornalismo_abear_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['premio_de_jornalismo_abear']?></td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($registro[$model]['agencia_abear'])):?>
					<tr>
						<td><?=$registro[$model]['agencia_abear_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['agencia_abear']?></td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($registro[$model]['clube_abear'])):?>
					<tr>
						<td><?=$registro[$model]['clube_abear_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['clube_abear']?></td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($registro[$model]['tudo_para_voar_melhor'])):?>
					<tr>
						<td><?=$registro[$model]['tudo_para_voar_melhor_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['tudo_para_voar_melhor']?></td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($registro[$model]['transporte_de_orgaos'])):?>
					<tr>
						<td><?=$registro[$model]['transporte_de_orgaos_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['transporte_de_orgaos']?></td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($registro[$model]['asas_do_bem'])):?>
					<tr>
						<td><?=$registro[$model]['asas_do_bem_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['asas_do_bem']?></td>
					</tr>
				<?php endif; ?>


				<?php if(!empty($registro[$model]['aviacao_em_debate'])):?>
					<tr>
						<td><?=$registro[$model]['aviacao_em_debate_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['aviacao_em_debate']?></td>
					</tr>
				<?php endif; ?>


				<?php if(!empty($registro[$model]['quero_voar'])):?>
					<tr>
						<td><?=$registro[$model]['quero_voar_titulo_ptbr']?>: </td>
						<td><?=$registro[$model]['quero_voar']?></td>
					</tr>
				<?php endif; ?>
		
			
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<table>
		<tbody>
			<tr>
				<th>Hot Sites Inativos</th>
			</tr>
			<?php if(empty($registro[$model]['premio_de_jornalismo_abear'])):?>
					<tr>
						<td><?php echo $registro[$model]['premio_de_jornalismo_abear_titulo_ptbr']; ?> </td>
					</tr>
				<?php endif; ?>

				<?php if(empty($registro[$model]['agencia_abear'])):?>
					<tr>
						<td><?php echo $registro[$model]['agencia_abear_titulo_ptbr'];?> </td>
					</tr>
				<?php endif; ?>

				<?php if(empty($registro[$model]['clube_abear'])):?>
					<tr>
						<td><?php echo $registro[$model]['clube_abear_titulo_ptbr'];?> </td>
					</tr>
				<?php endif; ?>

				<?php if(empty($registro[$model]['tudo_para_voar_melhor'])):?>
					<tr>
						<td><?php echo $registro[$model]['tudo_para_voar_melhor_titulo_ptbr'];?> </td>
					</tr>
				<?php endif; ?>

				<?php if(empty($registro[$model]['transporte_de_orgaos'])):?>
					<tr>
						<td><?php echo $registro[$model]['transporte_de_orgaos_titulo_ptbr'];?> </td>
					</tr>
				<?php endif; ?>

				<?php if(empty($registro[$model]['asas_do_bem'])):?>
					<tr>
						<td><?php echo $registro[$model]['asas_do_bem_titulo_ptbr'];?> </td>
					</tr>
				<?php endif; ?>


				<?php if(empty($registro[$model]['aviacao_em_debate'])):?>
					<tr>
						<td><?php echo $registro[$model]['aviacao_em_debate_titulo_ptbr'];?></td>
					</tr>
				<?php endif; ?>


				<?php if(empty($registro[$model]['quero_voar'])):?>
					<tr>
						<td><?php echo $registro[$model]['quero_voar_titulo_ptbr'];?></td>
					</tr>
				<?php endif; ?>
		</tbody>
	</table>
	<p></p>
	<br>
	<br>

<div style="float:left;height:500px;">
    <div class="actions">
        <h3>Açoes</h3>
        <ul>
            <li><a href="<?=$this->Html->url(array('action' => 'edit', 'admin' => true, $registro[$model]['id']))?>">Alterar Hot Sites</a></li>

        </ul>
    </div>
    
</div>			
