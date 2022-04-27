<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<li class="nav-item">
	<a class="btn active" aria-current="page" href="/"><?= $view -> get('lang|nav:index'); ?></a>
</li>

<li class="nav-item dropdown">
	<a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
		<?= $view -> get('lang|nav:catalog'); ?>
	</a>
	<ul class="dropdown-menu color-black">
		<?php
			$view -> get('module') -> launch('content', 'default:catalog:inner|default:catalog:nav:dropdown');
			//$view -> get('module') -> launch('data', 'default:catalog|default:catalog:dropdown');
		?>
	</ul>
</li>

<li class="nav-item">
	<a class="btn" href="/about/"><?= $view -> get('lang|nav:about'); ?></a>
</li>

<li class="nav-item">
	<a class="btn" href="/contacts/"><?= $view -> get('lang|nav:contacts'); ?></a>
</li>
