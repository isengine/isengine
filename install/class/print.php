<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Parents;

class Display extends Parents\Singleton {
	
	
function dataprint($status, $site = null) {
	
	global $lang;
	global $langs;
	global $currlang;
	
	if (file_exists(PATH_INSTALL . 'template' . DS . 'opening.php')) {
		require PATH_INSTALL . 'template' . DS . 'opening.php';
	} else {
		echo '<!DOCTYPE html><html lang="' . $currlang . '"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><title>' . $lang['template']['title'] . '</title></head><body>';
	}
	
	if (!empty($status)) {
		echo '<hr>';
		if (is_array($status)) {
			foreach ($status as $item) {
				echo $item . '<br>';
			}
		} else {
			echo print_r($status, 1);
		}
		echo '<hr>';
	}
	
	$r = $_SERVER['REQUEST_URI'];
	$rp = mb_strpos($r, '?');
	if (!empty($rp)) {
		$r = mb_substr($r, 0, $rp);
	}
	
	if (empty($get)) {
		
		echo str_replace(
			['{a}', '{/a}'],
			['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?install&lang=' . $currlang . '" class="' . $lang['template']['a'] . '">', '</a>'],
			$lang['link']['install']
		);
		
		echo str_replace(
			['{a}', '{/a}'],
			['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?update&lang=' . $currlang . '" class="' . $lang['template']['a'] . '">', '</a>'],
			$lang['link']['update']
		);
		
	} else {
		
		if ($site === true) {
			echo str_replace(
				['{a}', '{/a}'],
				['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/" class="' . $lang['template']['a'] . '">', '</a>'],
				$lang['link']['site']
			);
		} else {
			echo str_replace(
				['{a}', '{/a}'],
				['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?lang=' . $currlang . '" class="' . $lang['template']['a'] . '">', '</a>'],
				$lang['link']['refresh']
			);
		}
		
		if (!isset($get['unlink']) && !isset($get['unpack']) && !isset($get['install'])) {
			echo str_replace(
				['{a}', '{/a}'],
				['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?unpack&lang=' . $currlang . '" class="' . $lang['template']['a'] . '">', '</a>'],
				$lang['link']['unpack']
			);
		}
		
		if (!isset($get['unlink'])) {
			echo str_replace(
				['{a}', '{/a}'],
				['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?unlink&lang=' . $currlang . '" class="' . $lang['template']['a'] . '">', '</a>'],
				$lang['link']['unlink']
			);
		}
		
	}
	
	if (!empty($status) && file_exists(PATH_INSTALL . 'template' . DS . 'notice.php')) {
		require PATH_INSTALL . 'template' . DS . 'notice.php';
	}
	
	unset($rp, $r);
	
	if (file_exists(PATH_INSTALL . 'template' . DS . 'ending.php')) {
		require PATH_INSTALL . 'template' . DS . 'ending.php';
	} else {
		echo '</body></html>';
	}
	
	exit;
	
}

?>