<?php
require_once("../main_header.php");
if (!$session_event_prov->is_logged_in()) {
  redirect_to("login");
}

// error_reporting(-1);

if (isset($_POST['submit'])) {

  foreach ($_POST as $key => $value) {
    $_POST[$key] = $db_handle->sanitizePost(trim($value));
  }
  extract($_POST);
  if (strlen($first_name) < 2) {
    $message_error .= "First Name is compulsory";
  }

  if ($last_name == '') {
    $message_error .= "Last Name is compulsory";
  }
  if ($email == '') {
    $message_error .= "Email is compulsory";
  }

  if ($phone == '') {
    $message_error .= "Phone Number is compulsory";
  }

  if ($state == '') {
    $message_error .= "Please select your state";
  }

  if ($message_error == '') {

    $result = $event_prov_object->update_event_provider($event_prov_code, $first_name, $last_name, $country, $state, $phone, $mailing_address, $billing_company, $billing_city);
    if ($result) {
      redirect_to('my-account');
    } else {
      $message_error = "Upload wasn't successful.";
    }
  }
}


$countries = $zenta_operation->get_all_countries();

$first_name = $event_prov_object->get_event_provider_detail($event_prov_code)['first_name'];
$last_name = $event_prov_object->get_event_provider_detail($event_prov_code)['last_name'];
$middlename = $event_prov_object->get_event_provider_detail($event_prov_code)['middle_name'];
$email = $event_prov_object->get_event_provider_detail($event_prov_code)['email'];
$country = $event_prov_object->get_event_provider_detail($event_prov_code)['billing_country'];
$state = $event_prov_object->get_event_provider_detail($event_prov_code)['billing_state'];
$phone = $event_prov_object->get_event_provider_detail($event_prov_code)['phone'];
$address = $event_prov_object->get_event_provider_detail($event_prov_code)['billing_address_1'];
// $course = $event_prov_object->get_event_provider_detail($event_prov_code)['course_preference'];
// $address = $event_prov_object->get_event_provider_detail($event_prov_code)['mailing_address'];
$course_preference = $event_prov_object->get_event_provider_detail($event_prov_code)['billing_company'];
$university_preference = $event_prov_object->get_event_provider_detail($event_prov_code)['billing_city'];
// $gender =  $event_prov_object->get_event_provider_detail($event_prov_code)['gender'] == 1 ? 'Male' :
// 	"Female";
$states = $zenta_operation->get_states_by_country($country);
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
  function ShowStatebyCountry(str) {
    if (str == "") {
      document.getElementById("txtHint1").innerHTML = "";
      return;
    }

    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "../xpanel/getStates.php?q=" + str, true);
    xmlhttp.send();
  }
</script>



<!-- <script>
		$(function() {
			$("#education_period_year_from_1, #education_period_year_to_1").datepicker();
		});
	</script> -->

<!--styles -->

<div class="page-content container">
  <div class="row">

    <div class="col-md-8 col-lg-8 col-sm-12">
      <h4>Update Profile</h4>
      <?php include_once("../layouts/feedback_message.php"); ?>
      <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col-md-5">First Name<input name="first_name" class="form-control" type="text" id="first_name" value="<?php echo $first_name; ?>" /></div>

          <div class="col-md-5">Last Name <input name="last_name" class="form-control" type="text" id="last_name" value="<?php echo $last_name; ?>" /> </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">Email<input name="email" class="form-control" type="text" disabled id="email" value="<?php echo $email; ?>" /></div>

          <div class="col-md-5">Phone<input name="phone" class="form-control" type="text" id="phone" value="<?php echo $phone; ?>" /> </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">Country of Residence <select name="country" data-required="true" class="selectpicker" data-live-search="true" onchange="ShowStatebyCountry(this.value)">
              <option value="">Select A Country</option>
              <?php
              foreach ($countries as $row3) :
              ?>
                <option <?php if ($country == $row3['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row3['country_id']; ?>">
                  <?php echo $row3['country_name']; ?>
                </option>
              <?php
              endforeach;
              ?>
            </select></div>
          <div class="col-md-5">State of Residence <select id="txtHint1" name="state" data-required="true" class="selectpicker" data-live-search="true">
              <?php foreach ($states as $state_row) { ?>
                <option value="<?= $state_row['state_id'] ?>" <?= $state_row['state_id'] == $state ? 'selected' : '' ?>><?= $state_row['state_name'] ?></option>
              <?php } ?>

            </select></div>
        </div>
        <div class="row mb-4">
          <div class="col-md-5">Company Name<input name="billing_company" class="form-control" type="text" id="billing_company" value="<?php echo $billing_company; ?>" /></div>

          <div class="col-md-5">City<input name="billing_city" class="form-control" type="text" id="billing_city" value="<?php echo $billing_city; ?>" /> </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-10">Company Address<input name="mailing_address" class="form-control" type="text" id="mailing_address" value="<?php echo $address; ?>" /></div>
        </div>
        <input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Update Profile">

      </form>
    </div>
    <?php include('./event_sidebar.php') ?>
  </div>
</div>
<?php include_once('../main_footer.php'); ?>