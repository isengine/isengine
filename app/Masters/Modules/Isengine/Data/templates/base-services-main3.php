<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$button = $view -> get('lang|common:readmore', 'upper');

?>
<?php Objects::each($this -> getData(), function($item) use ($button) { ?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<div class="departments-box-layout4">
			<div class="box-content">
				<i class="<?= $item['icon']; ?>"></i>
				<h3 class="item-title"><a href="<?= $item['link']; ?>"><?= $item['title']; ?></a></h3>
				<p><?= $item['sub']; ?></p>
			</div>
		</div>
	</div>
<?php }); ?>
