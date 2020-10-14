<?php
include_once("../main_header.php");
// var_dump($session_recruiter->is_logged_in());
// die();
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
if (!$recruit_object->is_active_paid($recruiter_code, "2") || !$session_recruiter->is_logged_in()) {
	redirect_to("cv_search_plans");
}
$rec_plan = $recruit_object->get_recruiting_cv_plans();
$_SESSION['payment_category'] = '2'; //cv search
if (isset($_POST['search2'])) {
	$search_text = encrypt($_POST['search_text']);
	$search_town = encrypt($_POST['search_town']);
	$minsalary = encrypt($_POST['minsalary']);
	$maxsalary = encrypt($_POST['maxsalary']);
	$sector_name = encrypt(implode(',', $_POST['sector_name']));
	$sl_name = encrypt(implode(',', $_POST['sl_name']));
	$jobexperience_name = encrypt(implode(',', $_POST['jobexperience_name']));
	$joblevel_name = encrypt(implode(',', $_POST['joblevel_name']));
	$skill_name = encrypt(implode(',', $_POST['skill_name']));
	$build_query = "search_text=$search_text&search_town=$search_town&minsalary=$minsalary&maxsalary=$maxsalary&sector_name=$sector_name&sl_name=$sl_name&jobexperience_name=$jobexperience_name&joblevel_name=joblevel_name&skill_name=$skill_name";
	redirect_to("cv_search_result?$build_query");
} else if (isset($_POST['search1'])) {
	$search_text = encrypt($_POST['search_text']);
	$search_town = encrypt($_POST['search_town']);
	$build_query = "search_text=$search_text&search_town=$search_town";
	redirect_to("cv_search_result?$build_query");
}
?>

