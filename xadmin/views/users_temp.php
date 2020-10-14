<table id="multi-colum-dt1" class="table table-striped table-bordered nowrap" id="example2">
  <thead>
    <tr>
      <th class="col-sm-1">#</th>
      <th class="col-sm-2">Full Name</th>
      <th class="col-sm-2">Email</th>
      <th class="col-sm-2">Phone</th>
      <th class="col-sm-2">Address</th>
      <th class="col-sm-1">Status</th>
      <th class="col-sm-2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($user_list) && !empty($user_list)) : ?>
      <?php foreach ($user_list as $row) :  ?>
        <tr>
          <td data-title="ID"><?php echo $row['id']; ?></td>
          <td data-title="Name"><?php echo $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']; ?></td>
          <td data-title="Email"><?php echo $row['email']; ?></td>
          <td data-title="Phone"><?php echo $row['phone']; ?></td>
          <td data-title="Address"><?php echo $row['mailing_address']; ?></td>
          <td data-title="Status"><?php echo $row['status']; ?></td>
          <td data-title="Action">
            <a class="btn btn-border green" href="view_user_detail.php?action=view&cid=<?php echo encrypt($row['id']) ?>"><span> <i class="fa fa-edit"></i></span></a>
            <a href="#" class="po" title="<b>Delete</b>" data-content='<div style="width:150px;"><p>Are you sure?</p><a class="btn btn-danger" id="<?= $row['id'] ?>" href="delete_user?hiss=<?php echo encrypt($row['id']); ?>">Yes I am Sure</a> <button class="btn po-close">No</button></div>' data-html="true" data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>
            <div class="dropdown">
              <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Actions
                <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="view_user_detail.php?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-file-excel-o"></i>View </a> </li>
                <?php if ($row['status'] = '1') { ?>
                  <li><a href="activate_user?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Deactivate User</a></li>
                <?php } else { ?>
                  <li><a href="activate_user?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Activate User</a></li>
                <?php } ?>
                <!-- <li><a href="extend_user_period?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Extend User Period</a></li>
                <li><a href="edit_user?hiss=<?php echo encrypt($row['id']); ?>"><i class="fa fa-plus-square"></i>Edit</a></li> -->
                <?php if (true) { ?>
                  <li><a href="#" class="po" title="<b>Delete</b>" data-content='<div style="width:150px;"><p>Are you sure?</p><a class="btn btn-danger" id="<?= $row['id'] ?>" href="delete_user?hiss=<?php echo encrypt($row['id']); ?>">Yes I am Sure</a> <button class="btn po-close">No</button></div>' data-html="true" data-placement="top"><i class='fa fa-trash-o'></i> Delete</a>

                  </li>
                <?php } ?>
              </ul>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    <?php endif ?>
  </tbody>
</table>