<?php
include_once("../main_header.php");
require_once(LIB_PATH . DS . "class_recruiter.php");
$recruit_object = new RecruitUser();
if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
  $search_text = $_POST['search_text'];
  // echo $job_loc = $_POST['job_loc'];
  // die();
  $query = "SELECT jbv.*, jbl.location_id, jbl.location_name, jbl.location_img FROM jobs jbv
		LEFT JOIN job_locations jbl ON jbv.job_location=jbl.location_id
        WHERE jbv.job_title LIKE '%$search_text%' order by jbv.jobs_id DESC ";
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
  // var_dump($content);
  // die();
}

//$popular_view_job_types = $zenta_operation->get_popular_viewed_job_types('12','1');
$similar_courses = $zenta_operation->show_top_job_companies('5');

?>
<!-- / header -->
<!-- page content -->
<div class="page-title bg-color-4">
  <div class="grid-row">
    <h1>Your Jobs</h1>
    <!-- bread crumb -->
    <nav class="bread-crumb">
      <a href="<?= SITE_URL ?>">Home</a>
      <i class="fa fa-long-arrow-right"></i>
      <a href="<?= SITE_URL ?>/skills_match.php">Skills match</a>
      <i class="fa fa-long-arrow-right"></i>
      <a>your_jobs</a>
    </nav>
    <!-- / bread crumb -->
  </div>
</div>
<div class="page-content padding-section">
  <div class="container clear-fix">
    <main class="text-center">


      <!-- / page header -->
      <div class="page-content" style=" background-image: url('../img/job2.jpg');">
        <div class="search-container container clear-fix">
          <div class="search-title">
            <!-- <h2>Find Your Course</h2> -->
            <!-- <h5>What do you want to learn?</h5> -->
            <!-- <h3>Skills match</h3> -->
            <h4 style="color: #fff;">Type in careers or jobs that you have done in the past.</h4>
          </div>
          <!-- search -->
          <div class="category-search">
            <i class="fa fa-search"></i>
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
              <!-- &nbsp;What -->
              <input name="search_text" type="text" class="input-text form-control" value placeholder="e.g software developer">
              <!-- Where -->
              <!-- <input name="job_loc" type="text" style="width: 30%;" size="10" value="" value placeholder="town or postcode"> -->
              <button type="submit" class="cws-button smaller border-radius alt">Search</button>
            </form>
          </div>
          <!-- / search -->
        </div>
      </div>
      <hr class="divider-color" />
      <div class="fullwidth-background no-padding">
        <div class="padding-sect">
          <div class="container">
            <!-- / search -->
            <?php if (isset($content) && !empty($content)) { ?>

              <h3>Search for <?php echo $_POST['search_text']; ?> Job in <?php echo $_POST['job_loc']; ?> </h3>
              <?php foreach ($content as $row) {
                $jobs_id = $row['jobs_id'];
                $job_img = $row['job_img'];
                $job_title = $row['job_title'];
                $descript = $row['descript'];
                $location_name = $row['location_name'];
                $amount_per_period = $row['amount_per_period'];
                $recruiter_code = $row['recruiter_code'];
                $recruiter_detail = $recruit_object->get_recruiter_detail($recruiter_code);
                $recruiter_name = $recruiter_detail['first_name'] . ' ' . $recruiter_detail['last_name'];
                $recruiter_img = $recruiter_detail['image'];
              ?>
                <!-- item -->
                <div class="category-item list clear-fix">
                  <div class="picture">
                    <div class="hover-effect"></div>
                    <div class="link-cont">
                      <a href="<?= SITE_URL ?>/job_det?sid=<?= $jobs_id; ?>" class="fancy fa fa-search"></a>
                    </div>
                    <img src="../img/job_companies/<?= $job_img; ?>" data-at2x="../img/job_companies/<?= $job_img; ?>" alt>
                  </div>
                  <h3><a href="<?= SITE_URL ?>/job_det?sid=<?= $jobs_id; ?>"><?= $job_title; ?></a></h3>
                  <div>
                    <div class="star-rating" title="Rated 4.00 out of 5">
                      <span style="width:100%"></span>
                    </div>
                    <div class="count-reviews">( reviews 10 )</div>
                  </div>
                  <p><?= limit_text($descript, 25); ?></p>
                  <div class="category-info">
                    <span class="price">
                      <span class="amount">
                        <?= $SiteCurrency; ?><?= formatMoney($amount_per_period, true); ?>
                      </span>
                      <!--<span class="description-price"><?= $amount_per_period; ?></span>-->
                    </span>
                    <div class="count-users"><i class="fa fa-location-arrow"></i> <?= $location_name; ?></div>
                    <div class="course-lector">
                      <img src="../img/job_companies/<?= $job_img; ?>" data-at2x="../img/job_companies/<?= $job_img; ?>" class="avatar" alt>
                      <div class="lector-name">
                        <h4>Posted by</h4>
                        <span><?= $recruiter_name; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / item -->
            <?php  }
            } else if ($content == null && isset($_POST['search-text'])) {
              echo "<h5>No result found</h5>";
            } ?>
          </div>
        </div>
      </div>
      <!-- quote -->
    </main>
  </div>

</div>

<!-- footer -->
<?php include_once('../main_footer.php'); ?>
<!-- / footer -->