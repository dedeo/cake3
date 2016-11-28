<?php
$this->Html->addCrumb('Buses', '');
$this->assign('title', 'Tambah Armada Baru');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
          <div class="x_title">
            <a href=<?= $this->Url->build(['controller'=>'Buses','action'=>'add'])?> class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Armada</a>
            <div class="clearfix"></div>
          </div>



      </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    </div>
</div>
<?php
// $this->Html->script(
//  [
//      'jquery.min.js',
//      'bootstrap.min.js',
//      'fastclick.js',
//      'nprogress.js',
//      'icheck.min.js',
//      'custom.min.js',
//  ],
//  ['block'=>true]
// );
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bus'), ['action' => 'edit', $bus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bus'), ['action' => 'delete', $bus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="buses view large-9 medium-8 columns content">
    <h3><?= h($bus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($bus->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($bus->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($bus->status) ?></td>
        </tr>
    </table>
</div>
