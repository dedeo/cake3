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
        <div class="table-responsive">
          <table class="table" id="tableRoutes">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date','Tanggal') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('bus_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Route.name','Rute') ?></th>
                    <th scope="col" style="text-align:center;"><?= $this->Paginator->sort('stock','Kursi') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('departure_time','Berangkat') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?= $this->Number->format($ticket->id) ?></td>
                    <td><?= $this->Time->format($ticket->date,'dd MMM yyyy') ?></td>
                    <td><?= $ticket->has('bus') ? $ticket->bus->name : '' ?></td> 
                    <td><?= $ticket->has('route') ? $ticket->route->name : '' ?></td>
                    <td style="text-align:center;"><?= h($ticket->stock ."/".$ticket->bus->capacity) ?></td>
                    <td><?= h($this->Time->format($ticket->departure_time,'HH:mm')) ?></td>
                    <td class="actions">
                            <?= $this->Form->postLink('<i class="fa fa-remove"></i>', ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id),'escape'=>false,'class'=>'text-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

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