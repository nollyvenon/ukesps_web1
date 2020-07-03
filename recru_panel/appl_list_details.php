<?php
include_once("z_db.php");
$ssid = $_GET['xxid'];
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$list_id = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}

if(isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
    $search_text = $_POST['search_text'];
    
    $query = "SELECT appl.*, appl.status AS appl_status, us.last_name As last_name, us.middle_name AS middle_name, us.first_name AS first_name, us.email AS appl_email, us.location AS appl_location, appl_lists.timestamp AS date_added  FROM applications appl 
	INNER JOIN applicant_lists appl_lists ON appl_lists.list_id=appl.list_id 
	INNER JOIN users us ON appl.applicant_code=us.user_code
	WHERE recruiter_code = '$recruiter_code' AND (us.email LIKE '%$search_text%' OR us.first_name LIKE '%$search_text%' OR us.last_name LIKE '%$search_text%') ORDER BY appl.appl_id DESC ";
} else {
	$query = "SELECT appl.*, appl.status AS appl_status, us.last_name As last_name, us.middle_name AS middle_name, us.first_name AS first_name, us.email AS appl_email, us.location AS appl_location, appl_lists.timestamp AS date_added FROM applications appl 
	INNER JOIN applicant_lists appl_lists ON appl_lists.list_id=appl.list_id 
	INNER JOIN users us ON appl.applicant_code=us.user_code
	WHERE recruiter_code = '$recruiter_code' ";
}
$numrows = $db_handle->numRows($query);

// For search, make rows per page equal total rows found, meaning, no pagination
// for search results
if (isset($_POST['search_text'])) {
    $rowsperpage = $numrows;
} else {
    $rowsperpage = 20;
}

$totalpages = ceil($numrows / $rowsperpage);
// get the current page or set a default
if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
   $currentpage = (int) $_GET['pg'];
} else {
   $currentpage = 1;
}
if ($currentpage > $totalpages) { $currentpage = $totalpages; }
if ($currentpage < 1) { $currentpage = 1; }

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if($prespagehigh > $numrows) { $prespagehigh = $numrows; }

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$content = $db_handle->fetchAssoc($result);

if ($_POST['send2']){
	require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    include("../templates/class.FastTemplate.php3");
    $tpl = new FastTemplate("templates");

	$site_settings = $zenta_operation->getSiteSettings();
    $MailFromName = $site_settings['MailFromName'];
    $MailFromEmail = $site_settings['MailFromEmail'];
    $MailReplyToName = $site_settings['MailReplyToName'];
    $MailReplyToEmail = $site_settings['MailReplyToEmail'];
    $MailHost = $site_settings['MailHost'];//seperate server with comma
    $MailUser = $site_settings['MailUser'];
    $MailPassword = $site_settings['MailPassword'];
    $MailPort = $site_settings['MailPort'];
	
					$mail = new PHPMailer;
					$body = $_POST['message'];
					$mail->isSMTP();
					$mail->Host = $MailHost;
					$mail->SMTPAuth = true;
					$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
					$mail->Port = 25;
					$mail->Username = $MailUser;
					$mail->Password = $MailPassword;
					$mail->isHTML(true); 
	
	

	$mail->Subject = $_POST['subject'];
	$email_template = $_POST['email_template'];
	$templatefile = "../templates\\".$email_template."\index.html";
		if ($_POST['applicant_code'] != ''){//if multiple applicant were selected via the select option 
			$applicant_code = $_POST['applicant_code'];			
		}elseif($_POST['hidappl_code'] != ''){
			$applicant_code = $_POST['hidappl_code'];
		}

        //Same body for all messages, so set this before the sending loop
        //If you generate a different body for each recipient (e.g. you're using a templating system),
        //set it inside the loop
        $mail->msgHTML($body);
		//$mail->msgHTML(file_get_contents($templatefile), dirname(__FILE__));
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
        //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

	if (is_array($applicant_code)){
        $arr1 = explode(',',trim($applicant_code,','));
        foreach($arr1 as $cu_user_code){
         	$email_address = $zenta_operation->get_user_by_code($cu_user_code)['email'];
         	$first_name = $zenta_operation->get_user_by_code($cu_user_code)['first_name'];
         	$last_name = $zenta_operation->get_user_by_code($cu_user_code)['last_name'];

            $mail->addAddress($email_address, $first_name.' '.$last_name);
            /*if (!empty($row['cu_image_url'])) {
                $mail->addStringAttachment($row['cu_image_url'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
            }*/

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: $MailFromName<$MailFromEmail>" . "\r\n";
            mail($email_address,$subject,$body,$headers);
            if (!$mail->send()) {
                $message_error = "Mailer Error (" . str_replace("@", "&#64;", $email_address) . ') ' . $mail->ErrorInfo . '<br />';
                break; //Abandon sending
            } else {
                 $message_success = "Message sent to :" . $first_name.' '.$last_name . ' (' . str_replace("@", "&#64;", $email_address) . ')<br />';
            }
        }
	}
	
}
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" href="../css/styles.css">	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../xadmin/ckeditor/ckeditor.js"></script> 
	<script>
		config.extraPlugins = 'imgupload';
	</script>
	<!--styles -->
	
