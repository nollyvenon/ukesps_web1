<?php require_once '../layouts/feedback_message.php'; ?>

<table class="table table-striped table-bordered table-hover" id="example2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($content) && !empty($content)) {
            foreach ($content as $row) { ?>
                <tr>
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><a class="btn btn-border green" href="edit_course_category?hiss=<?php echo encrypt($row['category_id']); ?>"><span> <i class="fa fa-edit"></i></span></a>
                        <a class="btn btn-border dark" href="del_course_category.php?hiss=<?php echo encrypt($row['category_id']); ?>"><span> <i class="fa fa-trash"></i></span></a>
                    </td>
                </tr>
        <?php }
        } else {
            echo "<tr><td colspan='3' class='text-danger'><em>No results to display</em></td></tr>";
        } ?>
    </tbody>
</table>