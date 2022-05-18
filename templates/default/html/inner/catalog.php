<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<section class="container">
<?php
if ($view->get('state|string') === 'catalog/') {
    $view->get('block')->launch('custom:catalog');
} else {
    $view->get('module')->launch('content', 'default:catalog:routing|default:catalog:view:showroom');
}
//$view->get('module')->launch('content', 'default:catalog:table|default:catalog:view:table');
?>
</section>