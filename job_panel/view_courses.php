<?php include("header.php");
// $query = $client_operation->past_applied_jobs_query($session_jobseek);
// $numrows = $db_handle->numRows($query);


// For search, make rows per page equal total rows found, meaning, no pagination
// for search results
if (isset($_POST['search_text'])) {
    $rowsperpage = $numrows;
} else {
    $rowsperpage = 20;
}

// $totalpages = ceil($numrows / $rowsperpage);
// // get the current page or set a default
// if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
//    $currentpage = (int) $_GET['pg'];
// } else {
//    $currentpage = 1;
// }
// if ($currentpage > $totalpages) { $currentpage = $totalpages; }
// if ($currentpage < 1) { $currentpage = 1; }

// $prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
// $prespagehigh = $currentpage * $rowsperpage;
// if($prespagehigh > $numrows) { $prespagehigh = $numrows; }

// $offset = ($currentpage - 1) * $rowsperpage;
// $query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
// $result = $db_handle->runQuery($query);
// $applied_jobs = $db_handle->fetchAssoc($result);
$courses = $db_class->fetch_courses();
 ?>

				<main>
                <section class="clear-fix">
					<h2>View Courses</h2>
					<hr>
					<div class="grid-col-row">
					<div class="grid-col grid-col-12">
			         	<main>
                        <?php 
                    
                        if(isset($courses) && !empty($courses)) { foreach ($courses as $row) { 
							
				?>
						<!-- item -->
                        <div style="cursor:pointer" class="category-item list clear-fix"
                         onclick='location="course?id=<?= $row["course_id"] ?>"'>
							<div class="picture">
								<div class="hover-effect"></div>
								<div class="link-cont">
									<a href="http://placehold.it/270x200" class="fancy fa fa-search"></a>
								</div>
								<img src='../assets/images/courses/<?= $row["course_img"]?>' data-at2x="http://placehold.it/270x200" alt>
							</div>
							<h3><?= limit_text( $row["course_title"],10)?></h3>
							<div>
								<div class="star-rating" title="Rated 4.00 out of 5">
									<span style="width:100%"></span>
								</div>
								<div class="count-reviews">( reviews 10 )</div>
							</div>
							<p><?= limit_text(htmlspecialchars($row["description"]),70)?></p>
							<div class="category-info">
								<span class="price">
									<span class="amount">
                                    <b><?= $row['course_fee'] ?> $</b>
									</span>
									
                                </span>
                                <span class="price">
									
									
								</span>
								<div class="count-users"><i class="fa fa-user"></i> 25 students</div>
								<div class="course-lector">
									
								</div>
							</div>
                        </div>
                        
						<!-- / item -->
						<?php  }} ?>
					</main>
			</div>
                    </div>
             </section>

				
					
					
				</main>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>