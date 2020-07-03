<?php
	 if ($_POST['submit']){
		// echo '1';

	 	$entrydate = date ('d-m-Y');		
		$enddate=$_POST['enddate'];
		$location_id=($_POST['location_id']);
		$jobtitle=$_POST['jobtitle'];
		$jobcategory=$_POST['jobcategory'];
		$email=$_POST['email'];
		$country_id=$_POST['country_id'];
		$joblevel=$_POST['joblevel'];
		$jobstype=$_POST['jobstype'];
		$salaryamount=$_POST['salaryamount'];
		$salaryperiod=$_POST['salaryperiod'];
		$jobexperience=$_POST['jobexperience'];
		$descript=nl2br($_POST['descript']);
		$skillset=$_POST['skillset'];
		$qualifications=$_POST['qualifications'];
//		$uploaddir = "../images/siteads/";

		

		$descript = filter_var($descript, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$skillset = filter_var($skillset, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$qualifications = filter_var($qualifications, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

		 if (strlen($jobtitle) < 4){
		  	$message_error .= "Title is compulsory";				 
		 }

		 if ($jobcategory == ''){
		  	$message_error .= "Category is compulsory";				 
		 }
		 
		if ($message_error == ''){
	
			$dataArray2[] = array('jobtitle'=>"$jobtitle",'email'=>"$email",'phone'=>"$phone",'location_id'=>"$location_id",'enddate'=>"$enddate",'jobcategory'=>"$jobcategory",'address'=>"$address",'cacregno'=>"$cacregno",'website'=>"$website",'ownername'=>"$name",'descript'=>"$descript",'userupload'=>"1"); 
			$data = $db->insertBatch('jobs',$dataArray2)->getAllLastInsertId();
					$message_success = "You Have Successfully Posted The Job. Thanks For Your Visit!";
	
		}
	 }
$page_title = 'Add Admin';

?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/select2.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/styles.css">

	<!--styles -->
</head>
<body class="">
	<?php include_once('header.php');?>
	<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo.png" data-at2x='img/logo@2x.png' alt>
						<h2>Add Job</h2>
					</div>
			
					<form action="" method="post" class="form-horizontal tasi-form" name="searchmereg" enctype="multipart/form-data">

     <?php



?>
       

         <div class="form-group">
         	<label class="col-md-3">
                Name/Company*:
                <span class="required"></span>
            </label>
              <div class="col-md-9 col-xs-11"><input name="name" required  class="form-control" type="text" id="name" size="30" /></div>
          </div>
          
         <div class="form-group">
         	<label class="col-md-2">
                Website:
            </label>
              <div class="col-md-10 col-xs-11"><input name="website"   class="form-control" type="text" id="website" size="30" /></div>
          </div>
          
         <div class="form-group">
         	<label class="col-md-2">
                Address:
            </label>
              <div class="col-md-10 col-xs-11">
                <input name="address" type="text" class="form-control" id="address" value="" size="30">
              </div>
          </div>
          
         <div class="form-group">
         	<label class="col-md-2">
                CAC Reg. No.:
            </label>
              <div class="col-md-10 col-xs-11"><input name="cacregno"  class="form-control" type="text" id="cacregno" size="30" /></div>
          </div>
          
         <div class="form-group">
         	<label class="col-md-2">
                Email:
                <span class="required">*</span>
            </label>
              <div class="col-md-10 col-xs-11"><input name="email" required  class="form-control" type="text" id="email" size="30" /></div>
          </div>

         <div class="form-group">
         	<label class="col-md-2">
                Phone:
                <span class="required">*</span>
            </label>
              <div class="col-md-10 col-xs-11"><input name="phone"  class="form-control" type="text" id="phone" size="30" /></div>
          </div>
         
         <div class="form-group">
              <label class="col-md-2">Job Title:<span class="required">*</span></label>
              <div class="col-md-10 col-xs-11"><input name="jobtitle" required class="form-control" type="text" size="35" /></div>
          </div>
         
           <div class="form-group form-inline">
              <label class="col-md-2">Application Deadline*:
                
              </label>
              <div class="col-md-10 col-xs-11">
  
                  <input type="text" name="enddate" id="enddate" class="form-control">
                  <span class="help-block">Select date</span>
              </div>
          </div>
          
          
          <div class="form-group">
              <label class="col-md-2">Job Location:
                <span class="required">*</span>
              </label>
              <div class="col-md-10 col-xs-11">
  
                  <select name="location_id"  class="form-control" style="width:60%;font-size:12px; padding:0px 0px; line-height: 0.3em;" >
       		<option value=''>Select A Location </option>
                  <?php 
		$qr = $db->select('jobstate',array('*'))->results();
foreach($qr as $fet){
		$state_id=$fet['state_id'];
		$state_name=$fet['state_name'];
		echo "<option value='$state_id'> $state_name </option>";
		
		}?>
                </select>
              </div>
          </div>
          
	 <div class="form-group">
              <label class="col-md-2">Job Category:</label>
              <div class="col-md-10 col-xs-11"><select name="jobcategory" style="width:60%;font-size:12px; padding:0px 0px; line-height: 0.3em;" class="form-control">
						  <?php 
		echo "<option value=''> Select A Category </option>";
		$qr = $db->select('jobscategory',array('*'))->results();
foreach($qr as $fet){
		$jobs_cat_id=$fet['jobs_cat_id'];
		$categoryname=$fet['categoryname'];
		echo "<option value='$jobs_cat_id'> $categoryname </option>";
		
		}?>
        </select></div>
          </div>
          
          <div class="form-group">
              <label class="col-md-2">Job Description:</label>
              <div class="col-md-10 col-xs-11">
  
                  <textarea id="descript" name="descript" rows="15" cols="40">

			</textarea>
         <!--   <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('descript', {
	filebrowserBrowseUrl : 'admin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : 'admin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "admin/ckeditor/plugins/imgupload/imgupload.php"
});
            </script>-->
              </div>
          </div>
                   
                    
          <div class="form-group">
              <label class="col-md-2"></label>
              <div class="col-md-10 col-xs-11"><input type="submit" class="btn btn-success" name="submit" value="Post Job" />

               <input type="reset" name="Reset" class="btn btn-danger" value="  Cancel  " />
              </div>
          </div>
          
                            
 


     </form>
				</div>
			</div>
		</section>
	</main>
	<!-- footer -->
	<?php include_once('footer.php');?>
	<!-- footer -->
	<!-- scripts -->
	<script src="js/jquery.min.js"></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/select2.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.tweet.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/retina.min.js"></script>
	<!-- scripts -->
</body>
</html>