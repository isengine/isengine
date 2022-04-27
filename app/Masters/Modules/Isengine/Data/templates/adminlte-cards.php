<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

?>
<div class="row">
	<?php
		Objects::each($this -> getData(), function($item) {
			$f_refresh = null;
			$f_maximize = null;
			$f_collapse = null;
			$f_remove = null;
			if ($item['functions'] === true) {
				$f_refresh = true;
				$f_maximize = true;
				$f_collapse = true;
				$f_remove = true;
			} elseif (System::typeOf($item['functions'], 'iterable')) {
				$f_refresh = Objects::match($item['functions'], 'refresh');
				$f_maximize = Objects::match($item['functions'], 'maximize');
				$f_collapse = Objects::match($item['functions'], 'collapse');
				$f_remove = Objects::match($item['functions'], 'remove');
			}
	?>
	<div class="col-md-3">
		<div class="card <?= $item['class']; ?><?= $item['collapsed'] ? ' collapsed-card' : ''; ?>">
			
			<div class="card-header">
				<h3 class="card-title">
					<i class="<?= $item['icon']; ?>"></i>
					<?= $item['name']; ?>
				</h3>
				<div class="card-tools">
					
					<?php if ($f_refresh) { ?>
					<button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content" data-load-on-init="false">
						<i class="fas fa-sync-alt"></i>
					</button>
					<?php } ?>
					
					<?php if ($f_maximize) { ?>
					<button type="button" class="btn btn-tool" data-card-widget="maximize">
						<i class="fas fa-expand"></i>
					</button>
					<?php } ?>
					
					<?php if ($f_collapse) { ?>
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas <?= $item['collapsed'] ? 'fa-plus' : 'fa-minus'; ?>"></i>
					</button>
					<?php } ?>
					
					<?php if ($f_remove) { ?>
					<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
					<?php } ?>
					
				</div>
			</div>
			
			<div class="card-body"><?= $item['value']; ?></div>
			
		</div>
		
		<?php if ($f_refresh) { ?>
		<div class="d-none" id="card-refresh-content">
			The body of the card after card refresh
		</div>
		<?php } ?>
		
	</div>
	<?php }); ?>
</div>