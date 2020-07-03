 <form class="form-horizontal" role="form" method="post">
<?php require_once '../layouts/feedback_message.php'; ?>
	 
								<div class="row m-b-20">
									<div class="col-md-4">
										<label for="business_code" class="control-label">Business ID</label>
                                        <input type="text" class="form-control" value="<?=$business_code;?>" name="business_code" required readonly>
                                    </div>
                                    <div class="col-md-4">
										<label for="business_name" class="control-label">Full Name/Business Name</label>
                                        <input type="text" class="form-control" value="<?=$business_name;?>" name="business_name" required placeholder="Business Name">
                                    </div>
									<div class="col-md-4">
										<label for="phone_number" class="control-label">Phone Number</label>
                                        <input type="text" class="form-control" value="<?=$phone_number;?>" name="phone_number" required placeholder="Phone Number">
                                    </div>
								</div>							
								<div class="row m-b-20">
									<div class="col-md-4">
										<label for="phone_number" class="control-label">BVN</label>
                                        <input type="text" class="form-control" value="<?=$bvn;?>" name="bvn" required placeholder="Bank Verification Number">
                                    </div>
								</div>							
								<div class="row m-b-20">
                                    <div class="col-md-4">
 										<label for="dob" class="control-label">Date of Birth</label>
											<div class='input-group'>
												<input id="dropper-default" value="<?= date('m/d/Y',strtotime($dob));?>" name="dob" type='text' readonly class="form-control" />
												<span class="input-group-addon ">
			   <span class="icofont icofont-ui-calendar"></span>
												</span>
											</div>
                                    </div>
									<div class="col-md-6">
										
										<label for="business_type" class="control-label">Business Type</label>
										<select name="business_type" data-required="true" class="form-control"  required>
												<option value="">Select Business Type</option>
												<?php 
											$business_type = $zentabooks_operation->get_businesstypes();
												foreach($business_type as $row2):
												?>
													<option <?php if ($business_detail['business_type'] == $row2['businesstype_id']){?> selected="selected" <?php }?> value="<?php echo $row2['businesstype_id'];?>">
													<?php echo $row2['businesstype_name'];?>
														</option>

												<?php
												endforeach;
												?>
												</select>
                                    </div>
								</div>							
								<div class="row m-b-20">
									<div class="col-md-6">
										<label for="village" class="control-label">Towns</label>
                                       <select name="village" data-required="true" class="form-control" >
          								<option value="">Select A Town</option>
										<?php 
										foreach($towns as $row2):
										?>
										   <option <?php if ($business_detail['townID'] == $row2['town_id']){?> selected="selected" <?php }?> value="<?php echo $row2['town_id'];?>">
													<?php echo $row2['town_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
									
									<div class="col-md-6">
										<label for="village" class="control-label">Village</label>
                                       <select name="village" data-required="true" class="form-control" >
          								<option value="">Select A Village</option>
										<?php 
										foreach($villages as $row2):
										?>
											<option <?php if ($business_detail['villageID'] == $row2['village_id']){?> selected="selected" <?php }?> value="<?php echo $row2['village_id'];?>">
													<?php echo $row2['village_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
                                </div>														
								<!--<div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="" name="acceptance" required>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept <a href="#">Terms &amp; Conditions.</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!--<button name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>-->
										<input name="submit" type="submit"  class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Add Business">
                                    </div>
                                </div>
</form>