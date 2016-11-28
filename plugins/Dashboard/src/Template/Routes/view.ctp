<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Route'), ['action' => 'edit', $route->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Route'), ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routes view large-9 medium-8 columns content">
    <h3><?= h($route->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($route->source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($route->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($route->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distance') ?></th>
            <td><?= $this->Number->format($route->distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fare') ?></th>
            <td><?= $this->Number->format($route->fare) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create At') ?></th>
            <td><?= h($route->create_at) ?></td>
        </tr>
    </table>
</div>
