<select id="rute-perjalanan" name="rute" required>
	<option disabled selected value> Pilih rute perjalanan </option>
	<?php for ($i=1; $i <= count($routes); $i++) { 
		echo "<option value='$i'>".$routes[$i]."</option>";
	} ?>
</select>