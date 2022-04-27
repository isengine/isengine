<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>

<section class="container-fill">
	<div class="row">
		<div class="col-12">
			<?php //$view -> get('block') -> launch('custom:image'); ?>
			<?php $view -> get('block') -> launch('custom:slider'); ?>
		</div>
	</div>
</section>

<section class="container">
	<div class="row mb-2">
		<div class="col-12">
			<?php $view -> get('block') -> launch('custom:catalog'); ?>
		</div>
		<div class="col-12">
			<?php $view -> get('block') -> launch('custom:items'); ?>
		</div>
	</div>
</section>

<section class="container-fill">
	<div class="row background">
		<div class="col-12">
			<div class="container">
				<div class="row">
					<div class="col-12 py-45">
						<?php $view -> get('block') -> launch('custom:plashki'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="image2 align-bg-cover align-bg-fixed absolute ah width-100 z-index-last"></div>
	</div>
</section>

<section class="container">
	<div class="row">
		<div class="col-12 pb-3">
			<?php $view -> get('block') -> launch('custom:about'); ?>
		</div>
	</div>
</section>

<section class="container-fill">
	<div class="row background">
		<div class="col-12">
			<div class="container-md">
				<div class="row">
					<div class="col-12 py-35">
						<?php $view -> get('block') -> launch('custom:feedback'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="image1 align-bg-cover align-bg-fixed absolute ah width-100 z-index-last"></div>
	</div>
</section>

<section class="container-fill">
	<div class="row">
		<div class="col-12 px-0">
			<?php $view -> get('block') -> launch('custom:map'); ?>
			<?php //$view -> get('block') -> launch('custom:test-script'); ?>
		</div>
	</div>
</section>

<section class="container-fill">
	<div class="row mt-35">
		<div class="col-12">
			<div class="container-md">
				<div class="row">
					<div class="col-12">
						<?php $view -> get('block') -> launch('custom:service'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
