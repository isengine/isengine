<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

?>
<section class="both-side-half-bg">
	<div class="single-item">
		<?php $view -> get('module') -> launch('data', 'base-news|base-news-in-testimonials'); ?>
	</div>
	<div class="single-item bg-common" data-bg-image="/img/testimonial/background.jpg">
		<div class="section-heading heading-light heading-layout5">
			<h2><?= $view -> get('lang|this:testimonials:title'); ?></h2>
			<div id="owl-nav3" class="owl-nav-layout2">
				<span class="rt-prev">
					<i class="fas fa-chevron-left"></i>
				</span>
				<span class="rt-next">
					<i class="fas fa-chevron-right"></i>
				</span>
			</div>
		</div>
		<div class="rc-carousel nav-control-layout7"
			data-loop="true"
			data-items="4"
			data-margin="30"
			data-autoplay="false"
			data-autoplay-timeout="5000"
			data-custom-nav="#owl-nav3"
			data-smart-speed="2000"
			data-dots="false"
			data-nav="false"
			data-nav-speed="false"
			data-r-x-small="1"
			data-r-x-small-nav="true"
			data-r-x-small-dots="false"
			data-r-x-medium="1"
			data-r-x-medium-nav="false"
			data-r-x-medium-dots="false"
			data-r-small="1"
			data-r-small-nav="false"
			data-r-small-dots="false"
			data-r-medium="1"
			data-r-medium-nav="false"
			data-r-medium-dots="false"
			data-r-large="1"
			data-r-large-nav="false"
			data-r-large-dots="false"
			data-r-extra-large="1"
			data-r-extra-large-nav="false"
			data-r-extra-large-dots="false"
		>
			<?php Objects::each($this -> getData(), function($item) { ?>
				<div class="item">
					<div class="testmonial-box-layout2">
						<h4 class="item-title"><?= $item['name']; ?> <span>/ <?= $item['sub']; ?></span></h4>
						<ul class="rating"><?= Strings::multiply('<li><i class="fa fa-star" aria-hidden="true"></i></li>', $item['rating']); ?></ul>
						<?= $item['description']; ?>
					</div>
				</div>
			<?php }); ?>
		</div>
	</div>
</section>