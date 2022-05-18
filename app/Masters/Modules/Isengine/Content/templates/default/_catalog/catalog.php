<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();
$instance = Strings::after($this->instance, ':', null, true);

?>
<div class="col-12">
	<div class="row <?= $this->type; ?>" id="catalog">
		<?php $this->iterate(['default:catalog:db:values', 'default:catalog:db:' . $this->type]); ?>
		<?php //$this->iterate(['default:catalog:xlsx:values', 'default:catalog:xlsx:' . $this->type]); ?>
	</div>
</div>