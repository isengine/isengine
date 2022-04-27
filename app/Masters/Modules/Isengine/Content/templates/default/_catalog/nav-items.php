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
<ul class="navbar nav m-0 p-0">
	
	<li class="nav-item">
		
	</li>
	
	<li class="nav-item">
		<a class="btn active" aria-current="page" href="/"><?= $view -> get('lang|nav:index'); ?></a>
	</li>
	<li class="nav-item">
		<a class="btn href="/about/"><?= $view -> get('lang|nav:about'); ?></a>
	</li>
	<li class="nav-item">
		<a class="btn href="/contacts/"><?= $view -> get('lang|nav:contacts'); ?></a>
	</li>
	<li class="nav-item dropdown">
		<a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			Link
		</a>
		<ul class="dropdown-menu color-black">
			<li><a class="dropdown-item" href="#">Action</a></li>
			<li><a class="dropdown-item" href="#">Another action</a></li>
			<li><a class="dropdown-item" href="#">Something else here</a></li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			Link
		</a>
		<ul class="dropdown-menu color-black">
			<li><a class="dropdown-item" href="#">Action</a></li>
			<li><a class="dropdown-item" href="#">Another action</a></li>
			<li><a class="dropdown-item" href="#">Something else here</a></li>
		</ul>
	</li>

</ul>

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