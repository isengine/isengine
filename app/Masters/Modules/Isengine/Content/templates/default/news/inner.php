<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

if ($this->type === 'none') {
    $this->block('default:news:none');
    return;
}

$this->iterate(['default:news:values', 'default:news:inner']);
