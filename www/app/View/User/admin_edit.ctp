<?php
	echo $this->element('admin_menu', array("onde" => $menu_ativo));
?>
	<h1>Editar Usuário</h1>
	<div id="conteudo_form" style="position:relative; float:left; padding:10px; width:65%; background-color:#EAEAEA;">
    	<div style="margin-bottom:15px;">
        	<h1 style="padding:7px; margin-bottom:20px;">Adicionar um registro</h1>
			<?php echo $this->Html->link('Voltar', array('controller' => 'user', 'action' => 'index')); ?>
        </div>
    	<div>
		<?php
                echo $this->Form->create('User');
				echo $this->Form->input('id', array('type' => 'hidden'));
				echo $this->Form->input('password', array('type' => 'hidden'));

                echo $this->Form->input('name', $options = array('label' => 'Nome'));
                echo $this->Form->input('username', $options = array('label' => 'Usário'));
                echo $this->Form->input('password', $options = array('label' => 'Senha'));
                echo $this->Form->input('email', $options = array('label' => 'E-mail'));

                //echo $this->Form->input('role', array(
                //    'options' => array('label' => 'NÃ­vel', 'admin' => 'Admin', 'author' => 'Author')
                //));

                echo $this->Form->input('role_id', array(
                     //'name' => 'data[User][role_id]',
                     'type' => 'select',
                     'options' => $rolesAll,
                     'selected' => $this->data['User']['role_id']
                ));
		echo '<p style="margin-top:70px;"></p>';

                echo $this->Form->end('Salvar');
			?>
        </div>
    </div>
