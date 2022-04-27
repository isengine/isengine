<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

// код

?>

<!-- Html Metatags -->
<title><?= $view -> get('seo|fulltitle'); ?></title>
<?php
foreach (['description', 'keywords', 'author', 'copyright', 'robots'] as $item) {
	$val = $view -> get('seo|' . $item);
	if ($val) {
?>
<meta name="<?= $item; ?>" content="<?= $val; ?>" />
<?php
	}
}
unset($item, $val);
?>

<!-- Additional metatags -->
<?php
$additional = $view -> get('seo|additional');
if (System::typeIterable($additional)) {
	foreach ($additional as $key => $item) {
?>
<meta name="<?= $key; ?>" content="<?= $item; ?>" />
<?php
	}
}
?>
