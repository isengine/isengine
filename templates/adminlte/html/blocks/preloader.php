<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

$sets = $view -> get('vars|adminlte:preloader');

if (!$sets) {
	return;
}

?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__<?= $sets['animation']; ?>" src="<?= $sets['logo']; ?>" alt="AdminLTELogo" height="<?= $sets['height']; ?>" width="<?= $sets['width']; ?>">
</div>