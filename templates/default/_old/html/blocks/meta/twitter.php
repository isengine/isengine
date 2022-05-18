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

<!-- Twitter Card -->
<!-- https://dev.twitter.com/docs/cards/validation/validator -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?= $view->get('seo|title'); ?>" />
<meta name="twitter:description" content="<?= $view->get('seo|description'); ?>" />
<meta name="twitter:url" content="<?= $view->get('state|url'); ?>" />
<meta name="twitter:image" content="<?= $view->get('seo|image'); ?>" />
