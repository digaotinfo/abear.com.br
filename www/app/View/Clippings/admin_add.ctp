<div class="content" style="padding-left:80px">
	<h3>Clipping</h3>
	<div class="add-form-wrap">
		<?php 
		echo $this->Form->create($model, array('type' => 'file'));
			
				echo $this->Form->input(
			    	'data',
			    	array('type' => 'date')
				);
			?>
			
			<?php
			echo $this->Form->input('titulo_ptbr');
			echo $this->Form->input('titulo_eng');
			echo $this->Form->input('titulo_esp');
			
			echo $this->Form->input('texto_ptbr');
			echo $this->Form->input('texto_eng');
			echo $this->Form->input('texto_esp');


			echo $this->Form->input('ativo', array(
												'default' => 1
											));
			

		echo $this->Form->end('Enviar'); 
		?>
	</div>
</div>