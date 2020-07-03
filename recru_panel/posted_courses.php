<?php
require_once("z_db.php");
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}

if(isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
    $search_text = $_POST['search_text'];
	$query = "SELECT cou.*, jc.category_name As category_name, jsc.category_name AS sub_category_name, inst.institute_name AS course_institution, co.country_name, stm.cs_method AS course_method FROM courses cou 
	INNER JOIN countries co ON cou.country_id=co.country_id 
	INNER JOIN course_categories jc ON cou.course_category=jc.category_id 
	INNER JOIN course_sub_categories jsc ON cou.course_subcategory=jsc.subcat_id
	INNER JOIN institutions inst ON cou.course_institute=inst.institute_id 
	INNER JOIN course_study_methods stm ON cou.study_method=stm.sm_id 
	WHERE cou.recruiter_code='$recruiter_code' AND (cou.course_title LIKE '%$search_text%' OR jc.category_name LIKE '%$search_text%' OR jsc.category_name LIKE '%$search_text%' OR jlo.location LIKE '%$search_text%' OR stm.sm_name LIKE '%$search_text%') ORDER BY course_id DESC ";
} else {
	$query = "SELECT cou.*, jc.category_name As category_name, jsc.category_name AS sub_category_name, inst.institute_name AS course_institution,
	co.country_name, stm.cs_method AS course_method FROM courses cou 
	INNER JOIN countries co ON cou.country=co.country_id 
	INNER JOIN course_categories jc ON cou.course_category=jc.category_id 
	INNER JOIN course_sub_categories jsc ON cou.course_subcategory=jsc.subcat_id
	INNER JOIN institutions inst ON cou.course_institute=inst.institute_id 
	INNER JOIN course_study_methods stm ON cou.study_method=stm.csm_id WHERE cou.recruiter_code='$recruiter_code' ORDER BY course_id DESC ";
}
echo $numrows = $db_handle->numRows($query);

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
if ($currentpage > $totalpages) { $currentpage = $totalpages; }
if ($currentpage < 1) { $currentpage = 1; }

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if($prespagehigh > $numrows) { $prespagehigh = $numrows; }

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$content = $db_handle->fetchAssoc($result);
?><!DOCTYPE HTML>
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
	<link rel="stylesheet" href="../css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	
	<!--styles -->
</head>
<body class="shop">

	<?php include_once('header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-8">
                    <h3>Posted Courses</h3>
                            
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
                                        <?php if(isset($content) && !empty($content)) { foreach ($content as $row) { ?>
                                        <tr>
                                       <!--     <td><?php echo $row['course_id']; ?></td>-->
                                            <td><?php echo $row['course_title']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php echo $row['course_institution']; ?></td>
                                            <td><?php echo truncate_str($row['course_overview'],300); ?></td>
                                            <td><?php echo $row['country_name']; ?></td>
                                            <td><a class="btn btn-border green" href="view_course?hiss=<?php echo encrypt($row['course_id']); ?>"><span>  <i class="fa fa-book"></i></span></a>
												<a class="btn btn-border green" href="edit_course?hiss=<?php echo encrypt($row['course_id']); ?>"><span>  <i class="fa fa-edit"></i></span></a>
                                            <a class="btn btn-border dark" href="del_course.php?hiss=<?php echo encrypt($row['course_id']); ?>"><span>  <i class="fa fa-trash-o"></i></span></a>
											</td>
                                        </tr>
                                        <?php } } else { echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>"; } ?>
                                    </tbody>
                                </table>         
					<!-- pagination -->
					<div class="page-pagination clear-fix">
						<?php 
							if($currentpage  > 1){?>
						<a href="?pg=<?=$currentpage-1;?>"><i class="fa fa-angle-double-left"></i></a>
						<?php } 
						for($currentpage = $totalpages; $currentpage < $totalpages; $i++): if($currentpage <= $totalpages): ?>
						<a href="?spg=<?=$currentpage;?>" class="active"><?=$pg;?>
						<?php endif; endfor;
							if ($currentpage > $totalpages) { ?>
						--><a href="?pg=<?=$currentpage+1;?>"><?=$currentpage+1;?></a><!-- 
						--><a href="?pg=<?=$currentpage+2;?>"><?=$currentpage+2;?></a><!-- 
						--><a href="?pg=<?=$currentpage+3;?>"><i class="fa fa-angle-double-right"></i></a>
						<?php }  ?>
					</div>
				 
	
				</div>
				<?php include_once('recru_sidebar.php');?>
			</div>
		</div>
	</div>
	<?php include_once('footer.php');?>
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