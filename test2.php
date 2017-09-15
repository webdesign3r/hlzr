<?php
include test.php
?>
<form>

			
			<input type="date" value="<?= $checkin ?>"><br>
			<select value="<?= $personen ?>">
				<option <?php if($personen == '1'){echo("selected");}?> >1</option>
				<option <?php if($personen == '2'){echo("selected");}?> >2</option>
				<option <?php if($personen == '3'){echo("selected");}?> >3</option>
				<option <?php if($personen == '5'){echo("selected");}?> >4</option>
			</select>