<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

$data = $item->getData();

?>
<div class="col-12 xs-col-6 lg-col-3 py-1">
	<div class="row flex-column justify-content-between height-100">
		<div class="col-12 mb-075" style="height: 12rem;">
			<a href="<?= $data['link'] ?>">
				<?= $data['image-cover']; ?>
			</a>
		</div>
		<div class="col-12">
			<h2 class="">
				<a href="<?= $data['link'] ?>">
					<?= $data['title']; ?>
				</a>
			</h2>
			<div class="">
				<?= $data['description']; ?>
			</div>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col">
					<?= $data['authors']; ?>
				</div>
				<div class="col align-right">
					<?= $data['date-display']; ?>
				</div>
			</div>
		</div>
	</div>
</div>