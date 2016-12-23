<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tickets form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket) ?>
    <fieldset>
        <legend><?= __('Add Ticket') ?></legend>
        <?php
            echo $this->Form->input('schedule_id', ['options' => $schedules]);
            echo $this->Form->input('create_at', ['empty' => true]);
            echo $this->Form->input('departure_time');
            echo $this->Form->input('date');
            echo $this->Form->input('arival_time');
            echo $this->Form->input('fare');
            echo $this->Form->input('stock');
            echo $this->Form->input('bus_id', ['options' => $buses]);
            echo $this->Form->input('passegers');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
