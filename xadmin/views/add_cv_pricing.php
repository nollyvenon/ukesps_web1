<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
  <?php require_once '../layouts/feedback_message.php'; ?>
  <div class="row m-b-20">
    <div class="col-md-12">
      <label for="user_code" class="control-label">Plan Name</label>
      <input type="text" class="form-control" id="course_title" name="course_title" value="">
    </div>
  </div>
  <div class="row m-b-20">
    <div class="col-md-6">
      <label for="user_code" class="control-label">Plan Image</label>
      <input name="gallery" class="form-control" type="file" id="gallery" size="30" />
    </div>

    <div class="col-md-6">
      <label for=" event_author" class="control-label">Plan Cost</label>
      <input type="text" class="form-control" id="duration" name="duration" value="">
    </div>
    <div class="col-md-6">
      <label for="course_fee" class="control-label">Plan Discount Cost</label>
      <div class='input-group'>
        <input id="course_fee" name="course_fee" type='text' class="form-control" />
        </span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="course_currency" class="control-label">Currency</label><br>
      <select name="course_currency" required data-required="true" class="form-control" data-live-search="true">
        <option value="">Select a Currency</option>
        <?php
        foreach ($course_currencies as $row44) :
        ?>
          <option value="<?php echo $row44['currency_id']; ?>">
            <?php echo $row44['currency_name']; ?>
          </option>
        <?php
        endforeach;
        ?>
      </select>
    </div>
    <div class="col-md-6">
      <label for="course_fee" class="control-label">Plan Period</label>
      <div class='input-group'>
        <input id="course_fee" name="course_fee" type='text' class="form-control" />
        </span>
      </div>
    </div>

    <div class="col-md-6">
      <label for="course_fee" class="control-label">Plan Highlights</label>
      <div class='input-group'>
        <input id="course_fee" name="course_fee" type='text' class="form-control" />
        </span>
      </div>
    </div>
  </div>
  <div class="row m-b-20">
  </div>
  <div class="row m-b-20">

    <div class="col-md-12">
      <label for="description" class="control-label">Description</label>
      <textarea id="description" name="description" rows="15" cols="40"></textarea>
      <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('description', {
          filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
          filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
          "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
        });
      </script>
    </div>

  </div>
  <div class="row m-t-30">
    <div class="col-md-12">
      <input name="add_cv_pricing" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add CV Pricing">
    </div>
  </div>
</form>