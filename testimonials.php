<?php
include_once("main_header.php");
// $course_categories = $zenta_operation->get_course_categories();
// $course_types = $zenta_operation->get_course_types('4');
$similar_courses = $zenta_operation->get_similar_courses('5');
$events = $zenta_operation->upcoming_events(date('Y-m-d'));
$countries = $zenta_operation->get_all_countries();
$course_providers = $zenta_operation->get_course_providers();
$testimonials = $zenta_operation->get_testimonials();
?>
<!-- page header -->
<!-- edu header -- -->

<hr class="divider-color" />
<div class="page-content container clear-fix">

  <div class="row">

    <div class="col-lg-8 col-md-8">
      <main>
        <hr class="divider-color" />
        <!-- paralax section -->
        <section class="fullwidth-background padding-section">
          <div class="grid-row grid-row-clear clear-fix">
            <div class="grid-col-row">
              <div class="grid-col grid-col-8">
                <h3>Student Testimonials</h3>
                <p>At UKESPS Inc. our students come first. We pay utmost attention to our students and their needs and offer a 100% satisfaction service. Our current students are indeed our best ambassadors. Below you will find just what some of our students have to say about our services. <a href="register">Register with UKESPS today to join them.</a> </p>
                <!-- accordions -->
                <div class="accordions">


                  <?php $i = 0;
                  foreach ($testimonials as $testimony) : ?>
                    <!-- content-title -->
                    <div class="content-title <?= $i == 0 ? "active" : "" ?>"> <b><?= $testimony['testi_name'] ?> </b> <br> <?= limit_text($testimony['testi_content'], 25)  ?> </div>
                    <!--/content-title -->
                    <!-- accordions content -->
                    <div class="content">
                      <div class="row">
                        <div class="col-lg-3 col-md-3">
                          <img style="height:auto;width:100%;" src="<?= $testimony['testi_image'] == NULL ? 'img/option-3.jpg' : $testimony['testi_image'] ?>" data-at2x="<?= $testimony['testi_image'] == NULL ? 'img/option-3.jpg' : $testimony['testi_image'] ?>" alt="">
                        </div>
                        <div class="col-lg-7 col-md-7">
                          <?= $testimony['testi_content'] ?>
                        </div>
                      </div>
                    </div>
                    <!--/accordions content -->
                  <?php $i++;
                  endforeach ?>
                </div>
                <!--/accordions -->
                <!-- <a href="about" class="cws-button bt-color-3 border-radius alt icon-right">View Detail<i class="fa fa-angle-right"></i></a> -->
              </div>
              <!-- <div class="grid-col grid-col-6">
          <div class="owl-carousel full-width-slider">
            <div class="gallery-item picture">
              <img src="img/Intro-thumb09.jpg" data-at2x="img/Intro-thumb09.jpg" alt>
            </div>
            <div class="gallery-item picture">
              <img src="img/huffington-post-2-1.jpg" data-at2x="img/huffington-post-2-1.jpg" alt>
            </div>
          </div>
        </div> -->
            </div>
          </div>
        </section>

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