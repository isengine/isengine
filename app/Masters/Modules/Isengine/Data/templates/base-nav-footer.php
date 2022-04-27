<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$lang = $view -> get('lang|this:nav:footer');

?>
<?php Objects::each($this -> getData(), function($item, $key) use ($lang) { ?>
	<div class="single-item col-lg-3 col-md-6 col-12">
		<div class="footer-box">
			<div class="footer-header">
				<h3><?= $lang[$key]; ?></h3>
			</div>
			<div class="footer-quick-link">
				<ul>
					<?php Objects::each($item, function($item, $key) use ($lang) { ?>
						<li><a href="<?= $item; ?>"><?= $lang[$key]; ?></a></li>
					<?php }); ?>
				</ul>
			</div>
		</div>
	</div>
<?php }); ?>