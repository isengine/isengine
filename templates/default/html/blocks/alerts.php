<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

//$view->get('module')->launch('data', 'default:alerts|default:alerts');
$view->get('module')->launch('data', 'default:alerts|default:alerts-multiple');
