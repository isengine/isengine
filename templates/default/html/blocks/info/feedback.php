<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<a class="color-gray-8 color-gray-6-hover" data-bs-toggle="modal" href="#eshopFeedback" role="button">
	<?= $view -> get('lang|common:feedback', 'upperFirst'); ?>
</a>