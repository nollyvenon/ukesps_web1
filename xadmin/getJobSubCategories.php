<?php

include('../z_db.php');
 $category_id = addslashes($_GET["q"]);
$course_subcategories = $zenta_operation->get_job_sub_categories($category_id);


//echo $q;
?> 
							<select name="sub_category_id" data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Subcategory</option>
										<?php 
										foreach($course_subcategories as $row2):
										?>
                                    		<option value="<?php echo $row2['subcat_id'];?>">
													<?php echo $row2['category_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
				  				</select>