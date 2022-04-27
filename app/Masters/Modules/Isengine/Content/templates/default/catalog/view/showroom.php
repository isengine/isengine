<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row">
	
	<div class="col-12 md-col order-2 md-order-1">
		
		<div class="row">
		<?php
			$this -> iterate([
				'default:catalog:values',
				'default:catalog:showroom:' . $this -> type
			]);
		?>
		</div>
		
		<?php if ($this -> type !== 'alone') { ?>
		<div class="row">
			<?php $this -> block('default:catalog:navigate:list'); ?>
		</div>
		<?php } ?>
		
	</div>
	
	<?php if ($this -> type !== 'alone') { ?>
	<div class="col-12 md-col-4 lg-col-3 order-1 md-order-2">
		<?php $this -> block('default:catalog:filter'); ?>
	</div>
	<?php } ?>
	
</div>