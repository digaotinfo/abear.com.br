// <?php
// //print_r($imgs);
// //print_r($configuracao['Configuracao']);
// ?>

// <div class='row exp_de_voar'>
// 	<div class='titulo_grande'>
// 		<div class='title'><p><?=__d('default', 'Guia do Passageiro')?></p></div>
// 		<div class='quad'></div>
// 	</div>

// 	<?=$this->element('intros')?>
	
// 	<div class='passageiros'>
// 		<div class='element'>
// 			<div class='row'>

// 				<?php 
// 				$count = 1;
// 				$firstRow = true;
// 				foreach($imgs as $img):
// 					if($count == count($imgs)){
// 						?>
// 							<div class='small-3 columns mBT10 end'>
// 								<a href="#">
// 									<div class='icone'>
// 									<?=$this->Html->image('/'. $img[$model]['img_' .$lang. '_file'], array('rel' => $img[$model]['id']))?>
// 										<div class='ball'><p><?=$img[$model]['titulo_'.$lang]?></p></div>
// 										<div class='triangle'></div>
// 									</div>
// 								</a>
// 							</div>
// 						</div>
// 						<?php

// 						if(!$firstRow){
// 							?>
// 							<div class='row hide content'>
// 							<?php
// 						}else{
// 							?>
// 							<div class='row content'>
// 							<?php
// 						}
// 						?>	
// 							<div class='small-12 conteudo'>
// 								<div class='aqui_'>
// 									<div class='title'><p><?=$imgs[0][$model]['titulo_'.$lang]?></p></div>
// 									<div class='text'><p><?=$imgs[0][$model]['texto_'.$lang]?></p></div>
// 								</div>

// 							</div>
// 						</div>


// 						<?php
// 					}else if($count%4 == 0 && $count != 0){
// 						?>
// 								<div class='small-3 columns mBT10'>
// 									<a href="#">
// 										<div class='icone'>
// 										<?=$this->Html->image('/'. $img[$model]['img_' .$lang. '_file'], array('rel' => $img[$model]['id']))?>
// 											<div class='ball'><p><?=$img[$model]['titulo_'.$lang]?></p></div>
// 											<div class='triangle'></div>
// 										</div>
// 									</a>
// 								</div>
// 							</div>
// 							<?php
// 								if(!$firstRow){
// 									?>
// 									<div class='row hide content'>
// 									<?php
// 								}else{
// 									?>
// 									<div class='row content'>
// 									<?php
// 								}
// 							?>	
// 							<div class='small-12 conteudo'>
// 								<div class='aqui_'>
// 									<div class='title'><p><?=$imgs[0][$model]['titulo_'.$lang]?></p></div>
// 									<div class='text'><p><?=$imgs[0][$model]['texto_'.$lang]?></p></div>





// 									<?php
// 									/////
// 									//
// 									//	PRIMEIRA SESSÃO PRECISA APARECER A REDE SOCIAL
// 									//
// 									/////
// 									?>
// 									<div class='social_share'>
// 										<a href="<?= Router::url(array(
// 																		'controller' => 'voarExperiencias', 
// 																		'action' => 'urlcompartilhar',
// 																		$imgs[0][$model]['id']
// 																	), true) ?>" share-pj='facebook'><div></div></a>
// 										<a href="<?= Router::url(array(
// 																		'controller' => 'voarExperiencias', 
// 																		'action' => 'urlcompartilhar',
// 																		$imgs[0][$model]['id']
// 																	), true) ?>" share-pj='twitter'><div></div></a>
// 										<a href="<?= Router::url(array(
// 																		'controller' => 'voarExperiencias', 
// 																		'action' => 'urlcompartilhar',
// 																		$imgs[0][$model]['id']
// 																	), true) ?>" modal-pj='.modal_mail'><div></div></a>
// 										<a href="<?= Router::url(array(
// 																		'controller' => 'voarExperiencias', 
// 																		'action' => 'urlcompartilhar',
// 																		$imgs[0][$model]['id']
// 																	), true) ?>" share-pj='pinterest' share-pj-pinimg='<?=Router::url('/'.$imgs[0][$model]['img_' .$lang. '_file'], true)?>' share-pj-pindesc='<?=$imgs[0][$model]['titulo_'.$lang]?>'><div></div></a>
// 										<a href="<?= Router::url(array(
// 																		'controller' => 'voarExperiencias', 
// 																		'action' => 'urlcompartilhar',
// 																		$imgs[0][$model]['id']
// 																	), true) ?>" share-pj='g-plus'><div></div></a>
// 									</div>


// 								</div>




// 							</div>
// 						</div>
// 					</div>
// 					<div class='element'>
// 						<div class='row'>
// 							<?php 
// 							if($firstRow) $firstRow = false;
// 							}else{
// 								?>	
// 								<div class='small-3 columns mBT10'>
// 									<a href="#">
// 										<?php
// 										if($count == 1){
// 											?>
// 											<div class='icone active'>
// 											<?php
// 										}else{
// 											?>
// 											<div class='icone'>
// 											<?php
// 										}
// 										?>
// 											<?=$this->Html->image('/'. $img[$model]['img_' .$lang. '_file'], array('rel' => $img[$model]['id']))?>
// 											<div class='ball'><p><?=$img[$model]['titulo_'.$lang]?></p></div>
// 											<div class='triangle'></div>
// 										</div>
// 									</a>
// 								</div>



// 								<?php 
// 							}
// 							$count++;
// 				endforeach;
// 				?>
// 				</div>
// 			</div>
// </div>