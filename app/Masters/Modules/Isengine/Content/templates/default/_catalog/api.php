<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;

use is\Components\State;

$state = State::getInstance();

$cart = Parser::fromJson($state -> get('cart'));

$data = Objects::keys($cart);
$this -> data -> leaveByList($data, 'name');

$this -> iterate(['default:catalog:xlsx:values', 'default:api']);

?>