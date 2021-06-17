<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Parents;

class Installer extends Parents\Singleton {
	
	public function setInfo() {
		
		$array = [
			'core'      => true,
			'framework' => true,
			'system'    => null
		];
		
		foreach ($array as $key => $item) {
			$data = Local::readFile(DR . ($item ? 'vendor' . DS . 'isengine' . DS . $key . DS : null) . 'composer.json');
			$data = Parser::fromJson($data);
			$this -> addDataKey($key, $data);
		}
		unset($key, $item);
		
	}
	
	public function template($name) {
		$file = PATH_INSTALL . 'template' . DS . $name . '.php';
		if (file_exists($file)) {
			require $file;
		}
	}
	
	public function display($name) {
		
		
		
	}
	
}

?>