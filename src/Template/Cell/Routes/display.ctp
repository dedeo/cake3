<select class="selectpicker" id="rute-perjalanan" title="Pilih rute perjalanan" name="rute">
	<?php foreach ($routes as $route => $label) {
	    echo "<option value='$route'>".$label."</option>";
	} ?>
</select>


<!-- $routes; -->