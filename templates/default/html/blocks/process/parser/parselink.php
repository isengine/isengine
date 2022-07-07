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

    $folder = DR . 'database' . DS . 'content_save_link' . DS;
    $file = $folder . $parents . DS . $name . '.ini';
    //System::debug($file, '!q');

    $page = Local::readFile($file);
    //System::debug($page, '!code');

    $matches = [];
    preg_match(
        //'/<div class\=\"search-item\">.*?<\/div>/u',
        '/<h4.*?\/h4>/u',
        $page,
        $matches
    );
    //System::debug($matches[0], '!code');

    $link = '';
    if ($matches[0]) {
        $link = 'https://vnir.ru' . preg_replace('/^.*?href="(.*)?\?sphrase_id.*/', '$1', $matches[0]);
    }
    //System::debug($link);

    $folder = DR . 'database' . DS . 'content_parse_link' . DS;
    $file = $folder . $parents . DS . $name . '.ini';

    if ($link) {
        $page = Local::openUrl($link);
        //System::debug($page, '!code');

        Local::createFile($file);
        Local::writeFile($file, $page, 'replace');
    }

});

exit;
