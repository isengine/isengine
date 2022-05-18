<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$content = null;

Objects::each($this->getData(), function($item, $key) use (&$content){
	$content .= '
		<div class="testmonial-box-layout1">
			<div class="item-img">
				<img src="' . $item['image'] . '" class="img-fulid rounded-circle" alt="' . $item['name'] . '">
			</div>
			<div class="item-content">
				' . $item['description'] . '
				<h3 class="item-title">' . $item['name'] . '</h3>
				<h4 class="sub-title">' . $item['sub'] . '</h4>
			</div>
		</div>
	';
});

?>
<section class="testmonial-wrap-layout1 bg-common" data-bg-image="/img/testimonial/background.jpg">
	<div class="container">
		<div class="rc-carousel dot-control-layout2"
			data-loop="true"
			data-items="1"
			data-margin="30"
			data-autoplay="true"
			data-autoplay-timeout="5000"
			data-smart-speed="2000"
			data-dots="true"
			data-nav="false"
			data-nav-speed="false"
			data-r-x-small="1"
			data-r-x-small-nav="false"
			data-r-x-small-dots="true"
			data-r-x-medium="1"
			data-r-x-medium-nav="false"
			data-r-x-medium-dots="true"
			data-r-small="1"
			data-r-small-nav="false"
			data-r-small-dots="true"
			data-r-medium="1"
			data-r-medium-nav="false"
			data-r-medium-dots="true"
			data-r-large="1"
			data-r-large-nav="false"
			data-r-large-dots="true"
			data-r-extra-large="1"
			data-r-extra-large-nav="false"
			data-r-extra-large-dots="true"
		>
			<?= $content; ?>
		</div>
	</div>
</section>