</head>
<body class="">
	<?php include_once('../recru_panel/header.php');?>
	<div class="page-content sitemap container container-fluid clear-fix">

    <div class="col-12">
         <h4>Candidate List</h4>
		<?php include_once("../layouts/feedback_message.php");?>
		  <table class="table table-responsive table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Full Name</th>
                                            <th>Location</th>
                                            <th>Desired Salary</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($content) && !empty($content)) { foreach ($content as $row) { ?>
                                        <tr>
                                		 <td width="10%"><input class="form-check-input" type="checkbox" id="select_appl" value="<?php echo $row['applicant_code']; ?>" name="applicant_code[]"></td>
                                         <td><?php echo $row['first_name'].' '.$row['middlename'].' '.$row['lastname']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php echo $row['desired_salary']; ?></td>
                                            <td><?php echo date('d M, Y', strtotime($row['date_added'])); ?></td>
                                            <td><a class="btn btn-border green" href="applicant_det?hiss=<?php echo encrypt($row['applicant_code']); ?>"><span> <i class="fa fa-eye-slash"></i></span></a>
												<a href=\"#myModal\" class=\"\" data-toggle=\"modal\" data-id=\"$applicant_code\"><i class="fa fa-support"></i></a>
											</td>
                                        </tr>
                                        <?php } } else { echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>"; } ?>
                                    </tbody>
                                </table> 
                                <!-- pagination -->
                                <div class="page-pagination clear-fix">
                                    <?php $pg = intval($_GET['pg']);
                                        if($pg > 1){ ?>
                                    <a href="?pg=<?=$pg-1;?>"><i class="fa fa-angle-double-left"></i></a>
                                    <a href="?pg=<?=$pg;?>" class="active"><?=$pg;?></a>
                        <?php } ?>
                            <!-- 
                                    --><a href="?pg=<?=$pg+1;?>"><?=$pg+1;?></a><!-- 
                                    --><a href="?pg=<?=$pg+2;?>"><?=$pg+2;?></a><!-- 
                                    --><a href="?pg=<?=$pg+3;?>"><i class="fa fa-angle-double-right"></i></a>
		
				
	</div>
			

	</div>
		
		<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
		 <form id="form1" name="form1" method="post" action="">  
			 <input name="hidappl_code" type="hidden">
		  <!--<div class="fetched-data"></div>-->
		  <div class="col-md-12 col-sm-12 col-xs-12 mail_view_info">

                <div class="form-group mail_cc_bcc">
                    <label class="form-label" for="field-1">To:</label>
                    <span class="desc">e.g. "someemail@example.com"</span>
                    <div class="controls">
                        <input type="text" name="mailto" class="form-control mail_compose_to" value="" />
                    </div>
                </div>

                <div class="form-group mail_compose_cc">
                    <label class="form-label" for="field-1">Template:</label>
                    <div class="controls">
                        <select name="email_template" data-required="true" >
          								<option value="">Select A Template</option>
										<?php 
										foreach($email_templates as $row2):
										?>
                                    		<option value="<?php echo $row2['template_id'];?>">
													<?php echo $row2['template_name'];?>
												</option>
                                        <?php
										endforeach;
										?>
          								</select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="field-1">Subject:</label>
                    <span class="desc">e.g. "Meeting in 1st week"</span>
                    <div class="controls">
                        <input type="text" name="subject" class="form-control" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="field-1">Message:</label>
                    <textarea name="message" class="mail-compose-editor" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
					<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('message', {
	filebrowserBrowseUrl : '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "../xadmin/ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                </div>
			  
			  	<button name="send2" type="submit" class="btn btn-primary">
                    <i class="fa fa-paper-plane-o icon-xs"></i> &nbsp; SEND
                </button>

			  </form>

            </div>
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<?php include_once('../recru_panel/footer.php');?>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>
	
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
		<script>
		$(document).ready(function(){
			$('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'modal_applicant_code.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            //$('.fetched-data').html(data);//Show fetched data from database
			$("input[name='hidappl_code']").val(data);
            }
        });
     });
		});
	</script>
</body>
</html>