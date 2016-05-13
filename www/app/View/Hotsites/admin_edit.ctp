<div class="content" style="padding-left:80px">
	<h3>Editar Hot Sites</h3>
	<div class="add-form-wrap">
		<?php 
		echo $this->Form->create($model);
			
			echo $this->Form->input('premio_de_jornalismo_abear', array('value' => $registro[$model]['premio_de_jornalismo_abear']));
			echo $this->Form->input('agencia_abear', array('value' => $registro[$model]['agencia_abear']));

			echo $this->Form->input('clube_abear', array('value' => $registro[$model]['clube_abear']));

			echo $this->Form->input('tudo_para_voar_melhor', array('value' => $registro[$model]['tudo_para_voar_melhor']));

			echo $this->Form->input('transporte_de_orgaos', array('value' => $registro[$model]['transporte_de_orgaos']));

			echo $this->Form->input('asas_do_bem', array('value' => $registro[$model]['asas_do_bem']));

			echo $this->Form->input('aviacao_em_debate', array('value' => $registro[$model]['aviacao_em_debate']));

		
		echo $this->Form->end('Enviar'); 
		?>
	</div>
</div>