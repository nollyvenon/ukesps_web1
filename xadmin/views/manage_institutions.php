<?php require_once '../layouts/feedback_message.php'; ?>
                                
                                 <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Institution</th>
											<th>Location</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($content) && !empty($content)) { foreach ($content as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['institute_id']; ?></td>
                                            <td><?php echo $row['institute_name']; ?></td>
                                            <td><?php echo $row['location_name']; ?></td>
                                            <td><?php echo $row['state_name']; ?></td>
                                            <td><?php echo $row['country_name']; ?></td>
                                            <td><a class="btn btn-border green" href="edit_institution?hiss=<?php echo encrypt($row['institution_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-border dark" href="del_institution.php?hiss=<?php echo encrypt($row['institution_id']); ?>"> <i class="fa fa-trash"></i></a>
											</td>
                                        </tr>
                                        <?php } } else { echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>"; } ?>
                                    </tbody>
                                </table>         
<!-- pagination -->
                                <div class="page-pagination clear-fix">
						<?php 
							if($currentpage  > 1){?>
						<a href="?pg=<?=$currentpage-1;?>"><i class="fa fa-angle-double-left"></i></a>
						<?php } 
						for($currentpage = $totalpages; $currentpage < $totalpages; $i++): if($currentpage <= $totalpages): ?>
						<a href="?pg=<?=$currentpage;?>" class="active"><?=$pg;?>
						<?php endif; endfor;
							if ($currentpage > $totalpages) { ?>
						--><a href="?pg=<?=$currentpage+1;?>"><?=$currentpage+1;?></a><!-- 
						--><a href="?pg=<?=$currentpage+2;?>"><?=$currentpage+2;?></a><!-- 
						--><a href="?pg=<?=$currentpage+3;?>"><i class="fa fa-angle-double-right"></i></a>
						<?php }  ?>
					</div>
                                <!-- / pagination -->  
				