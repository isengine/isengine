<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Parser;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

// код

// делаем прелоад

$array = $view -> get('state|settings:preload');
$print = null;

if (!System::typeIterable($array)) { return; }

foreach ($array as $item) {
	$print .= $view -> get('render') -> launch('preload', $item);
}
unset($item);

?>


<!-- PRELOAD -->
<?php

echo $print;
unset($array, $print);

?>