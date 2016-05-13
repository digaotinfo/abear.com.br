<?php /**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'zCake');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
			<title>
				<?php echo $cakeDescription ?>:
				<?php echo $title_for_layout; ?>
			</title>
		<?php
			echo $this->Html->meta('icon');

			//echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css');
			echo $this->Html->css('cake.generic');

			echo $this->Html->script('jquery_min');
			echo $this->Html->script('jquery-ui_min');

			//echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js');
			echo $this->Html->script('tinymce/tinymce.min.js');
			// >>> fancybox
			echo $this->Html->script(array(
										'/assets/fancybox/source/jquery.fancybox.js?v=2.1.5'
										));
			echo $this->Html->css('/assets/fancybox/source/jquery.fancybox.css?v=2.1.5');
			// <<< fancybox
		?>
		<script>
			var webroot = '<?= $this->webroot;?>';
		</script>
	</head>
	</script>

	<?php
	if($this->name != 'NewslettersEditables' ){
		?>
		<script type="text/javascript">
			$(document).ready(function() {
				tinymce.init({
					selector: "textarea",
					language : 'pt_BR',
					tools: "inserttable",
					plugins : ' advlist autolink link lists charmap preview table code',
				});
			})
		</script>
	<?php
	}
	?>
	<?php
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<body>
		<style type="text/css">
			#formGeneric{
				  width: 80%;
				  float: right;
				  margin-top: -67px;
			}
			#inputBusca{
				width: 84%;
				min-width: 60%;
				float: left;
			}
			#logo{
				width:150px;
				float: left;
			}
			#submit{
				float: right;
				margin-top: -45px;
				width: 12%;
			}
		</style>
		<div id="container">
			<div id="header">

				<div style="position:relative; float:left; width:100%">
					<!-- <h1 style="width:150px;float: left;"> -->
					<div id="logo">
						<h1>
						<?= $this->Html->link('Administração', array(
																	'controller' => 'index',
																	'action' => 'index',

																)); ?>
					</h1>

				</div>
				<?php
					// echo "<pre>";
					// print_r($this->params);
					// echo "</pre>";
					if(
						$this->params['prefix'] == 'admin'
						&&
						$this->params['action'] == 'index'
						||
						$this->params['action'] == 'admin_index'
						||
						$this->params['action'] == 'admin_galeria_list'
							):
							if($this->params['controller'] != 'index' && $this->params['controller'] != 'hotsites' && $this->params['controller'] != 'user'){
							?>
								<?php
									echo $this->Form->create('FormBuscaGeneric', array('id' => 'formGeneric'));
									echo $this->Form->input('buscarpor', array(
																				'label'		=> false,
																				'placeholder' => 'Digite sua Busca.',
																				'id' => 'inputBusca',
																			));

									echo $this->Form->submit("Buscar", array(
																		'id' => 'submit',
																		));
									echo $this->end();
								}
								?>
					</div>
				<?php endif;?>
			</div>
			</div>
			<?php if(!empty($usuario_admin)): ?>

				<div id="content_admin">
					<?php  echo $this->element('admin/admin_menu'); ?>
				</div>

			<?php endif; ?>

			<style>
				#content_admin {
					background: #fff;
					clear: both;
					color: #333;
					padding: 10px 20px 40px 50px;
					overflow: auto;
				}
			</style>



			<div id="content" style="padding-left:80px">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>


			<div id="footer">
				<div id="zCakeVersion">
					<div>
						<?php
							echo file_get_contents('config/version.zoio');
						?>
					</div>
				</div>
			</div>

		</div>
		<?php
		//echo $this->element('sql_dump');
		?>
	</body>
</html>
