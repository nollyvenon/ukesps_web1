<?php
include("../main_header.php");
if ($_GET['token']) {
  $user = $course_prov_object->get_user_reset_token($_GET['token']);
  if (!$user) {
    $message_error .= "Invalid password reset token! Please check your email for the correct link";
  }
} else {
  $message_error .= "Please check your email for the correct link";
}
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

    $password = $_POST['password'];
    $confirm_password = $_POST['conf_password'];
    if ($password == NULL || $confirm_password == NULL) {
      $message_error .= 'Please enter both passwords';
    }
    if ($password !== $confirm_password) {
      $message_error .= 'Passwords do not match!';
    } else {
      $result = $course_prov_object->change_user_password($user['couprov_code'], $password);
      if ($result) {
        $message_success =  "<b>Congratulations!</b><br>Password Reset Successful. ";
        $message_success .= '<br>You can now <a href= ' . SITE_URL . '/course_panel/login>Login</a> with your new password OR <br> <a href= ' . SITE_URL . '/course_panel/login>Click Here</a>';
      } else {
        $message_error = "An error occurred, the reset action could not be completed.";
      }
    }
  } else {
    // spam submission
    // show error message
    $message_error .= "Error in your submission.";
  }
}
$page_title = 'Forgot Password';
?>
<script src="https://www.google.com/recaptcha/api.js?render=6LfXhrQZAAAAANTAOfhy3HFEQdm0UJqB_fSSInTm"></script>
<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('6LfXhrQZAAAAANTAOfhy3HFEQdm0UJqB_fSSInTm', {
      action: ''
    }).then(function(token) {
      var recaptchaResponse = document.getElementById('recaptchaResponse');
      recaptchaResponse.value = token;
    });
  });
</script>
<script>
  function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(fpass.femail.value)) {
      return (true)
    }
    alert("You have entered an invalid email address!")
    return (false)
  }
</script>

<main>
  <section class="fullwidth-background bg-2">
    <div class="grid-row">
      <div class="login-block">
        <div class="logo_login text-center" style='padding:20px;'>
          <img class="img-fluid rounded mx-auto d-block" src="<?= SITE_URL ?>/img/logo.jpg" alt>
          <!--<h2>UKESPS</h2>-->
        </div>
        <!-- <a href="#" class="facebook cws-button border-radius half-button">Facebook</a>
				<a href="#" class="twitter cws-button border-radius half-button">Twitter</a> -->
        <div class="clear-both"></div>
        <div class="login-or">
          <hr class="hr-or">
          <span class="span-or">Reset password</span>
          <hr class="hr-or">
        </div>
        <form name="fpass" class="form-horizontal form-material" id="fpass" action="" method="post">
          <h3 class="box-title m-b-20">Reset Password</h3>
          <?php require_once '../layouts/feedback_message.php'; ?>
          <?php if ($user) { ?>
            <div class="form-group">
              <div class="col-xs-12">
                <input class="form-control" type="password" required="" id="password" name="password" placeholder="New Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <input class="form-control" type="password" required="" id="conf_password" name="conf_password" placeholder="Confirm New Password">
              </div>
            </div>
            <br>
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            <input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" value="Reset password">
          <?php } ?>

        </form>
      </div>
    </div>
  </section>
</main>
<!-- footer -->
<?php include_once('../main_footer.php'); ?>
<!-- footer -->