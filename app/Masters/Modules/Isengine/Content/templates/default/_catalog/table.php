<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();
//$instance = Strings::after($this -> instance, ':', null, true);

//$data = $this -> getData() -> getData();
//System::debug($data);

if ($this -> type === 'alone') {
?>
<div class="col-12">
	<div class="container-fluid <?= $this -> type; ?>" id="catalog">
		<?php $this -> iterate(['default:catalog:xlsx:values', 'default:catalog:xlsx:' . $this -> type]); ?>
	</div>
</div>
<?php
	return;
}

$set = [
	[
		'name' => "title",
		'title' => "Название",
		'type' => "text",
		'width' => "45%"
	],
	[
		'name' => "group",
		'title' => "Раздел",
		'type' => "text",
		'width' => "25%"
	],
	[
		'name' => "price",
		'title' => "Цена",
		'type' => "number",
		'width' => "10%"
	],
	[
		'name' => "units",
		'title' => "Единицы",
		'type' => "text",
		'width' => "10%"
	],
	[
		'name' => "cart",
		'title' => "",
		'type' => "text",
		'width' => "10%"
	]
];

$catalog = [];
$image = '<img src="/content/catalog/default.jpg" class="lazyload w-100 align-image-contain">';

Objects::each($this -> getData() -> getData(), function($item, $key) use (&$catalog, $image){
	
	$data = $item -> getData();
	
	$name = $item -> get('name');
	$parents = $item -> get('parents');
	$id = ($parents ? Strings::join($item -> getEntryKey('parents'), ':') . ':' : null) . $name;
	if (
		System::typeOf($parents, 'iterable') &&
		Objects::len($parents)
	) {
		$parents = '/' . Strings::join($parents, '/') . '/' . $name . '/';
	} else {
		$parents = '#';
	}
	
	$catalog[] = [
		'title' => '<a href="' . $parents . '">' . $data['title'] . '</a>',
		'group' => $data['group'],
		'price' => $data['price'],
		'units' => $data['units'],
		'cart' => '
			<div is-name="' . $id . '" class="align-center">
				<div class="none">
					<div data-title="' . $data['title'] . '" data-units="' . $data['units'] . '" data-step="1" data-price="' . $data['price'][0] . '" is-data-from="true"></div>
					<div class="item-image" is-data="image">' . $image . '</div>
					<input type="hidden" class="none" value is-data="value:value">
				</div>
				<a href="javascript:void(0);" class="btn bg-second item-first" is-action="buy">
					<i class="bi bi-cart"></i>
				</a>
				<a href="javascript:void(0);" class="btn bg-theme item-second" is-action="del">
					<i class="bi bi-trash"></i>
				</a>
			</div>
		'
	];
	
	//System::debug($item, '<hr>');
	
});

//$view -> get('vars') -> set('json', Parser::toJson($json));
$view -> get('vars') -> set('catalog', Parser::toJson($catalog));
$view -> get('vars') -> set('catalog-settings', Parser::toJson($set));

?>
<div id="jsGrid"></div>