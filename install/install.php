<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;
use is\Helpers\Paths;

use is\Install\Installer;

$installer = Installer::getInstance();

// INSTALL
// распаковываем необходимые для работы файлы

if (isset($_GET['install'])) {
	
	$install = PATH_INSTALL . 'presets' . DS . 'default.zip';
	
	$installer -> status -> addData($installer -> lang -> get('status:install'));
	
	if (!extension_loaded('zip')) {
		$installer -> status -> addData($installer -> lang -> get('errors:nozip'));
	}
	
	if (!file_exists($install)) {
		$installer -> status -> addData($installer -> lang -> get('errors:noinstall'));
	}
	
	if (extension_loaded('zip') && file_exists($install)) {
		
		$zip = new \ZipArchive;
		$res = $zip -> open($install);
		
		if ($res === true) {
			
			$time = time();
			Local::createFolder(DR . 'backup' . DS . $time);
			$list = Local::search(DR, ['merge' => true]);
			
			Objects::each($list, function($item) use ($time) {
				if ((
					$item['type'] === 'file' &&
					$item['extension'] !== 'php' &&
					$item['extension'] !== 'ini'
				) || (
					$item['type'] === 'folder' &&
					($item['name'] === 'backup' || $item['name'] === 'install' || $item['name'] === 'vendor')
				)) {
					return;
				}
				$target = DR . 'backup' . DS . $time . DS . $item['name'];
				rename($item['fullpath'], $target);
				
			});
			
			$zip -> extractTo(DR);
			$zip -> close();
			
			$installer -> status -> addData($installer -> lang -> get('success:install'));
			
		} else {
			
			$installer -> status -> addData($installer -> lang -> get('errors:unzip'));
			
		}
		
	} else {
		$installer -> status -> addData($installer -> lang -> get('errors:abort'));
	}
	
	unset($install);
	
}

?>