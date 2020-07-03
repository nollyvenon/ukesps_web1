<div class="col-xs-12">
                            
                            <form class="form-horizontal" role="form" method="post">

                    <div class='form-group' >                        <label for="recruiter_code" class="col-sm-2 control-label">
                            Owner ID                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="recruiter_code" name="recruiter_code" value="" >
                        </div>
                        <span class="col-sm-4 control-label">
                                                    </span>
                    </div>

                    <div class='form-group' >                        <label for="business_id" class="col-sm-2 control-label">
                           Old Business ID                        </label>
                        <div class="col-sm-6">
                            <?php if ($hiss=="" ){?>
                            <input type="text" class="form-control" id="business_id" name="business_id" value="" >
							<?php }else{ ?>
                            <input type="text" class="form-control" id="business_id2" name="business_id2" value="<?php echo $housing_code;?>" readonly >
							<input type="hidden" class="form-control" id="business_id" name="business_id" value="<?php echo $hiss;?>">
							<?php } ?>
                        </div>
                        <span class="col-sm-4 control-label">
                                                    </span>
                    </div>

                    <div class='form-group' >                        <label for="note" class="col-sm-2 control-label">
                            Reason                        </label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;" class="form-control" id="note" name="note" required></textarea>
                        </div>
                        <span class="col-sm-4 control-label">Note: This might be confirmed from the exiting Landlord for security purposes.
                                                    </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input name="process" type="submit" class="btn btn-success" value="Complete Process" >
                        </div>
                    </div>

                </form>

</div>