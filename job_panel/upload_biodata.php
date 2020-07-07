<?php
require_once("header.php");

if (!$session_jobseek->is_logged_in()) {
    redirect_to("login.php");
} 

 $details = $client_operation->applicant_detail($jobseek_code);
extract($details);
if ($_POST['submit']){

	$place_of_birth = $_POST['place_of_birth'];
	$location = $_POST['location'];
	$country_of_residence = $_POST['country_of_residence'];
	$country_of_nationality = $_POST['country_of_nationality'];
	$languages = $_POST['languages'];
	$linked_profile	 = $_POST['linked_profile'];
	$twitter_profile = $_POST['twitter_profile'];
	$hobbies = $_POST['hobbies'];
	$skills = $_POST['skills'];
   	
	$biodata = $client_operation->add_biodata($jobseek_code, $resume, $cover_letter, $place_of_birth, $location, $country_of_residence,
	  $country_of_nationality, $languages, $linked_profile, $twitter_profile, $hobbies, $skills);
	
	if($biodata){
		redirect_to('upload_edu_experience');
	}else{
		$message_error = "Upload wasn't successful.";
	}

}
$countries = $zenta_operation->get_all_countries();
$jobseek_info = $jobsk_operation->get_user_by_code($jobseek_code);
extract($jobseek_info );
?>  


<script>
  $( function() {
    $( "#education_period_year_from_1, #education_period_year_to_1" ).datepicker();
  } );
  </script>
	
	<!--styles -->
	
	<div class="">
		<div class="row">
    <div class="col-12">
         <h4>Upload Your biodata</h4>
		<?php include_once("../layouts/feedback_message.php");?>
		<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
      <div class="row mb-3">
		  <input name="applicant_code"  class="form-control" type="hidden" id="applicant_code" size="30" value="<?php echo $jobseek_code;?>" />
        <div class="col-md-3">First Name <input name="first_name"  class="form-control" type="text" id="first_name" value="<?php echo $first_name;?>" /></div>
        <div class="col-md-3">Middle Name <input name="middle_name"  class="form-control" type="text" id="middle_name"  value="<?php echo $middle_name;?>" /></div>
		<div class="col-md-3">  Last Name <input name="last_name"  class="form-control" type="text" id="last_name" value="<?php echo $last_name;?>" /></div>
      </div>
	  <div class="row mb-3">
		  <div class="col-md-4">Resume <input type="file" name="resume" id="resume" class="form-control">
							<a href="docsxxx/<?=$jobseek_code;?>/<?= $resume;?>"><?= $resume;?></a></div>
		  
		  <div class="col-md-4">Cover Letter <input type="file" name="cover_letter" id="cover_letter" class="form-control">
							<a href="docsxxx/<?=$jobseek_code;?>/<?= $cover_letter;?>"><?= $cover_letter;?></a></div>
		</div>
		<div class="row mb-3">
		  <div class="col-md-4">Place of Birth <input name="place_of_birth"  class="form-control" type="text" id="place_of_birth" size="30" value="<?php echo $place_of_birth;?>" /></div>
		  
		  <div class="col-md-4">Languages <input name="languages"  class="form-control" type="text" id="languages" size="30" value="<?php echo $languages;?>" /></div>
		</div>
		<div class="row mb-3">
			<div class="col-md-4">Location <input name="location"  class="form-control" type="text" id="location" size="30" value="<?php echo $location;?>" /></div>
			
		  <div class="col-md-4">Country of Nationality <select name="country_of_nationality" data-required="true" class="selectpicker" data-live-search= "true">
          								<option value="">Select A Country</option>
										<?php 
										foreach($countries as $row2):
										?>
                                    		<option <?php if ($details['country_of_nationality'] == $row2['country_id']){?> selected="selected" <?php }?> value="<?php echo $row2['country_id'];?>">
													<?php echo $row2['country_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select></div>
		  
		  <div class="col-md-10">Country of Residence <select name="country_of_residence" data-required="true" class="selectpicker" data-live-search= "true">
          								<option value="">Select A Country</option>
										<?php 
										foreach($countries as $row3):
										?>
                                    		<option <?php if ($details['country_of_residence'] == $row3['country_id']){?> selected="selected" <?php }?> value="<?php echo $row3['country_id'];?>">
													<?php echo $row3['country_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select></div>
		</div>
		<div class="row mb-3">
		  <div class="col-md-4">Linkedin Profile <input name="linkedin_profile"  class="form-control" type="text" id="linkedin_profile" size="30" value="<?php echo $linkedin_profile;?>" /></div>
		  
		  <div class="col-md-4">Twitter ID <input name="twitter_profile"  class="form-control" type="text" id="twitter_profile" size="30" value="<?php echo $twitter_profile;?>" />	</div>
		</div>
		<div class="row mb-4">
		  <div class="col-md-4">Hobbies <input name="hobbies"  class="form-control" type="text" id="hobbies" value="<?php echo $hobbies;?>" /></div>
		  
		  <div class="col-md-4">Skills <input name="skills"  class="form-control" type="text" id="skills" value="<?php echo $skills;?>" /> 	</div>
		</div>
		<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Upload">
			
		</form>
		<?php if ($education_period_month_from_1 == ""){
		 echo "<a href=\"upload_edu_experience\">Upload Educational Experience</a>";
		}else{
		 echo "<a href=\"upload_edu_experience\">Update Educational Experience</a>";
		} 
		?>
		
		
	</div>
    
  </div>
</div>
</div>
</div>
</div>
						 
						  

	<?php include_once('footer.php');?>
	