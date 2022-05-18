<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

?>
<section class="brand-wrap-layout1 bg-primary100">
	<div class="container">
		<div class="row">
			<div class="brand-box-layout1 col-xl-7 col-lg-6 col-md-12 col-12">
				<h2 class="item-title"><?= $view->get('lang|this:award:title'); ?></h2>
			</div>
			<div class="brand-box-layout2 col-xl-5 col-lg-6 col-md-12 col-12">
				<img src="/img/award/background.png" alt="award" class="img-fluid d-none d-lg-block">
				<ul>
					<?php Objects::each($this->getData(), function($item) { ?>
					<li>
						<img src="<?= $item; ?>" alt="award" class="img-fluid">
					</li>
					<?php }); ?>
				</ul>
			</div>
		</div>
	</div>
</section>