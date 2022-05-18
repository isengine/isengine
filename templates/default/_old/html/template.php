<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

// код

$view->get('block')->launch('items:opening', 'default', null);
?>
<section class="main">
	<div class="container">
		<div class="row">
<?php
$view->get('block')->launch('items:routing', 'default', null);
?>
		</div>
	</div>
</section>
<?php
$view->get('block')->launch('items:ending', 'default', null);
?>