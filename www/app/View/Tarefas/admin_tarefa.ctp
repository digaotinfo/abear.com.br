<?php ?>
<?= $this->element('admin_menu');?>


<div style='position:relative; float:left; width: 80%;'>
	<?php
	
		foreach($tarefa as $registro) {
			
			if(count($tarefa) == 1) {
				echo $registro['Tarefa']['id'].'<br />';
				echo $registro['Tarefa']['autor'].'<br />';
				echo $registro['Tarefa']['tarefa'].'<br />';
				
				echo $this->element('sharrre_buttons', array('url' => $registro['Tarefa']['url_amigavel_ptbr'], 'sharrreId' => 'sharrre'.$registro['Tarefa']['id']));
			} else {
				?>
                <div style="float:left;width:100%;height:40px;margin-bottom:10px;display:block;">
					<div style="float:left;"><?=$registro['Tarefa']['autor']?></div>
					<?=$this->element('sharrre_buttons', array('url' => $registro['Tarefa']['url_amigavel_ptbr'], 'sharrreId' => 'sharrre'.$registro['Tarefa']['id']))?>
                </div>
                <?php
			}
		}
		
	?>
	
</div>