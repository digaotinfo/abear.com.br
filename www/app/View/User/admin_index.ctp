<?php
	echo $this->element('admin_menu', array("onde" => $menu_ativo));
?>
	<h1>Usuários</h1>
	<div id="conteudo_form" style="position:relative; float:left; padding:10px; width:65%; background-color:#EAEAEA;">

        	<h1 style="padding:7px; margin-bottom:20px;">Usuários</h1>
			<?php echo $this->Html->link('Criar um novo Usuários', array('controller' => 'user', 'action' => 'add')); ?>

        <?php
           //print_r($roleAlias);
        ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Usuários</th>
                <th>Email</th>
                <th>Nível</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($users as $registro): ?>
                <tr>
                    <td><?php echo $registro['User']['id']; ?></td>
                    <td><?php echo $registro['User']['name']; ?></td>
                    <td><?php echo $registro['User']['username']; ?></td>
                    <td><?php echo $registro['User']['email']; ?></td>
                    <td><?php echo $registro['Role']['title']; ?></td>
                    <td>
						<?php
						echo $this->Html->link('[alterar]',
							array('controller' => 'user', 'action' => 'edit', $registro['User']['id'])
						); ?>
					</td>
				</tr>
            <?php endforeach; ?>
		</table>

    </div>
