<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view->get('module')->launch('content', 'default:slider');
