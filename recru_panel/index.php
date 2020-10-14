<?php
require_once("../main_header.php");
// $ssid = $_GET['xxid'];
// $id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
// $id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
// $ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
//$payments = $recruit_object->get_all_past_payments($recruiter_code);

if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	$search_text = $_POST['search_text'];
	$query = "SELECT * FROM payments WHERE recruiter_code = '$recruiter_code' AND (OrderID = '%$search_text' OR payer_email = '%$search_text' LIKE payment_status = '%$search_text%' LIKE gateway = '%$search_text%' LIKE payment_currency = '%$search_text%') ORDER BY id DESC ";
} else {
	$query = "SELECT * FROM payments WHERE recruiter_code = '$recruiter_code' ORDER BY id DESC ";
}
$numrows = $db_handle->numRows($query);

// For search, make rows per page equal total rows found, meaning, no pagination
// for search results
if (isset($_POST['search_text'])) {
	$rowsperpage = $numrows;
} else {
	$rowsperpage = 20;
}

$totalpages = ceil($numrows / $rowsperpage);
// get the current page or set a default
if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
	$currentpage = (int) $_GET['pg'];
} else {
	$currentpage = 1;
}
if ($currentpage > $totalpages) {
	$currentpage = $totalpages;
}
if ($currentpage < 1) {
	$currentpage = 1;
}

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if ($prespagehigh > $numrows) {
	$prespagehigh = $numrows;
}

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$content1 = $db_handle->fetchAssoc($result);
?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-row">
			<div class="grid-col grid-col-8">
				<h3>Home Page</h3>
				<?php require_once '../layouts/feedback_message.php'; ?>

				<div class="col-md-6">
					<div class="info-box">
						<h4><?php echo $first_name . ' ' . $middle_name . ' ' . $last_name ?></h4>
						<span class="instructor-profession"><?php echo $email ?></span>
						<div class="divider"></div>
						<p><?= $phone ?></p>
						<p><?= $billing_address_1 . '<br>' . $billing_address_2 ?></p>
					</div>
				</div>
				<div class="col-md-4">
					<p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($billing_country) ?></p>
					<p><b>Company: </b> <?= $billing_company ?></p>

					<?php if (!$recruit_object->is_recruit_plan_valid($recruiter_code, "1")) { ?>
						<a href="post_a_job" class="cws-button bt-color-3">Buy a Plan</a>
					<?php	} ?>
				</div>

			</div>
			<?php include_once('recru_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>