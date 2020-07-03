<?php require_once '../layouts/feedback_message.php'; ?>
                                
                                <table class="table table-responsive table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Recruiter</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Location</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($content) && !empty($content)) { foreach ($content as $row) { ?>
                                        <tr>
                                            <td><?php echo $recruit_object->get_recruiter_name_by_code($row['recruiter_code']); ?></td>
                                            <td><?php echo $row['job_title']; ?></td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php echo $row['sub_category_name']; ?></td>
                                            <td><?php echo $row['location_name']; ?></td>
                                            <td><?php echo $row['country_name']; ?></td>
                                            <td><a class="btn btn-border green" href="view_job?hiss=<?php echo encrypt($row['jobs_id']); ?>"><span> <i class="fa fa-briefcase"></i></span></a>
											<a class="btn btn-border red" href="edit_job?hiss=<?php echo encrypt($row['jobs_id']); ?>"><span> <i class="fa fa-edit"></i></span></a>
                                            <a class="btn btn-border dark" href="del_job.php?hiss=<?php echo encrypt($row['jobs_id']); ?>"><span> <i class="fa fa-trash"></i></span></a>
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