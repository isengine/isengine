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

$lang = $view->get('vars')->get('modal');

$salt = dechex(time());
$defaultsLogin = array(
    'hash' => $salt . substr(MD5($_SESSION['token'] . $salt), 0, 30),
    'login' => '',
    'password' => '',
);

if (count($errorsLogin)) {
    if (isset($_POST['datalogin']['login'])) {
        $defaultsLogin['login'] = $_POST['datalogin']['login'];
    }
    if (isset($_POST['datalogin']['password'])) {
        $defaultsLogin['password'] = $_POST['datalogin']['password'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $errorsLogin = array();
    if (isset($attempts['ban']) && $attempts['ban'] > 1) {
        $errorsLogin['ban'] = $lang['signin']['error'] . ' ';
    }
}
