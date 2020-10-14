<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
  <?php require_once '../layouts/feedback_message.php'; ?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="title">
            Slider Title</label>
          <input name="title" type="text" id="title" value="<?= $title; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="sub_title">
            Slider Sub Title</label>
          <input name="sub_title" type="text" id="sub_title" value="<?= $sub_title; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12 mt-3">
        <div class="form-group">
          <label for="image">
            Slider Image</label>
          <input name="image" type="file" accept="image/*" id="image" value="<?= $image; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12 mt-3">
        <input type="submit" class="btn btn-primary" name="add_slider" value="<?= $page_title ?>" />
        <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
      </div>

    </div>

  </form>

</div>