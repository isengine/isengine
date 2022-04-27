<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

if ($this -> type === 'none') {
	$this -> block('default:news:none');
	return;
}

?>
<section class="news" id="news">
	<?php if ($this -> type !== 'alone') { ?>
	<h1 class="mb-1 pb-1 b-0 bb border-second">
		<?= $view -> get('lang|nav:' . $view -> get('state|page')); ?>	
	</h1>
	<?php } ?>
	<div class="row">
		<?php $this -> iterate(['default:news:values', 'default:news:' . $this -> type]); ?>
	</div>
	<?php if ($this -> type !== 'alone') { ?>
	<div class="row">
		<div class="col-12">
			<?php $this -> block('default:news:navigation'); ?>
		</div>
	</div>
	<?php } ?>
</section>