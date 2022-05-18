<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$button = $view->get('lang|this:team:button:more');
$content = null;

Objects::each($this->getData(), function($item) use (&$content, $button){
	
	$schedule = null;
	Objects::each($item['schedule'], function($i, $k) use (&$schedule){
		$schedule .= '<li>' . $k . ': <span>' . $i . '</span></li>';
	});
	
	$content .= '
		<div class="col-xl-4 col-lg-6 col-md-6 col-12">
			<div class="team-box-layout3">
				<div class="item-content">
					<div class="title-bar">
						<h3 class="item-title">
							<a href="/team-single/">' . $item['name'] . '</a>
						</h3>
						<p>' . $item['sub'] . '</p>
					</div>
					<div class="item-schedule">
						<ul>' . $schedule . '</ul>
						<a href="/team-single/" class="item-btn">' . $button . '</a>
					</div>
				</div>
				<div class="item-img">
					<img src="' . $item['image'] . '" alt="team" class="img-fluid">
				</div>
			</div>
		</div>
	';
});

?>
<section class="team-wrap-layout4 bg-light-secondary100">
	<div class="container">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2><?= $view->get('lang|this:team:title'); ?></h2>
			<p><?= $view->get('lang|this:team:description'); ?></p>
		</div>
		<div class="row gutters-15">
			<?= $content; ?>
		</div>
	</div>
</section>