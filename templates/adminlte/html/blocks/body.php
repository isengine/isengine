<?php

namespace is;
use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();

$class = null;
$sets = $view -> get('vars|adminlte');

if ($sets['sidebar']['minimal']) { $class .= ' sidebar-mini'; }
if ($sets['sidebar']['minimal-on-md']) { $class .= ' sidebar-mini-md'; }
if ($sets['sidebar']['minimal-on-sm']) { $class .= ' sidebar-mini-sm'; }
if ($sets['sidebar']['minimal-on-xs']) { $class .= ' sidebar-mini-xs'; }

if ($sets['sidebar']['collapsed']) { $class .= ' sidebar-collapse'; }
if ($sets['sidebar']['fixed']) { $class .= ' layout-fixed'; }

if ($sets['layout']['darkmode']) { $class .= ' dark-mode'; }
if ($sets['layout']['fixed-header']) { $class .= ' layout-navbar-fixed'; }
if ($sets['layout']['fixed-footer']) { $class .= ' layout-footer-fixed'; }

?>
<body class="hold-transition<?= $class; ?>">