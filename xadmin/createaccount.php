<?php
require_once("../includes/initialize_admin.php");
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['todo']))
{
// Collect the data from post method of form submission // 
    $username = $db_handle->sanitizePost($_POST['username']);
    $email = $db_handle->sanitizePost($_POST['email']);
    $first_name = $db_handle->sanitizePost($_POST['first_name']);
    $last_name = $db_handle->sanitizePost($_POST['last_name']);
    $phone = $db_handle->sanitizePost($_POST['phone']);
    $country = $db_handle->sanitizePost($_POST['country']);


$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok
if(!isset($username) or strlen($username) <6){
$msg=$msg."User Id Should Contain Minimum 6 CHARACTERS.<BR>";
$status= "NOTOK";}					

if(!ctype_alnum($username)){
$msg=$msg."User Id Should Contain Alphanumeric Chars Only.<BR>";
$status= "NOTOK";}					


$rr=mysqli_query($con,"SELECT COUNT(*) FROM admin WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$nr = $r[0];
if($nr==1){
$msg=$msg."Userid Already Exists. Please Try Another One.<BR>";
$status= "NOTOK";
}	

$remail=mysqli_query($con,"SELECT COUNT(*) FROM admin WHERE email = '$email'");
$re = mysqli_fetch_row($remail);
$nremail = $re[0];
if($nremail==1){
$msg=$msg."E-Mail Already Registered.<BR>";
$status= "NOTOK";
}				

if ( strlen($email) < 1 || !check_email($email) ){
$msg=$msg."Please Enter A correct Email Id.<BR>";
$status= "NOTOK";}
			


//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
	  //The value of $ip at this point would look something like: "192.0.34.166"
	  $ip = ip2long($ip);
	  //The $ip would now look something like: 1073732954
	  
	  
	  if ($status=="OK") 
	  {
		   $result = $admin_object->add_new_admin($username, $first_name, $last_name, $phone, $email, $country);
		  if($result) {
			  $message_success = $result;
			  $message_success1 =  "<b>Congratulation $username!</b><br>Registration Successful.";
			  $success = '1';
		  } else {
			  $message_error = "An error occurred, the registration could not be completed.";
		  }
	  }else{
			  $message_error = "An error occurred, the registration could not be saved.".'<br>'.$msg;
	  }

	}
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biosource Global Resources</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/logoside.png" />
 
		<link href="../css/master.css" rel="stylesheet">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
 
 
		<script src="../js/jquery-1.11.2.min.js"></script>  
		<script src="../js/bootstrap.min.js"></script>
 
	</head>
	<body data-scrolling-animations="true">
		<div class="b-page">
<?php include('../header.php');?>			<div class="bg-wrapper aout-page">
				<section id="title-box" class="paralax bg-opacity-color about">
					<div class="wrapper">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h1>Admin</h1>
						</div>
					</div>
				</section>
				<section id="breadcrumbs" class="tooth tooth-green">
					<div class="section-bg">
						<div class="wrapper top-bug">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<ul>
									<li>
										<a href="index.php">Admin</a>
                                     
									</li>
									<li>
										<span>Home Page</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<section class="title-center">
					<div class="wrapper">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="section-title-box title-box-center wow bounceInDown center">
								<h2>Manage Site</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post" data-validate="parsley">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Registration</span>
                      </header>
                      

                      <div class="panel-body">
                      <?php if(isset($message_success1)): ?>
                      <div class="alert alert-info">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                           <?php echo $message_success1; ?>
                      </div>
                      <?php endif ?>
                      <br><br>
                                <?php require_once '../layouts/feedback_message.php'; ?>
						<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="NOTOK"))
						{
						print $errormsg;
						}
						?>
                   <?php     if ($success <> '1'){ ?>
	                  <p class="text-muted">Please fill the information to continue</p>
					<input type="hidden" name="todo" value="post">
						<div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                          <label>Username</label>
                          <input type="text" data-required="true" name="username" value="" required>                        
                        </div>
                        <div class="col-sm-6">
                          <label>First Name</label>
                         <input type="text" data-required="true" name="first_name" >                          
                        </div>
                        <div class="col-sm-6">
                          <label>Last Name</label>
                         <input type="text"  data-required="true" name="last_name" >                          
                        </div>
						</div>
						<div class="form-group pull-in clearfix">
						<div class="col-sm-6">
                          <label>Email</label>
                          <input type="email" data-type="email" data-required="true" name="email" required>                        
                        </div>
						<div class="col-sm-6">
                          <label>Phone</label>
                          <input type="text" data-type="phone"  data-required="true" name="phone" required>
                        </div>
						</div>
						
						<!--<div class="form-group">
						<label>Country</label>
                        	<select name="country" data-required="true" class="form-control"  required>
<option value="">Country...</option>
		  <?php $query="SELECT * FROM  countries where status='1'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$country_name="$row[country_name]";
	print "<option value='$country_name'>$country_name</option>";

  }
  ?>
</select>
                            
                          </div>-->
								
                        <div class="checkbox i-checks">
                          <label>
                            <input type="checkbox" name="check" data-required="true" required><i></i> I agree to the <a href="#" class="text-info">Terms of Service</a>
                          </label>
                        </div>
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Register</button>
                      </footer>
                      
                      <?php } ?>
                    </section>
                    <?php     if ($success <> '1'){ ?>
					<div class="line line-dashed"></div>
          <p class="text-muted text-center"><small style="color:#ffffff;">Already have an account?</small></p>
          <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a>
          			<?php  }else{ ?>
          <a href="index.php" class="btn btn-lg btn-default btn-block">Login Now</a>                    
                    <?php  }  ?>
                  </form>
                                   
							</div>
						</div>
					</div>
				</section>
			
			</div>
			
            <?php include('../footer.php');?>          
		</div>
 
		<script src="../plugins/switcher/js/bootstrap-select.js"></script> 
		<script src="../plugins/switcher/js/evol.colorpicker.min.js" type="text/javascript"></script> 
		<script src="../plugins/switcher/js/dmss.js"></script>
 
		<script src="../js/jquery-ui.min.js"></script>
		<script src="../js/modernizr.custom.js"></script>
		<script src="../js/smoothscroll.min.js"></script>
		<script src="../js/wow.min.js"></script>
 
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->    
 
		<!--Owl Carousel-->
		<script src="../plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
		<script src="../js/waypoints.min.js"></script>
		<script src="../js/jquery.easypiechart.min.js"></script>
		<script src="../js/func.js"></script>
	</body>
</html>