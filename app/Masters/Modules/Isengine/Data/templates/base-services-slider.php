<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$images = null;
$content = null;
$button = $view -> get('lang|this:services:button:slider');

Objects::each($this -> getData(), function($item) use (&$images, &$content, $button){
	
	$images .= '
		<div class="nav-item"><i class="' . $item['icon'] . '"></i>' . $item['title'] . '</div>
	';
	
	$content .= '
		<div class="single-item">
			<div class="media media-none--lg">
				<div class="item-img">
					<img src="' . $item['image'] . '" alt="department" class="img-fluid">
				</div>
				<div class="media-body">
					<h2 class="item-title">' . $item['sub'] . '</h2>
					' . $item['description'] . '
					<ul class="list-item">
						<li>
							<div class="item-icon">
								<i class="' . $item['number']['icon'] . '"></i>
							</div>
							<div class="item-text">
								<h3 class="inner-item-title">' . $item['number']['title'] . '</h3>
								<span>' . $item['number']['value'] . '</span>
							</div>
						</li>
						<!--
						<li>
							<div class=\"item-icon\">
								<i class=\"far fa-clock\"></i>
							</div>
							<div class=\"item-text\">
								<h3 class=\"inner-item-title\">{lang|this:services:second}</h3>
								<span>09:00 pm - 12:00 pm</span>
							</div>
						</li>
						-->
					</ul>
					<a href="' . $item['link'] . '" class="item-btn">' . $button . '</a>
					<div class="ctg-item-icon"><i class="' . $item['icon'] . '"></i></div>
				</div>
			</div>
		</div>
	';
	
});

?>
<section class="departments-wrap-layout3 bg-accent100 bg-common" data-bg-image="/img/services/background-slider.png">
	<div class="container">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2><?= $view -> get('lang|this:services:title'); ?></h2>
			<p><?= $view -> get('lang|this:services:description'); ?></p>
		</div>
		<div id="slick-carousel-wrap" class="departments-box-layout3">
			<div class="nav-wrap carousel-nav">
				<?= $images; ?>
			</div>
			<div class="carousel-content">
				<?= $content; ?>
			</div>
		</div>
	</div>
</section>