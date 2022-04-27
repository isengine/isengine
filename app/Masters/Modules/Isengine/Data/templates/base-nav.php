<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$lang = $view -> get('lang|this:nav');

?>
<nav id="dropdown">
	<ul>
		<?php
			Objects::each($this -> getData(), function($item, $key) use ($lang) {
				$it = System::typeOf($item, 'iterable');
		?>
			
			<?php if ($key === 'pages') { ?>
				
				<li class="position-static hide-on-mobile-menu">
					<a href="<?= $it ? '#' : $item; ?>"><?= $lang[$key]; ?></a>
					<?php if ($it) { ?>
						<div class="template-mega-menu">
							<div class="container">
								<div class="row">
									<div class="col">
										<ul class="sub-menu">
											<?php Objects::each($item, function($item, $key) use ($lang) { ?>
												<li><a href="<?= $item; ?>"><i class="<?= $lang['icons'][$key]; ?>"></i><?= $lang[$key]; ?></a></li>
											<?php return $item; ?>
											<?php }); ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</li>
				
				<li class="hide-on-desktop-menu">
					<a href="<?= $it ? '#' : $item; ?>"><?= $lang[$key]; ?></a>
					<?php if ($it) { ?>
						<ul>
							<?php Objects::each($item, function($item, $key) use ($lang) { ?>
								<li><a href="<?= $item; ?>"><?= $lang[$key]; ?></a></li>
							<?php return $item; ?>
							<?php }); ?>
						</ul>
					<?php } ?>
				</li>
				
			<?php } else { ?>
			
				<li>
					<a href="<?= $it ? '#' : $item; ?>"><?= $lang[$key]; ?></a>
					<?php if ($it) { ?>
						<ul class="dropdown-menu-col-1">
							<?php Objects::each($item, function($item, $key) use ($lang) { ?>
								<li><a href="<?= $item; ?>"><?= $lang[$key]; ?></a></li>
							<?php }); ?>
						</ul>
					<?php } ?>
				</li>
				
			<?php } ?>
			
		<?php }); ?>
	</ul>
</nav>