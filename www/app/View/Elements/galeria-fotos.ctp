<?php
	//print_r($albuns);
// print_r($myurl[1]);
?>
	<div class="galeria_">
    	<?php
		if(count($albuns) > 1){
		?>            
            <div id="super-carousel" class="flexslider">
				<ul class="slides pad0-10">
					<?php
						foreach ($albuns as $imagens) {
					?>	
							<li >
						<a href="<?php 
										// echo $this->Html->url(
          //                                           array(
          //                                               'controller' => 'galeriaImagens', 
          //                                               'action' => 'galeria',
          //                                               'categoria' => $categoria,
          //                                               'url_amigavel' => $url_amigavel,
          //                                           	)
          //                                       );

										/////////////////////////////////////////////////////////////////////////////////////////////////////////
										////// FORMATO DA URL
										 echo $this->webroot.'galerias/'.$myurl[1].'/album/'.$imagens['GaleriaImagenCapa']['url_amigavel_'.$lang];
                                        ?>"
                                        
                                        >

                            <div class="tam" 
                            	diflu-titulo="<?=$imagens['GaleriaImagenCapa']['titulo_'.$lang]?>" 
                            	diflu-desc="<?=$imagens['GaleriaImagenCapa']['descricao_'.$lang]?>" 
                            	rel="<?=$this->webroot.$imagens['GaleriaImagenCapa']['img_th_hidden']?>" 
                            	style='background-image: url(<?='../'.$imagens['GaleriaImagenCapa']['img_file']?>);'
                            	>
                            </div>
						</a>
							</li>
					<?php
						}
					?>
				</ul>
			</div>
        <?php
		}else{
			echo $this->element('galeria-foto-unica');
		}
		?>
	</div>