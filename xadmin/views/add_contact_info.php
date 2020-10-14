<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
  <?php require_once '../layouts/feedback_message.php'; ?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="country" class="control-label">Country</label><br>
          <select name="country" data-required="true" class="form-control selectpicker" data-live-search="true">
            <option value="">Select A Country</option>
            <?php
            foreach ($countries as $row2) :
            ?>
              <option <?php if ($country == $row2['country_name']) {
                        echo 'selected';
                      }  ?> value="<?php echo $row2['country_name']; ?>">
                <?php echo $row2['country_name']; ?>
              </option>
            <?php
            endforeach;
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="email">
            Email</label>
          <input name="email" type="text" id="email" value="<?= $email; ?>" size="73" class="form-control" />
        </div>
        <div class="form-group">
          <label for="phone">
            Phone Number</label>
          <input name="phone" type="text" id="phone" value="<?= $phone; ?>" size="73" class="form-control" />
        </div>
        <div class="form-group">
          <label for="address">
            Address</label>
          <textarea name="address" id="address" style="width: 100%;" class="form-control" rows="5"><?= $address; ?></textarea>
        </div>
        <div class="col-md-12">
          <input type="submit" class="btn btn-primary" name="update_contact_info" value="Add Contact Info" />
          <input name="cancel" type="reset" class="btn btn-danger" id="cancel" value="Cancel" />
        </div>

      </div>
    </div>

  </form>

</div>