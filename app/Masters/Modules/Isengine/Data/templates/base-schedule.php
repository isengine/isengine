<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$button = $this->getData()['button'];
$table = $this->getData()['table'];
$build = $this->getData()['build'];
$cset = $this->getData()['content'];

$x_count = $this->getData()['table']['x']['count'];
if ( $this->getData()['table']['y'] ) {
	$x_count++;
}

$y_count = $this->getData()['table']['y']['count'];

$head = null;
$content = null;

$x = 0;
while ($x <= $x_count) {
	if ($x > 0) {
		$head .= '
			<td>
				<div class="schedule-day-heading">' . $table['x']['title'][$x] . '</div>
			</td>
		';
	} else {
		$head .= '
			<th>
				<div class="schedule-time-heading">' . $table['x']['title'][$x] . '</div>
			</th>
		';
	}
	$x++;
}

$y = 0;
while ($y < $y_count) {
	$content .= '
		<tr>
			<th scope="row">
				<div class="schedule-time-wrapper">' . $table['y']['title'][$y] . '</div>
			</th>
	';
	
	$x = 0;
	while ($x < $x_count) {
		$content .= '
			<td>
				<div class="schedule-item-wrapper">
		';
		$c = null;
		Objects::each($build[$y][$x], function($item) use (&$c, $cset, $button){
			$item = $cset[$item];
			$c .= '
					<div class="media">
						<div class="item-img">
							<img src="' . $item['image'] . '" alt="team" class="img-fluid rounded-circle">
						</div>
						<div class="media-body">
							<h3 class="title">' . $item['title'] . '</h3>
							<div class="item-ctg">' . $item['sub'] . '</div>
							<a href="/team-single/" class="item-btn btn-fill size-xs radius-4">' . $button . '</a>
						</div>
					</div>
					<div class="item-ctg">' . $item['sub'] . '</div>
					<div class="item-time">' . $item['time'] . '</div>
					<div class="item-team">' . $item['team'] . '</div>
			';
		});
		$content .= $c . '
				</div>
			</td>
		';
		$x++;
	}
	
	$content .= '
		</tr>
	';
	$y++;
}

?>
<section class="class-schedule1">
	<div class="container">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2><?= $view->get('lang|this:schedule:title'); ?></h2>
			<p><?= $view->get('lang|this:schedule:description'); ?></p>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="class-schedule-wrap1">
					<div class="table-responsive">
						
						<table class="table table-bordered">
							<thead>
								<tr>
									<?= $head; ?>
								</tr>
							</thead>
							<tbody>
								<?= $content; ?>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>