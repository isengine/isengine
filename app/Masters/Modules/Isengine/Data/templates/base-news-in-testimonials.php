<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$content = null;
$author = $view -> get('lang|this:news:author');

$this -> reverseData();
$this -> reduceData(0, 2);

Objects::each($this -> getData(), function($item) use (&$content, $author){
	$data = $item['data'];
	$content .= '
		<div class="blog-box-layout1">
			<h3 class="item-title"><a href="/news-single/">' . $data['title'] . '</a></h3>
			<ul class="entry-meta">
				<li><i class="far fa-calendar-alt"></i>' . $item['ctime'] . '</li>
				<li><i class="fas fa-user"></i>' . $author . ' <a href="#">' . $item['owner'] . '</a></li>
			</ul>
		</div>
	';
});

?>
<div class="section-heading heading-dark heading-layout5">
	<h2><?= $view -> get('lang|this:news:title'); ?></h2>
</div>
<?= $content; ?>
<a class="blog-btn" href="/news1/"><?= $view -> get('lang|this:news:button:all'); ?></a>