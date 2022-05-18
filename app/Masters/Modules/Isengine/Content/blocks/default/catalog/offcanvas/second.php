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
// отдельно элементы вложенного меню до третьего уровня

$parents = ['catalog'];

Objects::each($map, function($item, $key, $pos) use ($parents){
	
	// если в элементе нет вложений, то будет возврат
	// и вложенное меню для этого элемента не будет создано
	
	if (!System::typeOf($item, 'iterable')) {
		return;
	}
	
	$current = Strings::join($parents, '/');
	$link = '/' . ($current ? $current . '/' : null) . $key . '/';
	$name = Strings::replace($key, ' ', '_');
?>
	<div id="accordionListCollapse-<?= $name; ?>" class="accordion-collapse collapse<?= $pos === 'first' || $pos === 'alone' ? ' show' : null; ?>" aria-labelledby="accordionList-<?= $name; ?>" data-bs-parent="#accordionNav">
		<div class="accordion-body py-0">
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover fs-125 mb-05 block">
				<?= $key; ?>
			</a>
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover fs-09 fw-bold py-05 block">
				Все товары категории
			</a>
<?php
	
	// перебор вложений второго уровня
	
	$parents[] = $key;
	
	Objects::each($item, function($item, $key, $pos) use ($parents){
		$current = Strings::join($parents, '/');
		$link = '/' . ($current ? $current . '/' : null) . $key . '/';
		$name = Strings::replace($key, ' ', '_');
?>
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover block">
				<?= $key; ?>
			</a>
<?php
		if (!System::typeOf($item, 'iterable')) {
			return;
		}
		
		// перебор вложений третьего уровня
		
		$parents[] = $key;
?>
			<div class="accordion-body p-0 mt-05 mb-1 fs-09 lh-15">
<?php
		Objects::each($item, function($item, $key, $pos) use ($parents){
			$current = Strings::join($parents, '/');
			$link = '/' . ($current ? $current . '/' : null) . $key . '/';
			$name = Strings::replace($key, ' ', '_');
?>
				<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover block">
					<?= $key; ?>
				</a>
<?php
		}, true);
?>
			</div>
<?php
		$parents = Objects::unlast($parents);
	}, true);
	$parents = Objects::unlast($parents);
?>
		</div>
	</div>
<?php
}, true);
?>