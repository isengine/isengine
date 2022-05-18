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

?>
<div class="flex">
	<div class="offer">
		<h1>
			<?= $view->get('lang|title'); ?>
		</h1>
		<h2>
			<?= $view->get('lang|sub'); ?>
		</h2>
		<button>
			<?= $view->get('lang|common:submit'); ?>
		</button>
	</div>
	<div class="video">
		<iframe width="100%" height="100%" src="https://www.youtube.com/embed/vI4LHl4yFuo" frameborder="0" allowfullscreen></iframe>
	</div>
</div>
