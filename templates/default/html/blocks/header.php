<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

//$view -> get('block') -> launch('custom:toasts-demo');

//$view -> get('block') -> launch('alerts');
$view -> get('block') -> launch('panel');
$view -> get('block') -> launch('top');

?>
<header class="header pt-05 pb-1" id="header">
	<section class="container">
<?php

//$view -> get('block') -> launch('header:one');
$view -> get('block') -> launch('header:first');
$view -> get('block') -> launch('header:second');

?>
	</section>
</header>