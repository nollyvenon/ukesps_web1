<form class="form-horizontal" role="form" method="post">
	<?php require_once '../layouts/feedback_message.php'; ?>
	<div class="row m-b-40">
				<div class="col-lg-3"><b>Business/House Code:</b></div> <div class="col-lg-9"><?=$xid ;?></div>
		
				<div class="col-lg-3"><b>Account Type:</b></div> <div class="col-lg-9"><?=$client_type;?></div>
				<div class="col-lg-3"><b>Address:</b></div> <div class="col-lg-9"><?php echo $house_number.' '.$street_name.','.$area_name.','.$city_name;?> </div>
				<div class="col-lg-3"><b>Amount Payable: </b></div> <div class="col-lg-9">₦2,000</div>

		<input name="amount" value="2000" type="hidden">
		<input name="email" value="<?php echo 'gooption@yahoo.com';?>" type="hidden">
		<input name="fullname" value="<?php echo $fullname.'('.$xid.')';?>" type="hidden">
	</div>
	<div class="row m-b-40">
		<div class="col-md-3">
			<input name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Submit">
	</div>	


	</div>
</form>