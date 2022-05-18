<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$button = $view->get('lang|this:services:button:carousel');

?>
<section class="departments-wrap-layout2 bg-light-secondary100">
	<img class="left-img img-fluid" src="/img/services/background-carousel.png" alt="figure">
	<div class="container">
		<div class="section-heading heading-dark text-left heading-layout1">
			<h2><?= $view->get('lang|this:services:title'); ?></h2>
			<p><?= $view->get('lang|this:services:description'); ?></p>
			<div id="owl-nav1" class="owl-nav-layout1">
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
			data-margin="20"
			data-autoplay="false"
			data-autoplay-timeout="5000"
			data-custom-nav="#owl-nav1"
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
			data-r-large="4"
			data-r-large-nav="false"
			data-r-large-dots="false"
			data-r-extra-large="4"
			data-r-extra-large-nav="false"
			data-r-extra-large-dots="false"
		>
		<?php Objects::each($this->getData(), function($item) use ($button) { ?>
			<div class="departments-box-layout2">
				<span class="departments-sl"><?= $item['number']['value']; ?></span>
				<div class="item-icon">
					<a href="<?= $item['link']; ?>">
						<i class="<?= $item['icon']; ?>"></i>
					</a>
				</div>
				<h3 class="item-title"><a href="<?= $item['link']; ?>"><?= $item['title']; ?></a></h3>
				<?= $item['description']; ?>
				<a class="item-btn" href="<?= $item['link']; ?>"><?= $button; ?></a>
			</div>
		<?php }); ?>
		</div>
	</div>
</section>