<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

?>
<section class="departments-box-layout7 bg-light-secondary100">
	<div class="container">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2 class="title"><?= $view->get('lang|this:services:title'); ?></h2>
			<div class="sub-title"><?= $view->get('lang|this:services:description'); ?></div>
		</div>
		<div class="row gutters-5">
			<?php Objects::each($this->getData(), function($item) { ?>
				<div class="col-lg-2 col-md-3 col-sm-6 col-12">
					<div class="single-box">
						<a href="<?= $item['link']; ?>">
							<i class="<?= $item['icon']; ?>"></i>
						</a>
						<p>
							<a href="<?= $item['link']; ?>"><?= $item['title']; ?></a>
						</p>
					</div>
				</div>
			<?php }); ?>
		</div>
	</div>
</section>