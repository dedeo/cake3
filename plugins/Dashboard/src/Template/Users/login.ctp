<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
    <?php echo $this->Flash->render('auth') ?>
    <?php echo $this->Form->create() ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password') ?></legend>
        <?php echo $this->Form->input('username') ?>
        <?php echo $this->Form->input('password') ?>
        <?php echo $this->Form->button(__('Login')); ?>
    </fieldset>
    <?php echo $this->Form->end() ?>
</div>
