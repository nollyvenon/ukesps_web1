<?php

include('../z_db.php');
 $state_id = addslashes($_GET["q"]);
$jobloc_by_state = $zenta_operation->get_jobloc_by_state($state_id);


//echo $q;
?> 
							<select name="location_id" onfocus="ShowJobLocationbyState(this.value)" onchange="ShowJobLocationbyState(this.value)" data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Location</option>
										<?php 
										foreach($jobloc_by_state as $row2):
										?>
                                    		<option value="<?php echo $row2['location_id'];?>">
													<?php echo $row2['location_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>