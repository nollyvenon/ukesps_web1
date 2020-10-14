<?php
require_once("../main_header.php");
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (!in_array($_GET['sssid'], $_SESSION['cart'])) { //check if that plan ID already exists in the array, if no add
	array_push($_SESSION['cart'], $_GET['sssid']);
}
//print_r( $_SESSION['cart']);
$_SESSION['payment_category'] = $_GET['pptc'];
if ($_POST['proceed']) {
	$unique = $_SESSION['unique'];
	$xxid = encrypt($unique);
	$total_qty = sizeof($_SESSION['cart']);
	$total_price = $_POST['total_grand_amount'];
	$OrderID = $event_prov_object->add_to_order($total_price, $total_qty, $unique);
	$_SESSION['OrderID'] = $OrderID;
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	foreach ($qty as $a => $b) {
		$plan_id = $_SESSION['cart'][$a];
		//$planID = $_POST['planID'];        
		$qty = intval($_POST['qty'][$a]);
		$price = $_POST['price'][$a];
		$event_prov_object->add_to_cart($plan_id, $price, $qty, $OrderID, $unique);
	}
	redirect_to("checkout?sid=" . $xxid);
}
if ($_POST['delete_cart_action']) {
	$unique = $_SESSION['unique'];
	$event_prov_object->delete_cart($unique);
	unset($_SESSION['cart']);
	mysqli_query($admin_db_conn, "DELETE from product_wishlist WHERE code='$unique'");
}

if ($_POST['deleteitem']) {
	$item_id = $_POST['hiditemid'];
	$data1 = $event_prov_object->delete_cart_item($unique, $plan_id);
	if ($data1) {
		$message_error = "Item deleted successfully.";
	}
}
// $uid = $_SESSION['customerid'];
// $cart = $_SESSION['cart'];
?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-row">

			<div class="grid-col grid-col-8">
				<h3>Home Page</h3>
				<?php require_once '../layouts/feedback_message.php'; ?>
				<div class="info-box">
					<h4><?php echo $_SESSION['event_prov_first_name'] . ' ' . $_SESSION['event_prov_middle_name'] . ' ' . $_SESSION['event_prov_last_name'] ?></h4>

				</div>
				<div class="col-md-8">
					<b>Email: </b><span class="instructor-profession"><?php echo $email ?></span>
					<div class="divider"></div>
					<p><b>Phone: </b><?= $phone ?></p>
					<p><b>Address: </b> <?= $billing_address_1 . '<br>' . $billing_address_2 ?></p>
					<p><b>State: </b> <?=
															$states = $zenta_operation->get_states_by_country($billing_country)[0]['state_name']; ?></p>
					<p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($billing_country) ?></p>
					<p><b>Company: </b> <?= $billing_company ?></p>

					<?php if (!$event_prov_object->is_provider_plan_valid($event_prov_code)) { ?>
						<a href="post_event" class="cws-button bt-color-3">Buy a Plan</a>
					<?php	} ?>
				</div>

			</div>
			<?php include('./event_sidebar.php') ?>
		</div>
	</div>
</div>
<?php include("../main_footer.php") ?>