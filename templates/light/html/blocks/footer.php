<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\Objects;
use is\Masters\View;

// читаем

$view = View::getInstance();

?>
<footer class="bg-secondary text-white mt-5">
	<div class="container-fluid pt-5 pb-3 px-5">
		<div class="row text-center">
			<div class="col-12 offset-0 col-md-10 offset-md-1 text-center">
				<p>
					<a href="https://github.com/isengine/isengine" class="text-white text-decoration-none" target="blank">
						<i class="fa fa-github px-1 fs-4" aria-hidden="true"></i>
					</a>
					<a href="https://facebook.com/groups/isengine" class="text-white text-decoration-none" target="blank">
						<i class="fa fa-facebook px-1 fs-4" aria-hidden="true"></i>
					</a>
					<br>
					<a href="mailto:<?= $view->get('lang|information:email:0'); ?>" class="text-white text-decoration-none" target="blank">
						<?= $view->get('lang|information:email:0'); ?>
					</a>
				</p>
				<p>
					<?= $view->get('lang|this:warning'); ?>
				</p>
				<p>
					<a href="https://opensource.org/licenses/MIT" class="text-white text-decoration-none" target="blank">
						<?= $view->get('lang|information:license'); ?>
					</a>
					<br>
					Copyright © 2017-<?= date('Y'); ?>
				</p>
			</div>
		</div>
	</div>
</footer>