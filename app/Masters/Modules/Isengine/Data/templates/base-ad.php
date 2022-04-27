<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$button = $view -> get('lang|common:readmore', 'upper') . '<i class="fas fa-chevron-right"></i>';

?>
<?php Objects::each($this -> getData(), function($item) use ($button) { ?>
<div class="widget widget-ad-area">
	<div class="ad-wrap">
		<img src="<?= $item['image']; ?>" alt="ad">
		<div class="item-btn-wrap">
			<a class="item-btn" href="<?= $item['link']; ?>" target="blank"><?= $button; ?></a>
		</div>
	</div>
</div>
<?php }); ?>