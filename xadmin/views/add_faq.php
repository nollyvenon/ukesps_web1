 <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
   <?php require_once '../layouts/feedback_message.php'; ?>


   <div class="row m-b-20">
     <div class="col-md-12">
       <label for="question" class="control-label">Question</label>
       <div class='input-group'>
         <input id="question" name="question" type='text' class="form-control" />
         </span>
       </div>
     </div>
     <div class="col-md-12">
       <label for="answer" class="control-label">Answer</label>
       <textarea id="answer" name="answer" rows="15" cols="40">
			</textarea>
       <script>
         // Replace the <textarea id="editor1"> with a CKEditor
         // instance, using default configuration.
         CKEDITOR.replace('answer', {
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
       <input name="add_faq" type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Faq">
     </div>
   </div>
 </form>