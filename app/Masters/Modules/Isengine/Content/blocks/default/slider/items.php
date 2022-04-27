<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

$data = $item -> getData();

$first = Objects::first($this -> getData() -> getNames(), 'value');
$parents = Strings::join($item -> get('parents'), ':');
$key = ($parents ? $parents . ':' : null) . $item -> get('name');

?>
<div class="carousel-item<?= $key === $first ? ' active' : null; ?>">
	<img src="<?= $data['image']; ?>" class="block w-100" alt="<?= $data['title']; ?>">
	<div class="absolute <?= $data['class']; ?>">
		<h3 class="fw-bold color-white fs-2 xs-fs-3 sh-3"><?= $data['title']; ?></h3>
		<p class="color-white sh-3"><?= $data['description']; ?></p>
		<?php if ($data['button']) { ?>
			<a href="<?= $data['link']; ?>" class="btn bg-second shadow-3-25">
				<?= $data['button']; ?>
			</a>
		<?php } ?>
	</div>
</div>