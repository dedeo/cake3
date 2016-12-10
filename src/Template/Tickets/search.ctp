<div>
	<form class="form-inline">
		<div class="form-group">
		<label for="exampleInputName2">Name</label>
		<input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
		</div>
		<div class="form-group">
		<label for="exampleInputEmail2">Email</label>
		<input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
		</div>
		<button type="submit" class="btn btn-default">Send invitation</button>
	</form>

	<table class="table">
		<thead>
			<th>#</th>
			<th>Rute</th>
			<th>Fasilitas</th>
			<th>Berangkat</th>
			<th>Tiba</th>
			<th>Harga</th>
			<th></th>
		</thead>
		<tbody>
		<?php foreach ($results as $ticket) { ?>
			<tr>
				<td>#</td>
				<td><?= $ticket->route->name; ?></td>
				<td><?= implode(', ', unserialize($ticket->bus->facilities)); ?></td>
				<td><?= $this->Time->format($ticket->departure_time,'HH:mm'); ?></td>
				<td><?= $this->Time->format($ticket->arival_time,'HH:mm'); ?></td>
				<td><?= $this->Number->currency($ticket->route->fare,'IDR'); ?></td>
			</tr>
		<?php }?>			
		</tbody>
	</table>
</div>


