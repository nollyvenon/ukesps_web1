<?php require_once '../layouts/feedback_message.php'; ?>
                                
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Location</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($content) && !empty($content)) { foreach ($content as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['location_id']; ?></td>
                                            <td><?php echo $row['location_name']; ?></td>
                                            <td><?php echo $row['state_name']; ?></td>
                                            <td><?php echo $row['country_name']; ?></td>
                                            <td><a class="btn btn-border green" href="edit_course_location?hiss=<?php echo encrypt($row['location_id']); ?>"><span> <i class="fa fa-edit"></i></span></a>
                                            <a class="btn btn-border dark" href="del_course_location.php?hiss=<?php echo encrypt($row['location_id']); ?>"><span> <i class="fa fa-trash"></i></span></a>
											</td>
                                        </tr>
                                        <?php } } else { echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>"; } ?>
                                    </tbody>
                                </table>         
<!-- pagination -->
                                <div class="page-pagination clear-fix">
                                    <?php $pg = intval($_GET['pg']);
                                        if($pg > 1){ ?>
                                    <a href="?pg=<?=$pg-1;?>"><i class="fa fa-angle-double-left"></i></a>
                                    <a href="?pg=<?=$pg;?>" class="active"><?=$pg;?></a>
                        <?php } ?>
                            <!-- 
                                    --><a href="?pg=<?=$pg+1;?>"><?=$pg+1;?></a><!-- 
                                    --><a href="?pg=<?=$pg+2;?>"><?=$pg+2;?></a><!-- 
                                    --><a href="?pg=<?=$pg+3;?>"><i class="fa fa-angle-double-right"></i></a>
                                </div>
                                <!-- / pagination -->  
				