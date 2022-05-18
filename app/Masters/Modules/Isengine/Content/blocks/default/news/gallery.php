<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Helpers\Parser;

use is\Masters\View;

$view = View::getInstance();

$view->get('module')->launch('media', 'default', '{
	"folder" : "' . $this->navigate->current . '",
	"slider" : { "enable" : false },
	"slideshow" : { "enable" : false },
	"gallery" : { "enable" : true }
}');

$data = $item->getData();

?>