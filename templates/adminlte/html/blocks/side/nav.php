<?php

namespace is;
use is\Masters\View;
use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$view = View::getInstance();

$class = null;
$sets = $view -> get('vars|adminlte:sidebar');

if ($sets['flat']) { $class .= ' nav-flat'; }
if ($sets['lagacy']) { $class .= ' nav-legacy'; }
if ($sets['indent']) { $class .= ' nav-child-indent'; }

?>
<!-- Sidebar Menu -->
<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column<?= $class; ?>" data-widget="treeview" role="menu" data-accordion="false">
		<li class="nav-item">
			<a href="/adminlte/" class="nav-link active">
				<i class="nav-icon <?= $view -> get('lang|this:icons:index'); ?>"></i>
				<p><?= $view -> get('lang|this:pagenames:index'); ?></p>
			</a>
		</li>
		<?php
			$array = $view -> get('lang|this');
			Objects::each($view -> get('state|structure:adminlte:db'), function($item, $key) use ($array) {
				$target = 'db:' . $key;
				$lang = $array['pagenames'][$target];
				$icon = $array['icons'][$target];
		?>
		<li class="nav-item">
			<a href="/adminlte/database/?collection=<?= $key; ?>" class="nav-link">
				<i class="<?= $icon; ?> nav-icon"></i>
				<p><?= $lang; ?></p>
			</a>
		</li>
		<?php
			}, true);
			unset($array);
		?>
		<?php
			$state = [];
			Objects::each($view -> get('state|structure:adminlte:pages'), function($item, $key) use ($view, $state) {
				$state[] = $key;
				
				$array = $view -> get('lang|this');
				$target = 'pages:' . Strings::join($state, ':');
				$lang = $array['pagenames'][$target];
				$icon = $array['icons'][$target];
				
				if (!System::typeOf($item, 'iterable')) {
		?>
		<li class="nav-item">
			<a href="/adminlte/<?= Strings::replace($target, ':', '/'); ?>/" class="nav-link">
				<i class="<?= $icon; ?> nav-icon"></i>
				<p><?= $lang; ?></p>
			</a>
		</li>
		<?php
				} else {
		?>
		<li class="nav-item">
			<a href="#" class="nav-link">
				<i class="<?= $icon; ?> nav-icon"></i>
				<p>
					<?= $lang; ?>
					<i class="fas fa-angle-left right"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
			<?php
				Objects::each($item, function($i, $k) use ($view, $state) {
					$state[] = $k;
					$array = $view -> get('lang|this');
					$target = 'pages:' . Strings::join($state, ':');
					$lang = $array['pagenames'][$target];
					$icon = $array['icons'][$target];
			?>
				<li class="nav-item">
					<a href="/adminlte/<?= Strings::replace($target, ':', '/'); ?>/" class="nav-link">
						<i class="<?= $icon; ?> nav-icon"></i>
						<p><?= $lang; ?></p>
					</a>
				</li>
			<?php
					$state = Objects::unlast($state);
				}, true);
			?>
			</ul>
		</li>
		<?php
				}
				$state = Objects::unlast($state);
			}, true);
		?>
		</li>
		<li class="nav-item">
			<a href="https://adminlte.io/docs/3.1/" class="nav-link">
				<i class="nav-icon fas fa-file"></i>
				<p>Documentation</p>
			</a>
		</li>
	</ul>
</nav>
<!-- /.sidebar-menu -->