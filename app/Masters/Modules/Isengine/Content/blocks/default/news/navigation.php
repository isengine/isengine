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

$link = Objects::convert($this -> parents);
$query = null;

$page = $this -> navigate -> page;
$pages = $this -> navigate -> pages;

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
	
	if ($this -> navigate -> keys) {
		$link[] = $this -> navigate -> name_page;
	}
	
} else {
	$query = '?' . $this -> navigate -> name_page . '=';
}

//<i class="bi bi-chevron-left fs-075"></i>

?>
<nav aria-label="page navigation">
	<ul class="pagination justify-content-center pt-1">
		
		<?php
			if ($page > 1) {
				
				$array = $link;
				$string = $query;
				
				if ($string) {
					$string .= 1;
				} else {
					$array[] = 1;
				}
				
				$join = Strings::join($array, '/');
				$url = '/' . ($join ? $join . '/' : null) . $string;
				
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url; ?>" aria-label="First">
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
				
				$array = $link;
				$string = $query;
				
				if ($string) {
					$string .= $page - 1;
				} else {
					$array[] = $page - 1;
				}
				
				$join = Strings::join($array, '/');
				$url = '/' . ($join ? $join . '/' : null) . $string;
				
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url; ?>" aria-label="Previous">
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
			
			System::loop($pages, function($item) use ($link, $query, $page) {
				
				$item++;
				
				if ($query) {
					$query .= $item;
				} else {
					$link[] = $item;
				}
				
				$join = Strings::join($link, '/');
				$url = '/' . ($join ? $join . '/' : null) . $query;
				
				$current = !$page || $page == $item;
				
				if ($current) {
		?>
			<li class="page-item active" aria-current="page">
				<span class="page-link"><?= $item; ?></span>
			</li>
		<?php
				} else {
		?>
			<li class="page-item">
				<a href="<?= $url; ?>" class="page-link">
					<?= $item; ?>
				</a>
			</li>
		<?php
				}
			});
			
			if ($page < $pages) {
				
				$array = $link;
				$string = $query;
				
				if ($string) {
					$string .= $page + 1;
				} else {
					$array[] = $page + 1;
				}
				
				$join = Strings::join($array, '/');
				$url = '/' . ($join ? $join . '/' : null) . $string;
				
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url; ?>" aria-label="Next">
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
				
				$array = $link;
				$string = $query;
				
				if ($string) {
					$string .= $pages;
				} else {
					$array[] = $pages;
				}
				
				$join = Strings::join($array, '/');
				$url = '/' . ($join ? $join . '/' : null) . $string;
				
		?>
			<li class="page-item">
				<a class="page-link" href="<?= $url; ?>" aria-label="Last">
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