<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

// System::debug($this -> navigate);
// /news/page/2/
// /news/page/2/items/15
// /news/2/15
// /news/?page=2&items=15

if ($this -> navigate -> pages < 2) {
	return;
}

// формируем изначальную строку

$link = Objects::convert($this -> parents);

$rest = $this -> navigate -> rest;

if ($rest) {
	
	if (System::type($rest, 'numeric')) {
		
		$link = Objects::get($link, 0, $rest);
		$c = Objects::len($link);
		
		while($c < $rest) {
			$link[] = null;
			$c++;
		}
		
	} else {
		$link[] = $rest;
	}
	
}

$join = Strings::join($link, '/');
$url = '/' . ($join ? $join . '/' : null);

unset($link, $join);

// дальше будем формировать строку от url
// и данных в виде массива
// если задан rest, то 2 варианта, с ключами и без:
// с ключами - link[] = keys, link[] = value
// без ключей - link[] = value
// сам link потом объединяется в строку через слеш
// если rest не задан, то link также объединяется в строку
// но в виде ?=&=... через http_build_query(link)
// при этом изначально он должен быть с ключами


$page = $this -> navigate -> page;
$pages = $this -> navigate -> pages;

//System::debug($this -> navigate);
//System::debug($link);

//<i class="bi bi-chevron-left fs-075"></i>

?>
<nav aria-label="page navigation">
	<ul class="pagination justify-content-center pt-1">
		
		<?php
			if ($page > 1) {
				$this -> navigate -> addDataKey(
					$rest && !$this -> navigate -> keys
					? 0
					: $this -> navigate -> name_page,
					1
				);
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url . $this -> navigate -> renderData(); ?>" aria-label="First">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
		<?php
			} else {
		?>
			<li class="page-item disabled">
				<span class="page-link">&laquo;</span>
			</li>
		<?php
			}
			
			if ($page > 1) {
				$this -> navigate -> addDataKey(
					$rest && !$this -> navigate -> keys
					? 0
					: $this -> navigate -> name_page,
					$page - 1
				);
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url . $this -> navigate -> renderData(); ?>" aria-label="Previous">
					<span aria-hidden="true">&lsaquo;</span>
				</a>
			</li>
		<?php
			} else {
		?>
			<li class="page-item disabled">
				<span class="page-link">&lsaquo;</span>
			</li>
		<?php
			}
			
			System::loop($pages, function($item) use ($url, $rest, $page) {
				
				$item++;
				
				$this -> navigate -> addDataKey(
					$rest && !$this -> navigate -> keys
					? 0
					: $this -> navigate -> name_page,
					$item
				);
				
				if (!$page || $page == $item) {
		?>
			<li class="page-item active" aria-current="page">
				<span class="page-link"><?= $item; ?></span>
			</li>
		<?php
				} else {
		?>
			<li class="page-item">
				<a href="<?= $url . $this -> navigate -> renderData(); ?>" class="page-link">
					<?= $item; ?>
				</a>
			</li>
		<?php
				}
			});
			
			if ($page < $pages) {
				$this -> navigate -> addDataKey(
					$rest && !$this -> navigate -> keys
					? 0
					: $this -> navigate -> name_page,
					$page + 1
				);
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url . $this -> navigate -> renderData(); ?>" aria-label="Next">
					<span aria-hidden="true">&rsaquo;</span>
				</a>
			</li>
		<?php
			} else {
		?>
			<li class="page-item disabled">
				<span class="page-link">&rsaquo;</span>
			</li>
		<?php
			}
			
			if ($page < $pages) {
				$this -> navigate -> addDataKey(
					$rest && !$this -> navigate -> keys
					? 0
					: $this -> navigate -> name_page,
					$pages
				);
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url . $this -> navigate -> renderData(); ?>" aria-label="Last">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		<?php
			} else {
		?>
			<li class="page-item disabled">
				<span class="page-link">&raquo;</span>
			</li>
		<?php
			}
		?>
		
	</ul>
</nav>