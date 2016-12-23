<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket'), ['action' => 'edit', $ticket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tickets view large-9 medium-8 columns content">
    <h3><?= h($ticket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Schedule') ?></th>
            <td><?= $ticket->has('schedule') ? $this->Html->link($ticket->schedule->id, ['controller' => 'Schedules', 'action' => 'view', $ticket->schedule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fare') ?></th>
            <td><?= h($ticket->fare) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= h($ticket->stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bus') ?></th>
            <td><?= $ticket->has('bus') ? $this->Html->link($ticket->bus->name, ['controller' => 'Buses', 'action' => 'view', $ticket->bus->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passegers') ?></th>
            <td><?= $this->Number->format($ticket->passegers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create At') ?></th>
            <td><?= h($ticket->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departure Time') ?></th>
            <td><?= h($ticket->departure_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($ticket->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arival Time') ?></th>
            <td><?= h($ticket->arival_time) ?></td>
        </tr>
    </table>
</div>
