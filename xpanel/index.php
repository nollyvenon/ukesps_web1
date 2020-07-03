<?php include("header.php") ?>
		
				<main>
                <section class="clear-fix">
					<h2>My Profile</h2>
					<hr>
					<div class="grid-col-row">
						<div class="grid-col grid-col-12">
							<div class="row">
							
								<a href="#!" class="col-md-6">
                                <div class="info-box">
								<h4><?php echo $firstname .' '. $middlename. ' ' . $lastn ?></h4>
									<span class="instructor-profession"><?php echo $email ?></span>
									<div class="divider"></div>
									<p><?= $phone ?></p>
									<p><?= $address ?></p>
									
				
									
								</div>
								</a>
	                            <div class="col-md-4">
								   <p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($country)?></p>
								   <p><b>Gender: </b> <?= $gender?></p>
								   <p><b>Course preference: </b> <?= $course?></p>
									
								</div>
							</div>
							
						</div>
						
						</div>
                    </div>
             </section>

				
					
					
				</main>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>