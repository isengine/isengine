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

Objects::each($map, function($name, $item){
	$link = '/catalog/' . Strings::replace($item, ':', '/') . '/';
?>
<li><a class="dropdown-item" href="<?= $link ?>"><?= $name; ?></a></li>
<?php
	});
?>
