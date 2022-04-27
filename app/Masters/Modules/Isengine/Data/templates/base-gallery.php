<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$instance = $this -> get('instance');

$tags = null;
$content = null;

Objects::each($this -> settings['tags'], function($item, $key, $position) use (&$tags, $instance){
	$key = $position === 'first' ? '*' : '.' . $key;
	$tags .= '<a href="#" class="' . ($position === 'first' ? 'current ' : null) . 'nav-item" data-filter="' . $key . '">' . $item . '</a>';
});

Objects::each($this -> getData(), function($item) use (&$content){
	$content .= '
		<div class="col-lg-4 col-md-6 col-12 ' . $item['tags'] . '">
			<div class="gallery-box-layout1">
				<img src="' . $item['image'] . '" alt="' . $item['title'] . '" class="img-fluid">
				<div class="item-icon">
					<a href="' . $item['image'] . '" class="popup-zoom" data-fancybox-group="gallery-' . $instance . '" title="">
						<i class="fas fa-search"></i>
					</a>
				</div>
				<div class="item-content">
					<h3 class="item-title">' . $item['title'] . '</h3>
					<span class="title-ctg">' . $item['description'] . '</span>
				</div>
			</div>
		</div>
	';
});

?>
<div class="container">
	<div class="isotope-wrap">
		<div class="text-center">
			<div class="isotope-classes-tab isotop-btn">
				<?= $tags; ?>
			</div>
		</div>
		<div class="row featuredContainer zoom-gallery">
			<?= $content; ?>
		</div>
	</div>
</div>