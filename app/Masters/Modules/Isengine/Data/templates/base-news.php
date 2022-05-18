<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$content = null;
$class = ['1st', '2nd', '3rd'];
$button = $view->get('lang|this:news:button:more');

$this->reverseData();
$this->reduceData(0, 3);

Objects::each($this->getData(), function($item, $key) use (&$content, $class, $button){
	$data = $item['data'];
	$content .= '
		<div class="blog-col-' . $class[$key] . ' col-xl-4 col-lg-6 col-md-6 col-12">
			<div class="blog-box-layout2">
				<div class="item-img">
					<a href="/news-single/">
						<img src="' . $data['image'] . '" class="img-fluid" alt="blog">
					</a>
				</div>
				<div class="item-content">
					<div class="post-date">' . $item['ctime'] . '</div>
					<h3 class="item-title">
						<a href="/news-single/">' . $data['title'] . '</a>
					</h3>
					' . $data['description'] . '
					<div class="post-actions-wrapper">
						<ul>
							<li>
								<a class="item-btn" href="/news-single/">' . $button . '</a>
							</li>
							<li>
								<a href="#"><i class="far fa-comments"></i>05</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	';
});

?>
<section class="blog-wrap-layout1 bg-accent100">
	<div class="container">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2><?= $view->get('lang|this:news:title'); ?></h2>
			<p><?= $view->get('lang|this:news:description'); ?></p>
		</div>
		<div class="row">
			<?= $content; ?>
		</div>
	</div>
</section>