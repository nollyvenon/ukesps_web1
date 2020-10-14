<?php require_once '../layouts/feedback_message.php'; ?>

<table class="table table-responsive table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Slider Title</th>
      <th>Slider Sub Title</th>
      <th>Image</th>
      <th>Date Created</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($content) && !empty($content)) {
      foreach ($content as $row) { ?>
        <tr>
          <td><?= $row['id']; ?></td>
          <td><?= $row['title']; ?></td>
          <td><?= $row['sub_title'] ?></td>
          <td><a href="<?= SITE_URL . '/img/sliders/' . $row['image']; ?>">View Banner</a></td>
          <td><?= $row['created_at']; ?></td>
          <td><a class="btn btn-border green" href="updateslider.php?action=view&id=<?= $row['id']; ?>"><span> <i class="fa fa-edit"></i></span></a>
            <a class="btn btn-border dark" href="del_slider.php?action=view&bid=<?= $row['id']; ?>"><span><i class="fa fa-trash"></i></span></a></td>
        </tr>
    <?php }
    } else {
      echo "<tr><td colspan='6' class='text-danger'><em>No results to display</em></td></tr>";
    } ?>
  </tbody>
</table>