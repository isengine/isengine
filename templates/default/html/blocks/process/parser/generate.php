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
    
    $file = DR . 'database' . DS . 'content_new' . DS . $parents . DS . $name . '.ini';
    System::debug($file, '!q');
    
    $content = '{
    "title" : "' . $title . '",
    "price" : "",
    "price-opt" : "",
    "sale" : "",
    "units" : "",
    "opt" : "",
    "step" : "1",
    "tags" : "",
    "synonims" : "",
    "description" : "

    "
}';
    //System::debug($content);

    //Local::createFile($file);
    //Local::writeFile($file, $content, 'replace');

    $url = 'https://vnir.ru/search/index.php?q=' . Prepare::urlencode($item[1]);
    //System::debug($url);

    $page = Local::openUrl($url);
    //$page = Local::readFile(DR . 'database' . DS . 'content' . DS . 'catalog.primer.ini');
    //System::debug($page, '!code');

    // замена
    
    $matches = [];
    $parse = preg_match(
        //'/<div class\=\"search-item\">.*?<\/div>/u',
        '/<h4.*?\/h4>/u',
        $page,
        $matches
    );
    //System::debug($matches[0], '!code');

    if ($matches[0]) {
        $link = 'https://vnir.ru' . preg_replace('/^.*?href="(.*)?\?sphrase_id.*/', '$1', $matches[0]);
    }
    //System::debug($link);

    if ($link) {
        $data = Local::openUrl($link);
        
        $data = preg_replace('/.*?(catalog-entry)/', '<div class="catalog-entry', $data);
        $data = preg_replace('/<script type="text\/javascript">.*/', '', $data);
        //<div class="catalog-entry">
        //<script type="text/javascript">
        
        $datafile = DR . 'database' . DS . 'content_data' . DS . $parents . DS . $name . '.ini';
        Local::createFile($datafile);
        Local::writeFile($datafile, $data, 'replace');
        echo '<br>+++ ' . $name;
    } else {
        echo '<br>--- ' . $name;
    }

});

exit;
