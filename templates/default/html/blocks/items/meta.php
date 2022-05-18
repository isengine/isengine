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

/*
media="(orientation: portrait)"
media="(orientation: landscape)"
media="print" для печати и для режима "для слабовидящих"
*/

?>

<!-- META -->

<?php

$view->get('block')->launch('meta:default', 'default', null);
$view->get('block')->launch('meta:standart', 'default', null);

$metadata = $view->get('seo|metadata');
if (System::typeIterable($metadata)) {
    foreach ($metadata as $item) {
        $view->get('block')->launch('meta:' . $item, 'default', null);
    }
    unset($key, $item);
}

$view->get('block')->launch('meta:canonical', 'default', null);
$view->get('block')->launch('meta:verification', 'default');

?>