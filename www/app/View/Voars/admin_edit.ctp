<div class="content" style="padding-left:80px">
	<h3>Editar Capa de Galeria Como Voar</h3>
	<div class="add-form-wrap">
		<?php 
		echo $this->Form->create($model, array('type' => 'file'));
			echo $this->Form->input('galeria_categoria_id', array(
				'type' => 'hidden',
				'value' => 2
				));
			echo $this->Form->input('titulo_ptbr', array('value' => $registro[$model]['titulo_ptbr']));
			echo $this->Form->input('titulo_eng', array('value' => $registro[$model]['titulo_eng']));
			echo $this->Form->input('titulo_esp', array('value' => $registro[$model]['titulo_esp']));

			echo $this->Form->input('img_file', array(
				'type' => 'file',
				));
		
			echo $this->Html->image('../'.$registro[$model]['img_file'], array('class' => 'img'));

			echo $this->Form->input('descricao_ptbr', array(
				'type' => 'textarea',
				'value' => $registro[$model]['descricao_ptbr'],
				));

			echo $this->Form->input('descricao_eng', array(
				'type' => 'textarea',
				'value' => $registro[$model]['descricao_eng'],
				));

			echo $this->Form->input('descricao_esp', array(
				'type' => 'textarea',
				'value' => $registro[$model]['descricao_esp'],
				));

			echo $this->Form->input('texto_ptbr', array(
				'type' => 'textarea',
				'value' => $registro[$model]['texto_ptbr'],
				));

			echo $this->Form->input('texto_eng', array(
				'type' => 'textarea',
				'value' => $registro[$model]['texto_eng'],
				));

			echo $this->Form->input('texto_esp', array(
				'type' => 'textarea',
				'value' => $registro[$model]['texto_esp'],
				));

			$check = array(
				0 => '',
				1 => 'checked'
				);

			echo $this->Form->input('destaque', array(
				'type' => 'checkbox',
				$check[$registro[$model]['destaque']]
				));

			echo $this->Form->input('ativo', array(
				'type' => 'checkbox',
				$check[$registro[$model]['ativo']]
				));

			
			echo $this->Form->input(
			    'data',
			    array('type' => 'datetime')
			);

		echo $this->Form->end('Enviar'); 
		?>
	</div>
</div>