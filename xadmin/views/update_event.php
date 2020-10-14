 <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
     <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
     <input type="hidden" name="event_id" value="<?php echo $sidi; ?>" />
     <input type="hidden" name="POST_MAX_SIZE" value="500000" />
     <?php require_once '../layouts/feedback_message.php'; ?>
     <div class="row m-b-20">
         <div class="col-md-12 form-group">
             <label for="event_title" class="control-label">Title</label>
             <input type="text" class="form-control" id="event_title" name="event_title" value="<?php echo $event_title; ?>">
         </div>
         <div class="col-md-6 form-group">
             <label for="gallery" class="control-label">Event Image</label>
             <input name="gallery" class="btn btn-info form-control" type="file" id="gallery" size="30" />
         </div>

         <div class="col-md-6 form-group">
             <label for="event_author" class="control-label">Author</label>
             <input type="text" class="form-control" id="event_author" name="event_author" value="<?php echo $event_author; ?>">
         </div>
         <div for="payment_method" class="control-div col-md-12 text-center mb-3 mt-3">Event Date</div>
         <div class="col-md-6 form-group">
             Start Date: <input id="startDate" name="startDate" required value="<?php echo $startDate; ?>" class="form-control" />
         </div>
         <div class="col-md-6 form-group">
             End Date: <input id="endDate" name="endDate" required value="<?php echo $endDate; ?>" class="form-control" />
         </div>
         <script>
             var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
             $('#startDate').datepicker({
                 uiLibrary: 'bootstrap4',
                 iconsLibrary: 'fontawesome',
                 minDate: today,
                 maxDate: function() {
                     return $('#endDate').val();
                 }
             });
             $('#endDate').datepicker({
                 uiLibrary: 'bootstrap4',
                 iconsLibrary: 'fontawesome',
                 minDate: function() {
                     return $('#startDate').val();
                 }
             });
         </script>
         <div class="col-md-6 form-group">
             <label for="event_type" class="control-label">Event Type</label>
             <select name="event_type" required data-required="true" class="form-control selectpicker" data-live-search="true">
                 <option value="">Select A Type</option>
                 <option value="1" <?= $event_type == '1' ? 'selected' : '' ?>>Free</option>
                 <option value="2" <?= $event_type == '2' ? 'selected' : '' ?>>Paid</option>
             </select>
         </div>
         <div class="col-md-6 form-group">
             <label for="location" class="control-label">Events Location</label>
             <div class='input-group'>
                 <input id="location" name="location" type='text' value="<?php echo $event_location; ?>" class="form-control" />
                 </span>
             </div>
         </div>
     </div>
     <div class="row m-b-20">
         <div class="col-md-12">
             <label for="summary" class="control-label">Events Summary</label>
             <textarea id="summary" name="summary" rows="5" cols="40"><?php echo $event_summary; ?></textarea>
             <script>
                 // Replace the <textarea id="editor1"> with a CKEditor
                 // instance, using default configuration.
                 CKEDITOR.replace('summary', {
                     filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                     filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                     "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
                 });
             </script>
         </div>
         <div class="col-md-12">
             <label for="content" class="control-label">Description</label>
             <textarea id="content" name="content" rows="15" cols="40"><?php echo $event_description; ?>
			</textarea>
             <script>
                 // Replace the <textarea id="editor1"> with a CKEditor
                 // instance, using default configuration.
                 CKEDITOR.replace('content', {
                     filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                     filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                     "filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
                 });
             </script>
         </div>


     </div>
     <div class="row m-t-30">
         <div class="col-md-12">
             <!--<button name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>-->
             <input name="update_event" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Edit Event">
         </div>
     </div>
 </form>