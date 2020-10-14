 <form class="form-horizontal" role="form" method="post">
 	<?php require_once '../layouts/feedback_message.php'; ?>
 	<input type="hidden" name="token" value="<?php echo $hiss; ?>" />
 	<div class="row m-b-20">
 		<div class="col-md-12">
 			<label for="state_name" class="control-label">State Name</label>
 			<input type="text" class="form-control" id="state_name" name="state_name" value="<?php echo $state_name; ?>">
 		</div>
 	</div>
 	<div class="row m-b-20">
 		<div class="col-md-12">
 			<label for="country_id" class="control-label">Country</label><br>
 			<select name="country_id" data-required="true" class="form-control" data-live-search="true">
 				<option value="">Select A Country</option>
 				<?php
					foreach ($countries as $row2) :
					?>
 					<option <?php if ($country_id == $row2['country_id']) {
											echo 'selected';
										}  ?> value="<?php echo $row2['country_id']; ?>">
 						<?php echo $row2['country_name']; ?>
 					</option>
 				<?php
					endforeach;
					?>
 			</select>
 		</div>
 	</div>
 	<div class="row m-t-30">
 		<div class="col-md-12">
 			<input name="edit_state" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Edit State">
 		</div>
 	</div>
 </form>