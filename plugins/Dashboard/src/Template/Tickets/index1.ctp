<?php
$this->Html->addCrumb('Jadwal Keberangkatan Bus', '');
$this->assign('title', 'Jadwal Keberangkatan Bus');

// debug($tickets);

// die();
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
          <div class="x_title">
            <a href=<?= $this->Url->build(['controller'=>'Schedules','action'=>'add'])?> class="btn btn-warning btn-sm pull-right"> Tambah Jadwal Baru</a>
            <div class="clearfix"></div>
          </div>

        <div class="table-responsive">
          <table class="table" id="tableRoutes">
            <thead>
                <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule_id','Rute') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('create_at') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('date','Tanggal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departure_time','Berangkatan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arival_time','Datangan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fare','Harga') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passegers','Terjual') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?= $this->Number->format($ticket->id) ?></td>
                    <td><?= $ticket->has('schedule') ? $this->Html->link($ticket->schedule->route_name, ['controller' => 'Schedules', 'action' => 'view', $ticket->schedule->id]) : '' ?></td>
                    <!-- <td><?= h($ticket->create_at) ?></td> -->
                    <td><?= h($ticket->date) ?></td>
                    <td><?= h($this->Time->format($ticket->departure_time,'HH:mm')) ?></td>
                    <td><?= h($this->Time->format($ticket->arival_time,'HH:mm')) ?></td>
                    <td><?= h('Rp '.$ticket->fare) ?></td>
                    <td><?= h($ticket->stock) ?></td>
                    <td><?= $ticket->has('bus') ? $this->Html->link($ticket->bus->name, ['controller' => 'Buses', 'action' => 'view', $ticket->bus->id]) : '' ?></td>
                    <td><?= $this->Number->format($ticket->passegers) ?></td>                    
                    <td class="actions">
                            <a href=<?= $this->Url->build(['controller'=>'Tickets','action'=>'edit',$ticket->id])?> class="text-general"><i class="fa fa-edit"></i></a>
                            <?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id),'escape'=>false,'class'=>'text-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

<!--            <thead>
              <tr class="headings">
                <th class="column-title"><?= $this->Paginator->sort('id','Id') ?> </th>
                <th class="column-title"><?= $this->Paginator->sort('source','Kota Asal') ?> </th>
                <th class="column-title"><?= $this->Paginator->sort('destination','Kota Tujuan') ?> </th>
                <th class="column-title"><?= $this->Paginator->sort('distance','Jarak') ?> </th>
                <th class="column-title"><?= $this->Paginator->sort('fare','Tarif') ?> </th>
                <!-- <th class="column-title"><?= $this->Paginator->sort('') ?> </th>
                <th class="column-title no-link last"><span class="nobr">Action</span></th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($routes as $route): ?>
                <tr>
                    <td><?= $this->Number->format($route->id) ?></td>
                    <td><?= $this->Html->link(h($route->source),(['controller'=>'Routes','action'=>'edit',$route->id])) ?></td>
                    <td><?= $route->destination ?></td>
                    <td><?= $route->distance ?> Km</td>
                    <td>Rp <?= $route->fare ?></td>
                    <td class="actions">
                        <a href=<?= $this->Url->build(['controller'=>'Routes','action'=>'edit',$route->id])?> class="text-general"><i class="fa fa-edit"></i></a>
                        <?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id),'escape'=>false,'class'=>'text-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody> -->
          </table>
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