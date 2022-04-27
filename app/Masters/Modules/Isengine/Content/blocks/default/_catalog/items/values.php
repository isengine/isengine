<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Local;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Helpers\Paths;

if (!$item) { return; }

$data = &$item -> getData();

$name = $item -> getEntryKey('name');
$sizes = Strings::split($data['size']);
$count = $sizes ? Objects::len($sizes) : 0;
$link = '/' . Strings::join($item -> getEntryKey('parents'), '/') . '/' . $name . '/';
$real = DI . 'content' . DS . Strings::join($item -> getEntryKey('parents'), DS) . DS . $name . DS;
$imglink = 'content' . Strings::unlast($link);

$images = Local::search($real, [
	'return' => 'files',
	'extension' => 'jpg:jpeg:png:gif:webp',
	'info' => 'name',
	'merge' => true,
	'subfolders' => false
]);

$item -> setData('name', $name);
$item -> setData('step', 1);
$item -> setData('sizes', $sizes);
$item -> setData('count', $count);
$item -> setData('link', $link);
$item -> setData('images', [
	'link' => $imglink,
	'list' => $images
]);
$item -> setData('image', '{img|' . '/' . $imglink . '/' . Objects::first($images, 'value') . ':/content/catalog/default.jpg:lazyload w-100 align-image-contain:' . $name . '}');

if (!$data['id']) {
	$item -> setData('id', Strings::join($item -> getEntryKey('parents'), '_') . '_' . $name);
}

if ($count) {
	
	$price = $data['price'];
	$priceone = $data['price-one'];
	
	if (
		(!$price || !$priceone) &&
		($price || $priceone)
	) {
		
	}
	
	if (!$priceone) {
		$item -> setData('priceone', $price / $count);
	}
	if (!$price) {
		$item -> setData('price', $priceone * $count);
	}
	
}

?>