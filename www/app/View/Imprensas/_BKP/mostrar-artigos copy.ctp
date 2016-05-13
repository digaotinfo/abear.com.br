<?php
//print_r($registro);
?>
<div class='row news'>
	<div class='titulo_grande'>
		<div class='title'><p><?=$txtArtigo['TxtArtigo']['titulo_'.$lang]?></p></div>
		<div class='quad'></div>
	</div>
	<?=$this->element('intros')?>
	<div class='artigos'>

		<div class='left_'>

			<p><?=$txtArtigo['TxtArtigo']['texto_'.$lang]?></p>
		</div>
		<div class='right_'>
			<div class='artigo date'>
				<div class='top'><p><?=$this->Time->format('d/m/y', $registro[$model]['data']);?></p><div></div></div>
				<div class='title'><p><?=$registro[$model]['titulo_'.$lang]?></p></div>
				<div class='text'><p><?=$registro[$model]['texto_1_'.$lang]?></p></div>

                <?php
                	echo $this->element('galeria-fotos-eventos');
                ?>

				<div class='text'><p><?=$registro[$model]['texto_2_'.$lang]?></p></div>
				<div class='social_share'>
					<a href="<?= Router::url('', true) ?>" share-pj='facebook'><div></div></a>
					<a href="<?= Router::url('', true) ?>" share-pj='twitter'><div></div></a>
					<a href="<?= Router::url('', true) ?>" modal-pj='.modal_mail'><div></div></a>
					<a href="<?= Router::url('', true) ?>" share-pj='pinterest' share-pj-pinimg='IMG' share-pj-pindesc='DESC'><div></div></a>
					<a href="<?= Router::url('', true) ?>" share-pj='g-plus'><div></div></a>
				</div>
			</div>
			<div class='pagina_eventos'>
				<div class='hold'>
					<div>
						<?php
							$next_ = '';
							$prev_ = '';
							if(empty($neighbors['prev'][$model]['url_amigavel_'.$lang])){ $prev_ = 'desactive';}
							if(empty($neighbors['next'][$model]['url_amigavel_'.$lang])){ $next_ = 'desactive';}
						?>
	
						<a href="<?=$this->webroot.'news/'.$categoria.'/mostrar/'.$neighbors['next'][$model]['url_amigavel_'.$lang]?>" class='arrowL <?=$next_?>'>
							<div></div>
							<p><?=__d('default', 'anterior')?></p>
						</a>
	
						<div><p> | </p></div>
			
						<a href="<?=$this->webroot.'news/'.$categoria.'/mostrar/'.$neighbors['prev'][$model]['url_amigavel_'.$lang]?>" class='arrowR <?=$prev_?>'>
							<div></div>
							<p><?=__d('default', 'próximo')?></p>
						</a>
					</div>
				</div>
			</div>
	</div>
</div>
</div>
<div class='modal_mail'>
	<div class='title'><p><?=__d('default', 'Compartilhar por e-mail')?></p></div>
	
	<form id='share_mail_form'>
		<div class='remetente'>
			<input type='text' id='nameR' name='nameR' placeholder='<?=__d('default', 'Nome do Remetente')?>'>
			<input type='email' id='emailR' name='emailR' placeholder='<?=__d('default', 'Email do Remetente')?>'>
		</div>
		<div class='destinatario'>
			<input type='text' id='nameD' name='nameD' placeholder='<?=__d('default', 'Nome do Destinatário')?>'>
			<input type='email' id='emailD' name='emailD' placeholder='<?=__d('default', 'Email do Destinatário')?>'>
		</div>
		<div class='msg'>
			<textarea id='msg_mail' name='msg_mail'></textarea>
		</div>
		<button type='submit'><?=__d('default', 'Enviar')?></button>
	</form>

	<div class='loader' align='center'><?=$this->Html->image('/img/index/loader.gif')?></div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		$('[modal-pj]').click(function(){
			if($(this).attr('modal-pj') == '.modal_mail'){
				//console.log($(this).attr('href'));
				$('.modal_mail textarea').val($(this).attr('href'));
			}
		})
		$('.modal_mail button').click(function(e){
			e.preventDefault();
			$(this).parent().hide(0);
			$(this).parent().parent().find('.loader').show(10);
			$.post( (webroot) + "compartilhar/email/", $( "#share_mail_form" ).serialize(), function(data){
 				console.log(data); 
 				//console.log($( "#share_mail_form" ).serialize()); 
				//console.log((webroot) + "compartilhar/email/");
				if (data == 'true') {
					// $('#form_contato').find('input, textarea').val('');
				 //    $('#form_contato').find('input[type="radio"], input[type="checkbox"]').prop('checked', false);
					$(this).parent().show(10);
					$(this).parent().parent().find('.loader').hide(0);
					$('.modal_mail').trigger('closeModal');
				    alert('Formulario enviado!');
				} else {
					alert('Seu e-mail não pode ser enviado. Tente novamente mais tarde');
				}
				// $('.contato #form_holder').css('height', 'auto');
				// $('.contato #form_holder form').css('display', 'block');
				// $('.contato #form_holder .loader').css('display', 'none');
			    
			});
		});
	});
</script>