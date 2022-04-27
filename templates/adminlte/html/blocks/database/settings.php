<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="card card-secondary collapsed-card">
	<div class="card-header">
		<h3 class="card-title">Настройки таблицы</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-plus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<div class="card-body p-0">
		<?php $view -> get('block') -> launch('database:settings:options'); ?>
		<?php $view -> get('block') -> launch('database:settings:visible'); ?>
	</div>
</div>