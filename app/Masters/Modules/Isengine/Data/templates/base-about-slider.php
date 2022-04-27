<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$content = null;
$images = null;

Objects::each($this -> getData(), function($item) use (&$content, &$images){
	
	$images .= '
		<div class="nav-item"><img src="' . $item['image'] . '" alt="brand" class="img-fluid"></div>
	';
	$content .= '
		<div class="single-item">
			<h2 class="item-title">' . $item['title'] . '
			</h2>
			<p class="sub-title">' . $item['sub'] . '</p>
			' . $item['description'] . '
		</div>
	';
	
});

?>
<div id="slick-carousel-wrap2" class="row about-box-layout10">
	<div class="col-lg-6 col-md-5 about-img carousel-nav">
		<?= $images; ?>
	</div>
	<div class="col-lg-6 col-md-7 carousel-content about-content">
		<?= $content; ?>
	</div>
</div>