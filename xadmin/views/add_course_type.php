<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
<?php require_once '../layouts/feedback_message.php'; ?>
								<div class="row m-b-20">
                                    <div class="col-md-8">
 										<label for="user_code" class="control-label">Category Type</label>
										<input type="text" class="form-control" id="course_type" name="course_type" value="<?php echo $course_type;?>"  >
                                    </div>
									
									<div class="col-md-8">
 										<label for="user_code" class="control-label">Category Type Image</label>
										<input name="gallery" class="form-control" type="file" id="gallery" size="30" />
                                    </div>
	 							</div>
	 						
									
											
                                <div class="row m-t-30">
                                    <div class="col-md-12">
										<input name="add_type" type="submit"  class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Course Type">
                                    </div>
                                </div>
</form>