<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tickets index large-9 medium-8 columns content">
    <h3><?= __('Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departure_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arival_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fare') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passegers') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?= $this->Number->format($ticket->id) ?></td>
                <td><?= $ticket->has('schedule') ? $this->Html->link($ticket->schedule->id, ['controller' => 'Schedules', 'action' => 'view', $ticket->schedule->id]) : '' ?></td>
                <td><?= h($ticket->create_at) ?></td>
                <td><?= h($ticket->departure_time) ?></td>
                <td><?= h($ticket->date) ?></td>
                <td><?= h($ticket->arival_time) ?></td>
                <td><?= h($ticket->fare) ?></td>
                <td><?= h($ticket->stock) ?></td>
                <td><?= $ticket->has('bus') ? $this->Html->link($ticket->bus->name, ['controller' => 'Buses', 'action' => 'view', $ticket->bus->id]) : '' ?></td>
                <td><?= $this->Number->format($ticket->passegers) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
