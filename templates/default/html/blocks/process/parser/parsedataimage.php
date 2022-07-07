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

    $folder = DR . 'database' . DS . 'content_parse_data_image' . DS;
    $file = $folder . $parents . DS . $name . '.ini';
    //System::debug($file, '!q');

    $page = Local::readFileArray($file);
    //System::debug($page, '!code');

    Objects::each($page, function ($item) use ($parents, $name) {

        $url = 'https://vnir.ru' . $item;
        //System::debug($url);

        $image = Local::openUrl($url);
        //System::debug($image);

        $folder = DR . 'database' . DS . 'content_parse_data_image' . DS;
        $file = $folder . $parents . DS . $name . '.jpg';

        if ($image) {
            Local::createFile($file);
            Local::writeFile($file, $image, 'replace');
            //System::debug($link);
        }

    });

});

exit;
