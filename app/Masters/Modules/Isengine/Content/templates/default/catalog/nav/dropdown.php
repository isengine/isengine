<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

//$map = [
//	'a' => [
//		'a-1' => [
//			'a-1-1' => null,
//			'a-1-2' => null,
//			'a-1-3' => null
//		],
//		'a-2' => null,
//		'a-3' => null
//	],
//	'b' => null,
//	'c' => [
//		'c-1' => [
//			'c-1-2' => [
//				'c-1-2-3' => [
//					'c-1-2-3-4' => null
//				]
//			]
//		]
//	],
//	'd' => [
//		'a-1' => null,
//		'a-2' => null,
//		'a-3' => null
//	]
//];
//
//$map = $this -> getData() -> map -> count;
//if (System::typeOf($map, 'iterable')) {
//	$map = Objects::unfirst($map);
//}

$map = $this -> getData() -> map -> parents['catalog'];

if (!System::typeOf($map, 'iterable')) {
	return;
}

// рекурсивная функция для вложенного многоуровневого меню

if (!function_exists('is\Masters\Modules\Isengine\Content\fnDropdownMenu')) {
function fnDropdownMenu ($map, $parents = []) {
	Objects::each($map, function($item, $key) use (&$parents){
		$current = Strings::join($parents, '/');
		$link = '/' . ($current ? $current . '/' : null) . $key . '/';
?>
	<li class="nav-item dropdown">
		<div class="btn-group width-100">
			<a href="<?=  $link; ?>" class="btn align-left"><?= $key; ?></a>
			<?php
				if ($item) {
					$parents[] = $key;
			?>
			<button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
				<span class="visually-hidden">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu color-black">
			<?php fnDropdownMenu($item, $parents); ?>
			</ul>
			<?php
					$parents = Objects::unlast($parents);
				}
			?>
		</div>
	</li>
<?php
	}, true);
}
}

fnDropdownMenu($map, ['catalog']);

?>