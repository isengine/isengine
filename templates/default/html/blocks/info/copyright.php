<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$year = $view->get('lang|information:year');
$cyear = date('Y');

if (!$year || $year === $cyear) {
    $year = $cyear;
} else {
    $year .= ' – ' . $cyear;
}

$company = $view->get('lang|information:company');

if (Strings::last($company) !== '.') {
    $company .= '.';
}

?>
© <?= $year . ', ' . $view->get('lang|information:formname:0') . ' ' . $company . '<br>' . $view->get('lang|common:copyrights'); ?>
