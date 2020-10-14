<?php
require_once("../main_header.php");
if (isset($_GET['sid'])) {
  $ssid = $_GET['sid'];
  $recruit_object = new RecruitUser();
  $applied = $jobsk_operation->get_applied_job($seeker_code, $ssid);
  $job_det = $zenta_operation->get_job_by_id($ssid);
  if ($applied) {
    $message_error = "You Have Already applied for this job. Please wait for it to be processed";
  } else {

    if ($job_det) {
      // var_dump($seeker_code);
      // die();
      $job_app = $jobsk_operation->apply_now($job_det['jobs_id'], $job_det['job_title'], $job_det['recruiter_code'], $seeker_code, $job_det['amount_per_period'], $job_det['job_sector'], $job_det['job_location']);

      $job_app ? $message_success = "You Have Successfully applied for this job"
        : $message_error = "Something went wrong. Please reload the page";;
    } else {
      $message_error = "This job has expired. You can also apply from the related jobs below.";
    }
  }


  $sector_id = $job_det['job_sector'];
  if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
    $search_text = $_POST['search_text'];
    $query = "SELECT jbv.*, jbc.sector_id, jbc.sector_name, jbl.location_name FROM jobs jbv
        INNER JOIN job_sectors jbc ON jbv.job_sector=jbc.sector_id
		INNER JOIN job_locations jbl ON jbv.job_location=jbl.location_id
        WHERE (jbc.sector_name LIKE '%$search_text%' OR jbv.job_title LIKE '%$search_text%') AND (jbc.sector_id='sector_id' OR jbc.sector_name='$sector_id') order by jbv.jobs_id DESC ";
  } else {
    $query = "SELECT jbv.*, jbc.sector_id, jbc.sector_name, jbl.location_name FROM jobs jbv
        INNER JOIN job_sectors jbc ON jbv.job_sector=jbc.sector_id
	INNER JOIN job_locations jbl ON jbv.job_location=jbl.location_id	
       WHERE (jbv.job_sector='$sector_id') order by jbv.jobs_id DESC ";
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
} else {
  redirect_to('../search_job');
}
if (!$session_jobseek->is_logged_in()) {
  redirect_to("login.php");
}


?>
<div class="page-content woocommerce">
  <div class="container clear-fix">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div id="content" role="main">
          <?php include_once("../layouts/feedback_message.php"); ?>
        </div>
      </div>
      <div class="grid-col grid-col-8">
        <h3>Browse related jobs</h3>
        <!-- main content -->
        <main>
          <!-- search -->
          <div class="category-search">
            <i class="fa fa-search"></i>
            <!-- 
						 -->
            <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
              <input name='search_text' type="text" class="input-text" value placeholder="Job Type, e.g Petroleum Sector">
              <button class="cws-button smaller border-radius alt">Search Job Sector</button>
            </form>
          </div>
          <!-- / search -->
          <?php if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
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
          } else {
            echo "<h5>No result found</h5>";
          } ?>
        </main>
        <!-- / main content -->
        <!-- pagination -->
        <div class="page-pagination clear-fix">
          <!-- <?php
                if ($currentpage  > 1) { ?>
						<a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage - 1; ?>"><i class="fa fa-angle-double-left"></i></a>
						<?php }
                for ($currentpage = $totalpages; $currentpage < $totalpages; $i++) : if ($currentpage <= $totalpages) : ?>
						<a href="?sid=<?= $_GET['sid']; ?>&=<?= $currentpage; ?>" class="active"><?= $pg; ?>
						<?php endif;
                endfor;
                if ($currentpage > $totalpages) { ?>
						--><a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage + 1; ?>"><?= $currentpage + 1; ?></a>
          <!-- 
						--><a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage + 2; ?>"><?= $currentpage + 2; ?></a>
          <!-- 
						--><a href="?sid=<?= $_GET['sid']; ?>&pg=<?= $currentpage + 3; ?>"><i class="fa fa-angle-double-right"></i></a>
        <?php }  ?> -->
        </div>
        <!-- / pagination -->
      </div>
      <?php include('./jobpanel_sidebar.php') ?>
    </div>
  </div>
</div>
<?php include_once('../main_footer.php'); ?>