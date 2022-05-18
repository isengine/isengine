<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();
?>
<header class="">
	<div class="container-fluid border-bottom px-4 py-2">
		<div class="row justify-content-center justify-content-sm-between">
			<div class="col-auto">
				<a href="/" alt="<?= $view->get('lang|title'); ?>"><img src="https://raw.githubusercontent.com/isengine/docs/master/logo/poster.svg" class="logo logo-menu" alt="<?= $view->get('lang|title'); ?>"></a>
			</div>
			<div class="col-auto alert alert-warning d-inline-block" role="alert">
				<?= $view->get('lang|this:dev'); ?>
			</div>
			<div class="col-auto flex-sm-grow-1">
				<?php
					$view->get('module')->launch('menu', 'bootstrap');
				?>
			</div>
			<div class="col-auto">
				<nav class="navbar navbar-light">
					<ul class="nav nav-pills">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
								<?//= $view->get('lang|this:lang'); ?>
								<i class="fa fa-language" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-sm-end">
								<?php
									$lang = [$view->get('state|domain'), $view->get('state|path'), $view->get('lang|langs:original')];
									Objects::each($view->get('state|langs:list'), function($item) use ($lang){
								?>
								<li><a class="dropdown-item" href="<?= $lang[0] . $item . '/' . $lang[1]; ?>"><?= $lang[2][$item]; ?></a></li>
								<?php
									});
								?>
							</ul>
						</li>
					</ul>
				</nav>
				<?php
					
				?>
			</div>
		</div>
	</div>
</header>