<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Local;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

$file = DR . 'database' . DS . 'content' . DS . 'catalog.list.ini';
//System::debug($file);

$content = Local::readFileArray($file);
//System::debug($content);

Objects::each($content, function ($item) {

    $item = Prepare::trim($item);

    if (
        !$item ||
        $item[0] === '!'
    ) {
        return;
    }

    $item = Strings::split($item, ':');
    //System::debug($item, '!q');

    $parents = $item[0];
    $title = Prepare::code($item[1]);
    $name = Prepare::alphanumeric($item[1]);

    $folder = DR . 'database' . DS . 'content_parse_link' . DS;
    $file = $folder . $parents . DS . $name . '.ini';
    //System::debug($file, '!q');

    $page = Local::readFile($file);
    //System::debug($page, '!code');

    $page = preg_replace(
        '/[\w\W\r\n]*?(<div class="catalog-entry").*?>/u',
        '',
        $page
    );
    $page = preg_replace(
        '/[\r\n\s]*<\/div>[\r\n\s]*<script type="text\/javascript">[\r\n\w\W]*/u',
        '',
        $page
    );
    //System::debug($matches[0], '!code');

    $folder = DR . 'database' . DS . 'content_parse_data' . DS;
    $file = $folder . $parents . DS . $name . '.ini';

    if ($page) {
        Local::createFile($file);
        Local::writeFile($file, $page, 'replace');
        //System::debug($link);
    }

});

exit;
