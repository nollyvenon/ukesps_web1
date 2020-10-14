<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
  <?php require_once '../layouts/feedback_message.php'; ?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="title">
            Banner Title</label>
          <input name="title" type="text" id="title" value="<?= $title; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="form-group">
          <label for="position" class="control-label">Banner position</label><br>
          <select name="position" data-required="true" class="form-control selectpicker" data-live-search="true">
            <option value="">Select Banner position</option>
            <option value="top_banner_1">Top Banner 1</option>
            <option value="top_banner_2">Top Banner 2</option>
            <option value="right_banner_1">Right Banner 1</option>
            <option value="right_banner_2">Right Banner 2</option>
            <option value="right_banner_3">Right Banner 3</option>
            <option value="content_banner_1">Page Content Banner 1</option>
            <option value="content_banner_2">Page Content Banner 2</option>
            <option value="content_banner_3">Page Content Banner 3</option>
            <option value="content_banner_4">Page Content Banner 4</option>
            <option value="footer_banner_1">Footer Banner 1</option>
            <option value="footer_banner_2">Footer Banner 2</option>
          </select>
        </div>
      </div>
      <div class="col-md-12 mt-3">
        <div class="form-group">
          <label for="image">
            Banner Image</label>
          <input name="image" type="file" accept="image/*" id="image" value="<?= $image; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="banner_url">
            Banner Url</label>
          <input name="banner_url" type="url" id="banner_url" value="<?= $banner_url; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12 mt-3">
        <input type="submit" class="btn btn-primary" name="add_banner" value="<?= $page_title ?>" />
        <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
      </div>

    </div>

  </form>

</div>