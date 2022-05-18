<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Parser;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

$icons = $view->get('icon')->getData();
if (!System::typeIterable($icons)) { return; }

$print = null;
$path = $view->get('state|domain') . $icons['settings']['path'] . '/';

if (!empty($icons['favicon'])) {
	$print .= '<link rel="icon" type="image/x-icon" href="' . (empty($icons['favicon']['rootfolder']) ? $path : $view->get('state|domain')) . (empty($icons['favicon']['name']) ? 'favicon' : $icons['favicon']['name']) . '.ico">';
	$print .= '<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="' . (empty($icons['favicon']['rootfolder']) ? $path : $view->get('state|domain')) . (empty($icons['favicon']['name']) ? 'favicon' : $icons['favicon']['name']) . '.ico">';
}

if (!empty($icons['safari'])) {
	// здесь должен быть svg, но svg пока не генерируем, а генератор подразумевается как png, закодированный в base64 и обернутый в svg
	$print .= '<link rel="mask-icon" href="' . $path . $icons['safari']['name'] . '.png"' . (!empty($icons['safari']['color']) ? ' color="' . $icons['safari']['color'] . '"' : '') . '>';
}

unset($icons['settings'], $icons['splashscreen'], $icons['webapp'], $icons['favicon'], $icons['safari'], $icons['msapplication']);

if ($icons) {
	foreach ($icons as $key => $item) {
		foreach ($item['sizes'] as $i) {
			$print .= '<link rel="' . $key . '" ' . ($key === 'icon' ? 'type="image/png" ' : '') . 'sizes="' . $i . 'x' . $i . '" href="' . $path . $item['name'] . '-' . $i . 'x' . $i . '.png">';
		}
	}
	unset($item, $i, $key);
}

unset($icons);

?>

<!-- ICONS -->
<?php

echo $print;
unset($print);

?>