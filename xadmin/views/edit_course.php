 <form class="form-horizontal" role="form" method="post">
<?php require_once '../layouts/feedback_message.php'; ?>
	<input type="hidden" name="token" value="<?php echo $hiss;?>" />
								<div class="row m-b-20">
                                    <div class="col-md-8">
 										<label for="user_code" class="control-label">Title</label>
										<input type="text" class="form-control" id="course_title" name="course_title" value="<?php echo $course_title;?>"  >
                                    </div>
	 							</div>
	 							<div class="row m-b-20">
                                    <div class="col-md-5">
 										<label for="user_code" class="control-label">Course Image</label>
										<input name="gallery" class="form-control" type="file" id="gallery" size="30" />
                                    </div>
									
                                    <div class="col-md-5">
 										<label for="event_author" class="control-label">Course Duration</label>
										<input type="text" class="form-control" id="duration" name="duration" value="<?php echo $duration;?>"  >
                                    </div>
									
									<div class="col-md-5">
 										<label for="course_fee" class="control-label">Course Fee</label>
											<div class='input-group'>
												<input id="course_fee" name="course_fee" type='text' class="form-control"  value="<?php echo $course_fee;?>"/>
												</span>
											</div>
                                    </div>
									<div class="col-md-5">
 										<label for="event_author" class="control-label">Fee Duration</label>
										<input type="text" class="form-control" id="fee_period" name="fee_period" value="<?php echo $fee_period;?>"  >
                                    </div>
									
									<div class="col-md-5">
 										<label for="location" class="control-label">Course Location</label>
											<div class='input-group'>
												<select name="location" data-required="true"   class="form-control" data-live-search= "true">
          								<option value="">Select A Location</option>
										<?php 
										foreach($course_locations as $row2):
										?>
                                    		<option value="<?php echo $row2['location_id'];?>">
													<?php echo $row2['location_name'];?>
												</option>
                                        <?php
										endforeach;
										?> 
          								</select>
												</span>
											</div>
                                    </div>
	 								
	 
	 							</div>
						<div class="row m-b-20">
                            <div class="col-md-6">
              <label class="control-label">Course Type:</label>
              <select name="course_type" data-required="true"  class="form-control" data-live-search= "true">
          								<option value="">Select A Course Type</option>
										<?php 
										foreach($course_types as $row2):
										?>
                                    		<option <?php if ($course_type == $row2['type_id']){ echo 'selected';}  ?> value="<?php echo $row2['type_id'];?>">
													<?php echo $row2['type_name'];?>
												</option>
                                        <?php
										endforeach;
										?> 
          								</select>
                                    </div>
								<div class="col-md-6">
              <label class="control-label">Course Category:</label>
              <select name="category_id" data-required="true"  onfocus="ShowPageLoc(this.value)" onchange="ShowPageLoc(this.value)"  class="form-control" data-live-search= "true">
          								<option value="">Select A Category</option>
										<?php 
										foreach($course_categories as $row2):
										?>
                                    		<option <?php if ($course_category == $row2['category_id']){ echo 'selected';}  ?> value="<?php echo $row2['category_id'];?>">
													<?php echo $row2['category_name'];?>
												</option>
                                        <?php
										endforeach;
										?> 
          								</select>
          </div>
						
			<div class="col-md-6">
              <label class="control-label">Course Sub Category:</label>
              <div id="txtHint1">
				  				<select name="sub_category_id" data-required="true"  class="form-control" data-live-search= "true">
          								<option value="">Select A Subcategory</option>
										<?php 
										foreach($course_subcategories as $row3):
										?>
                                    		<option <?php  if ($course_subcategory == $row3['subcat_id']){ echo 'selected';} ?> value="<?php echo $row3['subcat_id'];?>">
													<?php echo $row3['category_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
				  				</select></div>
          </div>
</div>

								<div class="row m-b-20">
									<div class="col-md-6">
										<label for="study_method" class="control-label">Study Method</label><br>
                                       <select name="study_method" data-required="true" class="form-control" data-live-search= "true">
          								<option value="">Select A Method</option>
										<?php 
										foreach($study_methods as $row2):
										?>
                                    		<option <?php if ($study_method == $row2['sm_id']){ echo 'selected';} ?> value="<?php echo $row2['sm_id'];?>">
													<?php echo $row2['sm_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
									
									<div class="col-md-6">
										<label for="study_level" class="control-label">Study Level</label><br>
                                       <select name="study_level" data-required="true" class="form-control" data-live-search= "true">
          								<option value="">Select A Level</option>
										<?php 
										foreach($study_levels as $row2):
										?>
                                    		<option <?php if ($study_level == $row2['sl_id']){ echo 'selected';} ?> value="<?php echo $row2['sl_id'];?>">
													<?php echo $row2['sl_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
									
									<div class="col-md-6">
										<label for="course_institute" class="control-label">Course Institute</label><br>
                                       <select name="course_institute" required data-required="true"  class="form-control" data-live-search= "true">
          								<option value="">Select an Institute</option>
										<?php 
										foreach($course_institutions as $row44):
										?>
                                    		<option value="<?php echo $row44['institute_id'];?>">
													<?php echo $row44['institute_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
									
									<div class="col-md-6">
										<label for="country_id" class="control-label">Country</label><br>
                                       <select name="country_id" data-required="true" class="selectpicker" data-live-search= "true">
          								<option value="">Select A Country</option>
										<?php 
										foreach($countries as $row2):
										?>
                                    		<option <?php if ($country == $row2['country_id']){ echo 'selected';} ?> value="<?php echo $row2['country_id'];?>">
													<?php echo $row2['country_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
								</div>	
								<div class="row m-b-20">
                                    
	 								<div class="col-md-6">
 										<label for="qualification" class="control-label">Qualification</label>
										<textarea id="qualification" name="qualification" rows="5" cols="40"><?php echo $qualification;?></textarea>
										<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('qualification', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									
									<div class="col-md-6">
 										<label for="who_is_course_for" class="control-label">Who is the Course For?</label>
										<textarea id="who_is_course_for" name="who_is_course_for" rows="5" cols="40"><?php echo $who_is_course_for;?></textarea>
										<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('who_is_course_for', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									<div class="col-md-6">
 										<label for="career_path" class="control-label">Career Path</label>
										<textarea id="career_path" name="career_path" rows="5" cols="40"><?php echo $career_path;?></textarea>
										<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('career_path', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									<div class="col-md-6">
 										<label for="course_overview" class="control-label">Course Overview</label>
										<textarea id="course_overview" name="course_overview" rows="5" cols="40"><?php echo $course_overview;?></textarea>
										<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('course_overview', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									<div class="col-md-12">
										<label for="description" class="control-label">Description</label>
										<textarea id="description" name="description" rows="15" cols="40"><?php echo $description;?></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('description', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									
									
								</div>			
                                <div class="row m-t-30">
                                    <div class="col-md-12">
										<input name="edit_course" type="submit"  class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Edit Course">
                                    </div>
                                </div>
</form>