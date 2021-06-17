<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;
use is\Install\Language;

$installer = Installer::getInstance();
$lang = Language::getInstance();

$langs = $lang -> get('langs');
$clang = $lang -> get('current');

$r = $_SERVER['REQUEST_URI'];
$rp = mb_strpos($r, '?');
if ($rp) {
	$r = mb_substr($r, 0, $rp);
}

$array = [];

if (!$_GET) {
	
	$array[] = 'install';
	$array[] = 'set';
	
} else {
	
	if ($site !== true) {
		$array[] = 'refresh';
	}
	
	if (!isset($_GET['unlink']) && !isset($_GET['unpack']) && !isset($_GET['install'])) {
		$array[] = 'unpack';
	}
	
	if (!isset($_GET['unlink'])) {
		$array[] = 'unlink';
	}
	
}

if ($site === true) {
	echo str_replace(
		['{a}', '{/a}'],
		['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/" class="' . $lang -> get('template:a') . '">', '</a>'],
		$lang -> get('link:site')
	);
}

foreach ($array as $item) {
	echo str_replace(
		['{a}', '{/a}'],
		['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?' . $item . '&lang=' . $clang . '" class="' . $lang -> get('template:a') . '">', '</a>'],
		$lang -> get('link:' . $item)
	);
}

unset($rp, $r);

?>