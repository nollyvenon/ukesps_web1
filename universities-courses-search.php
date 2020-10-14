<?php
include_once("main_header.php");
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
    if ($params['country'] == 'all_countries') {
      $search_country = '';
    } else {
      $search_country = $params['country'];
    }
  }
  if ($params['study_level'] != '') {
    $search_level = $params['study_level'];
  }
  $query = "SELECT cou.*, cont.country_name, st_levels.sl_name, cour_prov.*  FROM courses cou
		LEFT JOIN course_providers cour_prov ON cou.couprov_code=cour_prov.couprov_code
    LEFT JOIN countries cont ON cou.country=cont.country_id
    LEFT JOIN study_levels st_levels ON cou.study_level=st_levels.sl_id
        WHERE cou.course_title LIKE '%$search_text%' AND cou.study_level LIKE '%$search_level%' AND cou.country LIKE '%$search_country%' order by cou.course_id DESC ";
  $result = $db_handle->runQuery($query);
  $content = $db_handle->fetchAssoc($result);
} else if ($_SESSION['university_search'] != NULL) {
  $params = $_SESSION['university_search'];
  if ($params != '') {
    $search_text = $params['university'];
  }
  if ($params['country'] != '') {
    if ($params['country'] == 'all_countries') {
      $search_country = '';
    } else {
      $search_country = $params['country'];
    }
  }
  $query = "SELECT couprov.*, cont.* FROM course_providers couprov
   LEFT JOIN countries cont ON couprov.country=cont.country_id
        WHERE cont.country_name LIKE '%$search_text%' AND couprov.country LIKE '%$search_country%' order by couprov.id DESC ";
  $result = $db_handle->runQuery($query);
  $content2 = $db_handle->fetchAssoc($result);
}

// var_dump($content);
// die();
?>

<!-- page header -->

<!-- edu header -- -->

<hr class="divider-color" />
<div class="page-content container clear-fix">
  <div class="row">

    <div class="col-lg-8 col-md-8">
      <main>
        <?php if ($content != NULL) {

        ?>
          <h1>SEARCH RESULTS</h1>
          <p>If you cannot see the university you are looking for please contact your nearest UKESPS office</p>
          <?php foreach ($countries as $country) { ?>
            <?php $course_providers = $zenta_operation->get_course_providers_by_country_id($country['country_id']) ?>
            <?php if (!empty($course_providers)) {
              $cc = $zenta_operation->get_country_name_by_id($course_providers[0]['country']) ?>
              <h4 style="padding: 20px;"><?= $cc ?></h4>
              <?php foreach ($course_providers as $couprovi) {  ?>
                <div class="card mb-3">
                  <div class="card-header">
                    <?= $couprovi['company_name'] ?>
                  </div>
                  <div class="card-body">
                    <p class="card-text" style="font-weight: bold;"><?= limit_text($couprovi['about_me'], 25); ?></p>
                    <?php foreach ($content as $course) {
                      if ($course['country'] == $country['country_id']) { ?>
                        <p class="card-text" style="font-weight: bold;"><?= $course['course_title'] ?></p>
                        <p class="card-text"><?= $course['sl_name'] ?></p>
                    <?php

                      }
                    } ?>
                    <div class="text-right">
                      <a href="<?= SITE_URL . '/universities?uni=' . $couprovi['username'] ?>" class="text-primary">more...</a>
                    </div>
                  </div>
                </div>
              <?php } ?>

            <?php } ?>

          <?php } ?>
        <?php } else if ($content2 != NULL) { ?>
          <h1>SEARCH RESULTS</h1>
          <p>If you cannot see the university you are looking for please contact your nearest UKESPS office</p>
          <?php foreach ($countries as $country) { ?>
            <!-- <h4 style="padding: 20px;"><?= $country_name ?></h4> -->
            <?php foreach ($content2 as $couprovi) {
              if ($couprovi['country'] == $country['country_id']) {
                // $country_name =  $country['country_name'] 
            ?>
                <div class="card mb-3">
                  <div class="card-header">
                    <?= $couprovi['company_name'] ?>
                  </div>
                  <div class="card-body">
                    <p class="card-text" style="font-weight: bold;"><?= limit_text($couprovi['about_me'], 25); ?></p>
                    <div class="text-right">
                      <a href="<?= SITE_URL . '/universities?uni=' . $couprovi['username'] ?>" class="text-primary">more...</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <input name="hidcoucat" type="hidden">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->