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
        $company_name = $_POST['company_name'];
        $company_info = $_POST['company_info'];
        // $company_img = "no image";
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


        if ($db_handle->numRows("SELECT username FROM recruiters WHERE email = '$email' OR username = '$account_username'") > 0) {
            $message_error .= "Username/Email already exists in our database.";
            goto exitpoint;
        };

        if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) {
            // var_dump($_FILES['company_logo']['name']);
            // die();
            $ext_first = explode(".", $_FILES['company_logo']['name']);
            $serial_number = substr(sha1(time()), 0, 7);
            $company_img = $serial_number . "." . end($ext_first);

            if (!isset($_FILES['company_logo']['error']) || is_array($_FILES['company_logo']['error'])) {
                $message_error .= "please upload a valid image";
                goto exitpoint;
            }
            //check $_FILES['upfile']['error'] value
            switch ($_FILES['company_logo']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $message_error .= "please upload a valid image";
                    goto exitpoint;
                default:
                    $message_error .= "please upload a valid image";
                    goto exitpoint;
            }

            if ($_FILES['company_logo']['size'] > 8107795) {
                $message_error .= "Image file too large";
                goto exitpoint;
            }
            $resize = new Resize();
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['company_logo']['tmp_name']),
                array(
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'jpg' => 'image/jpg'
                ),
                true
            )) {
                $message_error .= "please upload a valid image";
                goto exitpoint;
            }
            $ext_prop = explode(".", $_FILES['company_logo']['name']);
            if ($resize->changeSize($_FILES['company_logo']['tmp_name'], SITE_ROOT . "/img/job_companies/" . $company_img, 500, 500, end($ext_prop), 100)) {
                $message_error .= "Company Image not uploaded try again";
                goto exitpoint;
            }
        }

        $recruiters = $recruit_object->add_new_recruiter($first_name, $last_name, $phone, $email, $account_username, $account_password, $billing_company, $mailing_address, "", "",  "", $country);
        $found_client = $recruit_object->authenticate($account_username, $account_password);

        if ($found_client) {
            $recruiter_code = $found_client[0]['recruiter_code'];
            $new_company = $recruit_object->add_new_company($recruiter_code, $company_name, $company_info, $company_img);

            if ($recruit_object->recruiter_is_active($recruiter_code)) {
                $found_client = $found_client[0];
                $session_recruiter->login($found_client);
                $message_success =  "<b>Congratulations!</b><br>Registration Successful. <a href='" . SITE_URL . "recru_panel/login'>Click Here to Login</a><br>";
                $message_success .= $recruiters;
            } else {
                $message_error = "Your profile is currently inactive, suspended or your subscription has expired, please contact support for assistance.";
            }
        } else {
            // username/password combo was not found in the database
            $message_error = "Username and password combination do not match.";
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
                    <span class="span-or">Recruiter Registration</span>
                    <hr class="hr-or">
                </div>

                <?php include_once('../layouts/feedback_message.php'); ?>
                <?php if ($message_success == "") { ?>

                    <form action="" method="post" class="form-horizontal tasi-form" name="searchmereg" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-10">
                                Company Name*:
                                <span class="required"></span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="company_name" required class="form-control" type="text" id="company_name" size="30" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-10">
                                Surname (as in passport)*:
                                <span class="required"></span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="last_name" required class="form-control" type="text" id="last_name" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-10">
                                First Name*:
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="first_name" class="form-control" type="text" id="first_name" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-10">
                                Middle Name*:
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="middle_name" class="form-control" type="text" id="middle_name" size="30" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-10">
                                Username:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="account_username" required class="form-control" type="text" id="account_username" size="30" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-10">
                                Password:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="account_password" required class="form-control" type="password" id="account_password" size="30" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-10">
                                Email:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-10">
                                Phone:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="phone" class="form-control" type="text" id="phone" size="30" /></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-10">
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

                        <div class="form-group">
                            <label class="col-md-10">
                                Company Logo/Image:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11"><input name="company_logo" required class="form-control" type="file" id="company_logo" /></div>
                        </div>
                        <div class="form-group ">
                            <label class="col-md-10">Company Info
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-11 col-xs-11 message-form-message">
                                <textarea name="company_info" cols="45" rows="8" aria-required="true"></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-md-10">Address
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

            </div>

            </form>

        <?php }  ?>
        </div>
        </div>
    </section>
</main>
<!-- footer -->
<?php include_once('./main_footer.php'); ?>
<!-- footer -->