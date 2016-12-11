<!-- File: src/Template/Users/login.ctp -->

<div class="login-wrapper">
	<div class="users form row">
	    <?php echo $this->Flash->render('auth') ?>
	    <?php echo $this->Form->create() ?>
	    <div class="block-header col-sm-12"><hr><h1>Login</h1></div>
	    <div class="users-content col-sm-7">
	        <p class="red-text"><?php echo __('Please enter your username and password') ?></p>
	        <?php echo $this->Form->input('username') ?>
	        <?php echo $this->Form->input('password') ?>
	        <div class="button-grup">
	        	<?php echo $this->Form->button(__('Login'),['class'=>'button-red']); ?>
	        </div>
	    </div>
	    <?php echo $this->Form->end() ?>
	</div>
</div>

