<table id="multi-colum-dt1" class="table table-striped table-bordered nowrap" id="example2">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Message</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($contacts) && !empty($contacts)) : ?>
      <?php foreach ($contacts as $row) :  ?>
        <tr>
          <td data-title="ID"><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td data-title="Email"><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td style="max-width: 300px; overflow:auto"><?php echo $row['message']; ?></td>
          <td data-title="Action">
            <a href="<?= SITE_URL ?>/xadmin/manage_contacts?did=<?php echo $row['id'] ?>" class="po" title="Delete Email" data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php else : ?>
      <tr>
        <td colspan='6' class='text-danger'><em>No results to display</em></td>
      </tr>
    <?php endif ?>
  </tbody>
</table>