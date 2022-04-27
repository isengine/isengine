<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();

$this -> data = isMenuProcessing($this -> data);

function isMenuProcessing($menu) {
	Objects::each($menu, function($value, $key) {
		
		$name = System::typeOf($value, 'iterable') ? $key : $value;
		$data = null;
		
		if (System::typeOf($value, 'iterable')) {
			$data = isMenuProcessing($value);
		}
		
		$array = [
			'title' => $name,
			'link' => true,
			'data' => $data
		];
		
		return $array;
		
	});
	return Objects::reset($menu);
}

$view -> get('module') -> launch(
	'data',
	'default:menu:null|default:menu:menu',
	Parser::toJson($this -> data)
);

?>
