<div class="grid-col grid-col-3 sidebar">
	<!-- widget event -->
	<?php if (isset($_GET['dd'])) : ?>
		<aside class="widget-event">
			<h2>Upcoming Events</h2>
			<?php
			$current_date = date('Y-m-d');
			$upcom_event = $zenta_operation->upcoming_events($current_date, 3);
			if (isset($upcom_event) && !empty($upcom_event)) {
				foreach ($upcom_event as $row) {
					$startTime = $row['startTime'];
					$endTime = $row['endTime'];
					$startDate = $row['startDate'];
					$endDate = $row['endDate'];
					$event_summary = $row['event_summary'];
			?><article class="clear-fix">
						<div class="date">
							<div class="day"><?= date('d', strtotime($startDate)); ?></div>
							<div class="month"><?= date('M', strtotime($startDate)); ?></div>
						</div>
						<div class="event-description"><span><?= date('h.iA', strtotime($startTime)); ?> to <?= date('h.iA', strtotime($endTime)); ?></span>
							<p><?= $event_summary; ?></p>
						</div>
					</article>
			<?php }
			} ?>
		</aside>
	<?php endif ?>
	<!-- / widget event -->
	<!-- widget archive -->
	<aside class="widget-archives">
		<h2>Archives</h2>
		<hr class="divider-big" />
		<?php
		$cur_month = date('m');
		$cur_year = date('Y');
		$curr_month = date('M');
		?>
		<ul>
			<?php for ($i = 1; $i < $cur_month; $i++) : ?>
				<li><a href="event_by_month?dd=<?= $i; ?>&yd=<?= $cur_year; ?>"><?= $i; ?>/<?= $cur_year; ?></a></li>
			<?php endfor ?>
		</ul>
	</aside>
	<!-- / widget archive -->
	<!-- widget recent comments -->
	<aside class="widget-comments">
		<h2>Recent Comments</h2>
		<hr class="divider-big" />
		<div class="comments">
			<?php
			$event_detail = $zenta_operation->event_comments(3);
			if (isset($event_detail) && !empty($event_detail)) {
				foreach ($event_detail as $row) {
					$comment_author = $event_detail['comment_author'];
					$timestamp = $event_detail['timestamp'];
					$comment = $upcom_event['comment'];
			?>
					<div class="comment">
						<div class="header-comments">
							<div class="date"><?= date('d.m.Y', $timestamp); ?></div>
							<div class="author"><?= $event_author; ?></div>
						</div>
						<p><?= $comment; ?></p>
					</div>
			<?php }
			} ?>
		</div>
	</aside>
	<!--/ widget recent comments -->
</div>