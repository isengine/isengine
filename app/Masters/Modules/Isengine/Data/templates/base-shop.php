<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$content = null;

$this -> reverseData();
$this -> reduceData(0, 10);

Objects::each($this -> getData(), function($item) use (&$content){
	$data = $item['data'];
	$rating = Strings::multiply('<div class="rate-item"><i class="fas fa-star"></i></div>', $data['rating'] + 1);
	$content .= '
		<div class="shop-box-layout1">
			<div class="item-img">
				<img src="' . $data['image'] . '" alt="shop" class="img-fluid">
				<ul class="shop-action-items">
					<li>
						<a href="#">
							<i class="fas fa-shopping-cart fa-sm"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fas fa-exchange-alt"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fas fa-heart"></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="item-content">
				<h4 class="item-title">
					<a href="/shop-single/">' . $data['title'] . '</a>
				</h4>
				<div class="rate-items">' . $rating . '</div>
				<div class="item-price">' . $data['price'] . '</div>
			</div>
		</div>
	';
});

?>
<!-- Shop Area Start Here -->
<section class="shop-wrap-layout1 bg-light-primary100">
	<div class="container">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2 class="item-title"><?= $view -> get('lang|this:shop:title'); ?></h2>
			<p><?= $view -> get('lang|this:shop:description'); ?></p>
		</div>
		<div class="rc-carousel dot-control-layout3"
			data-loop="true"
			data-items="4"
			data-margin="30"
			data-autoplay="false"
			data-autoplay-timeout="5000"
			data-smart-speed="2000"
			data-dots="true"
			data-nav="false"
			data-nav-speed="false"
			data-r-x-small="1"
			data-r-x-small-nav="false"
			data-r-x-small-dots="true"
			data-r-x-medium="2"
			data-r-x-medium-nav="false"
			data-r-x-medium-dots="true"
			data-r-small="2"
			data-r-small-nav="false"
			data-r-small-dots="true"
			data-r-medium="3"
			data-r-medium-nav="false"
			data-r-medium-dots="true"
			data-r-large="4"
			data-r-large-nav="false"
			data-r-large-dots="true"
			data-r-extra-large="4"
			data-r-extra-large-nav="false"
			data-r-extra-large-dots="true"
		>
			<?= $content; ?>
		</div>
	</div>
</section>
<!-- Shop Area End Here -->