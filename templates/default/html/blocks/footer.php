<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\Objects;
use is\Masters\View;

// читаем

$view = View::getInstance();

$view -> get('block') -> launch('screen');

?>
<footer class="footer mt-auto" id="footer">
	<section class="container-fluid bg-gray-1 text-dark mt-3 p-15 pt-2 md-px-3 fs-09">
		<div class="row">
			
			<div class="col-12 xs-col-6 sm-col-4 md-col-3 order-1 sm-order-1 align-left">
				
				<div class="block">
					<?php $view -> get('block') -> launch('logo:image'); ?>
				</div>
				
				<div class="block pt-1">
					<?php $view -> get('block') -> launch('info:contacts'); ?>
				</div>
				
				<div class="block pt-05">
					<?= $view -> get('lang|title'); ?>
				</div>
				
				<div class="block pt-025 pb-05">
					<?= $view -> get('lang|description'); ?>
				</div>
				
				<div class="block pt-025 pb-05">
					<?php $view -> get('block') -> launch('info:copyright'); ?>
				</div>
			</div>
			
			<div class="col-12 sm-col-4 md-col-6 order-3 sm-order-2 pt-15 sm-pt-0">
			<!--<div class="col-12 sm-col-4 md-col-6 order-3 sm-order-2 pt-15 sm-pt-0 relative">-->
				<?php $view -> get('block') -> launch('nav:structure:column'); ?>
			</div>
			
			<div class="col-12 xs-col-6 sm-col-4 md-col-3 order-2 sm-order-3">
				<div class="block fs-15">
					<?php $view -> get('block') -> launch('info:social'); ?>
				</div>
				<div class="block">
					<?php $view -> get('block') -> launch('info:feedback'); ?>
				</div>
				<div class="block pt-05">
					<?php $view -> get('block') -> launch('info:work'); ?>
				</div>
				<div class="block pt-05">
					<?php $view -> get('block') -> launch('info:address'); ?>
				</div>
				<div class="block pt-05">
					<?php $view -> get('block') -> launch('info:agency'); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="sm-h-0 h-5">
	</section>
</footer>