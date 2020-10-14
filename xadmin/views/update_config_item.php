<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
  <?php require_once '../layouts/feedback_message.php'; ?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="MailFromName">
            MailFromName</label>
          <input name="MailFromName" type="text" id="MailFromName" value="<?= $MailFromName; ?>" class="form-control" />
        </div>
      </div>

      <div class="col-md-12 mt-3">
        <div class="form-group">
          <label for="MailFromEmail">
            MailFromEmail</label>
          <input name="MailFromEmail" type="email" id="MailFromEmail" value="<?= $MailFromEmail; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="MailReplyToName">
            MailReplyToName</label>
          <input name="MailReplyToName" type="text" id="MailReplyToName" value="<?= $MailReplyToName; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="MailReplyToEmail">
            MailReplyToEmail</label>
          <input name="MailReplyToEmail" type="email" id="MailReplyToEmail" value="<?= $MailReplyToEmail; ?>" class="form-control" />
        </div>
      </div>

      <div class="col-md-12 mt-3">
        <div class="form-group">
          <label for="MailHost">
            MailHost</label>
          <input name="MailHost" type="text" id="MailHost" value="<?= $MailHost; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="MailUser">
            MailUser</label>
          <input name="MailUser" type="text" id="MailUser" value="<?= $MailUser; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="MailPassword">
            MailPassword</label>
          <input name="MailPassword" type="text" id="MailPassword" value="<?= $MailPassword; ?>" class="form-control" />
        </div>
      </div>

      <div class="col-md-12 mt-3">
        <div class="form-group">
          <label for="MailPort">
            MailPort</label>
          <input name="MailPort" type="text" id="MailPort" value="<?= $MailPort; ?>" class="form-control" />
        </div>
      </div>
      <div class="col-md-12 mt-3">
        <input type="submit" class="btn btn-primary" name="update_configs" value="<?= $page_title ?>" />
        <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
      </div>

    </div>

  </form>

</div>