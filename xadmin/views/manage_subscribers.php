<table id="multi-colum-dt1" class="table table-striped table-bordered nowrap" id="example2">
  <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($subscribers) && !empty($subscribers)) : ?>
      <?php foreach ($subscribers as $row) :  ?>
        <tr>
          <td data-title="ID"><?php echo $row['id']; ?></td>
          <td data-title="Email"><?php echo $row['email']; ?></td>
          <td data-title="Action">
            <a href="<?= SITE_URL ?>/xadmin/manage_subscribers?did=<?php echo $row['id'] ?>" class="po" title="Delete Email" data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php endif ?>
  </tbody>
</table>