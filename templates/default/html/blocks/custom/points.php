<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<span class="color-gray-6">
	Мы работаем
</span>
<?php
	Objects::each($view -> get('lang|this:points'), function($item, $key, $pos){
		echo $key % 2 ? null : '<span class="inline-block md-block pr-025 md-pr-0">';
		echo $item;
		echo $pos === 'last' ? null : ', ';
		echo $key % 2 ? '</span>' : null;
	});
?>