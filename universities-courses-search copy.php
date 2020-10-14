<?php
include_once("z_db.php");
// $course_categories = $zenta_operation->get_course_categories();
// $course_types = $zenta_operation->get_course_types('4');
$similar_courses = $zenta_operation->get_similar_courses('5');
$events = $zenta_operation->upcoming_events(date('Y-m-d'));
$countries = $zenta_operation->get_all_countries();
$course_providers = $zenta_operation->get_course_providers();

if ($_SESSION['course_search'] != NULL) {
  $params = $_SESSION['course_search'];
  if ($params['course'] != '') {
    $search_text = $params['course'];
  }
  if ($params['country'] != '') {
    $search_country = $params['country'];
  }
  if ($params['study_level'] != '') {
    $search_level = $params['study_level'];
  }
  $query = "SELECT cou.* FROM courses cou
		LEFT JOIN course_providers cour_prov ON cou.couprov_code=cour_prov.couprov_code
    LEFT JOIN countries cont ON cou.country=cont.country_id
    LEFT JOIN study_levels st_levels ON cou.study_level=st_levels.sl_id
        WHERE cou.course_title LIKE '%$search_text%' AND cou.study_level LIKE '%$search_level%' AND cou.country LIKE '%$search_country%' order by cou.course_id DESC ";
  $result = $db_handle->runQuery($query);
  $content = $db_handle->fetchAssoc($result);
} else if ($_SESSION['university_search'] != NULL) {
  // var_dump($_SESSION['university_search']);
  // die();

  $query = "SELECT cou.*, cour_prov.*, country.*, st_levels.* FROM courses cou
		LEFT JOIN course_providers cour_prov ON cou.couprov_code=cour_prov.couprov_code
    LEFT JOIN country country ON cou.country_id=country.id
    LEFT JOIN study_levels st_levels ON cou.study_level=st_levels.sl_id
        WHERE cou.job_title LIKE '%$search_text%' or cour_prov.location_name LIKE '%$job_loc%' order by cou.courses_id DESC ";
  $result = $db_handle->runQuery($query);
  $content = $db_handle->fetchAssoc($result);
}

// var_dump($content);
// die();
?>
<!-- page header -->
<?php include_once('main_header.php'); ?>
<!-- edu header -- -->

<hr class="divider-color" />
<div class="page-content container clear-fix">

  <div class="row">

    <div class="col-lg-8 col-md-8">
      <main>
        <?php if ($content != NULL) { ?>
          <h1>SEARCH RESULTS</h1>
          <p>If you cannot see the university you are looking for please contact your nearest UKESPS office</p>
          <?php foreach ($content as $course) { ?>
            <div class="card">
              <div class="card-header">
                <?php foreach ($countries as $country) {
                  if ($country['country_id'] == $course['country']) { ?>
                    <?= $country['country_name'] ?>
                <?php }
                } ?>
              </div>
              <div class="card-body">
                <?php foreach ($course_providers as $couprov) {
                  if ($couprov['couprov_code'] == $course['couprov_code']) { ?>
                    <h6 class="card-title"><?= $couprov['company_name'] ?></h6>
                <?php }
                } ?>
                <p class="card-text" style="font-weight: bold;"><?= $course['course_title'] ?></p>
                <?php foreach ($study_levels as $st_lvl) {
                  if ($st_lvl['sl_id'] == $course['study_level']) { ?>
                    <p class="card-text"><?= $st_lvl['sl_name'] ?></p>
                <?php }
                } ?>

                <a href="#" class="btn btn-primary mr-0">more...</a>
              </div>
            </div>
          <?php } ?>

        <?php } else { ?>
          <h1>NO RESULT FOUND</h1>
        <?php } ?>

      </main>
    </div>
    <?php include_once('sidebar.php'); ?>
  </div>
</div>
<!--=================================
 special-feature -->
<!-- / content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->