<table id="multi-colum-dt1"
                                                               class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1">#</th>
                                                <th class="col-sm-2">Full Name</th>
                                                <th class="col-sm-2">Username</th>
                                                <th class="col-sm-2">Phone</th>
                                                <th class="col-sm-2">Email</th>
                                                <th class="col-sm-1">Status</th>
                                                <th class="col-sm-2">Action</th>
                                                                                            </tr>
                                        </thead>
                                        <tbody>
 							<?php if(isset($users) && !empty($users)) { foreach ($users as $row) {
								//	$area_name = $zentabooks_operation->get_area_by_id($row['areaID']);
							?>
                                               <tr>
                                                    <td data-title="ID"><?php echo $row['id'];?></td>
                                                    <td data-title="Name"><?php echo $row['fullname'];?></td>
                                                    <td data-title="Username"><?php echo $row['username'];?></td>
                                                    <td data-title="Phone"><?php echo $row['phone'];?></td>
                                                    <td data-title="Email"><?php echo $row['email'];?></td>
                                                    <td data-title="Status"><?php echo status_user($row['status']);?></td>
                                                    <td data-title="Action"> <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Actions  
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="view_user_detail.php?hiss=<?php echo encrypt($row['id']); ?>" ><i class="fa fa-file-excel-o"></i>View </a> </li>
	  <?php if ($row['status']='1'){ ?>
    <li><a href="activate_user?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Deactivate User</a></li>
	  <?php }else{ ?>
    <li><a href="activate_user?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Activate User</a></li>
	  <?php } ?>
	<li><a href="extend_user_period?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Extend User Period</a></li>
    <li><a href="edit_user?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Edit</a></li>    
  <?php if (contains( '13',$allowed_pages)) { ?>
 <li><a href="#" class="po" title="<b>Delete</b>"
                                           data-content='<div style="width:150px;"><p>Are you sure?</p><a class="btn btn-danger" id="<?= $row['id'] ?>" href="delete_user?hiss=<?php echo encrypt($row['id']); ?>">Yes I am Sure</a> <button class="btn po-close">No</button></div>'
                                           data-html="true"  data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
                                           
                    </li>
                    <?php } ?>
  </ul>
</div></td>
                                                                                                   </tr>
<?php  } } ?>                                                                                                   
                                                                                    </tbody>
                                    </table>
                              