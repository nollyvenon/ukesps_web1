<?php
include("../main_header.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LfXhrQZAAAAAI-p5NCr45YOozGy0bV1yp6I5ofE';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        // valid submission
        // go ahead and do necessary stuff

        $account_username = $_POST['account_username'];
        $account_password = $_POST['account_password'];
        $last_name = $_POST['last_name'];
        $middle_name = ($_POST['middle_name']);
        $first_name = ($_POST['first_name']);
        $gender_select = $_POST['gender_select'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $message_success = "";

        if (strlen($last_name) < 2) {
            $message_error .= "Surname is compulsory";
        }

        if ($first_name == '') {
            $message_error .= "First Name is compulsory";
        }


        if ($db_handle->numRows("SELECT username FROM event_providers WHERE email = '$email' OR username = '$account_username'") > 0) {
            $message_error .= "Username/Email already exists in our database.";
            goto exitpoint;
        };

        $event_providers = $event_prov_object->add_new_event_provider($first_name, $last_name, $middle_name, $phone, $email, $account_username, $account_password, $billing_company, $mailing_address, "", "",  "", $country);
        $found_client = $event_prov_object->authenticate($account_username, $account_password);
        // var_dump($found_client);
        // die();
        if ($found_client) {
            $event_prov_code = $found_client[0]['event_prov_code'];
            if ($event_prov_object->event_provider_is_active($event_prov_code)) {
                $found_client = $found_client[0];
                $session_event_prov->login($found_client);
                $message_success =  "<b>Congratulations!</b><br>Registration Successful. <a href='" . SITE_URL . "/events/login'>Click Here to Login</a>";
                $message_success .= $event_providers;
            } else {
                $message_error = "Your profile is currently inactive, suspended or your subscription has expired, please contact support for assistance.";
            }
        } else {
            if ($event_providers) {
                $message_success =  "<b>Congratulations!</b><br>Registration Successful. <a href='login'>Click Here to Login</a>";
                $message_success .= $event_providers;
            } else {
                // username/password combo was not found in the database
                $message_error = "Registration not complete. Please try again!";
            }
        }
    } else {
        // spam submission
        // show error message
        $message_error .= "Error in your submission.";
    }

    exitpoint:
}
$page_title = 'Register';
$countries = $zenta_operation->get_all_countries();
?>

<script src="https://www.google.com/recaptcha/api.js?render=6LfXhrQZAAAAANTAOfhy3HFEQdm0UJqB_fSSInTm"></script>


<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfXhrQZAAAAANTAOfhy3HFEQdm0UJqB_fSSInTm', {
            action: 'submit'
        }).then(function(token) {
            // Add your logic to submit to your backend server here.
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
</script>
<main>
    <section class="fullwidth-background bg-2">
        <div class="grid-row">
            <div class="login-block">

                <div class="logo_login text-center" style='padding:20px;'>
                    <img class="img-fluid rounded mx-auto d-block" src="<?= SITE_URL ?>/img/logo.jpg" alt>
                </div>
                <!-- <a href="#" class="facebook cws-button border-radius half-button">Facebook</a>
				<a href="#" class="twitter cws-button border-radius half-button">Twitter</a> -->
                <div class="clear-both"></div>
                <div class="login-or">
                    <hr class="hr-or">
                    <span class="span-or">Event Panel Registration</span>
                    <hr class="hr-or">
                </div>
                <?php include_once('../layouts/feedback_message.php'); ?>
                <?php if ($message_success == "") { ?>

                    <form action="" method="post" class="form-horizontal tasi-form" name="searchmereg" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-9">
                                Surname:
                                <span class="required"></span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="last_name" required class="form-control" type="text" id="last_name" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-9">
                                First Name*:
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="first_name" class="form-control" type="text" id="first_name" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-9">
                                Middle Name*:
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="middle_name" class="form-control" type="text" id="middle_name" size="30" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9">
                                Username:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="account_username" required class="form-control" type="text" id="account_username" size="30" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9">
                                Password:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="account_password" required class="form-control" type="password" id="account_password" size="30" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9">
                                Email:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-9">
                                Phone:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="phone" class="form-control" type="text" id="phone" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-9">
                                Country:
                            </label>
                            <div class="col-md-11 col-xs-11">
                                <select name="country" data-required="true" class="form-control">
                                    <option value="">Select Country</option>
                                    <?php
                                    foreach ($countries as $row2) {
                                    ?>
                                        <option value="<?php echo $row2['country_id']; ?>">
                                            <?php echo $row2['country_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select></div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-9">Address
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11 message-form-message">
                                <textarea name="mailing_address" cols="45" rows="8" aria-required="true"></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                        <br>
                        <input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" value="Register ">
                        <button type="reset" class="cws-button bt-color-3 border-radius alt icon-right">Reset <i class="fa fa-angle-right"></i></button>
                    </form>
                <?php }  ?>
            </div>
        </div>
    </section>
</main>
<!-- footer -->
<?php include_once('../main_footer.php'); ?>
<!-- footer -->