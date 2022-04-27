<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<a href="/">
	<div class="block h-auto xs-h-5 h-max-5 width-100 align-mask-contain align-mask-left bg-black" style="
		mask-image:url('<?= $view -> get('lang|logo:0'); ?>');
		-webkit-mask-image:url('<?= $view -> get('lang|logo:0'); ?>');
	">
	</div>
</a>
