<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Route') ?></th>
            <td><?= $schedule->has('route') ? $this->Html->link($schedule->route->destination, ['controller' => 'Routes', 'action' => 'view', $schedule->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bus') ?></th>
            <td><?= $schedule->has('bus') ? $this->Html->link($schedule->bus->name, ['controller' => 'Buses', 'action' => 'view', $schedule->bus->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= $this->Number->format($schedule->day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fare') ?></th>
            <td><?= $this->Number->format($schedule->fare) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create At') ?></th>
            <td><?= $this->Number->format($schedule->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departure Time') ?></th>
            <td><?= $this->Number->format($schedule->departure_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arival Time') ?></th>
            <td><?= $this->Number->format($schedule->arival_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($schedule->status) ?></td>
        </tr>
    </table>
</div>
