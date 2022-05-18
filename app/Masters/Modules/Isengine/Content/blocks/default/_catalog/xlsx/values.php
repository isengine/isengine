<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Helpers\Paths;

if (!$item) { return; }

$data = $item->getData();

$name = $item->getEntryKey('name');
$parents = Strings::join($item->getEntryKey('parents'), '/');
$id = ($parents ? Strings::join($item->getEntryKey('parents'), ':') . ':' : null) . $name;
$val = Sessions::getCookie(Prepare::urlencode($id));

$data['price'] = System::set($data['price']) ? Objects::sort($data['price']) : [];
$price = [
	'current' => $data['sale'] ? ceil($data['price'][0] - $data['price'][0] / 100 * $data['sale']) : $data['price'][0],
	'old' => $data['sale'] ? $data['price'][0] : $data['price'][1],
	'sale' => null,
	'total' => null
];
$price['sale'] = $price['old'] ? floor(100 - (100 * $price['current'] / $price['old'])) : null;
if ($price['old'] === $price['current']) {
	$price['old'] = null;
	$price['sale'] = null;
}
$price['total'] = $price['current'] * $val;

//$image = $data['image'] ? Paths::toUrl($data['image']) : '/content/' . $parents . '/' . $name . '.jpg';
//$image = '/content/catalog/' . Objects::first($data['folder'], 'value') . '/' . ($data['image'] ? $data['image'] : Prepare::urlencode($data['title'])) . '.jpg';
//$image = '/content/catalog/' . Objects::first($data['folder'], 'value') . '/' . ($data['image'] ? $data['image'] : $data['title']) . '.jpg';
$image = '/content/catalog/' . Objects::first($data['folder'], 'value') . '/' . ($data['image'] ? $data['image'] : Prepare::alphanumeric($data['title'])) . '.jpg';
// в системе все четко, проблема с загрузкой картинок на самом деле
// в библиотеке lazy, которая непонятно интерпретирует и загружает файл по ссылке

$item->setData([
	'id' => $id,
	'title' => $data['title'] . ($data['description'] ? ', ' . $data['description'] : null),
	'img' => $image,
	'image' => '{img|' . $image . ':/content/catalog/default.jpg:lazyload w-100 align-image-contain:' . $data['title'] . '}',
	//'image' => '<img src="' . $image . '" class="lazyload w-100 align-image-contain" alt="' . $data['title'] . '">',
	'value' => $val && $val > 0 ? $val : 0,
	'link' => '/' . $parents . '/' . $name . '/',
	'special' => $data['special'],
	'step' => $data['step'],
	'units' => $data['units'],
	'price' => $price
]);

?>