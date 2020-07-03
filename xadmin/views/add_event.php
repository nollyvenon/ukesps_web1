 <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
<?php require_once '../layouts/feedback_message.php'; ?>
								<div class="row m-b-20">
                                    <div class="col-md-8">
 										<label for="user_code" class="control-label">Title</label>
										<input type="text" class="form-control" id="event_title" name="event_title" value="<?php echo $event_title;?>"  >
                                    </div>
	 							</div>
	 							<div class="row m-b-20">
                                    <div class="col-md-6">
 										<label for="gallery" class="control-label">Event Image</label>
										<input name="gallery" class="btn btn-info" type="file" id="gallery" size="30" />
                                    </div>
									
                                    <div class="col-md-6">
 										<label for="event_author" class="control-label">Author</label>
										<input type="text" class="form-control" id="event_author" name="event_author" value="<?php echo $event_author;?>"  >
                                    </div>
									<div class="col-md-6">
 										<label for="event_type" class="control-label">Event Type</label>
										<select name="event_type" required data-required="true" class="form-control selectpicker" data-live-search= "true">
          									<option value="">Select A Type</option>
                                         	<option value="1">Free</option>
        									<option value="2">Paid</option>
          								</select>
                                    </div>
	 							</div>
	 							</div>
	 <label for="payment_method" class="control-label">Event Date</label>
	 							<div class="row m-b-20">
									<div class="col-md-4">
										<label for="eventStartDate" class="control-label">Start Date</label>
										<input id="eventStartDate" name="eventStartDate" type="text" class="form-control">
									</div>
									<div class="col-md-4">
										<label for="eventEndDate" class="control-label">End Date</label>
										<input id="eventEndDate" name="eventEndDate" type="text" class="form-control" >
									</div>
									<script>
										jQuery('#eventStartDate').datetimepicker(
										{
                                          format:'Y-m-d H:i',
                                          lang:'en'
                                        });
										jQuery('#eventEndDate').datetimepicker(
										{
                                          format:'Y-m-d H:i',
                                          lang:'en'
                                        });
									</script>
											
									
								</div>							
								<div class="row m-b-20">
                                    <div class="col-md-6">
 										<label for="location" class="control-label">Events Location</label>
											<div class='input-group'>
												<input id="location" name="location" type='text' class="form-control" />
												</span>
											</div>
                                    </div>
	 								<div class="col-md-6">
 										<label for="summary" class="control-label">Events Summary</label>
										<textarea id="summary" name="summary" rows="5" cols="40"></textarea>
										<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('summary', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									<div class="col-md-12">
										<label for="content" class="control-label">Description</label>
										<textarea id="content" name="content" rows="15" cols="40">





			</textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('content', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									
									
								</div>			
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!--<button name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>-->
										<input name="add_event" type="submit"  class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Event">
                                    </div>
                                </div>
</form>