<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

$view->get('block')->launch('footer', null, null);

$view->get('block')->launch('items:check', 'default', null);
$view->get('block')->launch('items:cookies', 'default', null);
$view->get('block')->launch('items:assets', 'default', null);

$view->get('block')->launch('scripts', null, null);

$view->get('block')->launch('items:display', 'default', null);
$view->get('block')->launch('items:inspect', 'default', null);

?>

</body>
</html>