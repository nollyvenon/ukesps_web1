<?php

include('../z_db.php');
$country_id = addslashes($_GET["q"]);
$state_by_country = $zenta_operation->get_states_by_country($country_id);


//echo $q;
?>
<select name="state_id" onfocus="ShowCourseLocationbyState(this.value)" onchange="ShowCourseLocationbyState(this.value)" data-required="true" class="form-control selectpicker" data-live-search="true">
	<option value="">Select A State</option>
	<?php
	foreach ($state_by_country as $row2) :
	?>
		<option value="<?php echo $row2['state_name']; ?>">
			<?php echo $row2['state_name']; ?>
		</option>
	<?php
	endforeach;
	?>
</select>