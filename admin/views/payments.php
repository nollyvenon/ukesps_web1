
                        
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="multi-colum-dt1"
                                                               class="table table-striped table-bordered nowrap">
                                                            <thead>
                                            <tr>
                                                <th class="col-sm-1">#</th>
                                                <th class="col-sm-2">Full Name</th>
                                                <th class="col-sm-2">Pack Bought</th>
                                                <th class="col-sm-2">Pay Mthd</th>
                                                <th class="col-sm-2">Currency</th>
                                                <th class="col-sm-1">Pay Date</th>
                                                <!--<th class="col-sm-2">Action</th>-->
                                                                                            </tr>
                                        </thead>
                                        <tbody>
 							<?php if(isset($payments) && !empty($payments)) { foreach ($payments as $row) {
	$package_name = $shopperOperation->get_package_by_id($row['packageID'])['package_name'];
	$payment_method = $zentabooks_operation->get_payment_method_by_id($row['payment_method'])['name'];
	$currency_code = $shopperOperation->get_currency_info($row['currency'])['currency_code'];
	$fullname = $zentabooks_operation->get_user_by_code($row['user_code'])['fullname'];
							?>
												   <tr>
                                                    <td data-title="#"><?php echo $row['id'];?></td>
                                                    <td data-title="Name"><?php echo $fullname;?></td>
                                                    <td data-title="Address"><?php echo $package_name;?></td>
                                                    <td data-title="City"><?php echo $payment_method;?></td>
                                                    <td data-title="LGA"><?php echo $currency_code;?></td>
                                                    <td data-title="Status">  <?php echo date('d M, Y',strtotime($row['payment_date']));?> </td>
                                                   <!-- <td data-title="Action"> <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Actions  
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="view_owner_det?hiss=<?php echo encrypt($row['recruiter_code']); ?>" ><i class="fa fa-file-excel-o"></i>View </a> </li>
    <!--<li><a href="add_an_owner_to_house?hiss=<?php echo encrypt($row['recruiter_code']); ?>"><i class="fa fa-plus-square"></i>Add owner to House</a></li> 
	<li><a href="remove_an_owner_from_house?hiss=<?php echo encrypt($row['recruiter_code']); ?>"><i class="fa fa-plus-square"></i>Remove owner From House</a></li>
    <li><a href="edit_owner?hiss=<?php echo encrypt($row['recruiter_code']); ?>"><i class="fa fa-plus-square"></i>Edit</a></li>
  <?php //if (contains( '13',$allowed_pages)) { ?>
 <li><a href="#" class="po" title="<b>Delete</b>"
                                           data-content='<div style="width:150px;"><p>Are you sure?</p><a class="btn btn-danger" id="<?= $row['recruiter_code'] ?>" href="del_owner?hiss=<?php echo encrypt($row['recruiter_code']); ?>">Yes I am Sure</a> <button class="btn po-close">No</button></div>'
                                           data-html="true"  data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
                                           
                    </li>-->    
                    <?php //} ?>
  </ul>
</div></td>
                                                                                                   </tr>
<?php  } } ?>                                                                                                   
                                                                                    </tbody>
                                    </table>
                                </div>
                                                                 