<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$content = null;
$tabs = null;

Objects::each($this -> getData(), function($item, $key, $pos) use (&$content, &$tabs){
	
	$images = null;
	
	Objects::each($item['images'], function($i) use (&$images) {
		$images .= '
			<div class="col-md-6 col-12">
				<img src="' . $i . '" alt="about">
			</div>
		';
	});
	
	$tabs .= '
		<li class="nav-item">
			<a' . ($pos === 'first' || $pos === 'alone' ? ' class="active"' : null) . ' href="#related' . ($key + 1) . '" data-toggle="tab" aria-expanded="false">' . $item['title'] . '</a>
		</li>
	';
	
	$content .= '
		<div class="tab-pane fade' . ($pos === 'first' || $pos === 'alone' ? ' active show' : null) . '" id="related' . ($key + 1) . '">
			<div class="about-box-layout5">
				<h2 class="item-title">' . $item['title'] . '</h2>
				' . $item['sub'] . '
				<div class="row about-img">
				' . $images . '
				</div>
				' . $item['description'] . '
			</div>
		</div>
	';
	
});

?>
<div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">
	<div class="widget widget-about-info">
		<ul class="nav nav-tabs tab-nav-list">
			<?= $tabs; ?>
		</ul>
	</div>
</div>
<div class="col-xl-9 col-lg-8 no-equal-item">
	<div class="tab-content">
		<?= $content; ?>
	</div>
</div>