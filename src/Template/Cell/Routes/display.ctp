<select id="rute-perjalanan" name="rute" required>
	<option disabled selected value> Pilih rute perjalanan </option>
	<?php foreach ($routes as $key => $value) {
		echo "<option value='$key'>".$value."</option>";
	} ?>
</select>