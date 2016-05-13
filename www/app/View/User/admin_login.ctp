<?php
//===============================
$this->start('css');
	///
	//echo $this->Html->css("/css/login.css");
$this->end();
//===============================

//===============================
$this->start('script');
	///
	echo $this->Html->script('/jui/js/jquery-ui-effects.min.js');
$this->end();
//===============================

//===============================
$this->start('sidebar');
	///
$this->end();
//===============================

//===============================
$this->start('paginacao');
	///
$this->end();
//===============================
?>

<div id="mws-login-wrapper">
    <div id="mws-login">
        <h1>Login</h1>
        <?php echo $this->Session->flash('auth'); ?>
        <div class="mws-login-lock"><i class="icon-lock"></i></div>
        <div id="mws-login-form">
        	 <?php echo $this->Form->create('User', array(
        	 											'class' => 'mws-form',
        	 										));?>
                <div class="mws-form-row">
                    <div class="mws-form-item">
                    	<?=$this->Form->input('username', array(
                    											'label' => false,
                    											'div' => false,
                    											'class' => 'mws-login-username required',
                    											'placeholder' => 'Usuário',
                    										));?>
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item">
                    	<?=$this->Form->input('password', array(
                    											'label' => false,
                    											'div' => false,
                    											'class' => 'mws-login-password required',
                    											'placeholder' => 'Senha',
                    										));?>

                 <div class="mws-form-row">
                	<?php
                	echo $this->Form->submit("Login", array(
                											'div' => false,
                											'class' => 'btn btn-success mws-login-button',
                										));
                	
                	echo $this->Form->end();
                	?>
                </div>
            </form>
        </div>
    </div>
</div>