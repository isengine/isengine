<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Components\State;
use is\Masters\View;

$view = View::getInstance();

// код

$sets = '{"bootstrap":12,"labels":{"interface":"asdf", "x":"asdf"}}';
$sets = [
	'bootstrap' => 132,
	'labels' => [
		'interface' => 'asdf',
		'x' => 'adfx'
	]
];

//$view->get('module')->launch('menu:isengine', 'side', $sets);
$view->get('module')->launch('map');

?>

<ul>
	<li>1</li>
	<li>2</li>
	<li>3</li>
	<li>4</li>
	<li>5</li>
</ul>

<div class="">normal</div>
<div class="saturate">saturate</div>
<div class="desaturate">desaturate</div>
<div class="lighten">lighten</div>
<div class="darken">darken</div>
<div class="fadein">fadein</div>
<div class="fadeout">fadeout</div>
<div class="spin"><span>spin</span>
</div>
<div class="tint">tint</div>
<div class="shade">shade</div>

<br><br><br>
<div class="flex">

	<div class="">normal</div>

	<div class="saturate-u">saturate up</div>
	<div class="saturate-d">saturate down</div>

	<div class="light-u">light up</div>
	<div class="light-d">light down</div>

	<div class="fade-u">fade up</div>
	<div class="fade-d">fade down</div>

	<div class="spin-u">spin up</div>
	<div class="spin-d">spin down</div>

	<div class="tint-u">tint up</div>
	<div class="tint-d">tint down</div>

	<div class="shade-u">shade up</div>
	<div class="shade-d">shade down</div>

</div>
<br><br><br>

<div class="">normal</div>
<div class="test">test</div>

<br><br><br>

<div class=""></div>

<a href="">
	<span class="img">
		123123
	</span>
</a>
saturate-u
saturate-d
light-u
light-d
fade-u
fade-d
spin-u
spin-d
tint-u
tint-d
shade-u
shade-d


saturate
desaturate
lighten
darken
fadein
fadeout
spin
tint
shade
