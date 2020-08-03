<?php
include("z_db.php");
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
        $company_name = $_POST['company_name'];
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

        if ($db_handle->numRows("SELECT username FROM course_providers WHERE email = '$email' OR username = '$account_username'") > 0) {
            $message_error .= "Username/Email already exists in our database.";
            goto exitpoint;
        };

        $course_providers = $course_prov_object->add_new_course_provider($first_name, $last_name, $phone, $email, $account_username, $account_password, $billing_company, $mailing_address, "", "",  "", $country, $company_name);
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
<!DOCTYPE HTML>
<html>

<head>
    <title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/select2.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!--styles -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
</head>

<body class="">
    <?php include_once('header.php'); ?>
    <main>
        <section class="fullwidth-background bg-2">
            <div class="grid-row">
                <div class="login-block">
                    <div class="logo">
                        <img src="../img/logo.png" data-at2x='../img/logo@2x.png' alt>
                        <h2>Register</h2>
                    </div>


                    <?php include_once('../layouts/feedback_message.php'); ?>
                    <?php if ($message_success == "") { ?>

                        <form action="" method="post" class="form-horizontal tasi-form" name="searchmereg" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-3">
                                    Surname:
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-xs-11"><input name="last_name" required class="form-control" type="text" id="last_name" size="30" /></div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">
                                    First Name*:
                                </label>
                                <div class="col-md-10 col-xs-11"><input name="first_name" class="form-control" type="text" id="first_name" size="30" /></div>
                            </div>

                            <!--<div class="form-group">
         	<label class="col-md-2">
                Middle Name*:
            </label>
              <div class="col-md-10 col-xs-11"><input name="middle_name"   class="form-control" type="text" id="middle_name" size="30" /></div>
          </div>-->
                            <br>
                            <div class="form-group">
                                <label class="col-md-2">
                                    Email:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" /></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2">
                                    Password:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-xs-11"><input name="account_password" required class="form-control" type="password" id="account_password" size="30" /></div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">
                                    Phone:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-xs-11"><input name="phone" class="form-control" type="text" id="phone" size="30" /></div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">
                                    Company Name:
                                </label>
                                <div class="col-md-10 col-xs-11">
                                    <div class="col-md-10 col-xs-11"><input name="company_name" class="form-control" type="text" id="company_name" size="30" /></div>
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
    <?php include_once('footer.php'); ?>
    <!-- footer -->
    <!-- scripts -->
    <script type='text/javascript' src='../js/jquery.validate.min.js'></script>
    <script src="../js/jquery.form.min.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/select2.js"></script>
    <script src="../js/jquery.isotope.min.js"></script>

    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jflickrfeed.min.js"></script>
    <script src="../js/jquery.tweet.js"></script>
    <script src="../js/jquery.fancybox.pack.js"></script>
    <script src="../js/jquery.fancybox-media.js"></script>
    <script src="../js/retina.min.js"></script>
    <!-- scripts -->
</body>

</html>