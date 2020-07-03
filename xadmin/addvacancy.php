<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}

if (isset($_POST['addcontent']) && !empty($_POST['addcontent'])) {
     $job_name = $db_handle->sanitizePost($_POST['job_name']);
     $enddate = $db_handle->sanitizePost(date('Y-m-d',strtotime($_POST['enddate'])));
     $content = $db_handle->sanitizePost($_POST['content']);
   // $entrydate = date('Y-m-d');
   /* foreach($_POST as $key => $value) {
        $_POST[$key] = $db_handle->sanitizePost(trim($value));
    }
    extract($_POST);*/
    if(empty($enddate) || empty($job_name)) {
        $message_error = "Please fill all the fields and try again.";
    } else {

		$result = $bio_operation->addvacancy($job_name, $enddate, $content);
			if($result) {
				 $message_success = "Job was successfully added";
			} else {
				$message_error = "Job was not successfully added.";
			}
		}
}
	
?><!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biosource Global Resources</title>
		<link rel="shortcut icon" type="image/x-icon" href="../img/logoside.png" />
 
		<link href="../css/master.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
<script type="text/javascript" src="../js/moment.min.js"></script>
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea",
	width: 800,
    height: 500,
    theme: "modern",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
  		<script src="../js/jquery-1.11.2.min.js"></script>  
		<script src="../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
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
										<span>Upload News</span>
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
								<h2>Add Vacancy</h2>
							</div>
						</div>
						<div class="row-3-col">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
                            <?php require_once '../layouts/feedback_message.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">
                                Job Name</label>
                            <input name="job_name" type="text" id="job_name" value="<?php $job_name; ?>" size="73" />
                        </div>
                        
                        <!--<div class="form-group">
                            <label for="page_location">
                                Excerpts</label>
                            <div class="input-group">
                             <input name="excerpts" type="text" id="excerpts" value="<?php $excerpts; ?>" size="73" /></div>
                        </div>-->

                          <div class="form-group">
                          <label for="page_location">
                                End Date</label>
                            <div class='input-group date  col-md-4' id='datetimepicker1'>
                                <input type='text' name="enddate" class="" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                                
                        
                    <div class="form-group">
                            <label for="content">
                                Description/Details</label>
                        <div class="input-group">
                            <textarea id="content" name="content" style="width:100%"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="addcontent"  value="Add Content" />
                             <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
                    </div>
                        
                    </div>
                </div>

                    </form>
				
							</div>
						</div>
					</div>
				</section>
				
				<section class="color-bg">
					<div class="wrapper">
						<div class="row-4">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row-2-blocks row-2-blocks-2">
									<<div class="r-block-1">
										<div class="c-content-block wow fadeInDown top__element">
											<h2>We Work Hard And Give Your Business A Cutting Edge</h2>
											<div>Friendly customer service staff for your all questions!</div>
										</div>
									</div>
									<div class="r-block-2">
										<div class="btn big-circle">
											<div class="big-text">
												GET in touch today!
											</div>
											<div class="sm-text">
												We'll fix all your Problems!
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tooth-color-gr"></div>
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
 		
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
				viewMode: 'years',
                format: 'DD-MM-YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>

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

