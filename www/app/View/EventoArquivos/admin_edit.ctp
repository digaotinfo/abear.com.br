<?php
// print_r($eventoArquivo);

?>
<div class="content" style="padding-left:80px">
	<h3>Editar Evento Arquivo</h3>
	<div class="add-form-wrap">
		<?php 
		echo $this->Form->create($model, array('type' => 'file'));

			echo $this->Form->input('id', array('type' => 'hidden'));
			

			echo $this->Form->input(
			    'data_de_publicacao',
			    array('type' => 'datetime')
			);
			// echo $this->Form->input(
			//     'evento_id',
			//     array('type' => 'select')
			// );

			?>
			<div class="input select">
				<label for="EventoArquivoEventoId">Evento</label>
				<select name="data[EventoArquivo][evento_id]" id="EventoArquivoEventoId">


					<?php 
					foreach($eventoList as $evento):
						$nome_do_option = '';
						if(!empty($evento['Evento']['titulo_ptbr'])){
							$nome_do_option = $evento['Evento']['titulo_ptbr'];
							
						}else{
							if(!empty($evento['Evento']['titulo_eng'])){
								$nome_do_option = $evento['Evento']['titulo_eng'];

							} else {
								$nome_do_option = $evento['Evento']['titulo_esp'];
							}
						}

						?>
						<option value="<?=$evento['Evento']['id']?>" <?php
																	if ($this->request->data[$model]['evento_id'] == $evento['Evento']['id']) {
																		echo "selected";
																	}
																	?>><?=$nome_do_option?></option>
						<?php
					endforeach;
					?>
				</select>
			</div>
			<?php
			echo $this->Form->input('nome_curto_do_arquivo_ptbr');
			echo $this->Form->input('nome_curto_do_arquivo_eng');
			echo $this->Form->input('nome_curto_do_arquivo_esp');

			echo "<br>";
			if(!empty( $eventoArquivo[$model]['arquivo_ptbr_file'] )){
				echo $eventoArquivo[$model]['arquivo_ptbr_file'];
			}
			echo $this->Form->input('arquivo_ptbr_file', array(
				'type' => 'file',
				'acao' => 'edit',
				'coluna_banco' => 'arquivo_ptbr_file',
				'label' => 'Arquivo PTBR',
				'required' => false,
				));
			
			if(!empty($eventoArquivo[$model]['arquivo_eng_file'])){
				echo $eventoArquivo[$model]['arquivo_eng_file'];
			}
			echo $this->Form->input('arquivo_eng_file', array(
				'type' => 'file',
				'acao' => 'edit',
				'coluna_banco' => 'arquivo_eng_file',
				'label' => 'Arquivo ENG',
				'required' => false,
				));



			if(!empty($eventoArquivo[$model]['arquivo_esp_file'])){
				echo $eventoArquivo[$model]['arquivo_esp_file'];
			}
			echo $this->Form->input('arquivo_esp_file', array(
				'type' => 'file',
				'acao' => 'edit',
				'coluna_banco' => 'arquivo_esp_file',
				'label' => 'Arquivo ESP',
				'required' => false,
				));

			
			echo $this->Form->input('ordem');

			
			

		echo $this->Form->end('Enviar'); 
		?>
	</div>
</div>