 <form class="form-horizontal" role="form" method="post">
<?php require_once '../layouts/feedback_message.php'; ?>
								<div class="row m-b-20">
                                    <div class="col-md-8">
 										<label for="state_name" class="control-label">State Name</label>
										<input type="text" class="form-control" id="state_name" name="state_name" value="<?php echo $state_name;?>"  >
                                    </div>
	 							</div>

	 							
	 							<div class="col-md-6">
										<label for="country_id" class="control-label">Country</label><br>
                                       <select name="country_id" data-required="true" class="form-control" data-live-search= "true">
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
          								</select>
                                    </div>
	 
                                <div class="row m-t-30">
                                    <div class="col-md-12">
										<input name="add_state" type="submit"  class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Location">
                                    </div>
                                </div>
</form>