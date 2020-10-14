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
        $account_password = $_POST['account_password'];
        $company_name = $_POST['company_name'];
        $last_name = $_POST['last_name'];
        $first_name = ($_POST['first_name']);
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $message_success = "";
        if (strlen($last_name) < 2) {
            $message_error .= "Surname is compulsory";
        }

        if ($first_name == '') {
            $message_error .= "First Name is compulsory";
        }
        $user = $db_handle->numRows("SELECT couprov_code FROM course_providers WHERE email = '$email'");

        if ($user > 0) {
            $message_error .= "Username/Email already exists in our database.";
            goto exitpoint;
        };

        $course_providers = $course_prov_object->add_new_course_provider($first_name, $last_name, $phone, $email,  $account_password, $company_name, $contact, $address);
        $found_client = $course_prov_object->authenticate($email, $account_password);
        if ($found_client) {
            $course_prov_code = $found_client[0]['couprov_code'];
            if ($course_prov_object->course_provider_is_active($course_prov_code)) {
                $found_client = $found_client[0];
                $session_course_prov->login($found_client);
                $message_success =  "<b>Congratulations!</b><br>Registration Successful. <a href='login'>Click Here to Login</a>";
                $message_success .= $course_providers;
            } else {
                $message_error = "Your profile is currently inactive, suspended or your subscription has expired, please contact support for assistance.";
            }
        } else {
            // username/password combo was not found in the database
            $message_error = "Registratin could not be completed. Please, try again.";
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
                    <span class="span-or">Institution Registration</span>
                    <hr class="hr-or">
                </div>
                <?php include_once('../layouts/feedback_message.php'); ?>
                <?php if ($message_success == "") { ?>

                    <form action="" id="couprov_reg" method="post" class="form-horizontal tasi-form" name="searchmereg" enctype="multipart/form-data">

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

                        <br>
                        <div class="form-group">
                            <label class="col-md-9">
                                Email:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" /></div>
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
                                Phone:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="phone" class="form-control" type="text" id="phone" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-9">
                                Institution Name:
                            </label>
                            <div class="col-md-11 col-xs-11">
                                <div class="col-md-11 col-xs-11"><input name="company_name" class="form-control" type="text" id="company_name" size="30" /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9">
                                Contact details:
                            </label>
                            <div class="col-md-11 col-xs-11">
                                <div class="col-md-11 col-xs-11"><textarea class="form-control" name="contact" id="contact" style="border:1px solid rgba(3,3,3,0.2); width: 100%;" rows="5"></textarea></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9">
                                Address:
                            </label>
                            <div class="col-md-11 col-xs-11">
                                <div class="col-md-11 col-xs-11"><textarea class="form-control" name="address" id="address" style="border:1px solid rgba(3,3,3,0.2); width: 100%;" rows="5"></textarea></div>
                            </div>
                        </div>

                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                        <br>
                        <input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" value="Register ">
                        <button type="reset" onclick="document.getElementById('couprov_reg').reset" class="cws-button bt-color-3 border-radius alt icon-right">Reset <i class="fa fa-angle-right"></i></button>
                    </form>
                <?php }  ?>
            </div>
        </div>
    </section>
</main>
<!-- footer -->
<?php include_once('../main_footer.php'); ?>
<!-- footer -->