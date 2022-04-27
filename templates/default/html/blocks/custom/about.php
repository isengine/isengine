<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view -> get('block') -> launch('custom:line');

?>

<h3 class="color-theme-dark align-center py-15 text-uppercase">
	Наша компания
</h3>

<p>Наша компания - самая лучшая компания в мире. Также здесь может располагаться другая информация, описывающая нашу компанию.</p>

<p>Также здесь может располагаться другая информация, описывающая нашу компанию.</p>

<?php $view -> get('block') -> launch('custom:line'); ?>

<h3 class="color-theme-dark align-center py-15 text-uppercase">
	Преимущества
</h3>

<p>Удобство:</p>
<ul class="list">
	<li>пункт 1й;</li>
	<li>пункт 2й;</li>
	<li>пункт 3й.</li>
</ul>

<p>Также здесь может располагаться другая информация, описывающая нашу компанию.</p>

<?php $view -> get('block') -> launch('custom:line'); ?>

<h3 class="color-theme-dark align-center py-15 text-uppercase">
	Другой заголовок
</h3>

<p>Также здесь может располагаться другая информация, описывающая нашу компанию.</p>

<p>Наши преимущества:</p>

<ul class="list">
	<li>пункт 1й;</li>
	<li>пункт 2й;</li>
	<li>пункт 3й.</li>
</ul>

<p>Наши гарантии:</p>

<ul class="list">
	<li>пункт 1й;</li>
	<li>пункт 2й;</li>
	<li>пункт 3й.</li>
</ul>
