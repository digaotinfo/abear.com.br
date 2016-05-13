<?php

$this->start('css');
		//echo $this->Html->css('index');
$this->end();

$this->start('script');
		//echo $this->Html->script('cycle_destaques');
$this->end();

/*  print_r($cases); */
/* print_r($caseTxt); */
?>

<div class='case_holder'>
    <div class='title_case'>
        <h1><?=$caseTxt['PaginaTxt']['titulo']?></h1>
        <p><?=$caseTxt['PaginaTxt']['texto']?></p>
    </div>
    <div id="ins_line"></div>

    <ul id='case'>
        <?php
            if (!empty($cases)):
                foreach($cases as $registro):
        ?>
    
        <li id="case_1">
            <?php
                if (!empty($registro['Pagina']['img_1_file'])):
            ?>

            <?php		
                if (!empty($registro['Pagina']['titulo'])):
            ?>

            <div id="title">
                <p>
                    <?=$registro['Pagina']['titulo'];?>
                </p>

            </div>

                <?php
                    endif;
                ?>

                <!-- banner -->
                <div class="banner_holder">
                     <ul class="example-orbit" data-orbit data-options="next_class:ob_Next; prev_class:ob_Prev;timer:false;slide_number:false;">
            <?php
                if (!empty($registro)):
                
                    foreach($registro as $banner):
                        for($i=1; $i<=5; $i++){
                        ?>
	                        <li>
		                        <?=$this->Html->image('/'. $banner['img_'.$i.'_file'], array('alt' => ''))?>
	                        </li>
                        <?php
	                    }
                    endforeach;
                   
                endif;
            ?>

                       
                    </ul>
                </div>
                <!-- banner -->

                <?php endif; ?>

                <?php if (!empty($registro['Pagina']['texto'])):?>
                    <div id='txt'>
                        <p>
                           <?=$registro['Pagina']['texto']?>  
                        </p>           

                    </div>
                <?php endif;?>

                <div id="ins_line"></div>

                <?php 
                    endforeach;
                    endif;
                ?>
        </li>
    </ul>

    <div class="page_selector text-center">

        <?php 
               echo $this->Paginator->prev(
                                           'PÁGINA ANTERIOR',
                                           null,
                                           null,
                                           array('id' => 'last')
                                           );
               ?>
        <?php 
               echo $this->Paginator->numbers(array(
                                                   'separator' => '',
                                                   'currentTag' => 'a',
                                                   'tag' => 'div',
                                                   'class' => 'bt'
                                                       ));

      ?>
        <?php   
	           echo $this->Paginator->next(
	                                       'PRÓXIMA PÁGINA',
	                                       null,
	                                       null,
	                                       array('id' => 'next')
	                                       	);
       ?>
            
    </div>
</div>











