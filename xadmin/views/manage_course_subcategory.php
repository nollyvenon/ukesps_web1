<?php require_once '../layouts/feedback_message.php'; ?>

<table class="table table-striped table-bordered table-hover" id="example2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Parent Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        if (isset($content) && !empty($content)) {
            foreach ($content as $row) {
                $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['sub_category_name']; ?></td>
                    <td><?php echo $row['category_parent_name']; ?></td>
                    <td><a class="btn btn-border green" href="edit_course_subcategory?hiss=<?php echo encrypt($row['subcat_id']); ?>"><span> <i class="fa fa-edit"></i></span></a>
                        <a class="btn btn-border dark" href="del_course_subcat.php?hiss=<?php echo encrypt($row['subcat_id']); ?>"><span> <i class="fa fa-trash"></i></span></a>
                    </td>
                </tr>
        <?php }
        } else {
            echo "<tr><td colspan='4' class='text-danger'><em>No results to display</em></td></tr>";
        } ?>
    </tbody>
</table>