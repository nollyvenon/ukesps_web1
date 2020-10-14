 <form action="" class="form-horizontal" role="form" method="post">
 	<?php require_once '../layouts/feedback_message.php'; ?>
 	<div class="row m-b-20">
 		<div class="col-md-12 form-group">
 			<label for="location_name" class="control-label">Location Name</label>
 			<input type="text" class="form-control" id="location_name" name="location_name" value="<?php echo $location_name; ?>">
 		</div>
 	</div>


 	<div class="row m-b-20">
 		<div class="col-md-12 form-group">
 			<label for="country_id" class="control-label">Country</label><br>
 			<select name="country_id" onfocus="ShowStatebyCountry(this.value)" onchange="ShowStatebyCountry(this.value)" data-required="true" class="form-control selectpicker" data-live-search="true">
 				<option value="">Select A Country</option>
 				<?php
					foreach ($countries as $row2) :
					?>
 					<option value="<?php echo $row2['country_id']; ?>">
 						<?php echo $row2['country_name']; ?>
 					</option>
 				<?php
					endforeach;
					?>
 			</select>
 		</div>
 		<div class="col-md-12 form-group">
 			<label for="state_id" class="control-label">State</label><br>
 			<div> <select id="txtHint1" name="state_id" data-required="true" class="form-control selectpicker" data-live-search="true">
 					<!-- <option value="">Select A State</option>
 				<?php
					foreach ($states as $row2) :
					?>
 					<option value="<?php echo $row2['state_id']; ?>">
 						<?php echo $row2['state_name']; ?>
 					</option>
 				<?php
					endforeach;
					?> -->
 				</select></div>
 		</div>
 	</div>




 	<div class="row m-t-30">
 		<div class="col-md-12">
 			<input name="add_location" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Location">
 		</div>
 	</div>
 </form>