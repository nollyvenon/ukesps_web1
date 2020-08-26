<?php
require_once("z_db.php");
if (!$session_course_prov->is_logged_in()) {
	redirect_to("login");
}

$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);

extract($course_prov_object->get_course_provider_detail($course_prov_code));

$query = "SELECT cou.*, jc.category_name As category_name, jsc.category_name AS sub_category_name, inst.institute_name AS course_institution,
	co.country_name, stm.cs_method AS course_method FROM courses cou 
	INNER JOIN countries co ON cou.country=co.country_id 
	INNER JOIN course_categories jc ON cou.course_category=jc.category_id 
	INNER JOIN course_sub_categories jsc ON cou.course_subcategory=jsc.subcat_id
	INNER JOIN institutions inst ON cou.course_institute=inst.institute_id 
	INNER JOIN course_study_methods stm ON cou.study_method=stm.csm_id WHERE cou.course_prov_code='$course_prov_code' ORDER BY course_id DESC LIMIT 5 ";
$result = $db_handle->runQuery($query);
$content = $db_handle->fetchAssoc($result);
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
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">

	<!--styles -->
</head>

<body class="shop">

	<?php include_once('header.php'); ?>

	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">

				<div class="grid-col grid-col-9">
					<!-- main content -->
					<div class="item-instructor bg-color-1">
						<a href="view_profile" class="instructor-avatar">
							<?php if ($img == "") { ?>
								<img src="../img/11_administrator.png" width="210" height="220" data-at2x="../img/11_administrator.png" alt>
							<?php } else { ?>
								<img src="../img/course_panel/<?= $img; ?>" width="210" height="220" data-at2x="../img/course_panel/<?= $img; ?>" alt>
							<?php } ?>
						</a>
						<div class="info-box">
							<h3><?= $first_name . ' ' . $middle_name . ' ' . $last_name; ?></h3>
							<span class="instructor-profession"><?= $company_name; ?></span>
							<div class="divider"></div>
							<p><?= $about_me; ?></p>
							<div class="social-link">
								<!-- 
										 --><a href="#" class="fa fa-facebook"></a>
								<!-- 
										 --><a href="#" class="fa fa-google-plus"></a>
								<!-- 
										 --><a href="#" class="fa fa-twitter"></a>
							</div>
						</div>
					</div>

					<main>

						<hr class="divider-color" />
						<!-- quote -->
						<h3>Posted Courses</h3>
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
					</main>
					<!-- / main content -->
				</div>
				<?php include_once('cour_sidebar.php'); ?>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>

	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/select2.js"></script>
	<script src="../js/jquery.tweet.js"></script>

	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>

</html>