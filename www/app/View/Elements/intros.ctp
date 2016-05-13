<?php
//Model: Intro
//print_r($intro);
?>
<?php if(!empty($intro['Intro'])): ?>
	<div class='text_intro'>



	<p><?=$intro['Intro']['texto_'.$lang]?></p>


	</div>
<?php endif; ?>