			<div class="dt-responsive table-responsive">
                                                        <table id="multi-colum-dt1"
                                                               class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1">#</th>
                                                <th width="10%">Date</th>
                                                <th  width="15%">League</th>
                                               	<th width="45%">Home  VS  Away </th> 
                                                <th width="15%">Tip</th>
												<th width="15%">Score</th>
												<th width="15%">Result</th>
                                                <th class="col-sm-2">Action</th>
                                                                                            </tr>
                                        </thead>
                                        <tbody>
 							<?php if(isset($game_listing) && !empty($game_listing)) { foreach ($game_listing as $row2) {

							?>
                                          <tr>
											<td data-title="#"><?php echo $row2['game_id'];?></td>
											<td data-title="#"><?=date('d M, Y H:i',strtotime($row2['game_start_date'].' '.$row2['game_start_time']));?></td>
											<td data-title=""><?php echo $row2['game_league'];?></td>
											<td data-title=""><?=$row2['game_team1'];?>&nbsp;&nbsp; VS &nbsp;&nbsp;<?=$row2['game_team2'];?></td>
											<td data-title=""><?php echo $row2['odd_type'];?></td>
											<td data-title=""><?=$row2['result_score'];?> </td>
											<td data-title="Status"><?php echo result_status($row2['result_status']);?></td>
											<td data-title="Action"> <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Actions  
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <!--<li><a href="view_game?hiss=<?php echo encrypt($row2['game_id']); ?>" ><i class="fa fa-file-excel-o"></i>View </a> </li>
    <li><a href="edit_game_listing?hiss=<?php echo encrypt($row2['game_id']); ?>"><i class="fa fa-plus-square"></i>Edit</a></li>-->    
    <li><a href="add_result_to_game?hiss=<?php echo encrypt($row2['game_id']); ?>"><i class="fa fa-plus-square"></i>Add Result</a></li>    
  <?php //if (contains( '13',$allowed_pages)) { ?>
 <li><a href="#" class="po" title="<b>Delete</b>"
                                           data-content='<div style="width:150px;"><p>Are you sure?</p><a class="btn btn-danger" id="<?php echo $row2['game_id'] ?>" href="del_game?hiss=<?php echo encrypt($row2['game_id']); ?>">Yes I am Sure</a> <button class="btn po-close">No</button></div>'
                                           data-html="true"  data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
                                           
                    </li>
                    <?php //} ?>
  </ul>
</div></td>
                                                                                                   </tr>
<?php  } } ?>                                                                                                   
                                                                                    </tbody>
                                    </table>
</div>