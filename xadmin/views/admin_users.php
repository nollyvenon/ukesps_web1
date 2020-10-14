<table id="multi-colum-dt1" class="table table-striped table-bordered nowrap" id="example2">
  <thead>
    <tr>
      <th class="col-sm-1">#</th>
      <th class="col-sm-2">Full Name</th>
      <th class="col-sm-2">Email</th>
      <th class="col-sm-2">Phone</th>
      <th class="col-sm-2">User Name</th>
      <th class="col-sm-1">Status</th>
      <th class="col-sm-2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($user_list) && !empty($user_list)) : ?>
      <?php foreach ($user_list as $row) :  ?>
        <?php if ($row['admin_code'] != $admin_id) : ?>
          <tr>
            <td data-title="ID"><?php echo $row['admin_id']; ?></td>
            <td data-title="Name"><?php echo $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']; ?></td>
            <td data-title="Email"><?php echo $row['email']; ?></td>
            <td data-title="Phone"><?php echo $row['phone']; ?></td>
            <td data-title="Address"><?php echo $row['username']; ?></td>
            <td data-title="Status"><?php echo $row['status']; ?></td>
            <td data-title="Action">
              <?php if ($row['status'] == 1) : ?>
                <a class="btn btn-border green" href="<?= SITE_URL ?>/xadmin/manage_admin_users?deact=<?php echo $row['admin_id'] ?>"><span> <i class="fa fa-edit"></i></span>Deactivate</a>
              <?php else : ?>
                <a class="btn btn-border green" href="<?= SITE_URL ?>/xadmin/manage_admin_users?act=<?php echo $row['admin_id'] ?>"><span> <i class="fa fa-edit"></i></span>Activate</a>
              <?php endif ?>
              <a href="<?= SITE_URL ?>/xadmin/manage_admin_users?did=<?php echo $row['admin_id'] ?>" class="po" title="Delete User" data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
            </td>
          </tr>
        <?php endif ?>
      <?php endforeach ?>
    <?php endif ?>
  </tbody>
</table>