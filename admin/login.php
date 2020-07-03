<?php
require_once("../Connections/initialize_admin.php");
?>
<?php
$system_object = new BioSystem();

if ((isset($_POST['submit']) && !empty($_POST['submit'])) || ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']))) {
   $status = "OK"; //initial status
  $msg="";

    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));
    
  if ( strlen($username) < 6 ){
  $msg=$msg."Username must be more than 5 char length<BR>";
  $status= "NOTOK";}
  
  if ( strlen($password) < 6 ){ //checking if password is greater then 8 or not
  $msg=$msg."Password must be more than 5 char length<BR>";
  $status= "NOTOK";}
  
    if($status=="OK"){
	
		// Check database to see if username/password exist.
		$found_admin = $admin_object->authenticate($username, $password);
		
		if($found_admin) {
			$admin_code = $found_admin[0]['admin_code'];
			if($admin_object->admin_is_active($admin_code)) {
				$found_admin = $found_admin[0];
				$session_admin->login($found_admin);
				redirect_to("index.php");
			} else {
				$message_error = "Your profile is currently inactive or suspended, please contact support for assistance.";
			}
		} else {
			// username/password combo was not found in the database
			$message_error = "Username and password combination do not match.";
		}
	}else{
			$message_error = "Error in your submission.<br>$msg";
	}
		  
} else { // Form has not been submitted.
    $email = "";
    $password = "";
}

if(isset($_GET['logout'])) {
    $logout_code = $_GET['logout'];
    switch ($logout_code) {
        case 1:
            $message_success = "You have logged out";
            break;
        case 2:
            $message_success = "You have been auto-logged out due to inactivity";
            break;
    }
}


?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biosource Global Resources</title>
		<link rel="shortcut icon" type="image/x-icon" href="../img/logoside.png" />
 
		<link href="../css/master.css" rel="stylesheet">
 
 
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
								<h2>Login</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">

                        <?php require_once '../layouts/feedback_message.php'; ?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
        <div class="list-group">
		<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
						?>
          <div class="list-group-item">
            <input type="text" placeholder="Username"  name="username" required>
          </div>
          <div class="list-group-item">
            <input type="password" placeholder="Password"  name="password" required>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-s-xs">Sign in</button>
        
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