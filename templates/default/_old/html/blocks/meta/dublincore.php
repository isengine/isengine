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

?>

<!-- Dublin Core -->
<meta name="DC.Title" content="<?= $view->get('seo|title'); ?>">
<meta name="DC.Creator" content="<?= $view->get('lang|title'); ?>">
<meta name="DC.Subject" content="<?= $view->get('seo|keywords'); ?>">
<meta name="DC.Description" content="<?= $view->get('seo|description'); ?>">
<meta name="DC.Date" content="<?= ''; //$view->get('seo|created['w3cdtf']'); ?>">
<meta name="DC.Identifier" content="<?= $view->get('state|url'); ?>">
<meta name="DC.Rights" content="<?= $view->get('seo|copyright'); ?>">
<meta name="DC.Publisher" content="<?= $view->get('seo|author'); ?>">
<meta name="DC.Type" content="Text">
<meta name="DC.Format" content="text/html">
<meta name="DC.Language" content="<?= $view->get('state|lang') . '_' . $view->get('state|code'); ?>">
<meta name="DC.Coverage" content="World">
