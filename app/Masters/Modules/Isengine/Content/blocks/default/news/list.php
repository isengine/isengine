<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

$data = $item->getData();

$parents = Strings::join($item->get('parents'), '-');
$id = Strings::replace(($parents ? $parents . '-' : null) . $item->get('name'), ' ', '_');

?>
<div class="col-12 py-1" id="<?= $id; ?>">
	<div class="row">
		<div class="col-12 xs-col-4 lg-col-3">
			<a href="<?= $data['link'] ?>">
				<?= $data['image']; ?>
			</a>
		</div>
		<div class="col-12 xs-col-8 lg-col-9">
			<h2 class="">
				<a href="<?= $data['link'] ?>">
					<?= $data['title']; ?>
				</a>
			</h2>
			<div class="">
				<?= $data['description']; ?>
			</div>
			<div class="row">
				<div class="col">
					<a href="<?= $data['link'] ?>">
						Открыть
					</a>
				</div>
				<div class="col align-right">
					<?= $data['authors']; ?>
					<?= $data['date-display']; ?>
				</div>
			</div>
		</div>
	</div>
</div>