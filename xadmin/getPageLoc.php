<?php

include('../z_db.php');
$page_category = addslashes($_GET["q"]);
$page_location = $zenta_operation->get_page_location($page_category);

//echo $q;
?>
<select name="page_location" class="form-control">
    <option value="">Content location</option>
    <?php
    foreach ($page_location as $key => $value) {
        $page_location = $value['page_location'];

        echo "<option value='$page_location'>$page_location</option>";
    }     ?>
</select>