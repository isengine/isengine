<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();

?>
<form id="jsGridVisible" onsubmit="return false">
	<div class="card-header">
		<h3 class="card-title">Общие колонки</h3>
	</div>
	<div class="card-body">
		<div class="row">
		<?php Objects::each($view->get('vars|columns'), function($item){ ?>
			<div class="col-12 col-sm-6 col-xl-4">
				<div class="row align-items-center mb-1">
					<div class="col-6">
						<label for="jsGridVisible-<?= $item['name']; ?>" class="form-label">
							<?= $item['title']; ?>
						</label>
					</div>
					<div class="col-6">
						<input type="checkbox" name="<?= $item['name']; ?>" id="jsGridVisible-<?= $item['name']; ?>" <?= $item['value'] ? 'checked' : null; ?> data-bootstrap-switch data-on-color="success">
					</div>
				</div>
			</div>
		<?php }); ?>
		</div>
	</div>
		
	<div class="card-header">
		<h3 class="card-title">Колонки с данными</h3>
	</div>
	<div class="card-body">
		<div class="row">
		<?php Objects::each($view->get('vars|keys'), function($item){ ?>
			<div class="col-12 col-sm-6 col-xl-4">
				<div class="row align-items-center mb-1">
					<div class="col-6">
						<label for="jsGridVisible-<?= $item['name']; ?>" class="form-label">
							<?= $item['title']; ?>
						</label>
					</div>
					<div class="col-6">
						<input type="checkbox" name="<?= $item['name']; ?>" id="jsGridVisible-<?= $item['name']; ?>" data-bootstrap-switch data-on-color="success">
					</div>
				</div>
			</div>
		<?php }); ?>
		</div>
	</div>
</form>