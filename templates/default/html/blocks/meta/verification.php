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

$yandex = $view->get('state|settings:webmaster:yandex:verification');
$google = $view->get('state|settings:webmaster:google:verification');

if ($yandex) {
    ?>
<meta name="yandex-verification" content="<?= $yandex; ?>" />
    <?php
}

if ($google) {
    ?>
<meta name="google-site-verification" content="<?= $google; ?>" />
    <?php
}

unset($yandex, $google);
?>