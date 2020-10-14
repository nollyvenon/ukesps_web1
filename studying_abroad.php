<?php
include_once("main_header.php");
if ($_GET['loc'] && $_GET['loc'] != '') {
  $course_location = $zenta_operation->get_course_location_by_id($_GET['loc']);
  extract($course_location[0]);
}
// $course_categories = $zenta_operation->get_course_categories();
// $course_types = $zenta_operation->get_course_types('4');
$similar_courses = $zenta_operation->get_similar_courses('5');
$events = $zenta_operation->upcoming_events(date('Y-m-d'));
$countries = $zenta_operation->get_all_countries();
$course_locations = $zenta_operation->get_course_locations();



?>
<!-- edu header -- -->

<hr class="divider-color" />
<div class="page-content container clear-fix">

  <div class="row">

    <div class="col-lg-8 col-md-8">
      <?php if (isset($course_location) || $course_location != NULL) { ?>
        <!-- main content -->
        <main>
          <!-- blog post -->
          <div class="blog-post">
            <article>
              <div class="blog-media picture">
                <div class="hover-effect"></div>
                <img src="<?= SITE_URL ?>/img/course_locations/<?= $location_img ?>" data-at2x="<?= SITE_URL ?>/img/course_locations/<?= $location_img ?>" alt>
              </div>
              <h1>Studying in <?= $location_name ?></h1>
              <?= $location_info ?>
            </article>
          </div>
        </main>
        <!-- / main content -->
      <?php } else { ?>
        <main>
          <h1>STUDYING ABROAD</h1>
          <p>
            Investing in your education is probably the wisest investment you can make in our current times of economic recession. At UKESPS Inc. we understand that this maybe the most important decisions of your life and also one of the most costly. Choosing the right university is a very important decision and to allow our students choice and value for their monies we have included Universities from four of the world’s top study destinations. Our partner universities are in excess of 100 universities in these countries giving students the choice of quality, ranking, price and course availability. See below to get more details on each of these Universities.</p>
          <?php foreach ($course_locations as $location) { ?>
            <div class="card mt-3">
              <div class="card-header">
                Studying in <?= $location['location_name'] ?>
              </div>
              <div class="card-body">
                <?= limit_text($location['location_info'], 25); ?>
                <div class="text-right">
                  <a href="<?= SITE_URL . '/studying_abroad?loc=' . $location['location_id'] ?>" class="text-primary">more...</a>
                </div>
              </div>
            </div>

          <?php } ?>

        </main>
      <?php } ?>
    </div>
    <?php include_once('sidebar.php'); ?>
  </div>
</div>
<!--=================================
 special-feature -->
<!-- / content -->
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

<script>
  $(document).ready(function() {
    $('#myModal').on('show.bs.modal', function(e) {
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
        type: 'post',
        url: 'modal_course_subcat_list.php', //Here you will fetch records 
        data: 'rowid=' + rowid, //Pass $id
        success: function(data) {
          $('.fetched-data').html(data); //Show fetched data from database
          //$("input[name='hidcoucat']").val(data);
        }
      });
    });

  });
</script>
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->