<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$button = $view -> get('lang|this:team:button:action');
$content = null;

Objects::each($this -> getData(), function($item) use (&$content, $button){
	
	$schedule = null;
	Objects::each($item['schedule'], function($i, $k) use (&$schedule){
		$schedule .= '<li>' . $k . '<span>' . $i . '</span></li>';
	});
	
	$content .= '
		<div class="team-box-layout2">
			<div class="item-img">
				<img src="' . $item['image'] . '" alt="team" class="img-fluid">
				<ul class="item-icon">
					<li>
						<a href="/team-single/">
							<i class="fas fa-plus"></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="item-content">
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
	';
});

?>
<section class="team-wrap-layout1 bg-light-secondary100">
	<img class="left-img img-fluid" src="/img/team/figure-top-left.png" alt="figure">
	<img class="right-img img-fluid" src="/img/team/figure-bottom-right.png" alt="figure">
	<div class="container">
		<div class="section-heading heading-dark text-left heading-layout1">
			<h2><?= $view -> get('lang|this:team:title'); ?></h2>
			<p><?= $view -> get('lang|this:team:description'); ?></p>
			<div id="owl-nav2" class="owl-nav-layout1">
				<span class="rt-prev">
					<i class="fas fa-chevron-left"></i>
				</span>
				<span class="rt-next">
					<i class="fas fa-chevron-right"></i>
				</span>
			</div>
		</div>
		<div class="rc-carousel nav-control-layout2"
			data-loop="true"
			data-items="4"
			data-margin="30"
			data-autoplay="false"
			data-autoplay-timeout="5000"
			data-custom-nav="#owl-nav2"
			data-smart-speed="2000"
			data-dots="false"
			data-nav="false"
			data-nav-speed="false"
			data-r-x-small="1"
			data-r-x-small-nav="true"
			data-r-x-small-dots="false"
			data-r-x-medium="2"
			data-r-x-medium-nav="false"
			data-r-x-medium-dots="false"
			data-r-small="2"
			data-r-small-nav="false"
			data-r-small-dots="false"
			data-r-medium="3"
			data-r-medium-nav="false"
			data-r-medium-dots="false"
			data-r-large="3"
			data-r-large-nav="false"
			data-r-large-dots="false"
			data-r-extra-large="4"
			data-r-extra-large-nav="false"
			data-r-extra-large-dots="false"
		>
			<?= $content; ?>
		</div>
	</div>
</section>