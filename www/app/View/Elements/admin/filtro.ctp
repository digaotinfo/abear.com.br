<?php 
	// print_r($registros); 
	//print_r($conteudo);
	// print_r($is_on);
?>
<div class="">
	<div class="small-12 columns filter_wrap">
		<div class='titulo-grid generico_header'>
				
			<div class="filter_header">
				<h3>Filtro:</h3>
				<div class="bt_hide <?php echo $is_on;?>" data-toggle="" data-toggle-id="formulario_busca"></div>
			</div>
			
			<div id="formulario_busca" class="filter_form <?php echo $remove_hide;?>">
				<?php 
				
				/// FILTRO DE LISTA
				echo $this->Form->create('filtro')
					?>
					<div class='medium-6 small-12 columns'>
						<!--checkbox-->
						<?php    
							echo '<p style="color: #616161;">Selecione a(s) Categoria(s): </p>';
				          	echo $this->Form->select('NoticiaCategoria', $categoria_noticia, array(   
				                                                'id' => 'setor',
				                                                'multiple' => 'checkbox',
				                                                'class' => 'empresas'
				                                            ));
				        
						//<!-- end checkbox -->
						?>
					</div>
					
					<div class='medium-6 small-12 columns'>
						<div class='categoria'>
							<?php 
							
							?>
						</div>
					</div>
					
					<div class="small-12 columns">
						<?php
						echo $this->Form->input('busca', array(
																'label' => false,
																'placeholder' => 'Digite aqui o texto que deseja buscar'
															));	
						?>
					</div>
					
					<div class='small-2 columns end'>
						<?php 								
						echo $this->Form->input('Filtrar', array(
																'label' => false,
																'type' => 'submit',
																//'id'    => 'escolha_conteudo_generico',
																'class' => 'radius button thirdary tiny expand'
															));											
						?>
						
					</div>
					<?php
				echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
</div>
<style type="text/css">

</style>

<?php
$this->start('script');
?>
<!--
<script>
$(document).ready(function(){
$('#escolha_conteudo_generico').change(function(){
	//debugger
	//console.log($(this).val());
	
	//window.location = '<?=$this->Html->url(array('action' => 'index'))?>/index/'+ $(this).val();
	break;
	return false;
});
});
</script>
-->
<?php
$this->end();
?>