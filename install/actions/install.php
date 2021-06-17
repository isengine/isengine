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

// INSTALL
// распаковываем необходимые для работы файлы

if (isset($_GET['install'])) {

	$install = PATH_INSTALL . 'presets' . DS . 'default.zip';

	$status[0][] = '<br>' . $lang -> get('status:install');

	if (!extension_loaded('zip')) {
		$status[1][] = $lang -> get('errors:nozip');
	}

	if (!file_exists($install)) {
		$status[1][] = $lang -> get('errors:noinstall');
	}

	if (empty($status[1])) {
		
		$zip = new \ZipArchive;
		$res = $zip -> open($install);
		
		if ($res === true) {
			
			$time = time();
			if (!file_exists(DR . 'backup')) {
				mkdir(DR . 'backup');
			}
			if (!file_exists(DR . 'backup' . DS . $time)) {
				mkdir(DR . 'backup' . DS . $time);
			}
			$f = glob(DR . '*.ini');
			if (!empty($f) && is_array($f)) {
				foreach ($f as $item) {
					$i = mb_substr($item, mb_strrpos($item, DS) + 1);
					rename($item, DR . 'backup' . DS . $time . DS . $i);
					$status[0][] = $lang -> get('status:file') . '"' . $i . '"' . $lang -> get('errors:file');
					unset($i);
				}
				unset($item);
			}
			unset($f, $time);
			
			$zip -> extractTo(DR);
			$zip -> close();
			
			$status[0][] = $lang -> get('success:install');
			$status[0][] = $lang -> get('status:libraries');
			
		} else {
			$status[1][] = $lang -> get('errors:unzip');
		}

	}

	unset($install);

	if (!empty($status[1])) {
		$status[0][] = $lang -> get('errors:abort');
	}

}

?>