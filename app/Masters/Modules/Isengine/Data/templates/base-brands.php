<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Local;

$list = Local::search(DI . Strings::replace($this -> getData('path'), ':', DS) . DS, ['return' => 'files', 'merge' => true]);
$path = Strings::replace($this -> getData('path'), ':', '/');
$content = null;

Objects::each($list, function($item) use (&$content, $path){
	
	$content .= '
		<div class="brand-box-layout3">
			<img src="/' . $path . '/' . $item['name'] . '" alt="' . $item['file'] . '" class="img-fluid">
		</div>
	';
	
});

?>
<!-- Brand Area Start Here -->
<section class="brand-wrap-layout2 bg-light-primary100">
	<div class="container">
		<div class="rc-carousel nav-control-layout4"
			data-loop="true"
			data-items="5"
			data-margin="30"
			data-autoplay="false"
			data-autoplay-timeout="5000"
			data-smart-speed="2000"
			data-dots="false"
			data-nav="true"
			data-nav-speed="false"
			data-r-x-small="2"
			data-r-x-small-nav="true"
			data-r-x-small-dots="false"
			data-r-x-medium="2"
			data-r-x-medium-nav="true"
			data-r-x-medium-dots="false"
			data-r-small="3"
			data-r-small-nav="true"
			data-r-small-dots="false"
			data-r-medium="5"
			data-r-medium-nav="true"
			data-r-medium-dots="false"
			data-r-large="5"
			data-r-large-nav="true"
			data-r-large-dots="false"
			data-r-extra-large="5"
			data-r-extra-large-nav="true"
			data-r-extra-large-dots="false"
		>
			<?= $content; ?>
		</div>
	</div>
</section>
<!-- Brand Area End Here -->