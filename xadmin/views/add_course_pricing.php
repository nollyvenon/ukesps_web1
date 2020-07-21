<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
  <?php require_once '../layouts/feedback_message.php'; ?>
  <div class="row m-b-20">
    <div class="col-md-12">

      <label for="plan_name" class="control-label">Plan Name</label>
      <input type="text" class="form-control" id="plan_name" name="plan_name" value="<?= $plan_name ?>">
    </div>
  </div>
  <div class="row m-b-20">
    <div class="col-md-6">
      <label for="plan_image" class="control-label">Plan Image</label>
      <input name="plan_image" class="form-control" type="file" id="plan_image" />
    </div>

    <div class="col-md-6">
      <label for=" plan_cost" class="control-label">Plan Cost</label>
      <input type="text" class="form-control" id="plan_cost" name="plan_cost" value="<?= $plan_cost ?>">
    </div>
    <div class="col-md-6">
      <label for="plan_discount" class="control-label">Plan Discount Cost</label>
      <div class='input-group'>
        <input id="plan_discount" name="plan_discount" type='text' class="form-control" value="<?= $plan_discount ?>" />
        </span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="course_plan_currency" class="control-label">Currency</label><br>
      <select name="course_plan_currency" required data-required="true" class="form-control" data-live-search="true">
        <option value="">Select a Currency</option>
        <?php
        foreach ($course_currencies as $row44) :
        ?>
          <?php if ($course_plan_currency != NULL && $course_plan_currency == $row44['currency_id']) : ?>
            <option selected="selected" value="<?php echo $row44['currency_id']; ?>">
              <?php echo $row44['currency_name']; ?>
            </option>
          <?php else : ?>
            <option value="<?php echo $row44['currency_id']; ?>">
              <?php echo $row44['currency_name']; ?>
            </option>
          <?php endif ?>
        <?php
        endforeach;
        ?>
      </select>
    </div>
    <div class="col-md-6">
      <label for="plan_period" class="control-label">Plan Period</label>
      <div class='input-group'>
        <input id="plan_period" name="plan_period" type='text' class="form-control" value="<?= $plan_period ?>" />
        </span>
      </div>
    </div>

    <div class="col-md-6">
      <label for="plan_highlights" class="control-label">Plan Highlights</label>
      <div class='input-group'>
        <input id="plan_highlights" name="plan_highlights" type='text' class="form-control" value="<?= $plan_period ?>" />
        </span>
      </div>
    </div>
  </div>
  <div class="row m-b-20">
  </div>
  <div class="row m-b-20">

    <div class="col-md-12">
      <label for="description" class="control-label">Description</label>
      <textarea id="description" name="description" rows="15" cols="40"><?= $description ?></textarea>
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
      <input name="add_course_pricing" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Course Pricing">
    </div>
  </div>
</form>