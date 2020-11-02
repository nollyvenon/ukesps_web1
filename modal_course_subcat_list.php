<?php
include_once("z_db.php");

//Include database connection
if ($_POST['rowid']) {
	$category_id = $_POST['rowid']; //escape string	
}
?>
<div class="container">
	<?php echo $zenta_operation->show_cou_subcat_modal($category_id); ?>
</div>