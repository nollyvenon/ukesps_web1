<?php
include_once("../main_header.php");
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
$content = $recruit_object->all_applicant_lists($recruiter_code);

?>

<div class="page-content sitemap container container-fluid clear-fix">

	<div class="col-12">
		<h4>Applicant Lists</h4>
		<?php include_once("../layouts/feedback_message.php"); ?>
		<table class="table table-responsive table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>List name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if (isset($content) && !empty($content)) {
					foreach ($content as $row) { ?>
						<tr>
							<td><?php echo $row['list_id']; ?></td>
							<td><?php echo $row['list_name']; ?></td>
							<td><?php echo limit_text($row['description'], 15); ?></td>
							<td><a class="btn btn-border green" title="View" href="appl_list_details?hiss=<?php echo encrypt($row['list_id']); ?>"><span> <i class="fa fa-eye-slash"></i></span></a>
								<a class="btn btn-border green" title="Delete" href="del_appl_list?hiss=<?php echo encrypt($row['list_id']); ?>"><span> <i class="fa fa-trash-o"></i></span></a>
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
			<?php $pg = intval($_GET['pg']);
			if ($pg > 1) { ?>
				<a href="?pg=<?= $pg - 1; ?>"><i class="fa fa-angle-double-left"></i></a>
				<a href="?pg=<?= $pg; ?>" class="active"><?= $pg; ?></a>
			<?php } ?>
			<!-- 
                                    --><a href="?pg=<?= $pg + 1; ?>"><?= $pg + 1; ?></a>
			<!-- 
                                    --><a href="?pg=<?= $pg + 2; ?>"><?= $pg + 2; ?></a>
			<!-- 
                                    --><a href="?pg=<?= $pg + 3; ?>"><i class="fa fa-angle-double-right"></i></a>


		</div>


	</div>
	<?php include_once('../main_footer.php'); ?>