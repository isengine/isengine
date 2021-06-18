<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Parents;

class Installer extends Parents\Singleton {
	
	public $license;
	public $lang;
	public $status;
	public $buffer;
	
	public function setLang() {
		$this -> lang = new Language;
		$this -> lang -> setLangs();
		$this -> lang -> setCurrent();
		$this -> lang -> read();
	}
	
	public function setStatus() {
		$this -> status = new Parents\Data;
	}
	
	public function setBuffer() {
		$this -> buffer = new Parents\Data;
	}
	
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
	
	public function setLicense() {
		$this -> license = Local::readFileLine(DR . 'license', '<br>');
		$this -> license = '<p>' . preg_replace('/<br>\s*<br>/ui', '</p><p>', $this -> license) . '</p>';
		$this -> license = str_replace('<br>', null, $this -> license);
	}
	
	public function template($name) {
		$file = PATH_INSTALL . 'template' . DS . $name . '.php';
		if (file_exists($file)) {
			require $file;
		}
	}
	
	public function buffer($command = null, $key = null) {
		if ($command === 'start') {
			ob_start();
		} elseif ($command === 'end') {
			ob_end_clean();
		} elseif ($key) {
			$this -> buffer -> addDataKey($key, ob_get_contents());
		} else {
			$this -> buffer -> addData(ob_get_contents());
		}
	}
	
	public function display($name) {
		
		
		
	}
	
}

?>