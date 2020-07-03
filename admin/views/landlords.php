			
						<div class="col-sm-12">

                <h5 class="page-header">
                                            <a href="<?=SITE_URL;?>/xadmin/add_owner_listing">
                            <i class="ti-plus"></i>
                            Add a house Listing                        </a>
                                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                        <!--<form class="form-horizontal" method="post">
                            <select name="lgaID" id='lgaID' class='form-control select2'>
                                <option selected="selected">Select LGA</option>
                                <?php  foreach ($alllga as $row) {   ?>
                                <option value="<?=$row['lga_id'];?>"><?=$row['lga_name'];?></option>
                                <?php } ?>
                            </select>-->
                        </form>
                    </div>
                </h5>

                                    <div class="nav-tabs-custom"><table id="multi-colum-dt"
                                                               class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1">#</th>
                                                <th class="col-sm-2">Full Name</th>
                                                <th class="col-sm-2">House Address</th>
                                                <th class="col-sm-2">City</th>
                                                <th class="col-sm-2">LGA</th>
                                                <th class="col-sm-1">Status</th>
                                                <th class="col-sm-2">Action</th>
                                                                                            </tr>
                                        </thead>
                                        <tbody>
 							<?php if(isset($landowners) && !empty($landowners)) { foreach ($landowners as $row) {
									$area_name = $zentabooks_operation->get_area_by_id($row['areaID']);
	$city = $zentabooks_operation->get_city_by_id($row['cityID']);
	$lga = $zentabooks_operation->get_lga_by_id($row['lgaID']);
	$fullname = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
	$occup_info = $zentabooks_operation->get_occupation_by_id($row['occupation_id']);
	$house_info = $zentabooks_operation->get_house_by_id($row['houseID']);
							?>
                                                                                           <tr>
                                                    <td data-title="#"><?php echo $row['owner_code'];?></td>
                                                    <td data-title="Name"><?php echo $fullname;?></td>
                                                    <td data-title="Address"><?php echo $row['house_number'].' '.$row['street_name'].' '.$area_name;?></td>
                                                    <td data-title="City"><?php echo $row['city'];?></td>
                                                    <td data-title="LGA"><?php echo $lga;?></td>
                                                    <td data-title="Status">  <?php echo owner_status($row['owner_type']);?> </td>
                                                    <td data-title="Action"> <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Actions  
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="view_owner_det?hiss=<?php echo encrypt($row['recruiter_code']); ?>" ><i class="fa fa-file-excel-o"></i>View </a> </li>
    <!--<li><a href="add_an_owner_to_house?hiss=<?php echo encrypt($row['recruiter_code']); ?>"><i class="fa fa-plus-square"></i>Add owner to House</a></li> 
	<li><a href="remove_an_owner_from_house?hiss=<?php echo encrypt($row['recruiter_code']); ?>"><i class="fa fa-plus-square"></i>Remove owner From House</a></li>
    <li><a href="edit_owner?hiss=<?php echo encrypt($row['recruiter_code']); ?>"><i class="fa fa-plus-square"></i>Edit</a></li>
  <?php if (contains( '13',$allowed_pages)) { ?>
 <li><a href="#" class="po" title="<b>Delete</b>"
                                           data-content='<div style="width:150px;"><p>Are you sure?</p><a class="btn btn-danger" id="<?= $row['recruiter_code'] ?>" href="del_owner?hiss=<?php echo encrypt($row['recruiter_code']); ?>">Yes I am Sure</a> <button class="btn po-close">No</button></div>'
                                           data-html="true"  data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
                                           
                    </li>-->    
                    <?php } ?>
  </ul>
</div></td>
                                                                                                   </tr>
<?php  } } ?>                                                                                                   
                                                                                    </tbody>
                                    </table>
                                </div>

                            </div>

                                                                 