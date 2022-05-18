<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Parser;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

// код

// делаем прелоад

$array = $view->get('state|settings:variables');
if (!System::typeIterable($array)) { return; }

$print = null;

foreach ($array as $key => $item) {
	
	$key = Parser::fromString($key);
	$item = $view->get('tvars')->launch($item);
	
	if ($key[1] !== 'js') {
		$view->get('vars')->set($key[0], $item);
	}
	
	if ($key[1] !== 'php') {
		if (empty($key[2])) {
			$print .= $key[0] . '="' . $item . '", ';
		} else {
			$print .= $key[0] . '=' . $item . ', ';
		}
	}
	
}

unset($key, $item);

?>


<!-- SCRIPT VARIABLES -->
<script type="text/javascript">
var <?= substr($print, 0, -2); ?>;
</script>
<?php
unset($array, $print);
?>