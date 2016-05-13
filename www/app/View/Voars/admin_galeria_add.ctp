<div class="content" style="padding-left:80px">
	<h3>Adicionar Capa de Galeria Como Voar</h3>
	<div class="add-form-wrap">
		<?php 
		echo $this->Form->create($model, array('type' => 'file'));
			echo $this->Form->input('galeria_categoria_id', array(
				'type' => 'hidden',
				'value' => 2
				));
			echo $this->Form->input('titulo_ptbr');
			echo $this->Form->input('titulo_eng');
			echo $this->Form->input('titulo_esp');

			echo $this->Form->input('img_file', array(
				'type' => 'file',
				'acao' => 'add',
				'coluna_banco' => 'img_file',
				'label' => false,
				'required' => false,
				));

			echo $this->Form->input('descricao_ptbr', array(
				'type' => 'textarea'
				));

			echo $this->Form->input('descricao_eng', array(
				'type' => 'textarea'
				));

			echo $this->Form->input('descricao_esp', array(
				'type' => 'textarea'
				));

			echo $this->Form->input('texto_ptbr', array(
				'type' => 'textarea'
				));

			echo $this->Form->input('texto_eng', array(
				'type' => 'textarea'
				));

			echo $this->Form->input('texto_esp', array(
				'type' => 'textarea'
				));

			echo $this->Form->input('destaque', array(
				'type' => 'checkbox'
				));

			echo $this->Form->input('ativo', array(
				'type' => 'checkbox'
				));

			
			echo $this->Form->input(
			    'data',
			    array('type' => 'datetime')
			);

		echo $this->Form->end('Enviar'); 
		?>
	</div>
</div>