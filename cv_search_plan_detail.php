<?php
include_once("main_header.php");
$sid = $_GET['sid'];
$cv_search_details = $zenta_operation->cv_search_plan_by_id($sid);
extract($cv_search_details);
?>

<div class="page-content container clear-fix">

  <div class="grid-col-row">

    <div class="grid-col grid-col-9">
      <main>
        <div class="blog-post">
          <article>
            <div class="blog-media picture">
              <div class="hover-effect"></div>
              <div class="link-cont">
                <a href="#" class="cws-left fancy fa fa-link"></a>
                <a href="img/recruiter/<?= $recruiter_img; ?>" class="fancy fa fa-search"></a>
                <a href="#" class="cws-right fa fa-heart"></a>
              </div>
              <img src="img/recruiter/<?= $recruiter_img; ?>" class="columns-col-12" alt>
            </div>
            <h2><?= $plan_name; ?></h2>

            <h5>Date: From <?= $startDate; ?> to <?= $endDate; ?></h5>
            <h5>Cost: <?= $plan_currency; ?><?= $plan_cost; ?></h5>
            <h5>Duration: <?= $plan_period; ?></h5>
            <h5>Summary: <?= $highlights; ?></h5>
            <?= $description; ?>

            <p><a href="recru_panel/cart?sssid=<?= $row['plan_id']; ?>&pptc=1" class="cws-button border-radius bt-color-3  alt">Buy Now</a></p>

          </article>
        </div>
      </main>
    </div>
    <?php include_once('recru_panel/sidebar.php'); ?>
  </div>
</div>
<?php include_once('main_footer.php'); ?>