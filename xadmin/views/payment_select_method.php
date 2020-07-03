<form class="form-horizontal" role="form" method="post">
	<?php require_once '../layouts/feedback_message.php'; ?>
	<div class="row m-b-20">
		<div class="col-lg-12">
			<div class="col-lg-6">
					<input type="text" class="form-control" name="code" placeholder="Business/House Code" required>
			</div>
		</div>
	</div>
	<div class="row m-b-20">
		<div class="col-lg-12">
			<div class="col-lg-6">
						<select name="paymethod" data-required="true" class="form-control"  required>
						<option value="">Select Payment Method</option>
						<?php 
						foreach($payment_method as $row2):
						?>
							<option value="<?php echo $row2['paymthd_id'];?>">
									<?php echo $row2['paymthd_name'];?>
								</option>
						<?php
						endforeach;
						?>
						</select>
			</div>
		</div>
	</div>	

		<div class="col-md-3">
			<input name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Submit">
		</div>

	</div>
</form>