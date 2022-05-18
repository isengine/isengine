<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();
$instance = Strings::after($this->instance, ':', null, true);

$map = [];
$exclude = $this->get('settings')['exclude'];

$this->getData()->iterate(function($item) use (&$map, $exclude){
	
	$key = Strings::join($item->getData('group'), ':');
	$val = Strings::join($item->getData('folder'), ' ');
	
	if (
		$exclude &&
		(
			Objects::match($exclude, $key) ||
			Objects::match($exclude, $val)
		)
	) {
		return;
	}
	
	$map[$key] = $val;
	
});

?>
<div class="col-12">
	<div class="row <?= $this->type; ?>" id="catalog-nav">
		<?php
			Objects::each($map, function($name, $item){
				
				$link = '/catalog/' . Strings::replace($item, ':', '/') . '/';
				
				$image = '{img|/content/groups/' . $name . '.jpg:/content/catalog/default.jpg:lazyload w-100 align-image-contain radius-1:' . $name . '}';
				$this->tvars($image);
				
		?>
		<div class="col-6 sm-col-4 md-col-3 align-center mb-2">
				<a href="<?= $link ?>" class="block m-05">
					<div class="block border radius-1 mt-1">
						<?= $image; ?>
					</div>
				</a>
				<a href="<?= $link ?>" class="btn bg-theme">
					<div class="">
						<?= $name; ?>
					</div>
				</a>
		</div>
		<?php
			});
		?>
	</div>
</div>