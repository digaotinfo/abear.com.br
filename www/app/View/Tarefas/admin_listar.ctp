<?= $this->element('admin_menu');?>


<div style='position:relative; float:left; width: 80%;'>
	<h2>Lista de Tarefas</h2>
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	  <td colspan='6' align='right'>
	    <?=$this->Html->link('Adicionar Registro', 'add/')?>
	  </td>
	</tr>
	<tr bgcolor="#F0F0F0">
	    <th>Autor</th>
	    <th>Data Inicio</th>
	    <th>Data Fim</th>
	    <th>Tarefa</th>
	    <th>Status</th>
	    <th>Operações</th>
	</tr>

<!--date('d/m/Y H:i', strToTime($tarefa['Tarefa']['data_inicio']))-->

	<?php foreach($tarefas as $tarefa) : ?>
	    <tr>
	    <td><?=$tarefa['Tarefa']['autor']?></td>
	    <td><?=date('d/m/Y H:i', strToTime($tarefa['Tarefa']['data_fim']));?></td>
	    <td><?=date('d/m/Y H:i', strToTime($tarefa['Tarefa']['data_fim']))?></td>
	    <td><?=$tarefa['Tarefa']['tarefa']?></td>
	    <td><?=$tarefa['Tarefa']['status']?></td>
	    <td>
	        <?=$this->Html->link('Visualizar', 'view/'.$tarefa['Tarefa']['id'])?>
	        <?=$this->Html->link('Editar', 'edit/'.$tarefa['Tarefa']['id'])?>
	        <?=$this->Form->postlink('Deletar', 
											array('action' => 'delete', $tarefa['Tarefa']['id']),
											array('confirm' => 'Tem certeza que deseja excluir este registro?')); ?>
	    </td>
	</tr>
	<?php endforeach; ?>
	</table>
	
	<div id="paginacaoAdmin"><?=$paginacao;?></div>
</div>