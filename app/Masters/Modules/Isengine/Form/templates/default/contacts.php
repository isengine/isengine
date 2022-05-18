<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;
use is\Helpers\Paths;
use is\Masters\View;

$view = View::getInstance();

if (isset($_GET['success'])) {
    $this->block('default:contacts-success');
} else {
    $this->printForm();
}
