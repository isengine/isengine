<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Helpers\Paths;

if (!$item) { return; }

use is\Masters\View;

$view = View::getInstance();

$data = $item -> getData();

$name = $item -> getEntryKey('name');
$parents = Strings::join($item -> getEntryKey('parents'), '/');

$image = $data['image'] ? $data['image'] : '/content/' . ($parents ? $parents . '/' : null) . $name . '.jpg';
$image_contain = $view -> get('tvars') -> launch( '{img|' . $image . ':/content/news/default.jpg:lazyload w-100 align-image-contain:' . $data['title'] . '}' );
$item -> addDataKey('image', $image_contain);
$image_cover = $view -> get('tvars') -> launch( '{img|' . $image . ':/content/news/default.jpg:lazyload w-100 align-image-cover height-100:' . $data['title'] . '}' );
$item -> addDataKey('image-cover', $image_cover);

$ctime = $item -> get('ctime');
$date = $ctime ? $ctime : $view -> get('time') -> convert($data['date'], '{day}.{month}.{year}', '{abs}');
$date_display = $data['date'] ? $data['date'] : $view -> get('time|' . $ctime, '{day}.{month}.{year}');
$item -> addDataKey('date', $date);
$item -> addDataKey('date-display', $date_display);

$link = '/' . ($parents ? $parents . '/' : null) . $name . '/';
$item -> addDataKey('link', $link);

$owner = $item -> get('owner');
$authors = null;
if (!$owner) {
	$owner = ['admin'];
}
Objects::each($owner, function($item) use (&$authors) {
	$authors .= '<a href="/authors/' . $item . '/">' . $item . '</a>';
});
$item -> addDataKey('authors', $authors);

?>