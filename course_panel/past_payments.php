<?php
require_once("../main_header.php");
$ssid = $_GET['xxid'];
$id_encrypted = $db_handle->sanitizePost($_GET['xxid']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_course_prov->is_logged_in()) {
	redirect_to("login");
}
//$payments = $course_prov_object->get_all_past_payments($course_prov_code);

if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	$search_text = $_POST['search_text'];
	$query = "SELECT * FROM payments WHERE couprov_code = '$course_prov_code' AND (OrderID = '%$search_text' OR payer_email = '%$search_text' LIKE payment_status = '%$search_text%' LIKE gateway = '%$search_text%' LIKE payment_currency = '%$search_text%') ORDER BY id DESC ";
} else {
	$query = "SELECT * FROM payments WHERE couprov_code = '$course_prov_code' ORDER BY id DESC ";
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
$content = $db_handle->fetchAssoc($result);
?>


<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-9">
				<?php include_once("../layouts/feedback_message.php"); ?>
				<h3>Past payments</h3>
				<?php require_once '../layouts/feedback_message.php'; ?>

				<?php if (isset($content) && !empty($content)) { ?>
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<!--  <th>ID</th>-->
								<th>Title</th>
								<th>Location</th>
								<th>Institute</th>
								<th>Overview</th>
								<th>Country</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($content as $row) { ?>
								<tr>
									<!--     <td><?php echo $row['course_id']; ?></td>-->
									<td><?php echo $row['course_title']; ?></td>
									<td><?php echo $row['location']; ?></td>
									<td><?php echo $row['course_institution']; ?></td>
									<td><?php echo truncate_str($row['course_overview'], 300); ?></td>
									<td><?php echo $row['country_name']; ?></td>
									<td><a class="btn btn-border green" href="view_course?hiss=<?php echo encrypt($row['course_id']); ?>"><span> <i class="fa fa-book"></i></span></a>
										<a class="btn btn-border green" href="edit_course?hiss=<?php echo encrypt($row['course_id']); ?>"><span> <i class="fa fa-edit"></i></span></a>
										<a class="btn btn-border dark" href="del_course.php?hiss=<?php echo encrypt($row['course_id']); ?>"><span> <i class="fa fa-trash-o"></i></span></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } else {
					echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>";
				} ?>
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
			<?php include_once('cour_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>