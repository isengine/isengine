<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$map = $view -> get('vars|parents');
$collection = $view -> get('vars|collection');

//System::debug($map);

function adminlteDbParents($array, $collection, $parents = null, $recursive = null) {
	
	$link = '/adminlte/database/?collection=' . $collection . '&parents=' . ($parents ? $parents . ':' : null);
	
	echo '
		<table class="table table-hover">
			<tbody>
	';
	
	if (!$recursive) {
		echo '
				<tr>
					<td>
						<a href="/adminlte/database/?collection=' . $collection . '">
							Все разделы
						</a>
					</td>
				</tr>
		';
	}
	
	foreach ($array as $key => $item) {
		if (System::typeOf($item, 'iterable')) {
			echo '
				<tr data-widget="expandable-table" aria-expanded="false">
					<td>
						<i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
						<a href="' . $link . $key . '">
							' . $key . '
						</a>
					</td>
				</tr>
				<tr class="expandable-body">
					<td>
						<div class="p-0">
			';
			adminlteDbParents($item, $collection, $key, true);
			echo '
						</div>
					</td>
				</tr>
			';
		} else {
			echo '
				<tr>
					<td>
						<a href="' . $link . $key . '">
							' . $key . '
						</a>
					</td>
				</tr>
			';
		}
	}
	unset($key, $item);
	
	echo '
			</tbody>
		</table>
	';
	
}

?>
<div class="card card-secondary collapsed-card">
	<div class="card-header">
		<h3 class="card-title">Выбор раздела</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-plus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<div class="card-body p-0">
		<?php adminlteDbParents($map, $collection); ?>
	</div>
</div>