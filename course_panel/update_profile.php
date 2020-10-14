<?php
require_once("../main_header.php");
if (!$session_course_prov->is_logged_in()) {
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

  if ($message_error == '') {

    $result = $course_prov_object->update_course_provider($course_prov_code, $first_name, $last_name, $country, $billing_state, $phone, $mailingaddress, $company_name, $about_me, $billing_address_1);
    if ($result) {
      redirect_to('index');
    } else {
      $message_error = "Update wasn't successful.";
    }
  }
}


$countries = $zenta_operation->get_all_countries();
extract($course_prov_object->get_course_provider_detail($course_prov_code));

?>


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
<!--styles -->


<!-- <script>
		$(function() {
			$("#education_period_year_from_1, #education_period_year_to_1").datepicker();
		});
	</script> -->

<!--styles -->

<div class="page-content container">
  <div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
      <h4>Update Institution Profile</h4>
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
          <div class="col-md-5">State of Residence <select id="txtHint1" name="billing_state" data-required="true" class="selectpicker" data-live-search="true">
              <option value="<?= $state ?>"><?= $zenta_operation->get_state_by_id($billing_state) ?></option>
            </select></div>
        </div>
        <div class="row mb-4">
          <div class="col-md-5">Institution Name<input name="company_name" class="form-control" type="text" id="company_name" value="<?php echo $company_name; ?>" /></div>

          <div class="col-md-5">Contact<input name="mailingaddress" class="form-control" type="text" id="mailingaddress" value="<?php echo $mailingaddress; ?>" /> </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-10">About Institution
            <textarea id="about_me" name="about_me" style="width:1000px"><?php echo $about_me; ?></textarea>
            <script>
              CKEDITOR.replace('about_me', {

                height: 100,

                // The following options are not necessary and are used here for presentation purposes only.
                // They configure the Styles drop-down list and widgets to use classes.

                stylesSet: [{
                    name: 'Narrow image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                      'class': 'image-narrow'
                    }
                  },
                  {
                    name: 'Wide image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                      'class': 'image-wide'
                    }
                  }
                ],

                // Load the default contents.css file plus customizations for this sample.
                contentsCss: [CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css'],

                // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
                // resizer (because image size is controlled by widget styles or the image takes maximum
                // 100% of the editor width).
                image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
                image2_disableResizer: true
              });
            </script>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-10">Institution Address
            <textarea id="billing_address_1" name="billing_address_1" style="width:1000px"><?php echo $billing_address_1; ?></textarea>
            <script>
              CKEDITOR.replace('billing_address_1', {

                height: 100,

                // The following options are not necessary and are used here for presentation purposes only.
                // They configure the Styles drop-down list and widgets to use classes.

                stylesSet: [{
                    name: 'Narrow image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                      'class': 'image-narrow'
                    }
                  },
                  {
                    name: 'Wide image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                      'class': 'image-wide'
                    }
                  }
                ],

                // Load the default contents.css file plus customizations for this sample.
                contentsCss: [CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css'],

                // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
                // resizer (because image size is controlled by widget styles or the image takes maximum
                // 100% of the editor width).
                image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
                image2_disableResizer: true
              });
            </script>
          </div>
          <input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Update Profile">
        </div>
      </form>
    </div>
    <?php include_once('cour_sidebar.php'); ?>
  </div>
</div>
<?php include_once('../main_footer.php'); ?>