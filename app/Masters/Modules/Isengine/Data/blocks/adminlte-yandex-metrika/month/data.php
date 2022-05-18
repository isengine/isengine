<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$month = $this->getData('month');

$script = '';

Objects::each($this->getData('map'), function($key, $index, $pos) use ($month, &$script) {
	
	$item = $month[$key];
	$script .= ($pos !== 'first' ? ',' : null) . '{
		"label" : "' . $item['title'] . '",
		"data" : [' . Strings::join($item['value'], ',') . '],
		"hidden" : ' . ($pos !== 'first' ? 'true' : 'false') . ',
		"fill" : false,
		"backgroundColor" : "rgba(' . $item['color'] . ',0.5)",
		"borderColor" : "rgba(' . $item['color'] . ',1)"
	}';
	
});

?>
<div class="d-none" id="monthlyChartData">[<?= Prepare::spaces($script, ' '); ?>]</div>