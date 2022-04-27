<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;

$map = $this -> getData();

if (!System::typeOf($map, 'iterable')) {
	return;
}

// Каталог для десктопной версии
// отдельно элементы вложенного меню до третьего уровня

$parents = ['catalog'];

Objects::each($map, function($data, $key, $pos) use ($parents){
	
	// если в элементе нет вложений, то будет возврат
	// и вложенное меню для этого элемента не будет создано
	
	if (!System::typeOf($data['data'], 'iterable')) {
		return;
	}
	
	if (!$data) {
		return;
	}
	
	$current = Strings::join($parents, '/');
	$key = Prepare::urlencode($data['title'], '/');
	$link = $data['link'] ? $data['link'] : '/' . ($current ? $current . '/' : null) . $key . '/';
	$name = $data['title'];
	$key = Strings::replace($name, ' ', '_');
?>
	<div id="accordionListCollapse-<?= $key; ?>" class="accordion-collapse collapse<?= $pos === 'first' || $pos === 'alone' ? ' show' : null; ?>" aria-labelledby="accordionList-<?= $key; ?>" data-bs-parent="#accordionNav">
		<div class="accordion-body py-0">
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover fs-125 mb-05 block">
				<?= $name; ?>
			</a>
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover fs-09 fw-bold py-05 block">
				Все товары категории
			</a>
<?php
	
	// перебор вложений второго уровня
	
	$parents[] = $name;
	
	Objects::each($data['data'], function($data, $key, $pos) use ($parents){
		
		if (!$data) {
			return;
		}
		
		$current = Strings::join($parents, '/');
		$key = Prepare::urlencode($data['title'], '/');
		$link = $data['link'] ? $data['link'] : '/' . ($current ? $current . '/' : null) . $key . '/';
		$name = $data['title'];
		$key = Strings::replace($name, ' ', '_');
?>
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover block">
				<?= $name; ?>
			</a>
<?php
		if (!System::typeOf($data['data'], 'iterable')) {
			return;
		}
		
		// перебор вложений третьего уровня
		
		$parents[] = $name;
?>
			<div class="accordion-body p-0 mt-05 mb-1 fs-09 lh-15">
<?php
		Objects::each($data['data'], function($data, $key, $pos) use ($parents){
			
			if (!$data) {
				return;
			}
			
			$current = Strings::join($parents, '/');
			$key = Prepare::urlencode($data['title'], '/');
			$link = $data['link'] ? $data['link'] : '/' . ($current ? $current . '/' : null) . $key . '/';
			$name = $data['title'];
			$key = Strings::replace($name, ' ', '_');
?>
				<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover block">
					<?= $name; ?>
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