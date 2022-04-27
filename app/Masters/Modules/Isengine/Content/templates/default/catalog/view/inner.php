<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row">
<?php
$this -> iterate([
	'default:catalog:values',
	'default:catalog:showroom:inner'
]);
?>
</div>