<?php
require_once("../main_header.php");
$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
     redirect_to("login");
}
$details = $recruit_object->application_detail($ssid);
extract($details);

?>


<div class="page-content woocommerce">
     <div class="container clear-fix">
          <div class="grid-col-row">
               <div class="grid-col grid-col-8">
                    <?php include_once("../layouts/feedback_message.php"); ?>
                    <div class="jumbotron text-center">
                         <h3>Application Detail</h3>
                         <p>Applicant Name: <?php echo $first_name . ' ' . $last_name; ?></p>
                    </div>
                    <div class="container">
                         <div class="col-sm-4">
                              Applicant Code
                         </div>
                         <div class="col-sm-8">
                              <?= $applicant_code; ?>
                         </div>
                         <div class="col-sm-4">
                              Applicant Status
                         </div>
                         <div class="col-sm-8">
                              <?= applicant_status($appl_status); ?>
                         </div>
                         <div class="col-sm-4">
                              Applicant Email
                         </div>
                         <div class="col-sm-8">
                              <?= $appl_email; ?>
                         </div>
                         <div class="col-sm-4">
                              Job Title
                         </div>
                         <div class="col-sm-8">
                              <?= $job_title; ?>
                         </div>
                         <div class="col-sm-4">
                              Job Category
                         </div>
                         <div class="col-sm-8">
                              <?= $category_name; ?>
                         </div>
                         <div class="col-sm-4">
                              Job Sub category
                         </div>
                         <div class="col-sm-8">
                              <?= $sub_category_name; ?>
                         </div>

                         <?php if (isset($cart_info) && !empty($cart_info)) {
                              foreach ($cart_info as $row) {   ?>
                                   <div class="row">
                                        <div class="col-sm-8">
                                             <?php echo $recruit_object->recruiting_plan_detail_by_id(['pid'])['plan_name']; ?>
                                        </div>
                                        <div class="col-sm-2">
                                             <?php echo $row['pquantity']; ?>
                                        </div>
                                        <div class="col-sm-1">
                                             <?php echo $row['productprice']; ?>
                                        </div>
                                   </div>
                         <?php }
                         } ?>
                    </div>

               </div>
               <?php include_once('recru_sidebar.php'); ?>
          </div>
     </div>
</div>
<?php include_once('../main_footer.php'); ?>