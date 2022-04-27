<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();
$instance = Strings::after($this -> instance, ':', null, true);

$map = [];
$exclude = $this -> get('settings')['exclude'];

$this -> getData() -> iterate(function($item) use (&$map, $exclude){
	
	$key = Strings::join($item -> getData('group'), ':');
	$val = Strings::join($item -> getData('folder'), ' ');
	
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
<div class="row flex-column sm-pl-1 pr-15" id="catalog-nav-names">
	<?php
		Objects::each($map, function($name, $item){
			$link = '/catalog/' . Strings::replace($item, ':', '/') . '/';
	?>
	<div class="col-12">
		<a href="<?= $link ?>" class="color-gray-8 color-theme-hover p-025 block align-left">
			<?= $name; ?>
		</a>
	</div>
	<?php
		});
	?>
</div>