<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\Exchange;
use is\Masters\View;

$view = View::getInstance();

?>
<section class="cart row">
<?php $view -> get('module') -> launch('content', 'default:catalog:inner|default:catalog:cart', '{"id" : "order"}', null); ?>
</section>