<?php require_once '../layouts/feedback_message.php'; ?>

<table class="table table-responsive table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>MailFromName</th>
      <th>MailFromEmail</th>
      <th>MailReplyToName</th>
      <th>MailReplyToEmail</th>
      <th>MailHost</th>
      <th>MailUser</th>
      <th>MailPassword</th>
      <th>MailPort</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($content) && !empty($content)) {
    ?>
      <tr>
        <td><?= $MailFromName; ?></td>
        <td><?= $MailFromEmail ?></td>
        <td><?= $MailReplyToName ?></td>
        <td><?= $MailReplyToEmail ?></td>
        <td><?= $MailHost ?></td>
        <td><?= $MailUser ?></td>
        <td><?= $MailPassword ?></td>
        <td><?= $MailPort ?></td>
        <td><a class="btn btn-border green" href="update_config_item.php?action=view&id=<?= $sett_id; ?>"><span> <i class="fa fa-edit"></i></span></a>
        </td>
      </tr>
    <?php
    } else {
      echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>";
    } ?>
  </tbody>
</table>