<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

// код

?><!DOCTYPE html>
<html<?php
	
	$lang = $view->get('state|lang');
	if ($lang) {
		echo ' lang="' . $lang . '"';
	}
	
	$class = $view->get('state|settings:classes:html');
	if ($class) {
		echo ' class="' . $class . '"';
	}
	
	$print = ' prefix="';
	$prefix = $view->get('seo|prefix');
	if ($prefix) {
		$print .= $prefix . ' ';
	}
	if (
		System::typeIterable($view->get('seo|metadata'))
        && Objects::match($view->get('seo|metadata'), 'opengraph')
	) {
		$print .= 'og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# ';
		//objectGet('content', 'name') ? 'article: http://ogp.me/ns/article# ' : ''
	}
	if ($view->get('state|settings:webmaster:yandex:verification')) {
		$print .= 'ya: http://webmaster.yandex.ru/vocabularies/ ';
	}
	$print .= '"';
	echo $print;
	unset($print, $prefix);
	
?>>