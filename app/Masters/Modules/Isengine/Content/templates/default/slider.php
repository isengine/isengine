<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$count = $this -> getData() -> map -> total;

if (!$count) {
	return;
}

?>
<div id="carousel" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-indicators">
		<?php System::loop($count, function($c) { ?>
		<button type="button" data-bs-target="#carousel" data-bs-slide-to="<?= $c; ?>" class="<?= $c ? null : ' active'; ?>" aria-current="true" aria-label="Slide <?= $c++; ?>"></button>
		<?php }); ?>
	</div>
	<div class="carousel-inner">
		<?php $this -> iterate('default:slider:items'); ?>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Пред</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">След</span>
	</button>
</div>