 <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
     	 <?php include_once('layouts/feedback_message.php');?>
         <div class="form-group">
         	<label class="col-md-4">
                
            </label>
              <div class="col-md-10 col-xs-11"><input name="recruiter_code"  class="form-control" type="hidden" id="recruiter_code" size="30" value="<?php echo $recruiter_id;?>" /></div>
          </div>
          
         <div class="form-group">
         	<label class="col-md-4">
                Email:
                <span class="required">*</span>
            </label>
              <div class="col-md-10 col-xs-11"><input name="email" required  class="form-control" type="text" id="email" size="30" /></div>
          </div>

         <div class="form-group">
         	<label class="col-md-4">
                Phone:
                <span class="required">*</span>
            </label>
              <div class="col-md-10 col-xs-11"><input name="phone"  class="form-control" type="text" id="phone" size="30" /></div>
          </div>
         
	<div class="form-group">
         	<label class="col-md-4">
                Company:
                <span class="required">*</span>
            </label>
              <div class="col-md-10 col-xs-11"><input name="job_company" value="" class="form-control" type="text" id="job_company" /></div>
          </div> 
	
	<div class="form-group">
         	<label class="col-md-4">
                Image:
                <span class="required">*</span>
            </label> 
              <div class="col-md-10 col-xs-11"><input type="file" name="gallery" id="gallery" class="form-control"></div>
          </div> 

         <div class="form-group">
              <label class="col-md-4">Job Title:<span class="required">*</span></label>
              <div class="col-md-10 col-xs-11"><input name="job_title" required class="form-control" type="text" size="35" /></div>
          </div>
         
           <div class="form-group form-inline">
              <label class="col-md-4">Application Deadline*:
                
              </label>
              <div class="col-md-10 col-xs-11">
  
                  <div class="col-md-12">
												Start Date: <input name="startDate" required id="startDate"  class="form-control" />
											</div>
											<div class="col-md-12">
       											End Date: <input name="endDate" id="endDate" required class="form-control" />
											 </div>
                 
					<script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>				
              </div>
          </div>
          
          
          <div class="form-group">
              <label class="col-md-4">Job Type:
                <span class="required">*</span>
              </label>
              <div class="col-md-10 col-xs-11">
  
                 <select name="job_type" data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Job Type</option>
										<?php 
										foreach($job_types as $row2):
										?>
                                    		<option value="<?php echo $row2['jobtype_id'];?>">
													<?php echo $row2['jobtype_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
              </div>
          </div>
						
						
		<div class="form-group">
              <label class="col-md-4">Job Level:
                <span class="required">*</span>
              </label>
              <div class="col-md-10 col-xs-11">
  
                 <select name="job_level" required data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Level</option>
										<?php 
										foreach($job_levels as $row2):
										?>
                                    		<option value="<?php echo $row2['joblevel_id'];?>">
													<?php echo $row2['joblevel_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
              </div>
		</div>
	
		<div class="form-group">
              <label class="col-md-4">Job Sector:
                <span class="required">*</span>
              </label>
              <div class="col-md-10 col-xs-11">
  
                 <select name="job_sector" required data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Sector</option>
										<?php 
										foreach($job_sectors as $row2):
										?>
                                    		<option value="<?php echo $row2['sector_id'];?>">
													<?php echo $row2['sector_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
              </div>
		</div>
		
		<div class="form-group">
              <label class="col-md-4">Job Location:
                <span class="required">*</span>
              </label>
              <div class="col-md-10 col-xs-11">
  
                <select name="location_id" required data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Location</option>
										<?php 
										foreach($job_locations as $row2):
										?>
                                    		<option <?php if ($job_detail['location_id'] == $row2['location_id']){?> selected="selected" <?php }?> value="<?php echo $row2['location_id'];?>">
													<?php echo $row2['location_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
              </div>
          </div>
     
						<div class="form-group">
              <label class="col-md-4">Country:</label>
              <div class="col-md-10 col-xs-11"><select name="country_id" required data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Country</option>
										<?php 
										foreach($countries as $row2):
										?>
                                    		<option value="<?php echo $row2['country_id'];?>">
													<?php echo $row2['country_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select></div>
          </div>
	 
						<div class="form-group">
              <label class="col-md-4">Job Category:</label>
              <div class="col-md-10 col-xs-11"><select name="category_id"  required onfocus="ShowSubCategories(this.value)" onchange="ShowSubCategories(this.value)" data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Category</option>
										<?php 
										foreach($job_categories as $row2):
										?>
                                    		<option value="<?php echo $row2['category_id'];?>">
													<?php echo $row2['category_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select></div>
          </div>
						
			<div class="form-group">
              <label class="col-md-4">Job Sub Category:</label>
              <div class="col-md-10 col-xs-11"><div id="txtHint1"><select name="sub_category_id" required data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Subcategory</option>
										<?php 
										foreach($job_subcategories as $row2):
										?>
                                    		<option value="<?php echo $row2['subcat_id'];?>">
													<?php echo $row2['category_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
				  </select></div></div>
          </div>
          
          <div class="form-group">
              <label class="col-md-4">Job Description:</label>
              <div class="col-md-10 col-xs-11">
  
                  <textarea id="descript" name="descript" rows="15" cols="40">

			</textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('descript', {
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
              </div>
          </div>
                   
                    
          <div class="form-group">
              <label class="col-md-2"></label>
              <div class="col-md-10 col-xs-11"><input type="submit" class="btn btn-success" name="submit" value="Post Job" />

               <input type="reset" name="Reset" class="btn btn-danger" value="  Cancel  " />
              </div>
          </div>
          
                            
 


     </form>