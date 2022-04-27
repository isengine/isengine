<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

// то, что мы убираем в любом случае из меню
$exclude = [
	'cart',
	'catalog',
	'create',
	'login',
	'profile',
	'register',
	'reset'
];

// то, что мы оставляем во втором столбце нижнего меню
// это же убираем из верхнего меню
// и из первого столбца нижнего меню
$second = [
	'covid',
	'agreement',
	'privacy',
	'terms'
];

// дальше код

$result = [];
$lang = $view -> get('lang|nav');

Objects::each($view -> get('state|structure'), function($item, $key) use ($lang, $exclude, &$result) {
	if (!Objects::match($exclude, $key)) {
		$result[$key] = $lang[$key];
	}
}, true);

$first = Objects::removeByIndex($result, $second);
$second = Objects::removeByIndex($result, Objects::keys($first));

$view -> get('vars') -> set('nav', [
	$result,
	$first,
	$second
]);

//System::debug($view -> get('vars'));

?>