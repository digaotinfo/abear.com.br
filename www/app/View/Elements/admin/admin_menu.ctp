<?php
	echo ''
?>
<div id='menuAdmin' style="" class="transparent">
	<div class='menuBorder' style='margin-bottom: 15px;'></div>
	<div id="clickOpenMenu">>></div>
	<div id="clickOpenMenu" style="width: 81%; margin-top: -8px;">
		<?= $this->Html->link('[SAIR]', array('controller' => 'user','action' => 'logout')); ?>
	</div>

	<ul style="margin-left: 35px;">
		<li><?= $this->Html->link('Usuários Admin', array('controller' => 'user')); ?></li>
		<li><?= $this->Html->link('Painel - Home', array('controller' => 'index')); ?></li>
		<li><?= $this->Html->link('Categoria de Galeria', array('controller' => 'galeriaCategorias')); ?>
			 <ul style="margin-top: 7px;">
				<li><?= $this->Html->link('Capa de Album', array('controller' => 'GaleriaImagenCapas')); ?>
					<ul style="margin-top: 7px;">
						<li><?= $this->Html->link('Imagens', array('controller' => 'GaleriaImagens')); ?></li>
					</ul>

				</li>
			</ul>
		<li><?= $this->Html->link('Categoria de Videos', array('controller' => 'videoCategorias')); ?>
			 <ul style="margin-top: 7px;">
				<li><?= $this->Html->link('Videos', array('controller' => 'videos')); ?>

				</li>
			</ul>
		</li>
		<li><?= $this->Html->link('Categoria de Introduções', array('controller' => 'introCategorias')); ?>
			 <ul style="margin-top: 7px;">
				<li><?= $this->Html->link('Introduções', array('controller' => 'intros')); ?>

				</li>
			</ul>
		</li>
		</li>

		<!-- HOME -->
		<li><?= $this->Html->link('Banners', array('controller' => 'banners', 'action' => 'index', 'admin' => true)); ?></li>
		<li><?= $this->Html->link('Descrição Home', array('controller' => 'descricaoHomes', 'action' => 'index', 'admin' => true)); ?></li>
		<!-- /HOME -->

		<!-- CONHEÇA -->
		<li><?='Conheça'?>
            <ul style="margin-top: 7px;">
            	<li><?= $this->Html->link('A Abear', array('controller' => 'abears')); ?>
	            	<ul style="margin-top: 7px;"><li><?= $this->Html->link('Logos de Roda-Pé', array('controller' => 'logos', 'action' => 'index', 'admin' => true)); ?></li></ul>
	            </li>
				<li><?= $this->Html->link('Estrutura da Entidade Conselho', array('controller' => 'estruturas')); ?>
					<ul style="margin-top: 7px;">
						<li><?= $this->Html->link('Texto Lateral Conselho Deliberativo', array('controller' => 'descricaoConselhos', 'action' => 'index')); ?></li>
						<li><?= $this->Html->link('Texto Lateral Diretoria', array('controller' => 'descricaoDiretorias', 'action' => 'index')); ?></li>
						<li><?= $this->Html->link('Diretores', array('controller' => 'diretors', 'action' => 'index')); ?></li>
						<li><?= $this->Html->link('Comitê', array('controller' => 'comites', 'action' => 'index')); ?></li>
						<li><?= $this->Html->link('Estatuto', array('controller' => 'estatutos', 'action' => 'index')); ?></li>
					</ul>

                <li><?= $this->Html->link('Fundadores', array('controller' => 'fundadors', 'action' => 'index')); ?>
                	<ul style="margin-top: 7px;">
                		<li><?= $this->Html->link('Categoria de Fundadores', array('controller' => 'fundadorCategorias', 'action' => 'index')); ?></li>
                	</ul>
                </li>
                <li><?= $this->Html->link('Código de Ética', array('controller' => 'Eticas', 'action' => 'index')); ?></li>
                <li><?= $this->Html->link('Setor Aéreo', array('controller' => 'setoraereos', 'action' => 'index')); ?></li>
            </ul>
        </li>
        <!-- END CONHEÇA -->

        <!-- Eventos -->
        <li><?='AGENDA/EVENTOS'?>
        	<ul style="margin-top: 7px;">
	           <li><?= $this->Html->link('Agenda', array('controller' => 'agendas', 'action' => 'index', 'admin' => true)); ?></li>
	           <li>
	           		<?= $this->Html->link('Eventos', array('controller' => 'eventos', 'action' => 'index')); ?>
	           		<ul>
	           			<li>
	           				<?= $this->Html->link('Arquivos de Eventos', array('controller' => 'eventoArquivos', 'action' => 'index')); ?>
	           			</li>
	           			<li>
	           				<?= $this->Html->link('Vídeos de Eventos', array('controller' => 'eventoVideos', 'action' => 'index')); ?>
	           			</li>
	           		</ul>
	           </li>
	           <li><?= $this->Html->link('Por Dentro da Aviação Texto', array('controller' => 'aviacaos', 'action' => 'index')); ?>
	           		<ul style="margin-top: 7px; display: none;">
	           			<li><?= $this->Html->link('Videos Dentro da Aviação', array('controller' => 'aviacaoVideos', 'action' => 'index')); ?></li>
	           		</ul>
	           </li>
	           <li><?= $this->Html->link('Como Voa o Brasil Texto', array('controller' => 'voars', 'action' => 'index')); ?>
	           		<ul>
	           			<li><?= $this->Html->link('Como Voa o Brasil Galeria', array('controller' => 'voars', 'action' => 'admin_galeria_list')); ?></li>
	           		</ul>
	           		</li>
			</ul>
        </li>
        <!-- END Programas e Eventos -->

         <!-- Notas e Releases -->
         <li><?='IMPRENSA'?>
         	<ul style="margin-top: 7px;">
		        <li><?= $this->Html->link('Categoria de Noticias', array('controller' => 'noticiaCategorias', 'action' => 'index')); ?>
		         	<ul style="margin-top: 7px;">
		         		<li><?= $this->Html->link('Noticias', array('controller' => 'noticias', 'action' => 'index')); ?>
			         		<ul style="margin-top: 7px;">
			         			<li><?= $this->Html->link('Radio', array('controller' => 'radios', 'action' => 'index')); ?></li>
			         			<li><?= $this->Html->link('Notas e Release Texto', array('controller' => 'notaReleases', 'action' => 'index')); ?></li>
			         			<li><?= $this->Html->link('Artigos Descrição Lateral', array('controller' => 'txtArtigos', 'action' => 'index')); ?></li>
			         			<li><?= $this->Html->link('Clipping', array('controller' => 'clippings', 'action' => 'index')); ?></li>
			         		</ul>
		         		</li>
		         	</ul>
		        </li>
		     </ul>
	     </li>
         <!-- END NEWS -->

         <!-- DADOS E FATOS -->
         <li><?='Dados e Fatos'?>
         	<ul style="margin-top: 7px;">
         		<li><?= $this->Html->link('Dados e Fatos Tipo', array('controller' => 'Dadosefatotipos', 'action' => 'index')); ?></li>
         		<li><?= $this->Html->link('Dados e Fatos', array('controller' => 'dadoseFatos', 'action' => 'index')); ?></li>
         		<li><?= $this->Html->link('Dados e Fatos Arquivos', array('controller' => 'Dadosefatoarquivos', 'action' => 'index')); ?></li>
         	</ul>
         </li>
         <!-- END DADOS E FATOS -->

         <!-- EXPERIÊNCIA DE VOAR -->
     		<li><?= 'Experiência de Voar'; ?>
     			<ul style="margin-top: 7px;">
     				<li><?= $this->Html->link('Guia do Passageiro', array('controller' => 'guiaPassageiros', 'action' => 'index')); ?></li>
     			</ul>
     		</li>

         		</li>
		           <li><?='CAMPANHAS'?>
		           		<ul style="margin-top: 7px;">
		           			<li><?='Voar Por Mais Brasil'?>
		           				<ul style="margin-top: 7px;">
						           <li><?= $this->Html->link('Texto e Logo Lateral', array('controller' => 'voarMaisBrasils', 'action' => 'index')); ?></li>
						           <li><?= $this->Html->link('Midias', array('controller' => 'voarMaisBrasilMidias', 'action' => 'index')); ?></li>
						       </ul>
					        </li>

				           <li><?= $this->Html->link('Nas Aéronaves', array('controller' => 'nasAeronaves')); ?>
				           		<ul style="margin-top: 7px;">
				     				<li><?= $this->Html->link('Titulo Nas Aéronaves', array('controller' => 'nasAeronavesTitulos')); ?></li>
				     			</ul>
				           </li>

						    <li style='display: none'><?='Transporte de Orgãos'?>
							    <ul>
							     	<li><?= $this->Html->link('Imagem e Texto', array('controller' => 'TransporteOrgaos')); ?></li>
							    </ul>
						    </li>
			           </ul>
	              </li>


         <!-- END EXPERIÊNCIA DE VOAR -->

         <!-- CONTATO -->
         <li><?= $this->Html->link('Contatos', array('controller' => 'contatos')); ?></li>
         <!-- END CONTATO -->

         <li><?= $this->Html->link('Links dos Hotsites e Sites Externos', array('controller' => 'hotsites')); ?></li>
         <li><?= $this->Html->link('Endereços', array('controller' => 'enderecos')); ?></li>

         <li><?= $this->Html->link('Newsletters', array('controller' => 'newslettersEditables', 'action' => 'admin_index')); ?>
         	<ul>
         		<li style="display: none;">
         			<?= $this->Html->link('Tipos de Newsletters', array('controller' => 'newslettersEditableTypes', 'action' => 'admin_index')); ?>
         		</li>
         	</ul>
         </li>



         <!-- CONFIGURAÇÃO -->
         <li style="display: none;"><?= $this->Html->link('Configurações', array('controller' => 'configuracoes')); ?></li>
		<div class='menuBorder' style='margin-top: 15px;'></div>

	</ul>
</div>

<script>
	var aberto = false;

	function abrirMenu() {
		aberto = true;
		$("#menuAdmin").stop().animate({
			marginLeft: '-64px',
		}, 300);

		$("#clickOpenMenu").html('<<&nbsp;&nbsp;&nbsp;');
	}

	function fecharMenu() {
		aberto = false;
		$("#menuAdmin").stop().animate({
			marginLeft: '-391px',
		}, 300);

		$("#clickOpenMenu").html('>>');
	}


	$(document).ready(function(e) {
		$("#menuAdmin").click(function(){
			/// Abrindo
			//----------------------------
			if (!aberto) {
				abrirMenu();

			/// Fechando
			//----------------------------
			} else {
				fecharMenu();

			}
			//----------------------------
		});





		$("#menuAdmin").mouseenter(function(){
			/// Abrindo
			//----------------------------
			abrirMenu();
			//----------------------------
		});

		$("#conteudo_form").mouseenter(function(){
			/// Abrindo
			//----------------------------
			fecharMenu();
			//----------------------------
		});

	});
</script>
