<div id="printablediv"><div class="">
                    <div class="row">
            <div class="col-sm-6">
                <button class="btn-cs btn-sm-cs" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> Print </button>
                <a href="" class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button' target='_blank'><i class='fa fa-file'></i> PDF Preview</a>                <!--<button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#idCard"><span class="fa fa-floppy-o"></span> ID Card </button>-->

                <a href="edit_job?hiss=<?=encrypt($hiss);?>" class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'><i class='fa fa-edit'></i> Edit</a>
                <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#mail"><span class="fa fa-envelope-o"></span> Send Pdf to Mail</button>
            </div>
            
        </div>

		<div class="profile-view-head">
                <a href="#">

                <h1>Job Title: <?=$job_title;?></h1>
            </div>

								
				 <div class="row m-b-20">
					 <div class="col-md-3"><h3>Recruiter Name: </div><div class="col-md-9"><h3><?php echo $recruit_object->get_recruiter_name_by_code($recruiter_code); ?></h3></div>

					 <div class="col-lg-3"> <p><b>Category:</b> </div><div class="col-md-9"><?= $category_name;?></span></p></div>
					<div class="col-md-3"> <p><b>Sub Category:</b></div><div class="col-md-9"> <?= $sub_category_name;?></span></p></div>
					 <div class="col-lg-3"> <p><b>Sector:</b> </div><div class="col-md-9"><?= $sector_name;?></span></p></div>
					 <div class="col-lg-3"> <p><b>Job Type:</b> </div><div class="col-md-9"><?= $jobtype_name;?></span></p></div>
					 <div class="col-lg-3"> <p><b>Job Level:</b> </div><div class="col-md-9"><?= $joblevel_name;?></span></p></div>
					<div class="col-md-3"> <p><b>Description:</b></div><div class="col-md-9"> <?= $descript;?></span></p></div>
					<div class="col-md-3"> <p><b>Post Date:</b></div><div class="col-md-9"> <?= date('d M, Y', strtotime($startDate));?></span></p></div>
					<div class="col-md-3"> <p><b>Expiry Date:</b></div><div class="col-md-9"> <?= date('d M, Y', strtotime($endDate));?></span></p></div>
					<div class="col-md-3"> <p><b>Location:</b></div><div class="col-md-9"> <?= $location_name;?></span></p></div>
					<div class="col-md-3"> <p><b>Country:</b> </div><div class="col-md-9"><?= $country_name;?></span></p></div>
				</div>
                            
                            
                  	
    
                            
                            
                  	</div></div>
    