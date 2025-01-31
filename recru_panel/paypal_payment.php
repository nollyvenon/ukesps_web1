<?php
require_once("../main_header.php");
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
  redirect_to("login");
}
$cart_total = $recruit_object->get_cart_total($ssid);
$cart_info = $recruit_object->get_order_items($ssid);

// var_dump($cart_info);
// var_dump($recruiter);
// var_dump($payment_object);
// var_dump($_SESSION['recruit_unique_code']);
// var_dump($session_recruiter->recruit_unique_code);
//$message_success = "You have placed your order successfully<br>Thank you for shopping with us!";

?>


<script src="https://www.paypal.com/sdk/js?client-id=AVTa5JLKgSabwhLq21ZylEOC4jdrb1-CA1BqWmAo89vFx7kru7bdVAZOWnjjkCrvQwCVUygHsKHSjk7L">
  // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
</script>

<div id="paypal-button-container" style="width: 50%; margin: 50px auto;"></div>

<!-- Add the checkout buttons, set up the order and approve the order -->
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '200'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {

        console.log(data);
        console.log(actions);

        let type = '<?php echo $pricing[0]["duration"] ?>';
        let price = '<?php echo $pricing[0]["pricing"] ?>';
        let url = '<?php echo SITE_URL ?>/pricing.php';

        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);

        //Send the proper header information along with the request
        // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // xhr.onreadystatechange = function() { // Call a function when the state changes.
        //   if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        //     let res = JSON.parse(xhr.response);
        //     if (res.status === 'success') {
        //       window.location = '<?php echo SITE_URL ?>/portal/admin';

        //     }
        //   }
        // }

        // xhr.send("id=&price=" + price + "&gateway=Paypal&type=" + type + "&ref=" + details.id);
      });
    }
  }).render('#paypal-button-container'); // Display payment options on your web page
</script>

<div class="page-content woocommerce">
  <div class="container clear-fix">
    <div class="grid-col-row">
      <div class="grid-col grid-col-9">
        <?php include_once("../layouts/feedback_message.php"); ?>
        Total Amount = <?php echo $cart_total; ?>
        <div class="jumbotron text-center">
          <h3>Recruitment Plan payment</h3>
          <p>Total Amount = <?php echo $cart_total; ?></p>
        </div>
        <?php if (isset($cart_info) && !empty($cart_info)) {
          foreach ($cart_info as $row) {   ?>
            <div class="container">
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
            </div>
        <?php }
        } ?>
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type='hidden' name='business' value='ukesps@gmail.com'>
          <?php if (isset($cart_info) && !empty($cart_info)) {
            foreach ($cart_info as $row) {   ?>
              <input type='hidden' name='item_name' value='<?php echo $recruit_object->recruiting_plan_detail_by_id(['pid'])['plan_name']; ?>'>
              <input type='hidden' name='item_number' value='<?php echo $row['pid']; ?>'>
              <input type='hidden' name='amount' value='<?php echo $row['productprice']; ?>'>
              <input type='hidden' name='no_shipping' value='1'>
              <input type='hidden' name='currency_code' value='USD'>
          <?php }
          } ?>
          <input type='hidden' name='notify_url' value='https://<?= $_SERVER['HTTP_HOST']; ?>/recru_panel/notify.php'>
          <input type='hidden' name='cancel_return' value='https://<?= $_SERVER['HTTP_HOST']; ?>/recru_panel/cancel.php'>
          <input type='hidden' name='return' value='https://<?= $_SERVER['HTTP_HOST']; ?>/recru_panel/return.php'>
          <input type="hidden" name="cmd" value="_xclick"> <input type="submit" name="pay_now" id="pay_now" Value="Pay Now">
        </form>
      </div>
      <?php include_once('../course_sidebar.php'); ?>
    </div>
  </div>
</div>
<?php include_once('../main_footer.php'); ?>