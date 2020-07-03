 <form class="form-horizontal" role="form" method="post">
<?php require_once '../layouts/feedback_message.php'; ?>
	 <input type="hidden" name="token" value="<?php echo $hiss;?>" />
								<div class="row m-b-20">
                                    <div class="col-md-8">
 										<label for="location" class="control-label">Location Name</label>
										<input type="text" class="form-control" id="location" name="location" value="<?php echo $location_name;?>"  >
                                    </div>
	 							</div>
	 
	 							
	 							<div class="row m-b-20">
									<div class="col-md-6">
										<label for="country_id" class="control-label">Country</label><br>
                                       <select name="country_id" onfocus="ShowStatebyCountry(this.value)" onchange="ShowStatebyCountry(this.value)" data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A Country</option>
										<?php 
										foreach($countries as $row2):
										?>
                                    		<option <?php if ($country_id == $row2['country_id']){ echo 'selected';}  ?> value="<?php echo $row2['country_id'];?>">
													<?php echo $row2['country_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
									
								</div>
	 
	 							<div class="col-md-6">
										<label for="state_id" class="control-label">State</label><br>
                                      <div id="txtHint1"> <select name="state_id" data-required="true" class="form-control selectpicker" data-live-search= "true">
          								<option value="">Select A State</option>
										<?php 
										foreach($states as $row2):
										?>
                                    		<option <?php if ($state_id == $row2['state_id']){ echo 'selected';}  ?> value="<?php echo $row2['state_id'];?>">
													<?php echo $row2['state_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
										  </select></div>
                                    </div>
	 							
	 
                                <div class="row m-t-30">
                                    <div class="col-md-12">
										<input name="edit_location" type="submit"  class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Edit Location">
                                    </div>
                                </div>
</form>