<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();
$instance = Strings::after($this -> instance, ':', null, true);

?>
<div class="row <?= $this -> type; ?>" id="catalog-items">
	<?php $this -> iterate(['default:catalog:items:values', 'default:catalog:items:list']); ?>
</div>
