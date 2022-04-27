<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$sets = &$this -> settings;
$instance = &$this -> instance;

$view = View::getInstance();

System::debug($item, '!q');
?>
<div class="<?= Strings::join($sets['classes'], ' '); ?>">
	<?= $view -> get('lang|title'); ?>
	НИЧЕГО НЕТ
</div>