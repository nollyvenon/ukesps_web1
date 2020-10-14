<?php
require_once("../main_header.php");
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}


if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
	$search_text = $_POST['search_text'];

	$query = "SELECT jb.*, jc.category_name, jsc.category_name, jlo.location, co.country_name FROM jobs jb 
	INNER JOIN countries co ON jb.country_id=co.country_id 
	INNER JOIN job_categories jc ON jb.job_category=jc.category_id 
	INNER JOIN job_sub_categories jsc ON jb.job_subcategory=jsc.category_id 
	INNER JOIN job_locations jlo ON jb.location_id=jbo.location_id 
	WHERE jb.recruiter_code='$recruiter_code' AND (jb.job_title LIKE '%$search_text%' OR jc.category_name LIKE '%$search_text%' OR jsc.category_name LIKE '%$search_text%' OR jlo.location LIKE '%$search_text%') ORDER BY jobs_id DESC ";
} else {
	$query = "SELECT * FROM jobs WHERE recruiter_code='$recruiter_code' ORDER BY jobs_id DESC ";
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
			<div class="grid-col grid-col-8">
				<?php include_once("../layouts/feedback_message.php"); ?>
				<h3>Posted Jobs</h3>

				<table class="table table-responsive table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Category</th>
							<th>Sub Category</th>
							<th>Location</th>
							<th>Country</th>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($content) && !empty($content)) {
							foreach ($content as $row) {
								$category_name = $zenta_operation->get_job_category_by_id($row['job_category']);
								$sub_category_name = $zenta_operation->get_subjob_category_by_id($row['job_subcategory']);
								$location_name = $zenta_operation->get_job_location_by_id($row['job_location']);
								$country_name = $zenta_operation->get_country_name_by_id($row['country_id']);
						?>
								<tr>
									<td><?php echo $row['jobs_id']; ?></td>
									<td><?php echo $row['job_title']; ?></td>
									<td><?php echo $category_name['category_name']; ?></td>
									<td><?php echo $sub_category_name['category_name']; ?></td>
									<td><?php echo $location_name[0]['location_name']; ?></td>
									<td><?php echo $country_name; ?></td>
								</tr>
						<?php }
						} else {
							echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>";
						} ?>
					</tbody>
				</table>

			</div>
			<?php include_once('recru_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>