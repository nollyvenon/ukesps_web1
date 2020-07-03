<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
<?php require_once '../layouts/feedback_message.php'; ?>
								<div class="row m-b-20">
                                    <div class="col-md-8">
 										<label for="user_code" class="control-label">Category Name</label>
										<input type="text" class="form-control" id="course_category" name="course_category" value="<?php echo $course_category;?>"  >
                                    </div>
									
									<div class="col-md-8">
 										<label for="user_code" class="control-label">Category Image</label>
										<input name="gallery" class="form-control" type="file" id="gallery" size="30" />
                                    </div>
	 							</div>
	 						
									
											
                                <div class="row m-t-30">
                                    <div class="col-md-12">
										<input name="add_course" type="submit"  class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Course Category">
                                    </div>
                                </div>
</form>