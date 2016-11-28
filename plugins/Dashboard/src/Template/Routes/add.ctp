<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="routes form large-9 medium-8 columns content">
    <?= $this->Form->create($route) ?>
    <fieldset>
        <legend><?= __('Add Route') ?></legend>
        <?php
            echo $this->Form->input('source');
            echo $this->Form->input('destination');
            echo $this->Form->input('distance');
            echo $this->Form->input('fare');
            echo $this->Form->input('create_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
