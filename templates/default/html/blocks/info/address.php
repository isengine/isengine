<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<span class="color-gray-6">
	<?= $view -> get('lang|common:address', 'upperFirst'); ?>
</span>
<br>
<?= $view -> get('lang|information:address'); ?>