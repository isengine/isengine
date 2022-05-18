<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$year = $view->get('lang|information:year');

?>
© <?= ($year ? $year . ' – ' : null) . date('Y') . ', ' . $view->get('lang|information:formname:0') . ' ' . $view->get('lang|information:company') . '.<br>' . $view->get('lang|common:copyrights'); ?>