<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<style>
	div.clear{
		padding: 20px;
	}
	.hide{
		display: none !important;
	}
</style>


<div class="content" style="padding-left:80px">
	<h3>Editar Hot Sites</h3>

	<div class="add-form-wrap ptbr">
		<?php 
		echo $this->Form->create($model);
			
			echo $this->Form->input('premio_de_jornalismo_abear_titulo_ptbr', array('value' => $registro[$model]['premio_de_jornalismo_abear_titulo_ptbr']));
			echo $this->Form->input('premio_de_jornalismo_abear_titulo_eng', array('value' => $registro[$model]['premio_de_jornalismo_abear_titulo_eng']));
			echo $this->Form->input('premio_de_jornalismo_abear_titulo_esp', array('value' => $registro[$model]['premio_de_jornalismo_abear_titulo_esp']));
			echo $this->Form->input('premio_de_jornalismo_abear', array('value' => $registro[$model]['premio_de_jornalismo_abear']));
			echo "<div class='clear'></div>";	
		
			echo $this->Form->input('agencia_abear_titulo_ptbr', array('value' => $registro[$model]['agencia_abear_titulo_ptbr']));
			echo $this->Form->input('agencia_abear_titulo_eng', array('value' => $registro[$model]['agencia_abear_titulo_eng']));
			echo $this->Form->input('agencia_abear_titulo_esp', array('value' => $registro[$model]['agencia_abear_titulo_esp']));
			echo $this->Form->input('agencia_abear', array('value' => $registro[$model]['agencia_abear']));
			echo "<div class='clear'></div>";	

	
			echo $this->Form->input('clube_abear_titulo_ptbr', array('value' => $registro[$model]['clube_abear_titulo_ptbr']));
			echo $this->Form->input('clube_abear_titulo_eng', array('value' => $registro[$model]['clube_abear_titulo_eng']));
			echo $this->Form->input('clube_abear_titulo_esp', array('value' => $registro[$model]['clube_abear_titulo_esp']));
			echo $this->Form->input('clube_abear', array('value' => $registro[$model]['clube_abear']));
			echo "<div class='clear'></div>";	
			

			echo $this->Form->input('tudo_para_voar_melhor_titulo_ptbr', array('value' => $registro[$model]['tudo_para_voar_melhor_titulo_ptbr']));
			echo $this->Form->input('tudo_para_voar_melhor_titulo_eng', array('value' => $registro[$model]['tudo_para_voar_melhor_titulo_eng']));
			echo $this->Form->input('tudo_para_voar_melhor_titulo_esp', array('value' => $registro[$model]['tudo_para_voar_melhor_titulo_esp']));
			echo $this->Form->input('tudo_para_voar_melhor', array('value' => $registro[$model]['tudo_para_voar_melhor']));
			echo "<div class='clear'></div>";	
			

			echo $this->Form->input('transporte_de_orgaos_titulo_ptbr', array('value' => $registro[$model]['transporte_de_orgaos_titulo_ptbr']));
			echo $this->Form->input('transporte_de_orgaos_titulo_eng', array('value' => $registro[$model]['transporte_de_orgaos_titulo_eng']));
			echo $this->Form->input('transporte_de_orgaos_titulo_esp', array('value' => $registro[$model]['transporte_de_orgaos_titulo_esp']));
			echo $this->Form->input('transporte_de_orgaos', array('value' => $registro[$model]['transporte_de_orgaos']));
			echo "<div class='clear'></div>";	

			echo $this->Form->input('asas_do_bem_titulo_ptbr', array('value' => $registro[$model]['asas_do_bem_titulo_ptbr']));
			echo $this->Form->input('asas_do_bem_titulo_eng', array('value' => $registro[$model]['asas_do_bem_titulo_eng']));
			echo $this->Form->input('asas_do_bem_titulo_esp', array('value' => $registro[$model]['asas_do_bem_titulo_esp']));
			echo $this->Form->input('asas_do_bem', array('value' => $registro[$model]['asas_do_bem']));
			echo "<div class='clear'></div>";	

			echo $this->Form->input('aviacao_em_debate_titulo_ptbr', array('value' => $registro[$model]['aviacao_em_debate_titulo_ptbr']));
			echo $this->Form->input('aviacao_em_debate_titulo_eng', array('value' => $registro[$model]['aviacao_em_debate_titulo_eng']));
			echo $this->Form->input('aviacao_em_debate_titulo_esp', array('value' => $registro[$model]['aviacao_em_debate_titulo_esp']));
			echo $this->Form->input('aviacao_em_debate', array('value' => $registro[$model]['aviacao_em_debate']));
			echo "<div class='clear'></div>";	

			echo $this->Form->input('quero_voar_titulo_ptbr', array('value' => $registro[$model]['quero_voar_titulo_ptbr']));
			echo $this->Form->input('quero_voar_titulo_eng', array('value' => $registro[$model]['quero_voar_titulo_eng']));
			echo $this->Form->input('quero_voar_titulo_esp', array('value' => $registro[$model]['quero_voar_titulo_esp']));
			echo $this->Form->input('quero_voar', array('value' => $registro[$model]['quero_voar']));
			echo "<div class='clear'></div>";

		
		echo $this->Form->end('Enviar'); 
		?>
	</div>
</div>