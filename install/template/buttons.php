<?php

namespace is\Install;

use is\Install\Installer;

$installer = Installer::getInstance();

$langs = $installer -> lang -> get('langs');
$clang = $installer -> lang -> get('current');

$array = [];

if (!$_GET) {
	
	$array[] = 'install';
	$array[] = 'set';
	
} else {
	
	if (!isset($_GET['unlink']) && !isset($_GET['install'])) {
		$array[] = 'install';
	}
	
	if (!isset($_GET['unlink'])) {
		$array[] = 'unlink';
	}
	
	$array[] = 'back';
	
}

if (isset($_GET['install']) || isset($_GET['unlink'])) {
	echo str_replace(
		['{a}', '{/a}'],
		['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/" class="' . $installer -> lang -> get('template:a') . '">', '</a>'],
		$installer -> lang -> get('link:site')
	);
}

$r = $_SERVER['REQUEST_URI'];
$rp = mb_strpos($r, '?');
if ($rp) {
	$r = mb_substr($r, 0, $rp);
}

foreach ($array as $item) {
	echo str_replace(
		['{a}', '{/a}'],
		['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?' . $item . '&lang=' . $clang . '" class="' . $installer -> lang -> get('template:a') . '">', '</a>'],
		$installer -> lang -> get('link:' . $item)
	);
}

unset($rp, $r);

?>