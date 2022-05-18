<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$instance = $this->get('instance');

$images = null;
$content = null;

Objects::each($this->getData(), function($item, $key) use (&$images, &$content, $instance){
	
	$data = $item['data'];
	$key++;
	
	$images .= '<img src="' . $data['image'] . '" alt="' . Prepare::tags($data['title']) . '" title="#' . $instance . '-item-' . $key . '" />';
	$content .= '
		<div id="' . $instance . '-item-' . $key . '" class="t-cn slider-direction">
			<div class="slider-content s-tb slide-' . $key . '">
				<div class="text-left title-container s-tb-c">
					<div class="container">
						<div class="text-box">
							<div class="slider-big-text">' . $data['title'] . '</div>
							<p class="slider-paragraph padding-right">' . $data['description'] . '</p>
							<div class="slider-btn-area">
								<a href="' . $data['link'] . '" class="item-btn">' . $data['button'] . '<i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	';
	
});

?>
<!-- Slider Area Start Here -->
<div class="slider-area slider-layout2 bg-light-primary100 slider-top-margin2">
	<div class="bend niceties preview-1">
		<div id="ensign-nivoslider-1" class="slides">
			<?= $images; ?>
		</div>
		<?= $content; ?>
	</div>
</div>
<!-- Slider Area End Here -->