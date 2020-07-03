<?php
require_once("header.php"); ?>
<script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<?php
$details = $client_operation->applicant_detail($jobseek_code);

extract($details);

if ($_POST['submit']){
	$years_of_experience = $_POST['years_of_experience'];
	$current_work_experience_month_from_1 = $_POST['current_work_experience_month_from_1'];
	$current_work_experience_year_from_1 = $_POST['current_work_experience_year_from_1'];
	$current_work_experience_company_1 = $_POST['current_work_experience_company_1'];
	$current_work_experience_position_1 = $_POST['current_work_experience_position_1'];
	$current_work_experience_duties_1= $_POST['current_work_experience_duties_1'];
	$current_work_experience_highlights_1 = $_POST['current_work_experience_highlights_1'];
	
	$previous_work_experience_month_from_1 = $_POST['previous_work_experience_month_from_1'];
	$previous_work_experience_month_to_1 = $_POST['previous_work_experience_month_to_1'];
	$previous_work_experience_year_to_1 = $_POST['previous_work_experience_year_to_1'];
	$previous_work_experience_year_from_1 = $_POST['previous_work_experience_year_from_1'];
	$previous_work_experience_company_1 = $_POST['previous_work_experience_company_1'];
	$previous_work_experience_position_1 = $_POST['previous_work_experience_position_1'];
	$previous_work_experience_duties_1= $_POST['previous_work_experience_duties_1'];
	
	$previous_work_experience_highlights_1 = $_POST['previous_work_experience_highlights_1'];


	 $work_exper = $client_operation->add_work_experience($session_jobseek, $years_of_experience,
	  $current_work_experience_company_1, $current_work_experience_position_1,
	   $current_work_experience_duties_1, $current_work_experience_highlights_1,
	    $previous_work_experience_month_from_1, $previous_work_experience_month_to_1,
	 	$previous_work_experience_year_from_1, $previous_work_experience_year_to_1,
	 	 $previous_work_experience_level_1, $previous_work_experience_company_2,
	 	  $previous_work_experience_position_2, $previous_work_experience_duties_2,
	 	   $previous_work_experience_highlights_2, $current_work_experience_month_from_2,
	 		$current_work_experience_month_from_1, $current_work_experience_year_from_1,
	 		 $current_work_experience_year_to_2, $current_work_experience_level_2, $current_work_experience_company_3, $current_work_experience_position_3, $current_work_experience_duties_3, $current_work_experience_highlights_3, $current_work_experience_month_from_3, $current_work_experience_month_to_3, $current_work_experience_year_from_3, $current_work_experience_year_to_3, $current_work_experience_level_3 );
			
	
	if($work_exper){
		$message_success = "Work experience uploaded successfully.";
	}else{
		$message_error = "Upload wasn't successful.";
	}

}

