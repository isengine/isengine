<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Parser;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

// код

// определяем место

$state = $view -> get('state');
$place = $state -> getData('place');

if ($place === 'head') {
	$place = 'body';
} elseif ($place === 'body') {
	$place = 'ending';
} else {
	$place = 'head';
}

$state -> addData('place', $place);

// делаем рендеринг

$assets = $view -> get('state|settings:assets');
$array = !empty($assets[$place]) ? $assets[$place] : null;

$page = Strings::join($view -> get('state|route'), ':');
if (!$page) { $page = 'index'; }
$special = $view -> get('special') -> search($page);

Objects::each($special, function($item) use ($assets, $place){
	$val = $place . ':' . $item;
	return !empty($assets[$val]) ? $assets[$val] : null;
});

if (System::typeIterable($special)) {
	$array = Objects::add($array ? $array : [], Objects::combine($special));
}

if (!System::typeIterable($array)) { return; }

$array = Objects::clear($array, true);

$print = null;
$fonts = null;

foreach ($array as $item) {
	$item = Strings::pairs($item);
	$print .= $view -> get('render') -> launch($item[0], $item[1]);
	if ($item[0] === 'fonts') {
		$fonts = true;
	}
}
unset($item);

?>

<!-- ASSETS -->
<?php

if ($fonts) {
	echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
}

echo $print;

unset($array, $print, $fonts);

?>