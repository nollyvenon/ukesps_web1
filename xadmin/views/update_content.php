<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
  <?php require_once '../layouts/feedback_message.php'; ?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
    <input type="hidden" name="POST_MAX_SIZE" value="500000" />
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="title">
            Title</label>
          <input name="title" type="text" id="title" value="<?= $title; ?>" size="73" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="page_name">
            Page</label>
          <div class="input-group">
            <select name="page_name" class="form-control" onfocus="ShowPageLoc(this.value)" onchange="ShowPageLoc(this.value)" required>
              <option value="<?= $page_name ?>"><?= $page_name ?></option>
              <?php
              foreach ($page_names as $key => $value) {
                $page_name = $value['page_name'];
                $page_slug = $value['page_slug'];

                echo "<option value='$page_slug'>$page_name</option>";
              }     ?>
            </select></div>
        </div>
        <!-- <div class="form-group">
          <label for="page_location">
            Page Location</label>
          <div class="input-group">
            <div id="txtHint1"><select name="page_location" class="form-control" required>
                <option value="<?= $page_location ?>"><?= $page_location ?></option>
                <?php
                foreach ($page_locations as $key => $value) {
                  $page_locations = $value['page_location'];

                  echo "<option value='$page_locations'>$page_locations</option>";
                }     ?>
              </select></div>
          </div>
        </div> -->
        <div class="form-group">
          <label for="content">
            Content</label>
          <div class="">
            <textarea id="editor1" name="content" style="width:1000px"><?= $info ?></textarea>
            <script>
              CKEDITOR.replace('editor1', {

                height: 300,

                // The following options are not necessary and are used here for presentation purposes only.
                // They configure the Styles drop-down list and widgets to use classes.

                stylesSet: [{
                    name: 'Narrow image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                      'class': 'image-narrow'
                    }
                  },
                  {
                    name: 'Wide image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                      'class': 'image-wide'
                    }
                  }
                ],

                // Load the default contents.css file plus customizations for this sample.
                contentsCss: [CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css'],

                // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
                // resizer (because image size is controlled by widget styles or the image takes maximum
                // 100% of the editor width).
                image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
                image2_disableResizer: true
              });
            </script>
          </div>
        </div>
        <div class="col-md-12">
          <input type="submit" class="btn btn-primary" name="updatecontent" value="Update Content" />
          <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
        </div>

      </div>
    </div>

  </form>

</div>