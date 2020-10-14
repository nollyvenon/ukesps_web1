<?php require_once '../layouts/feedback_message.php'; ?>

<table class="table table-responsive table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Country</th>
      <th>Address</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($contact) && !empty($contact)) {
      foreach ($contact as $row) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['country']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['updated_at']; ?></td>
          <td><a class="btn btn-border green" href="edit_contact_info.php?action=view&cid=<?php echo $row['id']; ?>"><span> <i class="fa fa-edit"></i></span></a>
            <a class="btn btn-border dark" href="delete_contact_info.php?action=view&cid=<?php echo $row['id']; ?>"><span><i class="fa fa-trash"></i></span></a>
          </td>
        </tr>
    <?php }
    } else {
      echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>";
    } ?>
  </tbody>
</table>