<div class="page-content container container-fluid ">
	<main>
		<div class="container">
			<h4>CV Search</h4>
			<?php include_once("../layouts/feedback_message.php"); ?>
			<div class="search-container container clear-fix">
				<!-- search -->
				<div class="category-search">
					<i class="fa fa-search"></i>
					<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
						&nbsp;What
						<input name="search_text" type="text" oninput="document.getElementById('search_text').value = value" size="10" class="input-text" value placeholder="e.g software developer">
						Where
						<input name="search_town" type="text" oninput="document.getElementById('search_town').value = value" style="width: 30%;" size="10" value="" value placeholder="town or postcode">
						<button name="search1" type="submit" class="cws-button smaller border-radius alt">Search</button>
					</form>
				</div>

				<!-- / search -->
			</div>
			<form action="" method="post" class="form-horizontal">
				<input name="search_text" type="hidden" id="search_text">
				<input name="search_town" type="hidden" id="search_town">
				<div class="form-group row mt-3">
					<label for="staticEmail" class="col-sm-2 col-form-label">Salary</label>
					<div class="col-sm-3">
						<input type="text" class="form-control-plaintext" id="minsalary" name="minsalary" value="" placeholder="£">
					</div>
					<div class="col-sm-1">
						to
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control-plaintext" id="maxsalary" name="maxsalary" value="" placeholder="£">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Sectors</label>
					<div class="col-sm-8">
						<?php
						$query = "SELECT * FROM job_sectors";
						$result = $db_handle->runQuery($query);
						$num_Cat = $db_handle->numOfRows($result); //get the no of job categories
						$fnum_cat = $num_Cat / 2; //divide into the 4 columns
						$cat_count = 0;

						$content = $db_handle->fetchAssoc($result);
						$cat_info = "<div class=\"grid-col grid-col-12 grid-col-row clear-fix\">";
						if (isset($content) && !empty($content)) {
							foreach ($content as $row) {
								$sector_id = $row['sector_id'];
								$sector_name = $row['sector_name'];
								$cat_info .= "<div style=\"height:50px;\" class=\"columns-col columns-col-2 \">
								<div class=\"checkbox\">
                                  <input type=\"checkbox\" id=\"sector_id$sector_id\" name=\"sector_name[]\" value=\"$sector_id\" >
                                  <label for=\"sector_id$sector_id\"></label>
                                </div>
								$sector_name
							</div>";
								if ($cat_count == $num_Cat) {
									$cat_info .= "</div></div>";
								}
								$cat_count++;
							}
						}
						$cat_info .= "</div>";
						echo $cat_info;

						?>

					</div>
				</div>

				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Candidates Who</label>
					<div class="col-sm-8">
						<?php
						$query = "SELECT * FROM study_levels";
						$result1 = $db_handle->runQuery($query);
						$num_Cat = $db_handle->numOfRows($result1); //get the no of job categories
						$fnum_cat = $num_Cat / 2; //divide into the 4 columns
						$cat_count = 0;

						$content1 = $db_handle->fetchAssoc($result1);
						$cat_info = "<div class=\"grid-col grid-col-12 grid-col-row clear-fix\">";
						if (isset($content1) && !empty($content1)) {
							foreach ($content1 as $row) {
								$sl_id = $row['sl_id'];
								$sl_name = $row['sl_name'];
								$cat_info .= "<div style=\"height:50px;\" class=\"columns-col columns-col-2 \">
						<div class=\"checkbox\">
                                  <input type=\"checkbox\" id=\"sl_id$sl_name\" name=\"sl_name[]\" value=\"$sl_id\" >
                                  <label for=\"sl_id$sl_name\"></label>
                                </div>
								$sl_name
							</div>";
								if ($cat_count == $num_Cat) {
									$cat_info .= "</div></div>";
								}
								$cat_count++;
							}
						}
						$cat_info .= "</div>";
						echo $cat_info;

						?>

					</div>
				</div>



				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Work Experience</label>
					<div class="col-sm-8">
						<?php
						$query = "SELECT * FROM job_experience";
						$result1 = $db_handle->runQuery($query);
						$num_Cat = $db_handle->numOfRows($result1); //get the no of job categories
						$fnum_cat = $num_Cat / 2; //divide into the 4 columns
						$cat_count = 0;

						$content1 = $db_handle->fetchAssoc($result1);
						$cat_info = "<div class=\"grid-col grid-col-12 grid-col-row clear-fix\">";
						if (isset($content1) && !empty($content1)) {
							foreach ($content1 as $row) {
								$jobexperience_id = $row['jobexperience_id'];
								$jobexperience_name = $row['jobexperience_name'];
								$cat_info .= "<div style=\"height:50px;\" class=\"columns-col columns-col-2 \">
						<div class=\"checkbox\">
                                  <input type=\"checkbox\" id=\"jbe_id$jobexperience_name\" name=\"jobexperience_name[]\" value=\"$jobexperience_id\" >
                                  <label for=\"jbe_id$jobexperience_name\"></label>
                                </div>
								$jobexperience_name
							</div>";
								if ($cat_count == $num_Cat) {
									$cat_info .= "</div></div>";
								}
								$cat_count++;
							}
						}
						$cat_info .= "</div>";
						echo $cat_info;

						?>
					</div>
				</div>

				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Experience Level</label>
					<div class="col-sm-8">
						<?php
						$query = "SELECT * FROM job_levels";
						$result1 = $db_handle->runQuery($query);
						$num_Cat = $db_handle->numOfRows($result1); //get the no of job categories
						$fnum_cat = $num_Cat / 2; //divide into the 4 columns
						$cat_count = 0;

						$content1 = $db_handle->fetchAssoc($result1);
						$cat_info = "<div class=\"grid-col grid-col-12 grid-col-row clear-fix\">";
						if (isset($content1) && !empty($content1)) {
							foreach ($content1 as $row) {
								$joblevel_id = $row['joblevel_id'];
								$joblevel_name = $row['joblevel_name'];
								$cat_info .= "<div style=\"height:50px;\" class=\"columns-col columns-col-2 \">
						<div class=\"checkbox\">
                                  <input type=\"checkbox\" id=\"jbl_id$joblevel_name\" name=\"joblevel_name[]\" value=\"$joblevel_id\" >
                                  <label for=\"jbl_id$joblevel_name\"></label>
                                </div>
								$joblevel_name
							</div>";
								/*if($cat_count==$num_Cat){
					$cat_info .= "</div>";
				}*/
								$cat_count++;
							}
						}
						$cat_info .= "</div>";
						echo $cat_info;

						?>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-4 col-form-label">Skills</label>
						<div class="col-sm-6">
							<?php
							$query = "SELECT * FROM job_skills";
							$result1 = $db_handle->runQuery($query);
							$num_Cat = $db_handle->numOfRows($result1); //get the no of job categories
							$fnum_cat = $num_Cat / 2; //divide into the 4 columns
							$cat_count = 0;

							$content1 = $db_handle->fetchAssoc($result1);
							$cat_info = "<div class=\"grid-col grid-col-12 grid-col-row clear-fix\">";
							if (isset($content1) && !empty($content1)) {
								foreach ($content1 as $row) {
									$skill_id = $row['skill_id'];
									$skill_name = $row['skill_name'];
									$cat_info .= "<div style=\"height:50px;\" class=\"columns-col columns-col-2 \">
						<div class=\"checkbox\">
                                  <input type=\"checkbox\" id=\"ski_id$skill_name\" name=\"skill_name[]\" value=\"$skill_id\" >
                                  <label for=\"ski_id$skill_name\"></label>
                                </div>
								$skill_name
							</div>";
									/*if($cat_count==$num_Cat){
					$cat_info .= "</div>";
				}*/
									$cat_count++;
								}
							}
							$cat_info .= "</div>";
							echo $cat_info;

							?>
						</div>
						<br><br><br>
						<div class="form-group row mt3 ml-4">
							<div class=""> <button type="submit" name="search2" class="cws-button  border-radius alt">Search</button></div>
						</div>

					</div>

			</form>


		</div>

	</main>
</div>
<?php include_once('../main_footer.php'); ?>