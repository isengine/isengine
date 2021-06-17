<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Parents;

class Language extends Parents\Singleton {
	
	public $current;
	public $langs;
	
	public function setLangs() {
		
		$this -> langs = [];
		
		$f = glob(PATH_INSTALL . 'languages' . DS . '*.ini');
		if (!empty($f) && is_array($f)) {
			foreach ($f as $item) {
				$i = mb_substr($item, mb_strrpos($item, DS) + 1, -4);
				if (!empty($i)) {
					$this -> langs[] = $i;
				}
				unset($i);
			}
			unset($item);
		}
		unset($f);
		
	}
	
	public function setCurrent() {
		$currents = [];
		
		if (!empty($_GET['lang'])) {
			$currents[] = $_GET['lang'];
		}
		
		if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			foreach (preg_split('/\,/ui', $_SERVER['HTTP_ACCEPT_LANGUAGE']) as $item) {
				$currents[] = mb_substr($item, 0, 2);
			}
			unset($item);
		}
		
		Objects::each($currents, function($item){
			if (
				!$this -> current &&
				file_exists(PATH_INSTALL . 'languages' . DS . $item . '.ini')
			) {
				$this -> current = $item;
			}
		});
		
		if (!$this -> current) {
			$this -> current = 'en';
		}
		
	}
	
	public function read() {
		
		$data = Local::readFile(PATH_INSTALL . 'languages' . DS . $this -> current . '.ini');
		$data = Parser::fromJson($data);
		$this -> setData($data);
		
	}
	
	
}

?>