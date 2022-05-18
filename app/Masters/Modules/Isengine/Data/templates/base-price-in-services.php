<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

?>
<div class="row">
	<div class="col-12">
		<div class="item-cost">
			<h3 class="item-title title-bar-primary7"><?= $view->get('lang|this:price'); ?></h3>
			<ul>
				<?php Objects::each($this->getData(), function($item, $key) { ?>
					<li><?= $key; ?><span><?= $item; ?></span></li>
				<?php }); ?>
			</ul>
		</div>
	</div>
</div>