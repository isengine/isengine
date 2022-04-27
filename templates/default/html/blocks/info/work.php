<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<span class="color-gray-6">
	<?= $view -> get('lang|common:work', 'upperFirst'); ?>
</span>
<br>
<?php
	Objects::each($view -> get('lang|information:work'), function($item, $key){
		echo ($key ? ', ' : null) . Strings::replace($item, ' ', '&nbsp;');
	});
?>