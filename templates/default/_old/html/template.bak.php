<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

// код

//$p = $view->get('lang')->get('information:work:0');
//$s = '{phone|{lang|information:phone:0}}';
//$p = $view->get('call')->launch($s);

//$p = $view->get('detect')->get('type');
//$p = $view->get('state')->get('domain');

//echo '[' . print_r($p, 1) . ']';
//echo '<br>[' . $view->get('state')->main() . ']';
//echo '<br>[' . $view->get('state')->home() . ']';
//echo '<br>[' . $view->get('state')->match('main') . ']';
//echo '<br>[' . $view->get('state')->match('home') . ']';

//$p = $template->view->temp();
//$p = $template->lang()->get('information:work:0');
//$s = '{phone|{lang|information:phone:0}}';
//$p = $view->get('call')->launch($s);
//echo '[' . $p . ']';
//echo '<br>[' . $view->get('state')->main() . ']';
//echo '<br>[' . $view->get('state')->home() . ']';
//echo '<br>[' . $view->get('state')->match('main') . ']';
//echo '<br>[' . $view->get('state')->match('home') . ']';

//$s = '{phone|{lang|information:phone:0}}';
//$p = Strings::pairs($s);
//echo '+++';
//echo '[' . print_r($p, 1) . ']';
//echo Sessions::getCookie('lang');

$view->get('block')->launch('items:opening', 'default', null);
$view->get('block')->launch('items:routing', 'default', null);
$view->get('block')->launch('items:ending', 'default', null);

?>