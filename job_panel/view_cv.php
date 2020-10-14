<?php
require_once("../main_header.php");
if (!$session_client->is_logged_in()) {
  redirect_to("<?= SITE_URL ?>/login.php");
}
error_reporting(-1);
$firstname = $zenta_operation->get_user_by_code($user_code)['first_name'];
$lastn = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$gender =  $zenta_operation->get_user_by_code($user_code)['gender'] == 1 ? 'Male' :
  "Female";
?>


<div class="page-content container clear-fix">

  <div class="row">
    <div class="col-md-3 sidebar">
      <!-- widget search -->

      <!-- widget categories -->
      <aside class="widget-categories" style="boder:1px solid red;">
        <h2>Navigations</h2>
        <hr class="divider-big" />
        <ul>
          <li class="cat-item cat-item-1 current-cat">
            <a href="index">My Profile<span> </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="upload_biodata">Update Profile<span> </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="view_courses">VIEW Courses<span> (26) </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="applications">VIEW Application STATUS <span> </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="last_view_courses">Last viewed courses<span> (14) </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="job_prefs">My job Preference <span></span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="past_applied_jobs">VIEW Past Applied Jobs<span> (11) </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="upload_cv">Upload Cv(Resume) <span> </span></a></li>
        </ul>
      </aside>
    </div>
    <div class="col-md-8">
      <main>
        <section class="clear-fix">


          <div class="col-md-8 col-md-offset-2">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-list"></i>ORDER DETAILS </div>
                <div class="tools">
                  <button onclick="printContent('prnt')" class="btn btn-info btn-sm">PRINT</button>
                </div>
              </div>
              <div class="portlet-body">

                <div id="prnt">
                  <div class="row">
                    <div class="col-sm-8" style="max-width: 600px; float: left;">
                      <h2> INVOICE # <?php echo $odet['invid']; ?></h2>

                      <b>INVOICE TO:</b> <?php echo $uname[0]; ?> <br>
                      <b>DELIVERY ADDRESS:</b> <?php echo $odet['daddr']; ?> <br>
                      <b>CONTACT NUMBER:</b> <?php echo $odet['contactnum']; ?> <br>
                    </div>
                    <div class="col-sm-4" style="margin-top: 30px; max-width: 300px; float: right;">
                      <img src="<?php echo "$baseurl/images/logo.png"; ?>" alt="LOGO" style="width: 100%">

                      <?php
                      $adrs = mysqli_fetch_array(mysqli_query($conn, "SELECT address, mobile, email, sitename FROM general_setting WHERE id='1'"));
                      ?>


                      <i class="fa fa-mobile"></i><span> <?php echo $adrs[1]; ?></span><br>
                      <i class="fa fa-envelope"></i><span> <?php echo $adrs[2]; ?></span><br>
                      <i class="fa fa-location-arrow"></i> <?php echo $adrs[0]; ?> <br>
                    </div>

                  </div>
                  <hr>



                  <div class="table">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Product Name </th>
                          <th> Rate </th>
                          <th> Quantity </th>
                          <th> Subtotal </th>
                        </tr>
                      </thead>
                      <tbody>


                        <tr>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td> <b>TOTAL</b> </td>
                          <td> <b><?php echo "$full $curr[0]"; ?></b> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- END SAMPLE TABLE PORTLET-->
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
</div>
<?php include("../main_footer.php") ?>