<?php
include_once("../main_header.php");
if (!$session_recruiter->is_logged_in()) {
  redirect_to("login");
}
//check if the user is logged and has an active recruiting plan. If yes, redirect to the job upload page
if ($recruit_object->is_recruit_plan_valid($recruiter_code, "2")) {
  redirect_to("cv_search");
}
$recruiting_plans = $recruit_object->get_recruiting_cv_plans();
$_SESSION['payment_category'] = '2'; //recruitment
?>

<div class="page-content">
  <div class="container">
    <main>
      <h2>Post a Job</h2>
      <p></p>
      <div class="clear-fix">
        <div class="grid-col-row">

          <?php if (isset($recruiting_plans) && !empty($recruiting_plans)) {
            foreach ($recruiting_plans as $row) { ?>
              <div class="grid-col grid-col-3">
                <article class="pricing-table color-1">
                  <div class="header-pt clear-fix">
                    <!--
								 -->
                    <h3><?= $row['plan_name']; ?></h3>
                  </div>
                  <div class="price-pt"><sup><?= $row['plan_currency']; ?></sup><?= intval($row['plan_cost']); ?><sup>99</sup></div>
                  <p></p>
                  <p>per <?= $row['plan_period']; ?></p>
                  <ul>
                    <li><?= $row['highlights']; ?></li>
                  </ul>
                  <p><a href="cart?sssid=<?= $row['plan_id']; ?>&pptc=2" class="cws-button border-radius bt-color-3  alt">Buy Now</a></p>
                  <p><a href="../cv_search_plan_detail?sid=<?= $row['plan_id']; ?>&pptc=2" class="cws-button border-radius bt-color-2 alt">View Details</a></p>
                </article>
              </div>
          <?php }
          } ?>
        </div>
      </div>
    </main>
  </div>
</div>
<?php include_once('../main_footer.php'); ?>