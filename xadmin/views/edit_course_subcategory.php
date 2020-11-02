<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
	<?php require_once '../layouts/feedback_message.php'; ?>
	<input type="hidden" name="token" value="<?php echo $hiss; ?>" />
	<div class="row m-b-20">
		<div class="col-md-8">
			<label for="user_code" class="control-label">Sub Category Name</label>
			<input type="text" class="form-control" id="course_subcategory" name="course_subcategory" value="<?php echo $category_name; ?>">
		</div>
		<div class="col-md-8">
			<label for="user_code" class="control-label">Course Image</label>
			<input name="gallery" class="form-control" type="file" id="gallery" size="30" />
		</div>
	</div>
	<div class="row m-b-20">
		<div class="col-md-6">
			<label class="control-label">Course Parent Category:</label>
			<select name="course_category" data-required="true" class="form-control" data-live-search="true">
				<option value="">Select A Category</option>

				<?php
				foreach ($course_categories as $row2) :
				?>
					<option <?php if ($category_parent == $row2['category_id']) {
										echo 'selected';
									}  ?> value="<?php echo $row2['category_id']; ?>">
						<?php echo $row2['category_name']; ?>
					</option>
				<?php
				endforeach;
				?>
			</select>
		</div>
	</div>
	<div class="row m-t-30">
		<div class="col-md-12">
			<input name="edit_course_subcategory" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Update Course Sub Category">
		</div>
	</div>
</form>