<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$content = null;

Objects::each($this -> getData(), function($item, $key) use (&$content){
	
	$content .= '
		<div class="progress-box-layout2 col-md-4">
			<div class="inner-item">
				<div class="counting-text counter" data-num="' . $item['count'] . '">' . $item['count'] . '</div>
				<p>' . $item['title'] . '</p>
			</div>
		</div>
	';
	
});

?>
<!-- Progress Area Start Here -->
<section class="progress-wrap-layout2 bg-overlay bg-overlay-primary80 bg-common parallaxie" data-bg-image="/img/indicators/background.jpg">
	<div class="container">
		<div class="row">
			<?= $content; ?>
		</div>
	</div>
</section>
<!-- Progress Area End Here -->