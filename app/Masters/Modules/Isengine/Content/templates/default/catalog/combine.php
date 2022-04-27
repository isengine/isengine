<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

use is\Components\Globals;

$combine = [];

$this -> getData() -> iterate(function($item) use (&$combine){
	
	$name = $item -> getEntryKey('name');
	$parents = $item -> getEntryKey('parents');
	$parents = $parents ? (Strings::join($parents, ':') . ':') : null;
	$name = $parents . $item -> getEntryKey('name');
	
	$combine[$name] = $item -> getData();
	
});

//System::debug($combine);
//System::debug($this -> getData());

$globals = Globals::getInstance();
$globals -> set('catalog-combine', $combine);

//return;

?>