?>
  <script>
  $( function() {
    $( "#education_period_year_from_1, #education_period_year_to_1" ).datepicker();
  } );
  </script>
	
	
	<div class="page-content sitemap container container-fluid clear-fix">
		<div class="row">
    <div class="col-12">
		<?php include_once("../layouts/feedback_message.php");?>
        <h3>Upload Your Work Experience</h3>
		<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
		<div class="row ">
		  <div class="col-md-12"><b>Current Work Experience</b></div> 
		</div>
		<div class="row mb-3">
			<div class="col-md-12">
				Years of Experience
				<input name="years_of_experience"  class="form-control" type="text" id="years_of_experience" value="<?php echo $years_of_experience;?>" placeholder="Enter Years of Experience" />
			</div>
		</div>
		<div class="row mb-3">
		  <div class="col-md-4">From Month: 
		  <select name="current_work_experience_month_from_1" data-required="true" class="selectpicker" data-live-search= "true">
          								<option value="">Select Month</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '1'){?> selected="selected" <?php }?> value="1">January</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '2'){?> selected="selected" <?php }?> value="2">February</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '3'){?> selected="selected" <?php }?> value="3">March</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '4'){?> selected="selected" <?php }?> value="4">April</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '5'){?> selected="selected" <?php }?> value="5">May</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '6'){?> selected="selected" <?php }?> value="6">June</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '7'){?> selected="selected" <?php }?> value="7">July</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '8'){?> selected="selected" <?php }?> value="8">August</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '9'){?> selected="selected" <?php }?> value="9">September</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '10'){?> selected="selected" <?php }?> value="10">October</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '11'){?> selected="selected" <?php }?> value="11">November</option>
          								<option <?php if ($details['current_work_experience_month_from_1'] == '12'){?> selected="selected" <?php }?> value="12">December</option>

          								</select> </div>
		  
		  <div class="col-md-6">From Date: <input type="text"
		   id="current_work_experience_year_from_1" name="current_work_experience_year_from_1"> 	</div>

		</div>
		<div class="row mb-3">							
							<div class="col-md-4">
                             	Company <input name="current_work_experience_company_1"  class="form-control" type="text" id="current_work_experience_company_1" placeholder="Enter Current Company" value="<?php echo $current_work_experience_company_1;?>" />
                        	</div>
							<div class="col-md-6">
                             	Position <input name="current_work_experience_position_1"  class="form-control" type="text" id="current_work_experience_position_1" placeholder="Enter Current Position" value="<?php echo $current_work_experience_position_1;?>" />
                        	</div>
			</div>
		<div class="row mb-5">
							<div class="col-md-4">
								Work Duties
                             	<input name="current_work_experience_duties_1"  class="form-control" type="text" id="current_work_experience_duties_1" value="<?php echo $current_work_experience_duties_1;?>" placeholder="Enter Duties" />
                        	</div>
							<div class="col-md-6">
								Highlights <textarea id="current_work_experience_highlights_1" name="current_work_experience_highlights_1"  class="form-control" cols="45" rows="5" aria-required="true" placeholder="Enter Work Highlights"><?php echo $current_work_experience_highlights_1;?></textarea>
                       	  </div>
		</div>
		
		<div class="row ">
		  <div class="col-md-12"><b>Previous Work Experience</b></div> 
		</div>
		<div class="row mb-3">
		  <div class="col-md-5">From Month: <select name="previous_work_experience_month_from_1" data-required="true" class="selectpicker" data-live-search= "true">
          								<option value="">Select Month</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '1'){?> selected="selected" <?php }?> value="1">January</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '2'){?> selected="selected" <?php }?> value="2">February</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '3'){?> selected="selected" <?php }?> value="3">March</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '4'){?> selected="selected" <?php }?> value="4">April</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '5'){?> selected="selected" <?php }?> value="5">May</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '6'){?> selected="selected" <?php }?> value="6">June</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '7'){?> selected="selected" <?php }?> value="7">July</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '8'){?> selected="selected" <?php }?> value="8">August</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '9'){?> selected="selected" <?php }?> value="9">September</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '10'){?> selected="selected" <?php }?> value="10">October</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '11'){?> selected="selected" <?php }?> value="11">November</option>
          								<option <?php if ($details['previous_work_experience_month_from_2'] == '12'){?> selected="selected" <?php }?> value="12">December</option>

          								</select> </div>
		  
		  <div class="col-md-5">To Date: <input type="text"
		   id="current_work_experience_year_from_1" name="previous_work_experience_year_from_1"> 	</div>
		  <div class="col-md-4">To Month: <select name="previous_work_experience_month_to_1" data-required="true" class="selectpicker" data-live-search= "true">
          								<option value="">Select Month</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '1'){?> selected="selected" <?php }?> value="1">January</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '2'){?> selected="selected" <?php }?> value="2">February</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '3'){?> selected="selected" <?php }?> value="3">March</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '4'){?> selected="selected" <?php }?> value="4">April</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '5'){?> selected="selected" <?php }?> value="5">May</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '6'){?> selected="selected" <?php }?> value="6">June</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '7'){?> selected="selected" <?php }?> value="7">July</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '8'){?> selected="selected" <?php }?> value="8">August</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '9'){?> selected="selected" <?php }?> value="9">September</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '10'){?> selected="selected" <?php }?> value="10">October</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '11'){?> selected="selected" <?php }?> value="11">November</option>
          								<option <?php if ($details['previous_work_experience_month_from_1'] == '12'){?> selected="selected" <?php }?> value="12">December</option>

          								</select> </div>
		  
		  <div class="col-md-6">From Date: <input type="text"
		   id="previous_work_experience_year_to_1" > 	</div>

		</div>
		<div class="row mb-3">							
							<div class="col-md-4">
                             	Company <input name="previous_work_experience_company_1"  class="form-control" type="text" id="current_work_experience_company_1" placeholder="Enter Current Company" value="<?php echo $previous_work_experience_company_1;?>" />
                        	</div>
							<div class="col-md-6">
                             	Position <input name="previous_work_experience_position_1"  class="form-control" type="text" id="current_work_experience_position_1" placeholder="Enter Current Position" value="<?php echo $previous_work_experience_position_1;?>" />
                        	</div>
			</div>
		<div class="row mb-5">
							<div class="col-md-4">
								Work Duties
                             	<input name="previous_work_experience_duties_1"
								   class="form-control" type="text" id="current_work_experience_duties_1" value="<?php echo $previous_work_experience_duties_1;?>" placeholder="Enter Duties" />
                        	</div>
							<div class="col-md-6">
								Highlights <textarea id="previous_work_experience_highlights_1"
								 name="previous_work_experience_highlights_1"  class="form-control" cols="45" rows="5" aria-required="true" placeholder="Enter Work Highlights"><?php echo $previous_work_experience_highlights_1;?></textarea>
                       	  </div>
		</div>
			<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Upload">
			
		</form>
		
		
	</div>
   
  </div>
</div>
</div>
</div>
</div>
						 
						  

	<?php include_once('footer.php');?>
	