<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Helpers\Paths;
use is\Helpers\Local;
use is\Helpers\Datetimes;

use is\Components\Globals;

if (!$item) { return; }

$globals = Globals::getInstance();

$data = $item->getData();

$globals->set('catalog', [ $item->getKey('id') => [
	'title' => '<a href="' . $data['link'] . '">' . $data['title'] . '</a>',
	'parents' => Strings::join(Objects::get(Objects::convert($data['name']), 1, 1, true), ', '),
	'price' => $data['price'],
	'units' => $data['units'],
	'cart' => '
		<div is-name="' . $data['name'] . '" class="align-center mt-1">
			<div class="none" is-data="image">' . $data['image'] . '</div>
			<input type="hidden" class="none" value is-data="value:value">
			<div data-title="' . $data['title'] . '" data-units="' . $data['units'] . '" data-step="' . $data['step'] . '" data-price="' . $data['price'] . '" is-data-from="true">
				<div class="item-first' . ($data['value'] ? ' none' : null) . '">
					<a href="javascript:void(0);" class="width-100 btn bg-second" is-action="buy">
						<i class="bi bi-cart"></i>
					</a>
				</div>
				<div class="item-second' . ($data['value'] ? null : ' none') . '">
					<a href="javascript:void(0);" class="width-100 btn bg-second" is-action="del">
						<i class="bi bi-trash"></i>
					</a>
				</div>
			</div>
		</div>
	'
]]);

?>