<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$content = null;

Objects::each($this->getData(), function($item, $key) use (&$content){
	
	$content .= '
		<div class="progress-box-layout1 col-md-4">
			<div class="inner-item">
				<div class="item-icon">
					<i class="' . $item['icon'] . '"></i>
				</div>
				<div class="item-content">
					<div class="counting-text counter" data-num="' . $item['count'] . '">' . $item['count'] . '</div>
					<p>' . $item['title'] . '</p>
				</div>
			</div>
		</div>
	';
	
});

?>
<!-- Progress Area Start Here -->
<section class="progress-wrap-layout1">
	<div class="container">
		<div class="row">
			<?= $content; ?>
		</div>
	</div>
</section>
<!-- Progress Area End Here -->