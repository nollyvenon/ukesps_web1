<form class="form-horizontal" role="form" method="post">
	  <?php require_once '../layouts/feedback_message.php'; ?>
                                <div class="row m-b-20">
                                    <div class="col-md-6">
                                        <input type="text" id="register_name" name="register_name" value="" required class="form-control" />
                                    </div>
                                </div>															
								<div class="input-group">
                                    <input type="text" class="form-control" name="username" value="<?=$username;?>" placeholder="Choose Username">
                                    <span class="md-line"></span>
                                </div>
								<!--<div class="row m-b-20">
									<div class="col-md-6">
										<input type="password" class="form-control" name="register_password" placeholder="Choose Password">
										<span class="md-line"></span>
									</div>
									<div class="col-md-6">
										<input type="password" class="form-control" name="register_repassword" placeholder="Confirm Password">
										<span class="md-line"></span>
									</div>
								</div>-->
															
                                <div class="input-group">
                                    <input type="text" class="form-control" name="register_email" value="<?=$email;?>" placeholder="Your Email Address">
                                    <span class="md-line"></span>
                                </div>
								<div class="input-group">
                                    <input type="text" class="form-control" name="register_phone" value="<?=$phone;?>" placeholder="Your Phone Number">
                                    <span class="md-line"></span>
                                </div>							
									<div class="col-md-6">
                                        <select name="country" data-required="true" class="form-control"  required>
          								<option value="">Select Country of Origin</option>
										<?php 
										foreach($countries as $row2):
										?>
                                    		<option <?php if ($country==$row2['id']){ echo 'selected';}?> value="<?php echo $row2['id'];?>">
													<?php echo $row2['name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Edit User</button>
                                    </div>
                                </div>