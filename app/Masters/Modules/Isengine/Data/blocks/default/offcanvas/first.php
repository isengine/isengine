<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;

$map = $this->getData();

if (!System::typeOf($map, 'iterable')) {
	return;
}

// Каталог для десктопной версии
// отдельно элементы меню верхнего уровня

$parents = ['catalog'];

Objects::each($map, function($data, $key, $pos) use ($parents){
	
	if (!$data) {
		return;
	}
	
	$current = Strings::join($parents, '/');
	$key = Prepare::urlencode($data['title'], '/');
	$link = $data['link'] ? $data['link'] : '/' . ($current ? $current . '/' : null) . $key . '/';
	$name = $data['title'];
	$key = Strings::replace($name, ' ', '_');
	
	// если в элементе нет вложений, то меню без разворачиваемых пунктов
	
	if (!System::typeOf($data['data'], 'iterable')) {
?>
	<div class="accordion-item b-0">
		<div class="accordion-header flex justify-content-between align-items-center" id="accordionList-<?= $key; ?>">
			<a href="<?= $link; ?>" class="btn py-0<?= $pos === 'first' || $pos === 'alone' ? null : ' collapsed'; ?>">
				<span class="color-gray-8 color-theme-hover">
					<?= $name; ?>
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
		<div class="accordion-header flex justify-content-between align-items-center" id="accordionList-<?= $key; ?>">
			<button class="btn py-0<?= $pos === 'first' || $pos === 'alone' ? null : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#accordionListCollapse-<?= $key; ?>" aria-expanded="false" aria-controls="accordionListCollapse-<?= $key; ?>">
				<span class="color-gray-8 color-theme-hover">
					<?= $name; ?>
				</span>
				<i class="bi-chevron-right translate"></i>
			</button>
		</div>
	</div>
<?php
}, true);
?>