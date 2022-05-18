<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$price = $view->get('lang|this:price');

$content = null;
$tabs = null;

Objects::each($this->getData(), function($item, $key, $pos) use (&$content, &$tabs, $price){
	
	$tabs .= '
		<li class="nav-item">
			<a' . ($pos === 'first' || $pos === 'alone' ? ' class="active"' : null) . ' href="#service' . ($key + 1) . '" data-toggle="tab" aria-expanded="false">' . $item['title'] . '</a>
		</li>
	';
	
	/*
	$pricelist = '
		<div class="row">
			<div class="col-12">
				<div class="item-cost">
					<h3 class="item-title title-bar-primary7">' . $price . '</h3>
					<ul>
	';
	Objects::each($item['price'], function($i, $k) use (&$pricelist) {
		$pricelist .= '<li>' . $k . '<span>' . $i . '</span></li>';
	});
	$pricelist .= '
					</ul>
				</div>
			</div>
		</div>
	';
	*/
	
	$content .= '
		<div role="tabpanel" class="tab-pane fade' . ($pos === 'first' || $pos === 'alone' ? ' active show' : null) . '" id="service' . ($key + 1) . '">
			<div class="single-departments-box-layout1">
				<div class="single-departments-img">
					<img alt="single" src="' . $item['image'] . '">
				</div>
				<div class="item-content">
					<div class="item-content-wrap">
						<h3 class="item-title title-bar-primary5">' . $item['title'] . '</h3>
						<span class="sub-title">' . $item['sub'] . '</span>
						' . $item['description'] . '
						' . $item['content'] . '
					</div>
					' . $pricelist . '
				</div>
			</div>
		</div>
	';
	
});
?>

<div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">
	<div class="widget widget-department-info">
		<h3 class="section-title title-bar-primary"><?= $view->get('lang|this:services:title'); ?></h3>
		<ul class="nav nav-tabs tab-nav-list">
			<?= $tabs; ?>
		</ul>
	</div>
</div>
<div class="col-xl-9 col-lg-8 col-12 no-equal-item">
	<div class="tab-content">
		<?= $content; ?>
	</div>
	<div class="single-departments-box-layout1">
		<div class="item-content">
			<?php $view->get('module')->launch('data', 'base-price|base-price-in-services'); ?>
			<?php $view->get('module')->launch('data', 'base-team|base-team-in-services'); ?>
		</div>
	</div>
</div>