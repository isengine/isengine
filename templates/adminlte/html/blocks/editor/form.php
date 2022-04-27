<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

use is\Masters\View;

$view = View::getInstance();

//$db = $view -> get('vars|db');
//$content = $view -> get('vars|content');
$columns = $view -> get('vars|columns');

?>
<div class="card">
	<div class="card-body">
		<?/*
		<hr>
		<?= $content; ?>
		<hr>
		*/?>
		<?php $view -> get('module') -> launch('form', 'adminlte-form-editor', $columns); ?>
	</div>
</div>