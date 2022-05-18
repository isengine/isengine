<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

// System::debug($this->navigate);
// /news/page/2/
// /news/page/2/items/15
// /news/2/15
// /news/?page=2&items=15

$current = $this->navigate->current;

$first = $this->navigate->first;
$prev = $this->navigate->prev;
$next = $this->navigate->next;
$last = $this->navigate->last;

$link = Objects::convert($this->parents);

$query = null;
$array = null;
$page = $this->navigate->page;
$rest = $this->navigate->rest;

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
	
	if ($this->navigate->keys) {
		$link[] = $this->navigate->name_page;
	}
	
	$link[] = $page;
	$array = Strings::join($link, '/');
	
} else {
	$query = '?' . $this->navigate->name_page . '=' . $page;
}

$list = '/' . ($array ? $array . '/' : null) . '#' . Strings::replace($current, [':', ' '], ['-', '_']) . $query;

?>
<nav aria-label="page navigation">
	<ul class="pagination">
		
		<li class="page-item">
			<a class="page-link" href="<?= $list; ?>" aria-label="Next">
				<i class="bi bi-arrow-90deg-up"></i>
			</a>
		</li>
		
		<?php
			if ($current !== $first) {
		?>
			<li class="page-item">
				<a class="page-link" href="/<?= Strings::replace($first, ':', '/'); ?>/" aria-label="First">
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
			
			if ($prev && $current !== $prev) {
		?>
			<li class="page-item">
				<a class="page-link" href="/<?= Strings::replace($prev, ':', '/'); ?>/" aria-label="Previous">
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
			
			if ($next && $current !== $next) {
		?>
			<li class="page-item">
				<a class="page-link" href="/<?= Strings::replace($next, ':', '/'); ?>/" aria-label="Next">
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
			
			if ($current !== $last) {
		?>
			<li class="page-item">
				<a class="page-link" href="/<?= Strings::replace($last, ':', '/'); ?>/" aria-label="Last">
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