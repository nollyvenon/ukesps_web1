
        <div class="row right">
            <div class="col-sm-6">
                <button class="btn-cs btn-sm-cs" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> Print </button>
                <a href="" class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button' target='_blank'><i class='fa fa-file'></i> PDF Preview</a>                
				<button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#idCard"><span class="fa fa-floppy-o"></span> ID Card </button>

                <a href="edit_business_listing?hiss=<?=encrypt($hiss);?>" class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'><i class='fa fa-edit'></i> Edit</a>
                <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#mail"><span class="fa fa-envelope-o"></span> Send Pdf to Mail</button>
            </div>
        </div>
				<?php 
	$town = $zentabooks_operation->get_town_by_id($townID);
	$village = $zentabooks_operation->get_village_by_id($villageID);
	$lga = $zentabooks_operation->get_lga_by_id($lgaID);
	$state_name = $zentabooks_operation->get_state_by_id($stateID);
	$owner_occup= $zentabooks_operation->get_owner_by_id($row['owner_recruiter_code']);
	$occup_info = $zentabooks_operation->get_occupation_by_id($owner_occup['occupation_id']);
                                ?>

								
					 <div class="row m-b-20">
						 <div class="col-md-3"><h3>Business Code: </div><div class="col-md-9"><h3><?=$business_code;?></h3></div>

						 <div class="col-lg-3"> <p><b>Name/Business Name:</b> </div><div class="col-md-9"><?= $business_name;?></span></p></div>
						<div class="col-md-3"> <p><b>Village:</b></div><div class="col-md-9"> <?= $village['village_name'];?></span></p></div>
						<div class="col-md-3"> <p><b>Town:</b></div><div class="col-md-9"> <?= $town['town_name'];?></span></p></div>
						<div class="col-md-3"> <p><b>Business Type:</b> </div><div class="col-md-9"><?= $zentabooks_operation->get_businesstype_by_id($business_type)['businesstype_name'];?></span></p></div>
						<div class="col-md-3"> <p><b>LGA:</b> </div><div class="col-md-9"><?= $lga['lga_name'];?></span></p></div>
						<!--<div class="col-lg-12"><p><span>State: <?= $state_name;?></span></p></div>
						<div class="col-lg-12"><p><span>Country: Nigeria</span></p></div>-->
					</div>
                            
                            
                  	
    