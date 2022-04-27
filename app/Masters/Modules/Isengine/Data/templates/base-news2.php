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
$this -> reduceData(0, 3);

Objects::each($this -> getData(), function($item) use (&$content){
	$data = $item['data'];
	$content .= '
		<div class="single-item col-lg-4 col-md-12 col-12">
			<div class="blog-box-layout5">
				<div class="item-img">
					<a href="/news-single/">
						<img src="' . $data['image'] . '" class="img-fluid" alt="blog">
					</a>
					<div class="post-date">
						' . $item['ctime'] . '
						<!--22 <span>June</span>-->
					</div>
				</div>
				<div class="item-content">
					<h3 class="item-title">
						<a href="/news-single/">' . $data['title'] . '</a>
					</h3>
					' . $data['description'] . '
					<div class="post-actions-wrapper">
						<ul>
							<li>
								<i class="far fa-user"></i>
								<a href="#">' . $item['owner'] . '</a>
							</li>
							<li>
								<a href="#"><i class="far fa-heart"></i>15</a>
							</li>
							<li>
								<a href="#"><i class="far fa-comments"></i>24</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	';
});

?>
<section class="blog-wrap-layout4 bg-light-secondary100">
	<div class="container">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2><?= $view -> get('lang|this:news:title'); ?></h2>
			<p><?= $view -> get('lang|this:news:description'); ?></p>
		</div>
		<div class="row">
			<?= $content; ?>
		</div>
	</div>
</section>