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
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<h3>Past payments</h3>
				<?php require_once '../layouts/feedback_message.php'; ?>

				<table class="table table-responsive table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Email</th>
							<th>Order ID</th>
							<th>Amount</th>
							<th>Gateway</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($content1) && !empty($content1)) {
							foreach ($content1 as $row) { ?>
								<tr>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['payer_email']; ?></td>
									<td><?php echo $row['OrderID']; ?></td>
									<td><?php echo $row['payment_currency'] . $row['payment_amount'] / 100; ?></td>
									<td><?php echo $row['gateway'] == "1" ? "Paypal" : "Paystack"; ?></td>
									<td><?php echo date('d M, Y', strtotime($row['create_at'])); ?></td>
									<td><a class="btn btn-border green" href="paymt_det?hiss=<?php echo encrypt($row['id']); ?>"><span> <i class="fa fa-eye-slash"></i></span></a>
									</td>
								</tr>
						<?php }
						} else {
							echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>";
						} ?>
					</tbody>
				</table>
				<!-- pagination -->
				<div class="page-pagination clear-fix">
					<?php
					if ($currentpage  > 1) { ?>
						<a href="?pg=<?= $currentpage - 1; ?>"><i class="fa fa-angle-double-left"></i></a>
						<?php }
					for ($currentpage = $totalpages; $currentpage < $totalpages; $i++) : if ($currentpage <= $totalpages) : ?>
							<a href="?pg=<?= $currentpage; ?>" class="active"><?= $pg; ?>
							<?php endif;
					endfor;
					if ($currentpage > $totalpages) { ?>
							--><a href="?pg=<?= $currentpage + 1; ?>"><?= $currentpage + 1; ?></a>
							<!-- 
						--><a href="?pg=<?= $currentpage + 2; ?>"><?= $currentpage + 2; ?></a>
							<!-- 
						--><a href="?pg=<?= $currentpage + 3; ?>"><i class="fa fa-angle-double-right"></i></a>
						<?php }  ?>
				</div>
				<!-- / pagination -->

			</div>
			<?php include_once('recru_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>