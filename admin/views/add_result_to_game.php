<div class="col-xs-12">
                            <?php require_once '../layouts/feedback_message.php'; ?>
                            <form class="form-horizontal" role="form" method="post">

                    <div class='form-group' >                        
						<label for="game_id" class="col-sm-2 control-label">
                          Game ID                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="game_id" name="game_id" value="<?php echo $hiss;?>" readonly >
							
                        </div>
                        <span class="col-sm-4 control-label">
                                                    </span>
                    </div>
								
					<div class='form-group' >                        
						<label for="game_id" class="col-sm-2 control-label">
                          Game League                       </label>
                        <div class="col-sm-6">
                            <?php echo $game_league;?>
							
                        </div>
                        <span class="col-sm-4 control-label">
                                                    </span>
                    </div>
					<div class='form-group' >                        
						<label for="game_id" class="col-sm-2 control-label">
                          Game                        </label>
                        <div class="col-sm-6">
                            <?php echo $game_team1;?> vs <?php echo $game_team2;?>
							
                        </div>
                        <span class="col-sm-4 control-label">
                                                    </span>
                    </div>

                    <div class='form-group' >                        
						<label for="result_score" class="col-sm-2 control-label">
                          Result Score                        
						</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="result_score" name="result_score" value="<?php echo $result_score;?>"  >
							
                        </div>
                        <span class="col-sm-4 control-label">
                                                    </span>
                    </div>
								
					<div class='form-group' >                        
						<label for="result_status" class="col-sm-2 control-label">
                          Result Status                        
						</label>
                        <div class="col-sm-6">
                            <select name="result_status" data-required="true" class="form-control"  required>
								<option value="">Select Result Status</option>
								<option value="1">Won</option>
								<option value="2">Lost</option>
							</select>
							
                        </div>
                        <span class="col-sm-4 control-label">
                                                    </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input name="process" type="submit" class="btn btn-success" value="Complete Process" >
                        </div>
                    </div>

                </form>

</div>