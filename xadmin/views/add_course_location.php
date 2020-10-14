 <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
 	<?php require_once '../layouts/feedback_message.php'; ?>
 	<div class="row m-b-20">
 		<div class="col-md-12 m-b-20">
 			<label for="location" class="control-label">Location Name</label>
 			<input type="text" class="form-control" id="location" name="location" value="<?php echo $location_name; ?>" required>
 		</div>
 		<div class="col-md-6 m-b-20">
 			<label for="country_id" class="control-label">Country</label><br>
 			<select name="country_id" onfocus="ShowStatebyCountry(this.value)" onchange="ShowStatebyCountry(this.value)" data-required="true" required class="form-control selectpicker" data-live-search="true">
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
 		<div class="col-md-6 m-b-20">
 			<label for="state_id" class="control-label">State</label><br>
 			<div id="txtHint1"> <select name="state_id" data-required="true" class="form-control selectpicker" data-live-search="true">
 					<option value="">Select A State</option>
 					<?php
						foreach ($states as $row2) :
						?>
 						<option value="<?php echo $row2['state_id']; ?>">
 							<?php echo $row2['state_name']; ?>
 						</option>
 					<?php
						endforeach;
						?>
 				</select></div>
 		</div>
 		<div class="col-md-12">
 			<div class="form-group">
 				<label for="location_img">Location Image</label>
 				<input type="file" name="location_img" id="location_img" required class="form-control">
 			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="form-group">
 				<label class="col-md-10">Location Info:</label>
 				<div class="col-md-12 col-xs-12">

 					<textarea id="location_info" name="location_info" required rows="15" cols="40">
<?= $location_info ?>
			</textarea>
 					<script>
 						// Replace the <textarea id="editor1"> with a CKEditor
 						// instance, using default configuration.
 						CKEDITOR.replace('location_info', {
 							filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
 							filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
 							"filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
 						});
 					</script>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row m-t-30">
 		<div class="col-md-12">
 			<input name="add_location" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Location">
 		</div>
 	</div>
 </form>