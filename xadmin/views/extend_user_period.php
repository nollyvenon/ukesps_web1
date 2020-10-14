<div class="col-xs-12">
    <?php require_once '../layouts/feedback_message.php'; ?>
    <form class="form-horizontal" role="form" method="post">

        <div class='form-group'>
            <label for="game_id" class="col-sm-2 control-label">
                User ID </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $fullname . ' (' . $user_code . ')'; ?>" readonly>
                <input type="hidden" class="form-control" id="user_code" name="user_code" value="<?php echo $user_code; ?>">
            </div>
            <span class="col-sm-4 control-label">
            </span>
        </div>

        <div class='form-group'>
            <label for="valid_until" class="col-sm-2 control-label">
                Valid Until
            </label>
            <div class="col-sm-6">
                <div class='input-group'>
                    <input id="dropper-default" name="valid_until" type='text' readonly class="form-control" />
                    <span class="input-group-addon ">
                        <span class="icofont icofont-ui-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <label for="result_status" class="col-sm-2 control-label">
                Package
            </label>
            <div class="col-sm-6">
                <select name="package" data-required="true" class="form-control" required>
                    <option value="">Select Package</option>
                    <?php
                    foreach ($packages as $row2) {
                    ?>
                        <option value="<?php echo $row2['package_id']; ?>">
                            <?php echo $row2['package_name']; ?>
                        </option>
                    <?php } ?>
                </select>

            </div>
            <span class="col-sm-4 control-label">
            </span>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <input name="process" type="submit" class="btn btn-success" value="Complete Process">
            </div>
        </div>

    </form>

</div>