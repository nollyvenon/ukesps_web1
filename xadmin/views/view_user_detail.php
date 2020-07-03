<div id="printablediv"><div class="">
                    <div class="row">
            <div class="col-sm-6">
                <button class="btn-cs btn-sm-cs" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> Print </button>
                <a href="" class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button' target='_blank'><i class='fa fa-file'></i> PDF Preview</a>                <!--<button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#idCard"><span class="fa fa-floppy-o"></span> ID Card </button>-->

                <a href="edit_user?hiss=<?=encrypt($hiss);?>" class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'><i class='fa fa-edit'></i> Edit</a>
                <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#mail"><span class="fa fa-envelope-o"></span> Send Pdf to Mail</button>
            </div>
            
        </div>
				<?php 

                                ?>
            <div class="profile-view-head">
                <a href="#">
                    <?php 
					//echo $zentabooks_operation->get_user_pic($user_code,'student','','','','round');?></a>

                <h1><?=$fullname;?></h1>
            </div>
							<div class="row">
								<div class="col-lg-12"><h2>Personal Information</h2></div>
                              <!-- <h5> <div class="col-lg-12"><p><span>First name: <?= $first_name;?></span></p></div>
                                <div class="col-lg-12"> <p><span>Middle Name: <?= $middle_name;?></span></p></div>
                                <div class="col-lg-12"><p><span>Last Name: <?= $last_name;?></span></p></div>-->
                                <div class="col-lg-12"><p><span>Username: <?= $username;?></span></p></div>
                                <div class="col-lg-12"><p><span>Email: <?= $email;?></span></p></div>
                                <div class="col-lg-12"><p><span>Phone: <?= $phone_number;?></span></p></div>
                                <div class="col-lg-12"><p><span>Country: <?= $country;?></span></p></div>
                            </div>
                            
                            
                  	</div></div>
    