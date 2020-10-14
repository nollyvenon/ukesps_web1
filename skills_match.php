<?php
require_once("main_header.php");
$sid = $_GET['sid'];
$contact = $zenta_operation->get_contact_details();
?>

<!-- / header -->
<!-- page content -->
<div class="page-title bg-color-4">
  <div class="grid-row">
    <h1>Skills match</h1>
    <!-- bread crumb -->
    <nav class="bread-crumb">
      <a href="<?= SITE_URL ?>">Home</a>
      <i class="fa fa-long-arrow-right"></i>
      <a href="#">Skills match</a>
    </nav>
    <!-- / bread crumb -->
  </div>
</div>
<div class="page-content padding-section">
  <div class="container clear-fix">
    <main class="text-center">

      <!-- <h3>Skills match</h3> -->
      <h4>Thinking of changing jobs? Skills Match will show you jobs or careers that use your skills. </h4>
      <div class="py-4">
        <a href="<?= SITE_URL ?>/skills_match/your_jobs" class="cws-button border-radius">START SKILLS MATCH<i class="fa fa-angle-double-right"></i></a>
      </div>
      <div class="grid-row clear-fix">
        <div class="grid-col grid-col-3 text-center" style="padding: 30px; border-left:5px solid #f27c66; background-color: #f0f0f0;">
          <div class="skills-match mx-auto"><img style="width: 80px; height: 80px" src="<?= SITE_URL ?>/img/skills_match/yourjobs.png" alt=""></div>
          <h2>1. Your Jobs</h2>
          <p>Enter jobs you have worked in. You can include unpaid work.</p>
        </div>
        <div class="grid-col grid-col-3 text-center" style="padding: 30px; border-left:5px solid #f9cb8f; background-color: #f0f0f0;">
          <div class="skills-match"><img style="width: 80px; height: 80px" src="<?= SITE_URL ?>/img/skills_match/yourskills.png" alt=""></div>
          <h2>2. Your Skills</h2>
          <p>See skills you may have from your jobs.</p>
        </div>
        <div class="grid-col grid-col-3 text-center" style="padding: 30px; border-left:5px solid #18bb7c; background-color: #f0f0f0;">
          <div class="skills-match"><img style="width: 80px; height: 80px" src="<?= SITE_URL ?>/img/skills_match/newjobideas.png" alt=""></div>
          <h2>3. New Job Ideas</h2>
          <p>Get ideas for jobs that use your skills.</p>
        </div>
      </div>
      <div class="clear-fix">
        <p> Skills Match looks at the skills needed for the jobs you have worked in to suggest possible career moves.
        </p>
      </div>
      <!-- quote -->
    </main>
  </div>

</div>

<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->