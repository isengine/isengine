<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$map = $this->getData()->map->parents['catalog'];

if (!System::typeOf($map, 'iterable')) {
	return;
}

// Каталог для десктопной версии
// отдельно элементы меню верхнего уровня

$parents = ['catalog'];

Objects::each($map, function($item, $key, $pos) use ($parents){
	$current = Strings::join($parents, '/');
	$link = '/' . ($current ? $current . '/' : null) . $key . '/';
	$name = Strings::replace($key, ' ', '_');
	
	// если в элементе нет вложений, то меню без разворачиваемых пунктов
	
	if (!System::typeOf($item, 'iterable')) {
?>
	<div class="accordion-item b-0">
		<div class="accordion-header flex justify-content-between align-items-center" id="accordionList-<?= $name; ?>">
			<a href="<?= $link; ?>" class="btn py-0<?= $pos === 'first' || $pos === 'alone' ? null : ' collapsed'; ?>">
				<span class="color-gray-8 color-theme-hover">
					<?= $key; ?>
				</span>
			</a>
		</div>
	</div>
<?php
		return;
	}
	
	// если в элементе есть вложенные подменю, то меню с разворачиваемыми пунктами
?>
	<div class="accordion-item b-0">
		<div class="accordion-header flex justify-content-between align-items-center" id="accordionList-<?= $name; ?>">
			<button class="btn py-0<?= $pos === 'first' || $pos === 'alone' ? null : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#accordionListCollapse-<?= $name; ?>" aria-expanded="false" aria-controls="accordionListCollapse-<?= $name; ?>">
				<span class="color-gray-8 color-theme-hover">
					<?= $key; ?>
				</span>
				<i class="bi-chevron-right translate"></i>
			</button>
		</div>
	</div>
<?php
}, true);
?>